<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BulkSlug extends Model
{
    use HasFactory;

    protected $fillable = ['slug','description'];

    public function products() {
        return $this->hasMany(Product::class);
    }
}
