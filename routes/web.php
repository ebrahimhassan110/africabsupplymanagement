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
Route::get('logout', '\app\Http\Controllers\Auth\LoginController@logout');
Route::group(['middleware' => ['get.menu']], function () {


        Auth::routes();
        Route::group(['middleware' => ['auth']], function () {

        Route::get('/', 'DashboardController@index')->name("dashboard");
        Route::get('/employee/register','\App\Http\Controllers\admin\UsersController@register')->name('register');
        Route::post('/employee/register','\App\Http\Controllers\admin\UsersController@store')->name('register');
        Route::put('/employee/update','\App\Http\Controllers\admin\UsersController@update')->name('update_employee');

        Route::resource('resource/{table}/resource', 'ResourceController')->names([
            'index'     => 'resource.index',
            'create'    => 'resource.create',
            'store'     => 'resource.store',
            'show'      => 'resource.show',
            'edit'      => 'resource.edit',
            'update'    => 'resource.update',
            'destroy'   => 'resource.destroy'
        ]);

        Route::resource('bread',  'BreadController');   //create BREAD (resource)
        Route::resource('users',        'UsersController')->except( ['create', 'store'] );
        Route::resource('roles',        'RolesController');
        Route::resource('mail',        'MailController');
        Route::get('prepareSend/{id}',        'MailController@prepareSend')->name('prepareSend');
        Route::post('mailSend/{id}',        'MailController@send')->name('mailSend');
        Route::get('/roles/move/move-up',      'RolesController@moveUp')->name('roles.up');
        Route::get('/roles/move/move-down',    'RolesController@moveDown')->name('roles.down');
        Route::prefix('menu/element')->group(function () {
            Route::get('/',             'MenuElementController@index')->name('menu.index');
            Route::get('/move-up',      'MenuElementController@moveUp')->name('menu.up');
            Route::get('/move-down',    'MenuElementController@moveDown')->name('menu.down');
            Route::get('/create',       'MenuElementController@create')->name('menu.create');
            Route::post('/store',       'MenuElementController@store')->name('menu.store');
            Route::get('/get-parents',  'MenuElementController@getParents');
            Route::get('/edit',         'MenuElementController@edit')->name('menu.edit');
            Route::post('/update',      'MenuElementController@update')->name('menu.update');
            Route::get('/show',         'MenuElementController@show')->name('menu.show');
            Route::get('/delete',       'MenuElementController@delete')->name('menu.delete');
        });
        Route::prefix('menu/menu')->group(function () {
            Route::get('/',         'MenuController@index')->name('menu.menu.index');
            Route::get('/create',   'MenuController@create')->name('menu.menu.create');
            Route::post('/store',   'MenuController@store')->name('menu.menu.store');
            Route::get('/edit',     'MenuController@edit')->name('menu.menu.edit');
            Route::post('/update',  'MenuController@update')->name('menu.menu.update');
            Route::get('/delete',   'MenuController@delete')->name('menu.menu.delete');
        });


        Route::post('/workplan/checkAvailability',  'WorkflowController@checkAvailability')->name('workplan-checkAvailability');
        Route::post('/workplan/getfreehelper',  'WorkflowController@getFreeHelper')->name('workplan-getfreehelper');
        Route::get('/Workflow/getworkplan',   'WorkflowController@getWorkplan')->name('workplan-getworkplan');
        Route::post('/Workflow/filter',   'WorkflowController@filter')->name('workplan-filter');
        Route::resource('Workflow', WorkflowController::class);
		
		
		Route::get('/prebooking/activate/{id}', 'PreBookingController@activate')->name('prebooking-activate');
		Route::post('/prebooking/activate/{id}', 'PreBookingController@activatepost')->name('prebooking-activate-post');
        Route::delete('/prebooking/removebooking/{id}', 'PreBookingController@removeBooking')->name("prebooking.removebooking");
		Route::resource('prebooking', PreBookingController::class);
		Route::resource('booking', BookingController::class);
		
        Route::resource('currency', CurrencyController::class);
        Route::resource('Feetype', FeeTypeController::class);
		    Route::resource('institute', InstituteController::class);
        Route::post('/attendance/search', 'AttendanceController@search')->name("attendance-search");
        Route::resource('Attendance', AttendanceController::class);

        Route::resource('adjustment', AdjustmentController::class);
		
		// Route::post('/shipments', 'ShipmentController@store')->name("shipping-store");
       Route::get('/shipment/getPFI/{id}','ShipmentController@getPFI')->name('shipping-getPFI');
         Route::get('/adjustment/getPFI/{id}','AdjustmentController@getPFI')->name('adjustment-getPFI');
        Route::get('/shipment/getBl/','ShipmentController@getBl')->name('shipping-getBl');
         Route::get('/shipment/getBooking/{id}','ShipmentController@getBooking')->name('shipping-getBooking');
		Route::get('/shipment/getBookingPart/{id}','ShipmentController@getBookingPart')->name('shipping-getBookingPart');
		Route::resource('shipment', ShipmentController::class);

        Route::resource('shipment_local', ShipmentLocalController::class);


        Route::resource('Recordregister', RecordRegisterController::class);


        Route::get('/supplier/individual/report', 'ReportSupplierIndividualController@index')->name("supplier-individual-report");
        Route::post('/supplier/individual/report', 'ReportSupplierIndividualController@show')->name("supplier-individual-report");

        Route::get('/shipment/custom_declaration/report', 'ReportShipmentProcessingController@index')->name("shipment-processing-report");

        Route::get('/workplan/report', 'ReportWorkPlanController@index')->name("workplan-report");
        Route::post('/workplan/report', 'ReportWorkPlanController@show')->name("workplan-report");


        Route::get('/timesheetforclient/report', 'ReportTimeSheetClientController@index')->name("timesheetclient-report");
        Route::post('/timesheetforclient/report', 'ReportTimeSheetClientController@show')->name("timesheetclient-report");
        
        Route::get('/payment/getdata', 'PaymentController@getData')->name("payment.getdata");
        Route::get('/payment/list', 'PaymentController@paymentlist')->name("payment.list");
        Route::post('/payment/list', 'PaymentController@paymentlistfilter')->name("payment.paymentlistfilter");
        Route::get('/payment/addpayment', 'PaymentController@addpayment')->name("payment.addpayment");
        Route::post('/payment/filterbooking', 'PaymentController@filterBooking')->name("payment.filterbooking");
        Route::resource('payment', PaymentController::class);

        Route::prefix('media')->group(function () {
            Route::get('/',                 'MediaController@index')->name('media.folder.index');
            Route::get('/folder/store',     'MediaController@folderAdd')->name('media.folder.add');
            Route::post('/folder/update',   'MediaController@folderUpdate')->name('media.folder.update');
            Route::get('/folder',           'MediaController@folder')->name('media.folder');
            Route::post('/folder/move',     'MediaController@folderMove')->name('media.folder.move');
            Route::post('/folder/delete',   'MediaController@folderDelete')->name('media.folder.delete');;

            Route::post('/file/store',      'MediaController@fileAdd')->name('media.file.add');
            Route::get('/file',             'MediaController@file');
            Route::post('/file/delete',     'MediaController@fileDelete')->name('media.file.delete');
            Route::post('/file/update',     'MediaController@fileUpdate')->name('media.file.update');
            Route::post('/file/move',       'MediaController@fileMove')->name('media.file.move');
            Route::post('/file/cropp',      'MediaController@cropp');
            Route::get('/file/copy',        'MediaController@fileCopy')->name('media.file.copy');
        });


            Route::get('/colors', function () {     return view('dashboard.colors'); });
            Route::get('/typography', function () { return view('dashboard.typography'); });
            Route::get('/charts', function () {     return view('dashboard.charts'); });
            Route::get('/widgets', function () {    return view('dashboard.widgets'); });
            Route::get('/404', function () {        return view('dashboard.404'); });
            Route::get('/500', function () {        return view('dashboard.500'); });
            Route::prefix('base')->group(function () {
                Route::get('/breadcrumb', function(){   return view('dashboard.base.breadcrumb'); });
                Route::get('/cards', function(){        return view('dashboard.base.cards'); });
                Route::get('/carousel', function(){     return view('dashboard.base.carousel'); });
                Route::get('/collapse', function(){     return view('dashboard.base.collapse'); });

                Route::get('/forms', function(){        return view('dashboard.base.forms'); });
                Route::get('/jumbotron', function(){    return view('dashboard.base.jumbotron'); });
                Route::get('/list-group', function(){   return view('dashboard.base.list-group'); });
                Route::get('/navs', function(){         return view('dashboard.base.navs'); });

                Route::get('/pagination', function(){   return view('dashboard.base.pagination'); });
                Route::get('/popovers', function(){     return view('dashboard.base.popovers'); });
                Route::get('/progress', function(){     return view('dashboard.base.progress'); });
                Route::get('/scrollspy', function(){    return view('dashboard.base.scrollspy'); });

                Route::get('/switches', function(){     return view('dashboard.base.switches'); });
                Route::get('/tables', function () {     return view('dashboard.base.tables'); });
                Route::get('/tabs', function () {       return view('dashboard.base.tabs'); });
                Route::get('/tooltips', function () {   return view('dashboard.base.tooltips'); });
            });
            Route::prefix('buttons')->group(function () {
                Route::get('/buttons', function(){          return view('dashboard.buttons.buttons'); });
                Route::get('/button-group', function(){     return view('dashboard.buttons.button-group'); });
                Route::get('/dropdowns', function(){        return view('dashboard.buttons.dropdowns'); });
                Route::get('/brand-buttons', function(){    return view('dashboard.buttons.brand-buttons'); });
            });
            Route::prefix('icon')->group(function () {  // word: "icons" - not working as part of adress
                Route::get('/coreui-icons', function(){         return view('dashboard.icons.coreui-icons'); });
                Route::get('/flags', function(){                return view('dashboard.icons.flags'); });
                Route::get('/brands', function(){               return view('dashboard.icons.brands'); });
            });
            Route::prefix('notifications')->group(function () {
                Route::get('/alerts', function(){   return view('dashboard.notifications.alerts'); });
                Route::get('/badge', function(){    return view('dashboard.notifications.badge'); });
                Route::get('/modals', function(){   return view('dashboard.notifications.modals'); });
            });
            Route::resource('notes', 'NotesController');
			Route::get('/supplier/view/{id}','SupplierController@view')->name('supplier-show');
            Route::resource('supplier', SupplierController::class);
        });
});
