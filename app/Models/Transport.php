<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transport extends Model
{
    use HasFactory;

    public function kind()
    {
      return $this->belongsTo(TransportKind::class);
    }

    protected $fillable = [
        'license_plate',
        'status',
        'driver_id',
        'kind_id',
    ];
}
