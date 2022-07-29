<div class="wrapper wrapper--top-nav">
    <div class="wrapper-box">
        <!-- BEGIN: Content -->
        <div class="content">
            <div class="grid grid-cols-12 gap-6">
                <div class="col-span-12 xxl:col-span-9">
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
                                            <div class="text-base text-gray-600 mt-1">تعداد تمام سفارش</div>
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
                        <div class="col-span-12 lg:col-span-6 mt-8">
                            <div class="intro-y block sm:flex items-center h-10">
                                <h2 class="text-lg font-medium truncate ml-5">
                                    گزارش فروش
                                </h2>
                                <div class="sm:mr-auto mt-3 sm:mt-0 relative text-gray-700 dark:text-gray-300">
                                    <i data-feather="calendar"
                                       class="w-4 h-4 z-10 absolute my-auto inset-y-0 mr-3 right-0"></i>
                                    <input type="text" class="datepicker form-control sm:w-56 box pr-10">
                                </div>
                            </div>
                            <div class="intro-y box p-5 mt-12 sm:mt-5">
                                <div class="flex flex-col xl:flex-row xl:items-center">
                                    <div class="flex">
                                        <div>
                                            <div
                                                class="text-theme-26 dark:text-gray-300 text-lg xl:text-xl font-bold">
                                                15,000 تومان
                                            </div>
                                            <div class="mt-0.5 text-gray-600 dark:text-gray-600">ماه اخیر</div>
                                        </div>
                                        <div
                                            class="w-px h-12 border border-r border-dashed border-gray-300 dark:border-dark-5 mx-4 xl:mx-6"></div>
                                        <div>
                                            <div
                                                class="text-gray-600 dark:text-gray-600 text-lg xl:text-xl font-medium">
                                                10,000 تومان
                                            </div>
                                            <div class="mt-0.5 text-gray-600 dark:text-gray-600">ماه اخیر</div>
                                        </div>
                                    </div>
                                    <div class="dropdown xl:ml-auto mt-5 xl:mt-0">
                                        <button class="dropdown-toggle btn btn-outline-secondary font-normal"
                                                aria-expanded="false"> فیلتر دسته‌بندی <i
                                                data-feather="chevron-down" class="w-4 h-4 ml-2"></i></button>
                                        <div class="dropdown-menu w-40">
                                            <div
                                                class="dropdown-menu__content box dark:bg-dark-1 p-2 overflow-y-auto h-32">
                                                <a href=""
                                                   class="flex items-center block p-2 transition duration-300 ease-in-out bg-white dark:bg-dark-1 hover:bg-gray-200 dark:hover:bg-dark-2 rounded-md">
                                                    کامپیوتر و لپ تاپ </a> <a href=""
                                                                              class="flex items-center block p-2 transition duration-300 ease-in-out bg-white dark:bg-dark-1 hover:bg-gray-200 dark:hover:bg-dark-2 rounded-md">گوشی
                                                    هوشمند</a> <a href=""
                                                                  class="flex items-center block p-2 transition duration-300 ease-in-out bg-white dark:bg-dark-1 hover:bg-gray-200 dark:hover:bg-dark-2 rounded-md">الکترونیک</a>
                                                <a href=""
                                                   class="flex items-center block p-2 transition duration-300 ease-in-out bg-white dark:bg-dark-1 hover:bg-gray-200 dark:hover:bg-dark-2 rounded-md">عکاسی</a>
                                                <a href=""
                                                   class="flex items-center block p-2 transition duration-300 ease-in-out bg-white dark:bg-dark-1 hover:bg-gray-200 dark:hover:bg-dark-2 rounded-md">ورزشی</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="report-chart">
                                    <canvas id="report-line-chart" height="169" class="mt-6"></canvas>
                                </div>
                            </div>
                        </div>
                        <!-- END: Sales Report -->
                        <!-- BEGIN: Weekly Top Seller -->
                        <div class="col-span-12 sm:col-span-6 lg:col-span-3 mt-8">
                            <div class="intro-y flex items-center h-10">
                                <h2 class="text-lg font-medium truncate ml-5">
                                    فروش بالای هفتگی
                                </h2>
                                <a href="" class="mr-auto text-theme-26 dark:text-theme-33 truncate"> بیشتر </a>
                            </div>
                            <div class="intro-y box p-5 mt-5">
                                <canvas class="mt-3" id="report-pie-chart" height="300"></canvas>
                                <div class="mt-8">
                                    <div class="flex items-center">
                                        <div class="w-2 h-2 bg-theme-17 rounded-full ml-3"></div>
                                        <span class="truncate">17 - 30 سن </span>
                                        <div
                                            class="h-px flex-1 border border-r border-dashed border-gray-300 mx-3 xl:hidden"></div>
                                        <span class="font-medium xl:ml-auto">62%</span>
                                    </div>
                                    <div class="flex items-center mt-4">
                                        <div class="w-2 h-2 bg-theme-35 rounded-full ml-3"></div>
                                        <span class="truncate">31 - 50 سن </span>
                                        <div
                                            class="h-px flex-1 border border-r border-dashed border-gray-300 mx-3 xl:hidden"></div>
                                        <span class="font-medium xl:ml-auto">33%</span>
                                    </div>
                                    <div class="flex items-center mt-4">
                                        <div class="w-2 h-2 bg-theme-23 rounded-full ml-3"></div>
                                        <span class="truncate">>= 50 سن </span>
                                        <div
                                            class="h-px flex-1 border border-r border-dashed border-gray-300 mx-3 xl:hidden"></div>
                                        <span class="font-medium xl:ml-auto">10%</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- END: Weekly Top Seller -->
                        <!-- BEGIN: Sales Report -->
                        <div class="col-span-12 sm:col-span-6 lg:col-span-3 mt-8">
                            <div class="intro-y flex items-center h-10">
                                <h2 class="text-lg font-medium truncate ml-5">
                                    گزارش فروش
                                </h2>
                                <a href="" class="mr-auto text-theme-26 dark:text-theme-33 truncate"> بیشتر </a>
                            </div>
                            <div class="intro-y box p-5 mt-5">
                                <canvas class="mt-3" id="report-donut-chart" height="300"></canvas>
                                <div class="mt-8">
                                    <div class="flex items-center">
                                        <div class="w-2 h-2 bg-theme-17 rounded-full ml-3"></div>
                                        <span class="truncate">17 - 30 سن </span>
                                        <div
                                            class="h-px flex-1 border border-r border-dashed border-gray-300 mx-3 xl:hidden"></div>
                                        <span class="font-medium xl:ml-auto">62%</span>
                                    </div>
                                    <div class="flex items-center mt-4">
                                        <div class="w-2 h-2 bg-theme-35 rounded-full ml-3"></div>
                                        <span class="truncate">31 - 50 سن </span>
                                        <div
                                            class="h-px flex-1 border border-r border-dashed border-gray-300 mx-3 xl:hidden"></div>
                                        <span class="font-medium xl:ml-auto">33%</span>
                                    </div>
                                    <div class="flex items-center mt-4">
                                        <div class="w-2 h-2 bg-theme-23 rounded-full ml-3"></div>
                                        <span class="truncate">>= 50 سن </span>
                                        <div
                                            class="h-px flex-1 border border-r border-dashed border-gray-300 mx-3 xl:hidden"></div>
                                        <span class="font-medium xl:ml-auto">10%</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- END: Sales Report -->
                        <!-- BEGIN: Weekly Best Sellers -->
                        <div class="col-span-12 xl:col-span-4 mt-6">
                            <div class="intro-y flex items-center h-10">
                                <h2 class="text-lg font-medium truncate ml-5">
                                    بهترین فروشنده هفتگی
                                </h2>
                            </div>
                            <div class="mt-5">
                                @if($BestSeller->first() != 'null')
                                    @foreach($BestSeller as $seller)
                                        <div class="intro-y">
                                            <div class="box px-4 py-4 mb-3 flex items-center zoom-in">
                                                <div class="w-10 h-10 flex-none image-fit rounded-md overflow-hidden">
                                                    <img alt="Icewall Tailwind HTML Admin Template"
                                                         src="dist/images/profile-7.jpg">
                                                </div>
                                                <div class="mr-4 ml-auto">
                                                    <div
                                                        class="font-medium">{{$seller->first()->RestaurantDetail->name}}</div>
                                                    <div
                                                        class="text-gray-600 text-xs mt-0.5">{{$seller->first()->RestaurantDetail->created_at}}</div>
                                                </div>
                                                <div
                                                    class="py-1 px-2 rounded-full text-xs bg-theme-10 text-white cursor-pointer font-medium">
                                                    {{$seller->count()}} فروش
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                @endif
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
                                        <th class="text-center whitespace-nowrap">تعداد فروش</th>
                                        <th class="text-center whitespace-nowrap">وضعیت</th>
                                        <th class="text-center whitespace-nowrap">قیمت</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    {{--@dd($TheBestFood)--}}
                                    {{--                                    @foreach($TheBestFood as $food)--}}
                                    {{--                                        <tr class="intro-x">--}}
                                    {{--                                            <td class="w-40">--}}
                                    {{--                                                <div class="flex">--}}
                                    {{--                                                    <div class="w-10 h-10 image-fit zoom-in">--}}
                                    {{--                                                        <img alt="Icewall Tailwind HTML Admin Template"--}}
                                    {{--                                                             class="tooltip rounded-full"--}}
                                    {{--                                                             src="dist/images/preview-6.jpg"--}}
                                    {{--                                                             title="آپلود شده در31 دی 1400">--}}
                                    {{--                                                    </div>--}}
                                    {{--                                                    <div class="w-10 h-10 image-fit zoom-in -ml-5">--}}
                                    {{--                                                        <img alt="Icewall Tailwind HTML Admin Template"--}}
                                    {{--                                                             class="tooltip rounded-full"--}}
                                    {{--                                                             src="dist/images/preview-7.jpg"--}}
                                    {{--                                                             title="آپلود شده در25 مهر 1400">--}}
                                    {{--                                                    </div>--}}
                                    {{--                                                    <div class="w-10 h-10 image-fit zoom-in -ml-5">--}}
                                    {{--                                                        <img alt="Icewall Tailwind HTML Admin Template"--}}
                                    {{--                                                             class="tooltip rounded-full"--}}
                                    {{--                                                             src="dist/images/preview-1.jpg"--}}
                                    {{--                                                             title="آپلود شده در17 دی 1400">--}}
                                    {{--                                                    </div>--}}
                                    {{--                                                </div>--}}
                                    {{--                                            </td>--}}
                                    {{--                                            <td>--}}
                                    {{--                                                <a href=""--}}
                                    {{--                                                   class="font-medium whitespace-nowrap">{{$food->first()->Food->title}}</a>--}}
                                    {{--                                                <div class="text-gray-600 text-xs whitespace-nowrap mt-0.5">--}}
                                    {{--                                                    {{$food->first()->Food->foodCategories->FoodType}}</div>--}}
                                    {{--                                            </td>--}}
                                    {{--                                            <td class="text-center">{{$food->count()}}</td>--}}
                                    {{--                                            <td class="w-40">--}}
                                    {{--                                                <div class="flex items-center justify-center text-theme-24"><i--}}
                                    {{--                                                        data-feather="check-square" class="w-4 h-4 ml-2"></i> فعال--}}
                                    {{--                                                </div>--}}
                                    {{--                                            </td>--}}
                                    {{--                                            <td class="table-report__action w-56">--}}
                                    {{--                                                <div class="flex justify-center items-center">--}}
                                    {{--                                                    <a class="flex items-center ml-3"--}}
                                    {{--                                                       href=""> {{$food->first()->price}}</a>--}}
                                    {{--                                                </div>--}}
                                    {{--                                            </td>--}}
                                    {{--                                        </tr>--}}
                                    {{--                                    @endforeach--}}
                                    </tbody>
                                </table>
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
                                <div class="mt-5">
                                    @if($OrdersDetails->first() != null)
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
                            <div class="col-span-12 md:col-span-6 xl:col-span-4 xxl:col-span-12 mt-3 xxl:mt-8">
                                <div class="intro-x flex items-center h-10">
                                    <h2 class="text-lg font-medium truncate ml-5">
                                        سفارش های ارسال شده
                                    </h2>
                                </div>
                                <div class="mt-5">
                                    @if($OrderSend->first() != null)
                                        @foreach($OrderSend as $item)
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
                                        {{$OrderSend->links()}}
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
