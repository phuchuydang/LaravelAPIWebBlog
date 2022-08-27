@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('Posts') }}
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
                        <table id="myTable" class="table table-dark table-responsive">
                            <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Title</th>
                                <th scope="col">Desc</th>
                                <th scope="col" >Content</th>
                                <th scope="col">Image</th>
                                <th scope="col">Category</th>
                                <th scope="col" >Created At</th>
                                <th scope="col" >Updated At</th>
                                <th scope="col">View</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($posts as $post)
                                <tr>
                                    <th scope="row">{{$loop->iteration}}</th>
                                    <td>{{$post->post_title}}</td>
                                    @php
                                        $post_desc = strip_tags($post->post_desc);
                                        $post_content = strip_tags($post->post_content);
                                        $post_desc = substr($post_desc, 0, 100);
                                        $post_content = substr($post_content, 0, 100);
                                    @endphp
                                    <td>{{$post_desc}}</td>
                                    <td>{{$post_content}}</td>
                                    <td>
                                        <img src="{{asset('public/uploads/images/'.$post->post_image)}}" width="100px" height="100px">
                                    </td>
                                    @foreach($categories as $category)
                                        @if($post->post_category_id == $category->category_id)
                                            <td>{{$category->category_title}}</td>
                                        @endif
                                    @endforeach
                                    <td>{{$post->created_at}}</td>
                                    @if($post->updated_at == null)
                                        <td>No Update</td>
                                    @else
                                        <td>{{$post->updated_at}}</td>
                                    @endif
                                    <td>
                                        {{$post->post_view}}
                                        </td>

                                    <td>
                                        <a href="{{route('post.show',$post->post_id)}}" class="btn btn-primary">Edit</a>
                                        <form action="{{route('post.destroy',$post->post_id)}}" method="post">
                                            {{csrf_field()}}
                                            {{method_field('DELETE')}}
                                            <input type="submit" class="btn btn-danger" value="Delete">
                                        </form>

                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
