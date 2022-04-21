<?php declare(strict_types=1);

namespace App\Providers;

use TightenCo\Jigsaw\Jigsaw;

class HelpersServiceProvider
{
    public function handle(Jigsaw $jigsaw): void
    {
        foreach (glob('./app/Helpers/*.php') as $file) {
            require_once($file);
        }
    }
}
