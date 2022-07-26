<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class profile_completed
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return Response|RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $table = 'restaurant_details'; // change it to your db table

        $columns = Schema::getColumnListing($table);

        $dates = ['created_at', 'updated_at']; // add other date, timespan, or datetime fields

        $data = DB::table($table)->where('id', auth()->user()->restaurantDetail->id)->where(function ($query) use ($columns, $dates) {
            foreach ($columns as $column) {
                $query->orWhereNull($column);

                if (!in_array($column, $dates)) {
                    $query->orWhere($column, '');
                }
            }
        })->get();
        $result = $data->mapWithKeys(function ($item) {
            return [
                $item->id => collect($item)->filter(function ($property) {
                    return is_null($property) || empty($property);
                })->keys()->toArray()
            ];
        });
        if (empty($result)) {
            if ($result->first()[0] == 'lat') {
                return redirect('RestaurantPanel')->with('livewire-toast', ['type' => 'warning', 'message' => 'This is warning!']);
            }
            return redirect('RestaurantPanel');
        }
        return $next($request);
    }
}
