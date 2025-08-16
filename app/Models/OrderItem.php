<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id',
        'menu_id',
        'menu_name',
        'menu_price',
        'quantity',
        'variants',
        'item_total',
        'special_instructions',
    ];

    protected function casts(): array
    {
        return [
            'menu_price' => 'decimal:2',
            'quantity' => 'integer',
            'item_total' => 'decimal:2',
            'variants' => 'array',
        ];
    }

    // Relationships
    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function menu()
    {
        return $this->belongsTo(Menu::class);
    }

    // Helper methods
    public function getFormattedItemTotalAttribute()
    {
        return 'Rp ' . number_format($this->item_total, 0, ',', '.');
    }

    public function calculateItemTotal()
    {
        $this->item_total = $this->menu_price * $this->quantity;
        $this->save();
    }

    // Auto calculate item total
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($orderItem) {
            $orderItem->item_total = $orderItem->menu_price * $orderItem->quantity;
        });

        static::updating(function ($orderItem) {
            $orderItem->item_total = $orderItem->menu_price * $orderItem->quantity;
        });
    }
}
