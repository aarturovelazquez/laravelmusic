<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Playlists</title>
    <link rel="icon" type="image/png" href="assets\logoLaravelMusic.png">
    <link rel="stylesheet" href="{{ asset('css/comparar.css') }}"> 
    <link rel="stylesheet" href="{{ asset('css/button.css') }}">
</head>
<body>

    <header>
        <!-- SCRIPT JS dont move-->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> 
    
        <div class="user">
         
            <img src="assets/logoLaravelMusic.png" alt="">
            <h1 class="name">Laravel Music</h1>       
        </div> 
        <div class="navbar">
            <ul>
                <li><a href="{{url('oursongs')}}">Songs</a></li>
                <li><a href="{{url('likedsongs')}}">Favorites</a></li>
                <li><a href="{{url('mostrarSubirAudio')}}">Upload Song</a></li>
                <li><a href="{{url('playlist')}}">Playlists</a></li>
                <li><a href="{{url('profilepage')}}">Profile</a></li>
            </ul>      
       </div>
    </header>

    <h3>Playlists</h3>
    <a href="{{route('playlist.create')}}" class="spotify-button">Create a New Playlist</a>
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
                {{-- <td><a href="{{route('showplaylist/',$playlist->id)}}">Go to Playlist</a></td> --}}
                <td onclick="window.location.href='{{route('showplaylist',['id' => $playlist->id])}}';" class="redirect-row"><a>{{ $playlist->name }}</a>
                </td>
                <td>
                    <form action="{{ route('deleteplaylist', $playlist->id) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" style="background:none; border:none;">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#FA4B4B" class="bi bi-x-circle-fill" viewBox="0 0 16 16">
                              <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM5.354 4.646a.5.5 0 1 0-.708.708L7.293 8l-2.647 2.646a.5.5 0 0 0 .708.708L8 8.707l2.646 2.647a.5.5 0 0 0 .708-.708L8.707 8l2.647-2.646a.5.5 0 0 0-.708-.708L8 7.293 5.354 4.646z"/>
                            </svg>
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

@if(session('success'))
    <div class="alert success" role="alert">
        {{ session('success') }}
    </div>
@endif

@if(session('error'))
    <div class="alert error" role="alert">
        {{ session('error') }}
    </div>
@endif

<style>
    /* Alert styles */
    .alert {
        position: fixed;
        top: 20px;
        left: 50%;
        transform: translateX(-50%);
        z-index: 9999;
        padding: 10px;
        color: white;
        text-align: center;
        opacity: 0;
        transition: opacity 0.5s ease;
        border-radius: 10px;
    }

    .alert.success {
        background-color: #4CAF50;
    }

    .alert.error {
        background-color: #f44336;
    }

    /* Show the alert */
    .alert.show {
        opacity: 1;
    }

    /* Close the alert */
    .alert .close {
        position: absolute;
        top: 0;
        right: 10px;
        color: white;
        opacity: 0.7;
        transition: opacity 0.3s ease;
        cursor: pointer;
    }

    /* Close the alert on hover */
    .alert .close:hover {
        opacity: 1;
    }
</style>

<script>
    // Show the alert
    $('.alert').addClass('show');

    // Hide the alert after 2 seconds
    setTimeout(function() {
        $('.alert').removeClass('show');
    }, 2000);
</script>

</body>
</html>