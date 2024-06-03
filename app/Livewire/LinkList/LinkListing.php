<?php

namespace App\Livewire\LinkList;

use Livewire\Component;
use Livewire\WithPagination;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use App\Models\Link;
use App\Models\LinkList;

class LinkListing extends Component
{
    use WithPagination, LivewireAlert;

    protected $listeners = [ 'list_created' => 'render', 'link_saved' => 'link_saved_alert', 'refreshComponent' => '$refresh'];

    protected $queryString = [ 'search' => [ 'except' => '' ], 'platform' => [ 'except' => 'all' ], 'title' => [ 'except' => 'all' ], 'per_page' ];

    public $per_page = 10;
    public $order_by = 'created_at';
    public $sort_direction = 'desc';
    public $search = '';

    public $list_id;
    public $list_name;

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function mount($id)
    {
        $this->list_id = $id;
        $this->list_name = LinkList::select('name')->where('id', $id)->get()[0];
    }

    public function render()
    {
        $_list_id = $this->list_id;
        $_list_name = $this->list_name;
        $_search = $this->search;
        $_order_by = $this->order_by;
        $_sort_direction = $this->sort_direction;
        $_per_page = $this->per_page;
        return view('livewire.link-list.link-listing', [ 'list_name' => $_list_name, 
                                                        'link_list' => Link::whereRelation('link_list', 'id', $_list_id)
                                                                        ->where(function($query) use ($_search) {
                                                                            $query->when($_search, function($query, $_search) {
                                                                                if( $_search != '' )
                                                                                    return $query->where('platform', 'LIKE', "%{$_search}%")->orWhere('title', 'LIKE', "%{$_search}%");
                                                                                return $query;
                                                                            });
                                                                        })
                                                                        ->orderBy($_order_by, $_sort_direction)
                                                                        ->paginate($_per_page)
                                                                ])->layout('layouts.app');
    }

    public function order( $order_by_parameter )
    {
        if( $this->order_by == $order_by_parameter ) {
            $this->sort_direction = ( $this->sort_direction == 'asc' ) ? 'desc' : 'asc';
        } else {
            $this->sort_direction = 'asc';
            $this->order_by = $order_by_parameter;
        }

        $this->dispatch('refreshComponent');
    }

}
