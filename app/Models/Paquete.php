<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model;

class Paquete extends Model
{
    use HasFactory;
    protected $connection = 'mongodb';
    protected $collection = 'paquetes_collection';
}
