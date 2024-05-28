<?php

namespace App\Livewire\LinkList;

use Livewire\Component;
use Livewire\WithPagination;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use App\Models\LinkList;

class LinkListing extends Component
{
    use WithPagination, LivewireAlert;

    protected $listeners = [ 'list_created' => 'render' ];

    protected $queryString = [ 'search' => [ 'except' => '' ], 'per_page' ];

    public $per_page = 10;
    public $order_by = 'created_at';
    public $sort_direction = 'desc';
    public $search = '';
    public $list_id;

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function mount($list_id)
    {
        $this->list_id = $list_id;
    }

    public function render()
    {
        $_list_id = $this->list_id;
        $_search = $this->search;
        return view('livewire.link-list.link-listing', [ 'link_list' => LinkList::where('id', $_list_id)
                                                                        ->where(function($query) use ($_search) {
                                                                            $query->when($_search, function($query, $_search) {
                                                                                if( $_search != '' )
                                                                                    return $query->where('name', 'LIKE', "%{$_search}%")->orWhereRelation('links', 'title', 'LIKE', "%{$_search}%");
                                                                                return $query;
                                                                            });
                                                                        })
                                                                        ->orderBy($this->order_by, $this->sort_direction)
                                                                        ->paginate($this->per_page)
                                                                ]);
    }

    public function order_by( $order_by_parameter )
    {
        if( $this->order_by == $order_by_parameter ) {
            $this->sort_direction = ( $this->sort_direction == 'asc' ) ? 'desc' : 'asc';
        } else {
            $this->sort_direction = 'asc';
            $this->order_by = $order_by_parameter;
        }
    }

}
