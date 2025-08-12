<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Cliente>
 */
class ClienteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nome' => $this->faker->name(),
            'celular' => $this->faker->phoneNumber(),
            'data_nascimento' => $this->faker->date('d/m/Y'),
            'cep' => $this->faker->regexify('[0-9]{5}-[0-9]{3}'),
            'endereco' => $this->faker->streetAddress(),
            'cidade' => $this->faker->city(),
            'estado' => $this->faker->country(),
            'cpf' => $this->fakeCpf(),
        ];
    }

    private function fakeCpf(): string {
        $n = [];
        for ($i = 0; $i < 9; $i++) {
            $n[] = rand(0, 9);
        }

        $d1 = 0;
        for ($i = 0, $j = 10; $i < 9; $i++, $j--) {
            $d1 += $n[$i] * $j;
        }
        $d1 = 11 - ($d1 % 11);
        if ($d1 >= 10) $d1 = 0;
        $n[] = $d1;

        $d2 = 0;
        for ($i = 0, $j = 11; $i < 10; $i++, $j--) {
            $d2 += $n[$i] * $j;
        }
        $d2 = 11 - ($d2 % 11);
        if ($d2 >= 10) $d2 = 0;
        $n[] = $d2;

        return sprintf(
            '%d%d%d.%d%d%d.%d%d%d-%d%d',
            $n[0], $n[1], $n[2],
            $n[3], $n[4], $n[5],
            $n[6], $n[7], $n[8],
            $n[9], $n[10]
        );
    }
}
