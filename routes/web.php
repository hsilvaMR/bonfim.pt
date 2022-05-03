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


Route::get('/clear-cache', function(){ $exitCode = Artisan::call('cache:clear'); return '<h1>Cache facade value cleared</h1>'; });
Route::get('/optimize', function(){ $exitCode = Artisan::call('optimize'); return '<h1>Reoptimized class loader</h1>'; });
Route::get('/route-cache', function(){ $exitCode = Artisan::call('route:cache'); return '<h1>Routes cached</h1>'; });
Route::get('/route-clear', function(){ $exitCode = Artisan::call('route:clear'); return '<h1>Route cache cleared</h1>'; });
Route::get('/view-clear', function(){ $exitCode = Artisan::call('view:clear'); return '<h1>View cache cleared</h1>'; });
Route::get('/config-cache', function(){ $exitCode = Artisan::call('config:cache'); return '<h1>Clear Config cleared</h1>'; });

/*
|--------------------------------------------------------------------------
| Site
|--------------------------------------------------------------------------
*/

Route::get('/', 'Bonfim\Home@index')->name('bonfimInfoPage');
Route::get('/apartamento/{id}', 'Bonfim\Apartamento@index')->name('bonfimApartamentosPage');
Route::get('/localizacao', 'Bonfim\Localizacao@index')->name('bonfimLocalizacaoPage');
Route::get('/noticia/{id}', 'Bonfim\Noticia@index')->name('bonfimNoticiaPage');

Route::post('/bonfim-contact', 'Bonfim\Home@formContactos')->name('contactBonfimForm');
Route::post('/bonfim-newsletter', 'Bonfim\Home@formNewslleter')->name('newsletterBonfimForm');
Route::get('/aviso-legal', 'Bonfim\Home@avisoLegal')->name('avisoLegalPage');

Route::get('/cancelar-subscricao/{token}/{lang}', 'Bonfim\Home@cancelarNewsletter')->name('cancelarNewsletterPage');


Route::get('/lang/{lang}', 'Language@index')->name('setLanguage');

/*
|--------------------------------------------------------------------------
| Backoffice
|--------------------------------------------------------------------------
*/

