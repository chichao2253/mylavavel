<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Student;
use Illuminate\Support\Facades\Session;
class StudentController extends Controller
{
   public function info(){
   		$student= DB::select('select * from student');
   		var_dump($student);
   }
   public function query1(){
   	$bool=DB::table('student')->insert([
   	[
   	'name'=>'chichao','age'=>17
   	],
   	[
   	'name'=>'chichao','age'=>19
   	]]
  
   	);
   	 	var_dump($bool);
   }
   public function query2(){
   		$num=DB::table('student')->where('id',1001)->update(['age'=>30]);
   		var_dump($num);
   }
   
   /*
    where的判断形式
    ->where('id','>=',2000)
    */
   public function query3(){
   		$num=DB::table('student')
   		->where('id',1001)
   		->delete();
   		var_dump($num);
   }
   /*
    多条件查询
    ->whereRaw('id>=? and age >?',[1001,18])
    */
   /*
    ->pluck()
    ->lists()
    
    查询字段名
    * */
   /*
    查询指定数据
    ->select('id','name','age')
    */
   
   /*
    chunk();
    chunk(1000,function($student){
    	每次查询1000千条数据
    })
    */
   public function query4(){
   		
   	$arry=DB::table('student')
   		  ->get();
   		  
   	dd($arry);
   }
   public function orm1(){
   	//all()  全部数据
   	
   	 //$student = Student::all();
   	 //find()  根据主键查找
// $student=	 Student::get();
// 	 
// 	 dd($student);
 	$student= new Student();
 	$student->name ='qifei';
 	$student->age ='50';
 	$student->save();
 	$stu=Student::find(1006);
 	echo $stu->created_at;
   }
   public function section1(){
   		return view('student/section1');
   }
   //取值
   //$request->input()
   
   public function request1(Request $request){
   	echo $request->input('name');
   }
   //Session::get();
   //Session::put();
   //Session::push();   存储数组
   public function session1(Request $request){
   	 $request->session()->put('key1','value');
   }
   public function session2(Request $request){
   		echo $request->session()->get('key1');
   		$res=Session::all();
   		dd($res);
   }
   public function response(){
   		$data=[
   			'errCode'=>1,
   			'errMsg'=>'success',
   			'data'=>'chichao',
   		];
   		return response()->json($data);
   }
   public function index(){
   	
   	$students=Student::paginate(4);   	
   	return view('student.index',[
   		'students'=>$students
   	]);
   }
   public function create(Request $request){
   		if($request->isMethod('POST')){
   			if(Student::create($request->input('Student'))){
   				return redirect('index')->with('success','添加成功');
   			}else{
   				return redirect()->back();
   			}
   		}
   		return view('student.create');
   }
   public function save(Request $request){
   		$data=$request->input('Student');
   		var_dump($data);
   }
   
}
