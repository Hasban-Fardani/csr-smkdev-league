<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subdistrict extends Model
{
    use HasFactory;

    protected $table = 'subdistricts';

    protected $guarded = [];

    public function project()
    {
        return $this->hasMany(Project::class, 'subdistrict_id', 'id');
    }
}
