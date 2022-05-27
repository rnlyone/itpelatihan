<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PengaturanFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'id' => 1,
            'norek' => '90360108792',
            'namarek' => 'ROESMAN RIDWAN RAJA',
            'bank' => 'JENIUS'
        ];
    }
}
