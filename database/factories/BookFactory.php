<?php

namespace Database\Factories;

use App\Models\Book;
use Illuminate\Database\Eloquent\Factories\Factory;

class BookFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Book::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->company . '出版',
	    'bookdetail_id' => 1,
	    'author_id' => 2,
	    'publisher_id' => 3,
	    //'bookdetail_id' => $faker->unique()->numberBetween(1,20),
	    //'author_id' => $faker->unique()->numberBetween(1,20),
	    //'publisher_id' => $faker->unique()->numberBetween(1,20),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
