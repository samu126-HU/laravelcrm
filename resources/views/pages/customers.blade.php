<x-app-layout>

    <x-db-to-table tableName="users" headerString="ID, Name, Email" exclude="email_verified_at, password, 
remember_token, created_at, updated_at"/>

</x-app-layout>