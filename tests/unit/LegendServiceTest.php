<?php

use App\Models\Legend;
use App\Models\Weapon;
use App\Services\LegendService;
use Codeception\Test\Unit;
use Illuminate\Container\Container;


class LegendServiceTest extends Unit
{
    /**
     * @var \UnitTester
     */
    protected $tester;
    protected $service;
    protected $faker;

    protected function _inject(LegendService $service)
    {
        $this->service = $service;
        $this->faker = Faker\Factory::create();
    }

    // tests
    public function testCreateLegend()
    {
        $resultTest = false;
        $imgIndex = random_int(0, 7);
        $weapon = Weapon::get()->random();
        $data = [
            "name" => $this->faker->firstName,
            "image" => "legends/avatars/main_${imgIndex}.webp",
            "main_image" => "legends/body/avatar_${imgIndex}.webp",
            "history" => $this->faker->text,
            "first_weapon" => ['name' => $this->faker->word, 'image' => 'fake/path/to/image'],
            "second_weapon" => ['name' => $weapon->name, 'image' => $weapon->image],
            'attack' => random_int(1, 10),
            'dexterity' => random_int(1, 10),
            'defend' => random_int(1, 10),
            'speed' => random_int(1, 10),
            'price' => random_int(900, 7200),
        ];
        $legend = $this->service->store($data);
        if ($legend instanceof Legend) {
            $resultTest = true;
        }
        $this->assertTrue($resultTest);
    }

    public function testUpdateLegned()
    {
        $resultTest = false;
        $legend = Legend::find(1);
        $imgIndex = random_int(0, 7);
        $weapon = Weapon::get()->random();
        $legend->update([
            "name" => $this->faker->firstName,
            "image" => "legends/avatars/main_${imgIndex}.webp",
            "main_image" => "legends/body/avatar_${imgIndex}.webp",
            "history" => $this->faker->text,
            "first_weapon_id" => 1,
            "second_weapon_id" => 2,
            'attack' => random_int(1, 10),
            'dexterity' => random_int(1, 10),
            'defend' => random_int(1, 10),
            'speed' => random_int(1, 10),
            'price' => random_int(900, 7200),
        ]);
        if ($legend instanceof Legend) {
            $resultTest = true;
        }
        $this->assertTrue($resultTest);

    }
}
