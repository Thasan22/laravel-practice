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
       $this->validation($request);


        //STORE DATA
        $this->storeAndUpdate($request);

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
        function updatePost(Request $req,$id){
             // VALIDATION
            $this->validation($req);
            
            // UPDATE DATA
            $this->storeAndUpdate($req,$id);
            return redirect(route('posts'));
        }

    // STORE AND EDIT FUNCTION
    private function storeAndUpdate($req,$id=null){
        $post = Post::findOrNew($id);
            $post->title = $req->title;
            $post->detail = $req->detail;
            $post->author = $req->author;
            $post->save();
    }

    private function validation($request){
        $request->validate([
            'title'=>'required|min:5',
            'detail'=>'required',
           ],[
            'title.required'=>"Please enter title",
            'detail.required'=>"Please write detail about the post",
           ]);
    }

}
