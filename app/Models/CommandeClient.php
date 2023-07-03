<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommandeClient extends Model
{
    use HasFactory;

	public function panier()
	{
		return $this->belongsTo('App\Models\Panier');
	}

	public function user()
	{
		return $this->belongsTo('App\Models\User');
	}
}
