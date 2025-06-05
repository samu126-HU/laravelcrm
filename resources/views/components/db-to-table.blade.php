{{-- 
    Blade component: db-to-table
    Usage example:
        <x-db-to-table tableName="users" headerString="ID, Name, Email" exclude="email_verified_at, password, remember_token, created_at, updated_at, role_id, avatar">
    This component displays a database table as a grid, with support for foreign key value resolution.
    All attributes should be passed for safety and ease of editing.
--}}

@php
    // --- Imports ---
    use Illuminate\Support\Facades\DB;
    use Illuminate\Support\Str;

    // --- Attribute Setup ---
    $tableName = $tableName ?? '';
    $add = $add ?? false;
    $excludeCols = empty($exclude) ? [] : (is_string($exclude) ? array_map('trim', explode(',', $exclude)) : $exclude);
    $headerNames = empty($headerString)
        ? []
        : (is_string($headerString)
            ? array_map('trim', explode(',', $headerString))
            : $headerString);
    // Convert $order to array safely
    $order = empty($order) ? [] : (is_string($order) ? array_map('trim', explode(',', $order)) : $order);
    $enableDelete = $delete ?? false;
    $enableUpdate = $update ?? false;
    $showActions = $enableDelete || $enableUpdate;


    // Show a warning if $order and $headerNames are not the same length

    // --- Fetch Data ---
    try {
        $rows = DB::table($tableName)->get();
    } catch (\Exception $e) {
        $rows = collect();
    }


    
    // // Show a warning if actions are enabled but 'id' is not displayed
    // // Warn if actions are enabled but 'id' is not present in the row data (as a key)
    // if ($showActions && $rows->count() > 0 && !array_key_exists('id', (array) $rows->first())) {
    //     echo '<div class="p-4 bg-yellow-100 text-yellow-800 rounded mb-4">';
    //     echo __('Warning: Actions require the "id" column to be present in the data.');
    //     echo '</div>';
    // }

    if (!empty($order) && count($order) !== count($headerNames)) {
        echo '<div class="p-4 bg-yellow-100 text-yellow-800 rounded mb-4">';
        echo __('Warning: The number of columns in "order" does not match the number of columns in "headerString".');
        echo '</div>';
    }

    // --- Header Names ---
    if ($rows->count() > 0 && empty($headerString)) {
        $headerNames = array_filter(array_keys((array) $rows->first()), function ($col) use ($excludeCols) {
            return !in_array($col, $excludeCols);
        });
    }

    // --- Filter Columns ---
    if ($rows->count() > 0) {
        $rows = $rows->map(function ($row) use ($excludeCols) {
            return collect($row)->except($excludeCols)->all();
        });
    }

    // --- Foreign Key Maps ---
    // Direct foreign keys: column => [table, display_field]
    $foreignKeyMap = [
        'role_id' => ['roles', 'display_name'],
        'customer_type_id' => ['customer_types', 'name'],
        'customer_id' => ['customers', 'name'],
        'contact_id' => ['contacts', 'name'],
        'group_id' => ['groups', 'name'],
        'currency_id' => ['currencies', 'name'],
        'user_id' => ['users', 'name'],
    ];
    // Connecting/pivot foreign keys: column => [pivot_table, pivot_fk, target_table, target_field]
    $connectingForeignKeyMap = [
        'contactcustomer_id' => ['contact_customers', 'contact_id', 'contacts', 'name'],
        // Add more as needed
    ];

    /**
     * Resolve a value for a foreign key column, including connecting tables.
     * Falls back to the raw value if no mapping or record is found.
     *
     * @param string $col
     * @param mixed $value
     * @param array $foreignKeyMap
     * @param array $connectingForeignKeyMap
     * @return string
     */
    function resolveForeignKeyValue($col, $value, $foreignKeyMap, $connectingForeignKeyMap)
    {
        // Direct foreign key
        if (isset($foreignKeyMap[$col]) && $value) {
            [$fkTable, $fkField] = $foreignKeyMap[$col];
            $related = DB::table($fkTable)->find($value);
            return $related && isset($related->$fkField) ? $related->$fkField : $value;
        }
        // Connecting/pivot foreign key
        if (isset($connectingForeignKeyMap[$col]) && $value) {
            [$pivotTable, $pivotFk, $targetTable, $targetField] = $connectingForeignKeyMap[$col];
            $pivot = DB::table($pivotTable)->find($value);
            if ($pivot && isset($pivot->$pivotFk)) {
                $target = DB::table($targetTable)->find($pivot->$pivotFk);
                return $target && isset($target->$targetField) ? $target->$targetField : $value;
            }
        }
        // Not a foreign key, or no mapping found
        return $value;
    }

    if (isset($order) && count($order) > 0 && $rows->count() > 0) {
        try {
            $rows = $rows->map(function ($item) use ($order) {
                $newItem = [];

                foreach ($order as $key) {
                    if (array_key_exists($key, $item)) {
                        $newItem[$key] = $item[$key];
                    } else {
                        throw new \Exception("Column '$key' does not exist in the data.");
                    }
                }

                return $newItem;
            });
        } catch (\Throwable $th) {
            throw new \Exception('Error processing order: ' . $th->getMessage());
        }
    }
