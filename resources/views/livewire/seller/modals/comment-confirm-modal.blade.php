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
                {{ __('لغو') }}
            </x-jet-secondary-button>

            <button class="btn btn-elevated-success w-24" wire:click="ConfirmModalComment"
                                 wire:loading.attr="disabled">
                {{ __('تایید') }}
            </button>
        </x-slot>
    </x-jet-confirmation-modal>
</div>
