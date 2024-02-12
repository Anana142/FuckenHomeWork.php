<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use const Symfony\Component\Routing\Requirement\POSITIVE_INT;

class Tag extends Model
{
    use HasFactory;

    public function posts(){
        return $this->belongsToMany(Post::class, 'post_tag', 'tag_id', 'post_id');
    }
}
