<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="LoginInfo">
            <x-jet-authentication-card-logo/>
        </x-slot>

        <x-slot name="LoginForm">
            <div
                class="my-auto mx-auto xl:ml-20 bg-white dark:bg-dark-1 xl:bg-transparent px-5 sm:px-8 py-8 xl:p-0 rounded-md shadow-md xl:shadow-none w-full sm:w-3/4 lg:w-2/4 xl:w-auto">
                <h2 class="intro-x font-bold text-2xl xl:text-3xl text-right xl:text-right ">
                    تایید ایمیل
                </h2>

                <div class="mb-4 text-sm text-gray-600">
                    {{ __('قبل از ادامه، آیا می توانید آدرس ایمیل خود را با کلیک کردن روی پیوندی که به تازگی برای شما ایمیل فرستادیم تأیید کنید؟ اگر ایمیل را دریافت نکردید، با کمال میل یک ایمیل دیگر برای شما ارسال خواهیم کرد.') }}
                </div>

                @if (session('status') == 'verification-link-sent')
                    <div class="mb-4 font-medium text-sm text-green-600">
                        {{ __('یک پیوند تأیید جدید به آدرس ایمیلی که در تنظیمات نمایه خود ارائه کرده اید ارسال شده است.') }}
                    </div>
                @endif

                <div class="mt-4 flex items-center justify-between">
                    <form method="POST" action="{{ route('verification.send') }}">
                        @csrf
                        <div class="intro-x mt-5 xl:mt-8 text-right xl:text-right ">
                            <button class="btn btn-primary py-3 px-4 w-full xl:w-32 xl:mr-3 align-top"
                                    type="submit">{{ __('ایمیل تایید را دوباره بفرست') }}
                            </button>
                        </div>
                    </form>

                    <div class="intro-x mt-5 xl:mt-8 text-right xl:text-right ">
                        <a
                            href="{{ route('profile.show') }}"
                            class="btn btn-primary py-3 px-4 w-full xl:w-32 xl:mr-3 align-top"
                        >
                            {{ __('ویرایش پروفایل') }}</a>

                        <form method="POST" action="{{ route('logout') }}" class="inline">
                            @csrf

                            <button type="submit"
                                    class="btn btn-outline-secondary py-3 px-4 w-full xl:w-32 mt-3 xl:mt-0 align-top">
                                {{ __('خروج') }}
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </x-slot>
    </x-jet-authentication-card>
</x-guest-layout>
