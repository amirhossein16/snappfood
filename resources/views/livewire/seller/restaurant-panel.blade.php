<div class="py-12">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Restaurant Panel') }}
        </h2>
    </x-slot>
    @if(empty(auth()->user()->restaurantDetail->restaurant_categories_id))
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 sm:px-20 bg-white border-b border-gray-200">
                    <div id="alert-additional-content-4" class="p-4 mb-4 bg-yellow-100 rounded-lg dark:bg-yellow-200"
                         role="alert">
                        <div class="flex items-center">
                            <svg class="mr-2 w-5 h-5 text-yellow-700 dark:text-yellow-800" fill="currentColor"
                                 viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                      d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                                      clip-rule="evenodd"></path>
                            </svg>
                            <h3 class="text-lg font-medium text-yellow-700 dark:text-yellow-800">Incomplete
                                information</h3>
                        </div>
                        <div class="mt-2 mb-4 text-sm text-yellow-700 dark:text-yellow-800">
                            To access the restaurant admin panel, please complete your restaurant information !
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <x-jet-confirmation-modal wire:model="confirmingPanelModal">
            <x-slot name="title">
                {{ __('Incomplete information') }}
            </x-slot>

            <x-slot name="content">
                {{ __('To access the restaurant admin panel, please complete your restaurant information !') }}
            </x-slot>

            <x-slot name="footer">
            </x-slot>
        </x-jet-confirmation-modal>
    @endif
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
            <div class="p-6 sm:px-20 bg-white border-b border-gray-200">
                <label for="green-toggle" class="inline-flex relative items-center mr-5 cursor-pointer">
                    <input type="checkbox" wire:click="open" value="" id="green-toggle" class="sr-only peer"
                           wire:model.defer="opening"
                    >
                    <div
                        class="w-11 h-6 bg-gray-200 rounded-full peer dark:bg-gray-700 peer-focus:ring-4 peer-focus:ring-green-300 dark:peer-focus:ring-green-800 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-green-600"></div>
                    @if($opening)
                        <span class="ml-3 text-sm font-medium text-gray-900 dark:text-green-500">Open</span>
                    @else
                        <span class="ml-3 text-sm font-medium text-gray-900 dark:text-red-500">Close</span>
                    @endif
                </label>
                @foreach($detail as $det)
                    <div class="mb-6">
                        <x-jet-label for="RestaurantName"
                                     class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300"/>
                        Restaurant Name
                        <x-jet-input type="text" id="RestaurantName" wire:model.defer="Restaurant.name"
                                     class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                     placeholder="Restaurant Name . . . "/>
                        <x-jet-input-error for="Restaurant.name" class="mt-2"/>
                    </div>
                    <div class="mb-6">
                        <x-jet-label for="Address"
                                     class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300"/>
                        Restaurant
                        Address
                        <x-jet-input type="text" id="Address" wire:model.defer="Restaurant.address"
                                     class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                     placeholder="Restaurant Address . . . "/>
                        <x-jet-input-error for="Restaurant.address" class="mt-2"/>
                    </div>
                    <div class="mb-6">
                        <x-jet-label for="ShippingCost"
                                     class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300"/>
                        Shipping Cost
                        <x-jet-input type="number" min="0" max="100000" id="ShippingCost"
                                     wire:model.defer="Restaurant.ShippingCost"
                                     class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                     placeholder="Restaurant Shipping Cost . . . "/>
                        <x-jet-input-error for="Restaurant.ShippingCost" class="mt-2"/>
                    </div>
                    <div class="mb-6">
                        <x-jet-label for="Phone"
                                     class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300"/>
                        Restaurant
                        Phone
                        <x-jet-input type="text" id="Phone" wire:model.defer="Restaurant.phone"
                                     class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                     placeholder="Restaurant Phone . . . "/>
                        <x-jet-input-error for="Restaurant.phone" class="mt-2"/>
                    </div>
                    <div class="mb-6">
                        <x-jet-label for="Category"
                                     class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400"/>
                        Select your Restaurant Category
                        <select id="Category" wire:model.defer="Restaurant.restaurant_categories_id"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option disabled>Select Category</option>
                            @foreach($categories as $category)
                                <option value="{{$category->id}}">{{$category->RestaurantType}}</option>
                            @endforeach
                        </select>
                        <x-jet-input-error for="Restaurant.restaurant_categories_id" class="mt-2"/>
                    </div>
                    <div class="mb-6">
                        @if ($photo)
                            Photo Preview:
                            <img src="{{ $photo->temporaryUrl() }}" alt="Preview">
                        @endif
                        <div
                            x-data="{ isUploading: false, progress: 0 }"
                            x-on:livewire-upload-start="isUploading = true"
                            x-on:livewire-upload-finish="isUploading = false"
                            x-on:livewire-upload-error="isUploading = false"
                            x-on:livewire-upload-progress="progress = $event.detail.progress"
                        >
                            <!-- File Input -->
                            <input type="file" wire:model="photo">

                            <!-- Progress Bar -->
                            <div x-show="isUploading">
                                <progress max="100" x-bind:value="progress"></progress>
                            </div>
                            <x-jet-input-error for="photo" class="mt-2"/>
                        </div>
                    </div>
                    <div class="mb-6">
                        <x-jet-label for="Category"
                                     class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400"/>
                        Select your Restaurant Category
                        <x-maps-leaflet :center-point="['lat' => 35.701253490910126, 'long' => 51.34916022406515]"
                                        :zoom-level="6"
                                        :markers="[['lat' => 35.701253490910126, 'long' => 51.34916022406515]]"
                                        wire:model.defer="Restaurant.lat"></x-maps-leaflet>
                        <x-jet-input-error for="Restaurant.lat" class="mt-2"/>
                    </div>
                    <div class="mb-6">
                        <livewire:seller.week-opening-panel/>
                    </div>
                    {{--                    @include('component.timeInput')--}}
                    <button type="submit" wire:click.prevent="saveRestaurant"
                            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        Edit
                    </button>
            </div>
        </div>
        @endforeach
    </div>
</div>

