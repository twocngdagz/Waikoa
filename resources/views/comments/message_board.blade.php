@extends('app')

@section('comment_css')
<link href="/css/main.css" rel="stylesheet">
@endsection

@section('comment_js')
<script type="text/javascript" src="js/prototype.js"></script>
<script type="text/javascript" src="js/effects.js"></script>
<script type="text/javascript" src="js/builder.js"></script>
<script type="text/javascript" src="js/scriptaculous.js"></script>
<script type="text/javascript" src="js/comment.js"></script>
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Message Board</div>

                <div class="panel-body">

                    <div  class="marketing_area">
                        <div align="center" ><?php //echo $this->successMsg; ?></div>
                        <div  class="marketing_text">
                            <?php
                                $CCOUNT = 10;
                                $total    = count($comments);
                                $counter  = 1;
                                $html = '<div id="emContent">';
                                $sender = '';
                                $object_id = 'message_board';
                                if($total > $CCOUNT){
                                    $html .= '<div class="emShowAllComments" id="emShowAllComments"><a href="javascript:viewAllComments();">View <span id="total_em_comments">'.$total.'</span> comments</a> <noscript><em>This page needs JavaScript to display all comments</em></noscript></div>';
                                }
                                foreach($comments as $comment){


                                    $html .=    '<div class="emComment" id="comment_'.$comment->id .'" '.($counter < ($total - ($CCOUNT - 1))?'style="display:none"':'').'>
                                                <div class="emCommentImage">
                                                      <img src="'. asset('img/default.gif') . '" width="32" height="32" alt="Gravatar" />
                                                </div>
                                                <div class="emCommentText">
                                                    '.'<span class="emSenderName">'.$comment->user->name.'</span>: '.stripslashes($comment->message).'
                                                </div>
                                                <div class="emCommentInto">
                                                    '.date_format($comment->created_at, 'm/d/Y g:i:s a').'
                                                </div>
                                              </div>';
                                    $counter++;
                                }
                                $html .= '</div>';

                                $html .= '<div id="emAddComment">
                                            <form method="post" action="board/comment" onsubmit="return false;">
                                            <input type="hidden" name="_token" id="_token" value="' .  csrf_token()  . '">
                                            <textarea placeholder="Add a Comment" id="addEmComment" name="comment_text"></textarea>
                                            <span class="emButton">
                                                <input type="submit" class="emButton" id="emAddButton" value="Comment" onclick="addEMComment(\''.$object_id.'\')" />
                                            </span>
                                          </div>';
                                echo '<div id="emComments" object="'.$object_id.'" class="ignorejsloader">'.$html.'</div>';
                            ?>

                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection