@extends('layouts.frontendLayouts')

@section('title',"Add Post")
@section('content')
     <section>
        <div class="container">
            <div class="card col-lg-5 mx-auto mt-5">
                <div class="card-header">Add Post</div>
                <div class="card-body">


                    @if (session()->has('msg'))
                        <div class="alert alert-success">{{session('msg')}}</div>
                    @endif

                    <form action="{{route('store')}}" method="POST">
                        @csrf
                        <input value="{{old('title')}}" name="title" type="text" placeholder="Post title" class="form-control mb-3">
                        @error('title')
                            <span class="text-danger">{{$message}}</span>                            
                        @enderror
                        <input value="{{old('detail')}}" name="detail" type="text" placeholder="Post detail" class="form-control mb-3">
                        @error('detail')
                            <span class="text-danger">{{$message}}</span>                            
                        @enderror
                        <input value="{{old('author')}}" name="author" type="text" placeholder="Author name" class="form-control mb-3">
                        @error('author')
                            <span class="text-danger">{{$message}}</span>                            
                        @enderror <br>
                        <button type="submit" class="submit btn btn-primary">Submit</button>
                    </form>



                </div>
            </div>
        </div>
    </section>
@endsection
   
