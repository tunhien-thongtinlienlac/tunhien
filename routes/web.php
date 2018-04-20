<?php

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

/*Route::get('/', function () {
    return view('welcome');
});
Route::get('home',function(){
	return view('sub');
});
Route::get('sub1',function(){
	return view('sub1');
});*/
/*Route::get('test', function () {
    return view('Test', ['name' => 'James']);
});*/
/*View::share('title','Học laravel 5x');
View::composer('Test',function($view){
	return $view->with('thongtin','Đây là trang cá nhân');
});*/



// Tìm hiểu về schema
// tạp bảng
Route::get('/','GetContentSub@GetSub')->name('index');
Route::get('schema/create',function(){
	Schema::create('category',function($table){
		$table->increments('id');
		$table->string('name_cate', 100);
		$table->Integer('amount');
	});
});
Route::get('schema/product',function(){
	Schema::create('product',function($table){
		$table->increments('id');
		$table->string('name_pro', 100);
		$table->integer('cate_id')->unsigned();
		$table->foreign('cate_id')->references('id')->on('category');
		$table->integer('price');
	});
});
Route::get('schema/taikhoan',function(){
	Schema::create('taikhoan',function($table){
		$table->increments('id');
		$table->string('name_tk');
		$table->string('matkhau');
	});
});
// sửa tên bảng
Route::get('schema/rename',function(){
	Schema::rename('sanpham', 'product');
});
// xóa bảng
Route::get('schema/drop',function(){
	Schema::drop('migrations');
});
// query

Route::get('query/select-all',function(){
	$data = DB::table('product')->get();
	foreach ($data as $item){
		$data1 = DB::table('category')->where('id',$item->cate_id)->get();
		foreach ($data1 as $item1) {
			echo "Tên sản phẩm: ".$item->name_pro;
			echo "<br>";
			echo "Loại sản phẩm: ".$item1->name_cate;
			echo "<br>";
			echo "Số lượng: ".$item1->amount;
			echo "<br>";
			echo "Giá sản phẩm: ".$item->price." VND";
			echo "<br>";
		}
	}
});

// form
Route::get('form','GetForm@GetFormLogin');
Route::get('signup','DangKyController@signup');
Route::get('dang-ky','DangKyController@login');



Route::get('forgotpassword','DangKyController@forgotpassword')->name('fpass');
Route::post('dashboard','DangKyController@logindashboard')->name('dashboard');
Route::get('minh',function(){
	return view('login.index');
});
Route::post('new-pass','DangKyController@sendMail')->name('sendpassnew');
Route::post('show','DangKyController@showimage')->name('ContentImage');
Route::post('data-account','DangKyController@getdatasignup')->name('getaccount');
Route::post('data-apm','DangKyController@getdataapm')->name('dataapm');
Route::post('edit-apm','DangKyController@edititemapm')->name('edititem');
Route::post('data-copyright','DangKyController@getdatacopyfooter')->name('datacopyright');
Route::post('edit-copyright','DangKyController@editcopyrightfooter')->name('editcopyright');
Route::post('data-social','DangKyController@getdatasocial')->name('datasocial');
Route::post('edit-social','DangKyController@editdatasocial')->name('editsocial');
Route::post('edit-about','DangKyController@editdataabout')->name('editabout');
Route::post('data-about','DangKyController@getdataabout')->name('dataabout');
Route::post('data-contact','DangKyController@getdatacontact')->name('datacontact');
Route::post('edit-contact','DangKyController@editcontact')->name('editctact');
Route::post('data-google-map','DangKyController@getdatagooglemap')->name('datagooglemap');
Route::post('edit-google-map','DangKyController@editdatagooglemap')->name('editgooglemap');
Route::post('data-logoslide','DangKyController@getdatalogoslide')->name('datalogoslide');
Route::post('edit-logoslide','DangKyController@editdatalogoslide')->name('editlogoslide');
Route::post('data-logoslides','DangKyController@getdacontentslogoslide')->name('dataconetentlogoslide');
Route::post('edit-contents-logoslide','DangKyController@editdatacontentslogoslides')->name('editcontentslogoslides');
Route::post('data-testimonial','DangKyController@getdatatestimonial')->name('datatestimonials');
Route::post('data-logo','DangKyController@getdatalogo')->name('datatlogo');
Route::post('data-slidebar','DangKyController@getdataslidebar')->name('dataslidebar');
Route::post('edit-contents-tmn','DangKyController@editdatacontentstmn')->name('editcontenttmn');
Route::post('edit-data-logo','DangKyController@editdatacontentlogo')->name('editdatalogo');
Route::post('data-tmn','DangKyController@getdacontentstmn')->name('dataconetstmn');
Route::post('data-title-background-stt','DangKyController@getdatatitleandbacgruondstt')->name('datatitlebackgruondstt');
Route::post('edit-title-background-stt','DangKyController@editdatatitlebackgruondstt')->name('edittitlebackgruondstt');
Route::post('data-content-row-statistical','DangKyController@getdacontentrowstt')->name('datacontentrowstt');
Route::post('edit-contents-row-statistical','DangKyController@editdatacontentsrowstt')->name('editcontentsrowstt');
Route::post('data-title-why','DangKyController@getdatatitlewhy')->name('datatitlewhy');
Route::post('edit-title-why','DangKyController@editdatatitlewhy')->name('edittitlewhy');
Route::post('data-why','DangKyController@getdatarowwhy')->name('datarowwhy');
Route::post('edit-why','DangKyController@editdatarowwhy')->name('editrowwhy');
Route::post('edit-menus','DangKyController@editdatamenus')->name('editmenus');
Route::post('data-menu','DangKyController@getdatamenu')->name('datamenu');
Route::post('data-title-product','DangKyController@getdatatitleproduct')->name('datatitleproduct');
Route::post('edit-title-product','DangKyController@editdatatitleproduct')->name('edittitleproduct');
Route::post('data-product','DangKyController@getdacontentsproduct')->name('dataconetentproduct');
Route::post('edit-contents-product','DangKyController@editdatacontentsrowproduct')->name('editcontentrowproduct');
Route::get('responses/demo',function(){
	return redirect()->route('aaa');
});
Route::get('delete-item','DangKyController@deleteitemapm')->name('dtlitemapm');
Route::get('delete-google','DangKyController@deletegooglemap')->name('dtlgooglemap');
Route::get('delete-contact','DangKyController@deletecontact')->name('dtlcontact');
Route::get('delete-logoslide','DangKyController@deletelogoslide')->name('dtllogoslide');
Route::get('delete-titlebackgroundstt','DangKyController@deletetitleandbackgroundstt')->name('dtltitleandbackgroundstt');
Route::get('delete-testimonial','DangKyController@deletebackgroundtmn')->name('dtlbackgruondimagetestimonial');
Route::get('delete-logo','DangKyController@deletelogo')->name('dltlogo');
Route::get('delete-copyright-footer','DangKyController@deletecopyrightfooter')->name('dltcopyrightlft');
Route::get('delete-title-why','DangKyController@deletetitlewhy')->name('dlttitlewhy');
Route::get('delete-title-product','DangKyController@deletetitleproduct')->name('dlttitleproduct');

