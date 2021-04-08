<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DebateArgument extends Model
{
    use HasFactory;
    protected $fillable = ['argumentId','debateId'];
    public $timestamps = false;
}
