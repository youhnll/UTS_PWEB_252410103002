@props(['username'])

@php
    $menu = [
        ['label' => 'Dashboard',   'url' => '/dashboard',   'path' => 'dashboard'],
        ['label' => 'Pengelolaan', 'url' => '/pengelolaan', 'path' => 'pengelolaan'],
        ['label' => 'Profile',     'url' => '/profile',     'path' => 'profile'],
    ];
@endphp

<aside class="hidden w-60 shrink-0 flex-col border-r border-tan/50 bg-white p-4 md:flex">
    <div class="mb-8 flex items-center gap-2 text-lg font-extrabold text-cadet">
        <img src="{{ asset('asset/images/logo.png') }}" alt="Logo KasKu" class="h-9 w-9 rounded-md object-cover">
        Keuangan
    </div>

    <p class="mb-2 px-3 text-xs font-semibold uppercase tracking-wider text-steel">Menu Utama</p>
    <nav class="space-y-1">
        @foreach ($menu as $m)
            <a href="{{ $m['url'] }}?username={{ $username }}"
               class="block rounded-md px-3 py-2.5 text-sm font-medium transition
               {{ request()->is($m['path']) ? 'bg-cadet text-white' : 'text-steel hover:bg-tan/30 hover:text-coffee' }}">
                {{ $m['label'] }}
            </a>
        @endforeach
    </nav>

    <div class="mt-auto flex items-center gap-3 rounded-lg bg-tan/30 p-3">
        <div class="flex h-10 w-10 items-center justify-center rounded-md bg-cadet font-bold text-white">
            {{ strtoupper(substr($username, 0, 1)) }}
        </div>
        <div class="min-w-0 text-sm">
            <p class="truncate font-semibold">{{ $username }}</p>
            <a href="/" class="text-xs text-coffee hover:underline">Keluar</a>
        </div>
    </div>
</aside>
