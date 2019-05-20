<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    protected $fillable = ['name', 'org_id','currency'];

    public function organ()
    {
        return $this->belongsTo('\App\Organization','org_id');
    }

    public function itm()
    {
        return $this->hasMany('\App\Item', 'invoice_id');
    }
}

