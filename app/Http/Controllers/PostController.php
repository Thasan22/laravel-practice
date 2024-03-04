<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function home(){
        return view('addPost');
    }

    public function allPosts(){
        $posts = Post::latest()->paginate(5);
        return view('allPosts', compact('posts'));
    }

    public function storePost(Request  $request){
        // VALIDATION
       $request->validate([
        'title'=>'required|min:5',
        'detail'=>'required',
       ],[
        'title.required'=>"Please enter title",
        'detail.required'=>"Please write detail about the post",
       ]);


        //STORE DATA
        $post = new Post();
        $post->title = $request->title;
        $post->detail = $request->detail;
        $post->author = $request->author;
        $post->save();

        return back()->with('msg','The post has been added');

        
    }
    // DELETE DATA
        function deletePost($id){
            $post = Post::findOrFail($id);
            $post->delete();
            return back();
    }

    // EDIT DATA
        function editPost($id){
            $post = Post::findOrFail($id);
            return view('editPost',compact('post'));
        }

}
