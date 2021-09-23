<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AgraniBankStatement extends Model
{
    use HasFactory;

     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'trans_date',
        'trans_type',
        'rf_br',
        'particular',
        'cheque_no',
        'dr_amount',
        'cr_amount',
        'balance',
        'dr_cr',
        'bank_id',
    ];
}
