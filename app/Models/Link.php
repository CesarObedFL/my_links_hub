<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Link extends Model
{
    use HasFactory;

    protected $table = 'saved_links';

    protected $fillable = [ 'url', 'title', 'platform', 'thumbnail', 'link_list_id' ];


    // relationships
    public function link_list(): BelongsTo
    {
        return $this->belongsTo(LinkList::class);
    }

    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(Tag::class, 'taggings', 'saved_link_id', 'tag_id');
    }
    
}
