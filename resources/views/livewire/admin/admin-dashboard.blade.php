<div class="wrapper wrapper--top-nav">
    <div class="wrapper-box">
        <!-- BEGIN: Content -->
        <div class="content">
            <div class="grid grid-cols-12 gap-6">
                <div class="col-span-12 xxl:col-span-9" wire:ignore>
                    <div class="grid grid-cols-12 gap-6">
                        <!-- BEGIN: General Report -->
                        <div class="col-span-12 mt-8">
                            <div class="intro-y flex items-center h-10">
                                <h2 class="text-lg font-medium truncate ml-5">
                                    گزارش کلی
                                </h2>
                                <a href="" class="mr-auto flex items-center text-theme-26 dark:text-theme-33"> <i
                                        data-feather="refresh-ccw" class="w-4 h-4 ml-3"></i> به روزرسانی داده </a>
                            </div>
                            <div class="grid grid-cols-12 gap-6 mt-5">
                                <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                                    <div class="report-box zoom-in">
                                        <div class="box p-5">
                                            <div class="flex">
                                                <i data-feather="shopping-cart"
                                                   class="report-box__icon text-theme-21"></i>
                                                <div class="mr-auto">
                                                    <div
                                                        class="report-box__indicator bg-theme-10 tooltip cursor-pointer"
                                                        title="33% بالاتر از ماه گذشته"> 33% <i
                                                            data-feather="chevron-up" class="w-4 h-4 mr-0.5"></i>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="text-3xl font-bold leading-8 mt-6">{{$SellCount}}</div>
                                            <div class="text-base text-gray-600 mt-1">تعداد سفارش</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                                    <div class="report-box zoom-in">
                                        <div class="box p-5">
                                            <div class="flex">
                                                <i data-feather="credit-card"
                                                   class="report-box__icon text-theme-22"></i>
                                                <div class="mr-auto">
                                                    <div
                                                        class="report-box__indicator bg-theme-24 tooltip cursor-pointer"
                                                        title="2% پایینتر از ماه گذشته"> 2% <i
                                                            data-feather="chevron-down" class="w-4 h-4 mr-0.5"></i>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="text-3xl font-bold leading-8 mt-6">{{$sumSellPrice}}</div>
                                            <div class="text-base text-gray-600 mt-1">مجموع قیمت سفارشات</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                                    <div class="report-box zoom-in">
                                        <div class="box p-5">
                                            <div class="flex">
                                                <i data-feather="monitor"
                                                   class="report-box__icon text-theme-23"></i>
                                                <div class="mr-auto">
                                                    <div
                                                        class="report-box__indicator bg-theme-10 tooltip cursor-pointer"
                                                        title="12% بالاتر از ماه گذشته"> 12% <i
                                                            data-feather="chevron-up" class="w-4 h-4 mr-0.5"></i>
                                                    </div>
                                                </div>
                                            </div>
                                            <div
                                                class="text-3xl font-bold leading-8 mt-6">{{$SellCompleteStatus}}</div>
                                            <div class="text-base text-gray-600 mt-1">سفارشات تحویل داده شده</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                                    <div class="report-box zoom-in">
                                        <div class="box p-5">
                                            <div class="flex">
                                                <i data-feather="user" class="report-box__icon text-theme-10"></i>
                                                <div class="mr-auto">
                                                    <div
                                                        class="report-box__indicator bg-theme-10 tooltip cursor-pointer"
                                                        title="22% بالاتر از ماه گذشته"> 22% <i
                                                            data-feather="chevron-up" class="w-4 h-4 mr-0.5"></i>
                                                    </div>
                                                </div>
                                            </div>
                                            <div
                                                class="text-3xl font-bold leading-8 mt-6">{{$sellSusspendStatus}}</div>
                                            <div class="text-base text-gray-600 mt-1">سفارشات معلق</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- END: General Report -->
                        <!-- BEGIN: Sales Report -->
                        <div class="col-span-12 lg:col-span-12 mt-8">
                            <div class="intro-y block sm:flex items-center h-10">
                                <h2 class="text-lg font-medium truncate ml-5">
                                    گزارش دیدکاه ها
                                </h2>
                            </div>
                            <div class="intro-y box p-5 mt-12 sm:mt-5">
                                <livewire:admin.charts.comment/>
                        </div>
                    </div>
                    <!-- BEGIN: Official Store -->
                    <div class="col-span-12 xl:col-span-8 mt-6">
                        <div class="intro-y block sm:flex items-center h-10">
                            <h2 class="text-lg font-medium truncate ml-5">
                                فروشگاه رسمی
                            </h2>
                            <div class="sm:mr-auto mt-3 sm:mt-0 relative text-gray-700 dark:text-gray-300">
                                <i data-feather="map-pin"
                                   class="w-4 h-4 z-10 absolute my-auto inset-y-0 mr-3 right-0"></i>
                                <input type="text" class="form-control sm:w-40 box pr-10"
                                       placeholder="فیلتر براساس شهر">
                            </div>
                        </div>
                        <div class="intro-y box p-5 mt-12 sm:mt-5">
                            <div>250 فروشگاه رسمی در 21 کشور ، برای مشاهده جزئیات مکان ، روی نشانگر کلیک کنید.
                            </div>
                            <div class="report-maps mt-5 bg-gray-200 rounded-md"
                                 data-center="-6.2425342, 106.8626478"
                                 data-sources="/dist/json/location.json"></div>
                        </div>
                    </div>
                    <!-- END: Official Store -->
                    <!-- BEGIN: Weekly Best Sellers -->
                    <div class="col-span-12 xl:col-span-4 mt-6">
                        <div class="intro-y flex items-center h-10">
                            <h2 class="text-lg font-medium truncate ml-5">
                                بهترین فروشنده هفتگی
                            </h2>
                        </div>
                        <div class="mt-5">
                            <div class="intro-y">
                                <div class="box px-4 py-4 mb-3 flex items-center zoom-in">
                                    <div class="w-10 h-10 flex-none image-fit rounded-md overflow-hidden">
                                        <img alt="Icewall Tailwind HTML Admin Template"
                                             src="dist/images/profile-7.jpg">
                                    </div>
                                    <div class="mr-4 ml-auto">
                                        <div class="font-medium">جان تراولتا</div>
                                        <div class="text-gray-600 text-xs mt-0.5">31 دی 1400</div>
                                    </div>
                                    <div
                                        class="py-1 px-2 rounded-full text-xs bg-theme-10 text-white cursor-pointer font-medium">
                                        137 فروش
                                    </div>
                                </div>
                            </div>
                            <div class="intro-y">
                                <div class="box px-4 py-4 mb-3 flex items-center zoom-in">
                                    <div class="w-10 h-10 flex-none image-fit rounded-md overflow-hidden">
                                        <img alt="Icewall Tailwind HTML Admin Template"
                                             src="dist/images/profile-13.jpg">
                                    </div>
                                    <div class="mr-4 ml-auto">
                                        <div class="font-medium">کیت وینسنت</div>
                                        <div class="text-gray-600 text-xs mt-0.5">1آذر 1400</div>
                                    </div>
                                    <div
                                        class="py-1 px-2 rounded-full text-xs bg-theme-10 text-white cursor-pointer font-medium">
                                        137 فروش
                                    </div>
                                </div>
                            </div>
                            <div class="intro-y">
                                <div class="box px-4 py-4 mb-3 flex items-center zoom-in">
                                    <div class="w-10 h-10 flex-none image-fit rounded-md overflow-hidden">
                                        <img alt="Icewall Tailwind HTML Admin Template"
                                             src="dist/images/profile-8.jpg">
                                    </div>
                                    <div class="mr-4 ml-auto">
                                        <div class="font-medium">جانی دپ</div>
                                        <div class="text-gray-600 text-xs mt-0.5">27 آذر 1400</div>
                                    </div>
                                    <div
                                        class="py-1 px-2 rounded-full text-xs bg-theme-10 text-white cursor-pointer font-medium">
                                        137 فروش
                                    </div>
                                </div>
                            </div>
                            <div class="intro-y">
                                <div class="box px-4 py-4 mb-3 flex items-center zoom-in">
                                    <div class="w-10 h-10 flex-none image-fit rounded-md overflow-hidden">
                                        <img alt="Icewall Tailwind HTML Admin Template"
                                             src="dist/images/profile-8.jpg">
                                    </div>
                                    <div class="mr-4 ml-auto">
                                        <div class="font-medium">آل پاچینو</div>
                                        <div class="text-gray-600 text-xs mt-0.5">19آذر 1400</div>
                                    </div>
                                    <div
                                        class="py-1 px-2 rounded-full text-xs bg-theme-10 text-white cursor-pointer font-medium">
                                        137 فروش
                                    </div>
                                </div>
                            </div>
                            <a href=""
                               class="intro-y w-full block text-center rounded-md py-4 border border-dotted border-theme-27 dark:border-dark-5 text-theme-28 dark:text-gray-600">مشاهده
                                بیشتر</a>
                        </div>
                    </div>
                    <!-- END: Weekly Best Sellers -->
                    <!-- BEGIN: General Report -->
                    <div class="col-span-12 grid grid-cols-12 gap-6 mt-8">
                        <div class="col-span-12 sm:col-span-6 xxl:col-span-3 intro-y">
                            <div class="box p-5 zoom-in">
                                <div class="flex items-center">
                                    <div class="w-2/4 flex-none">
                                        <div class="text-lg font-medium truncate">هدف فروش</div>
                                        <div class="text-gray-600 mt-1">300 فروش</div>
                                    </div>
                                    <div class="flex-none mr-auto relative">
                                        <canvas id="report-donut-chart-1" width="90" height="90"></canvas>
                                        <div
                                            class="font-medium absolute w-full h-full flex items-center justify-center top-0 left-0">
                                            20%
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-span-12 sm:col-span-6 xxl:col-span-3 intro-y">
                            <div class="box p-5 zoom-in">
                                <div class="flex">
                                    <div class="text-lg font-medium truncate mr-3">شبکه های اجتماعی</div>
                                    <div
                                        class="py-1 px-2 flex items-center rounded-full text-xs bg-gray-200 dark:bg-dark-5 text-gray-600 dark:text-gray-300 cursor-pointer mr-auto truncate">
                                        320 فالوور
                                    </div>
                                </div>
                                <div class="mt-4">
                                    <canvas class="simple-line-chart-1 -ml-1" height="60"></canvas>
                                </div>
                            </div>
                        </div>
                        <div class="col-span-12 sm:col-span-6 xxl:col-span-3 intro-y">
                            <div class="box p-5 zoom-in">
                                <div class="flex items-center">
                                    <div class="w-2/4 flex-none">
                                        <div class="text-lg font-medium truncate">محصولات جدید</div>
                                        <div class="text-gray-600 mt-1">1450 محصول</div>
                                    </div>
                                    <div class="flex-none mr-auto relative">
                                        <canvas id="report-donut-chart-2" width="90" height="90"></canvas>
                                        <div
                                            class="font-medium absolute w-full h-full flex items-center justify-center top-0 left-0">
                                            45%
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-span-12 sm:col-span-6 xxl:col-span-3 intro-y">
                            <div class="box p-5 zoom-in">
                                <div class="flex">
                                    <div class="text-lg font-medium truncate mr-3">تبلیغات پست شده</div>
                                    <div
                                        class="py-1 px-2 flex items-center rounded-full text-xs bg-gray-200 dark:bg-dark-5 text-gray-600 dark:text-gray-300 cursor-pointer mr-auto truncate">
                                        180 کمپین
                                    </div>
                                </div>
                                <div class="mt-4">
                                    <canvas class="simple-line-chart-1 -ml-1" height="60"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END: General Report -->
                    <!-- BEGIN: Weekly Top Products -->
                    <div class="col-span-12 mt-6">
                        <div class="intro-y block sm:flex items-center h-10">
                            <h2 class="text-lg font-medium truncate ml-5">
                                محصولات برتر هفته
                            </h2>
                            <div class="flex items-center sm:mr-auto mt-3 sm:mt-0">
                                <button class="btn box flex items-center text-gray-700 dark:text-gray-300"><i
                                        data-feather="file-text" class="hidden sm:block w-4 h-4 ml-2"></i> خروجی
                                    اکسل
                                </button>
                                <button class="mr-3 btn box flex items-center text-gray-700 dark:text-gray-300">
                                    <i data-feather="file-text" class="hidden sm:block w-4 h-4 ml-2"></i> خروجی
                                    پی‌دی‌اف
                                </button>
                            </div>
                        </div>
                        <div class="intro-y overflow-auto lg:overflow-visible mt-8 sm:mt-0">
                            <table class="table table-report sm:mt-2">
                                <thead>
                                <tr>
                                    <th class="whitespace-nowrap">تصاویر</th>
                                    <th class="whitespace-nowrap">نام محصول</th>
                                    <th class="text-center whitespace-nowrap">موجودی</th>
                                    <th class="text-center whitespace-nowrap">وضعیت</th>
                                    <th class="text-center whitespace-nowrap">فعالیت</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr class="intro-x">
                                    <td class="w-40">
                                        <div class="flex">
                                            <div class="w-10 h-10 image-fit zoom-in">
                                                <img alt="Icewall Tailwind HTML Admin Template"
                                                     class="tooltip rounded-full"
                                                     src="dist/images/preview-6.jpg"
                                                     title="آپلود شده در31 دی 1400">
                                            </div>
                                            <div class="w-10 h-10 image-fit zoom-in -ml-5">
                                                <img alt="Icewall Tailwind HTML Admin Template"
                                                     class="tooltip rounded-full"
                                                     src="dist/images/preview-7.jpg"
                                                     title="آپلود شده در25 مهر 1400">
                                            </div>
                                            <div class="w-10 h-10 image-fit zoom-in -ml-5">
                                                <img alt="Icewall Tailwind HTML Admin Template"
                                                     class="tooltip rounded-full"
                                                     src="dist/images/preview-1.jpg"
                                                     title="آپلود شده در17 دی 1400">
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <a href="" class="font-medium whitespace-nowrap">سونی سون آ سه</a>
                                        <div class="text-gray-600 text-xs whitespace-nowrap mt-0.5">عکاسی</div>
                                    </td>
                                    <td class="text-center">50</td>
                                    <td class="w-40">
                                        <div class="flex items-center justify-center text-theme-24"><i
                                                data-feather="check-square" class="w-4 h-4 ml-2"></i> فعال
                                        </div>
                                    </td>
                                    <td class="table-report__action w-56">
                                        <div class="flex justify-center items-center">
                                            <a class="flex items-center ml-3" href=""> <i
                                                    data-feather="check-square" class="w-4 h-4 ml-1"></i> ویرایش</a>
                                            <a class="flex items-center text-theme-24" href=""> <i
                                                    data-feather="trash-2" class="w-4 h-4 ml-1"></i> حذف </a>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="intro-x">
                                    <td class="w-40">
                                        <div class="flex">
                                            <div class="w-10 h-10 image-fit zoom-in">
                                                <img alt="Icewall Tailwind HTML Admin Template"
                                                     class="tooltip rounded-full"
                                                     src="dist/images/preview-2.jpg"
                                                     title="آپلود شده در1آذر 1400">
                                            </div>
                                            <div class="w-10 h-10 image-fit zoom-in -ml-5">
                                                <img alt="Icewall Tailwind HTML Admin Template"
                                                     class="tooltip rounded-full"
                                                     src="dist/images/preview-11.jpg"
                                                     title="آپلود شده در1 آبان 1400">
                                            </div>
                                            <div class="w-10 h-10 image-fit zoom-in -ml-5">
                                                <img alt="Icewall Tailwind HTML Admin Template"
                                                     class="tooltip rounded-full"
                                                     src="dist/images/preview-13.jpg"
                                                     title="آپلود شده در15 آذر 1400">
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <a href="" class="font-medium whitespace-nowrap">سونی مستر سری ای جی</a>
                                        <div class="text-gray-600 text-xs whitespace-nowrap mt-0.5">الکترونیک
                                        </div>
                                    </td>
                                    <td class="text-center">98</td>
                                    <td class="w-40">
                                        <div class="flex items-center justify-center text-theme-10"><i
                                                data-feather="check-square" class="w-4 h-4 ml-2"></i> غیرفعال
                                        </div>
                                    </td>
                                    <td class="table-report__action w-56">
                                        <div class="flex justify-center items-center">
                                            <a class="flex items-center ml-3" href=""> <i
                                                    data-feather="check-square" class="w-4 h-4 ml-1"></i> ویرایش</a>
                                            <a class="flex items-center text-theme-24" href=""> <i
                                                    data-feather="trash-2" class="w-4 h-4 ml-1"></i> حذف </a>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="intro-x">
                                    <td class="w-40">
                                        <div class="flex">
                                            <div class="w-10 h-10 image-fit zoom-in">
                                                <img alt="Icewall Tailwind HTML Admin Template"
                                                     class="tooltip rounded-full"
                                                     src="dist/images/preview-1.jpg"
                                                     title="آپلود شده در27 آذر 1400">
                                            </div>
                                            <div class="w-10 h-10 image-fit zoom-in -ml-5">
                                                <img alt="Icewall Tailwind HTML Admin Template"
                                                     class="tooltip rounded-full"
                                                     src="dist/images/preview-1.jpg"
                                                     title="آپلود شده در22 دی 1399">
                                            </div>
                                            <div class="w-10 h-10 image-fit zoom-in -ml-5">
                                                <img alt="Icewall Tailwind HTML Admin Template"
                                                     class="tooltip rounded-full"
                                                     src="dist/images/preview-1.jpg"
                                                     title="آپلود شده در23 مهر 1400">
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <a href="" class="font-medium whitespace-nowrap"> سامسونگ گلکسی اس20
                                            اولترا</a>
                                        <div class="text-gray-600 text-xs whitespace-nowrap mt-0.5">گوشی
                                            هوشمند
                                        </div>
                                    </td>
                                    <td class="text-center">50</td>
                                    <td class="w-40">
                                        <div class="flex items-center justify-center text-theme-24"><i
                                                data-feather="check-square" class="w-4 h-4 ml-2"></i> فعال
                                        </div>
                                    </td>
                                    <td class="table-report__action w-56">
                                        <div class="flex justify-center items-center">
                                            <a class="flex items-center ml-3" href=""> <i
                                                    data-feather="check-square" class="w-4 h-4 ml-1"></i> ویرایش</a>
                                            <a class="flex items-center text-theme-24" href=""> <i
                                                    data-feather="trash-2" class="w-4 h-4 ml-1"></i> حذف </a>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="intro-x">
                                    <td class="w-40">
                                        <div class="flex">
                                            <div class="w-10 h-10 image-fit zoom-in">
                                                <img alt="Icewall Tailwind HTML Admin Template"
                                                     class="tooltip rounded-full"
                                                     src="dist/images/preview-7.jpg"
                                                     title="آپلود شده در19آذر 1400">
                                            </div>
                                            <div class="w-10 h-10 image-fit zoom-in -ml-5">
                                                <img alt="Icewall Tailwind HTML Admin Template"
                                                     class="tooltip rounded-full"
                                                     src="dist/images/preview-8.jpg"
                                                     title="آپلود شده در5 آبان 1400">
                                            </div>
                                            <div class="w-10 h-10 image-fit zoom-in -ml-5">
                                                <img alt="Icewall Tailwind HTML Admin Template"
                                                     class="tooltip rounded-full"
                                                     src="dist/images/preview-4.jpg"
                                                     title="آپلود شده در8 آذر 1400">
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <a href="" class="font-medium whitespace-nowrap">دل ایکس پی اس 13</a>
                                        <div class="text-gray-600 text-xs whitespace-nowrap mt-0.5">لپ‌تاپ و
                                            کامپیوتر
                                        </div>
                                    </td>
                                    <td class="text-center">50</td>
                                    <td class="w-40">
                                        <div class="flex items-center justify-center text-theme-24"><i
                                                data-feather="check-square" class="w-4 h-4 ml-2"></i> فعال
                                        </div>
                                    </td>
                                    <td class="table-report__action w-56">
                                        <div class="flex justify-center items-center">
                                            <a class="flex items-center ml-3" href=""> <i
                                                    data-feather="check-square" class="w-4 h-4 ml-1"></i> ویرایش</a>
                                            <a class="flex items-center text-theme-24" href=""> <i
                                                    data-feather="trash-2" class="w-4 h-4 ml-1"></i> حذف </a>
                                        </div>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="intro-y flex flex-wrap sm:flex-row sm:flex-nowrap items-center mt-3">
                            <ul class="pagination">
                                <li>
                                    <a class="pagination__link" href=""> <i class="w-4 h-4"
                                                                            data-feather="chevrons-right"></i>
                                    </a>
                                </li>
                                <li>
                                    <a class="pagination__link" href=""> <i class="w-4 h-4"
                                                                            data-feather="chevron-right"></i>
                                    </a>
                                </li>
                                <li><a class="pagination__link" href="">...</a></li>
                                <li><a class="pagination__link" href="">1</a></li>
                                <li><a class="pagination__link pagination__link--active" href="">2</a></li>
                                <li><a class="pagination__link" href="">3</a></li>
                                <li><a class="pagination__link" href="">...</a></li>
                                <li>
                                    <a class="pagination__link" href=""> <i class="w-4 h-4"
                                                                            data-feather="chevron-left"></i>
                                    </a>
                                </li>
                                <li>
                                    <a class="pagination__link" href=""> <i class="w-4 h-4"
                                                                            data-feather="chevrons-left"></i>
                                    </a>
                                </li>
                            </ul>
                            <select class="w-20 form-select box mt-3 sm:mt-0">
                                <option>10</option>
                                <option>25</option>
                                <option>35</option>
                                <option>50</option>
                            </select>
                        </div>
                    </div>
                    <!-- END: Weekly Top Products -->
                </div>
            </div>
            <div class="col-span-12 xxl:col-span-3">
                <div class="xxl:border-l border-theme-25 -mb-10 pb-10">
                    <div class="xxl:pl-6 grid grid-cols-12 gap-6">
                        <!-- BEGIN: Transactions -->
                        <div class="col-span-12 md:col-span-6 xl:col-span-4 xxl:col-span-12 mt-3 xxl:mt-8">
                            <div class="intro-x flex items-center h-10">
                                <h2 class="text-lg font-medium truncate ml-5">
                                    تراکنش ها
                                </h2>
                            </div>
                            <label for="regular-form-2"></label>
                            <div class="mt-5">
                                @if(!empty($OrdersDetails))
                                    <h2 class="text-lg mx-auto text-center" style="color: red">
                                        <i data-feather="slash" class="mx-auto"></i>
                                        تراکنشی موجود نیست
                                    </h2>
                                @else
                                    @foreach($OrdersDetails as $item)
                                        <div class="intro-x">
                                            <div class="box px-5 py-3 mb-3 flex items-center zoom-in">
                                                <div
                                                    class="w-10 h-10 flex-none image-fit rounded-full overflow-hidden">
                                                    <img alt="Icewall Tailwind HTML Admin Template"
                                                         src="dist/images/profile-7.jpg">
                                                </div>
                                                <div class="mr-4 ml-auto">
                                                    <div class="font-medium">{{$item->cart->user->name}}</div>
                                                    <div
                                                        class="text-gray-600 text-xs mt-0.5">{{Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $item->created_at)->format('Y-M-d')}}</div>
                                                </div>
                                                <div class="text-emerald-500">{{$item->Total_price}}</div>
                                            </div>
                                        </div>
                                    @endforeach
                                    {{$OrdersDetails->links()}}
                                @endif
                            </div>
                        </div>
                        <!-- END: Transactions -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END: Content -->
</div>
</div>
