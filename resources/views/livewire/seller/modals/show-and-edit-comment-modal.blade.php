<div>
    <x-jet-dialog-modal wire:model="ShowAndEditConfirm">
        <x-slot name="title">
            <h2 class="font-medium text-base ml-auto">
                {{ __('ویرایش پاسخ به نظر کاربر') }}</h2>
        </x-slot>

        <x-slot name="content">
            <div class="col-span-12 sm:col-span-12">
                <div class="mt-3">
                    <label for="UserComment" class="form-label">{{ __('نظر کاربر') }}</label>
                    <input id="UserComment" type="text" class="mt-1 block w-full disabled:opacity-50 disabled:cursor-not-allowed disabled:select-none"
                           disabled
                           wire:model.defer="comment">
                    <x-jet-input-error for="comment" class="mt-2"/>
                </div>
                <div class="mt-3">
                    <label for="name" class="form-label">{{ __('پاسخ شما') }}</label>
                    <input id="name" type="text" class="form-control form-control-rounded"
                           placeholder="{{ __('پاسخ شما') }}. . ."
                           wire:model.defer="sellerComment.opinion">
                    <x-jet-input-error for="sellerComment.opinion" class="mt-2"/>
                </div>
            </div>
        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$set('ShowAndEditConfirm', false)"
                                    class="btn btn-outline-secondary w-20 ml-1">
                {{ __('لغو') }}
            </x-jet-secondary-button>

            <x-jet-button class="ml-2 btn btn-primary w-20" wire:click="editAnswer()">
                {{ __('ذخیره') }}
            </x-jet-button>
        </x-slot>
    </x-jet-dialog-modal>
</div>
