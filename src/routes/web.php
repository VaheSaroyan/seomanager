<?php
Route::post('seo-manager/seo/manager/store-seo', 'Seo\\Manager\\Controllers\\SeoManagerController@store')->name('seo_manager.store');
Route::get('seo-manager/seo/manager/get-page-meta', 'Seo\\Manager\\Controllers\\SeoManagerController@getPageMeta')->name('seo_manager.getPageMeta');
Route::delete('seo-manager/seo/manager/delete-metas/{id}', 'Seo\\Manager\\Controllers\\SeoManagerController@deleteMetas')->name('seo_manager.destroy');
Route::post('seo-manager/seo/manager/settings', 'Seo\\Manager\\Controllers\\SeoManagerController@settings')->name('seo_manager.settings');
