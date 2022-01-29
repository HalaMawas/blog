@extends('master')
@section('content')
<div class="site-section bg-light">
      <div class="container">
        <div class="row">
<div class="col-md-12 col-lg-12 order-md-2">
            <div class="row">
              @foreach($articles as $article)
              <div class="col-md-6 col-lg-4 mb-5">
                <div class="block-20 ">
                  <figure>
                    <a href="blog-single.html"><img src="{{asset("article-image/{$article->images->first()->url}")}}" alt="" class="img-fluid"></a>
                  </figure>
                  <div class="text">
                    <h3 class="heading"><a href="#">{{$article->title}}</a></h3>
                    <p><a href="{{asset("article/{$article->id}")}}" class="more">Read More <span class="ion-arrow-right-c"></span></a></p>
                    <div class="meta">
                      <div><a href="#"><span class="ion-android-calendar"></span>{{ \Carbon\Carbon::parse($article->created_at)->format('d F Y') }} </a></div>
                      <div><a href="#"><span class="ion-android-person"></span> {{$article->user->name}}</a></div>
                    </div>
                  </div>
                </div>
              </div>
              @endforeach

                             

            </div>

            <div class="row mb-5">
              <div class="col-md-12 text-center">
                <div class="block-27">
                  <ul>

                    <!-- <li><a href="#">&lt;</a></li>
                    <li class="active"><span>1</span></li>
                    <li><a href="#">2</a></li>
                    <li><a href="#">3</a></li>
                    <li><a href="#">&gt;</a></li> -->
                  </ul>
                </div>
              </div>
            </div>
          </div>
         
        </div>
      </div>
    </div>
@endsection