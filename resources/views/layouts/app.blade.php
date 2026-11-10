<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - Keuangan</title>
    <link rel="icon" href="{{ asset('asset/images/logo.jpeg') }}">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: { extend: {
                fontFamily: { sans: ['"Plus Jakarta Sans"', 'sans-serif'] },
                colors: {
                    cadet:   '#25344F',
                    steel:   '#617891',
                    tan:     '#D5B893',
                    coffee:  '#6F4D38',
                    mortuum: '#632024'
                }
            } }
        }
    </script>
</head>
<body class="min-h-screen bg-tan/20 font-sans text-cadet">
    <div class="flex min-h-screen">
        <x-sidebar :username="$username" />

        <div class="flex min-w-0 flex-1 flex-col">
            <x-navbar :username="$username" />
            <main class="flex-1 p-4 sm:p-6">
                @yield('content')
            </main>
            <x-footer />
        </div>
    </div>
</body>
</html>