@endphp

@if (!$rows->count())
    <div class="p-6 text-center">
        {{ __('No data found in the table.') }}
    </div>
@else
    <div class="m-6 grid bg-gray-100 dark:bg-gray-700 rounded-lg overflow-hidden"
        style="grid-template-columns: {{ count($headerNames) ? 'repeat(' . count($headerNames) . ', minmax(0, 1fr))' : '' }}{{ $showActions || trim($slot ?? '') !== '' ? ' max-content' : '' }};">
        <!-- Header Row -->
        @foreach ($headerNames as $headerName)
            <div class="p-3">{{ __($headerName) }}</div>
        @endforeach
        @if ($showActions || trim($slot ?? '') !== '')
            <div class="p-3 max-w-fit">{{ __('Actions') }}</div>
        @endif

        <!-- Data Rows -->
        @foreach ($rows as $rowIndex => $row)
            @foreach ($row as $col => $value)
                <div title="{{ __('Click to copy.') }}"
                    class="p-3 overflow-clip cursor-pointer hover:bg-gray-100 dark:hover:bg-gray-700 {{ $rowIndex % 2 === 0 ? 'bg-white dark:bg-gray-500' : 'bg-gray-50 dark:bg-gray-600' }}"
                    onclick="navigator.clipboard.writeText('{{ $value }}')">
                    {{-- Show related value for foreign keys, fallback to raw value --}}
                    {{ resolveForeignKeyValue($col, $value, $foreignKeyMap, $connectingForeignKeyMap) }}
                </div>
            @endforeach
            @if ($showActions || trim($slot ?? '') !== '')
                <div
                    class="p-3 grid grid-cols-1 sm:grid-cols-3 gap-2 max-w-fit {{ $rowIndex % 2 === 0 ? 'bg-white dark:bg-gray-500' : 'bg-gray-50 dark:bg-gray-600' }}">
                    @if ($enableUpdate && isset($row['id']))
                        <form method="GET"
                            action="{{ route('data.edit', ['table' => $tableName, 'id' => $row['id'], 'view' => Route::currentRouteName()]) }}">
                            <button type="submit"
                                class="bg-indigo-700 hover:bg-indigo-500 p-2 rounded-md w-full">{{ __('Update') }}
                            </button>
                        </form>
                    @endif
                    @if ($enableDelete && isset($row['id']))
                        <form method="POST"
                            action="{{ route('data.delete', ['table' => $tableName, 'id' => $row['id']]) }}"
                            onsubmit="return confirm('{{ __('Are you sure?') }}')">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                class="bg-red-700 hover:bg-red-500 p-2 rounded-md w-full">{{ __('Delete') }}
                            </button>
                        </form>
                    @endif
                    {!! trim($slot ?? '') !!}
                </div>
            @endif
        @endforeach
    </div>
@endif
