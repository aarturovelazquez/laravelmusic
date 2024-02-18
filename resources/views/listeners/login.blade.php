<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Log In</title>
    <link rel="icon" type="image/png" href="assets\logoLaravelMusic.png">
    <link rel="stylesheet" href="{{asset('css/login.css') }}">    
<body>
    <div class="container">

            <div class="login-box">
            <h1>Laravel Music</h1>
                    <h3>Log In</h3>
                    <form action="{{url('authenticate')}}" method="get">
                        @csrf
                            <div class="input-box">
                                <input type="email" name="email"  required>
                                <label>Email</label>
                            </div>
                            <div class="input-box">
                                <input type="password" name="password"  maxlength="12" required>
                                <label>Password</label>
                            </div>
                            <div >
                                <input type="submit" class="btn" value="Login">
                            </div><br><br>
                        <div class="account">        
                        <h4>Don't have an account yet?</h4>
                        <a href="{{route('signup')}}">Signup</a>
                        </div>
                    </form> 
                </div>
                <span style="--i:0;"></span>
                <span style="--i:1;"></span>
                <span style="--i:2;"></span>
                <span style="--i:3;"></span>
                <span style="--i:4;"></span>
                <span style="--i:5;"></span>
                <span style="--i:6;"></span>
                <span style="--i:7;"></span>
                <span style="--i:8;"></span>
                <span style="--i:9;"></span>
                <span style="--i:10;"></span>
                <span style="--i:11;"></span>
                <span style="--i:12;"></span>
                <span style="--i:13;"></span>
                <span style="--i:14;"></span>
                <span style="--i:15;"></span>
                <span style="--i:16;"></span>
                <span style="--i:17;"></span>
                <span style="--i:18;"></span>
                <span style="--i:19;"></span>
                <span style="--i:20;"></span>
                <span style="--i:21;"></span>
                <span style="--i:22;"></span>
                <span style="--i:23;"></span>
                <span style="--i:24;"></span>
                <span style="--i:25;"></span>
                <span style="--i:26;"></span>
                <span style="--i:27;"></span>
                <span style="--i:28;"></span>
                <span style="--i:29;"></span>
                <span style="--i:30;"></span>
                <span style="--i:31;"></span>
                <span style="--i:32;"></span>
                <span style="--i:33;"></span>
                <span style="--i:34;"></span>
                <span style="--i:35;"></span>
                <span style="--i:36;"></span>
                <span style="--i:37;"></span>
                <span style="--i:38;"></span>
                <span style="--i:39;"></span>
                <span style="--i:40;"></span>
                <span style="--i:41;"></span>
                <span style="--i:42;"></span>
                <span style="--i:43;"></span>
                <span style="--i:44;"></span>
                <span style="--i:45;"></span>
                <span style="--i:46;"></span>
                <span style="--i:47;"></span>
                <span style="--i:48;"></span>
                <span style="--i:49;"></span>
               
        </div>          
        @if(session('error'))
        <div class="alert">
            <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
            <strong>Error:</strong> {{ session('error') }}
        </div>
    
        <style>
            /* Alert box styles */
            .alert {
                position: absolute;
                top: 10px;
                right: 10px;
                z-index: 9999;
                padding: 20px;
                background-color: #f44336;
                color: white;
                transition: opacity 0.5s ease;
            }
    
            /* Close button */
            .closebtn {
                margin-left: 15px;
                color: white;
                font-weight: bold;
                float: right;
                font-size: 22px;
                line-height: 20px;
                cursor: pointer;
                transition: 0.3s;
            }
    
            /* Close button on hover */
            .closebtn:hover {
                color: black;
            }
    
            /* Padding for body element */
            body {
                padding-top: 60px; /* Add padding to the top to prevent alert from overlapping the content */
            }
        </style>
    
        <script>
            // Show the alert and fade out after 5 seconds
            $('.alert').fadeIn().delay(5000).fadeOut(function() {
                // Remove the padding from the body element
                $('body').css('padding-top', '');
            });
        </script>
    @endif
          
</body>
</html>



