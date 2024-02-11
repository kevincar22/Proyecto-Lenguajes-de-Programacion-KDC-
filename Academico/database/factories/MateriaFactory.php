<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Materia;

class MateriaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Materia::class;

    public function definition()
    {
        return [
            'nombre' => $this->faker->name,
            'codigo' => $this->faker->codigo,
            'descripcion' => $this->faker->descripcion
        ];
    }
}