Route::group(['prefix' => 'admin'], function(){
	Route::get('/','Backoffice\Login@index')->name('loginPageB');
	Route::post('/','Backoffice\Login@loginForm')->name('loginFormB');
	Route::get('/logout','Backoffice\Login@logout')->name('logoutPageB');
	Route::get('/lang/{lang}', 'Backoffice\Language@getLang')->name('setLanguageB');
	//restore
	Route::post('/restore','Backoffice\Login@restoreForm')->name('restoreFormB');
	Route::get('/restore-password/{token}','Backoffice\Login@restorePasswordPage')->name('emailRestorePageB');
	Route::post('/restore-password-form','Backoffice\Login@restorePasswordForm')->name('restorePasswordFormB');
	Route::get('/new-admin/{token}','Backoffice\Login@restorePasswordPage')->name('emailNewAdminPageB');

	/* BACKOFFICE - ÁREA RESERVADA */
	Route::group([ 'middleware' => ['Backoffice'] ], function(){
		Route::get('/dashboard', 'Backoffice\Dashboard@index')->name('dashboardPageB');

		//Administradores
		Route::get('/admins', 'Backoffice\Admins@index')->name('adminPageB');
		Route::get('/new-admin', 'Backoffice\Admins@adminNew')->name('adminNewPageB');
		Route::get('/edit-admin/{id}', 'Backoffice\Admins@adminEdit')->name('adminEditPageB');
		
		

		Route::post('/admin-delete', 'Backoffice\Admins@adminApagar')->name('adminAllApagarB');
		Route::post('/admin-form', 'Backoffice\Admins@adminForm')->name('adminFormB');
		
		
		//Apartamentos
		Route::get('/apartments', 'Backoffice\Apartments@index')->name('apartmentsPageB');
		Route::get('/new-apartment', 'Backoffice\Apartments@newApart')->name('newApartmentsPageB');
		Route::get('/edit-apartment/{id}', 'Backoffice\Apartments@editApart')->name('editApartmentsPageB');
		Route::get('/finish-map/{id_apartamento}', 'Backoffice\Apartments@map')->name('mapPageB');
		Route::get('/map-edit/{id}', 'Backoffice\Apartments@mapEdit')->name('mapEditPageB');


		Route::post('/form-apartment', 'Backoffice\Apartments@formApart')->name('apartmentsFormB');
		Route::post('/form-map', 'Backoffice\Apartments@formMap')->name('mapFormB');
		Route::post('/form-map-edit', 'Backoffice\Apartments@formMapEdit')->name('mapEditFormB');
		

		//Noticias
		Route::get('/news', 'Backoffice\News@index')->name('newsPageB');
		Route::get('/new-news', 'Backoffice\News@newNews')->name('newNewsPageB');
		Route::get('/edit-new/{id}', 'Backoffice\News@editNews')->name('editNewsPageB');
		Route::post('/form-new', 'Backoffice\News@formNew')->name('newFormB');

		//Newsletter
		Route::get('/newsletter', 'Backoffice\Newsletter@index')->name('newsletterPageB');
		Route::get('/newsletter-send', 'Backoffice\Newsletter@sendNewsletter')->name('newsletterSendPageB');
		Route::get('/newsletter-edit/{id}', 'Backoffice\Newsletter@editNewsletter')->name('newsletterEditPageB');
		Route::get('/newsletter-view/{id}/{lang}', 'Backoffice\Newsletter@viewNewsletter')->name('newsletterViewPageB');
		Route::get('/newsletter-emails', 'Backoffice\Newsletter@emailsNewsletter')->name('newsletterEmailsPageB');
		Route::get('/newsletter-new-contact', 'Backoffice\Newsletter@newContactNewsletter')->name('newContactNewsletterPageB');

		Route::post('/newsletter-create', 'Backoffice\Newsletter@createNewsletter')->name('newsletterCreatePostB');
		Route::post('/newsletter-delete', 'Backoffice\Newsletter@deleteNewsletter')->name('newsletterDeletePostB');
		Route::post('/newsletter-send-new', 'Backoffice\Newsletter@sendEmailNewsletter')->name('newsletterSendEmailPostB');
		Route::post('/newsletter-new-contact-form', 'Backoffice\Newsletter@newContactForm')->name('newContactNewsletterPostB');
		

		//Contactos
		Route::get('/contacts', 'Backoffice\Contacts@index')->name('contactsPageB');
		Route::get('/contact/{id}', 'Backoffice\Contacts@details')->name('contactsDetailsPageB');

		//Site- Informação
		Route::get('/website-info', 'Backoffice\Website@index')->name('websitePageB');
		Route::get('/add-img-projeto', 'Backoffice\Website@addImgProjeto')->name('addImgProjetoB');
		Route::get('/edit-img-projeto/{id}', 'Backoffice\Website@editImgProjeto')->name('editImgProjetoB');

		Route::post('/add-img', 'Backoffice\Website@addImgForm')->name('addImgProjetoPost');

		//Site - Timeline
		Route::get('/website-timeline', 'Backoffice\Website@barraP')->name('websiteTimelinePageB');
		Route::post('/website-timeline-edit', 'Backoffice\Website@barraEdit')->name('websiteTimelineEditForm');

		//SITE - GALERIA HOME
		Route::get('/website-galeria', 'Backoffice\Website@galeriaHome')->name('galeriaHomePageB');
		Route::get('/website-galeria-new', 'Backoffice\Website@galeriaHomeNew')->name('galeriaHomeNewPageB');
		Route::post('/website-galeria-post', 'Backoffice\Website@saveGaleriaHome')->name('saveGaleriaHomeForm');

		


		//Datasheet
		Route::get('/datasheet', 'Backoffice\Datasheet@index')->name('datasheetPageB');
		Route::post('/form-datasheet', 'Backoffice\Datasheet@form')->name('datasheetFormB');

		//_TableManager
		Route::post('/TM-onoff', 'Backoffice\_TableManager@updateOnOff')->name('updateOnOffTMB');
		Route::post('/TM-delLine', 'Backoffice\_TableManager@deleteLine')->name('deleteLineTMB');
		Route::post('/TM-repDel', 'Backoffice\_TableManager@replaceDelete')->name('replaceDeleteTMB');
		Route::post('/TM-sort', 'Backoffice\_TableManager@sortTable')->name('sortTableTMB');
		Route::post('/TM-order', 'Backoffice\_TableManager@orderTable')->name('orderTableTMB');
		
	});
});