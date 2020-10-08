<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Facades\App\Repository\Posts;
use Facades\App\Repository\Videos;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use App\File;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        Log::info(log_client());

        $user = Auth::user()->id;

        // Get the most recent post
        $posts = Posts::getMostRecent($user);

        $files = Videos::all();

        Log::channel('system')->info($files);

        $post_date = $posts->created_at ?? "";
        $post_body = $posts->body ?? "Your post will go here.";

        return view('home')->with([
            'post_date' => $post_date,
            'post_body' => $post_body,
            'files' => $files
        ]);
    }
}
