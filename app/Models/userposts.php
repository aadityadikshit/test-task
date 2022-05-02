<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class userposts extends Model
{
    use HasFactory;
    protected $table = 'user_posts';
    protected $fillable = ['user_id', 'post_title', 'post_body'];
}
