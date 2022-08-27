@extends('layout')
@section('content')
    <div class="about">
        <div class="container">
            <div class="about-main">
                <div class="col-md-8 about-left">
                    <div class="about-one">
                        @php
                        $keyword = strtoupper($keyword);
                        @endphp
                        <h3>Keyword: <b>{{$keyword}}</b></h3>
                    </div>
                    <div class="about-two">
                    </div>
                    <div class="about-tre">

                        <div class="a-1">
                            @foreach($posts as $post => $value)
                                <div class="row">
                                    <a href="{{route('blog.show', $value->post_id)}}">
                                        <div class="col-md-6 abt-left">
                                            @php
                                                $post_title = \Illuminate\Support\Str::slug($value->post_title);
                                            @endphp
                                            <img src="{{asset('public/uploads/images/'.$value->post_image)}}" alt="{{$post_title}}" />
                                        </div>
                                        <div class="col-md-6 abt-left">
                                            <h6>{{$value->category->post_title}}</h6>
                                            <h3>{{$value->post_title}}</h3>
                                            @php
                                                $post_desc = strip_tags($value->post_desc)
                                            @endphp
                                            <p>{{$post_desc}}</p>
                                            <label>{{$value->category->created_at}}</label>

                                            <a href="{{route('blog.show', $value->post_id)}}">Read
                                                More</a>

                                        </div>
                                    </a>
                                </div>
                            @endforeach
                            <div class="clearfix"></div>

                        </div>
                    </div>
                </div>
                <div class="col-md-4 about-right heading">
                    <div class="abt-2">
                        <h3>CATEGORY SUGGESTION</h3>
                        <ul>
                            @foreach($categories as $category => $value)
                                <li><a href="{{route('blog.show', $value->category_id)}}">{{ $value->category_title}}</a></li>
                            @endforeach

                        </ul>
                    </div>

                    <div class="abt-2">
                        <h3>NEWS LETTER</h3>
                        <div class="news">
                            <form>
                                <input type="text" value="Email" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Email';}" />
                                <input type="submit" value="Subscribe">
                            </form>
                        </div>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
@endsection
