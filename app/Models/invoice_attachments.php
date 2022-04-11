<?php

namespace App\Models;

use App\Models\invoices;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class invoice_attachments extends Model
{
    use HasFactory;

    protected $fillable = [
        'file_name',
        'invoice_number',
        'created_by',
        'invoice_id',
    ];

    public function invoice()
    {
        return $this->belongsTo(invoices::class);
    }
}
