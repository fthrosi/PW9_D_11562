<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <style>
        body{
            background-size: cover;
            background-position: center;
            background: url('https://wallpapers.com/images/high/zigzag-river-aesthetic-landscape-zrf9jzxpxx736bd0.webp');
        }
        .center-container{
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }
        .login-box{
            background: rgba(255, 255, 255, 0.8);
            border: 1px solid #ccc;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        }
    </style>
</head>
<body>
<div class="container center-container">
        <div class="col-md-4 login-box">
            <h2 class="text-center"><b>Register</b></h2>
            <hr>

            @if(Session('message'))
                <div class="alert alert-success">
                   {{ Session('message') }}
                </div>
            @endif

            <form action="{{route('actionRegister')}}" method="post">
                @csrf
                <div class="form-group">
                    <label class="fa fa-envelope">Email</label>
                    <input type="email" name="email" class="form-control" placeholder="Email" required>
                </div>
                <div class="form-group">
                    <label class="fa fa-user">Username</label>
                    <input type="text" name="username" class="form-control" placeholder="username" required>
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="password" class="form-control" placeholder="Password" required>
                </div>
                <button type="submit" class="btn btn-primary btn-block"><i class="fa fa-user"></i>Register</button>
                <hr>
                <p class="text-center">Sudah punya akun? <a href="{{route('login')}}">Login disini</a></p>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.css"></script>
</body>
</html>