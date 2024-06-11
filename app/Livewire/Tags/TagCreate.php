<?php

namespace App\Livewire\Tags;

use LivewireUI\Modal\ModalComponent;
use App\Http\Livewire\Auth;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\Validate;

use App\Models\Tag;

class TagCreate extends ModalComponent
{
    use LivewireAlert;

    #[Validate('required|min:3|max:30', message: 'The tag title must be between 3 and 15 letters and is required!...')] 
    public $title;

    public function render()
    {
        return view('livewire.tags.tag-create');
    }

    public function store()
    {
        $this->validate();

        Tag::create([ 
            'title' => $this->title,
        ]);

        $this->dispatch('tag_created');
        $this->close();
        $this->alert('success', 'Tag created successfully!...', [ 'position' => 'center', 'timer' => 2500 ]);
    }

    public function reset_fields()
    {
        $this->title = '';
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
