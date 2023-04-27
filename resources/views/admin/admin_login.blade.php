<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/adminLoginStyle.css">
    <title>Admin Login</title>
</head>
<body>
    <nav>
        <img src="/resource/logo_version1.png" alt="logo" class="logo">
    </nav>
    <div class="container">
        <div class="content-container">
            <div class="image-container">
                <img class="img" src="/resource/cinema.png" alt="">
                <h2>Sign in to your account</h2>
            </div>
            <form action="{{route('login-user')}}" method="POST">
            @if(Session::has('success'))
                <div class="alert alert-success">{{Session::get('success')}}</div>
                @endif
                @if(Session::has('fail'))
                <div class="alert alert-danger">{{Session::get('fail')}}</div>
                @endif
                @csrf
                 <h1>LOGIN</h1>
                 <div class="input-box">
                    
                    <input class="txtbox" type="text" id="username" name="username" placeholder="Username" 
                    value="" required>
                 </div>
                 <div class="input-box">
                    
                    <input class="txtbox" type="password" id="password" name="password" placeholder="Password" required>
                 </div>
                 <div class="input-box">
                    <button type="submit" class="btn">LOGIN</button>
                 </div>
                 <div class="input-box">
                    <p class= "sign-up" for="">Don't have an account?</p>
                    <p><a href="signup">Create account</a></p>
                 </div>
            </form>
        </div>
    </div>
</body>
</html>