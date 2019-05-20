<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $fillable = [
        'name','quantity','unitcost','discount','total','vattotal','subtotal','grandtotal','currency','invoice_id'];

    public function inv()
    {
        return $this->belongsTo('\App\Invoice', 'invoice_id');
    }
    }
