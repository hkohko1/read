<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

class reader extends Model
{

    protected $fillable = ['name', 'email', "password"];
    /** @use HasFactory<\Database\Factories\ReaderFactory> */
    use HasFactory, HasApiTokens;
}
