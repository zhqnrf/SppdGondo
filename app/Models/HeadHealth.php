<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HeadHealth extends Model
{
    use HasFactory, Uuids;


    protected $table = "head_of_the_health_center";

    protected $fillable = [
        'name',
        'nip',
        'rank',
        'group',
        'daily_money',
        'food_money',
        'transport_money',
    ];
}
