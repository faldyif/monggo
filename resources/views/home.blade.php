@extends('layouts.app')

@section('content')
<div class="container-no-padding">

  <!-- Start Social Profile -->
  <div class="social-profile">

    <!-- Start Social Content -->
    <div class="social-content clearfix">

      <div class="jumbotron" style="background:#F5F5F5">
        @if (Session::has('message'))
          <script>
            window.onload = function(){
              swal("Good job!", "{{ Session::get('message') }}", "success")
            };
          </script>
        @endif

        <p>Share something in your mind</p>
        {!! Form::open(array('url' => 'status','class' => 'form-horizontal', 'enctype' => 'multipart/form-data')) !!}
          {{ Form::textarea('content', null, array('class' => 'form-control','rows' => '3')) }}
          <br>
          <button type="submit" class="btn btn-default pull-right">Post</button>
        {!! Form::close() !!}
      </div>

      <!-- Start Left -->
      <div class="col-md-6 col-lg-12">

        @foreach($status as $key)
        <!-- Start Post -->
          <div id="post-{{ $key->id }}" class="panel panel-default">
            <div class="panel-body status">
              <ul class="panel-tools panel-tools-hover">
                <li><a class="icon expand-tool"><i class="fa fa-expand"></i></a></li>
                <li><a class="icon closed-tool"><i class="fa fa-times"></i></a></li>
              </ul>
              <div class="who clearfix">
                <img src="img/profileimg4.png" alt="img">
                <span class="name"><b>{{ DB::table('users')->where('id', $key->user_id)->value('name') }}</b> shared a post</span>
                <span class="from"><b>{{ $key->created_at->diffForHumans() }}</b> via Mobile, New York {{ $key->id }}</span>
              </div>
              <div class="text">{{ $key->content }}</div>
              @if(App\Like::where('status_id', $key->id)->count() != 0)
                <div class="links">
                    @if(App\Like::where('status_id', $key->id)->where('feedback', 1)->count() != 0)
                        {{ App\Like::where('status_id', $key->id)->count() }} people like this.
                    @endif
                    @if(App\Like::where('status_id', $key->id)->where('feedback', 2)->count() != 0)
                        {{ App\Like::where('status_id', $key->id)->count() }} people dislike this.
                    @endif
                </div>
              @endif
              <ul class="links">
                @if(App\Like::where('status_id', $key->id)->where('feedback', 1)->where('user_id', Auth::user()->id)->count() == 0)
                  <li><a href="{{ url('like') }}/{{ $key->id }}"><i class="fa fa-thumbs-o-up"></i> Like</a></li>
                @else
                  <li>You liked this</li>
                @endif
                @if(App\Like::where('status_id', $key->id)->where('feedback', 2)->where('user_id', Auth::user()->id)->count() == 0)
                  <li><a href="{{ url('dislike') }}/{{ $key->id }}"><i class="fa fa-thumbs-o-down"></i> Disike</a></li>
                @else
                  <li>You disliked this.</li>
                @endif
                <li><a href="#"><i class="fa fa-comment-o"></i> Comment</a></li>
                <!-- <li><a href="#"><i class="fa fa-share-square-o"></i> Share</a></li> -->
              </ul>
              <ul class="comments">
                <li>
                  <img src="img/profileimg2.png" alt="img">
                  <span class="name">John Doe</span>
                  It is a historical process which mankind is carrying out in accordance with the natural laws of human development.
                </li>
                <li>
                  <img src="img/profileimg3.png" alt="img">
                  <span class="name">William Throwing</span>
                  Seems cool.
                </li>
                <li>
                  <img src="img/profileimg.png" alt="img">
                  <input type="text" class="form-control" placeholder="Post your comment...">
                </li>
              </ul>
            </div>
          </div>
        <!-- End Post -->
        @endforeach


      </div>
      <!-- End Left -->

    </div>
    <!-- End Social Content -->
  </div>
  <!-- End Social Profile -->
</div>
@endsection
