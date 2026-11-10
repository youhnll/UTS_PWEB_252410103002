@extends('layouts.app')
@section('title', 'Pengelolaan')

@section('content')
    <div class="mb-6">
        <h1 class="text-2xl font-extrabold">Daftar Transaksi</h1>
        <p class="text-sm text-steel">Semua catatan pemasukan dan pengeluaranmu.</p>
    </div>

    <div class="overflow-hidden rounded-lg bg-white shadow-sm ring-1 ring-tan/40">
        <div class="overflow-x-auto">
            <table class="w-full min-w-[640px] text-left text-sm">
                <thead class="bg-cadet text-xs uppercase tracking-wide text-tan">
                    <tr>
                        <th class="px-5 py-3">Tanggal</th>
                        <th class="px-5 py-3">Keterangan</th>
                        <th class="px-5 py-3">Kategori</th>
                        <th class="px-5 py-3">Jenis</th>
                        <th class="px-5 py-3 text-right">Nominal</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-tan/30">
                    @foreach ($transaksi as $item)
                        <tr class="transition hover:bg-tan/10">
                            <td class="px-5 py-4 text-steel">{{ $item['tanggal'] }}</td>
                            <td class="px-5 py-4 font-medium">{{ $item['keterangan'] }}</td>
                            <td class="px-5 py-4">
                                <span class="rounded-md bg-tan/40 px-2.5 py-1 text-xs text-coffee">{{ $item['kategori'] }}</span>
                            </td>
                            <td class="px-5 py-4">
                                @if ($item['jenis'] == 'pemasukan')
                                    <span class="rounded-md bg-cadet/10 px-2.5 py-1 text-xs font-semibold text-cadet">Pemasukan</span>
                                @else
                                    <span class="rounded-md bg-mortuum/10 px-2.5 py-1 text-xs font-semibold text-mortuum">Pengeluaran</span>
                                @endif
                            </td>
                            @if ($item['jenis'] == 'pemasukan')
                                <td class="px-5 py-4 text-right font-bold text-cadet">+ Rp {{ number_format($item['nominal'], 0, ',', '.') }}</td>
                            @else
                                <td class="px-5 py-4 text-right font-bold text-mortuum">- Rp {{ number_format($item['nominal'], 0, ',', '.') }}</td>
                            @endif
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
