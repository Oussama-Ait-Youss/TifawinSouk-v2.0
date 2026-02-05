<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Produit extends Model
{
    use HasFactory;

    protected $table = 'produit';
    
    protected $fillable = [
        'reference',
        'nom',
        'prix_achat',
        'prix_vente',
        'stock',
        'category_id',
        'fournisseurs_id'
    ];

    public function fournisseur()
    {
        return $this->belongsTo(Fournisseurs::class, 'fournisseurs_id');
    }
    
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
