<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link
            rel="icon"
            type="image/png"
            sizes="32x32"
            href="https://icon-library.com/images/movie-icon-windows/movie-icon-windows-17.jpg"
        />
        @vite('resources/css/app.css')
        <title>Movies</title>
    </head>
    <body {{$attributes->
        merge(['class'])}}>
        {{ $slot }}
    </body>
</html>
