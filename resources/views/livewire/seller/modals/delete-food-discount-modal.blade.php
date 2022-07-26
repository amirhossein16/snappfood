<div>
    <x-jet-confirmation-modal wire:model="deleteDiscountModalConfirm">
        <x-slot name="title">
            حذف کد تخفیف
        </x-slot>

        <x-slot name="content">
            @if(isset($this->food))
                آیا از حذف کد تخفیف غذای {{$this->food->title}} مطمئن هستید ؟
            @endif
        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$set('deleteDiscountModalConfirm',false)"
            >
                {{ __('خیر') }}
            </x-jet-secondary-button>

            <x-jet-danger-button class="btn btn-danger w-24" wire:click="deleteDiscountFood"
                                 wire:loading.attr="disabled">
                {{ __('بله') }}
            </x-jet-danger-button>
        </x-slot>
    </x-jet-confirmation-modal>
</div>
