<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Instructions extends Model
{
    use HasFactory, Uuids;



    protected $fillable = [
        "activity_name",
        "sub_activity_name",
        "category_id",
        "departure_date",
        "return_date",
        "transportation_id",
        "destination_to_id",
        "destination_from_id",
        "travel_time",
        "budget_account_id",
        "bank_account_id",
        'accept_from',
        "present_in",
        "sub_component",
        "amount_money",
        "briefings",
        "problem",
        "advice",
        "other",
        "description",
        'treasurer_id'
    ];

    protected $table = 'instructions';

    public function employees()
    {
        return $this->hasMany(InstructionsEmployees::class, 'instructions');
    }


    public function account()
    {
        return $this->belongsTo(Account::class, "budget_account_id");
    }

    public function transportation()
    {
        return $this->belongsTo(Transportation::class, "transportation_id");
    }


    public function categories()
    {
        return $this->belongsTo(Category::class, "category_id");
    }

    public function destination_to()
    {
        return $this->belongsTo(Destination::class, "destination_to_id");
    }

    public function destination_from()
    {
        return $this->belongsTo(Destination::class, "destination_from_id");
    }


    public function bank_account()
    {
        return $this->belongsTo(BankAccount::class, "bank_account_id");
    }

    public function treasurer()
    {
        return $this->belongsTo(Employee::class, "treasurer_id");
    }

}
