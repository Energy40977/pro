<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CurrencyData extends Model
{
   protected $table = 'currency';
   protected $fillable = ['USD', 'TRY', 'EUR', 'GBR', 'RUB'];
}
