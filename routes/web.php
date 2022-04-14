<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\InvoiceAchiveController;
use App\Http\Controllers\InvoiceAttachmentsController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SectionController;
use App\Http\Controllers\InvoicesController;
use App\Http\Controllers\InvoicesDetailsController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Auth::routes();
//هذا الكود يحتوي على تحديد المسارات التي سيتم تحميلها بواسطة المستخدم الذي يسجل الدخول بشكل صحيح
// Auth::routes(['register' => false]);


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



Route::resource('invoices', InvoicesController::class);

Route::resource('sections', SectionController::class);

Route::resource('products', ProductController::class);

Route::get('/section/{id}',[InvoicesController::class,'getProducts']);

Route::get('/InvoicesDetails/{id}',[InvoicesDetailsController::class,'edit'])->name('InvoicesDetails');

Route::get('/view_file/{invoice_number}/{file_name}',[InvoicesDetailsController::class,'open_file'])->name('view_file');

Route::get('download/{invoice_number}/{file_name}',[InvoicesDetailsController::class,'download_file']);

Route::post('delete_file',[InvoicesDetailsController::class,'destroy'])->name('delete_file');

Route::resource('InvoiceAttachments', InvoiceAttachmentsController::class);

Route::get('/status_show/{id}',[InvoicesController::class,'show'])->name('status_show');

Route::put('/status_Update/{id}', [InvoicesController::class,'Status_Update'])->name('status_Update');

Route::get('/Invoice_Paid', [InvoicesController::class,'Invoice_Paid'])->name('Invoice_Paid');

Route::get('/Invoice_Unpaid', [InvoicesController::class,'Invoice_Unpaid'])->name('Invoice_Unpaid');

Route::get('/Invoice_Partial', [InvoicesController::class,'Invoice_Partial'])->name('Invoice_Partial');

Route::get('/print_invoice/{id}',[InvoicesController::class,'print_invoice'])->name('print_invoice');

Route::resource('Archive', InvoiceAchiveController::class);

Route::get('export_invoices/', [InvoicesController::class, 'export'])->name('export_invoices');



Route::get('/{page}',[AdminController::class, 'index']);
