<?php

namespace App\Livewire;

use LivewireUI\Modal\ModalComponent;

class SavedLink extends ModalComponent
{

    public function render()
    {
        return view('livewire.saved-link');
    }

    public function close()
    {
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
