<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Users extends Model
{
  protected $table = 'Users';

  protected $guarded = array('id');

  public $timestamps = true;

  public function getAllUsers()
  {
    $users = DB::table($this->table)->get();

    return $users;
  }
  public function getUser($id)
  {
  	$user = DB::table($this->table)
  					->where('user_id','=',$id)
  					->get();

  	return $user->first();
  }

  public function canLogin($id,$password){
  	$flag = true;
  	$user = $this->getUser($id);
	if($user){
	  	if($user->password != $password){
	  		$flag = false;
	  	}
	}else{
		$flag = false;
	}

	return $flag;
  }

  public function canRegister(){
  	
  }

}
