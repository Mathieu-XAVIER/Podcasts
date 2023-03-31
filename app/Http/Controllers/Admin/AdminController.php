<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Podcast;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class AdminController extends Controller
{
    public function index()
    {
        $podcasts = Podcast::all();
        return view('admin.dashboard',['podcasts' => $podcasts]);
    }

    public function showUserPodcasts(){

        return view('podcasts.mypodcasts', ['podcasts' => auth()->user()->podcasts]);
    }
    public function show(Podcast $podcast){
        return view ('podcasts.mypodcasts', ['podcast' => $podcast]);
    }

    public function edit(Podcast $podcast){
        return view('podcasts.edit-podcast', ['podcast' => $podcast]);
    }

    public function update(Request $request, Podcast $podcast){
        $validated = $request->validate([
            'title' => ['nullable'],
            'description' => ['nullable'],
        ]);

        $podcast->update($validated);

        return redirect()->route('mypodcasts')->with('status', 'Podcast updated !');
    }

    public function destroy(string $id){
        Podcast::destroy($id);
        return redirect()->route('mypodcasts')->with('status', 'Podcast supprimé');
    }
    public function create():View{
        return view('podcasts.create-podcast');
    }

    public function store(Request $request){
        $validated = $request->validate([
            'title' => ['required'],
            'description' => ['required'],
            'audio' => ['required'],
        ]);

        $podcastPath = Storage::disk('public')->put('podcasts', $request->audio);

        auth()->user()->podcasts()->create([...$validated,'audio'=>$podcastPath]);

        return redirect()->route('dashboard')->with('status', 'Podcast ajouté !');

    }
}
