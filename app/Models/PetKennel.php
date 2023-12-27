<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PetKennel extends Model
{
    use HasFactory;
    protected $table = 'petkennels'; // Specify the table name if it's different
    protected $primaryKey = 'id'; // Specify the primary key if it's different
    protected $fillable = [
        'name', 'address', 'local', 'city', 'state', 'zip', 'phone', 'description',
    ];


    
}
