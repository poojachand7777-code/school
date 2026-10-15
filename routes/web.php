<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


Route::livewire('/', 'pages::home');
// Route::livewire('/login', 'pages::login');
Route::livewire('/loginRegister', 'pages::loginRegister');
Route::livewire('/dashboard', 'pages::dashboard');
Route::livewire('/classes', 'pages::classes');

Route::get('/logout', function(Request $request){

    Auth::logout();
 
    $request->session()->invalidate();
 
    $request->session()->regenerateToken();
 
    return redirect('/');
}
);







