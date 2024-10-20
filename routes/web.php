<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\ExemploComponent;

Route::get('/', function () {
    return view('welcome');
});

Route::get('exemplo', ExemploComponent::class);
