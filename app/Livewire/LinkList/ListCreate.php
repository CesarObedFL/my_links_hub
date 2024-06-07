<?php

namespace App\Livewire\LinkList;

use App\Http\Livewire\Auth;
use LivewireUI\Modal\ModalComponent;
use Livewire\Attributes\Validate;
use Livewire\WithFileUploads;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use App\Models\LinkList;

class ListCreate extends ModalComponent
{
    use LivewireAlert, WithFileUploads;

    #[Validate('required|max:30|min:3', message: 'The list name must be between 3 and 30 letters and is required!...')] 
    public $list_name;

    #[Validate('required|min:10', message: 'The list description must have more than 10 letters and is required!...')] 
    public $list_description;

    #[Validate('required|image|max:102400', message: 'The list image couldn\'t be higer than 2mb and is required!')] 
    public $list_image;


    public function render()
    {
        return view('livewire.link-list.list-create');
    }

    public function store()
    {
        $this->validate();

        $filename = $this->list_image->getClientOriginalName();
        $this->list_image->storeAs('/', $filename, 'public_list_images');

        LinkList::create([ 
            'list_name' => $this->list_name, 
            'list_description' => $this->list_description,
            'list_image' => $filename
        ]);


        $this->dispatch('list_created');
        $this->close();
        $this->alert('success', 'List created successfully!...', [ 'position' => 'center', 'timer' => 2500 ]);
    }

    public function reset_fields()
    {
        $this->list_name = '';
        $this->list_description = '';
        $this->list_image = null;
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
