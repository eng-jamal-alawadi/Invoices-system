<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->increments('id'); // تعريف جدول الفواتير
            $table->string('invoice_number'); // رقم الفاتورة
            $table->date('invoice_Date'); // تاريخ الفاتورة
            $table->date('due_date'); // تاريخ الاستحقاق
            $table->string('product'); // المنتج
            $table->string('section'); // القسم
            $table->string('discount'); // الخصم
            $table->string('rate_vat'); // سعر القيمة المضافة
            $table->decimal('value_vat',  8, 2); // قيمة القيمة المضافة
            $table->decimal('total',  8, 2); // الاجمالي
            $table->string('status', 58); // حالة الفاتورة
            $table->integer('value status'); // حالة الفاتورة
            $table->text('note')->nullable();
            $table->string('user'); // المستخدم
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('invoices');
    }
}
