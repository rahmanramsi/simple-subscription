<?php

namespace App\Models;

use GeneaLabs\LaravelModelCaching\Traits\Cachable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    use Cachable;

    protected $fillable = ['website_id', 'title', 'description'];

    public function website()
    {
        return $this->belongsTo(Website::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'post_user');
    }
}
