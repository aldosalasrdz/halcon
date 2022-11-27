<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InvoiceRow extends Model
{
    use HasFactory;

    public function material()
    {
        return $this->belongsTo(Material::class);
    }

    public function invoice()
    {
        return $this->hasMany(Invoice::class);
    }
}
