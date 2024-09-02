<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $table = 'projects';

    protected $guarded = [];

    protected $casts = [
        'start_date' => 'datetime',
        'end_date' => 'datetime',
        'published_date' => 'date',
        'is_published' => 'boolean',
        'images' => 'array'
    ];

    public function sectorProgram()
    {
        return $this->belongsTo(SectorProgram::class);
    }

    public function subdistrict()
    {
        return $this->belongsTo(Subdistrict::class);
    }

    public function images()
    {
        return $this->hasMany(ProjectImage::class);
    }
}
