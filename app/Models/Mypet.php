<?php

// app/Mypet.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mypet extends Model
{  
    use HasFactory;
    protected $fillable = ['name', 'species', 'age', 'userid'];

    // Define the relationship with the pet_photos table
    public function photos()
    {
        return $this->hasMany(PetPhoto::class, 'pet_id');
    }

public function latestPhoto()
    {
        return $this->hasOne(PetPhoto::class, 'pet_id')->latest();
    }

     public function user()
    {
        return $this->belongsTo(User::class, 'userid'); // Specify the foreign key column name
    }
}
