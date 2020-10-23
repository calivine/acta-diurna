<?php

namespace App\Http\Controllers;

use Facades\App\Repository\Videos;
use Log;
use Request;
use Cookie;

class GuestController extends Controller
{
    public function index()
    {
        Log::info(log_client());
        $videos = Videos::all();
        Log::info(Cookie::get('theme'));
        if (is_null(Cookie::get('theme')))
        {
            Cookie::queue(Cookie::make('theme', 'dark'), 300);
        }
        else
        {
            Cookie::queue(Cookie::get('theme'), 300);
        }

        return view('content.welcome')->with(['files' => $videos]);

    }
}
