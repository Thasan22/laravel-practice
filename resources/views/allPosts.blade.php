@extends('layouts.frontendLayouts')

@section('title' ,"All Posts")
@section('content')
    <section>
        <div class="container">
            <div class="table-responsive mt-5 text-center">
                <table class="table table-hover table-striped">
                    <tr>
                        <th>#</th>
                        <th>Title</th>
                        <th>Detail</th>
                        <th>Author</th>
                        <th>Action</th>
                    </tr>
                    @foreach ($posts as $key=>$post)
                    <tr>
                        <td>{{$posts->firstItem() + $key}}</td>
                        <td>{{$post->title}}</td>
                        <td>{{str($post->detail)->substr(0,10).'...'}}</td>
                        <td>{{$post->author}}</td>
                        <td>
                            <div class="btn-group ">
                                <a class="btn btn-info btn-sm" href="{{ route('edit', $post->id) }}">Edit</a>
                                <a class="btn btn-danger btn-sm" href="{{ route('delete', $post->id) }}">Delete</a>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                    
                </table>
                {{$posts->links()}}
            </div>
        </div>
    </section>
@endsection