<?php
namespace Database\Seeders;

use App\Models\Categorie;
use App\Models\Tenue;
use Illuminate\Database\Seeder;

class TenueSeeder extends Seeder
{
    public function run()
    {
        Categorie::factory(5)->create()->each(function ($categorie) {
            Tenue::factory(10)->create(['categorie_id' => $categorie->id]);
        });
    }
}
