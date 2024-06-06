<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use Jantinnerezo\LivewireAlert\LivewireAlert;

use App\Models\LinkList;

class Dashboard extends Component
{
    use WithPagination, LivewireAlert;

    protected $listeners = [ 'list_created' => 'create_list_alert', 'link_saved' => 'link_saved_alert' ];

    protected $queryString = [ 'search' => [ 'except' => '' ], 'per_page' ];

    public $per_page = 10;
    public $order_by = 'created_at';
    public $sort_direction = 'desc';
    public $search = '';

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        return view('livewire.dashboard', [ 'lists' => LinkList::all() ])->layout('layouts.app');
    }

    public function create_list_alert()
    {
        $this->alert('success', 'List created successfully!...', [ 'position' => 'center', 'timer' => 2500 ]);
    }

    public function link_saved_alert()
    {
        $this->alert('success', 'Link saved successfully!...', [ 'position' => 'center', 'timer' => 2500 ]);
    }
}
