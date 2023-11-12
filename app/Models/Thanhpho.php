<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Thanhpho extends Model
{
    public  $timestaps = false;
    protected $fillable = [
        'ten_tp',
        'type',
    ];
    protected $primaryKey = 'matp';
    protected $table = 'tbl_tinhthanhpho';
    use HasFactory;
}
