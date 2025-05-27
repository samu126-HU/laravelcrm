    <x-app-layout>

        <x-slot name="breadcrumbs">
            <x-breadcrumbs :items="[['Dashboard' => '/dashboard']]" />
        </x-slot>


        <div class="rounded-md bg-gray-200 dark:bg-gray-800">
            <div class="overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-2xl">
                    <div class="grid lg:grid-cols-2 xl:grid-cols-3 gap-1 justify-center lg:justify-normal">
                        {{-- row 1 --}}
                        <div class=" col flex items-center justify-center text-center mb-2 w-full max-w-md h-[100px] lg:h-[250px] bg-center bg-cover bg-no-repeat"
                            style="background-image: url('images/1.jpg')">
                            <x-primary-button class="w-1/2 flex justify-center items-center lg:py-5" style="opacity: 0.90;">
                                Feladataim
                            </x-primary-button>    
                        </div>
                        <div class="col flex items-center justify-center text-center mb-2 w-full max-w-md h-[100px] lg:h-[250px] bg-center bg-cover bg-no-repeat"
                            style="background-image: url('images/2.jpg');">
                            <x-primary-button class="w-1/2 flex justify-center items-center lg:py-5" style="opacity: 0.90;">
                                Projektjeim (árajánlat)
                            </x-primary-button>

                        </div>
                        <div class="col flex items-center justify-center text-center mb-2 w-full max-w-md h-[100px] lg:h-[250px] bg-center bg-cover bg-no-repeat"
                            style="background-image: url('images/3.jpg');">
                            <x-primary-button class="w-1/2 flex justify-center items-center lg:py-5" style="opacity: 0.90;">
                                Projektjeim (értékesítés)
                            </x-primary-button>

                        </div>

                        {{-- row 2 --}}
                        <div class="col flex items-center justify-center text-center mb-2 w-full max-w-md h-[100px] lg:h-[250px] bg-center bg-cover bg-no-repeat"
                            style="background-image: url('images/4.jpg');">
                            <x-primary-button class="w-1/2 flex justify-center items-center lg:py-5" style="opacity: 0.90;">
                                Sikeres projektjeim
                            </x-primary-button>

                        </div>
                        <div class="col flex items-center justify-center text-center mb-2 w-full max-w-md h-[100px] lg:h-[250px] bg-center bg-cover bg-no-repeat"
                            style="background-image: url('images/5.jpg');">
                            <x-primary-button class="w-1/2 flex justify-center items-center lg:py-5" style="opacity: 0.90;">
                                Ügyfelek
                            </x-primary-button>

                        </div>
                        <div class="col flex items-center justify-center text-center mb-2 w-full max-w-md h-[100px] lg:h-[250px] bg-center bg-cover bg-no-repeat"
                            style="background-image: url('images/6.jpg');">
                            <x-primary-button class="w-1/2 flex justify-center items-center lg:py-5" style="opacity: 0.90;">
                                Munkatársak
                            </x-primary-button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </x-app-layout>
