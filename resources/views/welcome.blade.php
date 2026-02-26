<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ asset('storage/css/auth.css') }}">
</head>

<body
    class="bg-[#FDFDFC] dark:bg-[#0a0a0a] text-[#1b1b18] flex p-6 lg:p-8 items-center lg:justify-center min-h-screen flex-col">
    <header class="w-full lg:max-w-4xl max-w-[335px] text-sm mb-6 not-has-[nav]:hidden header">
        @if (Route::has('login'))
            <nav class="flex items-center justify-end gap-4">
                <div class="logo">
                    <img src="{{ asset("storage/images/Blue Black Modern Home Stay Logo Design.png") }}" width="90px"
                        height="auto" alt="">
                </div>
                <div class="btnLogSin">
                    @auth
                        <a href="{{ url('/dashboard') }}"
                            class="inline-block px-5 py-1.5 dark:text-[#EDEDEC] border-[#19140035] hover:border-[#1915014a] border text-[#1b1b18] dark:border-[#3E3E3A] dark:hover:border-[#62605b] rounded-sm text-sm leading-normal">
                            Dashboard
                        </a>
                    @else
                        <a href="{{ route('login') }}"
                            class="inline-block px-5 py-1.5 dark:text-[#EDEDEC] text-[#1b1b18] border border-transparent hover:border-[#19140035] dark:hover:border-[#3E3E3A] rounded-sm text-sm leading-normal">
                            Log in
                        </a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="register">
                                Register
                            </a>
                        @endif
                    @endauth
                </div>
            </nav>
        @endif
    </header>
    <main>
        <div class="image">
            <img src="{{ asset('storage/images/Blue Black Modern Home Stay Logo Design.png') }}" width="100%"
                height="auto" alt="">
        </div>
        <div class="welcome">
            <h1>
                welcome to EasyColoc
            </h1>
            <p>Plateforme Web de Gestion de Colocation</p>
        </div>
    </main>
    @if (Route::has('login'))
        <div class="h-14.5 hidden lg:block"></div>
    @endif
</body>

</html>