<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model{
	//指定表名
	const SEX_UN=10;
	const SEX_BOY=20;
	const SEX_GRIL=30;
	protected $table = 'student';
	//指定id
	
	protected $primaryKey = 'id';
	//指定允许批量赋值的方法
	protected $fillable=['name','age'];
	
	protected function getDateFormat(){
		return time();
	}
	protected function asDatetime($val){
		return $val;
	}
	public function sex($id =null){
   		$arry=[
   			self::SEX_UN=>'未知',
   			self::SEX_BOY=>'男',
   			self::SEX_GRIL=>'女',   			
   		];
   		if($id !== null){
   			return array_key_exists($id,$arry) ? $arry [$id] : $arry[self::SEX_UN];
   		}
   		return $arry;
   }
	public $timestamps=true;
}
