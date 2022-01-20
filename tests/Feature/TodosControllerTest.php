<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

use App\Todo;
use Illuminate\Support\Facades\Log;

class TodosControllerTest extends TestCase
{
    use RefreshDatabase;

    public function setUp()
    {
        parent::setUp();
        $this->todos = factory(Todo::class, 5)->create();
    }

    public function tearDonw()
    {
        parent::tearDown();
        $this->todos = null;
    }

    public function testGet()
    {
        $res = $this->get(url('/todos/get'));

        $res->assertStatus(200);
        $this->assertEquals(5, Todo::count());
    }

    public function testAdd()
    {
        $newTodo = factory(Todo::class)->make()->toArray();

        $res = $this->post(url('/todos/add'), $newTodo);

        $res->assertStatus(200);
        $this
            ->assertDatabaseHas('todos', ['task' => $newTodo['task']]);
    }

    public function testUpdate()
    {
        $max = count($this->todos) - 1;
        $id = $this->todos[random_int(0, $max)]['id'];
        $updated = factory(Todo::class)->make()->toArray();

        $res = $this->patch(url("/todos/update/$id"), $updated);

        $res->assertStatus(200);
        $this
            ->assertDatabaseHas('todos', ['task' => $updated['task']]);
    }

    public function testDelete()
    {
        $max = count($this->todos) - 1;
        $target = $this->todos[random_int(0, $max)];
        $id = $target['id'];

        $res = $this->delete(url("/todos/delete/$id"));

        $res->assertStatus(200);
        $this
            ->assertDatabaseMissing('todos', ['task' => $target['task']]);
    }
}
