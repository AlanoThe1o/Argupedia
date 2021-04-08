<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class PopularOpinion extends Model
{
    use HasFactory;
    protected $table = "popular_opinions";
    protected $fillable = ['proposition','schemeId'];
    public $timestamps = false;
}
