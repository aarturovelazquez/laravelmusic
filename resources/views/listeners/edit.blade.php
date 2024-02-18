<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="image/png" href="{{ asset('assets/logoLaravelMusic.png') }}">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/editProfile.css') }}"> 
    <link rel="stylesheet" href="{{ asset('css/button.css') }}">
    <link rel="stylesheet" href="{{ asset('css/form.css') }}">

   
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"> 
</head>
<body>



<header>

    <div class="user">
        <img src="{{ asset('assets/logoLaravelMusic.png') }}" alt="Laravel Music">
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
			    <h1>Edit your profile</h1>
	    </div>
	<div class="row">
			<h4 style="text-align:center">You already look good!</h4>
	</div>
    <div class="spotify-container">
        <form action="{{route('profile.update', $profile->id)}}" method="post" class="spotify-form" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-row">
                <div class="form-group">
                  <label for="first-name" class="custom-label">First Name</label>
                  <input type="text" name="firstname" class="form-input" placeholder="Enter your first name" value="{{$profile->firstname}}" required>
                </div>
                <div class="form-group">
                  <label for="last-name" class="custom-label">Last Name</label>
                  <input type="text"  name="lastname" class="form-input"   value="{{$profile->lastname}}" placeholder="Enter your last name" required>
                </div>
              </div>
              <label for="email" class="custom-label">Email Address</label>
              <input type="email" name="email" class="form-input" value="{{$profile->email}}" placeholder="Enter your email" required>
              <label for="password" class="custom-label">Password</label>
              <input type="password" name="password" class="form-input" value="{{$profile->password}}" placeholder="Enter your password" required>
              <label for="phone" class="custom-label">Phone Number</label>
              <input type="tel" name="phonenumber"  class="form-input"  value="{{$profile->phonenumber}}" placeholder="Enter your phone number" required>
              <label for="profile-pic" class="custom-label">Profile Picture</label>
              <input type="file" name="profile_picture" class="form-input">
              <button type="submit" class="form-submit">Update</button>
        </form>
    </div>
    {{-- <div class="spotify-container" style="float: right;">
        <h4 style="text-align:center">You can also delete your profile :</h4>
    
        <form action="{{route('profile.destroy',$profile->id)}}" method="POST">
            @csrf
            @method('DELETE')
            <div class="col-md-6 col-sm-12">
                <div class="styled-input" style="float:right;">
                    <input type="submit" class="btnDelete" value="Delete User">
                </div>
            </div>
        </form>
    </div>
       --}}
	{{-- <div class="row input-container">
			<div class="col-xs-12">
				<div class="styled-input wide">
					
                    <input type="text"   id="fname" ><br>
					<label>First Name</label> 
				</div>
                <div class="styled-input wide">
                    <input type="text"  id="lname">
					<label>Last Name</label> 
				</div>
                
			</div>
			<div class="col-md-6 col-sm-12">
				<div class="styled-input">
                <input type="email"   id="email" >
					<label>Email</label> 
				</div>
			</div>
            <div class="col-md-6 col-sm-12">
                <div class="styled-input" style="float:right;">
                    <input type="tel"  maxlength="10" id="phonenumber" >
					<label>Phone Number</label> 
                </div>
            </div>
            <div class="col-xs-12"">
				<div class="styled-input wide">
                <input type="password" name="password" value="{{$profile->password}}"  maxlength="12"  id="password" >
					<label>Password</label> 
				</div>
			</div>
            <div class="col-xs-12"">
                <div class="styled-input wide">
                    <input type="file"  class="form-control form-control-lg">      
                </div>
            </div>
            <div class="col-md-6 col-sm-12">
				<div class="styled-input" style="float:right;">
                
                    <input type="submit" class="spotify-button" value="Save Changes">
				</div>
			</div>      
	</div> --}}
</form>
</div>
 {{-- <a href="{{route('profile.destroy',$profile->id)}}">Delete</a> --}}
</body>
</html>

    <!-- JQUERY  -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

</section>
</body>
</html>