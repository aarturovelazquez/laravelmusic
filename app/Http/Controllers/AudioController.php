<?php

namespace App\Http\Controllers;

use App\Models\Audio;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Favorites;
use App\Http\Controllers\FavoritesController;

class AudioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("interfaces/audio");
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    public function showAudio()
    {
        return view("interfaces/audio");
    }

   

    public function SubirAudio(Request $request){
        $obj=new Audio();     
        $file=$request->file("archivo");
        $request->file("archivo")->store('public');
        $file->store("public");   
        // dd($file); //muestra la informacion del archivo
        

        $obj->nombre=$request->nombre;
        $obj->artista=$request->artista;
        $obj->album=$request->album;
        $obj->duracion=$request->duracion;
        // $obj->hashName = explode('.', $file->hashName())[0];
        $obj->hashName=$file->hashName();
        $obj->save();

        $hashNames = []; // crear un arreglo vacío para guardar los hashnames
        foreach (Audio::all() as $audio) {
            $hashNames[] = $audio->hashName;
        }

        return view ("interfaces/comparar")->with('hashNames',$hashNames)->with('success', 'Song added.');
        
    }

    public function catalog(){
        foreach (Audio::all() as $audio) {
            $hashNames[] = $audio->hashName;
        }

        return view ("interfaces/comparar")->with('hashNames',$hashNames);
        
    }

    function getFavoriteSongs() {
        $userId = session('user_id');
        $songs = Favorites::where('user_id', $userId)
            ->join('audio', 'favorites.song_id', '=', 'audio.id')
            ->select('audio.*')
            ->get();

        if ($songs->isEmpty()) {
                return redirect('oursongs')->with('error', 'No liked songs');
            }
        

        foreach ($songs as $audio) {
            $hashNames[] = $audio->hashName;
        }

        return view("interfaces/mymusic")->with('hashNames',$hashNames);
    }


    public function deletefavorite($id){
        $userId = session('user_id');
        $favorite = Favorites::where('user_id', $userId)
            ->where('song_id', $id)
            ->first();
    
        if ($favorite) {
            $favorite->delete();
            return back()->with('success', 'Song removed from favorites.');
        } else {
            return back()->with('error', 'Song not found in favorites.');
        }
    }


    /**
     * Display the specified resource.
     */
    public function show(Audio $audio)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Audio $audio)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Audio $audio)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Audio $audio)
    {
        //
    }

    public function addfavorite(Favorites $favorite, $id){
        $userId = session('user_id');
        $song = Audio::find($id);
        if (!$song) {
            // song not found
            return redirect()->back()->with('error', 'Song not found');
        }
        
        $favorite = Favorites::where('user_id', $userId)
                             ->where('song_id', $id)
                             ->first();
        
        if ($favorite) {
            // user has already liked the song
            return redirect()->back()->with('error', 'You have already liked this song');
        }
        
        $favorite = new Favorites;
        $favorite->user_id = $userId;
        $favorite->song_id = $id;
        $favorite->save();
        
        return redirect('oursongs')->with('success', 'Song added to favorites');
    }
}