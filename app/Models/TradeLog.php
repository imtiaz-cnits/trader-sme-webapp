<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TradeLog extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'date_of_operation',
        'trading_session',
        'financial_instrument',
        'lot_size',
        'position_type',
        'risk_benefit_metrics',
        'entry_time',
        'exit_time',
        'outcome',
        'gross_profit',
        'commission_details',
        'net_profit',
        'trade_image_link',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
