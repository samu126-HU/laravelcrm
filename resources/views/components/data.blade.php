<x-app-layout>
    <div class="flex justify-center items-center min-h-screen">
        <div class="w-full max-w-lg m-6 bg-gray-50 dark:bg-gray-700 rounded-lg shadow-lg p-8">
            <h2 class="text-2xl font-bold mb-6 text-gray-800 dark:text-gray-100 text-center">
                {{ __('Update Record in') }} {{ ucfirst($table) }}
            </h2>

            @if(session('error'))
                <div class="mb-4 p-3 bg-red-100 text-red-700 rounded dark:bg-red-800 dark:text-red-200 text-center">
                    {{ session('error') }}
                </div>
            @endif

            <form action="{{ route('data.update', ['table' => $table, 'id' => $record->id, "view" => $view]) }}" method="POST" class="space-y-6">
                @csrf
                @method('PUT')

                @foreach($record as $field => $value)
                    @if($field !== 'id' && $field !== 'created_at' && $field !== 'updated_at')
                        <div>
                            <label class="block mb-2 text-sm font-medium text-gray-700 dark:text-gray-200">{{ ucfirst($field) }}</label>
                            <input type="text" name="{{ $field }}" class="w-full px-4 py-2 rounded border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-100 focus:outline-none focus:ring-2 focus:ring-indigo-500" value="{{ old($field, $value) }}">
                        </div>
                    @endif
                @endforeach

                <div class="flex justify-between gap-4 mt-8">
                    <button type="submit" class="bg-indigo-700 hover:bg-indigo-500 text-white font-semibold px-6 py-2 rounded-md transition-colors duration-200">
                        {{ __('Update') }}
                    </button>
                    <a href="{{ url()->previous() }}" class="bg-gray-300 hover:bg-gray-400 dark:bg-gray-600 dark:hover:bg-gray-500 text-gray-800 dark:text-gray-100 font-semibold px-6 py-2 rounded-md transition-colors duration-200 text-center">
                        {{ __('Cancel') }}
                    </a>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>