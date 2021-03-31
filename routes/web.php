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

Route::get('/', 'HomeController@index')->name('index');

Route::group([
	'namespace' => 'Publics',
], function(){
	Route::get('/pengurus', 'PengurusController@index')->name('index.pengurus');
});

Route::group([
	'namespace' => 'Publics',
], function(){
	Route::post('/feedback/send', 'FeedbackController@send')->name('feedback.send');
});

Route::group([
	'middleware' => ['auth'],
], function(){	
	Route::get('/home', 'HomeController@index')->name('index.home');
});

Route::group([
	'middleware' => ['web'],
	'namespace' => 'Publics',
], function(){	
	Route::get('/article', 'BlogController@index')->name('publics.article');	
	Route::get('/article/{url}', 'BlogController@single')->name('publics.article.single');
	Route::get('/article/category/{cat}', 'BlogController@category')->name('publics.article.category');
	Route::get('/article/search', 'BlogController@search')->name('publics.article.search');
});

Route::group([
	'middleware' => ['web'],
	'namespace' => 'Publics',
], function(){	
	Route::get('/event', 'EventController@index')->name('publics.event');
	Route::get('/event/dibuka', 'EventController@dibuka')->name('publics.event.dibuka');
	Route::get('/event/ditutup', 'EventController@ditutup')->name('publics.event.ditutup');
	Route::get('/event/single/{id}', 'EventController@single')->name('publics.event.single');
});

Route::group([
	'middleware' => ['web'],
	'namespace' => 'Publics',
], function(){	
	Route::get('/event-pengkaderan', 'EventPengkaderanController@index')->name('publics.event-pengkaderan');
	Route::get('/event-pengkaderan/dibuka', 'EventPengkaderanController@dibuka')->name('publics.event-pengkaderan.dibuka');
	Route::get('/event-pengkaderan/ditutup', 'EventPengkaderanController@ditutup')->name('publics.event.ditutup');
	Route::get('/event-pengkaderan/single/{id}', 'EventPengkaderanController@single')->name('publics.event-pengkaderan.single');
});

Route::group([
	'middleware' => ['guest'],
	'namespace' => 'Publics',
], function(){
	Route::post('/event/guest/join', 'EventController@guest')->name('guest.event.join');
});

Route::group([
	'middleware' => ['auth', 'biodata'],
	'namespace' => 'Publics',
], function(){
	Route::post('/event/authed/join', 'EventController@authed')->name('authed.event.join');
});

Route::group([
	'middleware' => ['auth', 'biodata', 'verifydata'],
	'namespace' => 'Publics',
], function(){	
	Route::post('/event-pengkaderan/join', 'EventPengkaderanController@join')->name('authed.event-pengkaderan.join');
});

Auth::routes();
Auth::routes(['verify' => true]);

Route::group([
	'middleware' => ['auth', 'biodatacomplete'],
	'namespace' => 'Kader',
], function(){
	Route::get('/isi-biodata', 'DataBiodataController@index')->name('kader.isi-biodata');
	Route::post('/isi-biodata/store', 'DataBiodataController@store')->name('kader.isi-biodata.store');
});

Route::group([
	'middleware' => ['auth', 'biodata'],
	'namespace' => 'Kader',
], function(){
	Route::get('/verify', 'VerifyController@index');
	Route::post('/verify/submit', 'VerifyController@upload');
});

Route::group([
	'middleware' => ['auth', 'biodata', 'verifydata'],
	'namespace' => 'Kader',
], function(){	
	Route::get('/profile', 'ProfileController@index')->name('kader.profil');
	Route::post('/profile/store', 'ProfileController@store')->name('kader.profile.store');
	Route::post('/profile/photo/store', 'ProfileController@photoStore')->name('kader.profile.photo.store');
	Route::get('/my-events', 'JoinedEvent@index')->name('kader.joinedevents.index');		
});

Route::group([
	'middleware' => ['auth', 'biodata', 'mapaba', 'verifydata'],
	'namespace' => 'Kader',
], function(){
	Route::get('/friends', 'FriendController@index')->name('kader.teman');
	Route::get('/friends/angkatan/{angkatan}', 'FriendController@angkatan')->name('kader.angkatan');
	Route::get('/friends/{nim}', 'FriendController@single')->name('kader.teman.single');
	Route::get('/friends/tool/search', 'FriendController@search')->name('kader.teman.search');
});

