<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Menu extends Model
{

    use HasFactory;

    protected $fillable = [
        'category_id',
        'name',
        'slug',
        'description',
        'price',
        'cost_price',
        'image',
        'status',
        'stock',
        'is_popular',
        'preparation_time',
        'variants',
    ];

    protected function casts(): array
    {
        return [
            'price' => 'decimal:2',
            'cost_price' => 'decimal:2',
            'stock' => 'integer',
            'is_popular' => 'boolean',
            'preparation_time' => 'integer',
            'variants' => 'array',
        ];
    }

    // Relationships
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }

    // Scopes
    public function scopeAvailable($query)
    {
        return $query->where('status', 'tersedia');
    }

    public function scopePopular($query)
    {
        return $query->where('is_popular', true);
    }

    public function scopeInStock($query)
    {
        return $query->where('stock', '>', 0)->orWhereNull('stock');
    }

    public function scopeByCategory($query, $categoryId)
    {
        return $query->where('category_id', $categoryId);
    }

    // Helper methods
    public function isAvailable()
    {
        return $this->status === 'tersedia' && ($this->stock > 0 || is_null($this->stock));
    }

    public function getFormattedPriceAttribute()
    {
        return 'Rp ' . number_format($this->price, 0, ',', '.');
    }

    public function getProfitMarginAttribute()
    {
        if ($this->cost_price) {
            return $this->price - $this->cost_price;
        }
        return 0;
    }

    // Mutators
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($menu) {
            if (empty($menu->slug)) {
                $menu->slug = Str::slug($menu->name);
            }
        });
    }
}
