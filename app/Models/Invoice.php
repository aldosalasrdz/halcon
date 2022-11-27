<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;

    public function invoiceStatus()
    {
        return $this->belongsTo(InvoiceStatus::class);
    }

    public function invoiceRow()
    {
        return $this->hasMany(InvoiceRow::class);
    }

    public function file()
    {
        return $this->hasMany(File::class);
    }

    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}
