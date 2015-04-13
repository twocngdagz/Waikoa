<div  class="marketing_text">
    <?php
    $html = '<div id="emAddCommentHeader_'. $object_id . '">
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
    echo '<div class="emComments" object="'.$object_id.'" id="'.$object_id.'" token="'. csrf_token() . '">
            <div id="emContent_' . $object_id . '" class="emContent">'
        .$html.'
            </div>
        </div>';
    ?>

</div>
