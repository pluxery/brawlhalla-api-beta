<?php


use App\Models\Post;
use App\Models\User;
use App\Services\PostService;
use Codeception\Test\Unit;


class PostServiceTest extends Unit
{
    /**
     * @var \UnitTester
     */
    protected $tester;
    protected $service;
    protected $faker;

    protected function _before()
    {
        $user = User::find(1);
        auth()->login($user);
    }

    protected function _inject(PostService $service)
    {
        $this->service = $service;
        $this->faker =  Faker\Factory::create();
    }

    // tests
    public function testCreatePostWithOnlyRequiredFields()
    {
        $resultTest = false;
        $data = [
            'title' => $this->faker->title,
            'content' => $this->faker->text
        ];
        $post = $this->service->store($data);
        if ($post instanceof Post) {
            $resultTest = true;
        }
        $this->assertTrue($resultTest);

    }

    public function testCreatePostWithFullCorrectData()
    {
        $resultTest = false;
        $data = [
            'title' => $this->faker->title,
            'content' => $this->faker->text,
            'description' => $this->faker->sentence,
            'category' => $this->faker->sentence,
        ];

        $post = $this->service->store($data);
        if ($post instanceof Post) {
            $resultTest = true;
        }
        $this->assertTrue($resultTest);
    }

    public function testCreateEmptyPost()
    {
        $resultTest = false;
        $post = $this->service->store([]);
        if ($post instanceof Post) {
            $resultTest = true;
        }
        $this->assertFalse($resultTest);
    }

    public function testUpdatePost()
    {
        $resultTest = false;
        $post = $this->service->store([
            'title' => $this->faker->title,
            'content' => $this->faker->text,
            'description' => $this->faker->sentence,
            'category' => $this->faker->sentence,
        ]);
        $post = $this->service->update([
            'title' => $this->faker->title,
            'content' => $this->faker->text,
            'description' => $this->faker->sentence,
            'category' => $this->faker->sentence,
        ], $post);
        if ($post instanceof Post) {
            $resultTest = true;
        }
        $this->assertTrue($resultTest);
    }


}
