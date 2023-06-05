<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Welcome</title>
</head>
<body class="bg-slate-500">
@include('partial/navbar-home')
<div class="flex justify-center">
    <img  src="home_image/rose.png" class=" mt-10 w-[350px] h-[400px]" alt="ok">
</div>
 <h1 class="text-center mt-2 text-5xl text-yellow-400">{{Auth::guard('register')->user()->name}} Welcome to admin home page</h1>
</body>
</html>