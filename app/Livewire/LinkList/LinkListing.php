<?php

namespace App\Livewire\LinkList;

use Illuminate\Support\Facades\Storage;

use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\On;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use App\Models\Link;
use App\Models\LinkList;

class LinkListing extends Component
{
    use WithPagination, LivewireAlert;

    protected $listeners = [ 
        'list_created' => 'render', 
        'link_saved' => 'render',
        'refreshComponent' => '$refresh'
    ];

    protected $queryString = [ 
        'search' => [ 'except' => '' ],
        'page' => [ 'except' => 1 ],
        'platform' => [ 'except' => 'all' ], 
        'title' => [ 'except' => 'all' ], 
        'list_name',
        'per_page' 
    ];

    public $page;
    public $per_page = 10;
    public $order_by = 'created_at';
    public $sort_direction = 'desc';
    public $search = '';

    public $list_id;

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function mount($id)
    {
        $this->list_id = $id;
    }

    public function render()
    {
        $_search = $this->search;
        return view('livewire.link-list.link-listing', [ 'list_name' => LinkList::select('list_name')->where('id', $this->list_id)->get()[0], 
                                                        'link_list' => Link::whereRelation('link_list', 'id', $this->list_id)
                                                                        ->where(function($query) use ($_search) {
                                                                            $query->when($_search, function($query, $_search) {
                                                                                if( $_search != '' ) {
                                                                                    return $query->whereRelation('tags', 'title', 'LIKE', "%{$_search}%")
                                                                                                ->orWhere('platform', 'LIKE', "%{$_search}%")
                                                                                                ->orWhere('title', 'LIKE', "%{$_search}%");
                                                                                }
                                                                                return $query;
                                                                            });
                                                                        })
                                                                        ->orderBy($this->order_by, $this->sort_direction)
                                                                        ->paginate($this->per_page)
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

    public function delete_link( $link_id )
    {
        $link = Link::findOrFail($link_id);
        if ( $link->thumbnail ) {
            Storage::disk('public_thumbnails')->delete($link->thumbnail);
        }
        $link->delete();
        $this->alert('success', 'Link deleted successfully!...', [ 'position' => 'center', 'timer' => 3000 ]);
        $this->dispatch('refreshComponent');
    }

}
