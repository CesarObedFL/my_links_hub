<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\On;
use Jantinnerezo\LivewireAlert\LivewireAlert;

use App\Models\LinkList;

class Dashboard extends Component
{
    use WithPagination, LivewireAlert;

    protected $listeners = [ 'list_created' => 'create_list_alert', 'link_saved' => 'link_saved_alert' ];

    protected $queryString = [ 'search' => [ 'except' => '' ] ];

    public $search = '';

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $_search = $this->search;
        return view('livewire.dashboard', [ 'lists' => LinkList::where(function($query) use ($_search) {
                                                                $query->when($_search, function($query, $_search) {
                                                                    if( $_search != '' ) {
                                                                        return $query->where('list_name', 'LIKE', "%{$_search}%");
                                                                    }
                                                                    return $query;
                                                                });
                                                            })
                                                            ->orderBy('list_name', 'asc')
                                                            ->get()
                                            ])->layout('layouts.app');
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
