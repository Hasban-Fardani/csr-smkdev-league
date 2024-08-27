<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;

    protected $table = 'reports';

    protected $guarded = [];

    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    public function partner()
    {
        return $this->belongsTo(Partner::class);
    }
}
