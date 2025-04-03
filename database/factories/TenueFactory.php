<?php
namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Tenue;


class TenueFactory extends Factory
{
    protected $model = Tenue::class;

    public function definition()
    {
        return [
            'nom' => $this->faker->word,
            'description' => $this->faker->sentence,
            'prix' => $this->faker->randomFloat(2, 10, 100),
            'categorie_id' => \App\Models\Category::factory(),
            'taille' => $this->faker->randomElement(['S', 'M', 'L', 'XL']),
            'couleur' => $this->faker->colorName,
            'disponible' => $this->faker->boolean,
            'image' => $this->faker->imageUrl(),
            'date_creation' => $this->faker->date,
            'materiau' => $this->faker->word,
            'marque' => $this->faker->company,
            'reference' => $this->faker->uuid,
            'promotion' => $this->faker->numberBetween(0, 50),
            'brand_id' => \App\Models\Brand::factory(),
        ];
    }
}
