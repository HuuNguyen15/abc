<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Xaphuong extends Model
{
    public  $timestaps = false;
    protected $fillable = [
        'ten_xaphuong',
        'type',
        'maqh',
    ];
    protected $primaryKey = 'xaid';
    protected $table = 'tbl_xaphuongthitran';
    use HasFactory;
}
