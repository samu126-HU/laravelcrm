<x-app-layout>
    <x-success />
    <x-error /

    <x-db-to-table tableName="projects" order="id, contactcustomer_id, deadline, group_id" headerString="ID, Contact person, Deadline, Group" exclude="name, description, price, working_hour, status, currency_id, user_id, created_at, updated_at" update delete/>
</x-app-layout>