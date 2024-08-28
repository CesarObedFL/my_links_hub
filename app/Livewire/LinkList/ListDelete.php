<?php

namespace App\Livewire\LinkList;

use App\Http\Livewire\Auth;
use LivewireUI\Modal\ModalComponent;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use App\Models\LinkList;

class ListDelete extends ModalComponent
{
    use LivewireAlert;

    public $list_id;

    public function render()
    {
        return view('livewire.link-list.list-delete');
    }

    public function delete_list()
    {

        $this->dispatch('list_deleted');
        $this->close();
        //$this->alert('success', 'List deleted successfully!...', [ 'position' => 'center', 'timer' => 2500 ]);
    }

    public function close()
    {
        $this->closeModal();
    }

    public static function modalMaxWidth(): string
    {
        return 'md';
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
