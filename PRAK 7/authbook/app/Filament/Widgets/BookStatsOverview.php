<?php

namespace App\Filament\Widgets;

use App\Models\Author;
use App\Models\Book;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class BookStatsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Total Books', Book::count())
                ->description('Total buku terdaftar di perpustakaan')
                ->descriptionIcon('heroicon-o-book-open')
                ->color('success'),

            Stat::make('Total Authors', Author::count())
                ->description('Total penulis buku')
                ->descriptionIcon('heroicon-o-user-group'),

            Stat::make('Available Books', Book::where('status', 'available')->count())
                ->description('Buku yang siap dipinjam')
                ->color('info'),

            Stat::make('Borrowed Books', Book::where('status', 'borrowed')->count())
                ->description('Buku yang sedang dipinjam')
                ->color('warning'),
        ];
    }
}
