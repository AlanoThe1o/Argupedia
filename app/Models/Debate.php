<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Debate extends Model
{
    use HasFactory;
    protected $fillable = ['debate_name','created_at','userId'];
    public $timestamps = false;
}
