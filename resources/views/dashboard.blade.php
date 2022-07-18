<x-app-layout>
    <div>
        <!-- BEGIN: Content -->
        <div class="wrapper wrapper--top-nav">
            <div class="wrapper-box">
                <!-- BEGIN: Content -->
                @if(empty(auth()->user()->restaurantDetail->phone) && auth()->user()->role == 'seller')
                    <script>window.location = "/RestaurantPanel";</script>
                @else
                    <x-jet-welcome/>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
