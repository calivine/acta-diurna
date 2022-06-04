<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use Facades\App\Repository\Posts;
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
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        Log::info(log_client());
        /**
        // Get the most recent post by user
        $posts = Posts::getMostRecent();


        $post_date = $posts->created_at ?? "";
        $post_body = $posts->body ?? "Your post will go here.";
        */
        $post_body = "";
        $post_date = "";

        return view('content.home')->with([
            'post_date' => $post_date,
            'post_body' => $post_body
        ]);
    }
}
