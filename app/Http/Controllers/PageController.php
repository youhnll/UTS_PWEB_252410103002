<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    private function dataTransaksi()
    {
        return [
            ['tanggal' => '2026-11-01', 'keterangan' => 'Uang bulanan',   'kategori' => 'Saku',      'jenis' => 'pemasukan',   'nominal' => 1500000],
            ['tanggal' => '2026-11-01', 'keterangan' => 'Makan siang',    'kategori' => 'Makanan',   'jenis' => 'pengeluaran', 'nominal' => 30000],
            ['tanggal' => '2026-11-02', 'keterangan' => 'Makan siang',    'kategori' => 'Makanan',   'jenis' => 'pengeluaran', 'nominal' => 15000],
            ['tanggal' => '2026-11-03', 'keterangan' => 'Makan siang',    'kategori' => 'Makanan',   'jenis' => 'pengeluaran', 'nominal' => 20000],
            ['tanggal' => '2026-11-03', 'keterangan' => 'Bensin motor',   'kategori' => 'Transport', 'jenis' => 'pengeluaran', 'nominal' => 58000],
            ['tanggal' => '2026-11-04', 'keterangan' => 'Di tf kakak',    'kategori' => 'Lainnya',   'jenis' => 'pemasukan',   'nominal' => 200000],
            ['tanggal' => '2026-11-04', 'keterangan' => 'Makan siang',    'kategori' => 'Makanan',   'jenis' => 'pengeluaran', 'nominal' => 28000],
            ['tanggal' => '2026-11-05', 'keterangan' => 'Kuota',          'kategori' => 'Pulsa',     'jenis' => 'pengeluaran', 'nominal' => 100000],
            ['tanggal' => '2026-11-06', 'keterangan' => 'Print',          'kategori' => 'Kuliah',    'jenis' => 'pengeluaran', 'nominal' => 15000],
        ];
    }

    public function login()
    {
        return view('login');
    }

    public function prosesLogin(Request $request)
    {
        return redirect('/dashboard?username=' . $request->input('username'));
    }

    public function dashboard(Request $request)
    {
        $username    = $request->query('username');
        $transaksi   = collect($this->dataTransaksi());
        $totalMasuk  = $transaksi->where('jenis', 'pemasukan')->sum('nominal');
        $totalKeluar = $transaksi->where('jenis', 'pengeluaran')->sum('nominal');
        $saldo       = $totalMasuk - $totalKeluar;
        $terbaru     = $transaksi->sortByDesc('tanggal')->take(5);

        $rencana = array_map(function ($r) {
            $r['persen'] = round($r['terkumpul'] / $r['target'] * 100);
            return $r;
        }, [
            ['nama' => 'Dana Darurat', 'terkumpul' => 700000,  'target' => 2000000],
            ['nama' => 'Laptop Baru',  'terkumpul' => 1500000, 'target' => 6000000],
            ['nama' => 'Liburan',      'terkumpul' => 300000,  'target' => 1000000],
        ]);

        return view('dashboard', compact(
            'username', 'totalMasuk', 'totalKeluar', 'saldo', 'terbaru', 'rencana'
        ));
    }

    public function pengelolaan(Request $request)
    {
        $username  = $request->query('username');
        $transaksi = $this->dataTransaksi();

        return view('pengelolaan', compact('username', 'transaksi'));
    }

    public function profile(Request $request)
    {
        $username = $request->query('username');
        $profil = [
            'target'    => 300000,
            'mata_uang' => 'Rupiah (IDR)',
            'kategori'  => ['Makanan', 'Transport', 'Pulsa', 'Kuliah'],
        ];

        return view('profile', compact('username', 'profil'));
    }
}
