<?php

namespace App\Livewire\Tags;

use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\On;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use App\Models\Tag;
use App\Models\Taggings;

class TagListing extends Component
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
        'per_page',
    ];

    public $page;
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
        return view('livewire.tags.tag-listing');
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
