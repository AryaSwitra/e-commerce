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

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/', function () {
//     return view('index');
// });

// Route::get('/portofolio', function () {
//     return view('portofolio');
// });

Route::get('/', 'PagesController@index');

Route::get('/about', 'PagesController@about');
Route::get('/contact', 'PagesController@contact');
// Route::post('/cari', "PagesController@cari");
Route::get('/batu', 'PagesController@batu');
Route::get('/pasir', 'PagesController@pasir');
// Route::get('/admin/index', 'AdminController@index');
Route::get('/register_pelanggan', 'PagesController@register');
Route::post('/postregister', 'MemberController@create');
Route::get('/testimoni', 'PagesController@testimoni');
Route::post('/posttestimoni', 'MemberController@posttestimoni');
Route::get('/{id}', 'PagesController@detail_produk')->where('id','[0-9]+');
Route::get('/data','PagesController@data');
Route::get('/kategori/{nama}' ,'PagesController@kategori');
Route::get('/katalog','PagesController@katalog');



// Route::post('/login', 'Auth/LoginController@login');


Route::get('/login2', 'PagesController@login2');


// Route::get('/home', 'HomeController@index');
Route::group(['middleware' => ['auth', 'checkRole:superadmin']], function(){
Route::get('/superadmin/data_admin', 'SuperadminController@data_admin');
Route::get('/superadmin/produk', 'SuperadminController@produk');
Route::get('/superadmin/addProduk', 'SuperadminController@tambah_produk');
Route::post('/superadmin/tambahProduk', 'SuperadminController@createProduk');
Route::get('/superadmin/register', 'SuperadminController@register_superadmin');
Route::post('/postregistersuperadmin', 'SuperadminController@create_admin');
Route::get('/superadmin', 'PagesController@indexsuperadmin');
Route::get('/superadmin/kategori','SuperadminController@kategori');
Route::get('/superadmin/addKategori', 'SuperadminController@tambah_kategori');
Route::post('/postkategori', 'SuperadminController@createKategori');
Route::get('/superadmin/data_pelanggan', 'SuperadminController@data_pelanggan');
Route::get('/superadmin/testimonial', 'SuperadminController@testimonial');
Route::get('/superadmin/testimonial_baru', 'SuperadminController@testimonial_baru');
Route::get('/superadmin/acc_testimonial/{id}', 'SuperadminController@acc_testimonial');
Route::get('/superadmin/slider', 'SuperadminController@slider');
Route::get('/superadmin/addSlider', 'SuperadminController@form_slider');
Route::post('/postslider', 'SuperadminController@postslider');
Route::get('/superadmin/active_slider/{id}', 'SuperadminController@active_slider');
Route::get('/superadmin/unactive_slider/{id}', 'SuperadminController@unactive_slider');
Route::get('/superadmin/invoice', 'SuperadminController@invoice');
Route::get('/superadmin/acc_pembayaran/{id}', 'SuperadminController@acc_pembayaran');
// edit
Route::get('/superadmin/edit_data_admin/{id}', 'SuperadminController@edit_data_admin');
Route::get('/superadmin/edit_data_pelanggan/{id}', 'SuperadminController@edit_data_pelanggan');
Route::get('/superadmin/edit_data_produk/{id}', 'SuperadminController@edit_data_produk');
Route::get('/superadmin/edit_data_kategori/{id}', 'SuperadminController@edit_data_kategori');
Route::get('/superadmin/edit_data_slider/{id}', 'SuperadminController@edit_data_slider');
// update button
Route::post('/superadmin/update_data_pelanggan', 'SuperadminController@update_data_pelanggan');
Route::post('/superadmin/update_data_admin', 'SuperadminController@update_data_admin');
Route::post('/superadmin/update_data_produk', 'SuperadminController@update_data_produk');
Route::post('/superadmin/update_data_kategori', 'SuperadminController@update_data_kategori');
Route::post('/superadmin/update_data_slider', 'SuperadminController@update_data_slider');
// delete
Route::get('/superadmin/delete_data_admin/{id}', 'SuperadminController@delete_data_admin');
Route::get('/superadmin/delete_data_pelanggan/{id}', 'SuperadminController@delete_data_pelanggan');
Route::get('/superadmin/delete_data_produk/{id}', 'SuperadminController@delete_data_produk');
Route::get('/superadmin/delete_data_kategori/{id}', 'SuperadminController@delete_data_kategori');
Route::get('/superadmin/delete_data_slider/{id}', 'SuperadminController@delete_data_slider');
// proses pencarian
Route::get('/pilihan', 'SuperadminController@pilihan');
Route::post('/data_produk', 'SuperadminController@data_produk');
Route::get('/data_kategori', 'SuperadminController@data_kategori');
Route::get('/cari_data_admin','SuperadminController@cari_data_admin');
Route::get('/cari_data_pelanggan', 'SuperadminController@cari_data_pelanggan');
Route::get('/cari_testimonial', 'SuperadminController@cari_testimonial');
Route::get('/cari_testimonial_baru', 'SuperadminController@cari_testimonial_baru');
Route::get('/cari_slider', 'SuperadminController@cari_slider');
Route::post('/superadmin/detail_pesanan/{id}', 'SuperadminController@detail_pesanan');
// Route::post('/superadmin/cek_resi', 'SuperadminController@cek_resi');
Route::get('/superadmin/get_status', 'SuperadminController@get_status');
Route::get('/superadmin/tracking', 'SuperadminController@tracking');
Route::get('/superadmin/cancel_pembayaran/{id}', 'SuperadminController@cancel_pembayaran');
});

