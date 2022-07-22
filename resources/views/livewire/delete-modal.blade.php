<div>
    <x-jet-confirmation-modal wire:model="confirmingCategoryDeletion">
        <x-slot name="title">
            {{ $modalHeading }}
        </x-slot>

        <x-slot name="content">
            {{$modalMessage}}
        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$set('confirmingCategoryDeletion',false)"
            >
                {{ __('لغو') }}
            </x-jet-secondary-button>

            <x-jet-danger-button class="btn btn-danger w-24" wire:click="deleteCategory"
                                 wire:loading.attr="disabled">
                {{ __('حذف') }}
            </x-jet-danger-button>
        </x-slot>
    </x-jet-confirmation-modal>
</div>
