<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recit extends Model
{
    use HasFactory;

    protected $fillable = ['Title', 'Description', 'Destination', 'Conseil', 'user_id'];
}
