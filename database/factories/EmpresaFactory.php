<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Empresa;

class EmpresaFactory extends Factory
{
  /**
   * Define the model's default state.
   *
   * @return array
   */

  protected $model = Empresa::class;

  public function definition()
  {
    return [
      'ruc' => '10425162530',
      'razon_social' => $this->faker->name,
      'nombre_comercial' => $this->faker->name,
      'direccion' => $this->faker->address,
      'telefono' => $this->faker->phoneNumber,
      'celular' => $this->faker->phoneNumber,
      'correo' => $this->faker->email,
      'web' => $this->faker->url,
      'logo' => $this->faker->imageUrl(300,300),
      'estado' => $this->faker->randomElement($array = array ('cerrado','abierto','pausado'))
    ];
  }
}
