<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = ['imageable_type', 'imageable_id', 'name'];

    public function imageable()
    {
        return $this->morphTo('imageable', 'imageable_type', 'imageable_id');
        // return $this->morphToMany(Product::class, 'image');
    }
}
