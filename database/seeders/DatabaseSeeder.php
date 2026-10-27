<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\Status;
use App\Models\Product;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $guitars = Category::create(['title' => 'Гитары']);
        $keys = Category::create(['title' => 'Клавишные']);
        $drums = Category::create(['title' => 'Барабаны']);

        $inStock = Status::create(['title' => 'В наличии', 'icon' => 'fa-check']);
        $onOrder = Status::create(['title' => 'Под заказ', 'icon' => 'fa-clock']);

        Product::create([
            'title' => 'CORT AD810M Акустическая гитара',
            'content' => 'Отличная гитара',
            'price' => 2799,
            'old_price' => 3142,
            'hit' => true,
            'sale' => true,
            'category_id' => $guitars->id,
            'status_id' => $inStock->id,
            'img' => '1.jpg',
        ]);

        Product::create([
            'title' => 'Yamaha PSR-E373 Синтезатор',
            'content' => 'Компактный синтезатор',
            'price' => 15990,
            'old_price' => 18000,
            'hit' => false,
            'sale' => true,
            'category_id' => $keys->id,
            'status_id' => $inStock->id,
            'img' => '1.jpg',
        ]);

        Product::create([
            'title' => 'Roland TD-1K Барабаны',
            'content' => 'Электронная установка',
            'price' => 45000,
            'hit' => true,
            'sale' => false,
            'category_id' => $drums->id,
            'status_id' => $onOrder->id,
            'img' => '1.jpg',
        ]);

        Product::create([
            'title' => 'Fender Squier Affinity Stratocaster',
            'content' => 'Легендарная электрогитара для начинающих',
            'price' => 25000,
            'old_price' => 28000,
            'hit' => false,
            'sale' => true,
            'category_id' => $guitars->id,
            'status_id' => $inStock->id,
            'img' => '1.jpg',
        ]);

        Product::create([
            'title' => 'Casio CT-S300 Синтезатор',
            'content' => 'Компактный синтезатор с 61 клавишей',
            'price' => 12000,
            'old_price' => null,
            'hit' => true,
            'sale' => false,
            'category_id' => $keys->id,
            'status_id' => $inStock->id,
            'img' => '1.jpg',
        ]);

        Product::create([
            'title' => 'Pearl Roadshow Барабанная установка',
            'content' => 'Полный комплект для барабанщика',
            'price' => 60000,
            'old_price' => 75000,
            'hit' => false,
            'sale' => true,
            'category_id' => $drums->id,
            'status_id' => $onOrder->id,
            'img' => '1.jpg',
        ]);
    }
}