@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Add Category Posts') }}
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

                        <form method="post" action="{{route('category.store')}}" autocomplete="off">
                            {{csrf_field()}}
                            <div class="form-group">
                                <label for="title">{{ __('Title') }}</label>
                                <input id="title" type="text" class="form-control" placeholder="Title" name="title" required autofocus>
                                <br>
                                <label for="desc">{{ __('Description') }}</label>
                                <textarea id="desc" style="resize: none;" type="text" class="form-control" placeholder="Description" name="desc" required autofocus></textarea>
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
