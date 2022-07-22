<div>
    <livewire:delete-modal/>
    <livewire:edit-modal/>
    <!-- BEGIN: Content -->
    <div class="wrapper wrapper--top-nav">
        <div class="wrapper-box">
            <!-- BEGIN: Content -->
            <div class="content">
                @if(empty(auth()->user()->restaurantDetail->restaurant_categories_id))
                    <x-jet-confirmation-modal wire:model="confirmingPanelModal">
                        <x-slot name="title">
                            {{ __('اطلاعات ناقص') }}
                        </x-slot>

                        <x-slot name="content">
                            {{ __('برای دسترسی به پنل مدیریت رستوران، لطفا اطلاعات رستوران خود را تکمیل کنید !') }}
                        </x-slot>

                        <x-slot name="footer">
                        </x-slot>
                    </x-jet-confirmation-modal>
                @endif
                <div class="intro-y flex flex-col sm:flex-row items-center mt-8">

                    <x-tables.header>
                        تنظیمات رستوران
                    </x-tables.header>
                    <div class="mt-2 mx-4">
                        <div class="form-check">
                            @if($opening)
                                <label class="form-check-label" for="green-toggle">رستوران باز است</label>
                            @else
                                <label class="form-check-label" for="green-toggle">رستوران بسته است</label>
                            @endif
                            <input wire:click="open" id="green-toggle"
                                   wire:model.defer="opening" class="form-check-switch mr-2" type="checkbox">
                        </div>
                    </div>
                </div>
                <div class="intro-y box p-5 mt-5">
                    @foreach($detail as $det)
                        <div class="mb-6">
                            <div class="mt-3">
                                <label for="RestaurantName" class="form-label">نام رستوران
                                    <x-jet-input-error for="Restaurant.name" class="mt-2"/>
                                </label>
                                <input id="RestaurantName" wire:model.defer="Restaurant.name" type="text"
                                       class="form-control form-control-rounded" placeholder="نام رستوران . . .">
                            </div>
                        </div>
                        <div class="mb-6">
                            <div class="mt-3">
                                <label for="Address" class="form-label">آدرس رستوران
                                    <x-jet-input-error for="Restaurant.address" class="mt-2"/>
                                </label>
                                <input id="Address" wire:model.defer="Restaurant.address" type="text"
                                       class="form-control form-control-rounded" placeholder="آدرس رستوران . . .">
                            </div>
                        </div>
                        <div class="mb-6">
                            <div class="mt-3">
                                <label for="ShippingCost" class="form-label">هزینه ارسال
                                    <x-jet-input-error for="Restaurant.ShippingCost" class="mt-2"/>
                                </label>
                                <input type="number" min="0" max="100000" id="ShippingCost"
                                       wire:model.defer="Restaurant.ShippingCost"
                                       class="form-control form-control-rounded" placeholder="هزینه ارسال . . .">
                            </div>
                        </div>
                        <div class="mb-6">
                            <div class="mt-3">
                                <label for="Phone" class="form-label">شماره تماس
                                    <x-jet-input-error for="Restaurant.phone" class="mt-2"/>
                                </label>
                                <input type="text" id="Phone" wire:model.defer="Restaurant.phone"
                                       class="form-control form-control-rounded" placeholder="شماره تماس . . .">
                            </div>
                        </div>
                        <div class="mb-6">
                            <div class="mt-3">
                                <label for="Category">دسته بندی رستوران
                                    <x-jet-input-error for="Restaurant.restaurant_categories_id" class="mt-2"/>
                                </label>
                                <div class="mt-2">
                                    <select data-search="true" class="tail-select w-full" id="Category"
                                            wire:model.defer="Restaurant.restaurant_categories_id">
                                        <optgroup label="دسته بندی رستوران خود را انتخاب نمایید">
                                            @foreach($categories as $category)
                                                <option value="{{$category->id}}">{{$category->RestaurantType}}</option>
                                            @endforeach
                                        </optgroup>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="mb-6">
                            @php
                                $filename = str_replace(' ','_',auth()->user()->restaurantDetail->name)
                            @endphp
                            @if(asset("storage/photos/Restaurant/$filename".'.png'))
                                <img src="{{ asset("storage/photos/Restaurant/$filename".'.png') }}" alt="RestaurantBaner"/>
                            @endif
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
                                <div id="file-type-validation" class="p-5">
                                    <div class="preview">
                                        <div class="dropzone">
                                            <div class="fallback">
                                                <input wire:model="photo" type="file" multiple/>
                                            </div>
                                            <div class="dz-message" data-dz-message>
                                                <div class="text-lg font-medium">فایل خود را اینجا بکشید و رها کنید
                                                </div>
                                                <div class="text-gray-600">این تنها یک دمو از دراپ زون است<span
                                                        class="font-medium"> نه </span>فایل آپلود شده
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Progress Bar -->
                                <div x-show="isUploading">
                                    <progress max="100" x-bind:value="progress"></progress>
                                </div>
                                <x-jet-input-error for="photo" class="mt-2"/>
                            </div>
                        </div>
                        <div class="mb-6">
                            <livewire:seller.week-opening-panel/>
                        </div>
                        <div class="mb-6">
                            <div class="mt-3">
                                <label for="Location" class="form-label">لوکیشن رستوران</label>
                                <x-jet-input-error for="Restaurant.lat" class="mt-2"/>
                                <x-maps-leaflet
                                    :center-point="['lat' => 35.701253490910126, 'long' => 51.34916022406515]"
                                    :zoom-level="6"
                                    :markers="[['lat' => 35.701253490910126, 'long' => 51.34916022406515]]"
                                    wire:model.defer="Restaurant.lat"
                                    class="w-3/4 h-1/2 mx-auto border border-solid border-indigo-400 border-b-violet-700"></x-maps-leaflet>
                            </div>
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
</div>
<!-- END: Content -->

