<?php

namespace App\Models;

use App\Traits\Auditable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use \DateTimeInterface;

class ProductLocation extends Model
{
    use SoftDeletes, Auditable, HasFactory;

    public $table = 'product_locations';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'name',
        'description',
        'location_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function locationProductLocations()
    {
        return $this->hasMany(ProductLocation::class, 'location_id', 'id');
    }

    public function location()
    {
        return $this->belongsTo(ProductLocation::class, 'location_id');
    }
}
