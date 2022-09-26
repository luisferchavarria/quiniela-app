<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stadium extends Model
{
    use HasFactory;

    public $table = 'stadiums';

    protected $fillable = [
        'name', 'detail', 'latitude', 'longitude'
    ];
}
