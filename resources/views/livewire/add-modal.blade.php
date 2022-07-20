<div>
    <x-jet-dialog-modal wire:model="confirmingCategoryUpdate">
        <x-slot name="title">
            {{ isset($this->foodCategory->id) ? 'Edit Product' : 'Add Product' }}
        </x-slot>

        <x-slot name="content">
            <div class="col-span-6 sm:col-span-4">
                <x-jet-label for="name" value="{{ __('Name') }}"/>
                <x-jet-input id="name" type="text" class="mt-1 block w-full"
                             wire:model.defer="foodCategory.FoodType"/>
                <x-jet-input-error for="foodCategory.FoodType" class="mt-2"/>
            </div>
        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$set('confirmingCategoryUpdate', false)"
                                    wire:loading.attr="disabled">
                {{ __('Conceal') }}
            </x-jet-secondary-button>

            <x-jet-danger-button class="ml-2" wire:click="saveCategory()" wire:loading.attr="disabled">
                {{ __('Save') }}
            </x-jet-danger-button>
        </x-slot>
    </x-jet-dialog-modal>
</div>
