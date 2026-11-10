@extends('layouts.app')
@section('title', 'Dashboard')

@section('content')
    @if ($saldo < 100000)
        <div class="mb-5 rounded-md bg-mortuum/10 p-4 text-sm text-mortuum ring-1 ring-mortuum/20">
            Saldo kamu menipis, hati-hati belanjanya ya.
        </div>
    @endif

    <div class="grid grid-cols-1 gap-5 sm:grid-cols-3">
        @include('partials.kartu', ['judul' => 'Total Pemasukan',   'nilai' => $totalMasuk,  'aksen' => 'border-cadet'])
        @include('partials.kartu', ['judul' => 'Total Pengeluaran', 'nilai' => $totalKeluar, 'aksen' => 'border-mortuum'])
        @include('partials.kartu', ['judul' => 'Saldo',             'nilai' => $saldo,       'aksen' => 'border-coffee'])
    </div>

    <div class="mt-5 grid grid-cols-1 gap-5 lg:grid-cols-3">
        <div class="rounded-lg bg-white p-5 shadow-sm ring-1 ring-tan/40 lg:col-span-2">
            <h2 class="mb-3 font-bold">Transaksi Terbaru</h2>
            <div class="overflow-x-auto">
                <table class="w-full min-w-[420px] text-left text-sm">
                    <tbody class="divide-y divide-tan/30">
                        @foreach ($terbaru as $item)
                            <tr>
                                <td class="py-3 font-medium">{{ $item['keterangan'] }}
                                    <span class="block text-xs font-normal text-steel">{{ $item['kategori'] }}</span>
                                </td>
                                <td class="py-3 text-steel">{{ $item['tanggal'] }}</td>
                                @if ($item['jenis'] == 'pemasukan')
                                    <td class="py-3 text-right font-bold text-cadet">+ Rp {{ number_format($item['nominal'], 0, ',', '.') }}</td>
                                @else
                                    <td class="py-3 text-right font-bold text-mortuum">- Rp {{ number_format($item['nominal'], 0, ',', '.') }}</td>
                                @endif
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <div class="rounded-lg bg-white p-5 shadow-sm ring-1 ring-tan/40">
            <h2 class="mb-3 font-bold">Rencana Tabungan</h2>
            <div class="space-y-4">
                @foreach ($rencana as $r)
                    <div>
                        <div class="mb-1 flex justify-between text-sm">
                            <span class="font-medium">{{ $r['nama'] }}</span>
                            <span class="text-steel">{{ $r['persen'] }}%</span>
                        </div>
                        <div class="h-2 overflow-hidden rounded-md bg-tan/30">
                            <div class="h-full rounded-md bg-coffee" style="width: {{ $r['persen'] }}%"></div>
                        </div>
                        <p class="mt-1 text-xs text-steel">
                            Rp {{ number_format($r['terkumpul'], 0, ',', '.') }} / Rp {{ number_format($r['target'], 0, ',', '.') }}
                        </p>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
