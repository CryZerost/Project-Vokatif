<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'route',
        'admin_id',
        'image', // Added the 'image' field to the fillable array
    ];

    public function admin()
    {
        return $this->belongsTo(User::class, 'admin_id');
    }

    public function posts()
{
    return $this->hasMany(Post::class);
}

}
