<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="LoginInfo">
            <x-jet-authentication-card-logo/>
        </x-slot>

        <x-slot name="LoginForm">
            <div
                class="my-auto mx-auto xl:ml-20 bg-white dark:bg-dark-1 xl:bg-transparent px-5 sm:px-8 py-8 xl:p-0 rounded-md shadow-md xl:shadow-none w-full sm:w-3/4 lg:w-2/4 xl:w-auto">
                <h2 class="intro-x font-bold text-2xl xl:text-3xl text-right xl:text-right ">
                    بازنشانی رمزعبور
                </h2>
                <div class="my-4 text-sm text-gray-600">
                    {{ __('رمز عبور خود را فراموش کرده اید؟ مشکلی نیست. فقط آدرس ایمیل خود را به ما اطلاع دهید و ما یک پیوند بازنشانی رمز عبور را برای شما ایمیل می کنیم که به شما امکان می دهد رمز جدیدی را انتخاب کنید.') }}
                </div>

                @if (session('status'))
                    <div class="mb-4 font-medium text-sm text-green-600">
                        {{ session('status') }}
                    </div>
                @endif

                <x-jet-validation-errors class="mb-4"/>
                <form method="POST" action="{{ route('password.email') }}">
                    @csrf

                    <div class="intro-x mt-8 ">
                        <label for="email"></label>
                        <input type="email" id="email" name="email"
                               :value="{!! old('email') !!}"
                               class="intro-x login__input form-control py-3 px-4 border-gray-300 block mt-4 "
                               placeholder="{!! __('ایمیل') !!}" required autofocus>
                    </div>
                    <div class="intro-x mt-5 xl:mt-8 text-right xl:text-right ">
                        <button class="btn btn-primary py-3 px-4 w-full xl:w-32 xl:mr-3 align-top"
                                type="submit">{{ __('بازنشانی') }}
                        </button>
                    </div>
                </form>
            </div>
        </x-slot>
    </x-jet-authentication-card>
</x-guest-layout>
