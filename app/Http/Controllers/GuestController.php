<?php

namespace App\Http\Controllers;

use Facades\App\Repository\Videos;
use Log;
use Request;

class GuestController extends Controller
{
    public function index()
    {
        Log::info(log_client());
        $videos = Videos::all();

        return view('content.welcome')->with(['files' => $videos]);

    }
}
