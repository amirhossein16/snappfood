<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="LoginInfo">
            <x-jet-authentication-card-logo/>
        </x-slot>

        <x-slot name="LoginForm">
            <div
                class="my-auto mx-auto xl:ml-20 bg-white dark:bg-dark-1 xl:bg-transparent px-5 sm:px-8 py-8 xl:p-0 rounded-md shadow-md xl:shadow-none w-full sm:w-3/4 lg:w-2/4 xl:w-auto">
                <h2 class="intro-x font-bold text-2xl xl:text-3xl text-right xl:text-right ">
                    چالش دو عاملی </h2>
                <div x-data="{ recovery: false }">
                    <div class="mb-4 text-sm text-gray-600" x-show="! recovery">
                        {{ __('لطفاً با وارد کردن کد احراز هویت ارائه شده توسط برنامه احراز هویت خود، دسترسی به حساب خود را تأیید کنید.') }}
                    </div>

                    <div class="mb-4 text-sm text-gray-600" x-show="recovery">
                        {{ __('لطفاً با وارد کردن یکی از کدهای بازیابی اضطراری خود، دسترسی به حساب خود را تأیید کنید.') }}
                    </div>

                    <x-jet-validation-errors class="mb-4"/>

                    <form method="POST" action="{{ route('two-factor.login') }}">
                        @csrf

                        <div class="intro-x mt-8">
                            <label for="code" value="{{ __('Code') }}"/>
                            <input id="code" :value="{!! old('email', $request->email) !!}"
                                   class="intro-x login__input form-control py-3 px-4 border-gray-300 block mt-4 "
                                   placeholder="{!! __('ایمیل') !!}" type="text" inputmode="numeric" name="code"
                                   autofocus x-ref="code" autocomplete="one-time-code" x-show="! recovery">

                            <label for="recovery_code" value="{{ __('Recovery Code') }}"/>
                            <input id="recovery_code" :value="{!! old('email', $request->email) !!}"
                                   class="intro-x login__input form-control py-3 px-4 border-gray-300 block mt-4 "
                                   placeholder="{!! __('ایمیل') !!}" type="text" name="recovery_code"
                                   x-ref="recovery_code" autocomplete="one-time-code" x-show="recovery">
                        </div>
                        <div class="flex items-center justify-end mt-4">
                            <button type="button"
                                    class="text-sm text-gray-600 hover:text-gray-900 underline cursor-pointer"
                                    x-show="! recovery"
                                    x-on:click="
                                        recovery = true;
                                        $nextTick(() => { $refs.recovery_code.focus() })
                                    ">
                                {{ __('از کد بازیابی استفاده کنید') }}
                            </button>

                            <button type="button"
                                    class="text-sm text-gray-600 hover:text-gray-900 underline cursor-pointer"
                                    x-show="recovery"
                                    x-on:click="
                                        recovery = false;
                                        $nextTick(() => { $refs.code.focus() })
                                    ">
                                {{ __('از کد احراز هویت استفاده کنید') }}
                            </button>

                            <div class="intro-x mt-5 xl:mt-8 text-right xl:text-right ">
                                <button class="btn btn-primary py-3 px-4 w-full xl:w-32 xl:mr-3 align-top"
                                        type="submit">{{ __('بازنشانی') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </x-slot>
    </x-jet-authentication-card>
</x-guest-layout>