// Auth::routes();
// route contents
Route::group(['prefix' => 'admin'], function(){
	Route::get('login','Auth\LoginController@showLoginForm');
	Route::post('login','Auth\LoginController@login')->name('login');
	Route::group(['middleware' => 'auth'],function(){
		Route::get('/','DangKyController@getContentsdashboard');
		Route::get('logout','Auth\LoginController@logout')->name('logout');
	});
});
Route::group(['prefix' => '/','middleware' => 'auth'],function(){

	Route::get('login','DangKyController@loginLaravel')->name('logindashboard');
	Route::get('logo','DangKyController@getLogo')->name('logo');
	Route::get('address-phone-mail','DangKyController@getAPM')->name('apm');
	Route::get('footer','DangKyController@getfooter')->name('footer');
	Route::get('contact','DangKyController@getcontact')->name('contact');
	Route::get('google-map','DangKyController@getgooglemap')->name('googlemap');
	Route::get('logoslide','DangKyController@getlogoslide')->name('LogoSlide');
	Route::get('footer/{id}/edit','DangKyController@editFooter')->name('footer.edit');
	Route::get('about/{id}/edit','DangKyController@editAbout')->name('about.edit');
	Route::get('logoslide/{id}/edit','DangKyController@editLogoSlide')->name('logoslides.edit');
	Route::get('testimonials/{id}/edit','DangKyController@editTestimonial')->name('testimonials.edit');
	Route::get('statiscal/{id}/edit','DangKyController@editrowStatiscal')->name('statiscal.edit');
	Route::get('footer/delete','DangKyController@DeleteSocialFooter')->name('footer.delete');
	Route::get('about/delete','DangKyController@DeleteContentAbout')->name('about.delete');
	Route::get('logoslide/delete','DangKyController@DeleteLogoslides')->name('logoslides.delete');
	Route::get('testimonial/delete','DangKyController@DeleteTestiMonial')->name('testimonial.delete');
	Route::get('slidebar/delete','DangKyController@DeleteSLideBar')->name('slidebar.delete');
	Route::get('statistical/delete','DangKyController@DeleteRowstt')->name('statiscal.delete');
	Route::get('why/delete','DangKyController@Deleterowswhy')->name('why.delete');
	Route::get('menu/delete','DangKyController@Deletemenu')->name('menu.delete');
	Route::get('why/{id}/edit','DangKyController@editRowwhy')->name('why.edit');
	Route::get('menu/{id}/edit','DangKyController@editMenu')->name('menu.edit');
	Route::get('logo/{id}/edit','DangKyController@editLogo')->name('logo.edit');
	Route::get('product/delete','DangKyController@DeleteProduct')->name('product.delete');
	Route::get('menuheader','DangKyController@getmenuheader')->name('menuheader');
	Route::get('socialheader','DangKyController@getsocialheader')->name('socialheader');

	Route::get('dashboard','DangKyController@getContentsdashboard')->name('contentdashboard');

	Route::get('tesmonial','DangKyController@gettesmonial')->name('TesMonial');
	Route::get('statiscal','DangKyController@getstatiscal')->name('Statical');
	Route::get('why','DangKyController@getwhy')->name('Why');
	Route::get('about','DangKyController@getabout')->name('About');
	Route::get('product','DangKyController@getproduct')->name('Product');
	Route::get('slidebar','DangKyController@getslidebar')->name('Slidebar');
	Route::get('header','DangKyController@getheader')->name('Header');
	Route::get('product/{id}/edit','DangKyController@editProduct')->name('product.edit');
});

// end 
// route('statiscal.edit',$id)


Route::get('/home', 'HomeController@index')->name('home');
