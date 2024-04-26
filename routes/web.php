<?php

use App\Exceptions\WebException;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BankAccountController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CostController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\HeadHealthController;
use App\Http\Controllers\InstructionsController;
use App\Http\Controllers\LawController;
use App\Http\Controllers\PlaceController;
use App\Http\Controllers\TransportationController;
use App\Http\Controllers\TypeDestinationController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\AdminMiddleware;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return redirect('login');
});


Route::get('/login', [AuthController::class, 'login'])->middleware('guest');
Route::post('/login', [AuthController::class, 'postLogin'])->name('login');

// Route::get('/dashboard', function () {
//     // return view('admin.dashboard');
// });



Route::middleware([AdminMiddleware::class])->prefix('admin')->group(function () {


    Route::get('/forgotpassword', function () {
        return view('auth.forgotpassword');
    })->name('forgotpassword');

    Route::put('/forgotpassword', [UserController::class, "updatePassword"])->name('update-password');

    Route::get('dashboard', [DashboardController::class, "index"])->name('dashboard');
    Route::get('index', [DashboardController::class, "index"]);
    Route::prefix("master")->group(function () {
        Route::get("destination", function () {
        });

        // employee routes
        Route::get("employee", [EmployeeController::class, "employees"])->name('employee');
        Route::delete("employee", [EmployeeController::class, "deleteEmployee"])->name('employee-delete');
        Route::get("employee/create", function () {
            return view('admin.add.employee-add');
        })->name('add-employee');
        Route::get("employee/edit/{id}", [EmployeeController::class, "editEmployee"])->name('edit-employee');
        Route::put("employee/edit/{id}", [EmployeeController::class, "updateEmployee"])->name('employee-put');
        Route::post("employee/create", [EmployeeController::class, "storeEmployee"])->name("employee-post");
        Route::post("employee/import", [EmployeeController::class, "importEmployee"])->name("employee-import");
        Route::get("employee/templates", [EmployeeController::class, "downloadTemplate"])->name("employee-templates");
        Route::get("employee/export", [EmployeeController::class, "export"])->name('employee-export');

        // cadress routes
        Route::get("cadress", [EmployeeController::class, "cadress"])->name('cadress');
        Route::get("cadress/edit/{id}", [EmployeeController::class, "editCadress"])->name('edit-cadress');
        Route::put("cadress/edit/{id}", [EmployeeController::class, "updateCadress"])->name('cadress-put');
        Route::post("cadress/import", [EmployeeController::class, "importCadress"])->name("cadress-import");
        Route::post("cadress", [EmployeeController::class, "storeCadress"])->name('cadress-post');
        Route::get("cadress/export", [EmployeeController::class, "export_cadress"])->name('cadress-export');

        Route::get("cadress/create", function () {
            return view('admin.add.cadress-add');
        })->name('add-cadress');

        // type destination routes
        Route::get("type-destination", [TypeDestinationController::class, 'index'])->name('type-destination');
        Route::delete("type-destination", [TypeDestinationController::class, 'delete'])->name('type-destination-delete');
        Route::post("type-destination/create", [TypeDestinationController::class, "store"])->name('type-destination-post');
        Route::get("type-destination/create", function () {
            return view("admin.add.type-destination-add");
        })->name('add-type-destination');
        Route::get("type-destination/edit/{id}", [TypeDestinationController::class, "edit"])->name('edit-type-destination');
        Route::put("type-destination/edit/{id}", [TypeDestinationController::class, "update"])->name('type-destination-put');
        Route::post("type-destination/import", [TypeDestinationController::class, "import"])->name('type-destination-import');
        Route::get("type-destination/templates", [TypeDestinationController::class, "downloadTemplate"])->name('type-destination-template');
        Route::get("type-destination/export", [TypeDestinationController::class, "export"])->name('type-destination-export');
        // place routes
        Route::get("place", [PlaceController::class, "index"])->name('place');
        Route::delete("place", [PlaceController::class, "delete"])->name('place-delete');
        Route::get("place/create", function () {
            return view('admin/add/place-add');
        })->name('add-place');
        Route::get("place/edit/{id}", [PlaceController::class, "edit"])->name('edit-place');
        Route::post("place/create", [PlaceController::class, "store"])->name('place-post');
        Route::put("place/edit/{id}", [PlaceController::class, "update"])->name('place-put');
        Route::post("place/import", [PlaceController::class, "import"])->name("place-import");
        Route::get("place/templates", [PlaceController::class, "downloadTemplate"])->name('place-template');
        Route::get("place/export", [PlaceController::class, "export"])->name('place-export');

        // bank account routes
        Route::get("bank-account", [BankAccountController::class, "index"])->name('bank-account');
        Route::delete("bank-account", [BankAccountController::class, "delete"])->name('bank-account-delete');
        Route::post("bank-account/create", [BankAccountController::class, "store"])->name('bank-account-post');
        Route::get("bank-account/create", function () {
            return view('admin.add.bank-account-add');
        })->name('add-bank-account');
        Route::get("bank-account/edit/{id}", [BankAccountController::class, "edit"])->name('edit-bank-account');
        Route::put("bank-account/edit/{id}", [BankAccountController::class, "update"])->name('bank-account-put');
        Route::post("bank-account/import", [BankAccountController::class, "import"])->name('bank-account-import');
        Route::get("bank-account/templates", [BankAccountController::class, "downloadTemplate"])->name("bank-account-template");
        Route::get("bank-account/export", [BankAccountController::class, "export"])->name('bank-account-export');


        // cost routes
        Route::get("cost", [CostController::class, "index"])->name('cost');
        Route::delete("cost", [CostController::class, "delete"])->name('cost-delete');
        Route::post("cost/create", [CostController::class, "store"])->name('cost-post');
        Route::put("cost/edit/{id}", [CostController::class, "update"])->name('cost-put');
        Route::get("cost/templates", [CostController::class, "downloadTemplate"])->name('cost-template');
        Route::post("cost/import", [CostController::class, "import"])->name('cost-import');
        Route::get("cost/create", function () {
            return view('admin.add.cost-add');
        })->name('add-cost');
        Route::get("cost/edit/{id}", [CostController::class, "edit"])->name('edit-cost');
        Route::get("cost/export", [CostController::class, "export"])->name('cost-export');


        // transportation routes
        Route::get("transportation", [TransportationController::class, "index"])->name('transportation');
        Route::delete("transportation", [TransportationController::class, "delete"])->name('transportation-delete');
        Route::post("transportation/create", [TransportationController::class, "store"])->name('transportation-post');
        Route::get("transportation/create", function () {
            return view('admin.add.transportation-add');
        })->name('add-transportation');
        Route::put("transportation/edit/{id}", [TransportationController::class, "update"])->name('transportation-put');
        Route::get("transportation/edit/{id}", [TransportationController::class, "edit"])->name('edit-transportation');
        Route::post('transportation/import', [TransportationController::class, "import"])->name("transportation-import");
        Route::get("transportation/templates", [TransportationController::class, "downloadTemplate"])->name('transportation-template');
        Route::get("transportation/export", [TransportationController::class, "export"])->name('transportation-export');


        // categories routes
        Route::get("categories", [CategoryController::class, "index"])->name('categories');
        Route::delete("categories", [CategoryController::class, "delete"])->name('categories-delete');
        Route::post("categories/create", [CategoryController::class, "store"])->name('categories-post');
        Route::get("categories/create", function () {
            return view('admin.add.categories-add');
        })->name('add-categories');
        Route::get("categories/edit/{id}", [CategoryController::class, "edit"])->name('edit-categories');
        Route::put("categories/edit/{id}", [CategoryController::class, "update"])->name('categories-put');
        Route::get("categories/templates", [CategoryController::class, "downloadTemplate"])->name("categories-template");
        Route::post("categories/import", [CategoryController::class, "import"])->name("categories-import");
        Route::get("categories/export", [CategoryController::class, "export"])->name('categories-export');

        // account routes
        Route::get("account", [AccountController::class, "index"])->name('account');
        Route::delete("account", [AccountController::class, "delete"])->name('account-delete');
        Route::post("account", [AccountController::class, "store"])->name('account-post');
        Route::put("account/edit/{id}", [AccountController::class, "update"])->name('account-put');
        Route::get("account/create", function () {
            return view('admin.add.account-add');
        })->name('add-account');
        Route::get("account/edit/{id}", [AccountController::class, "edit"])->name('edit-account');

        // users routes
        Route::get("user", [UserController::class, "index"])->name('user');
        Route::delete("user", [UserController::class, "delete"])->name('user-delete');
        Route::post("user", [UserController::class, "store"])->name('user-post');
        Route::get("user/create", function () {
            return view('admin.add.user-add');
        })->name('add-user');
        Route::get("user/edit/{id}", [UserController::class, "edit"])->name('edit-user');
        Route::put("user/edit/{id}", [UserController::class, "update"])->name('user-put');

        // logout
        Route::post("logout", [AuthController::class, "logout"])->name('logout');
        // kapus
        Route::get("head-health", [HeadHealthController::class, "index"])->name('head-health');
        Route::get("head-health/create", [HeadHealthController::class, "create"])->name('add-head-health');
        Route::post("head-health/create", [HeadHealthController::class, "store"])->name('head-health-post');
        Route::get("head-health/edit/{id}", [HeadHealthController::class, "edit"])->name('edit-head-health');
        Route::put("head-health/edit/{id}", [HeadHealthController::class, "update"])->name('head-health-put');

        // law
        Route::get("law", [LawController::class, "index"])->name('law');
        Route::get("law-add", function () {
            return view('admin.add.law-add');
        })->name('law-add');
        Route::get("law-edit/{id}", [LawController::class, "edit"])->name('law-edit');
        Route::put("law-edit/{id}", [LawController::class, "update"])->name('law-put');

        Route::post("law/create", [LawController::class, "store"])->name('law-post');
    });
    Route::get("spt", [InstructionsController::class, "index"])->name('spt');
    Route::get("spt/create", [InstructionsController::class, "create"])->name('add-spt');
    Route::post("spt/create", [InstructionsController::class, "store"])->name('spt-post');
    Route::delete("spt", [InstructionsController::class, "delete"])->name('spt-delete');

    Route::get("spt/edit/{id}", [InstructionsController::class, "edit"])->name('edit-spt');
    Route::get("spt/detail/{id}", [InstructionsController::class, "detail"])->name('detail-spt');
    Route::get("bku/export", [InstructionsController::class, "export_bku"])->name('bku-export');
    Route::get("spt/export/{id}", [InstructionsController::class, "export_spt"])->name('spt-export');

    Route::put("spt/edit/{id}" , [InstructionsController::class , "update"])->name('spt-put');

    Route::get("spt/detail/{id}/sppd/export/{userId}", [InstructionsController::class, "export_sppd"])->name('sppd-export');

    // head health

});

Route::get("error-404", function () {
    return view('admin.404');
})->name('error-404');
// Route::get("coba", function () {
//     return view("admin.coba");
// });