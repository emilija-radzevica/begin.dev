<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Models\Character;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Listing;
use App\Models\Post;

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

Route::get('/', [PostController::class, 'index']);

Route::get('/posts/create', [PostController::class, 'create'])->middleware('auth');

Route::post('/posts', [PostController::class, 'store'])->middleware('auth');

Route::get('/posts/{postO}/edit', [PostController::class, 'edit'])->middleware('auth');

Route::put('/posts/{postO}', [PostController::class, 'update'])->middleware('auth');

Route::delete('/posts/{postO}', [PostController::class, 'destroy'])->middleware('auth');

// must be at the bottom
Route::get('/posts/{theseVariablesMatch}', [PostController::class, 'show']);

Route::get('/register', [UserController::class, 'create'])->middleware('guest');

Route::post('/users', [UserController::class, 'store']);

Route::post('/logout', [UserController::class, 'logout'])->middleware('auth');

Route::get('/login', [UserController::class, 'login'])->name('login')->middleware('guest');

Route::post('/users/authenticate', [UserController::class, 'authenticate']);

Route::get('/profile', [PostController::class, 'manage'])->middleware('auth');

Route::delete('/users/{goner}', [PostController::class, 'purge'])->middleware('auth');

Route::get('lang/home', [LangController::class, 'index']);
Route::get('lang/change', [LangController::class, 'change'])->name('changeLang');


// Route::get('/listings/{id}', function ($id) {
//     return view('listing', [
//         'listing' => Listing::find($id)
//     ]);
// });



// Route::get('/post', function () {
//     return response('<h1>This will be a specific post</h1>');
// });

// Route::get('/post/{id}', function ($id) {
//     return response('Post ' . $id);
// })->where('id', '[0-9]+');

// // https://begin.dev/search?name=Emily&city=Riga
// Route::get('/search', function (Request $request) {
//     return $request->name . ' ' . $request->city;
// });
