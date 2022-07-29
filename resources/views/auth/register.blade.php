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
                        ثبت نام
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
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="intro-x mt-8 ">
                            <label for="name"></label>
                            <input type="text" id="name" name="name" :value="{!! old('name') !!}"
                                   class="intro-x login__input form-control py-3 px-4 border-gray-300 block "
                                   placeholder="نام" required>
                            <label for="email"></label>
                            <input type="email" id="email" name="email"
                                   :value="{!! old('email') !!}"
                                   class="intro-x login__input form-control py-3 px-4 border-gray-300 block mt-4 "
                                   placeholder="ایمیل" required>
                            <div class="flex flex-col sm:flex-row my-8 justify-around">
                                <div class="form-check ml-2">
                                    <input class="form-check-input" type="radio" name="role" id="seller" value="seller"
                                           checked>
                                    <label class="form-check-label" for="seller">فروشنده</label>
                                </div>
                                <div class="form-check ml-2 mt-2 sm:mt-0">
                                    <input class="form-check-input" type="radio" name="role" id="User" value="user">
                                    <label class="form-check-label" for="User">کاربر</label>
                                </div>
                            </div>
                            <label for="password"></label>
                            <input type="password" name="password" id="password"
                                   autocomplete="new-password"
                                   class="intro-x login__input form-control py-3 px-4 border-gray-300 block mt-4 "
                                   placeholder="رمزعبور" required>
                            <label for="password_confirmation"></label>
                            <input type="password" id="password_confirmation"
                                   class="intro-x login__input form-control py-3 px-4 border-gray-300 block mt-4 "
                                   placeholder="تایید رمزعبور" name="password_confirmation" required
                                   autocomplete="new-password">
                        </div>
                        <div
                            class="intro-x flex items-center text-gray-700 dark:text-gray-600 mt-4 text-xs sm:text-sm ">
                            <input id="remember-me " type="checkbox" class="form-check-input border ml-2 ">
                            <label class="cursor-pointer select-none " for="remember-me ">من را بخاطر بسپار</label>
                        </div>
                        @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                            <div class="mt-4">
                                <x-jet-label for="terms">
                                    <div class="flex items-center">
                                        <x-jet-checkbox name="terms" id="terms" />
                                        <div class="ml-2">
                                            {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                                    'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Terms of Service').'</a>',
                                                    'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Privacy Policy').'</a>',
                                            ]) !!}
                                        </div>
                                    </div>
                                </x-jet-label>
                            </div>
                        @endif
                        <div class="intro-x mt-5 xl:mt-8 text-right xl:text-right ">
                            <button class="btn btn-primary py-3 px-4 w-full xl:w-32 xl:mr-3 align-top"
                                    type="submit">{{ __('ثبت نام') }}
                            </button>
                            <a href="{{ route('login') }}"
                               class="btn btn-outline-secondary py-3 px-4 w-full xl:w-32 mt-3 xl:mt-0 align-top ">
                                {{ __('ورود') }}
                            </a>
                        </div>
                    </form>
                </div>
            </x-slot>
            <!-- END: Login Form -->
        </div>
    </x-jet-authentication-card>
</x-guest-layout>
