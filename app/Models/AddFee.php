<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AddFee extends Model
{
    use HasFactory;
    protected $table = 'add_fees';
    
    protected $fillable = [
        'fee_type','fee_title','class','group','year','fee',
    ];
}
