<?php namespace App\Waikoa\Model\MessageBoard;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Waikoa\Helpers\Helper;
use Illuminate\Support\Collection;
class Comment extends Model {

    use SoftDeletes;

    /**
     * Guarded fields
     *
     * @var array
     */
    protected $guarded = ['id'];
    protected $dates = ['deleted_at'];
    static $count = 1;
    static $arrayOfComment = array();

    /**
     * A user has many comments
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }


    /**
     * Get the Top Level Comment Only
     *
     * @param $object_id
     * @return mixed
     */
    public static function getRootComment($object_id, $total)
    {
        return Comment::where('reply_to', null)->where('object_id', $object_id)->orderBy('created_at', 'desc')->paginate($total);
    }


    /**
     * Get the counter for how depth the replies in the comment reply
     *
     * @return int
     */
    public static function getCounter()
    {
        return self::$count;
    }

    private static function incrementCounter()
    {
        self::$count++;
    }

    private static function decrementCounter()
    {
        self::$count--;
    }

    public static function getCommentArray()
    {
        $result = self::$arrayOfComment;
        static::resetCommentArray();
        return $result;
    }

    public static function resetCommentArray()
    {
        self::$arrayOfComment = array();
    }

    private static function storeCommentIntoArray($html_comment)
    {
        self::$arrayOfComment[] = $html_comment;
    }



    /**
     * Reset the counter to its default value which is 1
     *
     * @return int
     */
    public static function resetCounter()
    {
        return self::$count = 1;
    }


    /**
     * Get the replies of the Top Level Comment as well as the replies of the replies and so on.
     *
     * @param $id
     */
    public static function getCommentReplies($id)
    {
        $replies = Comment::where('reply_to', $id)->orderBy('created_at', 'desc')->get();
        foreach ($replies as $reply)
        {
            static::storeCommentIntoArray(Helper::generateCommentView($reply, 20 * self::getCounter()));
            if (static::commentHasReply($reply->id))
            {
                static::incrementCounter();
                static::getCommentReplies($reply->id);
                static::decrementCounter();
            }
        }

    }

    public static function getRootCommentCounter($reply_to)
    {
        if ($reply_to != NULL) {
            $comment = Comment::findOrFail($reply_to);
            if (static::commentHasParent($comment->reply_to))
            {
                static::incrementCounter();
                static::getRootCommentCounter($comment->reply_to);
            }
        }

    }


    private static function commentHasParent($reply_to)
    {
        if ($reply_to != NULL) {
            $comment = Comment::findOrFail($reply_to);
            if ($comment->count() > 0)
            {
                return true;
            }
        }

        return false;
    }


    /**
     * Check whether a comment has a reply
     *
     * @param $id
     * @return bool
     */
    private static function commentHasReply($id)
    {
        $comments = Comment::where('reply_to', $id)->get();
        if ($comments->count() > 0)
        {
            return true;
        } else {
            return false;
        }
    }
}