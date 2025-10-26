<?php

namespace App\Filament\Widgets;

use App\Models\Order;
use Filament\Widgets\ChartWidget;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class SalesChartWidget extends ChartWidget
{
    protected ?string $heading = 'Évolution du Chiffre d\'Affaires';

    protected function getData(): array
    {
        if (!$this->hasOrderData()) {
            return $this->getDemoData();
        }

        try {
            return $this->getRevenueData();
        } catch (\Exception $e) {
            return $this->getDemoData();
        }
    }

    private function hasOrderData(): bool
    {
        return class_exists('App\Models\Order') &&
            Schema::hasTable('orders') &&
            Order::exists();
    }

    private function getRevenueData(): array
    {
        $monthlyRevenue = Order::select(
            DB::raw('YEAR(created_at) as year'),
            DB::raw('MONTH(created_at) as month'),
            DB::raw('COALESCE(SUM(total_amount), 0) as total')
        )
            ->where('created_at', '>=', now()->subMonths(11)->startOfMonth())
            ->where('status', 'completed')
            ->groupBy('year', 'month')
            ->orderBy('year', 'asc')
            ->orderBy('month', 'asc')
            ->get();

        return $this->formatChartData($monthlyRevenue);
    }

    private function formatChartData($revenueData): array
    {
        $labels = [];
        $data = [];

        for ($i = 11; $i >= 0; $i--) {
            $date = now()->subMonths($i);
            $labels[] = $date->format('M Y');

            $monthData = $revenueData->first(function ($item) use ($date) {
                return $item->year == $date->year && $item->month == $date->month;
            });

            $data[] = $monthData ? floatval($monthData->total) : 0;
        }

        return [
            'datasets' => [
                [
                    'label' => 'Chiffre d\'affaires (€)',
                    'data' => $data,
                    'borderColor' => '#3b82f6',
                    'backgroundColor' => 'rgba(59, 130, 246, 0.1)',
                    'fill' => true,
                    'tension' => 0.4,
                ],
            ],
            'labels' => $labels,
        ];
    }

    private function getDemoData(): array
    {
        $labels = [];
        $data = [];

        for ($i = 11; $i >= 0; $i--) {
            $date = now()->subMonths($i);
            $labels[] = $date->format('M Y');
            $baseValue = 4000 + ($i * 300);
            $variation = rand(-800, 1200);
            $data[] = max(1000, $baseValue + $variation);
        }

        return [
            'datasets' => [
                [
                    'label' => 'Chiffre d\'affaires (€) - Données de démonstration',
                    'data' => $data,
                    'borderColor' => '#6b7280',
                    'backgroundColor' => 'rgba(107, 114, 128, 0.1)',
                    'fill' => true,
                    'tension' => 0.4,
                ],
            ],
            'labels' => $labels,
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }
}
