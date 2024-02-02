<?php

namespace Database\Factories;

use App\Models\Resources;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Resources>
 */
class ResourcesFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Resources::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $startTimestamp = strtotime('2020-01-01');
        $endTimestamp = strtotime('2023-12-31');

        $randomTimestamp = rand($startTimestamp, $endTimestamp);

        return [
            'resource_category_id' => Category::whereNull('parent_category')->get()->random()->id,
            //'resource_subcategory_id' => Category::where('parent_category', '=',4)->get()->random()->id,
            'resource_title' => $this->faker->text(20),
            'resource_slug' => Str::slug($this->faker->text(10)),
            'resource_short_desc' => $this->faker->text(250),
            'resource_desc' => $this->faker->randomHtml(),
            'resource_image' => $this->faker->imageUrl(20, 20),
            'created_by' => 1,
            'created_at' => date('Y-m-d H:i:s', $randomTimestamp),
            'updated_at' => date('Y-m-d H:i:s', $randomTimestamp),
        ];
    }
}
