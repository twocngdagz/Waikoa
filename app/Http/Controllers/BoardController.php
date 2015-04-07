<?php namespace App\Http\Controllers;


use App\Waikoa\Model\MessageBoard\Comment;
use Request;
use Auth;
use App\Waikoa\Helpers\Helper;

class BoardController extends Controller
{

    public function index()
    {
        $comments = Comment::getRootComment('message_board', 3);
        if (Request::ajax())
        {
            return response()->json($comments);
        }
        return view('comments.message_board', compact('comments'));
    }

    public function add()
    {
        $comment = new Comment;
        $comment->message = Request::get('comment');
        $comment->object_id = Request::get('object_id');
        $comment->reply_to = Request::get('reply_to') ? Request::get('reply_to') : NULL;
        $comment->user()->associate(Auth::user());
        $comment->save();
        $comment->created_at->setToStringFormat('m/d/Y g:i:s a');
        $data = array();
        if ($comment->reply_to)
        {
            Comment::getRootCommentCounter($comment->reply_to);
            $data['html'] = Helper::generateCommentView($comment, Comment::getCounter() * 20);
            Comment::resetCounter();
        } else {
            $data['html'] = Helper::generateCommentView($comment);
        }
        $data['id'] = $comment->id;
        $data['reply_to'] = $comment->reply_to ? $comment->reply_to : 0;
        return response()->json($data);
    }

    public function generateCommentView() {
        $comment = Comment::findOrFail(Request::get('comment_id'));
        return Helper::generateCommentView($comment);
    }

    public function getCommentReplies() {
        Comment::getCommentReplies(Request::get('comment_id'));
        return response()->json(Comment::getCommentArray());
    }

    public function resetCounter()
    {
        Comment::resetCounter();
    }

}