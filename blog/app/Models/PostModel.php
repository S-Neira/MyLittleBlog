<?php

namespace App\Models;

use Database\Seeders\PostSeeder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class PostModel extends Model
{
    use HasFactory, Notifiable;

    protected $table = 'posts';
    protected $fillable = ['title', 'content', 'slug', 'is_published', 'user_id', 'category_id'];

    //definir las relaciones

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
