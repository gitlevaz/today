<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Requestr; 
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use Validator;
use DB;
use DataTables;
use Carbon\Carbon;
use App\User;
use App\member;
use App\client;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    
    
    //view table
  public function phptable(Request $request){

    if(request()->has('name')){
      $typesr = member::orderBy('id', 'ASC')->groupby('fname')->get();
      $types = member::where('fname',$request->name)->paginate(10)
      ->appends('fname',$request->name);
    }
     elseif (request()->has('search')) {
      $typesr = member::orderBy('id', 'ASC')->groupby('fname')->get();
      $types = member::where('fname','LIKE',$request->search)->orWhere('divition','LIKE',$request->search)
      ->orWhere('member_status_id','LIKE',$request->search)->paginate(10);
    } 
    else {
      $typesr = member::orderBy('id', 'ASC')->groupby('fname')->get();
      $types = member::orderBy('id', 'ASC')->paginate(10);
      // database->'strict' => false,
      // $types = member::orderBy('id', 'ASC')->groupby('id_topic')->paginate(10);
    }
    // else{
    //   $types = member::paginate(10);
    // }  
        return view('php.table',compact('types','typesr'));
    }
    
    
    public function multiserch(Request $request){
     
      $typesr = member::orderBy('id', 'ASC')->groupby('fname')->get();
      if ($request->fname) {
        $types = member::with('d')->get();
        // dd($types);
          // print_r('a');
        // $types= member::where('fname','=',$request->fname)->get();
      } 
      
      if ($request->status) {
          //  print_r( $types);
      // $types= member::where('member_status_id','=',$request->status)->get();
    } 
    // dd($types);
    // else {  
    //       dd('s');
    //     $types= member::where('member_status_id','=',$request->fname)->get();
    //   }
      
     
       return view('php.table',compact('types','typesr'));
     }

    //edit table
    public function newedit($id){
     $editdata=member::where('id',$id)->get();
    //  print_r($editdata);
    //  die();
    // dd($editdata);
     return view('php.update',compact('editdata'));
   }

   //update
    public function postupdate(Request $request){
      $up=member::where('id',$request->id)->first();
      $up->update([
        'fname' =>$request->input('fname'),
        'lname' =>$request->input('lname'),
        'divition' =>$request->input('divition'),
        'dob' =>$request->input('dob'),
        'summery' =>$request->input('summery')
      ]);
      $types = member::get();
      return view('php.table',compact('types'));
    }

   //del
   public function newdel($id){
    //  dd($id);
    member::where('id',$id)->delete();
    return redirect()->back();
   }

   
  //  public function search(Request $request){ 
  //   $types = member::where('fname','LIKE',$request->search)->orWhere('divition','LIKE',$request->search)->get();
  //   return view('php.table',compact('types'));
  //  }


   public function short_by(Request $request){
    $typesr = member::orderBy('id', 'ASC')->groupby('fname')->get();
    $types =  member::all()->sortBy("fname");
    // $ondata = DB::table('official_news')->orderBy('created_date', 'desc')->paginate(7);
    return view('php.table',compact('types','typesr'));
   }
  
   public function shortbylname(Request $request){
    $typesr = member::orderBy('id', 'ASC')->groupby('fname')->get();
    $types = member::all()->sortBy("lname");
    return view('php.table',compact('types','typesr'));
   }

   public function shortbydivition(Request $request){
    $typesr = member::orderBy('id', 'ASC')->groupby('fname')->get();
    $types = member::all()->sortBy("divition");
    return view('php.table',compact('types','typesr'));
   }

   public function shortbydob(Request $request){
    $typesr = member::orderBy('id', 'ASC')->groupby('fname')->get();
    $types = member::all()->sortBy("dob");
    return view('php.table',compact('types','typesr'));
   }

  //  public function click(Request $request){
  //   //  dd($request->name);
  //   $types = member::where('fname','=',$request->name)->get();
  //   return view('php.table',compact('types'));
  //  } 


  //  $results = Project::all()->sortBy("name");
}
