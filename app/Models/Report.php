<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;

    protected $table = 'reports';

    protected $guarded = [];

    public $casts = [
        'files' => 'array',
    ];

    public $timestamps = true;

    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    public function partner()
    {
        return $this->belongsTo(Partner::class);
    }

    public function sectorProgram()
    {
        return $this->belongsTo(SectorProgram::class);
    }

    public function sector()
    {
        return $this->belongsTo(Sector::class);
    }
}
