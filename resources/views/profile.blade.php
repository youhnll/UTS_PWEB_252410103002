@extends('layouts.app')
@section('title', 'Profile')

@section('content')
    <div class="mx-auto max-w-md overflow-hidden rounded-lg bg-white shadow-sm ring-1 ring-tan/40">
        <div class="h-24 bg-gradient-to-r from-cadet to-steel"></div>
        <div class="px-6 pb-6">
            <div class="-mt-10 mb-3 flex h-20 w-20 items-center justify-center rounded-md border-4 border-white bg-tan text-3xl font-extrabold text-coffee shadow">
                {{ strtoupper(substr($username, 0, 1)) }}
            </div>
            <h1 class="text-xl font-extrabold">{{ $username }}</h1>
            <p class="text-sm text-steel">Mata uang: {{ $profil['mata_uang'] }}</p>

            <div class="mt-5 rounded-md bg-tan/30 p-4">
                <p class="text-xs text-coffee">Target tabungan bulan ini</p>
                <p class="text-xl font-extrabold text-coffee">Rp {{ number_format($profil['target'], 0, ',', '.') }}</p>
            </div>

            <p class="mt-5 text-sm font-semibold text-steel">Kategori favorit</p>
            <div class="mt-2 flex flex-wrap gap-2">
                @foreach ($profil['kategori'] as $k)
                    <span class="rounded-md bg-cadet/10 px-3 py-1 text-xs font-medium text-cadet">{{ $k }}</span>
                @endforeach
            </div>
        </div>
    </div>
@endsection
