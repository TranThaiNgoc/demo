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


Auth::routes();
Route::group(['prefix' => '/', 'middleware' => ['auth', 'role:supperadmin,admin']],function(){
	Route::get('/','HomeController@getAdmin')->name('admin');

	Route::group(['prefix' => 'bu'], function(){
		Route::get('/', 'BuController@getList')->name('bu.list');
		// Route::get('add', 'BuController@getAdd')->name('bu.add');
		Route::post('/', 'BuController@postAdd');
		Route::get('edit/{id}', 'BuController@getEdit')->name('bu.edit');
		Route::post('edit/{id}', 'BuController@postEdit');
		Route::get('detail/{id}', 'BuController@getDetail')->name('bu.detail');
		Route::get('delete/{id}', 'BuController@getDelete')->name('bu.delete');
		Route::get('chart/{id}', 'BuController@getChart')->name('bu.chart');
		Route::post('chart/{id}', 'BuController@postChart');
		Route::post('add-produce/{id}', 'BuController@postAddProduct');
		Route::get('delete-produce/{id}', 'BuController@getDeleteProduce')->name('bu.delete.produce');
		Route::post('add-variable/{id}', 'BuController@postAddvariable');
		Route::get('delete-variable/{id}', 'BuController@getDeletevariable')->name('bu.delete.variable');
		Route::post('add-fixed/{id}', 'BuController@postAddFixed');
		Route::get('delete-fixed/{id}', 'BuController@getDeleteFixed')->name('bu.delete.fixed');
		Route::post('add-revenue/{id}', 'BuController@postAddRevenue');
		Route::get('delete-revenue/{id}', 'BuController@getDeleteRevenue')->name('bu.delete.revenue');
		Route::post('add-profit/{id}', 'BuController@postAddProfit');
		Route::get('delete-profix/{id}', 'BuController@getDeleteProfix')->name('bu.delete.profix');
		Route::get('excel.produce/{id}', 'export\ExportProController@getExcelProduce')->name('admin.bu.export.produce');
		Route::get('excel.produce.variable', 'export\ExportBu_Pro_VariableController@getExcel')->name('admin.bu.export.produce.variable');
		Route::get('pdf/{id}', 'BuController@getPDF')->name('admin.bu.pdf.produce');
		Route::post('import/{id}', 'BuController@postImportProduce');
	});

	Route::group(['prefix' => 'produce'], function(){
		Route::post('add-proline/{bu}/{id}', 'ProduceController@postAddProline');
		Route::get('delete-proline/{bu}/{id}', 'ProduceController@getDeleteProline')->name('delete.proline');
		Route::get('edit-produce/{bu}/{id}', 'ProduceController@getEditProduce')->name('edit.produce');
		Route::post('edit-produce/{bu}/{id}', 'ProduceController@postEditProduct');
		Route::post('add-variable/{bu}/{id}', 'ProduceController@postAddVariable');
		Route::get('delete-variable/{bu}/{id}', 'ProduceController@getDeleteAvariable')->name('produce.delete.variable');
		Route::post('add-fixed/{bu}/{id}', 'ProduceController@postAddFixed');
		Route::get('delete-fixed/{bu}/{id}', 'ProduceController@getDeleteFixed')->name('produce.delete.fixed');
		Route::post('add-revenue/{bu}/{id}', 'ProduceController@postAddRevenue');
		Route::get('delete-revenue/{bu}/{id}', 'ProduceController@getDeleteRevenue')->name('produce.delete.revenue');
		Route::post('add-profix/{bu}/{id}', 'ProduceController@postAddProfix');
		Route::get('delete-profix/{bu}/{id}', 'ProduceController@getDeleteProdic')->name('produce.delete.profix');
	});

	Route::group(['prefix' => 'proline'], function(){
		Route::get('edit-proline/{bu}/{pro}/{id}', 'ProlineController@getEditProline')->name('edit.proline');
		Route::post('edit-proline/{bu}/{pro}/{id}', 'ProlineController@postEditProline');
		Route::post('add-variable/{bu}/{pro}/{id}', 'ProlineController@postAddVariable');
		Route::get('delete-variable/{bu}/{pro}/{id}', 'ProlineController@getDeleteVariable')->name('delete.variable');
		Route::post('add-fixed/{bu}/{pro}/{id}', 'ProlineController@postAddFixed');
		Route::get('delete-fixed/{bu}/{pro}/{id}', 'ProlineController@getDeleteFixed')->name('delete.fixed');
		Route::post('add-revenue/{bu}/{pro}/{id}', 'ProlineController@postAddRevenue');
		Route::get('delete-revenue/{bu}/{pro}/{id}', 'ProlineController@getRevenue')->name('delete.revenue');
		Route::post('add-profix/{bu}/{pro}/{id}', 'ProlineController@postAddProfix');
		Route::get('delete-profix/{bu}/{pro}/{id}', 'ProlineController@getProfix')->name('delete.profix');
	});
	
	Route::group(['prefix' => 'Bucategory'],function(){
		Route::get('/', 'BucategoryController@getlist')->name('admin.bucategory.list');
		// Route::get('add', 'BucategoryController@getadd')->name('admin.bucategory.add');
		Route::post('/', 'BucategoryController@postadd');
		Route::get('edit/{id}', 'BucategoryController@getedit')->name('admin.bucategory.edit');
		Route::post('edit/{id}', 'BucategoryController@postedit');
		Route::get('delete/{id}', 'BucategoryController@getdelete')->name('admin.bucategory.delete');
	});

	Route::group(['prefix' => 'Procategory'],function(){
		Route::get('/', 'ProcategoryController@getlist')->name('admin.procategory.list');
		// Route::get('add', 'ProcategoryController@getadd')->name('admin.procategory.add');
		Route::post('/', 'ProcategoryController@postadd');
		Route::get('edit/{id}', 'ProcategoryController@getedit')->name('admin.procategory.edit');
		Route::post('edit/{id}', 'ProcategoryController@postedit');
		Route::get('delete/{id}', 'ProcategoryController@getdelete')->name('admin.procategory.delete');
	});

	Route::group(['prefix' => 'Prolinecategory'],function(){
		Route::get('/', 'ProlinecategoryController@getlist')->name('admin.prolinecategory.list');
		// Route::get('add', 'ProlinecategoryController@getadd')->name('admin.prolinecategory.add');
		Route::post('/', 'ProlinecategoryController@postadd');
		Route::get('edit/{id}', 'ProlinecategoryController@getedit')->name('admin.prolinecategory.edit');
		Route::post('edit/{id}', 'ProlinecategoryController@postedit');
		Route::get('delete/{id}', 'ProlinecategoryController@getdelete')->name('admin.prolinecategory.delete');
	});

	Route::group(['prefix' => 'Costcategory'],function(){
		Route::get('/', 'CostcategoryController@getlist')->name('admin.costcategory.list');
		// Route::get('add', 'CostcategoryController@getadd')->name('admin.costcategory.add');
		Route::post('/', 'CostcategoryController@postadd');
		Route::get('edit/{id}', 'CostcategoryController@getedit')->name('admin.costcategory.edit');
		Route::post('edit/{id}', 'CostcategoryController@postedit');
		Route::get('delete/{id}', 'CostcategoryController@getdelete')->name('admin.costcategory.delete');
	});

	Route::group(['prefix' => 'Revenuecategory'],function(){
		Route::get('/', 'RenvenuecategoryController@getlist')->name('admin.renvenuecategory.list');
		// Route::get('add', 'RenvenuecategoryController@getadd')->name('admin.renvenuecategory.add');
		Route::post('/', 'RenvenuecategoryController@postadd');
		Route::get('edit/{id}', 'RenvenuecategoryController@getedit')->name('admin.renvenuecategory.edit');
		Route::post('edit/{id}', 'RenvenuecategoryController@postedit');
		Route::get('delete/{id}', 'RenvenuecategoryController@getdelete')->name('admin.renvenuecategory.delete');
	});

	Route::group(['prefix' => 'Itemcategory'],function(){
		Route::get('/', 'ItemcategoryController@getlist')->name('admin.itemcategory.list');
		// Route::get('add', 'ItemcategoryController@getadd')->name('admin.itemcategory.add');
		Route::post('/', 'ItemcategoryController@postadd');
		Route::get('edit/{id}', 'ItemcategoryController@getedit')->name('admin.itemcategory.edit');
		Route::post('edit/{id}', 'ItemcategoryController@postedit');
		Route::get('delete/{id}', 'ItemcategoryController@getdelete')->name('admin.itemcategory.delete');
	});

	Route::group(['prefix' => 'Unit'],function(){
		Route::get('/', 'UnitController@getlist')->name('admin.unit.list');
		// Route::get('add', 'UnitController@getadd')->name('admin.unit.add');
		Route::post('/', 'UnitController@postadd');
		Route::get('edit/{id}', 'UnitController@getedit')->name('admin.unit.edit');
		Route::post('edit/{id}', 'UnitController@postedit');
		Route::get('delete/{id}', 'UnitController@getdelete')->name('admin.unit.delete');
	});

	Route::group(['prefix' => 'Status'],function(){
		Route::get('/', 'StatusController@getlist')->name('admin.status.list');
		// Route::get('add', 'StatusController@getadd')->name('admin.status.add');
		Route::post('/', 'StatusController@postadd');
		Route::get('edit/{id}', 'StatusController@getedit')->name('admin.status.edit');
		Route::post('edit/{id}', 'StatusController@postedit');
		Route::get('delete/{id}', 'StatusController@getdelete')->name('admin.status.delete');
	});


	// Route::group(['prefix' => 'product', 'middleware' => ['role:supperadmin,admin']],function(){
	// 	Route::get('/', 'ProductController@getlist')->name('admin.product');
	// 	Route::get('add', 'ProductController@getadd')->name('admin.product.add');
	// 	Route::post('add', 'ProductController@postadd');
	// 	Route::get('edit/{id}', 'ProductController@getedit')->name('admin.product.edit');
	// 	Route::post('edit/{id}', 'ProductController@postedit');
	// 	Route::get('delete/{id}', 'ProductController@getdelete')->name('admin.product.delete');
	// });

	Route::group(['prefix' => 'news', 'middleware' => ['role:supperadmin,admin,user']],function(){
		Route::get('/', 'NewsController@getlist')->name('admin.news');
		Route::get('add', 'NewsController@getadd')->name('admin.news.add');
		Route::post('add', 'NewsController@postadd');
		Route::get('edit/{id}', 'NewsController@getedit')->name('admin.news.edit');
		Route::post('edit/{id}', 'NewsController@postedit');
		Route::get('delete/{id}', 'NewsController@getdelete')->name('admin.news.delete');
	});

	// Route::group(['prefix' => 'career'],function(){
	// 	Route::get('/', 'CareerController@getlist')->name('admin.career');
	// 	Route::get('add', 'CareerController@getadd')->name('admin.career.add');
	// 	Route::post('add', 'CareerController@postadd');
	// 	Route::get('edit/{id}', 'CareerController@getedit')->name('admin.career.edit');
	// 	Route::post('edit/{id}', 'CareerController@postedit');
	// 	Route::get('delete/{id}', 'CareerController@getdelete')->name('admin.career.delete');
	// });

	Route::group(['prefix' => 'configuration'],function(){
		Route::get('/', 'ConfigurationController@getadd')->name('admin.configuration.add');
		Route::post('/', 'ConfigurationController@postadd');
	});

	// Route::group(['prefix' => 'order'],function(){
	// 	Route::get('/', 'OrderController@getlist')->name('admin.order');
	// 	Route::get('edit/{id}', 'OrderController@getedit')->name('admin.order.edit');
	// 	Route::post('edit/{id}', 'OrderController@postedit');
	// 	Route::get('delete/{id}', 'OrderController@getdelete')->name('admin.order.delete');
	// });

	// Route::group(['prefix' => 'project'],function(){
	// 	Route::get('/', 'ProjectController@getlist')->name('admin.project');
	// 	Route::get('add', 'ProjectController@getadd')->name('admin.project.add');
	// 	Route::get('/', 'ProjectController@getlist')->name('admin.project');
	// 	Route::get('edit/{id}', 'ProjectController@getedit')->name('admin.project.edit');
	// 	Route::post('edit/{id}', 'ProjectController@postedit');
	// 	Route::get('delete/{id}', 'ProjectController@getdelete')->name('admin.project.delete');
	// });

	Route::group(['prefix' => 'user'],function(){
		Route::get('/', 'UserController@getlist')->name('admin.user');
		Route::get('add', 'UserController@getadd')->name('admin.user.add');
		Route::post('add', 'UserController@postadd');
		Route::get('edit/{id}', 'UserController@getedit')->name('admin.user.edit');
		Route::post('edit/{id}', 'UserController@postedit');
		Route::get('delete/{id}', 'UserController@getdelete')->name('admin.user.delete');
	});

	// Route::group(['prefix' => 'ajax'], function(){
	// 	Route::get('product_type/{id_categories}','AjaxController@getProduct_type');
	// });
});

Route::get('/home', 'HomeController@index')->name('home');
