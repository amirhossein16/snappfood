<div>
    <x-jet-dialog-modal wire:model="confirmRestaurantLocationModal">
        <x-slot name="title">
            <h2 class="font-medium text-base ml-auto">افزودن غذای به فودپارتی</h2>
        </x-slot>

        <x-slot name="content">
            <div class="col-span-12 sm:col-span-12" wire:ignore>
                <div class="mb-6">
                    <div class="mt-3">
                        <label for="Location" class="form-label">لوکیشن رستوران</label>
                        <x-jet-input-error for="lat" class="mt-2" />
                        <x-maps-leaflet
                        :center-point="['lat' => 35.701253490910126, 'long' => 51.34916022406515]"
                        :zoom-level="18"
                        :markers="[['lat' => 35.701253490910126, 'long' => 51.34916022406515]]"
                        wire:model.click="$emit('saveLocation')"
                        class="w-full h-3 mx-auto border border-solid border-indigo-400 border-b-violet-700">
                    </x-maps-leaflet>
                    </div>
                </div>
            </div>
        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$set('confirmRestaurantLocationModal', false)" class="btn btn-outline-secondary w-20 ml-1">
                {{ __('لغو') }}
            </x-jet-secondary-button>

            <x-jet-button class="ml-2 btn btn-primary w-20" wire:click="EditLocation()">
                {{ __('ذخیره') }}
            </x-jet-button>
        </x-slot>
    </x-jet-dialog-modal>
</div>