// admin
Route::group(['middleware' => ['auth', 'checkRole:admin']],function(){
Route::get('/admin', 'PagesController@indexadmin');
Route::get('/admin/produk', 'adminController@produk');
Route::get('/admin/addProduk', 'adminController@tambah_produk');
Route::post('/admin/tambahProduk', 'adminController@createProduk');
Route::get('/admin/kategori','adminController@kategori');
Route::get('/admin/addKategori', 'adminController@tambah_kategori');
Route::post('/postkategori', 'adminController@createKategori');
Route::get('/admin/data_pelanggan', 'adminController@data_pelanggan');
Route::get('/admin/testimonial', 'adminController@testimonial');
Route::get('/admin/testimonial_baru', 'adminController@testimonial_baru');
Route::get('/admin/acc_testimonial/{id}', 'adminController@acc_testimonial');
Route::get('/admin/slider', 'adminController@slider');
Route::get('/admin/addSlider', 'adminController@form_slider');
Route::post('/postslider', 'adminController@postslider');
Route::get('/admin/active_slider/{id}', 'adminController@active_slider');
Route::get('/admin/unactive_slider/{id}', 'adminController@unactive_slider');
Route::get('/admin/invoice', 'adminController@invoice');
Route::get('/admin/acc_pembayaran/{id}', 'adminController@acc_pembayaran');
// edit
Route::get('/admin/edit_data_admin/{id}', 'adminController@edit_data_admin');
Route::get('/admin/edit_data_pelanggan/{id}', 'adminController@edit_data_pelanggan');
Route::get('/admin/edit_data_produk/{id}', 'adminController@edit_data_produk');
Route::get('/admin/edit_data_kategori/{id}', 'adminController@edit_data_kategori');
Route::get('/admin/edit_data_slider/{id}', 'adminController@edit_data_slider');
// update button
Route::post('/admin/update_data_pelanggan', 'adminController@update_data_pelanggan');
Route::post('/admin/update_data_admin', 'adminController@update_data_admin');
Route::post('/admin/update_data_produk', 'adminController@update_data_produk');
Route::post('/admin/update_data_kategori', 'adminController@update_data_kategori');
Route::post('/admin/update_data_slider', 'adminController@update_data_slider');
// delete
Route::get('/admin/delete_data_admin/{id}', 'adminController@delete_data_admin');
Route::get('/admin/delete_data_pelanggan/{id}', 'adminController@delete_data_pelanggan');
Route::get('/admin/delete_data_produk/{id}', 'adminController@delete_data_produk');
Route::get('/admin/delete_data_kategori/{id}', 'adminController@delete_data_kategori');
Route::get('/admin/delete_data_slider/{id}', 'adminController@delete_data_slider');
// proses pencarian
Route::get('/pilihan', 'adminController@pilihan');
Route::get('/data_produk', 'adminController@data_produk');
Route::get('/data_kategori', 'adminController@data_kategori');
Route::get('/cari_data_admin','adminController@cari_data_admin');
Route::get('/cari_data_pelanggan', 'adminController@cari_data_pelanggan');
Route::get('/cari_testimonial', 'adminController@cari_testimonial');
Route::get('/cari_testimonial_baru', 'adminController@cari_testimonial_baru');
Route::get('/cari_slider', 'adminController@cari_slider');
Route::post('/admin/detail_pesanan/{id}', 'adminController@detail_pesanan');
// Route::post('/admin/cek_resi', 'adminController@cek_resi');
Route::get('/admin/get_status', 'adminController@get_status');
Route::get('/admin/tracking', 'adminController@tracking');
Route::get('/admin/cancel_pembayaran/{id}', 'adminController@cancel_pembayaran');
});

