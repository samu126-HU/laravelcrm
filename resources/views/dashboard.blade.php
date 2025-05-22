<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl  leading-tight">
            <x-breadcrumbs :items="
                [
                    ['Dashboard' => '/']
                ]
                "
                 />
        </h2>
    </x-slot>

    <div class="rounded-md bg-gray-800">
            <div class="overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 ">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
