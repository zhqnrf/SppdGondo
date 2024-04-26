<?php

namespace App\Models;

// use App\Traits\Uuids;
use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory, Uuids;

    protected $fillable = [
        'name',
        'nip',
        'rank',
        'group',
        'position',
        'daily_money',
        'food_money',
        'transport_money',
        'role'
    ];

    protected $table = 'employee';


    public function instructions()
    {
        return $this->hasMany(InstructionsEmployees::class , 'users');
    }

}