Route::group([
	'middleware' => ['auth', 'admin', 'verifydata'],
	'namespace' => 'Admin',	
], function(){
	Route::get('/admin', 'HomeController@index');
	Route::get('/admin/see-article/{url}', 'ArticleCheckController@index');
	Route::resource('/admin/kader','KaderController');	
	Route::resource('/admin/article','ArticleVerificationController');
	Route::resource('/admin/event','EventController');	
	Route::resource('/admin/event-pengkaderan','EventPengkaderanController');
	Route::resource('/admin/absensi-event','AbsensiEventController');
	Route::resource('/admin/absensi-event-pengkaderan','AbsensiEventKaderisasiController');	
	Route::get('/ajax-autocomplete-search', 'SearchKaderController@search')->name('search');
	Route::resource('/admin/pengurus','PengurusController');

	Route::get('/admin/kader/{nim}/photo/pasphoto', 'DataFotokaderController@pasPhoto')->name('admin.kader.photo.pasphoto');
	Route::get('/admin/kader/{nim}/photo/ktm', 'DataFotokaderController@ktm')->name('admin.kader.photo.ktm');
	Route::get('/set-all-status-kaderisasi', 'SetAllStatusKaderisasiController@setAll')->name('admin.kader.set-all-status-kaderisasi');
});

Route::group([
	'middleware' => ['auth', 'biodata', 'mapaba', 'verifydata'],
	'prefix' => 'filemanager'
], function() {
	\UniSharp\LaravelFilemanager\Lfm::routes();
});

Route::group([
	'middleware' => ['auth', 'biodata', 'mapaba', 'verifydata'],
	'namespace' => 'Cms',	
], function(){
	Route::resource('/cms/manage', 'CmsController');
});


Route::group([
    'middleware' => ['auth', 'admin', 'verifydata'],
], function(){
    Route::get('/storage/pasphoto/{filename}', function ($filename){
        $path = storage_path() . '/app/public/pasphoto/' . $filename;
    
        if(!File::exists($path)) abort(404);
    
        $file = File::get($path);
        $type = File::mimeType($path);
    
        $response = Response::make($file, 200);
        $response->header("Content-Type", $type);
    
        return $response;
    });
    
    Route::get('/storage/ktm/{filename}', function ($filename){
        $path = storage_path() . '/app/public/ktm/' . $filename;
    
        if(!File::exists($path)) abort(404);
    
        $file = File::get($path);
        $type = File::mimeType($path);
    
        $response = Response::make($file, 200);
        $response->header("Content-Type", $type);
    
        return $response;
    });
});

Route::group([
    'middleware' => ['auth', 'biodata', 'mapaba', 'verifydata'],
], function(){
    Route::get('/storage/foto/{filename}', function ($filename){
        $path = storage_path() . '/app/public/foto/' . $filename;
    
        if(!File::exists($path)) abort(404);
    
        $file = File::get($path);
        $type = File::mimeType($path);
    
        $response = Response::make($file, 200);
        $response->header("Content-Type", $type);
    
        return $response;
    }); 
});

Route::get('/storage/photos/{id}/{filename}', function ($id, $filename){
    $path = storage_path() . '/app/public/photos/'.$id.'/' . $filename;

    if(!File::exists($path)) abort(404);

    $file = File::get($path);
    $type = File::mimeType($path);

    $response = Response::make($file, 200);
    $response->header("Content-Type", $type);

    return $response;
});

Route::get('/storage/photos/{id}/thumbs/{filename}', function ($id, $filename){
    $path = storage_path() . '/app/public/photos/'.$id.'/thumbs/' . $filename;

    if(!File::exists($path)) abort(404);

    $file = File::get($path);
    $type = File::mimeType($path);

    $response = Response::make($file, 200);
    $response->header("Content-Type", $type);

    return $response;
});

Route::get('/akugantenglink', function () {
    $target = '/home/pmiigali/app/storage/app/public';
    $shortcut = '/home/pmiigali/public_html/storage';
    symlink($target, $shortcut);
});