<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

use App\Order;
use Illuminate\Support\Facades\Log;

class OrderControllerTest extends TestCase
{
    use RefreshDatabase;

    public function setUp()
    {
        parent::setUp();
        factory(Order::class)->create();
    }

    public function tearDown()
    {
        parent::tearDown();
    }

    public function testGet()
    {
        $res = $this->get(url('/orders/get'));

        $res->assertStatus(200);
    }

    public function testSet()
    {
        $newOrder = factory(Order::class)->make()->toArray();
        $res = $this->patch(url('/orders/set'), $newOrder);

        $res->assertStatus(200);
        $this
            ->assertDatabaseHas('orders', ['todo_order' => $newOrder['todo_order']]);
    }
}
