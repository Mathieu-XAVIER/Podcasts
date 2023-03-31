<?php

namespace App\Http\Controllers;

use App\Models\Podcast;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;
use phpDocumentor\Reflection\Types\Null_;

class PodcastController extends Controller
{

    public function index()
    {
        if (Auth::user()->role === 'admin'){
            return redirect()->route('admin.dashboard.index');
        }
        $podcasts = Podcast::all();
        return view('dashboard',['podcasts' => $podcasts]);
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
            'audio' => ['nullable'],
        ]);

        if ($request->hasFile('audio')) {
            $podcastPath = Storage::disk('public')->put('podcasts', $request->audio);
            $podcast->audio = $podcastPath;
        }

        $podcast->title = $validated['title'];
        $podcast->description = $validated['description'];
        $podcast->save();
//        $podcast->update($validated);

        return redirect()->route('mypodcasts')->with('status', 'Podcast mis à jour !');
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

        return redirect()->route('mypodcasts')->with('status', 'Podcast ajouté !');

    }
}
