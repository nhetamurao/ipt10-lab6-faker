<?php
require '../vendor/autoload.php';

use Faker\Factory;

class Random
{
    private $faker;

    public function __construct()
    {
        $this->faker = Factory::create('en_PH'); // Use the Filipino locale
    }

    public function generatePerson()
    {
        return [
            $this->faker->uuid,
            $this->faker->title,
            $this->faker->firstName,
            $this->faker->lastName,
            $this->faker->streetAddress,
            $this->faker->citySuffix, // Barangay
            $this->faker->city,
            $this->faker->state,
            $this->faker->country,
            $this->faker->phoneNumber,
            $this->faker->phoneNumber, // Mobile number
            $this->faker->company,
            $this->faker->url,
            $this->faker->jobTitle,
            $this->faker->colorName,
            $this->faker->date,
            $this->faker->email,
            $this->faker->password
        ];
    }

    public function generatePersons($count)
    {
        $persons = [];
        for ($i = 0; $i < $count; $i++) {
            $persons[] = $this->generatePerson();
        }
        return $persons;
    }
}