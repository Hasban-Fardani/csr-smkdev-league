<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ActivityTag extends Model
{
    use HasFactory;

    protected $table = 'activity_tags';

    protected $guarded = [];
}
