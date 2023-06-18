<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FactureGestionnaire extends Model
{
    use HasFactory;

	public function commandegestionnaire()
	{
		return $this->hasOne('App\Models\CommandeGestionnaire');
	}
}
