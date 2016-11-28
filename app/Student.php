<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model{
	//指定表名
	
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
	
	public $timestamps=true;
}
