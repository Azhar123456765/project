<?php

use App\Http\Controllers\invoicecontroller;
use App\Http\Controllers\maincontroller;
use App\Http\Controllers\pdfController;
use App\Http\Controllers\product;
use App\Http\Controllers\search;


use Illuminate\Support\Facades\Route;

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


// ADMIN PANEL

Route::get('/', [maincontroller::class, 'viewhome']);
Route::get('/customize', [maincontroller::class, 'viewcustomize']);




Route::get('/add-user', [maincontroller::class, 'view_add_user']);
Route::get('/users', [maincontroller::class, 'viewusers']);
Route::get('/user-rights{id}', [maincontroller::class, 'user_rights']);
Route::get('/edit_user{id}', [maincontroller::class, 'view_edit_user']);



Route::get('/warehouse', [maincontroller::class, 'warehouse']);
Route::post('/add_warehouse', [maincontroller::class, 'add_warehouse']);
Route::post('/edit_warehouse{id}', [maincontroller::class, 'edit_warehouse']);
Route::get('/warehouse_delete{id}', [maincontroller::class, 'warehouse_delete']);


Route::get('/zone', [maincontroller::class, 'zone']);
Route::post('/add_zone', [maincontroller::class, 'add_zone']);
Route::post('/edit_zone{id}', [maincontroller::class, 'edit_zone']);
Route::get('/zone_delete{id}', [maincontroller::class, 'zone_delete']);



Route::get('/sales_officer', [maincontroller::class, 'sales_officer']);
Route::post('/add_sales_officer', [maincontroller::class, 'add_sales_officer']);
Route::post('/edit_sales_officer{id}', [maincontroller::class, 'edit_sales_officer']);
Route::get('/sales_officer_delete{id}', [maincontroller::class, 'sales_officer_delete']);
// Route::get('/del_user{id}', [maincontroller::class, 'user_delete']);


Route::get('/edit_buyer{id}', [maincontroller::class, 'view_edit_buyer']);
Route::get('/buyers', [maincontroller::class, 'view_buyers']);
Route::get('/add-buyer', [maincontroller::class, 'view_add_buyer']);
Route::get('/view-buyer{id}', [maincontroller::class, 'view_single_buyer']);
Route::get('/view_single_buyer{id}', [maincontroller::class, 'view_single_buyer']);



Route::get('/edit_seller{id}', [maincontroller::class, 'view_edit_seller']);
Route::get('/sellers', [maincontroller::class, 'view_sellers']);
Route::get('/add-seller', [maincontroller::class, 'view_add_seller']);
Route::get('/view-seller{id}', [maincontroller::class, 'view_single_seller']);
Route::get('/view_single_seller{id}', [maincontroller::class, 'view_single_seller']);




Route::get('/purchase_invoice', [maincontroller::class, 'purchase_invoice']);


// ADMIN PANEL   ---   POST METHODS


Route::post('/edit_user_form', [maincontroller::class, 'edit_user_form']);
Route::post('/add_user_form', [maincontroller::class, 'add_user_form']);
Route::post('/user_right_form', [maincontroller::class, 'user_right_form']);



Route::post('/add_buyer_form', [maincontroller::class, 'add_buyer_form']);
Route::post('/edit_buyer_form', [maincontroller::class, 'edit_buyer_form']);



Route::post('/add_seller_form', [maincontroller::class, 'add_seller_form']);
Route::post('/edit_seller_form', [maincontroller::class, 'edit_seller_form']);









// POST METHODS




Route::post('/customize-form', [maincontroller::class, 'customize_form']);
Route::post('/login-check', [maincontroller::class, 'logincheck']);


// GENERAL


Route::get('/logout', [maincontroller::class, 'logout']);
Route::get('/get_week_data', [maincontroller::class, 'get_week_data']);




//        PDF




Route::get('/pdf_field={view}', [pdfController::class, 'pdf']);

Route::get('/pdf_limit{view}', [pdfController::class, 'pdf_limit']);



