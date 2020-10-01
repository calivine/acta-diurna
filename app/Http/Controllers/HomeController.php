<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use App\Post;
use App\File;
use App\Thumbnail;

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

        $id = Auth::user()->id;

        // Get the most recent post
        $posts = Post::where('user_id', $id)
            ->orderBy('created_at', 'desc')
            ->first();

        $files = File::with(['thumbnail', 'gif'])
            ->orderBy('created_at', 'desc')
            ->get();

        $post_date = $posts->created_at ?? "";
        $post_body = $posts->body ?? "Your post will go here.";

        return view('home')->with([
            'post_date' => $post_date,
            'post_body' => $post_body,
            'files' => $files
        ]);
    }
}
