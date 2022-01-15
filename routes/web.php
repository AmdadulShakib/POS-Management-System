<?php

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


    

Route::group(['middleware'=>'auth.check'],function(){


    Route::get('/', 'PagesController@index')->name('index');

    //Admin Profile Route----

    Route::prefix('profiles')->group(function(){
        Route::get('/view','ProfileController@view')->name('profiles.view');
        Route::get('/edit','ProfileController@edit')->name('profiles.edit');
        Route::post('/store','ProfileController@update')->name('profiles.update');
        Route::get('/passeord/view','ProfileController@passwordView')->name('profiles.password.view');
        Route::post('/passeord/update','ProfileController@passwordUpdate')->name('profiles.password.update');
    });

    //Supplier route-----

    Route::prefix('suppliers')->group(function(){
        Route::get('/view','SupplierController@view')->name('suppliers.view');
        Route::get('/add','SupplierController@add')->name('suppliers.add');
        Route::post('/store','SupplierController@store')->name('suppliers.store');
        Route::get('/edit/{id}','SupplierController@edit')->name('suppliers.edit');
        Route::post('/update/{id}','SupplierController@update')->name('suppliers.update');
        Route::match(['get','post'],'/delete/{id}','SupplierController@delete')->name('suppliers.delete');
    });

    //Category Route----

    Route::prefix('categories')->group(function(){
        Route::get('/view','CategoryController@view')->name('categories.view');
        Route::get('/add','CategoryController@add')->name('categories.add');
        Route::post('/store','CategoryController@store')->name('categories.store');
        Route::get('/edit/{id}','CategoryController@edit')->name('categories.edit');
        Route::post('/update/{id}','CategoryController@update')->name('categories.update');
        Route::match(['get','post'],'/delete/{id}','CategoryController@delete')->name('categories.delete');
    });


    //Products Route----

    Route::prefix('products')->group(function(){
        Route::get('/view','ProductController@view')->name('products.view');
        Route::get('/add','ProductController@add')->name('products.add');
        Route::post('/store','ProductController@store')->name('products.store');
        Route::get('/edit/{id}','ProductController@edit')->name('products.edit');
        Route::post('/update/{id}','ProductController@update')->name('products.update');
        Route::match(['get','post'],'/delete/{id}','ProductController@delete')->name('products.delete');
    });

    //Purchase Route----

    Route::prefix('purchases')->group(function(){
        Route::get('/view','PurchaseController@view')->name('purchases.view');
        Route::get('/add','PurchaseController@add')->name('purchases.add');
        Route::post('/store','PurchaseController@store')->name('purchases.store');
        Route::get('/approval','PurchaseController@purchaseApproval')->name('purchases.approval.list');
        Route::get('/approve/{id}','PurchaseController@approve')->name('purchases.approve');
        Route::match(['get','post'],'/delete/{id}','PurchaseController@delete')->name('purchases.delete');
    });

    //Invoice Route----

    Route::prefix('invoices')->group(function(){
        Route::get('/view','InvoiceController@view')->name('invoices.view');
        Route::get('/add','InvoiceController@add')->name('invoices.add');
        Route::post('/store','InvoiceController@store')->name('invoices.store');
        Route::get('/pending','InvoiceController@invoicePending')->name('invoices.pending.list');
        Route::get('/approve/{id}','InvoiceController@approve')->name('invoices.approve');
        Route::get('/delete/{id}','InvoiceController@delete')->name('invoices.delete');
        Route::post('/approve/store/{id}','InvoiceController@aprovalStore')->name('approval.store');
        // pdf---
        Route::get('/print/list','InvoiceController@printInvoiceList')->name('invoice.print.list');
        Route::get('/print/{id}','InvoiceController@printInvoice')->name('invoice.print');
        Route::get('/daily/report','InvoiceController@dailyReport')->name('daily.invoice.report');
        Route::get('/daily/report/pdf','InvoiceController@dailyReportPdf')->name('invoice.daily.report.pdf');
    });

    // Stock mannage-----

    Route::prefix('stocks')->group(function(){
        Route::get('/report','StockController@report')->name('stocks.report');
        Route::get('/product/pdf','StockController@productPdf')->name('products.pdf');
        Route::get('/product/supplier/wise','StockController@supplierProductWise')->name('supplier.product.wise');
        Route::get('/supplier/wise/pdf','StockController@supplierWisePdf')->name('supplier.wise.pdf');
        Route::get('/product/wise/pdf','StockController@productWisePdf')->name('product.wise.pdf');
    });

    //customer route-----

    Route::prefix('customers')->group(function(){
        Route::get('/view','CustomerController@view')->name('customers.view');
        Route::get('/add','CustomerController@add')->name('customers.add');
        Route::post('/store','CustomerController@store')->name('customers.store');
        Route::get('/edit/{id}','CustomerController@edit')->name('customers.edit');
        Route::post('/update/{id}','CustomerController@update')->name('customers.update');
        Route::match(['get','post'],'/delete/{id}','CustomerController@delete')->name('customers.delete');
        Route::get('/crdit/customer', 'CustomerController@crditCustomer')->name('crdit.customers');
        Route::get('/crdit/customer/pdf', 'CustomerController@crditCustomerPdf')->name('crdit.customers.pdf');
        Route::get('/invoice/edit/{invoice_id}', 'CustomerController@editInvoice')->name('customers.edit.invoice');
        Route::get('/invoice/details/pdf/{invoice_id}', 'CustomerController@pdfInvoice')->name('invoice.details.pdf');
        Route::post('/invoice/update/{invoice_id}', 'CustomerController@updateInvoice')->name('customers.update.invoice');
        Route::get('/paid/customer', 'CustomerController@paidCustomer')->name('paid.customers');
        Route::get('/paid/customer/pdf', 'CustomerController@paidCustomerPdf')->name('paid.customers.pdf');
    });
    //Logo Route----

    Route::prefix('logos')->group(function(){
        Route::get('/view','LogoController@view')->name('logos.view');
        Route::get('/edit/{id}','LogoController@edit')->name('logos.edit');
        Route::post('/update/{id}','LogoController@update')->name('logos.update');
    });
    //Favicon Route----

    Route::prefix('favicons')->group(function(){
        Route::get('/view','FavoiconController@view')->name('favicons.view');
        Route::get('/edit/{id}','FavoiconController@edit')->name('favicons.edit');
        Route::post('/update/{id}','FavoiconController@update')->name('favicons.update');
    });
    //Setting Route----

    Route::prefix('settings')->group(function(){
        Route::get('/view','SettingController@view')->name('settings.view');
        Route::get('/edit/{id}','SettingController@edit')->name('settings.edit');
        Route::post('/update/{id}','SettingController@update')->name('settings.update');
    });

    //Default Route----

    Route::get('/get_category', 'DefaultController@getCategory')->name('get_category');
    Route::get('/get_product', 'DefaultController@getProduct')->name('get_product');
    Route::get('/get_stock', 'DefaultController@getStock')->name('check_product_stock');

});
Auth::routes();

