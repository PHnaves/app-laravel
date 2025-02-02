<?php

namespace App\Providers;

use App\Models\Category;
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
        // Verifica se a tabela 'categories' existe antes de tentar acessá-la
            $categoryMenu = Category::all();
            view()->share('categoryMenu', $categoryMenu);
        
    }
}
