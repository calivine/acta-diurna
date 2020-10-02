<?php

namespace App\Http\Controllers;

use App\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class TagController extends Controller
{
    public function videosByTag($tag)
    {
        $files = Tag::with('files')
            ->where('name', $tag)
            ->first();

        Log::channel('system')->info($files);


        return view('content.gallery')->with(['files' => $files->files]);


    }

    /**
     * Recalculate tags' weights. 
     */
    public function weight()
    {

        return;
    }
}
