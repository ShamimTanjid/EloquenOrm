<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use DB;

class PostController extends Controller
{
	 public function __construct()
    {
        $this->middleware('auth');
    }

  public function insertpost(Request $request){
  	 $validatedData = $request->validate([
        'title' => 'required|unique:posts|max:255',
        'author' => 'required',
        'description'=>'required',
        'tag'=>'required',
    ]);

   $post= new Post;
   $post->title = $request->title;
   $post->author = $request->author;
   $post->description = $request->description;
   $post->tag = $request->tag;
   $post->save();

   if ($post->save()) {
                 $notification=array(
                 'messege'=>'Successfully Post Added ',
                 'alert-type'=>'success'
                  );
                return Redirect()->back()->with($notification);                      
             }else{
              
                 return Redirect()->back();
             }               

  }
 public function Allpost(){

      $post=Post::all();
  	return view('all_post')->with('posts',$post);

  }
 
  public function Deletepost($id){

  	$post = post::find($id);
  	$dlt=$post->delete();

  	if ($dlt) {
                 $notification=array(
                 'messege'=>'Successfully Deleted ',
                 'alert-type'=>'success'
                  );
                return Redirect()->back()->with($notification);                      
             }else{
              
                 return Redirect()->back();
             }            

  }
  public function edittpost($id){

  	$post =Post::findOrFail($id);
  	return view ('editpost',compact('post'));
  }
   public function updaTepost(Request $request,$id){

   	$validatedData = $request->validate([
        'title' => 'required',
        'author' => 'required',
        'description'=>'required',
        'tag'=>'required',
    ]);
      $update= new Post;
   $update->title = $request->title;
   $update->author = $request->author;
   $update->description = $request->description;
   $update->tag = $request->tag;
   $update->save();

   if ($update->save()) {
                 $notification=array(
                 'messege'=>'Successfully Post Added ',
                 'alert-type'=>'success'
                  );
                return Redirect()->back()->with($notification);                      
             }else{
              
                 return Redirect()->back();
             }               

   }
   public function News(){

   	 return view('news_add');
   }
   public function InsertNews(Request $request){
   	$validatedData = $request->validate([
        'title' => 'required|unique:posts|max:255',
        'author' => 'required',
        'details'=>'required',
        'image'=>'required',
    ]);
    $data=array();
      $data['title']=$request->title;
      $data['details']=$request->details;
      $data['author']=$request->author;

      $image=$request->image;
      if($image){
        $image_name=str_random(20);
        $ext=strtolower($image->getClientOriginalExtension());
         $image_full_name=$image_name.'.'.$ext;
         $upload_path='public/post/';
         $image_url=$upload_path.$image_full_name;
         $success=$image->move($upload_path,$image_full_name);
         
         if($success){
          $data['image']=$image_url;
          $post=DB::table('news')->insert($data);
          if($post){
                   $notification=array(
                    'messege'=>'Post Insert  Successfully!',
                    'alert-type'=>'success',
                );
                return Redirect()->route('newspost')->with($notification);
            }
            else{
                
                return Redirect()->back();
            }

            }
          }else{
                
                return Redirect()->back();
            }

 }
 public function ALltNews(){
 	$posts=DB::table('news')->get();

 	return view('all_newss',compact('posts'));
 }
}
