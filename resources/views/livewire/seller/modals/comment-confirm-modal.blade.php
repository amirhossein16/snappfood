<div>
    <x-jet-confirmation-modal wire:model="ConfirmCommentModal">
        <x-slot name="title">
            {{ __('تایید دیدگاه') }}
        </x-slot>

        <x-slot name="content">
            {{ __('آیا از تایید دیدگاه مطمئن هستید ؟') }}
        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$set('ConfirmCommentModal',false)">
                {{ __('Conceal') }}
            </x-jet-secondary-button>

            <x-jet-danger-button class="btn btn-danger w-24" wire:click="ConfirmModalComment"
                                 wire:loading.attr="disabled">
                {{ __('Delete') }}
            </x-jet-danger-button>
        </x-slot>
    </x-jet-confirmation-modal>
</div>
