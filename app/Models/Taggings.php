<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Taggings extends Model
{
    use HasFactory;

    protected $table = 'taggings';

    protected $fillable = [ 'saved_link_id', 'tag_id' ];
    
}
