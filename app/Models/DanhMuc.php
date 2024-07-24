<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DanhMuc extends Model
{
    use HasFactory;
    protected $table = 'danh_mucs';
    protected $fillable = [
        'ma_danh_muc',
        'ten_danh_muc',
        'ngay_nhap',
        'trang_thai',
    ];
    public $timestamps = false;
}