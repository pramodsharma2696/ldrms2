<?php

namespace App\Models;

use App\Models\City;
use App\Models\User;
use App\Models\Brand;
use App\Models\State;
use App\Models\Products;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Booking extends Model
{
    use HasFactory;
    protected $fillable = [
        'BookingNumber',
        'UserID',
        'BrandID',
        'StateID',
        'CityID',
        'ProductID',
        'FromDate',
        'ToDate',
        'UsedFor',
        'Quantity',
        'stock_quantity',
        'DeliveryAddress',
        'AddressProof',
        'DateofBooking',
        'TotalCost',
        'Remark',
        'status',
        'RemarkDate',
    ];
    public function user()
    {
        return $this->belongsTo(User::class, 'UserID', 'id');
    }
    public function product()
    {
        return $this->belongsTo(Products::class, 'ProductID', 'id');
    }
    public function brand()
    {
        return $this->belongsTo(Brand::class, 'BrandID', 'id');
    }
    public function state()
    {
        return $this->belongsTo(State::class, 'StateID', 'id');
    }
    public function city()
    {
        return $this->belongsTo(City::class, 'CityID', 'id');
    }
}
