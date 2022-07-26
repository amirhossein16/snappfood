<?php

namespace App\Http\Livewire\Seller;

use Livewire\Component;
use Spatie\OpeningHours\OpeningHours;

class WorkingTime extends Component
{
    public $Saturday_start, $Saturday_end, $Sunday_start, $Sunday_end, $Monday_start, $Monday_end, $Tuesday_start, $Tuesday_end, $Wednesday_start, $Wednesday_end, $Thursday_start, $Thursday_end, $Friday_start, $Friday_end;
    protected $listeners = ['AddHours'];
    public $RestaurantTime;

    protected $rules = [
        'RestaurantTime.Saturday_start' => 'required',
        'RestaurantTime.Saturday_end' => 'required',
        'RestaurantTime.Sunday_start' => 'required',
        'RestaurantTime.Sunday_end' => 'required',
        'RestaurantTime.Monday_start' => 'required',
        'RestaurantTime.Monday_end' => 'required',
        'RestaurantTime.Tuesday_start' => 'required',
        'RestaurantTime.Tuesday_end' => 'required',
        'RestaurantTime.Wednesday_start' => 'required',
        'RestaurantTime.Wednesday_end' => 'required',
        'RestaurantTime.Thursday_start' => 'required',
        'RestaurantTime.Thursday_end' => 'required',
        'RestaurantTime.Friday_start' => 'required',
        'RestaurantTime.Friday_end' => 'required',
    ];

    public function mount()
    {
        $this->RestaurantTime = \App\Models\WorkingTime::where('restaurant_detail_id', auth()->user()->restaurantDetail->id)->get()->first();
    }

    public function AddHours()
    {
        $this->validate();
        if ($this->RestaurantTime == null) {
            \App\Models\WorkingTime::create([
                'Saturday' => $this->RestaurantTime['Saturday_start'] . '-' . $this->RestaurantTime['Saturday_end'],
                'Sunday' => $this->RestaurantTime['Sunday_start'] . '-' . $this->RestaurantTime['Sunday_end'],
                'Monday' => $this->RestaurantTime['Monday_start'] . '-' . $this->RestaurantTime['Monday_end'],
                'Tuesday' => $this->RestaurantTime['Tuesday_start'] . '-' . $this->RestaurantTime['Tuesday_end'],
                'Wednesday' => $this->RestaurantTime['Wednesday_start'] . '-' . $this->RestaurantTime['Wednesday_end'],
                'Thursday' => $this->RestaurantTime['Thursday_start'] . '-' . $this->RestaurantTime['Thursday_end'],
                'Friday' => $this->RestaurantTime['Friday_start'] . '-' . $this->RestaurantTime['Friday_end'],
                'restaurant_detail_id' => auth()->user()->restaurantDetail->id,
            ]);
        } else {
            $this->RestaurantTime->update([
                'Saturday' => 'Unallocated',
                'Sunday' => 'Unallocated',
                'Monday' => 'Unallocated',
                'Tuesday' => 'Unallocated',
                'Wednesday' => 'Unallocated',
                'Thursday' => 'Unallocated',
                'Friday' => 'Unallocated',
            ]);
        }
    }


    public function render()
    {
        return view('livewire.seller.working-time');
    }
}
