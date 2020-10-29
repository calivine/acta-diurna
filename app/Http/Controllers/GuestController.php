<?php

namespace App\Http\Controllers;

use Facades\App\Repository\Videos;
use Log;
use Illuminate\Http\Request;
use Cookie;

class GuestController extends Controller
{
    public function index()
    {
        Log::info(log_client());

        Log::info(Cookie::get('theme'));
        if (is_null(Cookie::get('theme')))
        {
            Cookie::queue(Cookie::make('theme', 'light', 300));
        }
        else
        {
            Cookie::queue('theme', Cookie::get('theme'), 300);
        }

        return view('content.welcome');
    }

    public function getArticle(String $title)
    {
        Log::info(log_client());

        Log::info(Cookie::get('theme'));
        if (is_null(Cookie::get('theme')))
        {
            Cookie::queue(Cookie::make('theme', 'light', 300));
        }
        else
        {
            Cookie::queue('theme', Cookie::get('theme'), 300);
        }
        $view = "content.{$title}";
        return view($view);
    }

    public function changeTheme(Request $request)
    {
        $theme = $request->input('theme');
        if (is_null(Cookie::get('theme')))
        {
            Cookie::queue(Cookie::make('theme', $theme, 300));
        }
        else
        {
            Cookie::queue('theme', $theme, 300);
        }

        return back();

    }
}
