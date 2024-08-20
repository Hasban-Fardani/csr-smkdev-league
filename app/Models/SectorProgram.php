<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SectorProgram extends Model
{
    use HasFactory;

    protected $table = 'sector_programs';

    protected $guarded = [];

    public function sector()
    {
        return $this->belongsTo(Sector::class);
    }
}
