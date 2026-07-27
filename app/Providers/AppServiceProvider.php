<?php

namespace App\Providers;

use App\Models\Notifikasi;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Sediakan data lonceng notifikasi (jumlah belum dibaca & 5 terbaru)
        // ke halaman-halaman pembeli yang punya navbar dengan ikon lonceng.
        View::composer(['katalog_pembeli', 'keranjang'], function ($view) {
            if (Auth::check() && Auth::user()->role !== 'admin') {
                $notifJumlahBelumDibaca = Notifikasi::where('user_id', Auth::id())
                    ->where('dibaca', false)
                    ->count();

                $notifTerbaru = Notifikasi::where('user_id', Auth::id())
                    ->orderByDesc('created_at')
                    ->take(5)
                    ->get();
            } else {
                $notifJumlahBelumDibaca = 0;
                $notifTerbaru = collect();
            }

            $view->with('notifJumlahBelumDibaca', $notifJumlahBelumDibaca)
                 ->with('notifTerbaru', $notifTerbaru);
        });
    }
}
