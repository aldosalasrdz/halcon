<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TrackOrderController extends Controller
{
    public function show()
    {
        return view('guest.track-order');
    }

    public function showOrderStatus()
    {

    }
}
