@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Add Posts') }}
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

                        <form method="post" action="{{route('post.store')}}" autocomplete="off" enctype="multipart/form-data">

                            {{csrf_field()}}
                            <div class="form-group">
                                <label for="title">{{ __('Title') }}</label>
                                <input id="title" type="text" class="form-control" placeholder="Title" name="title" required autofocus>
                                <br>
                                <label for="desc">{{ __('Description') }}</label>
                                <textarea id="ck_description"  style="resize: none" type="text" class="form-control" placeholder="Description" name="desc" required autofocus></textarea>
                                <br>
                                <label for="contents">{{ __('Content') }}</label>
                                <textarea type="content" id="ck_content"  style="resize: none" class="form-control" placeholder="Content" name="contents" required autofocus></textarea>
                                <br>
                                <label for="image">{{ __('Image') }}</label>
                                <input type="file" class="form-control"aceholder="Image" name="image" required autofocus>
                                <br>
                                <select name="category_id" class="form-control">
                                    <option selected value="" disabled>Select Category</option>
                                    @foreach($categories as $category)
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
