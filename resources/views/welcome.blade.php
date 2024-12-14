<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Butik Syakirah</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <style>
@import url('https://fonts.googleapis.com/css2?family=Caveat:wght@600;700&family=Cinzel:wght@400..900&family=Comfortaa:wght@300..700&family=Croissant+One&family=Faculty+Glyphic&family=Lora:ital,wght@0,400..700;1,400..700&family=M+PLUS+Rounded+1c&family=Martian+Mono&family=Merienda:wght@800&family=Merriweather+Sans:ital@1&family=Noto+Sans+Symbols:wght@100..900&family=Playfair+Display:ital,wght@0,400..900;1,400..900&family=Playwrite+IT+Trad+Guides&family=Protest+Revolution&family=Roboto+Slab:wght@100..900&family=Satisfy&family=Sour+Gummy:ital,wght@0,100..900;1,100..900&family=Spicy+Rice&family=Teko:wght@300..700&family=Young+Serif&display=swap');
</style>
        <link rel="stylesheet" href="css/welcome.css">

    </head>
    <body>
    <div class="dashboard">
        <h1>BUTIK SYAKIRAH</h1>
        <button onclick="location.href='{{ route('login') }}'">Login</button>
        <button onclick="location.href='{{ route('register') }}'">Register</button>
    </div>
    </body>
</html>
