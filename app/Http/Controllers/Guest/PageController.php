<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use App\Models\Train;
use Illuminate\Http\Request;
use Carbon\Carbon;


class PageController extends Controller
{
    //
    public function index(){
        $now = Carbon::now();
        $date_now = explode(' ', $now)[0]; //pick only the date section from carbon::now
        //compare it
        $today_trips = Train::where('day_of_leaving', '=', $date_now)
                                // show only not-deleted trains
                                ->where('deleted', 0)
                                ->get();
        return view('home', compact('today_trips'));
    }
}
