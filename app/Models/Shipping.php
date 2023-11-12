<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shipping extends Model
{
    protected $table = 'tbl_shipping';
    protected $primaryKey = 'shipping_id';
    public $timestamps = false;
    protected $fillable = [
        'shipping_name',
        'shipping_address',
        'shipping_phone',
        'shipping_email',
        'shipping_notes',
        'shipping_matp',
        'shipping_maqh',
        'shipping_xaid',
        'shipping_method',
    ];

    public function Thanhpho()
    {
        return $this->belongsTo('App\Models\Thanhpho', 'shipping_matp');
    }

    public function Quanhuyen()
    {
        return $this->belongsTo('App\Models\Quanhuyen', 'shipping_maqh');
    }

    public function Xaphuong()
    {
        return $this->belongsTo('App\Models\Xaphuong', 'shipping_xaid');
    }

    use HasFactory;
}
