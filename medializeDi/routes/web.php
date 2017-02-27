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

Route::get('/', 'MasterController@index');

Route::get('deposito', 'MasterController@deposito');
//Route::get('/comprar/{media}/{service}', 'ServicoController@index');
//Route::get('/comprar/{media}/{service}/{id}', 'ServicoController@comprar');

Route::get('/comprar-{service}-{media}', 'ServicoController@index');
Route::get('/comprar-{service}-{media}/{seo}', 'ServicoController@comprar');

Route::get('/atendimento', function() {
  return view('atendimento', ['medias' => App\Media::all()]);
});
Route::post('/atendimento', 'MasterController@atendimento');
Route::get('/deposito', function() {
  return view('deposito.deposito');
});
Route::post('/deposito', 'MasterController@comprovante');
Route::get('/politicas-de-privacidade', function() {
  return view('politicas');
});
Route::get('/blog', function () {
    return view('home');
});

//ROTAS PAGAMENTO
Route::post('pagar/{id}', 'PaymentController@checkout');

Route::post('contato', 'ContatoController@enviarMensagem' );

Route::get('obrigado/{pagamento}', 'PaymentController@obrigado');

Route::group(['prefix' => 'paypal'], function () {
  Route::get('pagamento/{id}', ['as' => 'paypal.pagamento', 'uses' => 'Payment\PayPalController@pagamento']);
  Route::get('retorno', ['as' => 'paypal.retorno', 'uses' => 'Payment\PayPalController@retorno']);
});

Route::group(['prefix' => 'pagseguro'], function () {
  Route::get('pagamento/{id}', ['as' => 'pagseguro.pagamento', 'uses' => 'Payment\PagSeguroController@pagamento']);
  Route::get('retorno', ['as' => 'pagseguro.retorno', 'uses' => 'Payment\PagSeguroController@retorno']);
});

Route::group(['prefix' => 'mercadopago'], function () {
  Route::get('pagamento/{id}', ['as' => 'mercadopago.pagamento', 'uses' => 'Payment\MercadoPagoController@pagamento']);
  Route::get('retorno', ['as' => 'mercadopago.retorno', 'uses' => 'Payment\MercadoPagoController@retorno']);
  Route::get('notificacao', ['as' => 'mercadopago.notificacao', 'uses' => 'Payment\MercadoPagoController@notificacao'])->middleware('cors');
});

Route::get('termos-e-politicas', 'MasterController@termos');


//ROTA NEWSLETTER E ADMINISTRATIVA

Route::post('subscribe', 'NewsletterController@subscribe');
Route::get('unsubscribe', 'NewsletterController@show' );
Route::post('unsubscribe', 'NewsletterController@unsubscribe' );

Route::group(['middleware' => 'auth'], function () {
    
    Route::get('send', 'NewsletterController@sendmail' );
    Route::get('editar-pedido/{id}', 'HomeController@edit' );
    Route::post('atualizar-pedido/{id}', 'HomeController@update' );

});


Auth::routes();
Route::get('/home', 'HomeController@index');

