<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Panier extends Model
{
    use HasFactory;
	protected $fillable = [
        'user_id',
        'produit_id',
        'quantite',
		'etatC',
		'etatG'
    ];
    public $timestamps = false;
	public function user()
	{
		return $this->belongsTo('App\Models\User');
	}
	public function produit()
	{
		return $this->belongsTo('App\Models\Produit');
	}
}
