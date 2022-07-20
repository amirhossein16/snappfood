<div>
    <x-jet-dialog-modal wire:model="confirmAndAnswerCommentModal">
        <x-slot name="title">
            <h2 class="font-medium text-base ml-auto">
                {{ __('پاسخ به نظر کاربر') }}</h2>
        </x-slot>

        <x-slot name="content">
            <div class="col-span-12 sm:col-span-12">
                <div class="mt-3">
                    <label for="UserComment" class="form-label">{{ __('نظر کاربر') }}</label>
                    <input id="UserComment" type="text" class="mt-1 block w-full disabled:opacity-50 disabled:cursor-not-allowed disabled:select-none"
                           disabled
                           wire:model.defer="comment.opinion">
                    <x-jet-input-error for="comment.opinion" class="mt-2"/>
                </div>
                <div class="mt-3">
                    <label for="name" class="form-label">{{ __('پاسخ شما') }}</label>
                    <input id="name" type="text" class="form-control form-control-rounded"
                           placeholder="{{ __('پاسخ شما') }}. . ."
                           wire:model.defer="comments.response">
                    <x-jet-input-error for="comments.response" class="mt-2"/>
                </div>
            </div>
        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$set('confirmAndAnswerCommentModal', false)"
                                    class="btn btn-outline-secondary w-20 ml-1">
                {{ __('لغو') }}
            </x-jet-secondary-button>

            <x-jet-button class="ml-2 btn btn-primary w-20" wire:click="saveAnswer()">
                {{ __('ذخیره') }}
            </x-jet-button>
        </x-slot>
    </x-jet-dialog-modal>
</div>


<x-jet-dialog-modal wire:model="ConfirmAnswerComments">
    <x-slot name="title">
        {{ isset($this->food->id) ? 'Edit Product' : 'Add Product' }}
    </x-slot>

    <x-slot name="content">
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="name" value="{{ __('نظر کاربر') }}"/>
            <x-jet-input id="name" type="text"
                         class="mt-1 block w-full disabled:opacity-50 disabled:cursor-not-allowed disabled:select-none"
                         disabled
                         wire:model.defer="comment.opinion"/>
            <x-jet-input-error for="comment.opinion" class="mt-2"/>
        </div>
        <div class="col-span-6 sm:col-span-4 mt-6">
            <x-jet-label for="name" value="{{ __('پاسخ شما') }}"/>
            <x-jet-input id="name" type="text" class="mt-1 block w-full"
                         wire:model.defer="comments.response"/>
            <x-jet-input-error for="comments.response" class="mt-2"/>
        </div>
    </x-slot>

    <x-slot name="footer">
        <x-jet-secondary-button wire:click="$set('ConfirmAnswerComments', false)"
                                wire:loading.attr="disabled">
            {{ __('Conceal') }}
        </x-jet-secondary-button>

        <x-jet-danger-button class="ml-2" wire:click="saveAnswer()" wire:loading.attr="disabled">
            {{ __('Save') }}
        </x-jet-danger-button>
    </x-slot>
</x-jet-dialog-modal>
