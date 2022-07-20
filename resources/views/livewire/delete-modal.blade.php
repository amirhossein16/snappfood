<div>
    <x-jet-confirmation-modal wire:model="confirmingCategoryDeletion">
        <x-slot name="title">
            {{ __('Delete Product') }}
        </x-slot>

        <x-slot name="content">
            {{ __('Are you sure you want to delete Product? ') }}
        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button wire:click="CandelDelete"
            >
                {{ __('Conceal') }}
            </x-jet-secondary-button>

            <x-jet-danger-button class="btn btn-danger w-24" wire:click="deleteCategory({{ $data }})"
                                 wire:loading.attr="disabled">
                {{ __('Delete') }}
            </x-jet-danger-button>
        </x-slot>
    </x-jet-confirmation-modal>
</div>
