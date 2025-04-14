<?php

namespace App\Providers;

use Illuminate\Support\Facades\File;
use Illuminate\Support\ServiceProvider;
// Tambahkan import yang dibutuhkan
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Hash;
use App\Models\Admin;

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
        // Setup SQLite untuk Vercel
        if (env('APP_ENV') === 'production') {
            $dbPath = '/tmp/database.sqlite';

            // Buat database SQLite jika belum ada
            if (!file_exists($dbPath)) {
                File::put($dbPath, '');

                // Jalankan migrasi setelah membuat database
                try {
                    Artisan::call('migrate', ['--force' => true]);

                    // Buat admin default
                    if (!Admin::where('email', 'admin@lapormaswapres.id')->exists()) {
                        Admin::create([
                            'name' => 'Administrator',
                            'email' => 'admin@lapormaswapres.id',
                            'password' => Hash::make('Password123'),
                            'created_at' => now(),
                            'updated_at' => now()
                        ]);
                    }
                } catch (\Exception $e) {
                    // Log error
                    logger()->error('Migration error: ' . $e->getMessage());
                }
            }
        }
    }
}
