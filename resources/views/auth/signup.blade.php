
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.84.0">
    <title>Sign up | QR APP</title>

    <!-- Bootstrap core CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
    </style>


    <!-- Custom styles for this template -->
    <link href="{{asset('login.css')}}" rel="stylesheet">
</head>
<body class="text-center">

<main class="form-signin">

    <form action="{{route('signup.submit')}}" method="post">
        @csrf
        <img class="mb-4" src="{{asset('bd_logo.png')}}" height="100px">
        <h1 class="h3 mb-3 fw-normal">Signup</h1>

        @if(\Illuminate\Support\Facades\Session::has('error'))
            <div class="alert alert-danger alert-dismissible pb-2" role="alert">
                {{\Illuminate\Support\Facades\Session::get('error')}}
            </div>
        @endif
        @if(\Illuminate\Support\Facades\Session::has('success'))
            <div class="alert alert-success alert-dismissible pb-2" role="alert">
                {{\Illuminate\Support\Facades\Session::get('success')}}
            </div>
        @endif

        <div class="form-floating">
            <input type="text" class="form-control" id="name" name="name" placeholder="">
            <label for="name">name</label>
            @error('name')
            <span class="text-danger">{{$message}}</span>
            @enderror
        </div>

        <div class="form-floating mt-2">
            <input type="email" class="form-control" id="floatingInput" name="email" placeholder="name@example.com">
            <label for="floatingInput">Email address</label>
            @error('email')
            <span class="text-danger">{{$message}}</span>
            @enderror
        </div>

        <div class="form-floating mt-2">
            <input type="text" class="form-control" id="phone" name="phone" placeholder="">
            <label for="phone">Phone</label>
            @error('phone')
            <span class="text-danger">{{$message}}</span>
            @enderror
        </div>

        <div class="form-floating mt-2">
            <input type="password" class="form-control" id="floatingPassword" name="password" placeholder="Password">
            <label for="floatingPassword">Password</label>
            @error('password')
            <span class="text-danger">{{$message}}</span>
            @enderror
        </div>

        <div class="form-floating mt-2">
            <input type="password" class="form-control" id="floatingPassword" name="confirm_password" placeholder="Confirm Password">
            <label for="floatingPassword">Confirm Password</label>
            @error('confirm_password')
            <span class="text-danger">{{$message}}</span>
            @enderror
        </div>
        <button class="w-100 btn btn-lg btn-primary" type="submit">Sign in</button>

        <div class="checkbox mb-3">
            <label>
                If you already signup so you can <a href="{{route('login')}}">Sign in here</a>
            </label>
        </div>
    </form>
</main>



</body>
</html>
