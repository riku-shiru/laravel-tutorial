<?php

namespace App\Http\Controllers;

use App\Models\Users;
use Session;
use Request;

class UserController extends Controller
{
  public function index()
  {
    // Userモデルのインスタンス化
    $md_user = new Users();
    // データ取得
    $users = $md_user->getAllUsers();

    // ビューを返す
    return view('index', ['users' => $users]);
  }

  public function login(){
  	$md_user = new Users();
  	//Session::put('user_id','aaa');
  	if(Session::get('user_id')){
  		return redirect('index'); //redirect
  	}else{
  		if (Request::has('user_id')) {
  			$id = Request::input('user_id');
  			$password = Request::input('password');
	  		if($md_user->canLogin($id,$password)){
	  			Session::put('user_id',$id);
	  			return redirect('index');
	  		}else{
	  			return view('login');
	  		}
	  	}else{
	  		return view('login');
	  	}
  	}
  }

  public function logout(){
  	Session::forget('user_id');
  	return redirect('login');
  }

  public function register(){
  	
  }
}
