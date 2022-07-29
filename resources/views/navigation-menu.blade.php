<div>
    <!-- BEGIN: Mobile Menu -->
    <div class="mobile-menu md:hidden">
        <div class="mobile-menu-bar">
            <a href="" class="flex ml-auto">
                <img alt="Icewall Tailwind HTML Admin Template" class="w-6" src="dist/images/logo.svg">
            </a>
            <a href="javascript:;" id="mobile-menu-toggler"> <i data-feather="bar-chart-2"
                                                                class="w-8 h-8 text-white transform -rotate-90"></i>
            </a>
        </div>
        <ul class="border-t border-theme-2 py-5 hidden">
            <li>
                <x-jet-nav-link
                    href="{{ route('Admin') }}"
                    :active="request()->routeIs('Admin')" class="menu menu--active">
                    <div class="menu__icon"><i data-feather="home"></i></div>
                    <div class="menu__title"> داشبورد </div>
                </x-jet-nav-link>
            </li>
            <li>
                <a href="javascript:;" class="menu">
                    <div class="menu__icon"><i data-feather="box"></i></div>
                    <div class="menu__title"> چینش منو <i data-feather="chevron-down" class="menu__sub-icon "></i></div>
                </a>
                <ul class="">
                    <li>
                        <a href="index.html" class="menu">
                            <div class="menu__icon"><i data-feather="activity"></i></div>
                            <div class="menu__title"> منو کنار</div>
                        </a>
                    </li>
                    <li>
                        <a href="simple-menu-light-dashboard-overview-1.html" class="menu">
                            <div class="menu__icon"><i data-feather="activity"></i></div>
                            <div class="menu__title"> منو ساده</div>
                        </a>
                    </li>
                    <li>
                        <a href="top-menu-light-dashboard-overview-1.html" class="menu">
                            <div class="menu__icon"><i data-feather="activity"></i></div>
                            <div class="menu__title"> منو بالا</div>
                        </a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="side-menu-light-inbox.html" class="menu">
                    <div class="menu__icon"><i data-feather="inbox"></i></div>
                    <div class="menu__title"> صندوق ورودی</div>
                </a>
            </li>
            <li>
                <a href="side-menu-light-file-manager.html" class="menu">
                    <div class="menu__icon"><i data-feather="hard-drive"></i></div>
                    <div class="menu__title"> مدیریت فایل</div>
                </a>
            </li>
            <li>
                <a href="side-menu-light-point-of-sale.html" class="menu">
                    <div class="menu__icon"><i data-feather="credit-card"></i></div>
                    <div class="menu__title"> نمای فروش</div>
                </a>
            </li>
            <li>
                <a href="side-menu-light-chat.html" class="menu">
                    <div class="menu__icon"><i data-feather="message-square"></i></div>
                    <div class="menu__title"> چت</div>
                </a>
            </li>
            <li>
                <a href="side-menu-light-post.html" class="menu">
                    <div class="menu__icon"><i data-feather="file-text"></i></div>
                    <div class="menu__title"> پست</div>
                </a>
            </li>
            <li>
                <a href="side-menu-light-calendar.html" class="menu">
                    <div class="menu__icon"><i data-feather="calendar"></i></div>
                    <div class="menu__title"> تقویم</div>
                </a>
            </li>
            <li class="menu__devider my-6"></li>
            <li>
                <a href="javascript:;" class="menu">
                    <div class="menu__icon"><i data-feather="edit"></i></div>
                    <div class="menu__title"> کراد <i data-feather="chevron-down" class="menu__sub-icon "></i></div>
                </a>
                <ul class="">
                    <li>
                        <a href="side-menu-light-crud-data-list.html" class="menu">
                            <div class="menu__icon"><i data-feather="activity"></i></div>
                            <div class="menu__title"> لیست داده</div>
                        </a>
                    </li>
                    <li>
                        <a href="side-menu-light-crud-form.html" class="menu">
                            <div class="menu__icon"><i data-feather="activity"></i></div>
                            <div class="menu__title"> فرم</div>
                        </a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="javascript:;" class="menu">
                    <div class="menu__icon"><i data-feather="users"></i></div>
                    <div class="menu__title"> کاربران <i data-feather="chevron-down" class="menu__sub-icon "></i></div>
                </a>
                <ul class="">
                    <li>
                        <a href="side-menu-light-users-layout-1.html" class="menu">
                            <div class="menu__icon"><i data-feather="activity"></i></div>
                            <div class="menu__title"> چینش 1</div>
                        </a>
                    </li>
                    <li>
                        <a href="side-menu-light-users-layout-2.html" class="menu">
                            <div class="menu__icon"><i data-feather="activity"></i></div>
                            <div class="menu__title"> چینش 2</div>
                        </a>
                    </li>
                    <li>
                        <a href="side-menu-light-users-layout-3.html" class="menu">
                            <div class="menu__icon"><i data-feather="activity"></i></div>
                            <div class="menu__title"> چینش 3</div>
                        </a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="javascript:;" class="menu">
                    <div class="menu__icon"><i data-feather="trello"></i></div>
                    <div class="menu__title"> پروفایل <i data-feather="chevron-down" class="menu__sub-icon "></i></div>
                </a>
                <ul class="">
                    <li>
                        <a href="side-menu-light-profile-overview-1.html" class="menu">
                            <div class="menu__icon"><i data-feather="activity"></i></div>
                            <div class="menu__title"> نمای کل 1</div>
                        </a>
                    </li>
                    <li>
                        <a href="side-menu-light-profile-overview-2.html" class="menu">
                            <div class="menu__icon"><i data-feather="activity"></i></div>
                            <div class="menu__title"> نمای کل 2</div>
                        </a>
                    </li>
                    <li>
                        <a href="side-menu-light-profile-overview-3.html" class="menu">
                            <div class="menu__icon"><i data-feather="activity"></i></div>
                            <div class="menu__title"> نمای کل 3</div>
                        </a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="javascript:;" class="menu">
                    <div class="menu__icon"><i data-feather="layout"></i></div>
                    <div class="menu__title"> صفحات <i data-feather="chevron-down" class="menu__sub-icon "></i></div>
                </a>
                <ul class="">
                    <li>
                        <a href="javascript:;" class="menu">
                            <div class="menu__icon"><i data-feather="activity"></i></div>
                            <div class="menu__title"> ویزارد <i data-feather="chevron-down" class="menu__sub-icon "></i>
                            </div>
                        </a>
                        <ul class="">
                            <li>
                                <a href="side-menu-light-wizard-layout-1.html" class="menu">
                                    <div class="menu__icon"><i data-feather="zap"></i></div>
                                    <div class="menu__title">چینش 1</div>
                                </a>
                            </li>
                            <li>
                                <a href="side-menu-light-wizard-layout-2.html" class="menu">
                                    <div class="menu__icon"><i data-feather="zap"></i></div>
                                    <div class="menu__title">چینش 2</div>
                                </a>
                            </li>
                            <li>
                                <a href="side-menu-light-wizard-layout-3.html" class="menu">
                                    <div class="menu__icon"><i data-feather="zap"></i></div>
                                    <div class="menu__title">چینش 3</div>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:;" class="menu">
                            <div class="menu__icon"><i data-feather="activity"></i></div>
                            <div class="menu__title"> بلاگ <i data-feather="chevron-down" class="menu__sub-icon "></i>
                            </div>
                        </a>
                        <ul class="">
                            <li>
                                <a href="side-menu-light-blog-layout-1.html" class="menu">
                                    <div class="menu__icon"><i data-feather="zap"></i></div>
                                    <div class="menu__title">چینش 1</div>
                                </a>
                            </li>
                            <li>
                                <a href="side-menu-light-blog-layout-2.html" class="menu">
                                    <div class="menu__icon"><i data-feather="zap"></i></div>
                                    <div class="menu__title">چینش 2</div>
                                </a>
                            </li>
                            <li>
                                <a href="side-menu-light-blog-layout-3.html" class="menu">
                                    <div class="menu__icon"><i data-feather="zap"></i></div>
                                    <div class="menu__title">چینش 3</div>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:;" class="menu">
                            <div class="menu__icon"><i data-feather="activity"></i></div>
                            <div class="menu__title"> قیمت‌گذاری <i data-feather="chevron-down"
                                                                    class="menu__sub-icon "></i></div>
                        </a>
                        <ul class="">
                            <li>
                                <a href="side-menu-light-pricing-layout-1.html" class="menu">
                                    <div class="menu__icon"><i data-feather="zap"></i></div>
                                    <div class="menu__title">چینش 1</div>
                                </a>
                            </li>
                            <li>
                                <a href="side-menu-light-pricing-layout-2.html" class="menu">
                                    <div class="menu__icon"><i data-feather="zap"></i></div>
                                    <div class="menu__title">چینش 2</div>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:;" class="menu">
                            <div class="menu__icon"><i data-feather="activity"></i></div>
                            <div class="menu__title"> فاکتور <i data-feather="chevron-down" class="menu__sub-icon "></i>
                            </div>
                        </a>
                        <ul class="">
                            <li>
                                <a href="side-menu-light-invoice-layout-1.html" class="menu">
                                    <div class="menu__icon"><i data-feather="zap"></i></div>
                                    <div class="menu__title">چینش 1</div>
                                </a>
                            </li>
                            <li>
                                <a href="side-menu-light-invoice-layout-2.html" class="menu">
                                    <div class="menu__icon"><i data-feather="zap"></i></div>
                                    <div class="menu__title">چینش 2</div>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:;" class="menu">
                            <div class="menu__icon"><i data-feather="activity"></i></div>
                            <div class="menu__title"> پرسش و پاسخ <i data-feather="chevron-down"
                                                                     class="menu__sub-icon "></i></div>
                        </a>
                        <ul class="">
                            <li>
                                <a href="side-menu-light-faq-layout-1.html" class="menu">
                                    <div class="menu__icon"><i data-feather="zap"></i></div>
                                    <div class="menu__title">چینش 1</div>
                                </a>
                            </li>
                            <li>
                                <a href="side-menu-light-faq-layout-2.html" class="menu">
                                    <div class="menu__icon"><i data-feather="zap"></i></div>
                                    <div class="menu__title">چینش 2</div>
                                </a>
                            </li>
                            <li>
                                <a href="side-menu-light-faq-layout-3.html" class="menu">
                                    <div class="menu__icon"><i data-feather="zap"></i></div>
                                    <div class="menu__title">چینش 3</div>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="login-light-login.html" class="menu">
                            <div class="menu__icon"><i data-feather="activity"></i></div>
                            <div class="menu__title"> ورود</div>
                        </a>
                    </li>
                    <li>
                        <a href="login-light-register.html" class="menu">
                            <div class="menu__icon"><i data-feather="activity"></i></div>
                            <div class="menu__title"> ثبت نام</div>
                        </a>
                    </li>
                    <li>
                        <a href="main-light-error-page.html" class="menu">
                            <div class="menu__icon"><i data-feather="activity"></i></div>
                            <div class="menu__title"> صفحه خطا</div>
                        </a>
                    </li>
                    <li>
                        <a href="side-menu-light-update-profile.html" class="menu">
                            <div class="menu__icon"><i data-feather="activity"></i></div>
                            <div class="menu__title"> بروزرسانی پروفایل</div>
                        </a>
                    </li>
                    <li>
                        <a href="side-menu-light-change-password.html" class="menu">
                            <div class="menu__icon"><i data-feather="activity"></i></div>
                            <div class="menu__title"> تغییر رمزعبور</div>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="menu__devider my-6"></li>
            <li>
                <a href="javascript:;" class="menu">
                    <div class="menu__icon"><i data-feather="inbox"></i></div>
                    <div class="menu__title"> کامپوننت‌ها <i data-feather="chevron-down" class="menu__sub-icon "></i>
                    </div>
                </a>
                <ul class="">
                    <li>
                        <a href="javascript:;" class="menu">
                            <div class="menu__icon"><i data-feather="activity"></i></div>
                            <div class="menu__title"> جدول <i data-feather="chevron-down" class="menu__sub-icon "></i>
                            </div>
                        </a>
                        <ul class="">
                            <li>
                                <a href="side-menu-light-regular-table.html" class="menu">
                                    <div class="menu__icon"><i data-feather="zap"></i></div>
                                    <div class="menu__title"> جدول ساده</div>
                                </a>
                            </li>
                            <li>
                                <a href="side-menu-light-tabulator.html" class="menu">
                                    <div class="menu__icon"><i data-feather="zap"></i></div>
                                    <div class="menu__title"> تیبللاتور</div>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:;" class="menu">
                            <div class="menu__icon"><i data-feather="activity"></i></div>
                            <div class="menu__title"> همپوشانی <i data-feather="chevron-down"
                                                                  class="menu__sub-icon "></i></div>
                        </a>
                        <ul class="">
                            <li>
                                <a href="side-menu-light-modal.html" class="menu">
                                    <div class="menu__icon"><i data-feather="zap"></i></div>
                                    <div class="menu__title"> مودال</div>
                                </a>
                            </li>
                            <li>
                                <a href="side-menu-light-slide-over.html" class="menu">
                                    <div class="menu__icon"><i data-feather="zap"></i></div>
                                    <div class="menu__title"> اسلاید اور</div>
                                </a>
                            </li>
                            <li>
                                <a href="side-menu-light-notification.html" class="menu">
                                    <div class="menu__icon"><i data-feather="zap"></i></div>
                                    <div class="menu__title"> اطلاعیه‌ها</div>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="side-menu-light-accordion.html" class="menu">
                            <div class="menu__icon"><i data-feather="activity"></i></div>
                            <div class="menu__title"> آکاردیون</div>
                        </a>
                    </li>
                    <li>
                        <a href="side-menu-light-button.html" class="menu">
                            <div class="menu__icon"><i data-feather="activity"></i></div>
                            <div class="menu__title"> دکمه</div>
                        </a>
                    </li>
                    <li>
                        <a href="side-menu-light-alert.html" class="menu">
                            <div class="menu__icon"><i data-feather="activity"></i></div>
                            <div class="menu__title"> هشدار</div>
                        </a>
                    </li>
                    <li>
                        <a href="side-menu-light-progress-bar.html" class="menu">
                            <div class="menu__icon"><i data-feather="activity"></i></div>
                            <div class="menu__title"> نوار پیشرفت</div>
                        </a>
                    </li>
                    <li>
                        <a href="side-menu-light-tooltip.html" class="menu">
                            <div class="menu__icon"><i data-feather="activity"></i></div>
                            <div class="menu__title"> تولتیپ</div>
                        </a>
                    </li>
                    <li>
                        <a href="side-menu-light-dropdown.html" class="menu">
                            <div class="menu__icon"><i data-feather="activity"></i></div>
                            <div class="menu__title"> دراپ‌دوان</div>
                        </a>
                    </li>
                    <li>
                        <a href="side-menu-light-typography.html" class="menu">
                            <div class="menu__icon"><i data-feather="activity"></i></div>
                            <div class="menu__title"> تایپوگرافی</div>
                        </a>
                    </li>
                    <li>
                        <a href="side-menu-light-icon.html" class="menu">
                            <div class="menu__icon"><i data-feather="activity"></i></div>
                            <div class="menu__title"> ایکن</div>
                        </a>
                    </li>
                    <li>
                        <a href="side-menu-light-loading-icon.html" class="menu">
                            <div class="menu__icon"><i data-feather="activity"></i></div>
                            <div class="menu__title"> ایکن لودینگ</div>
                        </a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="javascript:;" class="menu">
                    <div class="menu__icon"><i data-feather="sidebar"></i></div>
                    <div class="menu__title"> فرم‌ها <i data-feather="chevron-down" class="menu__sub-icon "></i></div>
                </a>
                <ul class="">
                    <li>
                        <a href="side-menu-light-regular-form.html" class="menu">
                            <div class="menu__icon"><i data-feather="activity"></i></div>
                            <div class="menu__title"> فرم ساده</div>
                        </a>
                    </li>
                    <li>
                        <a href="side-menu-light-datepicker.html" class="menu">
                            <div class="menu__icon"><i data-feather="activity"></i></div>
                            <div class="menu__title"> انتخابگر زمان</div>
                        </a>
                    </li>
                    <li>
                        <a href="side-menu-light-tail-select.html" class="menu">
                            <div class="menu__icon"><i data-feather="activity"></i></div>
                            <div class="menu__title"> انتخابگر تیل</div>
                        </a>
                    </li>
                    <li>
                        <a href="side-menu-light-file-upload.html" class="menu">
                            <div class="menu__icon"><i data-feather="activity"></i></div>
                            <div class="menu__title">آپلود فایل</div>
                        </a>
                    </li>
                    <li>
                        <a href="side-menu-light-wysiwyg-editor.html" class="menu">
                            <div class="menu__icon"><i data-feather="activity"></i></div>
                            <div class="menu__title"> ادیتور ویسیویگ</div>
                        </a>
                    </li>
                    <li>
                        <a href="side-menu-light-validation.html" class="menu">
                            <div class="menu__icon"><i data-feather="activity"></i></div>
                            <div class="menu__title"> اعتبارسنجی</div>
                        </a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="javascript:;" class="menu">
                    <div class="menu__icon"><i data-feather="hard-drive"></i></div>
                    <div class="menu__title"> ویجت‌ها <i data-feather="chevron-down" class="menu__sub-icon "></i></div>
                </a>
                <ul class="">
                    <li>
                        <a href="side-menu-light-chart.html" class="menu">
                            <div class="menu__icon"><i data-feather="activity"></i></div>
                            <div class="menu__title"> نمودار</div>
                        </a>
                    </li>
                    <li>
                        <a href="side-menu-light-slider.html" class="menu">
                            <div class="menu__icon"><i data-feather="activity"></i></div>
                            <div class="menu__title"> اسلایدر</div>
                        </a>
                    </li>
                    <li>
                        <a href="side-menu-light-image-zoom.html" class="menu">
                            <div class="menu__icon"><i data-feather="activity"></i></div>
                            <div class="menu__title"> بزرگنمایی تصویر</div>
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
    <!-- END: Mobile Menu -->
    <!-- BEGIN: Top Bar -->
    <div class="top-bar-boxed border-b border-theme-2 -mt-7 md:-mt-5 -mx-3 sm:-mx-8 px-3 sm:px-8 md:pt-0 mb-12">
        <div class="h-full flex items-center">
            <!-- BEGIN: Logo -->
            <a href="{{route('/')}}" class="-intro-x hidden md:flex">
                <img alt="Icewall Tailwind HTML Admin Template" class="w-6" src="dist/images/logo.svg">
                <span class="text-white text-lg mr-3 adjust "> اسنپ <span class="font-medium">فود</span> </span>
            </a>
            <!-- END: Logo -->
            <!-- BEGIN: Breadcrumb -->
            <div class="-intro-x breadcrumb ml-auto"><a class="breadcrumb--active"></a></div>
            <!-- END: Breadcrumb -->
            <!-- BEGIN: Search -->
            <div class="intro-x relative ml-3 sm:ml-6">
                <div class="search hidden sm:block">
                    <input type="text"
                           class="search__input form-control dark:bg-dark-1 border-transparent placeholder-theme-8"
                           placeholder="جستجو...">
                    <i data-feather="search" class="search__icon dark:text-gray-300"></i>
                </div>
                <a class="notification sm:hidden" href=""> <i data-feather="search"
                                                              class="notification__icon dark:text-gray-300"></i> </a>
            </div>
            <!-- END: Search -->
            <!-- BEGIN: Notifications -->
            <div class="intro-x dropdown ml-4 sm:ml-6">
                <div class="dropdown-toggle notification notification--bullet cursor-pointer" role="button"
                     aria-expanded="false"><i data-feather="bell" class="notification__icon dark:text-gray-300"></i>
                </div>
                <div class="notification-content pt-2 dropdown-menu">
                    <div class="notification-content__box dropdown-menu__content box dark:bg-dark-6">
                        <div class="notification-content__title"> اطلاعیه ها</div>
                        <div class="cursor-pointer relative flex items-center ">
                            <div class="w-12 h-12 flex-none image-fit ml-1">
                                <img alt="Icewall Tailwind HTML Admin Template" class="rounded-full"
                                     src="dist/images/profile-5.jpg">
                                <div
                                    class="w-3 h-3 bg-theme-10 absolute left-0 bottom-0 rounded-full border-2 border-white"></div>
                            </div>
                            <div class="mr-2 overflow-hidden">
                                <div class="flex items-center">
                                    <a href="javascript:;" class="font-medium truncate ml-5">انجلینا جولی</a>
                                    <div class="text-xs text-gray-500 mr-auto whitespace-nowrap">01:10 عصر</div>
                                </div>
                                <div class="w-full truncate text-gray-600 mt-0.5"> در این صورت می توان امید داشت که تمام
                                    و
                                    دشواری موجود در ارائه راهکارها و شرایط سخت تایپ به پایان رسد وزمان مورد نیاز
                                    شامل حروفچینی دستاوردهای ا
                                </div>
                            </div>
                        </div>
                        <div class="cursor-pointer relative flex items-center mt-5">
                            <div class="w-12 h-12 flex-none image-fit ml-1">
                                <img alt="Icewall Tailwind HTML Admin Template" class="rounded-full"
                                     src="dist/images/profile-4.jpg">
                                <div
                                    class="w-3 h-3 bg-theme-10 absolute left-0 bottom-0 rounded-full border-2 border-white"></div>
                            </div>
                            <div class="mr-2 overflow-hidden">
                                <div class="flex items-center">
                                    <a href="javascript:;" class="font-medium truncate ml-5">برد پیت</a>
                                    <div class="text-xs text-gray-500 mr-auto whitespace-nowrap">05:09 صبح</div>
                                </div>
                                <div class="w-full truncate text-gray-600 mt-0.5">چاپگرها و متون بلکه روزنامه و مجله در
                                    ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای
                                    متنوع با هدف بهبود ابزارهای کاربردی می باشد..
                                </div>
                            </div>
                        </div>
                        <div class="cursor-pointer relative flex items-center mt-5">
                            <div class="w-12 h-12 flex-none image-fit ml-1">
                                <img alt="Icewall Tailwind HTML Admin Template" class="rounded-full"
                                     src="dist/images/profile-3.jpg">
                                <div
                                    class="w-3 h-3 bg-theme-10 absolute left-0 bottom-0 rounded-full border-2 border-white"></div>
                            </div>
                            <div class="mr-2 overflow-hidden">
                                <div class="flex items-center">
                                    <a href="javascript:;" class="font-medium truncate ml-5">رابرت دنیرو</a>
                                    <div class="text-xs text-gray-500 mr-auto whitespace-nowrap">05:09 صبح</div>
                                </div>
                                <div class="w-full truncate text-gray-600 mt-0.5">چاپگرها و متون بلکه روزنامه و مجله در
                                    ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای
                                    متنوع با هدف بهبود ابزارهای کاربردی می باشد..
                                </div>
                            </div>
                        </div>
                        <div class="cursor-pointer relative flex items-center mt-5">
                            <div class="w-12 h-12 flex-none image-fit ml-1">
                                <img alt="Icewall Tailwind HTML Admin Template" class="rounded-full"
                                     src="dist/images/profile-14.jpg">
                                <div
                                    class="w-3 h-3 bg-theme-10 absolute left-0 bottom-0 rounded-full border-2 border-white"></div>
                            </div>
                            <div class="mr-2 overflow-hidden">
                                <div class="flex items-center">
                                    <a href="javascript:;" class="font-medium truncate ml-5">راسل کرو</a>
                                    <div class="text-xs text-gray-500 mr-auto whitespace-nowrap">01:10 عصر</div>
                                </div>
                                <div class="w-full truncate text-gray-600 mt-0.5">چاپگرها و متون بلکه روزنامه و مجله در
                                    ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای
                                    متنوع با هدف بهبود ابزارهای کاربردی می باشد..
                                </div>
                            </div>
                        </div>
                        <div class="cursor-pointer relative flex items-center mt-5">
                            <div class="w-12 h-12 flex-none image-fit ml-1">
                                <img alt="Icewall Tailwind HTML Admin Template" class="rounded-full"
                                     src="dist/images/profile-6.jpg">
                                <div
                                    class="w-3 h-3 bg-theme-10 absolute left-0 bottom-0 rounded-full border-2 border-white"></div>
                            </div>
                            <div class="mr-2 overflow-hidden">
                                <div class="flex items-center">
                                    <a href="javascript:;" class="font-medium truncate ml-5">جانی دپ</a>
                                    <div class="text-xs text-gray-500 ml-auto whitespace-nowrap">06:05 صبح</div>
                                </div>
                                <div class="w-full truncate text-gray-600 mt-0.5"> در این صورت می توان امید داشت که تمام
                                    و
                                    دشواری موجود در ارائه راهکارها و شرایط سخت تایپ به پایان رسد وزمان مورد نیاز
                                    شامل حروفچینی دستاوردهای
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END: Notifications -->
            <!-- BEGIN: Account Menu -->
            <div class="intro-x dropdown w-8 h-8">
                <div class="dropdown-toggle w-8 h-8 rounded-full overflow-hidden shadow-lg image-fit zoom-in scale-110"
                     role="button" aria-expanded="false">
                    @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                        <img alt="Icewall Tailwind HTML Admin Template" src="dist/images/profile-11.jpg">
                    @else
                        <img alt="Icewall Tailwind HTML Admin Template" src="dist/images/profile-19.jpg">
                    @endif
                </div>
                <div class="dropdown-menu w-56">
                    <div class="dropdown-menu__content box bg-theme-11 dark:bg-dark-6 text-white">
                        <div class="p-4 border-b border-theme-12 dark:border-dark-3">
                            <div class="font-medium">{{ Auth::user()->name }}</div>
                            <div class="text-xs text-theme-13 mt-0.5 dark:text-gray-600">{{ Auth::user()->email }}</div>
                        </div>
                        <div class="p-2">
                            <a href="{{ route('profile.show') }}"
                               class="flex items-center block p-2 transition duration-300 ease-in-out hover:bg-theme-1 dark:hover:bg-dark-3 rounded-md">
                                <i data-feather="user" class="w-4 h-4 ml-2"></i> پروفایل </a>
                            @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                                <a href="{{ route('api-tokens.index') }}"
                                   class="flex items-center block p-2 transition duration-300 ease-in-out hover:bg-theme-1 dark:hover:bg-dark-3 rounded-md">
                                    <i data-feather="edit" class="w-4 h-4 ml-2"></i> {{__('توکن شما')}} </a>
                            @endif
                            <a href="{{ route('profile.show') }}"
                               class="flex items-center block p-2 transition duration-300 ease-in-out hover:bg-theme-1 dark:hover:bg-dark-3 rounded-md">
                                <i data-feather="lock" class="w-4 h-4 ml-2"></i>بازیابی رمزعبور</a>
                        </div>
                        <div class="p-2 border-t border-theme-12 dark:border-dark-3">
                            <form method="POST" action="{{ route('logout') }}" x-data>
                                @csrf

                                <a href="{{ route('logout') }}"
                                   class="flex items-center block p-2 transition duration-300 ease-in-out hover:bg-theme-1 dark:hover:bg-dark-3 rounded-md"
                                   @click.prevent="$root.submit();">
                                    <i data-feather="toggle-right" class="w-4 h-4 ml-2"></i>
                                    {{ __('خروج') }}
                                </a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END: Account Menu -->
        </div>
    </div>
    <!-- END: Top Bar -->
    <!-- BEGIN: Top Menu -->
    <nav class="top-nav">
        <ul>
            @role('superadmin')
            <li>
                <x-jet-nav-link
                    href="{{ route('Admin') }}"
                    :active="request()->routeIs('Admin')"
                    class="top-menu">
                    <div class="top-menu__icon"><i data-feather="home"></i></div>
                    <div class="top-menu__title">داشبورد</div>
                </x-jet-nav-link>
            </li>
            <li>
                <x-jet-nav-link href="{{ route('restaurantCategory') }}"
                                :active="request()->routeIs('restaurantCategory')" class="top-menu">
                    <div class="top-menu__icon"><i data-feather="shopping-cart" class="block mx-auto"></i></div>
                    <div class="top-menu__title">دسته بندی رستوران</div>
                </x-jet-nav-link>
            </li>
            <li>
                <x-jet-nav-link href="{{ route('foodCategory') }}" :active="request()->routeIs('foodCategory')"
                                class="top-menu">
                    <div class="top-menu__icon"><i data-feather="coffee" class="block mx-auto"></i></div>
                    <div class="top-menu__title"> دسته بندی غذا ها</div>
                </x-jet-nav-link>
            </li>
            <li>
                <x-jet-nav-link href="{{ route('roles') }}" :active="request()->routeIs('roles')" class="top-menu">
                    <div class="top-menu__icon"><i data-feather="settings" class="block mx-auto"></i></div>
                    <div class="top-menu__title"> تنظیمات دسترسی ها</div>
                </x-jet-nav-link>
            </li>
            <li>
                <x-jet-nav-link href="{{ route('DiscountPanel') }}" :active="request()->routeIs('DiscountPanel')"
                                class="top-menu">
                    <div class="top-menu__icon"><i data-feather="tag" class="block mx-auto"></i></div>
                    <div class="top-menu__title"> کدتخفیف ها</div>
                </x-jet-nav-link>
            </li>
            <li>
                <x-jet-nav-link href="{{ route('FoodParty') }}" :active="request()->routeIs('FoodParty')"
                                class="top-menu">
                    <div class="top-menu__icon">
                        <i data-feather="slack" class="block mx-auto"></i>
                    </div>
                    <div class="top-menu__title">فود پارتی</div>
                </x-jet-nav-link>
            </li>
            <li>
                <x-jet-nav-link href="{{ route('FrontBanner') }}" :active="request()->routeIs('FrontBanner')"
                                class="top-menu">
                    <div class="top-menu__icon">
                        <i data-feather="image" class="block mx-auto"></i>
                    </div>
                    <div class="top-menu__title">تنظیمات بنر</div>
                </x-jet-nav-link>
            </li>
            <li>
                <x-jet-nav-link href="{{ route('AllUsers') }}" :active="request()->routeIs('AllUsers')"
                                class="top-menu">
                    <div class="top-menu__icon">
                        <i data-feather="users" class="block mx-auto"></i>
                    </div>
                    <div class="top-menu__title">کاربران</div>
                </x-jet-nav-link>
            </li>
            <li>
                <a href="javascript:;" class="top-menu p-0">
                    <div class="menu__icon ml-2"><i data-feather="message-circle" class="block mx-auto"></i></div>
                    <div class="menu__title"> تنظیمات نظرات <i data-feather="chevron-down"
                                                               class="menu__sub-icon text-sm"></i>
                    </div>
                </a>
                <ul class="">
                    <li>
                        <x-jet-nav-link href="{{ route('AllComments') }}" :active="request()->routeIs('AllComments')"
                                        class="top-menu">
                            <div class="menu__icon"><i data-feather="message-circle" class="block mx-auto"></i></div>
                            <div class="menu__title"> وضعیت نظرات</div>
                        </x-jet-nav-link>
                    </li>
                    <li>
                        <x-jet-nav-link href="{{ route('CommentManagment') }}"
                                        :active="request()->routeIs('CommentManagment')" class="top-menu">
                            <div class="menu__icon"><i data-feather="message-circle" class="block mx-auto"></i></div>
                            <div class="menu__title"> تنظیمات نظرات</div>
                        </x-jet-nav-link>
                    </li>
                    <li>
                        <x-jet-nav-link href="{{route('DeletedComment')}}"
                                        :active="request()->routeIs('DeletedComment')"
                                        class="top-menu">
                            <div class="menu__icon"><i data-feather="activity"></i></div>
                            <div class="menu__title"> نظرات حذف شده</div>
                        </x-jet-nav-link>
                    </li>
                </ul>
            </li>
            @endrole
            @role('seller')
            <li>
                <x-jet-nav-link
                    href="{{ route('dashboard') }}"
                    :active="request()->routeIs('dashboard')"
                    class="top-menu">
                    <div class="top-menu__icon"><i data-feather="home"></i></div>
                    <div class="top-menu__title">داشبورد</div>
                </x-jet-nav-link>
            </li>
            <li>
                <x-jet-nav-link href="{{ route('RestaurantPanel') }}"
                                :active="request()->routeIs('RestaurantPanel')" class="top-menu">
                    <div class="top-menu__icon">
                        <i data-feather="aperture" class="block mx-auto"></i>
                    </div>
                    <div class="top-menu__title"> پروفایل رستوران</div>
                </x-jet-nav-link>
            </li>
            <li>
                <x-jet-nav-link href="{{ route('FoodPanel') }}"
                                :active="request()->routeIs('FoodPanel')" class="top-menu">
                    <div class="top-menu__icon"><i data-feather="coffee" class="block mx-auto"></i></div>
                    <div class="top-menu__title"> تنظیمات غذاها</div>
                </x-jet-nav-link>
            </li>
            <li>
                <x-jet-nav-link href="{{ route('OrdersPanel') }}"
                                :active="request()->routeIs('OrdersPanel')" class="top-menu">
                    <div class="top-menu__icon"><i data-feather="shopping-cart" class="block mx-auto"></i></div>
                    <div class="top-menu__title"> سفارش ها</div>
                </x-jet-nav-link>
            </li>
            <li>
                <x-jet-nav-link href="{{ route('ArchiveOrder') }}"
                                :active="request()->routeIs('ArchiveOrder')" class="top-menu">
                    <div class="top-menu__icon"><i data-feather="shopping-cart" class="block mx-auto"></i></div>
                    <div class="top-menu__title"> آرشیو سفارشات</div>
                </x-jet-nav-link>
            </li>
            <li>
                <x-jet-nav-link href="{{ route('CommentsPanel') }}"
                                :active="request()->routeIs('CommentsPanel')" class="top-menu">
                    <div class="top-menu__icon"><i data-feather="inbox" class="block mx-auto"></i>
                    </div>
                    <div class="top-menu__title"> نظر ها</div>
                </x-jet-nav-link>
            </li>
            @endrole
        </ul>
    </nav>
</div>
