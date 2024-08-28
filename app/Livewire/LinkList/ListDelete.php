<?php

namespace App\Livewire\LinkList;

use App\Http\Livewire\Auth;
use LivewireUI\Modal\ModalComponent;
use Illuminate\Support\Facades\Storage;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use App\Models\LinkList;
use App\Models\Link;

class ListDelete extends ModalComponent
{
    use LivewireAlert;

    public $list_id;
    public $list_name;
    public $question_response;

    public function mount()
    {
        $list = LinkList::where('id', $this->list_id)->first();
        $this->list_name = $list->list_name;
    }

    public function render()
    {
        return view('livewire.link-list.list-delete');
    }

    public function delete_list()
    {
        $list = LinkList::where('id', $this->list_id)->first();
        $links = Link::where('link_list_id', $this->list_id)->get();

        foreach( $links as $link ) {
            if ( $link->thumbnail ) {
                Storage::disk('public_thumbnails')->delete($link->thumbnail);
            }
        }

        $list->delete(); 
        $this->dispatch('list_deleted');
        $this->close();
    }

    public function reset_fields()
    {
        $this->list_id = '';
        $this->list_name = '';
    }

    public function close()
    {
        $this->reset_fields();
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
