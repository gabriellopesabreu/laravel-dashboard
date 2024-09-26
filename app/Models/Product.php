<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['cd_product','name','description','brand_id','category_id','bulk_slug_id','base_value','stock','status'];

    public function category() {
        return $this->belongsTo(Category::class);
    }

    public function brand() {
        return $this->belongsTo(Brand::class);
    }

    public function bulkSlug() {
        return $this->belongsTo(BulkSlug::class);
    }
}
