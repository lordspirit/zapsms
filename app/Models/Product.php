<?php

namespace App\Models;

use App\Traits\Auditable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use \DateTimeInterface;

class Product extends Model
{
    use SoftDeletes, Auditable, HasFactory;

    public $table = 'products';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'name',
        'description',
        'quantity',
        'units_id',
        'ipaddress',
        'serialnumber',
        'status',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function categories()
    {
        return $this->belongsToMany(ProductCategory::class);
    }

    public function locations()
    {
        return $this->belongsToMany(ProductLocation::class);
    }

    public function tags()
    {
        return $this->belongsToMany(ProductTag::class);
    }

    public function units()
    {
        return $this->belongsTo(QuantityUnit::class, 'units_id');
    }
}
