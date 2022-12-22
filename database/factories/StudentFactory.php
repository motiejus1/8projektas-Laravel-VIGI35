<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()

    {

        // 1. isorinio rakto stulepelio reiksme(id) atitiktu kitos lenteles stulpelio reiksme(id). Nesvarbus kiek grupe turiu studentu
        // Daug studentu turi daug grupiu
        // studentai priklauso grupei grupe priklauso istaigai o istaiga dar priklauso miestui

            //15 grupiu su 10 studentu kiekvienoje
        // 2. Karkaso galimybiu panaudojimas ????

        return [
            'name' => $this->faker->firstName(),
            'surname' => $this->faker->lastName(),
            'email' => $this->faker->unique()->safeEmail(),
            'phone' => $this->faker->unique()->phoneNumber(),
            // 'group_id' => $this->faker->numberBetween(1, 15) // ??????????

            //veiks
            //grupiu yra 15, generuojame skaiciu nuo 1 iki 10
            // 1 - 10, kad mes turime 15 grupiu

            //neveiks
            //stulpelis yra isorinis raktas, reikia, kad butu toks pat kaip ir grupiu id

        ];
    }
}
