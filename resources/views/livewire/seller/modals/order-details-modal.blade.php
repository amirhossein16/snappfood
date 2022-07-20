<div>
    <x-jet-dialog-modal wire:model="OrderDetailsModal">
        <x-slot name="title">
            <h2 class="font-medium text-base ml-auto">
                {{__('جزئیات سفارش')}}
            </h2>
        </x-slot>

        <x-slot name="content">
            <div class="col-span-12 sm:col-span-12">
                <div class="mt-3">
                    <div class="intro-y col-span-12 overflow-auto lg:overflow-visible">
                        <table class="table table-report -mt-2">
                            <thead>
                            <tr>
                                <th class="whitespace-nowrap">نام کاربر</th>
                                <th class="whitespace-nowrap">نام غذا</th>
                                <th class="text-center whitespace-nowrap">تعداد</th>
                                <th class="text-center whitespace-nowrap">قیمت</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(isset($this->details) && !empty($this->details))
                                @foreach($this->details as $item)
                                    <tr class="intro-x">
                                        <td class="w-40">
                                            <span class="font-medium whitespace-nowrap">
                                            {{\App\Models\Food::where('id',$item->food_id)->get()->first()->title}}
                                            </span>
                                        </td>
                                        <td>
                                            <span class="font-medium whitespace-nowrap">
                                                {{\App\Models\User::where('id',\App\Models\Cart::find($item->cart_id)->get()->first()->user_id)->get()->first()->name}}
                                            </span>
                                        </td>
                                        <td class="text-center">
                                            <span class="font-medium whitespace-nowrap">
                                            {{$item->count}}
                                            </span>
                                        </td>
                                        <td class="w-40">
                                            <span class="flex items-center justify-center text-theme-10">
                                                {{$item->price}}
                                            </span>
                                        </td>
                                    </tr>
                                @endforeach
                                @php
                                    unset($this->details)
                                @endphp
                            @endif
                            </tbody>
                        </table>
                        <span class="flex items-center justify-center text-emerald-500 text-lg">مجموع قیمت : {{$this->total}}</span>
                    </div>
                </div>
            </div>
        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$set('OrderDetailsModal', false)"
                                    class="btn btn-outline-secondary w-20 ml-1">
                {{ __('بستن') }}
            </x-jet-secondary-button>
        </x-slot>
    </x-jet-dialog-modal>
</div>
