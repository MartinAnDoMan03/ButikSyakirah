<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <style>
@import url('https://fonts.googleapis.com/css2?family=Caveat:wght@600;700&family=Cinzel:wght@400..900&family=Comfortaa:wght@300..700&family=Croissant+One&family=Faculty+Glyphic&family=Lora:ital,wght@0,400..700;1,400..700&family=M+PLUS+Rounded+1c&family=Martian+Mono&family=Merienda:wght@800&family=Merriweather+Sans:ital@1&family=Noto+Sans+Symbols:wght@100..900&family=Playfair+Display:ital,wght@0,400..900;1,400..900&family=Playwrite+IT+Trad+Guides&family=Protest+Revolution&family=Roboto+Slab:wght@100..900&family=Satisfy&family=Sour+Gummy:ital,wght@0,100..900;1,100..900&family=Spicy+Rice&family=Teko:wght@300..700&family=Young+Serif&display=swap');
</style>
        <link rel="stylesheet" href="css/welcome.css">

    </head>
<<<<<<< HEAD
    <body class="font-sans antialiased dark:bg-black dark:text-white/50">
        <div class="bg-gray-50 text-black/50 dark:bg-black dark:text-white/50">
           <img 
        id="background" 
        class="absolute inset-0 w-full h-full object-cover z-[-1]" 
        src="{{ asset('images/back91.jpg') }}" 
        alt="Laravel background" 
    />
            <div class="relative min-h-screen flex flex-col items-center selection:bg-[#FF2D20] selection:text-white">
                <div class="relative w-full max-w-2xl px-6 lg:max-w-7xl">
                    <header class="grid grid-cols-2 items-center gap-2 py-10 lg:grid-cols-3">
                        <div class="flex lg:justify-center lg:col-start-2">
                            <span class="text-black font-bold flex items-center justify-center" style="font-size: 40px; display: flex; align-items: center; justify-content: center;" >Butik Syakirah</span>
                        </div>
                        @if (Route::has('login'))
                            <nav class="-mx-3 flex flex-1 justify-end">
                                @auth
                                    <a
                                        href="{{ url('/dashboard') }}"
                                        class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-black dark:hover:text-black/80 dark:focus-visible:ring-white"
                                        style="text-shadow: 0.5px 0.5px 1px white";
                                    >
                                        Dashboard
                                    </a>
                                @else
                                    <a
                                        href="{{ route('login') }}"
                                        class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-black dark:hover:text-black/80 dark:focus-visible:ring-white"
                                        style="text-shadow: 0.5px 0.5px 1px white";
                                    >
                                        Sign in
                                    </a>
                
                                    @if (Route::has('register'))
                                        <a
                                            href="{{ route('register') }}"
                                            class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-black dark:hover:text-black/80 dark:focus-visible:ring-white"
                                            style="text-shadow: 0.5px 0.5px 1px white";
                                        >
                                            Register
                                        </a>
                                    @endif
                                @endauth
                            </nav>
                        @endif
                    </header>

                    <main class="mt-6">
                        <div class="relative z-10 flex flex-col items-center justify-start h-full px-6 text-center"
                        style="margin-top: 7%;" >
                            <h1 class="text-5xl font-bold mb-4 text-black" style="text-shadow: 0.5px 0.5px 1px white;">Kata-kata hari ini</h1>
                            <p class="text-lg mb-6 max-w-3xl text-black" style="text-shadow: 0.5px 0.5px 1px white;">
                                Kerjakan tugasmu dengan sebaik-baiknya karena pelanggan akan datang kembali jika puas dengan pakaian yang telah kalian kerjakan.
                            </p>
                        </div>
                    </main>
                </div>
            </div>
        </div>
=======
    <body>
    <div class="dashboard">
        <h1>BUTIK SYAKIRAH</h1>
        <button onclick="location.href='{{ route('login') }}'">Login</button>
        <button onclick="location.href='{{ route('register') }}'">Register</button>
    </div>
>>>>>>> d2b9f074c31f0018ad0c55e264c25d58bc9d899f
    </body>
</html>
