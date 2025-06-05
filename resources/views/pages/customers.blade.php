<x-app-layout>

    <x-db-to-table tableName="users" headerString="ID, Name, Email"
        exclude="email_verified_at, password, 
remember_token, created_at, updated_at, role_id, avatar" update delete>


        <button class="bg-indigo-700 hover:bg-indigo-500 p-2 rounded-md w-full">{{ __('Projects (price offers)') }}
        </button>

        <button class="bg-indigo-700 hover:bg-indigo-500 p-2 rounded-md w-full">{{ __('Contacts') }}
        </button>

        <button class="bg-indigo-700 hover:bg-indigo-500 p-2 rounded-md w-full">{{ __('Details') }}
        </button>

        <button class="bg-indigo-700 hover:bg-indigo-500 p-2 rounded-md w-full">{{ __('Failed Projects') }}
        </button>

        <button class="bg-indigo-700 hover:bg-indigo-500 p-2 rounded-md w-full">{{ __('Successful Projects') }}
        </button>

        <button class="bg-indigo-700 hover:bg-indigo-500 p-2 rounded-md w-full">{{ __('Current Projects') }}
        </button>

    </x-db-to-table>

</x-app-layout>
