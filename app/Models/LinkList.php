<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Relations\HasMany;


class LinkList extends Model
{
    use HasFactory;

    protected $table = 'link_lists';

    protected $fillable = [ 'name' ];


    // relationships
    public function links(): HasMany
    {
        //return $this->belongsToMany(Link::class, 'link_list_links');
        return $this->hasMany(Link::class);
    }
}
