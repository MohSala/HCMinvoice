<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Organization extends Model
{
    protected $table = 'organizations';
    protected $fillable = ['name', 'address', 'email','phone' , 'managed_by'];

    public function invoice()
    {
        return $this->hasMany('\App\Invoice','org_id');
    }
}
