<?php

namespace Modules\Customer\src\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'ktgiang_product';
    //
    protected $fillable = ['id', 'uid', 'name', 'image', 'price'];

}
