<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

#Route::get('/', function () {
#    return view('welcome');
#});

use App\Candidate;
use Illuminate\Http\Request;

/**
 * Show Candidate Dashboard
 */
Route::get('/', function () {
    $candidates = Candidate::orderBy('created_at', 'asc')->get();

    return view('candidates', [
        'candidates' => $candidates
    ]);
});

/**
 * Add New Candidate
 */
Route::post('/candidate', function (Request $request) {
    $validator = Validator::make($request->all(), [
        'name' => 'required|max:255',
    ]);

    if ($validator->fails()) {
        return redirect('/')
            ->withInput()
            ->withErrors($validator);
    }

    // Create The Candidate...

    $candidate = new Candidate;
    $candidate->name = $request->name;
    $candidate->save();

    return redirect('/');
});

/**
 * Delete Candidate
 */
Route::delete('/candidate/{candidate}', function (Candidate $candidate) {
    $candidate->delete();

    return redirect('/');
});
