<?php

Route::redirect('/', '/login');
Route::get('/home', function () {
    if (session('status')) {
        return redirect()->route('admin.home')->with('status', session('status'));
    }

    return redirect()->route('admin.home');
});

Route::get('/update', 'FtpManagerController@update')->name('update');

Auth::routes(['register' => false]);

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {
    Route::get('/', 'HomeController@index')->name('home');
    // Permissions
    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');
    Route::resource('permissions', 'PermissionsController');

    // Roles
    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');
    Route::resource('roles', 'RolesController');

    // Users
    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');
    Route::resource('users', 'UsersController');

    // Brands
    Route::delete('brands/destroy', 'BrandController@massDestroy')->name('brands.massDestroy');
    Route::post('brands/media', 'BrandController@storeMedia')->name('brands.storeMedia');
    Route::post('brands/ckmedia', 'BrandController@storeCKEditorImages')->name('brands.storeCKEditorImages');
    Route::resource('brands', 'BrandController');

    // Offertes
    Route::delete('offertes/destroy', 'OfferteController@massDestroy')->name('offertes.massDestroy');
    Route::resource('offertes', 'OfferteController');

    // Categories
    Route::delete('categories/destroy', 'CategorieController@massDestroy')->name('categories.massDestroy');
    Route::resource('categories', 'CategorieController');

    // Tecnologia
    Route::delete('tecnologia/destroy', 'TecnologiaController@massDestroy')->name('tecnologia.massDestroy');
    Route::resource('tecnologia', 'TecnologiaController');

    // Regionis
    Route::delete('regionis/destroy', 'RegioniController@massDestroy')->name('regionis.massDestroy');
    Route::resource('regionis', 'RegioniController');

    // Provinces
    Route::delete('provinces/destroy', 'ProvinceController@massDestroy')->name('provinces.massDestroy');
    Route::resource('provinces', 'ProvinceController');

    // Citta
    Route::delete('citta/destroy', 'CittaController@massDestroy')->name('citta.massDestroy');
    Route::resource('citta', 'CittaController');

    // Notizies
    Route::delete('notizies/destroy', 'NotizieController@massDestroy')->name('notizies.massDestroy');
    Route::post('notizies/media', 'NotizieController@storeMedia')->name('notizies.storeMedia');
    Route::post('notizies/ckmedia', 'NotizieController@storeCKEditorImages')->name('notizies.storeCKEditorImages');
    Route::resource('notizies', 'NotizieController');

    // Vendites
    Route::delete('vendites/destroy', 'VenditeController@massDestroy')->name('vendites.massDestroy');
    Route::resource('vendites', 'VenditeController');

    // Gare Inserimentos
    Route::delete('gare-inserimentos/destroy', 'GareInserimentoController@massDestroy')->name('gare-inserimentos.massDestroy');
    Route::resource('gare-inserimentos', 'GareInserimentoController');

    // Soggetti Tipologia
    Route::delete('soggetti-tipologia/destroy', 'SoggettiTipologiaController@massDestroy')->name('soggetti-tipologia.massDestroy');
    Route::resource('soggetti-tipologia', 'SoggettiTipologiaController');

    // Gare Inserimento Dettaglis
    Route::delete('gare-inserimento-dettaglis/destroy', 'GareInserimentoDettagliController@massDestroy')->name('gare-inserimento-dettaglis.massDestroy');
    Route::resource('gare-inserimento-dettaglis', 'GareInserimentoDettagliController');

    // Inserimento Gare Soglies
    Route::delete('inserimento-gare-soglies/destroy', 'InserimentoGareSoglieController@massDestroy')->name('inserimento-gare-soglies.massDestroy');
    Route::resource('inserimento-gare-soglies', 'InserimentoGareSoglieController');

    // Inserimento Soglie Ranges
    Route::delete('inserimento-soglie-ranges/destroy', 'InserimentoSoglieRangeController@massDestroy')->name('inserimento-soglie-ranges.massDestroy');
    Route::resource('inserimento-soglie-ranges', 'InserimentoSoglieRangeController');

    // Soggetti Fatturatos
    Route::delete('soggetti-fatturatos/destroy', 'SoggettiFatturatoController@massDestroy')->name('soggetti-fatturatos.massDestroy');
    Route::resource('soggetti-fatturatos', 'SoggettiFatturatoController');

    // User Parameters
    Route::delete('user-parameters/destroy', 'UserParametersController@massDestroy')->name('user-parameters.massDestroy');
    Route::resource('user-parameters', 'UserParametersController');

    // Soggetti Relationships
    Route::delete('soggetti-relationships/destroy', 'SoggettiRelationshipController@massDestroy')->name('soggetti-relationships.massDestroy');
    Route::resource('soggetti-relationships', 'SoggettiRelationshipController');

    // Grab Data Mexals
    Route::delete('grab-data-mexals/destroy', 'GrabDataMexalController@massDestroy')->name('grab-data-mexals.massDestroy');
    Route::resource('grab-data-mexals', 'GrabDataMexalController');

    // Exportlogs
    Route::delete('exportlogs/destroy', 'ExportlogController@massDestroy')->name('exportlogs.massDestroy');
    Route::resource('exportlogs', 'ExportlogController');

    // Dealers
    Route::delete('dealers/destroy', 'DealerController@massDestroy')->name('dealers.massDestroy');
    Route::resource('dealers', 'DealerController');

    // Dealer Points
    Route::delete('dealer-points/destroy', 'DealerPointsController@massDestroy')->name('dealer-points.massDestroy');
    Route::resource('dealer-points', 'DealerPointsController');

    // Agentis
    Route::delete('agentis/destroy', 'AgentiController@massDestroy')->name('agentis.massDestroy');
    Route::resource('agentis', 'AgentiController');

    // Dealer Mandatis
    Route::delete('dealer-mandatis/destroy', 'DealerMandatiController@massDestroy')->name('dealer-mandatis.massDestroy');
    Route::resource('dealer-mandatis', 'DealerMandatiController');
});
Route::group(['prefix' => 'profile', 'as' => 'profile.', 'namespace' => 'Auth', 'middleware' => ['auth']], function () {
// Change password
    if (file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php'))) {
        Route::get('password', 'ChangePasswordController@edit')->name('password.edit');
        Route::post('password', 'ChangePasswordController@update')->name('password.update');
        Route::post('profile', 'ChangePasswordController@updateProfile')->name('password.updateProfile');
        Route::post('profile/destroy', 'ChangePasswordController@destroy')->name('password.destroyProfile');
    }
});
