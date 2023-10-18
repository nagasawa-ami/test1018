<?php

namespace Database\Factories;

use App\Models\Contact;
use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Factory as FakerFactory;

class ContactFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */

    protected $model = Contact::class;

    public function definition()
    {
        // $this->faker->locale = 'ja_JP';
        $faker_jp = \Faker\Factory::create('ja_JP');

  return [
            'fullname' => $faker_jp->lastName . " " . $faker_jp->firstName,
            'gender' => $faker_jp->randomElement(['1', '2']),
            'email' => $faker_jp->unique()->safeEmail,
            'postcode' => $faker_jp->regexify('[0-9]{3}-[0-9]{4}'),
            'address' => $faker_jp->address,
            'building_name' => $faker_jp->secondaryAddress,
            'opinion' => $faker_jp->text(120),
        ];
    }
}


