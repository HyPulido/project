<?php

use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('nosostros', function () {
    return view('about');
})->name('about');

Route::get('servicios', function () {
    return view('service');
})->name('service');

Route::get('contacto', function () {
    return view('contact ');
})->name('contact');

Route::get('single-portfolio', function () {
    return view('single-portfolio');
})->name('single-portfolio');


Route::post('messages', function () {
//Enviar correo
$data=request()->all();
Mail::send('emails.messages', $data, function ($message) use ($data){
    $message->from($data['email'], $data['name']);
    $message->sender('john@johndoe.com', 'John Doe');
    $message->to('hyexpulido@gmail.com', 'Holman');
    $message->subject($data['subject']);

});

//Responder a usuario
return back()->with('flash', $data['name'].', Tu mensaje ha sido recibido');
    //return request()->all();
})->name('messages');
