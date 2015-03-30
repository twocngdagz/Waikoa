@extends('app')

@section('comment_css')
<link href="/css/main.css" rel="stylesheet">
@endsection

@section('comment_js')
<script type="text/javascript" src="js/comment.js"></script>
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">{{Lang::get('message_board.title_panel')}}</div>

                <div class="panel-body">

                    <div  class="marketing_area">
                        <div align="center" ><?php //echo $this->successMsg; ?></div>
                        <div  class="marketing_text">
                            <?php
                            $object_id = 'message_board';
                            $CCOUNT = 10;
                            $total    = count($comments);
                            $counter  = 1;
                            $html = '<div id="emContent_'.$object_id.'" class="emContent">';
                            $sender = '';
                            if($total > $CCOUNT){
                                $html .= '<div class="emShowAllComments" id="emShowAllComments"><a href="javascript:viewAllComments();">View <span id="total_em_comments">'.$total.'</span> comments</a> <noscript><em>This page needs JavaScript to display all comments</em></noscript></div>';
                            }
                            foreach($comments as $comment){
                                $html .=  App\Waikoa\Helpers\Helper::generateCommentView($comment);
                                App\Waikoa\Model\MessageBoard\Comment::getCommentReplies($comment->id);
                                $replies = App\Waikoa\Model\MessageBoard\Comment::getCommentArray();
                                $counter++;
                                foreach ($replies as $reply)
                                {
                                    $html .= $reply;
                                    $counter++;
                                }
                                App\Waikoa\Model\MessageBoard\Comment::resetCounter();
                                $replies = App\Waikoa\Model\MessageBoard\Comment::resetCommentArray();
                            }
                            $html .= '</div>';

                            $html .= '<div id="emAddCommentHeader_'. $object_id . '">
                                        <div id="emAddComment_'. $object_id . '" class="emAddComment">
                                            <form method="post" action="board/comment" onsubmit="return false;">
                                            <input type="hidden" name="_token" id="_token" value="' .  csrf_token()  . '">
                                            <input type="hidden" name="object_id" id="object_id" value="' .  $object_id  . '">
                                            <input type="hidden" name="reply_to" value="" id="replyToEmPost_'.$object_id.'">
                                            <textarea placeholder="Add a Comment" id="addEmComment_'. $object_id .'" name="comment_text" data-alt-value="Reply to this Comment" class="addEmComment"></textarea>
                                            <span class="emButton">
                                                <input type="submit" class="emButton" id="emAddButton_'. $object_id . '" value="Comment" onclick="addEMComment(\''.$object_id.'\')" data-alt-value="Reply"/>
                                            </span>
                                        </div>
                                    </div>';
                            echo '<div class="emComments" object="'.$object_id.'" id="'.$object_id.'">'.$html.'</div>';
                            ?>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection