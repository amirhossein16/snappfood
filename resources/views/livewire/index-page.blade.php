<div>
    <div class="col-span-12 mt-8">
        <div class="intro-y flex items-center h-10">
            <h2 class="text-lg font-medium truncate ml-5 flex-1 w-full btn btn-outline-danger rounded-full mx-auto relative">
                تبلیغات ( بنر )
            </h2>
            <a href="" class="mr-auto flex items-center text-theme-26 dark:text-theme-33"> <i data-feather="refresh-ccw"
                                                                                              class="w-4 h-4 ml-3"></i>
                به روزرسانی داده </a>
        </div>
        <div class="grid gap-6 mt-2">
            <div class="mt-5 intro-x">
                <div class="zoom-in w-full">
                    <div class="tiny-slider" id="important-notes" style="transform: none">
                        @if(!empty($Banners))
                            @foreach($Banners as $Banner)
                                <div class="h-full rounded-md">
                                    <img alt="Icewall Tailwind HTML Admin Template"
                                         class="image-fit rounded-full h-full font-medium w-full flex items-center justify-center text-2xl"
                                         src="{{asset("storage/$Banner->path")}}">
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<h2 class="text-lg font-medium truncate ml-5 mt-8 flex-1 w-full btn btn-outline-warning rounded-full mx-auto relative">
    رستوران های اسنپ فود</h2>
<div class="grid grid-cols-12 gap-6 mt-5">
    @if(!empty($Restaurant))
        @foreach($Restaurant as $item)
            <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                <div class="report-box zoom-in">
                    <div class="box p-5">
                        <div class="flex">
                            <i data-feather="shopping-cart" class="report-box__icon text-theme-21"></i>
                            <div class="mr-auto">
                                <div class="report-box__indicator bg-theme-10 tooltip cursor-pointer"
                                     title="تعداد فروش"> {{$item->Orders->count()}} <i data-feather="chevron-up"
                                                                                       class="w-4 h-4 mr-0.5"></i>
                                </div>
                            </div>
                            <div class="mr-auto">
                                @if($item->is_open)
                                    <div class="report-box__indicator bg-green-500 tooltip cursor-pointer"
                                         title="وضعیت فروشگاه">
                                        باز است
                                        <i data-feather="chevron-up" class="w-4 h-4 mr-0.5"></i>
                                    </div>
                                @else
                                    <div class="report-box__indicator bg-red-500 tooltip cursor-pointer"
                                         title="وضعیت فروشگاه">
                                        بسته است
                                        <i data-feather="chevron-up" class="w-4 h-4 mr-0.5"></i>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="text-xl font-bold leading-8 mt-6 text-theme-17">
                            <span class="text-sm text-gray-700">تعداد غذای موجود :</span>
                            {{$item->food->count()}}
                        </div>
                        <div class="text-xl font-bold leading-8 mt-6 text-theme-17">
                            <span class="text-sm text-gray-700">نام رستوران :</span>
                            {{$item->name}}
                        </div>
                        <div class="text-xl font-bold leading-8 mt-6 text-theme-17">
                            @php
                                $filename = str_replace(' ','_',$item->name)
                            @endphp
                            <img src="{{ asset("storage/photos/Restaurant/$filename".'.jpg') }}" alt="RestaurantBaner"/>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    @endif
</div>
<h2 class="text-lg font-medium truncate ml-5 mt-8 flex-1 w-full btn btn-outline-success rounded-full mx-auto relative">
    فودپارتی </h2>
<div class="grid grid-cols-4 gap-6 mt-2">
    <div class="mt-5 intro-x">
        <div class="box zoom-in w-full">
            <div class="tiny-slider" id="important-notes">
                @if(!empty($FoodParty))
                    @foreach($FoodParty[0] as $food)
                        @if($food->first() != null)
                            <div class="p-5">
                                @php
                                    $filename = str_replace(' ','_',$food->first()->title);
                                @endphp
                                <img alt="Icewall Tailwind HTML Admin Template" class="image-fit w-full"
                                     src="{{asset("/storage/photos/Foods/$filename"."_1.jpg")}}">
                                <div class="text-base font-medium truncate mt-2">{{$food->first()->title}} </div>
                                <div class="text-gray-500 mt-1">{{$food->first()->price}}</div>
                                <div class="text-gray-600 text-right mt-1">{{$food->first()->raw_material}}</div>
                                <div class="font-medium flex mt-5">
                                    <button type="button" class="btn btn-outline-secondary py-1 px-2 ">خرید
                                    </button>
                                    <button type="button" class="btn btn-secondary py-1 px-2 ml-auto ml-auto">
                                        @foreach(DB::table('food_partiey')->get() as $item)
                                            @if($item->food_id == $food->id)
                                                {{$item->DiscountAmount}}% تخفیف
                                            @endif
                                        @endforeach
                                    </button>

                                </div>
                            </div>
                        @endif
                    @endforeach
                @endif
            </div>
        </div>
    </div>
</div>
