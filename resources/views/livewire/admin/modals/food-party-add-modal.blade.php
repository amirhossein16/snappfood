<div>
    <x-jet-dialog-modal wire:model="confirmFoodPartyAddModal">
        <x-slot name="title">
            <h2 class="font-medium text-base ml-auto">
                {{ __('افزودن فودپارتی') }}</h2>
        </x-slot>

        <x-slot name="content">
            <div class="col-span-12 sm:col-span-12">
                <div class="mt-3">
                    <label for="name" class="form-label">نام فودپارتی</label>
                    <input id="name" type="text" class="form-control form-control-rounded"
                           placeholder="نام فودپارتی . . ."
                           wire:model.defer="foodParty.foodPartyName">
                    <x-jet-input-error for="foodParty.foodPartyName" class="mt-2"/>
                </div>
            </div>
        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$set('confirmFoodPartyAddModal', false)"
                                    wire:loading.attr="disabled" class="btn btn-outline-secondary w-20 ml-1">
                {{ __('لغو') }}
            </x-jet-secondary-button>

            <x-jet-button class="ml-2 btn btn-primary w-20" wire:click="addFoodPart()" wire:loading.attr="disabled">
                {{ __('ذخیره') }}
            </x-jet-button>
        </x-slot>
    </x-jet-dialog-modal>
</div>
