<div>
    <livewire:delete-modal/>
    <livewire:seller.modals.photo-modal/>
    <livewire:seller.modals.food-discount-edit-modal/>
    <livewire:seller.modals.food-discount-add-modal/>
    <livewire:seller.modals.food-edit-modal/>
    <livewire:seller.modals.food-add-modal/>
    <livewire:seller.modals.add-food-to-party-modal/>
    <!-- BEGIN: Content -->
    <div class="wrapper wrapper--top-nav">
        <div class="wrapper-box">
            <!-- BEGIN: Content -->
            <div class="content">
                <div class="intro-y flex flex-col sm:flex-row items-center mt-8">

                    <x-tables.header>
                        تنظیمات غذاها
                    </x-tables.header>
                    <div class="w-full sm:w-auto flex mt-4 sm:mt-0">
                        <button wire:click="$emit('confirmFoodAddToParty')"
                                class="btn btn-elevated-warning shadow-md ml-2">
                            افزودن غذا به فودپارتی
                        </button>
                    </div>
                    <div class="w-full sm:w-auto flex mt-4 sm:mt-0">
                        <button wire:click="$emit('confirmFoodAdd')" class="btn btn-primary shadow-md ml-2">
                            افزودن
                            محصول جدید
                        </button>
                    </div>
                </div>
                <div class="intro-y box p-5 mt-5">
                    <div class="p-5" id="striped-rows-table">
                        <div class="preview">
                            <div class="overflow-x-auto">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th class="border-b-2 dark:border-dark-5 whitespace-nowrap">ردیف</th>
                                        <th class="border-b-2 dark:border-dark-5 whitespace-nowrap">تصویر</th>
                                        <th class="border-b-2 dark:border-dark-5 whitespace-nowrap">نام غذا</th>
                                        <th class="border-b-2 dark:border-dark-5 whitespace-nowrap">دسته بندی</th>
                                        <th class="border-b-2 dark:border-dark-5 whitespace-nowrap">مواد اولیه</th>
                                        <th class="border-b-2 dark:border-dark-5 whitespace-nowrap">تخفیف</th>
                                        <th class="border-b-2 dark:border-dark-5 whitespace-nowrap">انقضا کد تخفیف</th>
                                        <th class="border-b-2 dark:border-dark-5 whitespace-nowrap">مقدار تخفیف</th>
                                        <th class="border-b-2 dark:border-dark-5 whitespace-nowrap">قیمت</th>
                                        <th class="border-b-2 dark:border-dark-5 whitespace-nowrap">عملیات</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @php $Row = 0 @endphp
                                    @foreach ($Category as $Categories)
                                        @if( $Categories->id % 2 == 0  )
                                            <tr>
                                        @else
                                            <tr class="bg-gray-200 dark:bg-dark-1">
                                                @endif
                                                <td class="border-b dark:border-dark-5 text-lg font-medium">{{ ++$Row }}</td>
                                                <td class="w-40">
                                                    <div class="flex">
                                                        @php
                                                            $filename = str_replace(' ','_',$Categories->title);
                                                            for ($i=1;$i<6;$i++){
                                                                if (Storage::disk('public')->exists("/photos/Foods/$filename"."_$i".'.jpg')){
                                                                $path[$i]=asset("storage/photos/Foods/$filename"."_$i".'.jpg');
                                                                }
                                                            }
                                                        @endphp
                                                        @if(isset($path))
                                                            @foreach($path as $item)
                                                                <div class="w-10 h-10 image-fit zoom-in">
                                                                    <img alt="Icewall Tailwind HTML Admin Template"
                                                                         class="tooltip rounded-full"
                                                                         src="{{$item}}"
                                                                         title="آپلود شده در19 آذر 1400">
                                                                </div>
                                                            @endforeach
                                                        @endif
                                                        @php
                                                            unset($path)
                                                        @endphp
                                                    </div>
                                                </td>
                                                <td class="border-b dark:border-dark-5 text-lg font-medium">
                                                    <p>{{ $Categories->title }}</p>
                                                    @php
                                                        $party = \Illuminate\Support\Facades\DB::table('food_partiey')
                                                            ->where('food_id',$Categories->id)->get();
                                                    @endphp
                                                    @if ($party->first() != null && \App\Models\FoodParty::where('id',$party->first()->food_party_id)->get()->first()->status == 1)
                                                        <span
                                                            class="py-1 px-2 rounded-full text-xs bg-theme-10 text-white cursor-pointer font-medium">
                                                        فود پارتی                                                             @endif
                                                    </span>
                                                </td>
                                                <td class="border-b dark:border-dark-5 text-lg font-medium">{{ \App\Models\foodCategories::where('id','=',$Categories->food_categories_id)->get()->first()->FoodType }}</td>
                                                <td class="border-b dark:border-dark-5 text-lg font-medium">{{ $Categories->raw_material }}</td>
                                                <td class="border-b dark:border-dark-5 text-lg font-medium">@if($Categories->off == null || $Categories->off == 0)
                                                        ندارد
                                                    @elseif($Categories->off == 1)
                                                        {{\App\Models\Discount::find(\App\Models\DiscountFood::where('food_id','=',$Categories->id)->get()[0]->discount_id)->title}}
                                                    @endif</td>
                                                <td class="border-b dark:border-dark-5 text-lg font-medium">@php
                                                        if ($Categories->off == 1){
                                                            $expireTime = \Carbon\Carbon::parse(\App\Models\Discount::find(\App\Models\DiscountFood::where('food_id','=',$Categories->id)->get()[0]->discount_id)->ExpireTime);
                                                            echo $expireTime->diffInDays();
                                                        }else{
                                                            echo "----";
                                                        }
                                                    @endphp</td>
                                                <td class="border-b dark:border-dark-5 text-lg font-medium">@if($Categories->off == null || $Categories->off == 0)
                                                        ----
                                                    @elseif($Categories->off == 1)
                                                        @php
                                                            $discounts =\App\Models\Discount::find(\App\Models\DiscountFood::where('food_id','=',$Categories->id)->get()->first()->discount_id);
                                                        @endphp
                                                        @if ( $discounts->type == 'Percentage')
                                                            {{\App\Models\Discount::find(\App\Models\DiscountFood::where('food_id',$Categories->id)->get()->first()->discount_id)->amount}}
                                                            %
                                                        @elseif($discounts->type == 'Price')
                                                            <span class="text-sm">{{\App\Models\Discount::find(\App\Models\DiscountFood::where('food_id',$Categories->id)->get()->first()->discount_id)->amount}} تومان</span>
                                                        @endif
                                                    @endif</td>
                                                <td class="border-b dark:border-dark-5 text-lg font-medium">@if($Categories->off == null || $Categories->off == 0)
                                                        {{ $Categories->price }}
                                                    @elseif($Categories->off == 1)
                                                        @php
                                                            $discounts =\App\Models\Discount::find(\App\Models\DiscountFood::where('food_id','=',$Categories->id)->get()->first()->discount_id);
                                                        @endphp
                                                        @if ( $discounts->type == 'Percentage')
                                                            <span
                                                                class="text-red-500"><s> {{
                                                        ($Categories->price)*(100 - $discounts->amount)
                                                         }}</s></span>
                                                            <span
                                                                class="text-green-500"> {!! $Categories->price !!} </span>
                                                        @elseif($discounts->type == 'Price')
                                                            <span
                                                                class="text-red-500"><s> {!! $Categories->price !!}</s></span>
                                                            <span
                                                                class="text-green-500">{!! $Categories->price -= $discounts->amount !!}</span>
                                                        @endif
                                                    @endif</td>
                                                <td class="border-b dark:border-dark-5 text-lg font-medium">
                                                    <button class="btn text-sm btn-elevated-success w-20 ml-1 mb-2"
                                                            wire:click="$emit('PhotoModal',{{$Categories->id}})">
                                                        تصویر
                                                    </button>
                                                    <button class="btn text-sm btn-elevated-primary w-20 ml-1 mb-2"
                                                            wire:click="$emit('EditModalConfirm',{{$Categories->id}})">
                                                        ویرایش
                                                    </button>
                                                    <x-jet-button
                                                        class="btn btn-elevated-secondary w-16 ml-1 mb-2 text-indigo-900"
                                                        wire:click="$emit('DeleteModal',{{$Categories->id}})"
                                                    >حذف
                                                    </x-jet-button>
                                                    @if($Categories->off == null || $Categories->off == 0)
                                                        <button
                                                            class="btn btn-elevated-dark w-24 ml-1 mb-2"
                                                            wire:click="$emit('confirmAddDiscount', {{ $Categories->id }})">
                                                            کد تخفیف
                                                        </button>
                                                    @elseif($Categories->off == 1)
                                                        <button
                                                            class="btn btn-elevated-dark w-32 p-2 ml-1 mb-2 text-sm text-green-50"
                                                            wire:click="$emit('confirmEditDiscount', {{ $Categories->id }})"
                                                            wire:loading.attr="disabled">
                                                            ویرایش کد تخفیف
                                                        </button>
                                                        <button
                                                            class="btn btn-danger ml-1 relative top-[8px] report-box__indicator tooltip cursor-pointer"
                                                            title="حذف کد تخفیف"><i data-feather="trash"
                                                                                    class="w-5 h-5"></i></button>
                                                    @endif
                                                </td>
                                            </tr>
                                            @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
