<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactMessage extends Model
{
    use HasFactory;

    // Define the columns that can be mass-assigned
    protected $fillable = ['name', 'email', 'message'];
}

