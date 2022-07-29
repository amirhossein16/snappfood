<div>
    <x-jet-dialog-modal wire:model="confirmingCategoryUpdate">
        <x-slot name="title">
            <h2 class="font-medium text-base ml-auto">
                {{ __('ویرایش دسته بندی') }}</h2>
        </x-slot>

        <x-slot name="content">
            <div class="col-span-12 sm:col-span-12">
                <div class="mt-3">
                    <label for="name" class="form-label">نام دسته بندی</label>
                    <input id="name" type="text" class="form-control form-control-rounded"
                           placeholder="نام دسته بندی . . ."
                           wire:model.defer="restaurantCategory.RestaurantType">
                    <x-jet-input-error for="restaurantCategory.RestaurantType" class="mt-2"/>
                </div>
            </div>
        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$set('confirmingCategoryUpdate', false)"
                                    wire:loading.attr="disabled" class="btn btn-outline-secondary w-20 ml-1">
                {{ __('لغو') }}
            </x-jet-secondary-button>

            <x-jet-button class="ml-2 btn btn-primary w-20" wire:click="saveCategory()"
                          wire:loading.attr="disabled">
                {{ __('ویرایش') }}
            </x-jet-button>
        </x-slot>
    </x-jet-dialog-modal>
</div>
