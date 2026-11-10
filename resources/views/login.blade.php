<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Masuk - Keuangan</title>
    <link rel="icon" href="{{ asset('asset/images/logo.png') }}">
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
<body class="flex min-h-screen items-center justify-center bg-gradient-to-br from-cadet via-cadet to-steel p-4 font-sans">
    <div class="w-full max-w-sm rounded-lg bg-white p-8 shadow-2xl">
        <div class="mb-6 text-center">
            <img src="{{ asset('asset/images/logo.png') }}" alt="Logo KasKu" class="mx-auto mb-3 h-14 w-14 rounded-lg object-cover">
            <h1 class="text-2xl font-extrabold text-cadet">Keuangan</h1>
            <p class="text-sm text-steel">Catatan keuangan</p>
        </div>

        <form method="POST" action="/login" class="space-y-4">
            @csrf
            <div>
                <label class="mb-1 block text-sm font-semibold text-steel">Username</label>
                <input type="text" name="username" required placeholder="Masukkan username"
                       class="w-full rounded-md border border-tan/70 px-4 py-3 text-sm outline-none focus:border-cadet focus:ring-2 focus:ring-steel/30">
            </div>
            <div>
                <label class="mb-1 block text-sm font-semibold text-steel">Password</label>
                <input type="password" name="password" placeholder="••••••••"
                       class="w-full rounded-md border border-tan/70 px-4 py-3 text-sm outline-none focus:border-cadet focus:ring-2 focus:ring-steel/30">
            </div>
            <button type="submit"
                    class="w-full rounded-md bg-cadet py-3 font-bold text-white shadow-lg transition hover:bg-coffee">
                Masuk
            </button>
        </form>
    </div>
</body>
</html>
