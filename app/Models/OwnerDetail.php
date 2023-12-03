<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OwnerDetail extends Model
{
    use HasFactory;


    protected $table = 'ownerdetails'; // Specify the table name

    protected $fillable = [
        'user_id',
        'pet_id',
        'name',
        'fname',
        'lname',
        'email',
        'phone',
        'address',
        'city',
        'state',
        'zip',
        'show',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    }