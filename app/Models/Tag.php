<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Tag extends Model
{
    use HasFactory;

    protected $table = 'tags';

    public $timestamps = false;

    protected $fillable = [ 'title' ];

    // relationships
    public function links(): BelongsToMany
    {
        return $this->belongsToMany(Link::class, 'taggings', 'tag_id', 'saved_link_id');
    }
}
