<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Notification extends Component
{
    public $type;
    public $message;

    protected $listeners = [
        'notification' => 'notify',
    ];

    public function render()
    {
        return view('livewire.notification');
    }

    public function notify($params)
    {
        $this->type = $params['type'];
        $this->message = $params['message'];
    }
}
