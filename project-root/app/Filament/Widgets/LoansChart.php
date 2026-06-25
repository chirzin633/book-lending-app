<?php

namespace App\Filament\Widgets;

use App\Models\Loan;
use Filament\Widgets\ChartWidget;

class LoansChart extends ChartWidget
{
    protected ?string $heading = 'Loans per Month';

    protected function getData(): array
    {
        $loans = Loan::selectRaw('MONTH(loan_date) as month, COUNT(*) as total')
            ->groupBy('month')
            ->orderBy('month')
            ->pluck('total', 'month')
            ->toArray();
        return [
            'datasets' => [
                [
                    'label' => 'Loans',
                    'data' => array_values($loans),
                    'backgroundColor' => '#3b82f6',
                ],
            ],
            'labels' => array_map(fn($m) => date('F', mktime(0, 0, 0, $m, 1)), array_keys($loans))
        ];
    }

    protected function getType(): string
    {
        return 'bar';
    }
}
