<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FactureClient extends Model
{
    use HasFactory;

	public function commandeclient()
	{
		return $this->hasOne('App\Models\CommandeClient');
	}
}
