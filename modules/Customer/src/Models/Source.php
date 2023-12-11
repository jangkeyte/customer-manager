<?php

namespace Modules\Customer\src\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Source extends Model
{
    use HasFactory;

    protected $table = 'ktgiang_source';
    //
    protected $fillable = ['id', 'name', 'source'];

}
