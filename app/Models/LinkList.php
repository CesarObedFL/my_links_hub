<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LinkList extends Model
{
    use HasFactory;

    protected $table = 'link_lists';

    protected $fillable = [ 'name' ];


    public function links() 
    {
        return $this->belongsToMany(Link::class, 'link_list_links');
    }
}
