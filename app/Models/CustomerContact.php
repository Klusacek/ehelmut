<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerContact extends Model
{
    protected $fillable = ['id','firma','ico','dic','jmeno','prijmeni','tel','email','ulice','mesto','psc'];
    use HasFactory;
}
