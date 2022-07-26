<div>
    <x-jet-dialog-modal wire:model="confirmBannerAddModal">
        <x-slot name="title">
            <h2 class="font-medium text-base ml-auto">ویرایش تصویر بنر</h2>
        </x-slot>

        <x-slot name="content">
            <div class="col-span-12 sm:col-span-12">
                <div class="mt-3">
                    <div id="file-type-validation" class="p-5">
                        <div class="preview">
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
                                                <input wire:model="photo" type="file"/>
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
                                <div id="progressbar-label" class="p-5">
                                    <!-- Progress Bar -->
                                    <div x-show="isUploading" class="progress h-4 rounded">
                                        <div max="100" class="progress-bar w-full bg-green-500 rounded"
                                                  x-bind:value="progress"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <x-jet-input-error for="pictures" class="mt-2"/>
                    </div>
                </div>
            </div>
        </x-slot>
        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$set('confirmBannerAddModal', false)"
                                    class="btn btn-outline-secondary w-20 ml-1">
                {{ __('لغو') }}
            </x-jet-secondary-button>

            <x-jet-button class="ml-2 btn btn-primary w-20" wire:click="AddBanner()">
                {{ __('ذخیره') }}
            </x-jet-button>
        </x-slot>
    </x-jet-dialog-modal>
</div>

