<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class FeedbackController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $commentsProduct = DB::table('comment')
                    ->join('products', 'comment.product_id', '=', 'products.id')
                    ->select('comment.*', 'products.*')
                    ->get();

        $comments = DB::table('comment')
                    ->where('product_id', 'NULL')
                    ->get();
        return view('pages.admin.feedbackList',compact('comments','commentsProduct'));
    }

    public function searchFeedback(Request $request)
	{
		$search = $request->search;
 
		$comments = DB::table('comment')
                    ->where('name','like',"%".$search."%")
                    ->orWhere('comment','like',"%".$search."%")
                    ->orWhere('time','like',"%".$search."%")
                    ->get();
                    
		$commentsProduct = DB::table('comment')
                    ->join('products', 'comment.product_id', '=', 'products.id')
                    ->select('comment.*', 'products.*')
                    ->where('name','like',"%".$search."%")
                    ->orWhere('comment','like',"%".$search."%")
                    ->orWhere('nama','like',"%".$search."%")
                    ->orWhere('time','like',"%".$search."%")
                    ->get();
 
        return view('pages.admin.feedbackList',compact('comments','commentsProduct'));
	}

    public function showFeedback()
    {
        $commentsProduct = DB::table('comment')
                    ->join('products', 'comment.product_id', '=', 'products.id')
                    ->select('comment.*', 'products.*')
                    ->get();

        $comments = DB::table('comment')
                    ->where('product_id', 0)
                    ->get();
        return view('pages.admin.feedbackList',compact('comments','commentsProduct'));
    }

    public function feedback(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'name' => 'required',
            'comment' => 'required'
            ]);
        // $user = User::where('id',1)->first(); 
        // $products = Product::all();
        Comment::create([
            'name' => $request->name,
            'comment' => $request->comment,
            'time' => date('j F Y'),
        ]);
        return redirect('/');
    }

    public function feedbackProduct(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'name' => 'required',
            'comment' => 'required'
            ]);
        // $user = User::where('id',1)->first(); 
        // $products = Product::all();
        Comment::create([
            'product_id' => $request->product_id,
            'name' => $request->name,
            'email' => Auth::user()->email,
            'comment' => $request->comment,
            'time' => date('j F Y'),
        ]);
        return redirect('/');
    }

    public function deleteFeedback(Comment $comment)
    {
        Comment::destroy($comment->id_comment);
        return redirect('/feedbacks')->with('status','Feedback Berhasil Dihapus');
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
        $request->validate([
            'name' => 'required',
            'comment' => 'required'
            ]);
        Comment::create([
            'name' => $request->name,
            'email' => Auth::user()->email,
            'comment' => $request->comment,
            'time' => date('j F Y'),
        ]);
        return redirect('/');
    }

    public function storeProduct(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'comment' => 'required'
            ]);
        Comment::create([
            'product_id' => $request->product_id,
            'name' => $request->name,
            'email' => Auth::user()->email,
            'comment' => $request->comment,
            'time' => date('j F Y'),
        ]);
        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function show(Comment $comment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function edit(Comment $comment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comment $comment)
    {
        if ($comment->comment_status == 0) {
                    Comment::where('id_comment',$comment->id_comment)
                        ->update([
                            'comment_status' => 1,
                        ]
                    );
        }elseif ($comment->comment_status == 1){
                    Comment::where('id_comment',$comment->id_comment)
                        ->update([
                            'comment_status' => 0,
                        ]
                    );
        }

        return redirect('/feedbacks')->with('status','Status Feedback Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comment $comment)
    {
        Comment::destroy($comment->id_comment);
        return redirect('/feedbacks')->with('status','Feedback Berhasil Dihapus');
    }
}
