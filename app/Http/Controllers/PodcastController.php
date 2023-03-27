<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PodcastController extends Controller
{

    public function create():View{
        return view('podcasts.create-podcast');
    }
}
