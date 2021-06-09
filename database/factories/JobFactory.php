<?php

namespace Database\Factories;

use App\Models\Job;
use App\Models\User;
use App\Models\Company;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class JobFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Job::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $title=$this->faker->name;
        return [
            'user_id' => $this->faker->numberBetween(1,User::count()),
            'company_id' => $this->faker->numberBetween(1,Company::count()),
            'title'=> $title,
            'slug'=> Str::slug($title),
            'position'=> $this->faker->jobTitle,
            'address'=> $this->faker->address,
            'category_id'=>rand(1,5),
            'type' => 'fulltime',
            'status' =>rand(0,1),
            'description'=>$this->faker->text,
            'roles'=>$this->faker->text,
            'last_date'=>$this->faker->DateTime
        ];
    }
}
