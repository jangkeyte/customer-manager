<?php

namespace Modules\Customer\src\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Channel extends Model
{
    use HasFactory;

    protected $table = 'ktgiang_channel';
    //
    protected $fillable = ['id', 'name', 'channel'];

}
