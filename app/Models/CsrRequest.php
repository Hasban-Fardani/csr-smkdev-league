<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CsrRequest extends Model
{
    use HasFactory;

    protected $table = 'csr_requests';

    protected $guarded = [];
}
