<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $categories = [
            'Elettronica',
            'Abbigliamento',
            'Casa e giardino',
            'Sport',
            'Libri e riviste',
            'Accessori',
            'Arredamento',
            'Bambini',
            'Animali domestici',
            'Motori',
        ];

        foreach ($categories as $category) {
            Category::create([
                'name' => $category
            ]);
        }
    }
}
