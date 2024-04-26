<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BankAccount extends Model
{
    use HasFactory, Uuids;

    protected $fillable = [
        'account_number'
    ];
    protected $table = 'bank_account';
}
