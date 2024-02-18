<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Playlists</title>
    <link rel="icon" type="image/png" href="assets\logoLaravelMusic.png">
    <link rel="stylesheet" href="{{ asset('css/comparar.css') }}"> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"> 
</head>
<body>
    <h3>Add to Playlist</h3>
    <table class="songs">
        <thead>
            <tr>
                <th>Name</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($playlists as $playlist)
            <tr>
                {{-- <td>{{ $playlist->id }}</td> --}}
                <td>{{ $playlist->name }}</td>
                <td>
                    <form method="post" action="{{route("savechanges")}}">
                        @csrf
                        <input type="hidden" name="song_id" value="{{ $songid }}">
                        <input type="hidden" name="playlist_id" value="{{ $playlist->id }}">
                        <button type="submit" class="btnplus"><img src="http://localhost/mercy/web-project/public/assets/plus.png" alt="Agregar"></button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>