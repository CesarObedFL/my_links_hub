<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Relations\BelongsTo;

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
    
}
