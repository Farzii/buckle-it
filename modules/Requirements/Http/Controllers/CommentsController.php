<?php namespace Modules\Requirements\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Modules\Requirements\Entities\Comment;
use Auth;

class CommentsController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($item_id, $type)
    {
        $comments = Comment::
            from('comments as comm')
            ->leftjoin('users', 'users.id', '=', 'comm.user_created')
            ->select('users.name', 'comm.*')
            ->where('comm.item_id', $item_id)
            ->where('comm.type', $type)
            ->orderBy('created_at','desc')
            ->get();
        $array = array(
            'html' => view('requirements::comments', compact('comments'))->render(),
            'item_id' => $item_id,
            'type' => $type
        );
        return $array;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $data = array_add($data, 'user_created', Auth::user()->id);
        $data = array_add($data, 'user_updated', Auth::user()->id);
        Comment::create($data);
        return back();
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