Route::get('/pdf', [pdfController::class, 'test_pdf']);


Route::get('/sale_invoice_pdf_{id}', [pdfController::class, 'sale_invoice_pdf']);


// Route::post('/pdf_all_{field}', [pdfController::class, 'pdf_check']);

// Route::get('/pdf_all', [pdfController::class, 'pdf_all']);


// Route::get('/pdf_{field}_{limit}', [pdfController::class, 'pdf_limit']);

// SEARCH

Route::get('/buyer_search', [search::class, 'buyer_search']);
Route::get('/seller_search', [search::class, 'seller_search']);







// INVOICES


Route::get('/sale-invoice', [invoicecontroller::class, 'view_sale_invoice']);

Route::get('/p_chick_invoice', [invoicecontroller::class, 'view_p_chick_invoice']);
Route::post('/p_chick_invoice_form', [invoicecontroller::class, 'p_chick_invoice_form']);


Route::get('/s_med_invoice', [invoicecontroller::class, 'view_s_med_invoice']);

Route::get('/s_med_invoice_d_id={id}', [invoicecontroller::class, 's_med_invoice_d']);

Route::post('/s_med_invoice_form', [invoicecontroller::class, 's_med_invoice_form']);

Route::get('/es_med_invoice_id={id}', [invoicecontroller::class, 'view_es_med_invoice']);
Route::post('/es_med_invoice_form_id={id}', [invoicecontroller::class, 'es_med_invoice_form']);


Route::get('/p_med_invoice', [invoicecontroller::class, 'view_p_med_invoice']);

Route::get('/p_med_invoice_d_id={id}', [invoicecontroller::class, 'p_med_invoice_d']);

Route::post('/p_med_invoice_form', [invoicecontroller::class, 'p_med_invoice_form']);

Route::get('/ep_med_invoice_id={id}', [invoicecontroller::class, 'view_ep_med_invoice']);
Route::post('/ep_med_invoice_form_id={id}', [invoicecontroller::class, 'ep_med_invoice_form']);




Route::get('/s_chick_invoice', [invoicecontroller::class, 'view_s_chick_invoice']);
Route::post('/s_chick_invoice_form', [invoicecontroller::class, 's_chick_invoice_form']);


// PRODUCT

Route::get('/product_category', [product::class, 'product_category']);
Route::post('/add_product_category', [product::class, 'add_product_category']);
Route::post('/edit_product_category{id}', [product::class, 'edit_product_category']);
Route::get('/product_category_delete{id}', [product::class, 'product_category_delete']);




Route::get('/product_sub_category', [product::class, 'product_sub_category']);
Route::post('/add_product_sub_category', [product::class, 'add_product_sub_category']);
Route::post('/edit_product_sub_category{id}', [product::class, 'edit_product_sub_category']);
Route::get('/product_sub_category_delete{id}', [product::class, 'product_sub_category_delete']);




Route::get('/product_company', [product::class, 'product_company']);
Route::post('/add_product_company', [product::class, 'add_product_company']);
Route::post('/edit_product_company{id}', [product::class, 'edit_product_company']);
Route::get('/product_company_delete{id}', [product::class, 'product_company_delete']);



Route::get('/product_type', [product::class, 'product_type']);
Route::post('/add_product_type', [product::class, 'add_product_type']);
Route::post('/edit_product_type{id}', [product::class, 'edit_product_type']);
Route::get('/product_type_delete{id}', [product::class, 'product_type_delete']);



Route::get('/products', [product::class, 'view_product']);
Route::post('/add_product_form', [product::class, 'add_product']);
Route::get('/product_delete{id}', [product::class, 'product_delete']);
Route::post('/edit_product{id}', [product::class, 'edit_product']);





// CHART OF ACCOUNT


Route::get('/account_account={id}', [maincontroller::class, 'account']);
Route::post('/add_account', [maincontroller::class, 'add_account']);
Route::post('/edit_account{id}', [maincontroller::class, 'edit_account']);
Route::get('/account_delete{id}', [maincontroller::class, 'account_delete']);