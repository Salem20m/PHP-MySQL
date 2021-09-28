<?php


    use Illuminate\Support\Facades\Route;
    use App\Http\Controllers\ProductsController;

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
    //firstproject.com > get with '/'
    Route::get('/', function () {
        return view('home'); // this returns a view with the name welcome
    });


    //firstproject.com/users > get with'/users'
    // whenever a user does a get request to firstproject.com/users it will return him this below
    Route::get('/users', function () {
        return 'Welcome to the users page!'; // this return a string
    });

    // Route to users - sends an Array(JSON)
    Route::get('/users', function () {
        return ['PHP', 'HTML', 'LARAVEL'];
    });

    // Route to users - sends an JSON Object
    Route::get('/users', function () {
        return response()->json([
            'name' => 'Salem',
            'course' => 'Laravel',
        ]);
    });

    //Route to /users - redirects back to home page
    Route::get('/users', function () {
        return redirect('/');
    });

    // Will go to the ProductsController and run the function index()
    Route::get('/products', [ProductsController::class, 'index']);



    //passing route a parameter
    Route::get('/products/{id}', [ProductsController::class, 'show']);

    //adding a constraint top the parameter: accepting integers only
    Route::get('/products/{id}', [ProductsController::class, 'show'])->where('id', '[0-9]+');

    //adding a constraint top the parameter: accepting strings only
    Route::get('/products/{id}', [ProductsController::class, 'show'])->where('id', '[a-zA-Z]+');

    //adding more than a parameter
    Route::get('/products/{id}/{name}', [ProductsController::class, 'show'])->where([
        'id' => '[0-9]+',
        'name' => '[aA-zZ]+'
    ]);


    // ADDING A NAME TO THE ROUTE
    // SO YOU CAN REFER BACK TO IT FROM ANY WHERE USING route('routeName')
    // This is useful in buttons. href="{{ route('routeName') }}"
    Route::get('/products', [ProductsController::class, 'index'])->name('routeName');












    Route::resource('car', \App\Http\Controllers\CarController::class)->except(['show']);
