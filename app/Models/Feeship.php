<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feeship extends Model
{
    protected $table = 'tbl_feeship';
    protected $primaryKey = 'fee_id';
    public $timestamps = false;
    protected $fillable = [
        'fee_matp',
        'fee_maqh',
        'fee_xaid',
        'fee_feeship',
    ];

    public function Thanhpho()
    {
        return $this->belongsTo('App\Models\Thanhpho', 'fee_matp');
    }

    public function Quanhuyen()
    {
        return $this->belongsTo('App\Models\Quanhuyen', 'fee_maqh');
    }

    public function Xaphuong()
    {
        return $this->belongsTo('App\Models\Xaphuong', 'fee_xaid');
    }
    use HasFactory;
}
