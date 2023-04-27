<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/adminSignUpStyle.css">
    <title>Sign Up</title>
</head>

<body>
    <div class="container">
        <div class="content-container">
            <form action="{{route('signupUser')}}" method=POST>
                @if(Session::has('success'))
                <div class="alert alert-success">{{Session::get('success')}}</div>
                @endif
                @if(Session::has('fail'))
                <div class="alert alert-danger">{{Session::get('fail')}}</div>
                @endif
                @csrf 
                <h1>SIGN UP</h1>
                <div class="input-box">
                    <input class="txtbox" type="text" id="name" name="name" placeholder="Name" >
                    <span class="text-danger"color="red">@error('name') {{$message}} @enderror</span>
                </div>
                <div class="input-box">
                    <input class="txtbox" type="text" id="username" name="username" placeholder="Username" >
                    <span class="text-danger"color="red">@error('username') {{$message}} @enderror</span>

                </div>
                <div class="input-box">
                    <input class="txtbox" type="password" id="password" name="password" placeholder="Password" >
                    <span class="text-danger" color="red">@error('password') {{$message}} @enderror</span>
                </div>
                <!-- ang error kay black ang color, need himuon ug red aron maklaro pag display -->
              <!---  <div class="input-box">
                    <input class="txtbox" type="password" id="confirm-password" name="confirm-password" placeholder="Confirm Password">
                </div> -->
                <div class="input-box">
                    <button type="submit" class="btn">Sign Up</button>
                </div>

            </form>
        </div>
    </div>
</body>

</html>