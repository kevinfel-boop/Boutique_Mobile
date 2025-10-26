<?php

namespace App\Filament\Resources\Categories\Widgets;

use App\Models\User;
use App\Models\Product;
use App\Models\Category;
use App\Models\Order;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Filament\Support\Enums\IconPosition;
use Illuminate\Support\Facades\Schema;

class Stats0verview extends BaseWidget
{
    protected int | string | array $columnSpan = 'full';

    protected function getStats(): array
    {
        return [
            $this->createUserStats(),
            $this->createProductStats(),
            $this->createSalesStats(),
            $this->createCategoryStats(),
        ];
    }

    private function createUserStats(): Stat
    {
        $totalUsers = User::count();
        $newUsersThisMonth = User::whereMonth('created_at', now()->month)->count();
        $newUsersLastMonth = User::whereMonth('created_at', now()->subMonth()->month)->count();

        $trend = $this->calculateTrend($newUsersThisMonth, $newUsersLastMonth);

        return Stat::make('Utilisateurs', $totalUsers)
            ->description($newUsersThisMonth . ' nouveaux ce mois')
            ->descriptionIcon($trend['icon'], IconPosition::Before)
            ->color($trend['color']);
        // CORRECTION : Supprimer la ligne tooltip()
        // ->tooltip('Total des utilisateurs inscrits sur la plateforme'); // ❌ SUPPRIMÉ
    }

    private function createProductStats(): Stat
    {
        $totalProducts = Product::count();
        $inStockProducts = Product::where('stock', '>', 0)->count();
        $newProducts = Product::where('is_new', true)->count();

        return Stat::make('Produits', $totalProducts)
            ->description($inStockProducts . ' en stock • ' . $newProducts . ' nouveautés')
            ->descriptionIcon('heroicon-s-cube', IconPosition::Before)
            ->color('success');
        // CORRECTION : Supprimer la ligne tooltip()
        // ->tooltip('Gestion du catalogue produits et des stocks'); // ❌ SUPPRIMÉ
    }

    private function createSalesStats(): Stat
    {
        try {
            if (class_exists('App\Models\Order') && Schema::hasTable('orders')) {
                $currentMonthRevenue = Order::whereMonth('created_at', now()->month)
                    ->where('status', 'completed')
                    ->sum('total_amount');

                $pendingOrders = Order::where('status', 'pending')->count();

                return Stat::make('Chiffre d\'Affaires', number_format($currentMonthRevenue, 0, ',', ' ') . ' €')
                    ->description($pendingOrders . ' commandes en attente')
                    ->descriptionIcon('heroicon-s-currency-euro', IconPosition::Before)
                    ->color('warning');
                // CORRECTION : Supprimer la ligne tooltip()
                // ->tooltip('Performance commerciale et suivi des commandes'); // ❌ SUPPRIMÉ
            }
        } catch (\Exception $e) {
            // Fallback en cas d'erreur
        }

        $totalProductsValue = Product::sum('price');
        $featuredProducts = Product::where('is_featured', true)->count();

        return Stat::make('Valeur Stock', number_format($totalProductsValue, 0, ',', ' ') . ' €')
            ->description($featuredProducts . ' produits en vedette')
            ->descriptionIcon('heroicon-s-chart-bar', IconPosition::Before)
            ->color('info');
        // CORRECTION : Supprimer la ligne tooltip()
        // ->tooltip('Valeur totale du stock et produits mis en avant'); // ❌ SUPPRIMÉ
    }

    private function createCategoryStats(): Stat
    {
        $totalCategories = Category::count();
        $activeCategories = Category::has('products')->count();

        return Stat::make('Catégories', $totalCategories)
            ->description($activeCategories . ' catégories actives')
            ->descriptionIcon('heroicon-s-tag', IconPosition::Before)
            ->color('info');
        // CORRECTION : Supprimer la ligne tooltip()
        // ->tooltip('Organisation et structure du catalogue produits'); // ❌ SUPPRIMÉ
    }

    private function calculateTrend(float $current, float $previous): array
    {
        if ($previous == 0) {
            return [
                'icon' => $current > 0 ? 'heroicon-s-arrow-trending-up' : 'heroicon-s-minus',
                'color' => $current > 0 ? 'success' : 'gray'
            ];
        }

        $percentageChange = (($current - $previous) / $previous) * 100;

        if ($percentageChange > 0) {
            return ['icon' => 'heroicon-s-arrow-trending-up', 'color' => 'success'];
        } elseif ($percentageChange < 0) {
            return ['icon' => 'heroicon-s-arrow-trending-down', 'color' => 'danger'];
        } else {
            return ['icon' => 'heroicon-s-minus', 'color' => 'gray'];
        }
    }

    protected function getColumns(): int
    {
        return 4;
    }
}
