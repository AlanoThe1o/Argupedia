<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attack extends Model
{
    use HasFactory;
    protected $fillable = ['argumentA','argumentB'];
    public $timestamps = false;
}
