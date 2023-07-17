<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Petgrooming extends Model
{
    use HasFactory;
    protected $fillable = [
    'name',
    'address',
    'local',
    'city',

    'state',
    'zip',
    'lat',
    'lng',
    'phone',
    'description',
    // Add other fillable attributes here
];
}
