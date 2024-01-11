<?php

namespace Database\Factories;

use App\Models\Invoice;
use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Factory as FakerFactory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Invoice>
 */
class InvoiceFactory extends Factory
{
    protected $model = Invoice::class;

    public function definition(): array
    {
        $faker = $this->getFaker();

        return [
            'Invoice_number' => 'F/' . $this->faker->numberBetween(1, 1000),
            'NIP_buyer' => $this->generateRandomNIP($faker),
            'NIP_seller' =>  $this->generateRandomNIP($faker),
            'Product_name' => strtoupper($faker->randomLetter . $faker->randomLetter . $faker->randomLetter),
            'Net_amount' => $this->faker->randomFloat( 0, 0, 999.),
            'currency' => 'PLN',
            'Date_of_issue' => $this->faker->date(),
            'Date_of_edit' => $this->faker->date(),
        ];
    }

    protected function getFaker()
    {
        return FakerFactory::create('pl_PL');
    }

    protected function generateRandomNIP($faker)
    {
        return $faker->numerify('##############');
    }
}
