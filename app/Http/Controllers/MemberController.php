<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Member;
class MemberController extends Controller
{
   public function info(){
   		return  Member::getMember();
// 		return view('member/info',[
// 			'name'=>'chichao'
// 		]);
   }
}
