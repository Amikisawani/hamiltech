<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\Tags\Url;

class GenerateSitemap extends Command
{
    protected $signature = 'sitemap:generate';
    protected $description = 'Génère le fichier sitemap.xml dans le dossier public';

    public function handle()
    {
        Sitemap::create()
            ->add(Url::create('/'))

            // Ajoute d'autres pages si besoin...
            ->writeToFile(public_path('sitemap.xml'));

        $this->info('✅ Le sitemap a été généré avec succès.');
    }
}
