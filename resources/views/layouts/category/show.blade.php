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
                        <form method="POST" action="{{route('category.update',$category->category_id)}}" autocomplete="off">
                            {{csrf_field()}}
                            {{method_field('PUT')}}
                            <div class="form-group">
                                <label for="title">{{ __('Title') }}</label>
                                <input id="title" type="text" class="form-control" value="{{$category->category_title}}" placeholder="Title" name="title" required autofocus>
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
