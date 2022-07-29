<div>
    <x-jet-confirmation-modal wire:model="RestoreCommentModal">
        <x-slot name="title">
            {{ $modalHeading }}
        </x-slot>

        <x-slot name="content">
            <span class="text-red-500 font-medium text-lg">متن دیدگاه : &nbsp;&nbsp;&nbsp;</span> {{$modalMessage}}
        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$set('RestoreCommentModal',false)"
            >
                {{ __('لغو') }}
            </x-jet-secondary-button>

            <x-jet-danger-button class="btn btn-success w-24" wire:click="Restore"
                                 wire:loading.attr="disabled">
                {{ __('بازگردانی') }}
            </x-jet-danger-button>
        </x-slot>
    </x-jet-confirmation-modal>
</div>
