<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PetPhoto extends Model
{
    use HasFactory;

  protected $fillable = ['pet_id', 'photo_path'];

    // Define the relationship with the mypets table
    public function mypet()
    {
        return $this->belongsTo(Mypet::class, 'pet_id');
    }
    
}
