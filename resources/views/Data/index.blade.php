<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>My Name is  {{ $name }} and my age is {{ $age }}</h1>
    <h1>The Countries is : </h1>
    @foreach ($Countries as $item)
    <ul>
        <li>{{ $item }}</li>
    </ul>
    @endforeach
</body>
</html>