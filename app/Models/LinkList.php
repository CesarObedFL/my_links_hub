<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Relations\HasMany;


class LinkList extends Model
{
    use HasFactory;

    protected $table = 'link_lists';

    protected $fillable = [ 'list_name', 'list_description', 'list_image' ];


    // relationships
    public function links(): HasMany
    {
        return $this->hasMany(Link::class);
    }
}
