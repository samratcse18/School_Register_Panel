<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admission extends Model
{
    use HasFactory;
    protected $table = 'admissions';
    
    protected $fillable = [
        'class','group','year','fname','lname','roll','father','mother','phone','address','image',
    ];
    
    protected $hidden = [
        'remember_token',
    ];
}
