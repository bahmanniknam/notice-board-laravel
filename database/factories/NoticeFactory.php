<?php

namespace Database\Factories;

use App\Services\Notice\Models\Notice;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class NoticeFactory extends Factory
{
    protected $model = Notice::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->title(),
            'content' => $this->faker->realText()
        ];
    }
}
