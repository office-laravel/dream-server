<?php

/*
use App\Http\Controllers\Web\ChatController;
use App\Http\Controllers\Web\ClientPackageController;
use App\Http\Controllers\Web\ClientReportController;
use App\Http\Controllers\Web\NotificationController;
use App\Http\Controllers\Web\OptionGroupController;
use App\Http\Controllers\Web\OptionValueController;
use App\Http\Controllers\Web\OrderController;
use App\Http\Controllers\Web\ReportOptionController;
use App\Http\Controllers\Web\VisitorController;
*/
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Web\UserController;
use App\Http\Controllers\Web\LanguageController;

use App\Http\Controllers\Web\MediaStoreController;
use App\Http\Controllers\Web\SettingController;
// use App\Http\Controllers\Web\LocationController;
use App\Http\Controllers\Web\PostController;
use App\Http\Controllers\Web\CategoryController;
use App\Http\Controllers\Web\DreamController;

use App\Http\Controllers\Web\LangPostController;
use App\Http\Controllers\Web\MediaPostController;
// use App\Http\Controllers\Web\MailController;
// use App\Http\Controllers\Web\ClientController;
//use  App\Http\Controllers\Web\ClientAuthController;

// use App\Http\Controllers\Web\SocialController;
// use App\Http\Controllers\Auth\SocialiteController;

use App\Http\Controllers\Web\TranslateController;

// use App\Http\Controllers\Auth\PasswordResetLinkController;
// use App\Http\Controllers\Auth\NewPasswordController;
// use App\Http\Controllers\Web\PasswordController;
// use App\Http\Controllers\Web\ClientPasswordResetController;
// use App\Http\Controllers\Web\PropertyController;
// use App\Http\Controllers\Web\PropertyDepController;
// use App\Http\Controllers\Web\CountryController;

//site
use App\Http\Controllers\HomeController;
// use App\Http\Controllers\Web\SearchController;

// use App\Http\Controllers\Web\CodeController;
use App\Http\Controllers\Auth\GoogleController;
// use App\Http\Controllers\Web\FavoriteController;
// use App\Http\Controllers\Web\ClientSettingController;
use Illuminate\Support\Facades\Artisan;
// use App\Http\Controllers\Web\PrivateImageController;
// use App\Http\Controllers\Web\PackageController;

// use App\Http\Controllers\Web\PaymentController;
use App\Http\Controllers\Api\ChatGPTController;

//use Illuminate\Support\Facades\Facade\Artisan;
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

Route::get('auth/google', [GoogleController::class, 'redirectToGoogle']);
Route::get('auth/google/callback', [GoogleController::class, 'handleGoogleCallback']);


Route::get('/error500', [HomeController::class, 'error500'])->name('error500');
Route::get('/', [HomeController::class, 'index'])->name('site.home');

Route::get('/clear', function () {
    $exitCode = Artisan::call('route:cache');
    $exitCode = Artisan::call('optimize');
    return 'ok';
});

Route::get('/storagelink', function () {
    $exitCode = Artisan::call('storage:link');
    return 'ok';
});

Route::get('/cashclear', function () {
    $exitCode = Artisan::call('cache:clear');
    $exitCode = Artisan::call('config:cache');
    $exitCode = Artisan::call('view:clear');
    return 'ok';
});

