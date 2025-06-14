<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Laravel</title>
</head>
<body>
<h1>
INI HALAMAN ABOUT
</h1>
<button><a href="{{ route('home') }}">
go back
</a>
</button>
<button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4
rounded">
<a href="{{ route('about') }}">about</a>
</button>
<button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4
rounded">
<a href="{{ route('contact') }}">contact</a>
</button>
<button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4
rounded">
<a href="{{ route('portfolio') }}">portfolio</a>
</button>
</body>
</html