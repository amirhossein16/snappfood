<div>
    <x-jet-dialog-modal wire:model="confirmRestaurantProfileModal">
        <x-slot name="title">
            <h2 class="font-medium text-base ml-auto">افزودن غذای به فودپارتی</h2>
        </x-slot>

        <x-slot name="content">
            <div class="col-span-12 sm:col-span-12">
                <div class="my-3">
                    @php
                        $filename = str_replace(' ','_',auth()->user()->restaurantDetail->name)
                    @endphp
                    @if(!empty(asset("storage/photos/Restaurant/$filename".'.jpg')))
                        <img src="{{ asset("storage/photos/Restaurant/$filename".'.jpg') }}"
                             alt="RestaurantBaner" class="w-1/4 h-1/4 mx-auto"/>
                    @endif
                    @if ($photo)
                        Photo Preview:
                        <img src="{{ $photo[0]->temporaryUrl() }}" class="w-1/2 h-1/2" alt="Preview">
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
                            <div max="100" class="progress-bar w-full bg-green-500 rounded"
                                 x-bind:value="progress"></div>
                        </div>
                        <x-jet-input-error for="photo" class="mt-2"/>
                    </div>
                </div>
            </div>
        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$set('confirmRestaurantProfileModal', false)"
                                    class="btn btn-outline-secondary w-20 ml-1">
                {{ __('لغو') }}
            </x-jet-secondary-button>

            <x-jet-button class="ml-2 btn btn-primary w-20" wire:click="EditProfilePhoto()">
                {{ __('ذخیره') }}
            </x-jet-button>
        </x-slot>
    </x-jet-dialog-modal>
</div>
