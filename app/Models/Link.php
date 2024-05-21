<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Link extends Model
{
    use HasFactory;

    protected $table = 'saved_links';

    protected $fillable = [ 'url', 'title', 'platform', 'thumbnail' ];
    
}
