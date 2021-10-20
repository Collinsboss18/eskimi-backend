<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// $advert = Advert::factory()->count(3)->create();

class Advert extends Model
{
    use HasFactory;

    protected $fillable = [
        "name", "total_budget", "daily_budget", "image"
    ];
}
