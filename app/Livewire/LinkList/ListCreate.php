<?php

namespace App\Livewire\LinkList;

use LivewireUI\Modal\ModalComponent;
use App\Http\Livewire\Auth;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use App\Models\LinkList;

class ListCreate extends ModalComponent
{
    use LivewireAlert;

    public $name;

    protected $rules = [
        'name' => 'required|max:30|min:3'
    ];

    public function render()
    {
        return view('livewire.link-list.list-create');
    }

    public function store()
    {
        $this->validate();

        LinkList::create([ 'name' => $this->name ]);

        $this->dispatch('list_created');
        $this->close();
        $this->alert('success', 'List created successfully!...', [ 'position' => 'center', 'timer' => 2500 ]);
    }

    public function reset_fields()
    {
        $this->name = '';
    }

    public function close()
    {
        $this->reset_fields();
        $this->closeModal();
    }

    public static function modalMaxWidth(): string
    {
        return 'lg';
    }

    public static function closeModalOnEscape(): bool
    {
        return false;
    }

    public static function closeModalOnClickAway(): bool
    {
        return false;
    }
}
