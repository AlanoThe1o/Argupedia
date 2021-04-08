<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PositionToKnow extends Model
{
    use HasFactory;
    protected $table = "position_to_knows";
    protected $fillable = ['person','proposition','schemeId','state'];
    public $timestamps = false;
}
