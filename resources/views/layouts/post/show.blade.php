@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Update Posts') }}
                        <a href="{{url('/home')}}" >
                            {{ __('Back') }}
                        </a>
                    </div>


                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <form method="POST" action="{{route('post.update',$post->post_id)}}" enctype="multipart/form-data" autocomplete="off">
                            {{csrf_field()}}
                            {{method_field('PUT')}}
                            <div class="form-group">
                                <label for="title">{{ __('Title') }}</label>
                                <input id="title" type="text" value="{{$post->post_title}}" class="form-control" placeholder="Title" name="title" required autofocus>
                                <br>
                                <label for="desc">{{ __('Description') }}</label>
                                <textarea id="ck_description" value="{{$post->post_desc}}"  style="resize: none" type="text" class="form-control" placeholder="Description" name="desc" required autofocus>
                                    {{$post->post_desc}}
                                </textarea>
                                <br>
                                <label for="contents">{{ __('Content') }}</label>
                                <textarea aria-placeholder="{{$post->post_content}}" id="ck_content"  style="resize: none" class="form-control" placeholder="Content" name="contents" required autofocus>
                                    {{$post->post_content}}
                                </textarea>
                                <br>
                                <label for="image">{{ __('Image') }}</label>
                                <input type="file" value="{{$post->post_image}}"  class="form-control" name="image" required autofocus>
                                <br>
                                <input disabled id="title" type="text" value="{{$post->post_view}}" class="form-control" placeholder="Title" name="title" required autofocus>
                                <br>
                                <select name="category_id" class="form-control">
                                    @foreach($categories as $category)
                                    <option selected value="{{$post->post_category_id}}">{{$category->category_title}}</option>

                                        <option value="{{$category->category_id}}">{{$category->category_title}}</option>
                                    @endforeach
                                </select>
                                <br>
                                <input type="submit" class="btn btn-primary w-100 mb-2" value="Add">
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
