<?php
namespace App\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class CustomDirectivesServiceProvider extends ServiceProvider
{
    public function boot()
    {
        Blade::directive('formatCurrency', function ($expression) {
            return "<?php echo \\app\\Helpers\\KorunyHelper::formatCurrency{$expression}; ?>";
        });
    }
}