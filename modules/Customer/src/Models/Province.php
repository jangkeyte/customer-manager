<?php

namespace Modules\Customer\src\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    use HasFactory;

    protected $table = 'ktgiang_province';
    //
    protected $fillable = ['id', 'name'];

    public function customers()
    {
        return $this->hasMany('App\Models\Customer', 'dia_chi', 'id');
    }

}
