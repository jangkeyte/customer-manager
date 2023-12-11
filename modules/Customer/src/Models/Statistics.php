<?php

namespace Modules\Customer\src\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Statistics extends Model
{
    use HasFactory;

    protected $table = 'ktgiang_statistics';
    //
    protected $fillable = ['id', 'uid', 'name', 'count'];

}
