<?php

namespace App\Models;

use GeneaLabs\LaravelModelCaching\Traits\Cachable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Website extends Model
{
    use HasFactory;
    use Cachable;

    protected $fillable = ['name', 'url'];

    public function users()
    {
        return $this->belongsToMany(User::class, 'subscriptions', 'website_id', 'user_id');
    }

    public function posts()
    {
        return $this->hasMany(Post::class);
    }
}
