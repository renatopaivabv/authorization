<?php

namespace Tests\Feature\Livewire\Todo;

use App\Http\Livewire\Todo\Create;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class CreateTest extends TestCase
{
    /** @test */
    public function the_component_can_render()
    {
        $component = Livewire::test(Create::class);

        $component->assertStatus(200);
    }

    /** @test */
    public function the_component_can_create_a_todo()
    {
        $component = Livewire::test(Create::class);

        $component->set('title', 'Test Todo');

        $component->call('save');

        $this->assertDatabaseHas('todos', [
            'title' => 'Test Todo',
        ]);
    }
}
