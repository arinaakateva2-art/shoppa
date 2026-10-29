<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Product extends Model
{
    use HasFactory;
    use Sluggable;

    protected $fillable = [
        'title', 'slug', 'content', 'price', 'old_price', 'hit', 'sale', 'img',
        'category_id', 'status_id', 'qty'
    ];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    public function getImage()
    {
        if (!$this->img) {
            return asset('no-image.png');
        }

        if (str_starts_with($this->img, 'images/')) {
            return asset('storage/' . $this->img);
        }

        return asset('img/' . $this->img);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function status()
    {
        return $this->belongsTo(Status::class);
    }
}