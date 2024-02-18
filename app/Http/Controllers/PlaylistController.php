<?php

namespace App\Http\Controllers;

use App\Models\Playlist;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PlaylistSong;


class PlaylistController extends Controller
{
    
    public function index()
    {
        $user = session('user_id');
        $playlists = Playlist::where('listeners_id', $user)->select('id', 'name')->get();
        return view('interfaces/playlist', compact('playlists'));
    }

    public function selectPlaylist($songid){
        $user = session('user_id');
        $playlists = Playlist::where('listeners_id', $user)->select('id', 'name')->get();
        return view('playlist/selectplaylist', compact('songid','playlists'));
    }
    
    public function addtoPlaylist(PlaylistSong $playlistsong, Request $request){
        // $playlist = new PlaylistSong;
        // $playlist->playlist_id = $request->input('playlist_id');
        // $playlist->song_id = $request->input('song_id');
        // $playlist->save();
        // return redirect()->back();

        $playlist_id = $request->input('playlist_id');
        $song_id = $request->input('song_id');
        
        // Check if the song is already in the playlist
        $existing_song = $playlistsong->where('playlist_id', $playlist_id)
                                      ->where('song_id', $song_id)
                                      ->first();
        
        // If the song is already in the playlist, redirect back with an error message
        if ($existing_song) {
            return redirect('playlist')->with('error', 'This song is already in the playlist.');
        }
        
        // Otherwise, add the song to the playlist
        $playlist = new PlaylistSong;
        $playlist->playlist_id = $playlist_id;
        $playlist->song_id = $song_id;
        $playlist->save();
        return redirect('playlist')->with('success', 'Song added to playlist!');
    
        
    }

    public function getPlaylist($id){

        $playlist = Playlist::findOrFail($id);
        $songs = PlaylistSong::where('playlist_id', $id)
        ->join('audio', 'playlist_songs.song_id', '=', 'audio.id')
        ->select('audio.*')
        ->get();

        if ($songs->isEmpty()) {
            return redirect('playlist')->with('error', 'No songs in playlist');
        }

        foreach ($songs as $audio) {
            $hashNames[] = $audio->hashName;
        }

        return view('playlist/show')->with('playlist', $playlist)->with('hashNames',$hashNames);
    }

    public function deleteplaylist(Playlist $playlist, $id){

        $playlist = Playlist::findOrFail($id);
        $playlist->delete();
        return redirect()->back()->with('success', 'Playlist deleted!');

    }

    public function create(Request $request)
    {
        return view('playlist/create');
    }

    public function store(Request $request)
    {
        $obj = new Playlist;
        $obj->name=$request->playlistname;
        $listeners_id = session('user_id');
        $obj->listeners_id= $listeners_id;
        $obj->save();
        // return redirect('playlist');
        return redirect('playlist')->with('success', 'Playlist created!');

    }

    public function deleteSong($playlistId, $songId)
    {
        $playlistSong = PlaylistSong::where('playlist_id', $playlistId)
                                ->where('song_id', $songId)
                                ->delete();


    
        return redirect()->back()->with('success', 'Song deleted from playlist!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Playlist $playlist)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Playlist $playlist)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Playlist $playlist)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Playlist $playlist)
    {
        //
    }
}
