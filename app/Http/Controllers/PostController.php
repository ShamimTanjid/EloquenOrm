<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

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
}
