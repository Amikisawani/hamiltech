<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Enregistre les commandes artisan personnalisées.
     */
    protected $commands = [
        \App\Console\Commands\GenerateSitemap::class,
    ];

    /**
     * Définir les tâches planifiées.
     */
    protected function schedule(Schedule $schedule): void
    {
        // Par exemple : génération quotidienne du sitemap
        // $schedule->command('sitemap:generate')->daily();
    }

    /**
     * Charger automatiquement les commandes personnalisées.
     */
    protected function commands(): void
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
