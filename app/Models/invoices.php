<?php

namespace App\Models;

use App\Models\Product;
use App\Models\Section;
use App\Models\invoices_details;
use App\Models\invoice_attachments;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class invoices extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'invoice_number',
        'invoice_Date',
        'due_date',
        'product',
        'section_id',
        'amount_collection',
        'amount_Commission',
        'discount',
        'value_VAT',
        'rate_VAT',
        'total',
        'status',
        'value_Status',
        'note',
        'payment_Date',


    ];

    protected $dates = [
        'deleted_at',
    ];

    public function section()
    {
        return $this->belongsTo(Section::class);
    }

    public function invoice_attachments()
    {
        return $this->hasMany(invoice_attachments::class);
    }

    public function invoices_details()
    {
        return $this->hasMany(invoices_details::class);
    }


}
