<?php

namespace App\Models;

use App\Models\invoices;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class invoices_details extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_Invoice',
        'invoice_number',
        'product',
        'section',
        'status',
        'value_Status',
        'payment_Date',
        'note',
        'user',

    ];

    public function invoice()
    {
        return $this->belongsTo(invoices::class);
    }
}
