<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InstructionsEmployees extends Model
{
    use HasFactory, Uuids;


    protected $table = 'instructions_employees_cadres';

    protected $fillable = [
        "users",
        "instructions"
    ];


    public function instructions()
    {
        return $this->belongsTo(Instructions::class, "instructions");
    }



    public function employee()
    {
        return $this->belongsTo(Employee::class, "users");
    }

}
