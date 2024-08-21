<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    use HasFactory;

    protected $table = 'activities';

    protected $guarded = [];

    protected $casts = [
        'tags' => 'array',
    ];

    public function admin()
    {
        return $this->belongsTo(USer::class, 'admin_id');
    }


    /**
     * Get the tags associated with the activity.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'activity_tags', 'activity_id', 'tag_id');
    }
}
