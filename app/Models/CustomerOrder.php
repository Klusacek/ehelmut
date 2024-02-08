<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerOrder extends Model
{
    public $primarykey = 'orderNum';
    protected $fillable = ['orderNum', 'oznaceni', 'idKontakt','prenosDPH','typ','druh','user','provozovna','developer'];
    use HasFactory;

   
}