// pelanggan
Route::group(['middleware' => ['auth', 'checkRole:pelanggan,superadmin']],function(){
Route::post('/cart/tambah/{id}', 'MemberController@do_tambah_cart')->where('id','[0-9]+');
Route::get('/cart', "MemberController@cart");
Route::get('/cart/hapus/{id}', 'MemberController@do_hapus_cart')->where('id','[0-9]+');
Route::post('/transaksi/tambah/', "MemberController@do_tambah_transaksi");

Route::post('/postupdate/{id}',"MemberController@postupdate");
Route::get('/postdetailpemesanan', "MemberController@postdetailpemesanan");
Route::get('/invoice', "PagesController@invoice");
Route::get('/edit_checkout/{id}', "MemberController@edit_checkout");
Route::post('/postupdatecheckout/{id}', "MemberController@postupdatecheckout");
Route::get('/cek_ongkir', 'MemberController@cek_ongkir');
Route::get('getCity/ajax/{id}', 'MemberController@ajax');
// Route::get('/postpaket', 'MemberController@postpaket');
Route::post('/pilihpaket', 'MemberController@pilihpaket');
Route::get('/check_out', 'MemberController@check_out');
Route::get('/detail_pemesanan', 'MemberController@detail_pemesanan');
Route::get('/menunggu_pembayaran','MemberController@menunggu_pembayaran');
Route::post('/detail_invoice', 'MemberController@detail_invoice');
Route::get('/cancel/{id}', 'MemberController@cancel');
Route::get('/profile', 'MemberController@profile');
Route::post('/updateprofile', 'MemberController@updateprofile');
Route::get('/token', 'MemberController@token');
Route::post('/postfinish', 'MemberController@postfinish');
Route::get('/finish/{id}', 'MemberController@finish');
Route::get('/bayar', 'MemberController@bayar');
Route::get('/tracking', 'MemberController@tracking');
Route::get('/cek_resi', 'MemberController@cek_resi');
Route::get('/get_status', 'MemberController@get_status');

});	
// ini yang di pakai


Route::post('cek_transaksi', 'MemberController@cek_transaksi');
Route::get('/pagination', 'PagesController@pagination');

// Route::post('/snap/finish', 'MemberController@coba');

// ini percobaan
Route::get('/vtweb', 'PagesController@vtweb');

Route::get('/vtdirect', 'PagesController@vtdirect');
Route::post('/vtdirect', 'PagesController@checkout_process');

Route::get('/vt_transaction', 'TransactionController@transaction');
Route::post('/vt_transaction', 'TransactionController@transaction_process');

Route::post('/vt_notif', 'PagesController@notification');

Route::get('/snap', 'SnapController@snap');
Route::get('/snaptoken', 'SnapController@token');
Route::post('/snapfinish', 'SnapController@finish');



// Route::get('/login', 'AuthController@login')->name('login'); // dari http.middlewar.authentication
// Route::post('/postlogin', 'AuthController@postlogin');
// Route::get('/logout', 'AuthController@logout');
// Route::post('/postregister', 'AuthController@postregister');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
