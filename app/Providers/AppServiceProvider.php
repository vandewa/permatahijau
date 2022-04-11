<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $warga = DB::table('warga')
            ->count();
        View::share('warga', $warga);

        $penerima = DB::table('penerima')
            ->count();
        View::share('penerima', $penerima);

        $beras = 0;
        $datanya = DB::table('warga')
            ->leftJoin('zakat', 'warga.id', '=', 'zakat.warga_id')
            ->where('jenis_zakat', '1')
            ->orderBy('rt', 'asc')
            ->orderBy('kepala_kk', 'asc')
            ->get();

        foreach ($datanya as $aa) {
            $beras = $beras + $aa->jumlah_beras;
        }
        View::share('beras', $beras . ' Kg');


        $uang = 0;
        $datanya = DB::table('warga')
            ->leftJoin('zakat', 'warga.id', '=', 'zakat.warga_id')
            ->where('jenis_zakat', '2')
            ->orderBy('rt', 'asc')
            ->orderBy('kepala_kk', 'asc')
            ->get();

        foreach ($datanya as $aa) {
            $uang = $uang + $aa->jumlah_uang;
        }
        View::share('uang', 'Rp. ' . number_format($uang));
    }
}
