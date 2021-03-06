<?php

namespace App\Http\Controllers;

use Facades\App\Repository\Posts;
use Facades\App\Repository\Videos;
use Illuminate\Support\Facades\Log;


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

        // Get the most recent post by user
        $posts = Posts::getMostRecent();

        // $files = Videos::allFromUser(25);
        $files = Videos::dashboardVideos();
        $post_date = $posts->created_at ?? "";
        $post_body = $posts->body ?? "Your post will go here.";

        return view('content.home')->with([
            'post_date' => $post_date,
            'post_body' => $post_body,
            'files' => $files
        ]);
    }
}
