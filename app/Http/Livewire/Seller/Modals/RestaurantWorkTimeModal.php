<?php

namespace App\Http\Livewire\Seller\Modals;

use App\Models\RestaurantDetail;
use App\Models\WorkingTime;
use Livewire\Component;

class RestaurantWorkTimeModal extends Component
{
    public $Saturday_start, $Saturday_end, $Sunday_start, $Sunday_end, $Monday_start, $Monday_end, $Tuesday_start, $Tuesday_end, $Wednesday_start, $Wednesday_end, $Thursday_start, $Thursday_end, $Friday_start, $Friday_end, $RestaurantTime;
    public $confirmRestaurantWorkingTimeModal = false;
    protected $listeners = ['OpenWorkingTimeModal'];

    protected $rules = [
        'Saturday_start' => 'required',
        'Saturday_end' => 'required|after:Saturday_start',
        'Sunday_start' => 'required',
        'Sunday_end' => 'required|after:Sunday_start',
        'Monday_start' => 'required',
        'Monday_end' => 'required|after:Monday_start',
        'Tuesday_start' => 'required',
        'Tuesday_end' => 'required|after:Tuesday_start',
        'Wednesday_start' => 'required',
        'Wednesday_end' => 'required|after:Wednesday_start',
        'Thursday_start' => 'required',
        'Thursday_end' => 'required|after:Thursday_start',
        'Friday_start' => 'required',
        'Friday_end' => 'required|after:Friday_start',
    ];

    public function OpenWorkingTimeModal($id)
    {
        $this->confirmRestaurantWorkingTimeModal = true;
        $this->RestaurantTime = WorkingTime::where('restaurant_detail_id', $id)->get()->first();
        if ($this->RestaurantTime != null) {
            $this->Saturday_start = explode('-', $this->RestaurantTime->Saturday)[0];
            $this->Saturday_end = explode('-', $this->RestaurantTime->Saturday)[1];
            $this->Sunday_start = explode('-', $this->RestaurantTime->Sunday)[0];
            $this->Sunday_end = explode('-', $this->RestaurantTime->Sunday)[1];
            $this->Monday_start = explode('-', $this->RestaurantTime->Monday)[0];
            $this->Monday_end = explode('-', $this->RestaurantTime->Monday)[1];
            $this->Tuesday_start = explode('-', $this->RestaurantTime->Tuesday)[0];
            $this->Tuesday_end = explode('-', $this->RestaurantTime->Tuesday)[1];
            $this->Wednesday_start = explode('-', $this->RestaurantTime->Wednesday)[0];
            $this->Wednesday_end = explode('-', $this->RestaurantTime->Wednesday)[1];
            $this->Thursday_start = explode('-', $this->RestaurantTime->Thursday)[0];
            $this->Thursday_end = explode('-', $this->RestaurantTime->Thursday)[1];
            $this->Friday_start = explode('-', $this->RestaurantTime->Friday)[0];
            $this->Friday_end = explode('-', $this->RestaurantTime->Friday)[1];
        }
    }

    public function EditWorkingTime()
    {
        $this->validate();
        if (WorkingTime::find(auth()->user()->restaurantDetail->id) != null) {
            WorkingTime::where('restaurant_detail_id', auth()->user()->restaurantDetail->id)->update([
                'Saturday' => $this->Saturday_start . '-' . $this->Saturday_end,
                'Sunday' => $this->Sunday_start . '-' . $this->Sunday_end,
                'Monday' => $this->Monday_start . '-' . $this->Monday_end,
                'Tuesday' => $this->Tuesday_start . '-' . $this->Tuesday_end,
                'Wednesday' => $this->Wednesday_start . '-' . $this->Wednesday_end,
                'Thursday' => $this->Thursday_start . '-' . $this->Thursday_end,
                'Friday' => $this->Friday_start . '-' . $this->Friday_end,
            ]);
        } else
            \App\Models\WorkingTime::updateOrCreate([
                'restaurant_detail_id' => auth()->user()->restaurantDetail->id,
                'Saturday' => $this->Saturday_start . '-' . $this->Saturday_end,
                'Sunday' => $this->Sunday_start . '-' . $this->Sunday_end,
                'Monday' => $this->Monday_start . '-' . $this->Monday_end,
                'Tuesday' => $this->Tuesday_start . '-' . $this->Tuesday_end,
                'Wednesday' => $this->Wednesday_start . '-' . $this->Wednesday_end,
                'Thursday' => $this->Thursday_start . '-' . $this->Thursday_end,
                'Friday' => $this->Friday_start . '-' . $this->Friday_end,
            ]);
        $this->confirmRestaurantWorkingTimeModal = false;
        $this->emitTo('livewire-toast', 'show', 'زمانبندی با موفقیت بروز شد :)');
    }

    public function render()
    {
        return view('livewire.seller.modals.restaurant-work-time-modal');
    }
}
