<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Profile</title>
     <link rel="stylesheet" href="{{ asset('css/profile.css') }}"> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"> 
    <link rel="icon" type="image/png" href="{{ asset('assets/logoLaravelMusic.png') }}">
    <link rel="stylesheet" href="{{ asset('css/button.css') }}">
</head>

<body>

<header>

    <div class="user">
     
        <img src="{{ asset('assets/logoLaravelMusic.png') }}" alt="">
        <h1 class="name">{{ $user->firstname}}  {{ $user->lastname}}</h1>       
    </div> 

   

    <div class="navbar">
        <ul>
            <li><a href="{{url('oursongs')}}">Songs</a></li>
            <li><a href="{{url('likedsongs')}}">Favorites</a></li>
            <li><a href="{{url('mostrarSubirAudio')}}">Upload Song</a></li>
            <li><a href="{{url('playlist')}}">Playlists</a></li>
            <li><a href="{{url('profilepage')}}">Profile</a></li>
        </ul>      
   <a class="spotify-button" href="{{route('logout')}}">Log Out</a>
   </div>

</header>

<section class="songs" id="songs">
    <img src="/mercy/web-project/storage/app/public/{{ $user->profile_picture }}" class="profile-picture" alt="">
    <br>
    <h1>Hello, there {{ $user->firstname}} !</h1>
    <h2>Make your profile look like you!</h2>
    <a  href="{{route('profile.edit',$user->id)}}"><button class="btn" >Edit <i class="fas fa-user"></i></button></a>
</section>

<!-- JQUERY  -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<!-- js script -->
<script src="{{asset('js/profile.js') }}"></script>
</body>
</html>