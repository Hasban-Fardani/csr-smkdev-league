<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ActivityTag extends Model
{
    use HasFactory;

    protected $table = 'activity_tags';

    protected $guarded = [];

    public function activities()
    {
        return $this->belongsToMany(Activity::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }
}
