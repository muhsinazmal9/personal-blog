<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home Page</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <div class="hero min-h-screen bg-base-200">
        <div class="hero-content text-center">
            <div class="max-w-md">
                <h1 class="text-5xl font-bold">HOME PAGE</h1>
                <p class="py-6">
                    Backend Developer! no frontend haha <br>
                    <span class="font-bold">Credential: admin@gmail.com || password</span>
                </p>
                <a href="{{ route('about') }}" class="btn btn-outline">Static About Page</a>
                @guest
                    <a href="{{ route('login') }}" class="btn btn-primary">Login</a>
                    @else
                    <a href="{{ route('dashboard') }}" class="btn btn-primary">Dashboard</a>
                @endguest
            </div>
        </div>
    </div>
</body>

</html>
