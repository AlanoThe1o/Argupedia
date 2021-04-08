<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class ExpertOpinion extends Model
{
    use HasFactory;
    protected $table = "expert_opinions";
    protected $fillable = ['domain','expert','proposition','schemeId','state'];
    public $timestamps = false;
}
