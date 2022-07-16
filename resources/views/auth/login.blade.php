<x-guest-layout>
    <x-jet-authentication-card>
        <div class="block xl:grid grid-cols-2 gap-4">
            <!-- BEGIN: Login Info -->
            <x-slot name="LoginInfo">
                <x-jet-authentication-card-logo/>
            </x-slot>
            <!-- END: Login Info -->

            <!-- BEGIN: Login Form -->
            <x-slot name="LoginForm">
                <div
                    class="my-auto mx-auto xl:ml-20 bg-white dark:bg-dark-1 xl:bg-transparent px-5 sm:px-8 py-8 xl:p-0 rounded-md shadow-md xl:shadow-none w-full sm:w-3/4 lg:w-2/4 xl:w-auto">
                    <h2 class="intro-x font-bold text-2xl xl:text-3xl text-right xl:text-right ">
                        ورود
                    </h2>
                    <x-jet-validation-errors class="mb-4"/>

                    @if (session('status'))
                        <div class="mb-4 font-medium text-sm text-green-600">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="intro-x mt-2 text-gray-500 xl:hidden text-center ">چند کلیک دیگر برای ورود به اکانت خود
                        دارید .
                        همه حساب های تجارت الکترونیکی خود را در یک مکان مدیریت کنید
                    </div>
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="intro-x mt-8 ">
                            <input type="email"
                                   class="intro-x login__input form-control py-3 px-4 border-gray-300 block "
                                   name="email" :value="{!! old('email') !!}" id="email" placeholder="ایمیل" autofocus>
                            <input type="password" id="password"
                                   class="intro-x login__input form-control py-3 px-4 border-gray-300 block mt-4 "
                                   placeholder="رمزعبور" name="password" required autocomplete="current-password">
                        </div>
                        <div class="intro-x flex text-gray-700 dark:text-gray-600 text-xs sm:text-sm mt-4 ">
                            <div class="flex items-center ml-auto ">
                                <input id="remember_me" name="remember" type="checkbox"
                                       class="form-check-input border ml-2">
                                <label class="cursor-pointer select-none " for="remember_me">مرا به خاطر داشته
                                    باش</label>
                            </div>
                            @if (Route::has('password.request'))
                                <a href="{{ route('password.request') }}">
                                    {{ __('فراموشی رمز عبور؟') }}
                                </a>
                            @endif
                        </div>
                        <div class="intro-x mt-5 xl:mt-8 text-right xl:text-right">
                            <button class="btn btn-primary py-3 px-4 w-full xl:w-32 xl:mr-3 align-top"
                                    type="submit">{{ __('ورود') }}</button>
                            <button
                                class="btn btn-outline-secondary py-3 px-4 w-full xl:w-32 mt-3 xl:mt-0 align-top">{{ __('ثبت نام') }}
                            </button>
                        </div>
                    </form>
                    <div class="intro-x mt-10 xl:mt-24 text-gray-700 dark:text-gray-600 text-right xl:text-right">
                        با ورود شما تمامی شرایط زیر را میپذیرید
                        <br>
                        <a class="text-theme-17 dark:text-gray-300 " href="#!">قوانین و مقررات</a> و <a
                            class="text-theme-17 dark:text-gray-300 " href="#!">حریم شخصی</a>
                    </div>
                </div>
            </x-slot>
            <!-- END: Login Form -->
        </div>
    </x-jet-authentication-card>
</x-guest-layout>
