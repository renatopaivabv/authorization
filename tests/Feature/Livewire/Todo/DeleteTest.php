<?php

namespace Tests\Feature\Livewire\Todo;

use App\Http\Livewire\Todo\Delete;
use App\Models\Todo;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class DeleteTest extends TestCase
{
    /** @test */
    public function the_component_can_render()
    {
        $component = Livewire::test(Delete::class);

        $component->assertStatus(200);
    }

    /** @test */
    public function the_component_can_delete_a_todo()
    {
        $todo = Todo::factory()->create();

        Livewire::test(Delete::class, compact('todo'))
            ->call('delete');

        $this->assertDatabaseMissing('todos', [
            'id' => $todo->id,
        ]);
    }
}
