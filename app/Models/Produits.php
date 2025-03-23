<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Produits extends Model
{
    protected $connection = 'mysql';
    protected $table = 'produits';

    protected $fillable = [
        'nom',
        'description',
        'prix',
        'categorie_id',
        'image',
        'mise_avant',
        "data_produit"
    ];

    public function categorie() {
        return $this->belongsTo(Categorie::class, 'categorie_id');
    }
}
