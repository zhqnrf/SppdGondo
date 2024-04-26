<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Destination extends Model
{
    use HasFactory, Uuids;


    protected $fillable = [
        'type_destination_id',
        'places_id',
        'type'
    ];

    protected $table = 'destination';



    public function place()
    {
        return $this->belongsTo(Places::class, "places_id");
    }

    public function type_destination()
    {
        return $this->belongsTo(TypeDestination::class, "type_destination_id");

    }

}
