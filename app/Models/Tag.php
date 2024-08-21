<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

    protected $table = 'tags';

    protected $guarded = [];

    public function activities()
    {
        return $this->belongsToMany(Activity::class, 'activity_tag', 'tag_id', 'activity_id');
    }
}
