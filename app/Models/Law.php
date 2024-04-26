<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Law extends Model
{
    use HasFactory, Uuids;

    protected $fillable = [
        'law_value'
    ];

    protected $table = 'law';
}
