<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produit extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'libelle',
        'description',
        'image',
        'categorie',
        'stock',
        'prixUnitaire',
    ];
    
    public $timestamps = false;
    protected function categorie(): Attribute
    {
        return new Attribute(
            get: fn ($value) =>  ['ordinateurs' => "ordinateurs", 'cameras' => "cameras", 'smartphones' =>  "smartphones", 'accessoires' => "accessoires"][$value],
        );
    }
    public static function categories()
    {
        return ["ordinateurs", "cameras", "smartphones",  "accessoires"];
    }
}
