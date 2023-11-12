<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quanhuyen extends Model
{
    public  $timestaps = false;
    protected $fillable = [
        'ten_quanhuyen',
        'type',
        'matp',
    ];
    protected $primaryKey = 'maqh';
    protected $table = 'tbl_quanhuyen';
    use HasFactory;
}
