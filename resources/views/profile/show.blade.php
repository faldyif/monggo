<?php
  $followers = DB::table('follows')->where('following_id', $profile->id)->count();
  $following = DB::table('follows')->where('user_id', $profile->id)->count();
  $isFollowing = DB::table('follows')->where('following_id', $profile->id)->where('user_id', Auth::user()->id)->count();

?>

@extends('layouts.app')

@section('content')

<div class="container-no-padding">

  <!-- Start Social Profile -->
  <div class="social-profile">

    <!-- Start Top -->
    <div class="social-top">

      <div class="profile-left">
        <img src="{{ url('/') }}/img/profileimg.png" alt="img" class="profile-img">
        <h1 class="name">{{ $profile->name }}
          @if(Auth::user()->id != $profile->id && $isFollowing == 0)
            <a href="{{ url('follow') }}/{{ $profile->id }}" class="btn btn-primary"><i class="fa fa-plus"></i>Follow</a>
          @elseif($isFollowing == 1)
            <a id="button-unfollow" href="#" class="btn btn-warning" data-toggle="modal" data-target="#myModal"><i class="fa fa-minus"></i>Unfollow</a>
          @endif
        </h1>
        <p class="profile-text">There can be no thought of finishing...</p>
      </div>

    <ul class="social-stats">
      <li><b>{{ $followers }}</b>followers</li>
      <li><b>{{ $following }}</b>following</li>
      <li><b>523</b>posts</li>
    </ul>

    </div>
    <!-- End Top -->

    <!-- Start Social Content -->
    <div class="social-content clearfix">



      <!-- Start Left -->
      <div class="col-md-6 col-lg-4">

        <!-- Start Post -->
          <div class="panel panel-default">
            <div class="panel-body status">
              <ul class="panel-tools panel-tools-hover">
                <li><a class="icon expand-tool"><i class="fa fa-expand"></i></a></li>
                <li><a class="icon closed-tool"><i class="fa fa-times"></i></a></li>
              </ul>
              <div class="who clearfix">
                <img src="{{ url('/') }}/img/profileimg4.png" alt="img">
                <span class="name"><b>Egemem Ka</b> shared a post</span>
                <span class="from"><b>1 days ago</b> via Mobile, New York</span>
              </div>
              <div class="text">Spaceflights cannot be stopped. This is not the work of any one man or even a group of men. It is a historical process which mankind is carrying out in accordance with the natural laws of human development.</div>
              <ul class="links">
                <li><a href="#"><i class="fa fa-thumbs-o-up"></i> Like</a></li>
                <li><a href="#"><i class="fa fa-comment-o"></i> Comment</a></li>
                <li><a href="#"><i class="fa fa-share-square-o"></i> Share</a></li>
              </ul>
              <ul class="comments">
                <li>
                  <img src="{{ url('/') }}/img/profileimg2.png" alt="img">
                  <span class="name">John Doe</span>
                  It is a historical process which mankind is carrying out in accordance with the natural laws of human development.
                </li>
                <li>
                  <img src="{{ url('/') }}/img/profileimg3.png" alt="img">
                  <span class="name">William Throwing</span>
                  Seems cool.
                </li>
                <li>
                  <img src="{{ url('/') }}/img/profileimg.png" alt="img">
                  <input type="text" class="form-control" placeholder="Post your comment...">
                </li>
              </ul>
            </div>
          </div>
        <!-- End Post -->

        <!-- Start Post -->
          <div class="panel panel-default">
            <div class="panel-body status">
              <ul class="panel-tools panel-tools-hover">
                <li><a class="icon expand-tool"><i class="fa fa-expand"></i></a></li>
                <li><a class="icon closed-tool"><i class="fa fa-times"></i></a></li>
              </ul>
              <div class="who clearfix">
                <img src="{{ url('/') }}/img/profileimg2.png" alt="img">
                <span class="name"><b>John Doe</b> shared a post</span>
                <span class="from"><b>1 days ago</b> via Mobile, New York</span>
              </div>
              <div class="text"><p>
                Astronomy compels the soul to look upward, and leads us from this world to another.
                That's one small step for [a] man, one giant leap for mankind.
                I don't know what you could say about a day in which you have seen four beautiful sunsets.
                Where ignorance lurks, so too do the frontiers of discovery and imagination.
                We want to explore. We’re curious people. Look back over history, people have put their lives at stake to go out and explore … We believe in what we’re doing. Now it’s time to go.
                The regret on our side is, they used to say years ago, we are reading about you in science class. Now they say, we are reading about you in history class.</p>

                There can be no thought of finishing for ‘aiming for the stars.’ Both figuratively and literally, it is a task to occupy the generations. And no matter how much progress one makes, there is always the thrill of just beginning.
                Across the sea of space, the stars are other suns.
              </div>
              <ul class="links">
                <li><a href="#"><i class="fa fa-thumbs-o-up"></i> Like</a></li>
                <li><a href="#"><i class="fa fa-comment-o"></i> Comment</a></li>
                <li><a href="#"><i class="fa fa-share-square-o"></i> Share</a></li>
              </ul>
            </div>
          </div>
        <!-- End Post -->

      </div>
      <!-- End Left -->


      <!-- Start Middle -->
      <div class="col-md-6 col-lg-4">

        <!-- Start Post -->
          <div class="panel panel-default">
            <div class="panel-body status">
              <ul class="panel-tools panel-tools-hover">
                <li><a class="icon expand-tool"><i class="fa fa-expand"></i></a></li>
                <li><a class="icon closed-tool"><i class="fa fa-times"></i></a></li>
              </ul>
              <div class="who clearfix">
                <img src="{{ url('/') }}/img/profileimg4.png" alt="img">
                <span class="name"><b>Egemem Ka</b> shared a photo</span>
                <span class="from"><b>1 days ago</b> via Mobile, New York</span>
              </div>
              <div class="image"><img src="{{ url('/') }}/img/example1.jpg" alt="img"></div>
              <ul class="links">
                <li><a href="#"><i class="fa fa-thumbs-o-up"></i> Like</a></li>
                <li><a href="#"><i class="fa fa-comment-o"></i> Comment</a></li>
                <li><a href="#"><i class="fa fa-share-square-o"></i> Share</a></li>
              </ul>
              <ul class="comments">
                <li>
                  <img src="{{ url('/') }}/img/profileimg2.png" alt="img">
                  <span class="name">John Doe</span>
                  It is a historical process which mankind is carrying out in accordance with the natural laws of human development.
                </li>
                <li>
                  <img src="{{ url('/') }}/img/profileimg3.png" alt="img">
                  <span class="name">William Throwing</span>
                  Seems cool.
                </li>
                <li>
                  <img src="{{ url('/') }}/img/profileimg.png" alt="img">
                  <input type="text" class="form-control" placeholder="Post your comment...">
                </li>
              </ul>
            </div>
          </div>
        <!-- End Post -->

        <!-- Start Post -->
          <div class="panel panel-default">
            <div class="panel-body status">
              <ul class="panel-tools panel-tools-hover">
                <li><a class="icon expand-tool"><i class="fa fa-expand"></i></a></li>
                <li><a class="icon closed-tool"><i class="fa fa-times"></i></a></li>
              </ul>
              <div class="who clearfix">
                <img src="{{ url('/') }}/img/profileimg5.png" alt="img">
                <span class="name"><b>John Doe</b> shared a post</span>
                <span class="from"><b>1 days ago</b> via Mobile, New York</span>
              </div>
              <div class="text">
                Astronomy compels the soul to look upward, and leads us from this world to another.
              </div>
              <ul class="links">
                <li><a href="#"><i class="fa fa-thumbs-o-up"></i> Like</a></li>
                <li><a href="#"><i class="fa fa-comment-o"></i> Comment</a></li>
                <li><a href="#"><i class="fa fa-share-square-o"></i> Share</a></li>
              </ul>
            </div>
          </div>
        <!-- End Post -->

      </div>
      <!-- End Middle -->


      <!-- Start Right -->
      <div class="col-md-6 col-lg-4">

        <!-- Start Post -->
          <div class="panel panel-default">
            <div class="panel-body status">
              <ul class="panel-tools panel-tools-hover">
                <li><a class="icon expand-tool"><i class="fa fa-expand"></i></a></li>
                <li><a class="icon closed-tool"><i class="fa fa-times"></i></a></li>
              </ul>
              <div class="who clearfix">
                <img src="{{ url('/') }}/img/profileimg3.png" alt="img">
                <span class="name"><b>John Meight</b> send you a message</span>
                <span class="from"><b>1 days ago</b> via Mobile, New York</span>
              </div>
              <div class="text">Happy Birthday m8.</div>
              <ul class="links">
                <li><a href="#"><i class="fa fa-thumbs-o-up"></i> Like</a></li>
                <li><a href="#"><i class="fa fa-comment-o"></i> Comment</a></li>
                <li><a href="#"><i class="fa fa-share-square-o"></i> Share</a></li>
              </ul>
            </div>
          </div>
        <!-- End Post -->

        <!-- Start Post -->
          <div class="panel panel-default">
            <div class="panel-body status">
              <ul class="panel-tools panel-tools-hover">
                <li><a class="icon expand-tool"><i class="fa fa-expand"></i></a></li>
                <li><a class="icon closed-tool"><i class="fa fa-times"></i></a></li>
              </ul>
              <div class="who clearfix">
                <img src="{{ url('/') }}/img/profileimg6.png" alt="img">
                <span class="name"><b>Jane Doe</b> send you a message</span>
                <span class="from"><b>1 days ago</b> via Mobile, New York</span>
              </div>
              <div class="text">I don't know what you could say about a day in which you have seen four beautiful sunsets</div>
              <ul class="links">
                <li><a href="#"><i class="fa fa-thumbs-o-up"></i> Like</a></li>
                <li><a href="#"><i class="fa fa-comment-o"></i> Comment</a></li>
                <li><a href="#"><i class="fa fa-share-square-o"></i> Share</a></li>
              </ul>
            </div>
          </div>
        <!-- End Post -->

        <!-- Start Post -->
          <div class="panel panel-default">
            <div class="panel-body status">
              <ul class="panel-tools panel-tools-hover">
                <li><a class="icon expand-tool"><i class="fa fa-expand"></i></a></li>
                <li><a class="icon closed-tool"><i class="fa fa-times"></i></a></li>
              </ul>
              <div class="who clearfix">
                <img src="{{ url('/') }}/img/profileimg2.png" alt="img">
                <span class="name"><b>Heikan Doe</b> send you a message</span>
                <span class="from"><b>1 days ago</b> via Mobile, New York</span>
              </div>
              <div class="text">You know, being a test pilot isn't always the healthiest business in the world.</div>
              <ul class="links">
                <li><a href="#"><i class="fa fa-thumbs-o-up"></i> Like</a></li>
                <li><a href="#"><i class="fa fa-comment-o"></i> Comment</a></li>
                <li><a href="#"><i class="fa fa-share-square-o"></i> Share</a></li>
              </ul>
            </div>
          </div>
        <!-- End Post -->

        <!-- Start Post -->
          <div class="panel panel-default">
            <div class="panel-body status">
              <ul class="panel-tools panel-tools-hover">
                <li><a class="icon expand-tool"><i class="fa fa-expand"></i></a></li>
                <li><a class="icon closed-tool"><i class="fa fa-times"></i></a></li>
              </ul>
              <div class="who clearfix">
                <img src="{{ url('/') }}/img/profileimg4.png" alt="img">
                <span class="name"><b>Junior Doe</b> send you a message</span>
                <span class="from"><b>1 days ago</b> via Mobile, New York</span>
              </div>
              <div class="text">The dreams of yesterday are the hopes of today and the reality of tomorrow.</div>
              <ul class="links">
                <li><a href="#"><i class="fa fa-thumbs-o-up"></i> Like</a></li>
                <li><a href="#"><i class="fa fa-comment-o"></i> Comment</a></li>
                <li><a href="#"><i class="fa fa-share-square-o"></i> Share</a></li>
              </ul>
            </div>
          </div>
        <!-- End Post -->

      </div>
      <!-- End Right -->



    </div>
    <!-- End Social Content -->


  </div>
  <!-- End Social Profile -->



</div>
@if (Session::has('follow'))
<script>
  window.onload = function(){
    swal({
      title: "Person followed",
      text: "You have succesfully following {{ $profile->name }}",
      imageUrl: "{{ url('img/profileimg.png') }}",
      timer: 2000
    });
  };
</script>
@endif
@if (Session::has('unfollow'))
<script>
  window.onload = function(){
    swal({
      title: "Person unfollowed",
      text: "You have succesfully unfollowing {{ $profile->name }}",
      imageUrl: "{{ url('img/profileimg.png') }}",
      timer: 2000
    });
  };
</script>
@endif
<script>
document.querySelector('#button-unfollow').onclick = function(){
  swal({
    title: "Are you sure?",
    text: "You will not receive further posts of this account on your dashboard",
    type: "warning",
    showCancelButton: true,
    confirmButtonColor: "#DD6B55",
    confirmButtonText: "Yes, unfollow",
    closeOnConfirm: false
  },
  function(){
      window.location = "{{ url('unfollow') }}/{{ $profile->id }}";
  });
};
</script>
@endsection
