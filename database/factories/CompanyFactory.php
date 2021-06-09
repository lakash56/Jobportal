<?php

namespace Database\Factories;

use App\Models\Company;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class CompanyFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Company::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $name=$this->faker->company;
        return [
            'user_id' => $this->faker->numberBetween(1,User::count()),
            'cname' => $name,
            'slug'=> Str::slug($name),
            'address' => $this->faker->address,
            'phone' => $this->faker->phoneNumber,
            'website' =>$this->faker->domainName,
            'logo'=>'avatar/avatar6.png ',
            'cover_photo' => 'cover/mycom.png',
            'slogan'=>'Learn and be better verson',
            'description' =>$this->faker->text
        ];
    }
}
