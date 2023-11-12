<?php

namespace App\Models;

use Facade\FlareClient\Time\Time;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public  $timestamps = false;
    protected $table = 'tbl_product';
    protected $primaryKey = 'product_id';
    protected $fillable = [
        'category_id',
        'brand_id',
        'meta_keywords',
        'product_name',
        'slug',
        'product_desc',
        'product_content',
        'product_price',
        'product_image',
        'product_status',
        'product_quantity',
        'product_sold',
    ];
    use HasFactory;
}
