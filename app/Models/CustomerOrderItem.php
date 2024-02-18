<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerOrderItem extends Model
{
    use HasFactory;
    protected $fillable = ['orderNum','kod','popis','kus','dodavatelKod','barvaDvere','barvaKorpus','katalog','rubrika','modelName','nakupKd','prodej','prodejDph'];	

}
