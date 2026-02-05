<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Produit extends Model{

    use HasFactory;

     protected $fillable = [
        'reference',
        'nom',
        'prix_achat',
        'prix_vente',
        'stock',
        'category_id',
        'fournisseur_id'
    ];

    public function Fournisseurs(){
        return $this->Belongto(Fournisseurs::class);
    }
    public function category(){
        return $this->belongTo(Produit::class);
    }

}
