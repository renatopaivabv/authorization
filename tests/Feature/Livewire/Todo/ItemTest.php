<?php

namespace Tests\Feature\Livewire\Todo;

use App\Http\Livewire\Todo\Create;
use App\Http\Livewire\Todo\Delete;
use App\Http\Livewire\Todo\Item;
use App\Models\Todo;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class ItemTest extends TestCase
{
    /** @test */
    public function the_component_can_render()
    {
        $component = Livewire::test(Item::class);

        $component->assertStatus(200);
    }

    /** @test */
    public function it_should_be_able_to_set_a_task_as_completed()
    {
        $todo = Todo::factory()->create(['checked' => false]);

        $component = Livewire::test(Item::class, compact('todo'));

        $component->set('todo.checked', true);

        $this->assertDatabaseHas('todos', [
            'id' => $todo->id,
            'checked' => true,
        ]);
    }

    /** @test */
    public function it_should_be_able_to_set_a_task_as_uncompleted()
    {
        $todo = Todo::factory()->create(['checked' => true]);

        $component = Livewire::test(Item::class, compact('todo'));

        $component->set('todo.checked', false);

        $this->assertDatabaseHas('todos', [
            'id' => $todo->id,
            'checked' => false,
        ]);
    }

    /** @test */
    public function it_should_be_able_to_delete_a_task()
    {
        $todo = Todo::factory()->create();

        $component = Livewire::test(Delete::class, compact('todo'));

        $component->call('delete');

        $this->assertDatabaseMissing('todos', [
            'id' => $todo->id,
        ]);
    }

    /** @test */
    public function it_should_emit_a_todo_deleted_event_when_deleting_a_task()
    {
        $todo = Todo::factory()->create();

        $component = Livewire::test(Delete::class, compact('todo'));

        $component->call('delete');

        $component->assertEmitted('todo::deleted');
    }

    /** @test */
    public function it_should_emit_a_todo_updated_event_when_updating_a_task()
    {
        $todo = Todo::factory()->create();

        $component = Livewire::test(Item::class, compact('todo'));

        $component->set('todo.checked', true);

        $component->assertEmitted('todo::updated');
    }

    /** @test */
    public function it_should_emit_a_todo_updated_event_when_updating_a_task_to_uncompleted()
    {
        $todo = Todo::factory()->create(['checked' => true]);

        $component = Livewire::test(Item::class, compact('todo'));

        $component->set('todo.checked', false);

        $component->assertEmitted('todo::updated');
    }

    /** @test */
    public function it_should_emit_a_todo_updated_event_when_updating_a_task_to_completed()
    {
        $todo = Todo::factory()->create(['checked' => false]);

        $component = Livewire::test(Item::class, compact('todo'));

        $component->set('todo.checked', true);

        $component->assertEmitted('todo::updated');
    }

    /** @test */
    public function it_should_validate_title_required()
    {

        $component = Livewire::test(Create::class)
            ->set('title', '')
            ->call('save')
            ->assertHasErrors(['title' => 'required']);
    }

    /** @test */
    public function it_should_validate_title_too_short()
    {

        $component = Livewire::test(Create::class)
            ->set('title', 'dd')
            ->call('save')
            ->assertHasErrors(['title' => 'min']);
    }

    /** @test */
    public function it_should_validate_title_too_long()
    {

        $component = Livewire::test(Create::class)
            ->set('title', str_repeat('a', 256))
            ->call('save')
            ->assertHasErrors(['title' => 'max']);
    }
}
