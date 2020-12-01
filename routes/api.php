<?php

Route::group(['prefix' => 'v1', 'as' => 'api.', 'namespace' => 'Api\V1\Admin', 'middleware' => ['auth:api']], function () {
    // Permissions
    Route::apiResource('permissions', 'PermissionsApiController');

    // Roles
    Route::apiResource('roles', 'RolesApiController');

    // Users
    Route::apiResource('users', 'UsersApiController');

    // Brands
    Route::post('brands/media', 'BrandApiController@storeMedia')->name('brands.storeMedia');
    Route::apiResource('brands', 'BrandApiController');

    // Offertes
    Route::apiResource('offertes', 'OfferteApiController');

    // Categories
    Route::apiResource('categories', 'CategorieApiController');

    // Tecnologia
    Route::apiResource('tecnologia', 'TecnologiaApiController');

    // Regionis
    Route::apiResource('regionis', 'RegioniApiController');

    // Provinces
    Route::apiResource('provinces', 'ProvinceApiController');

    // Citta
    Route::apiResource('citta', 'CittaApiController');

    // Notizies
    Route::post('notizies/media', 'NotizieApiController@storeMedia')->name('notizies.storeMedia');
    Route::apiResource('notizies', 'NotizieApiController');

    // Vendites
    Route::apiResource('vendites', 'VenditeApiController');

    // Gare Inserimentos
    Route::apiResource('gare-inserimentos', 'GareInserimentoApiController');

    // Soggetti Tipologia
    Route::apiResource('soggetti-tipologia', 'SoggettiTipologiaApiController');

    // Gare Inserimento Dettaglis
    Route::apiResource('gare-inserimento-dettaglis', 'GareInserimentoDettagliApiController');

    // Inserimento Gare Soglies
    Route::apiResource('inserimento-gare-soglies', 'InserimentoGareSoglieApiController');

    // Inserimento Soglie Ranges
    Route::apiResource('inserimento-soglie-ranges', 'InserimentoSoglieRangeApiController');

    // Soggetti Fatturatos
    Route::apiResource('soggetti-fatturatos', 'SoggettiFatturatoApiController');

    // User Parameters
    Route::apiResource('user-parameters', 'UserParametersApiController');

    // Soggetti Relationships
    Route::apiResource('soggetti-relationships', 'SoggettiRelationshipApiController');

    // Grab Data Mexals
    Route::apiResource('grab-data-mexals', 'GrabDataMexalApiController');

    // Exportlogs
    Route::apiResource('exportlogs', 'ExportlogApiController');

    // Dealers
    Route::apiResource('dealers', 'DealerApiController');

    // Dealer Points
    Route::apiResource('dealer-points', 'DealerPointsApiController');

    // Agentis
    Route::apiResource('agentis', 'AgentiApiController');

    // Dealer Mandatis
    Route::apiResource('dealer-mandatis', 'DealerMandatiApiController');
});
