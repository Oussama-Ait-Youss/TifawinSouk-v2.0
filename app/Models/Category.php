<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
        use HasFactory;
    protected $fillable = ['nom','slug'];

    public function Produits(){

        return $this->hasMany(Produit::class);
    }
}
