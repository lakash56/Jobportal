<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
class DashboardController extends Controller
{
    //
    public function index(){
        $posts = Post::latest()->paginate(10);
        return view('admin.index',compact('posts'));
    }
    public function create(){
        return view('admin.create');
    }

    public function store(Request $request){
        $this->validate($request,[
            'title'=>'required|min:3',
            'content'=>'required',
            'image'=>'required|mimes:png,jpg,jpeg'

        ]);

        if($request->hasFile('image')){
            $file = $request->file('image');
            $path = $file->store('uploads','public');

            Post::create([
                'title'=>$request->get('title'),
                'slug'=>$request->get('title'),
                'content'=>$request->get('content'),
                'status'=>$request->get('status'),
                'image'=>$path
            ]);
        };
        return redirect('/dashboard')->with('message','post created successfully');


    }


    public function edit($id){
        $post = Post::find($id);
        return view('admin.edit',compact('post'));
    }
    public function destroy(Request $request){
        $id = $request->get('id');
        $post = Post::find($id);
        $post->delete();
        return redirect()->back()->with('message','post deleted succesfully');
    }

    public function update($id, Request $request){
        //dd($request->all());
        $this->validate($request,[
            'title'=>'required|min:3',
            'content'=>'required'
        ]);

        if($request->hasFile('image')){
            $file = $request->file('image');
            $path = $file->store('uploads','public');

            Post::where('id',$id)->update([
                'title'=>$request->get('title'),
                'slug'=>$request->get('title'),
                'content'=>$request->get('content'),
                'status'=>$request->get('status'),
                'image'=>$path
            ]);
        };
        $this->updateAllExceptImage($request,$id);
        return redirect()->back()->with('message','post Updated Successfully');
    }

    public function updateAllExceptImage(Request $request,$id){
       return Post::where('id',$id)->update([
            'title'=>$request->get('title'),
                'slug'=>$request->get('title'),
                'content'=>$request->get('content'),
                'status'=>$request->get('status'),
        ]);
    }
    public function trash(){
        $posts = Post::onlyTrashed()->paginate(20);
        return view('admin.trash',compact('posts'));
    }
    public function restore($id){
       Post::onlyTrashed()->where('id',$id)->restore();
       return redirect()->back()->with('message','Post Restored Successfully');
    }

    public function toggle($id){
        $posts = Post::find($id);
        $posts->status = !$posts->status;
        $posts->save();
        return redirect()->back()->with('message','Status Updated Successfully');
     }

}
