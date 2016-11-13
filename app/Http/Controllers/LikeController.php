<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Like;
use Illuminate\Support\Facades\Auth;
use Session;
use App\Http\Requests;

class LikeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $like = Like::where('status_id', $id)->where('feedback', 1)->get();
        $dislike = Like::where('status_id', $id)->where('feedback', 2)->get();
        return View('like.index')->with('like', $like)->with('dislike', $dislike);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function like($id)
    {
        if(Like::where('user_id', Auth::user()->id)->count() == 0) {
            $like = new Like;
            $like->user_id = Auth::user()->id;
            $like->feedback = 1;
            $like->status_id = $id;
            $like->save();
        } else if(Like::where('user_id', Auth::user()->id)->count() == 1) {
            $like = Like::find($id);
            $like->user_id = Auth::user()->id;
            $like->feedback = 1;
            $like->status_id = $id;
            $like->save();
        }
        return redirect('home/#post-'.$id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function dislike($id)
    {
        if(Like::where('user_id', Auth::user()->id)->count() == 0) {
            $like = new Like;
            $like->user_id = Auth::user()->id;
            $like->feedback = 2;
            $like->status_id = $id;
            $like->save();
        } else if(Like::where('user_id', Auth::user()->id)->count() == 1) {
            $like = Like::find($id);
            $like->user_id = Auth::user()->id;
            $like->feedback = 2;
            $like->status_id = $id;
            $like->save();
        }
        return redirect('home/#post-'.$id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
