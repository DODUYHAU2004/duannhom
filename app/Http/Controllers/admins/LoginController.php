<?php

namespace App\Http\Controllers\Admins;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\FormLoginRequest;

class LoginController extends Controller
{
    public function index(){
        return view('admins.components.login', ['title' => 'Login']);
    }
    public function store(FormLoginRequest $request){
        
    }
}