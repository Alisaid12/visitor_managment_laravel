<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

// Route::get('/api/visiteurs/today', function() {
//     $count = DB::table('visiteurs')
//                ->whereDate('created_at', today())
//                ->count();
//     return response()->json(['count' => $count]);
//   });
// Route::get('/api/visiteurs/today', function() {
//     $count = App\Models\Visiteur::whereDate('created_at', today())->count();
//     return response()->json(['count' => $count]);
// });