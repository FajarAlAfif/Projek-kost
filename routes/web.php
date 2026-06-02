<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\Admin\KostController;
use App\Http\Controllers\SearchController;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\BookingController;

Route::get('/search', [SearchController::class, 'index'])
    ->name('search');

Route::get('/kost/{id}', [SearchController::class, 'show'])
    ->name('kost.detail');

Route::get('/admin/kost', [KostController::class, 'index'])
    ->name('admin.kost.index');

Route::get('/admin/kost/create', [KostController::class, 'create'])
    ->name('admin.kost.create');

Route::post('/admin/kost/store', [KostController::class, 'store'])
    ->name('admin.kost.store');

Route::delete('/admin/kost/{id}',
    [KostController::class, 'destroy'])
    ->name('admin.kost.destroy');

Route::get('/contact',
    [ContactController::class, 'index']);

Route::post('/contact',
    [ContactController::class, 'store'])
    ->name('contact.store');

Route::get('/admin/contact',
    [ContactController::class, 'admin']);

Route::get('/', function () {
    return view('home');
});

Route::get('/booking/{id}',
[BookingController::class, 'create']);

Route::post('/booking/store',
[BookingController::class, 'store']);

Route::get('/admin/booking',
[BookingController::class, 'index']);

Route::post('/admin/booking/{id}/verify',
[BookingController::class, 'verify']);

Route::post('/admin/booking/{id}/reject',
[BookingController::class, 'reject']);


Route::get('/login', function () {
    return view('login');
});

Route::post('/login', function (Request $request) {

    $user = User::where(
        'email',
        $request->email
    )->first();

    if(
        $user &&
        Hash::check(
            $request->password,
            $user->password
        )
    ){

        session([
            'login' => true,
            'user_id' => $user->id,
            'username' => $user->name
        ]);

        return redirect('/');
    }

    return redirect('/login')
        ->with(
            'error',
            'Email atau Password salah'
        );
});

Route::get('/register', function () {
    return view('register');
});

Route::post('/register', function (Request $request) {

    $request->validate([
        'name' => 'required',
        'email' => 'required|email|unique:users',
        'password' => 'required|min:6'
    ]);

    User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => Hash::make($request->password)
    ]);

    return redirect('/login')
        ->with('success','Registrasi berhasil');
});


Route::get('/profile', function () {

    if(!session('login')){
        return redirect('/login');
    }

    $user = User::find(
        session('user_id')
    );

    return view(
        'profile',
        compact('user')
    );
});

Route::post('/update-profile', function (Request $request) {

    $user = User::find(session('user_id'));

    $user->name = $request->username;

    if(!empty($request->new_password)){

        $user->password = Hash::make(
            $request->new_password
        );

    }

    if(
    $request->new_password !=
    $request->confirm_password
    ){
    return back()->with(
        'error',
        'Konfirmasi password tidak sama'
    );
}
    $user->save();

    session([
        'username' => $user->name
    ]);

    return redirect('/profile')
        ->with(
            'success',
            'Profile berhasil diupdate'
        );

});
Route::get('/logout', function () {

    session()->flush();

    return redirect('/');
});

Route::get('/my-booking', function () {

    $bookings = App\Models\Booking::with('kost')
        ->where('user_id', session('user_id'))
        ->latest()
        ->get();

    return view('my-booking', compact('bookings'));

});