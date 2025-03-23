<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Categorie extends Model
{
    protected $connection = 'mysql';
    protected $table = 'categories';

    protected $fillable = [
        'nom',
        'description',
        'url',
        'image',
        'categorie_parent'
    ];
}
