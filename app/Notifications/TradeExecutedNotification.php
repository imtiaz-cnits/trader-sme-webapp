<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;

class TradeExecutedNotification extends Notification
{
    use Queueable;

    public $tradeData;

    // 1. Receive the trade data when we create a new notification instance. This data will be passed from the ProcessTradeWebhook Job after processing the webhook payload.
    public function __construct($tradeData)
    {
        $this->tradeData = $tradeData;
    }

    // 2. Save trade notifications in the database so users can see them in the UI. We will use Laravel's built-in notification system with the "database" channel.
    public function via(object $notifiable): array
    {
        return ['database'];
    }

    // 4. Structure the data that will be saved in the notifications table. This data can include the trade action (open/close), symbol, type, lot size, price, profit/loss, and a user-friendly message.
    public function toArray(object $notifiable): array
    {
        $action = $this->tradeData['action'] ?? 'open';
        $type = $this->tradeData['type'] ?? 'BUY';
        $symbol = $this->tradeData['symbol'] ?? 'UNKNOWN';
        $profit = $this->tradeData['net_profit'] ?? 0;

        // Craft a user-friendly message based on the trade action and profit/loss
        if ($action === 'open') {
            $message = "New Trade Opened: {$symbol} {$type}";
        } else {
            $profitSign = $profit >= 0 ? '+' : '';
            $message = "Trade Closed: {$symbol} ({$profitSign}\${$profit})";
        }
        return [
            'action' => $action,
            'symbol' => $symbol,
            'type' => $type,
            'lot' => $this->tradeData['lot'] ?? 0,
            'price' => $this->tradeData['price'] ?? 0,
            'net_profit' => $profit,
            'message' => $message,
        ];
    }
}
