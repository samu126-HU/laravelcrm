{{-- 
Usage example:
    <x-db-to-table tableName="users" headerString="ID, Name, Email" exclude="email_verified_at, password, 
remember_token, created_at, updated_at, role_id, avatar">

We always have to pass all attributes even if they are not used for safety reasons and ease of editing.
--}}
@php
    use Illuminate\Support\Facades\DB;

    $tableName = $tableName ?? '';
    $add = $add ?? false;
    $excludeCols = empty($exclude) ? [] : (is_string($exclude) ? array_map('trim', explode(',', $exclude)) : []);
    $headerNames = empty($headerString)
        ? []
        : (is_string($headerString)
            ? array_map('trim', explode(',', $headerString))
            : []);
    $enableDelete = $delete ?? false;
    $enableUpdate = $update ?? false;

    try {
        $rows = DB::table($tableName)->get();
    } catch (\Exception $e) {
        $rows = collect();
    }

    if ($rows->count() > 0) {
        if (empty($headerString)) {
            $headerNames = array_filter(array_keys((array) $rows->first()), function ($col) use ($excludeCols) {
                return !in_array($col, $excludeCols);
            });
        }

        $rows = $rows->map(function ($row) use ($excludeCols) {
            return collect($row)->except($excludeCols)->all();
        });
    }
    $showActions = $enableDelete || $enableUpdate;
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
            @foreach ($row as $value)
                <div title="{{ __('Click to copy.') }}"
                    class="p-3 overflow-clip cursor-pointer hover:bg-gray-100 dark:hover:bg-gray-700 {{ $rowIndex % 2 === 0 ? 'bg-white dark:bg-gray-500' : 'bg-gray-50 dark:bg-gray-600' }}"
                    onclick="navigator.clipboard.writeText('{{ $value }}')">
                    {{ $value }}
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
