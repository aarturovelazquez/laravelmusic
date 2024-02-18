<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $playlist->name }}</title>
    <link rel="icon" type="image/png" href={{asset("assets\logoLaravelMusic.png")}}>
    <link rel="stylesheet" href="{{ asset('css/comparar.css') }}"> 
    <link rel="stylesheet" href="{{ asset('css/musicBar.css') }}"> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"> 
</head>
<body>
    <header>
        <!-- SCRIPT JS dont move-->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> 
    
        <div class="user">
            <img src={{ asset('assets/logoLaravelMusic.png')}} alt="">
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

<section class="songs" id="songs">
    <h1 class="name">{{$playlist ->name}}</h1>
    <table>
        <tr>
            <th></th>
            <th>Name</th>
            <th>Artist</th>
            <th>Album</th>
            <th>Length</th>
            <th></th>
        </tr>
        @foreach ($hashNames as $hashName)
            @php
                $audio = \App\Models\Audio::where('hashName', $hashName)->first();
            @endphp
            <tr>
            <td>
                <button class="audio-control" data-src="/mercy/web-project/storage/app/public/{{ $audio->hashName }}">
                    {{-- <button class="audio-control" data-src="{{ asset('/mercy/web-project/' . str_replace('storage/app/public/', '', $audio->hashName )) }}"> --}}
                    
            <img src={{ asset("assets\play.png")}}  />
            </button>  
                </td>
                <td>{{ $audio->nombre }}</td>
                <td>{{ $audio->artista }}</td>
                <td>{{ $audio->album }}</td>
                <td>{{ $audio->duracion }}</td>
                <td>
                    <form action="{{route('deleteSong', [$playlist->id, $audio->id]) }}" method="POST" style="display:inline-block;">
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
</table>
</section>
        <!-- script funcion de cancion actual -->
        <script>
            $(document).ready(function() {
             // Controlador de eventos de clic en los botones "Play"
             $('.audio-control').click(function() {
             var src = $(this).data('src');
             var nombre = $(this).closest('tr').find('td:first-child').text();
             var artista = $(this).closest('tr').find('td:nth-child(2)').text();
             
             $('#audio-player').attr('src', src);
             $('#audio-player').attr('nombre', nombre);
             $('#audio-player').attr('artista', artista);
             
             $('#audio-player')[0].play();
             
             $('#nombre-cancion').text(nombre);
             $('#artista-cancion').text(artista);
         });
         });
         </script>
         
         
         
         
         <!-- REPRODUCTOR FOOTER -->
         <section>
                 <div class="music-player">
                     <div class="song-bar">
                         <div class="song-infos">
                             <!-- <div class="image-container">
                                 <img src="https://d2y6mqrpjbqoe6.cloudfront.net/image/upload/f_auto,q_auto/media/library-400/216_636967437355378335Your_Lie_Small_hq.jpg" alt="" />
                             </div> -->
                             <div  class="song-description">
                                 <p id="nombre-cancion" class="title">
                                 {{ $audio->nombre }}
                                 </p>
                                 <p id="artista-cancion" class="artist">{{ $audio->artista}}</p>
                             </div>
                         </div>
                     </div>
                         <!-- f -->
                                             <div class="progress-controller">
                             <div class="control-buttons">
                                 
                                 <button class="play-pause">
                                     <i class="fas fa-play"></i>
                                     <i class="fas fa-pause"></i>
                                 </button>
                               
                             </div>
                             <div class="progress-container">
                                 <span class="current-time">0:00</span>
                                 <input type="range" class="progress-bar" value="0" step="0.1">
                                 <span class="duration">0:00</span>
                             </div>
                         </div>
                         <audio src="{{ $audio->ruta }}" id="audio-player"></audio>
                         <!-- d -->
                   
                     <div class="other-features">
                     <div class="volume-bar">
             <i class="fas fa-volume-down"></i>
             <input type="range" min="0" max="100" value="100" step="1" class="volume-range">
             <div class="volume-progress"></div>
         </div>
                         </div>
                      
                 </div>
         </section>
         <!-- REPRODUCTOR END -->
         
         
         
         <!-- Scrip reproductor Footer -->
         <script>
             const audio = document.getElementById('audio-player');
             const playPauseButton = document.querySelector('.play-pause');
             const progressBar = document.querySelector('.progress-bar');
             const currentTime = document.querySelector('.current-time');
             const duration = document.querySelector('.duration');
             const volumeRange = document.querySelector('.volume-range');
             const volumeProgress = document.querySelector('.volume-progress');
         
             playPauseButton.addEventListener('click', () => {
                 if (audio.paused) {
                     audio.play();
                     playPauseButton.classList.add('playing');
                 } else {
                     audio.pause();
                     playPauseButton.classList.remove('playing');
                 }
             });
         
             audio.addEventListener('timeupdate', () => {
                 currentTime.textContent = formatTime(audio.currentTime);
                 duration.textContent = formatTime(audio.duration);
                 progressBar.value = (audio.currentTime / audio.duration) * 100;
             });
         
             progressBar.addEventListener('input', () => {
                 audio.currentTime = (progressBar.value / 100) * audio.duration;
             });
         
             volumeRange.addEventListener('input', () => {
                 audio.volume = volumeRange.value / 100;
                 volumeProgress.style.width = `${volumeRange.value}%`;
             });
         
             function formatTime(seconds) {
                 const minutes = Math.floor(seconds / 60);
                 const remainderSeconds = Math.round(seconds % 60);
                 const formattedSeconds = remainderSeconds < 10 ? `0${remainderSeconds}` : remainderSeconds;
                 return `${minutes}:${formattedSeconds}`;
             }
         
         </script>
             <!-- End script reproductor footer -->
         
         
         <!-- JQUERY  -->
         <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>       
         <script src="musicBar.js"></script>

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