Route::get('/askshow', [ChatGPTController::class, 'askshow']);
Route::post('/senddream', [ChatGPTController::class, 'senddream']);
Route::get('/dreams/{slug}', [DreamController::class, 'dreambyslug']);
Route::get('/dreams', [DreamController::class, 'agreedreams']);
Route::middleware(['auth:web', 'verified'])->prefix('admin')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('admin');
    // Route::any('/search', [QuestionController::class, 'search']);

    Route::middleware('role.admin:admin')->group(function () {
        Route::resource('user', UserController::class, ['except' => ['update']]);
        Route::prefix('user')->group(function () {
            Route::post('/update/{id}', [UserController::class, 'update'])->name('user.update');
            Route::get('/editprofile/{id}', [UserController::class, 'editprofile'])->name('user.editprofile');
            Route::post('/updateprofile/{id}', [UserController::class, 'updateprofile'])->name('user.updateprofile');

        });
        ///////////////////////////////
        Route::resource('dream', DreamController::class, ['except' => ['update']]);
        Route::prefix('dream')->group(function () {
            Route::post('/update/{id}', [DreamController::class, 'update'])->name('dream.update');


        });
        /////////////////////////////////////////
        Route::resource('language', LanguageController::class, ['except' => ['update']]);
        Route::prefix('language')->group(function () {
            Route::post('/update/{id}', [LanguageController::class, 'update'])->name('language.update');

        });
        Route::prefix('mediastore')->group(function () {
            Route::get('/getbyid/{id}', [MediaStoreController::class, 'getbyid']);
            Route::delete('/destroyimage/{id}', [MediaStoreController::class, 'destroyimage']);

            //category post
            Route::get('/getcatgallery/{id}', [MediaStoreController::class, 'getcatgallery']);
            Route::get('/getcatvideo/{id}', [MediaStoreController::class, 'getcatvideo']);
            Route::get('/getpostgallery/{id}', [MediaStoreController::class, 'getpostgallery']);
            Route::get('/getpostvideo/{id}', [MediaStoreController::class, 'getpostvideo']);
            Route::get('/getcatpdf/{id}', [MediaStoreController::class, 'getcatpdf']);
        });

        Route::prefix('setting')->group(function () {

            Route::post('/updatetitle', [SettingController::class, 'updatetitle']);
            Route::post('/updatefav', [SettingController::class, 'updatefav']);
            Route::post('/updatelogo', [SettingController::class, 'updatelogo']);
            // Route::post('/updatewhats', [SettingController::class, 'updatewhats']);
            Route::post('/updatelocation', [SettingController::class, 'updatelocation']);
            Route::post('/updatecontactemail', [SettingController::class, 'updatecontactemail']);

            Route::get('/translate', [TranslateController::class, 'translate']);
            ///////////////////////// saraha
            Route::get('/general', [SettingController::class, 'index']);
            //////////////siteinfo
            Route::get('/siteinfo', [SettingController::class, 'getbasic']);
            //  Route::get('/editinfo', [SettingController::class, 'editinfo']);
            Route::post('/updateinfo/{id}', [SettingController::class, 'updateinfo']);
            //////////////header
            Route::get('/head', [SettingController::class, 'getheadinfo']);
            Route::get('/createhead', [SettingController::class, 'createhead']);
            Route::post('/storehead', [SettingController::class, 'storehead']);
            Route::post('/updatehead/{id}', [SettingController::class, 'updatehead']);
            Route::delete('/delhead/{id}', [SettingController::class, 'destroy']);
            //////////////body
            Route::get('/body', [SettingController::class, 'getbodyinfo']);
            Route::get('/createbody', [SettingController::class, 'createbody']);
            Route::post('/storebody', [SettingController::class, 'storebody']);
            Route::post('/updatebody/{id}', [SettingController::class, 'updatebody']);
            Route::delete('/delbody/{id}', [SettingController::class, 'destroy']);
            //////////////footer
            Route::get('/footer', [SettingController::class, 'footerinfo']);
            Route::get('/createfooter', [SettingController::class, 'createfooter']);
            Route::post('/storefooter', [SettingController::class, 'storefooter']);
            Route::post('/updatefooter/{id}', [SettingController::class, 'updatefooter']);
            Route::delete('/delfooter/{id}', [SettingController::class, 'delfooter']);
            //question
            //
            // Route::get('/question', [SettingController::class, 'quessetting']);
            // Route::post('/question/{id}', [SettingController::class, 'quesupdate']);
        });

        //questions
        //category
        // Route::resource('categoryques', CategoryQuesController::class, ['except' => ['update']]);
        // Route::prefix('categoryques')->group(function () {
        //     Route::post('/update/{id}', [CategoryQuesController::class, 'update'])->name('categoryques.update');
        //     Route::get('/sort/{loc}', [LocationController::class, 'sortpage']);
        // });

        //Level
        // Route::resource('level', LevelController::class, ['except' => ['update']]);
        // Route::prefix('level')->group(function () {
        //     Route::post('/update/{id}', [LevelController::class, 'update'])->name('level.update');

        // });
        //questions route
        // Route::resource('question', QuestionController::class, ['except' => ['update']]);
        // Route::prefix('question')->group(function () {
        //     Route::post('/update/{id}', [QuestionController::class, 'update'])->name('question.update');
        //     Route::any('/search', [QuestionController::class, 'search']);
        //     Route::get('result/{id}', [QuestionController::class, 'results']);
        // });
        // Route::prefix('answer')->group(function () {
        //     Route::post('/destroy/{id}', [AnswerController::class,'destroyans']);

        // });
        //footer
        Route::prefix('post')->group(function () {
            Route::post('/update/{id}', [PostController::class, 'update'])->name('post.update');
            Route::post('/updatefooter/{id}', [PostController::class, 'updatefooter'])->name('post.updatefooter');
            Route::get('/showbycatid/{id}', [PostController::class, 'showbycatid']);
            Route::get('/createbycatid/{id}', [PostController::class, 'createwithcatid']);
            Route::post('/storepost', [PostController::class, 'storepost']);
            Route::post('/updatepost/{id}', [PostController::class, 'updatepost']);
            Route::delete('/destroy/{id}', [PostController::class, 'destroy']);
            Route::get('/editpost/{id}', [PostController::class, 'editpost']);
            Route::post('/upload', [PostController::class, 'uploadLargeFiles'])->name('post.upload');
        });
        Route::prefix('langpost')->group(function () {
            Route::post('/update/{id}', [LangPostController::class, 'update'])->name('langpost.update');
            Route::post('/updatecategory/{id}', [LangPostController::class, 'updatelangcategory'])->name('langcategory.update');
            Route::post('/updatepropdep/{id}', [LangPostController::class, 'updatepropdep'])->name('langpost.updatepropdep');
            Route::post('/updateprop/{id}', [LangPostController::class, 'updateprop'])->name('langpost.updateprop');
            Route::post('/updateoption/{id}', [LangPostController::class, 'updateoption'])->name('langpost.updateoption');

        });

        //category menu
        Route::prefix('category')->group(function () {

            Route::post('/updatemenu/{id}', [CategoryController::class, 'updatemenu'])->name('category.updatemenu');

        });
        Route::prefix('page')->group(function () {
            Route::get('/', [CategoryController::class, 'index']);
            //////////////header
            Route::get('/create', [CategoryController::class, 'create']);
            Route::post('/store', [CategoryController::class, 'store']);
            Route::get('/edit/{id}', [CategoryController::class, 'edit']);

            Route::post('/update/{id}', [CategoryController::class, 'update']);
            Route::delete('/delete/{id}', [CategoryController::class, 'destroy']);
            //sort

        });

        Route::prefix('mediapost')->group(function () {
            Route::post('/store/{id}', [MediaPostController::class, 'storeimages'])->name('mediapost.store');
            Route::post('/update/{id}', [MediaPostController::class, 'update'])->name('mediapost.update');
            Route::post('/storevideo/{id}', [MediaPostController::class, 'storevideo'])->name('mediapost.storevideo');
            Route::post('/updatevideo/{id}', [MediaPostController::class, 'updatevideo'])->name('mediapost.updatevideo');
        });

    });


    //question admin
    Route::prefix('translate')->group(function () {
        // Route::post('/update/{id}', [TranslateController::class, 'update'])->name('post.update');    
        Route::get('/showbycatid/{id}', [TranslateController::class, 'showbycatid']);
        Route::get('/create', [TranslateController::class, 'createwithcatid']);
        Route::post('/store', [TranslateController::class, 'storepost']);
        Route::post('/update/{id}', [TranslateController::class, 'updatepost']);
        Route::delete('/destroy/{id}', [TranslateController::class, 'destroy']);
        Route::get('/edit/{id}', [TranslateController::class, 'editpost']);
        // Route::post('/upload', [TranslateController::class, 'uploadLargeFiles'])->name('post.upload');;

    });



    //married





    //package


    //
    Route::middleware('role.admin:admin-super')->group(function () {
    });

});

//////////////////////////////end dashborad////////////////////////////////


//site 
//password
Route::get('/page/{slug}', [HomeController::class, 'showpage']);


//


Route::prefix('{lang}')->group(function () {
    Route::get('/home', [HomeController::class, 'index']);

    // Route::get('/scores', [ClientController::class, 'scores']);
    //Route::get('/{slug}', [ClientController::class, 'send_message']);


    Route::get('/page/{slug}', [HomeController::class, 'showpage']);

});

//     Route::prefix('{lang}')->group(function () {
//     Route::get('/vote/{slug}', [HomeController::class, 'getques']);
// });
//vote
//  Route::post('/addvote/{slug}', [AnswerController::class, 'addvote']);

//can only logout without verify




require __DIR__ . '/auth.php';

