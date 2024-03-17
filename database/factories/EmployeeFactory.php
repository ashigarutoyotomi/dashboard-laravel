<?php
namespace Database\Factories;

use App\Models\Employee;
use Illuminate\Database\Eloquent\Factories\Factory;

class EmployeeFactory extends Factory
{
    protected $model = Employee::class;

    public function definition()
    {
        $gender = $this->faker->randomElement(['male', 'female', 'hermaphrodite']);
        return [
            'first_name' => $this->faker->firstName,
            'last_name' => $this->faker->lastName,
            'mid_name' => $this->faker->firstNameMale, // assuming mid name is optional
            'age' => $this->faker->numberBetween(18, 65),
            'bday' => $this->faker->date,
            'department_id' => $this->faker->numberBetween(1, 8), // assuming departments are predefined
            'employed_day' => $this->faker->date,
            'fired_day' => $this->faker->optional()->date, // assuming employees may or may not be fired
            'status' => $this->faker->randomElement(['active', 'inactive']),
            'file_id' => $this->faker->imageUrl(), // assuming you have a mechanism to store avatar images
            'sex' => $gender,
        ];
    }
}
