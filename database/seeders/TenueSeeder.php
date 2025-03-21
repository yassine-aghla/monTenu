<?php
namespace Database\Seeders;

use App\Models\Category;
use App\Models\Tenue;
use Illuminate\Database\Seeder;

class TenueSeeder extends Seeder
{
    public function run()
    {
        Category::factory(5)->create()->each(function ($categorie) {
            Tenue::factory(10)->create(['categorie_id' => $categorie->id]);
        });
    }
}
