<?php

namespace App\Filament\Widgets;

use App\Models\Book;
use Filament\Widgets\ChartWidget;

class BookChart extends ChartWidget
{
    protected static ?string $heading = 'Book Status Distribution';

    // Mengatur agar posisinya berada di urutan bawah (setelah card statistik)
    protected static ?int $sort = 2; 

    // Mengatur lebarnya setengah halaman
    protected int | string | array $columnSpan = 'half'; 

    // Membatasi tinggi maksimum chart
    protected function getMaxHeight(): ?string
    {
        return '200px'; 
    }

    protected function getData(): array
    {
        $available = Book::where('status', 'available')->count();
        $borrowed = Book::where('status', 'borrowed')->count();

        return [
            'datasets' => [
                [
                    'label' => 'Books',
                    'data' => [$available, $borrowed],
                    'backgroundColor' => ['#10b981', '#f59e0b'], // Hijau dan Oranye
                ],
            ],
            'labels' => ['Available', 'Borrowed'],
        ];
    }

    protected function getType(): string
    {
        return 'doughnut';
    }
}