<?php 
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

    class Fournisseurs extends Model{

    use HasFactory;

    protected $fillable = [
        'nom',
        'email',
        'ville',
        'telephone',
    ];


    public function Produit(){
        return $this->HasMany(Produit::class);
    }

    }