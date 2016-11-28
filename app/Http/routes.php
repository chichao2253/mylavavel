<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

/*
	基本路由
 */

Route::get('/', function () {
    return view('welcome');
});
Route::get('hello',function(){
	return 'hello world';
});

/*
 
 * 多请求路由
 * 
 * */
Route::match(['get','post'],'multy1',function(){
	return "nihao";
});
Route::any('multy2',function(){
	return "nihao";
});
Route::any('student/info','StudentController@info');
Route::any('query1','StudentController@query1');
Route::any('query2','StudentController@query2');
Route::any('query3','StudentController@query3');
Route::any('query4','StudentController@query4');
Route::any('orm1','StudentController@orm1');
Route::any('section1','StudentController@section1');
Route::any('request1','StudentController@request1');
Route::group(['middleware'=>['web']],function(){
	Route::any('session1','StudentController@session1');
	Route::any('session2','StudentController@session2');
});
Route::get('response','StudentController@response');
Route::get('index','StudentController@index');
Route::any('student/create','StudentController@create');
Route::any('student/save','StudentController@save');


	/*
	 路由参数
	 * */
	Route::get('user/{id}',function($id){
		return 'User-'.$id;
	});
	/*
	 路由参数加问号，请求参数可选
	 */
	Route::get('username/{name?}',function($name='chichao'){
		return 'User-'.$name;
	});
	/*
	 请求参数可以用正则表达式进行限制->where('name','[A-Za-z]+');
	 多个参数改用数组的的形式
	 ->where(['id'=>'jksdjk','name'=>'sldjfks']);
	 */
	Route::get('username/{name?}',function($name='chichao'){
		return 'User-'.$name;
	});
	/*
	 控制器关联路由
	 */
	//Route::get('member/info','MemberController@info');
	
	Route::get('member/info',['uses'=>'MemberController@info']);

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {
    Route::get('index','StudentController@index');
	Route::any('student/create','StudentController@create');
	Route::any('student/save','StudentController@save');

});

Route::group(['middleware' => 'web'], function () {
    Route::auth();

    Route::get('/home', 'HomeController@index');
});
