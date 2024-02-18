<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add Song</title>
    <link rel="icon" type="image/png" href="{{ asset('assets/logoLaravelMusic.png') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">    
    <link rel="stylesheet" href="{{ asset('css/addSong.css') }}">
    <link rel="stylesheet" href="{{ asset('css/button.css') }}">
</head>
<body>



<header>

    <div class="user">
        <img src="assets\logoLaravelMusic.png" alt="">
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

       
    <div class="container">
        <div class="row">
        <h1>Add Song</h1>
        </div>
        <div class="row">
                <h4 style="text-align:center">Share the next hit in the industry!</h4>
        </div>
        <form action="{{route('subirAudio')}}" method="post" enctype="multipart/form-data">
                {{csrf_field()}}
            <div class="row input-container">
                    
                    <div class="col-md-6 col-sm-12">
                        <div class="styled-input">
                        <input type="text" name="nombre" required ><br>
                        <label for="">Name:</label>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <div class="styled-input" style="float:right;">
                        <input type="text" name="artista" required ><br>
                        <label for="">Artist:</label>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <div class="styled-input">
                        <input type="text" name="album" required ><br>
                        <label for="">Album:</label>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <div class="styled-input" style="float:right;">
                        <input type="double" name="duracion" required ><br>
                        <label for="">Length:</label>
                        </div>
                    </div>
                    
                    
                    <div class="col-xs-12">
				
                <div class="styled-input wide">
                    <input type="file" name="archivo" required  >
					
				</div>
                
			</div>
                    
                    <div class="col-md-6 col-sm-12">
                        <div class="styled-input" style="float:right;">
                        <input type="submit" class="spotify-button" value="Upload">
                        </div>
            </div>

       </form>
</div>
</body>
</html>

  
  