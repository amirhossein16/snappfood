<div>
    <x-jet-confirmation-modal wire:model="referralCommentModal">
        <x-slot name="title">
            {{ __('تایید دیدگاه') }}
        </x-slot>

        <x-slot name="content">
            {{ __('آیا از تایید دیدگاه مطمئن هستید ؟') }}
        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$set('referralCommentModal',false)">
                {{ __('لغو') }}
            </x-jet-secondary-button>

            <x-jet-danger-button class="btn btn-warning w-24" wire:click="referralModalComment"
                                 wire:loading.attr="disabled">
                {{ __('ارجاع') }}
            </x-jet-danger-button>
        </x-slot>
    </x-jet-confirmation-modal>
</div>
