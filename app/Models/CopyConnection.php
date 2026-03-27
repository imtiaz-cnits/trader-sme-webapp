<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CopyConnection extends Model
{
    protected $guarded = [];

    public function master()
    {
        return $this->belongsTo(MasterTrader::class, 'master_trader_id');
    }
}
