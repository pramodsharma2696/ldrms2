<?php

namespace App\Models;

use App\Models\Brand;
use App\Models\Booking;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Products extends Model
{
    use HasFactory;
    protected $fillable = [
        'Type',
        'BrandID',
        'ProductName',
        'Processor',
        'Screen',
        'RAM',
        'Storage',
        'Charges',
        'RentalPrice',
        'ProductModel',
        'ProductDescription',
        // 'stock_quantity',
        'Image',
        'Image1',
        'Image2',
        'Image3',
        'Image4',
        'Image5',
    ];
    public function brand()
    {
        return $this->belongsTo(Brand::class, 'BrandID', 'id');
    }
    public function bookings()
    {
        return $this->hasMany(Booking::class, 'ProductID', 'id');
    }
}
