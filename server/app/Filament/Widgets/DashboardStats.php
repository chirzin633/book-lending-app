<?php

namespace App\Filament\Widgets;

use App\Models\Book;
use App\Models\Loan;
use App\Models\Member;
use Filament\Support\Icons\Heroicon;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class DashboardStats extends StatsOverviewWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Total Books', Book::count())
                ->description('Jumlah semua buku')
                ->icon(Heroicon::BookOpen),

            Stat::make('Active Members', Member::where('status', 'active')->count())
                ->description('Anggota aktif')
                ->icon(Heroicon::UserGroup)
                ->color('success'),

            Stat::make('Loan Active', Loan::whereNull('return_date')->count())
                ->description('Pinjaman yang belum kembali')
                ->icon(Heroicon::ClipboardDocument)
                ->color('warning')
        ];
    }
}
