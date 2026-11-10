@props(['username'])

<header class="sticky top-0 z-10 border-b border-tan/50 bg-white/80 backdrop-blur">
    <div class="flex items-center justify-between gap-3 px-4 py-3 sm:px-6">
        <h1 class="truncate text-base font-bold sm:text-lg">Hai, {{ $username }}</h1>
    </div>

    <div class="flex gap-1 overflow-x-auto px-4 pb-2 text-sm font-medium text-steel md:hidden">
        <a class="rounded-lg px-3 py-1.5 hover:bg-tan/30" href="/dashboard?username={{ $username }}">Dashboard</a>
        <a class="rounded-lg px-3 py-1.5 hover:bg-tan/30" href="/pengelolaan?username={{ $username }}">Pengelolaan</a>
        <a class="rounded-lg px-3 py-1.5 hover:bg-tan/30" href="/profile?username={{ $username }}">Profile</a>
    </div>
</header>
