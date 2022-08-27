@extends('layout')
@section('content')
<div class="single">
    <div class="container">
        <div class="col-md-8">


        <div class="single-top">
            <a href="#"><img class="img-responsive" src="{{asset('public/uploads/images/'.$post->post_image)}}" alt=" "></a>
            <div class=" single-grid">
                <h4>{{$post->post_title}}</h4>
                <ul class="blog-ic">
                    <li><a href="#"><span> <i  class="glyphicon glyphicon-user"> </i>Super user</span> </a> </li>
                    <li><span><i class="glyphicon glyphicon-time"> </i>June 14, 2013</span></li>
                    <li><span><i class="glyphicon glyphicon-eye-open"> </i>Hits:145</span></li>
                </ul>
                @php
                    $content = $post->post_content
                @endphp
                <p>{!! $content !!}</p>

            </div>
            <div class="comments heading">
                <h3>Comments</h3>

            </div>
            <div class="comment-bottom heading">
                <h3>Leave a Comment</h3>
                <form>
                    <input type="text" value="Name" onfocus="this.value='';" onblur="if (this.value == '') {this.value ='Name';}">
                    <input type="text" value="Email" onfocus="this.value='';" onblur="if (this.value == '') {this.value ='Email';}">
                    <input type="text" value="Subject" onfocus="this.value='';" onblur="if (this.value == '') {this.value ='Subject';}">
                    <textarea cols="77" rows="6" value=" " onfocus="this.value='';" onblur="if (this.value == '') {this.value = 'Message';}">Message</textarea>
                    <input type="submit" value="Send">
                </form>
            </div>
        </div>
    </div>
        <div class="col-md-4">
            <div class="abt-2">
                <h3>YOU MIGHT ALSO LIKE</h3>
                @foreach($post_newsest as $post => $value)
                    @php
                        $post_title = \Illuminate\Support\Str::slug($value->post_title);
                        $post_desc = strip_tags($value->post_desc);
                        $post_desc = substr($post_desc, 0, 100);
                    @endphp
                    <div class="might-grid">
                        <a href="{{route('blog.show', $value->post_id)}}">
                            <div class="grid-might">
                                <img src="{{asset('public/uploads/images/'.$value->post_image)}}" class="img-responsive" alt="{{$post_title}}">
                            </div>
                            <div class="might-top">
                                <h4><a href="{{route('blog.show', $value->post_id)}}">{{$value->post_title}}</a></h4>
                                <p>{{$post_desc}}/p>
                            </div>
                            <div class="clearfix"></div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
