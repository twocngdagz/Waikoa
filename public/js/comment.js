/*******************************************************************************
 *  -- Comment Anything facebook Style --                                      *
 *                                                                             *
 *      Author: Kulikov Alexey <a.kulikov@gmail.com>                           *
 *      Web: http://clops.at                                                   *
 *      Since: 28.03.2010                                                      *
 *                                                                             *
 *******************************************************************************/


/***
 *  When a user is typing a comment the size of the textarea is extended
 ***/
function adjustHeight(textarea){
    var dif = textarea.scrollHeight - textarea.clientHeight;
    if (dif){
        if (isNaN(parseInt(textarea.style.height))){
            textarea.style.height = textarea.scrollHeight + "px"
        }else{
            textarea.style.height = parseInt(textarea.style.height) + dif + "px"
        }
    }
}

/***
 *  Creates placeholders for text in the field
 ***/
function inputPlaceholder (input, color) {

    if (!input) return null;

    /**
    * Webkit browsers already implemented placeholder attribute.
    * This function useless for them.
    */
    if (input.placeholder && 'placeholder' in document.createElement(input.tagName)) return input;

    var placeholder_color = color || '#AAA';
    var default_color = input.style.color;
    var placeholder = input.getAttribute('placeholder');

    if (input.value === '' || input.value == placeholder) {
        input.value = placeholder;
        input.style.color = placeholder_color;
    }

    var add_event = /*@cc_on'attachEvent'||@*/'addEventListener';

    input[add_event](/*@cc_on'on'+@*/'focus', function(){
        input.style.color = default_color;
        if (input.value == placeholder) {
            input.value = '';
        }
    }, false);

    input[add_event](/*@cc_on'on'+@*/'blur', function(){
        if (input.value === '') {
            input.value = placeholder;
            input.style.color = placeholder_color;
        } else {
            input.style.color = default_color;
        }
    }, false);

    input.form && input.form[add_event](/*@cc_on'on'+@*/'submit', function(){
        if (input.value == placeholder) {
            input.value = '';
        }
    }, false);

    return input;
}

/***
 *  Heart and soul of the application -- it ADDS the comment to the database
 ***/
function addEMComment(oid){
    var myComment = $('#addEmComment_' + oid);
    if (myComment.val() && myComment.val() != myComment.attr('placeholder')) {
        //mark comment box as inactive
        myComment.attr('disabled', 'true');
        $('#emAddButton_' + oid).attr('disabled', 'true');

        $.post(
            'board/comment', {
                comment: myComment.val(),
                object_id:    oid,
                _token : $('#_token').val(),
                reply_to: $('#replyToEmPost_'+oid).val()
            },
            function (data) {
                if(data.reply_to){
                    $('#comment_'+data.reply_to).after(data.html);
                } else {
                    $('#emContent_' + oid).append(data.html);
                }
                $('#comment_' + data.id).slideDown();
                resetFields(oid);
            }, 'json');
    }else{
        myComment.focus();
    }

    return false;
}

/***
 *  Clear Add Comment Fields
 ***/
function resetFields(oid) {
    var obj = document.getElementById('addEmComment_' + oid);
    if (obj) {
        obj.value = '';
        obj.style.color = '#333';
        obj.disabled = false;
        obj.style.height = '29px';
        inputPlaceholder(document.getElementById('addEmComment_' + oid));
    }

    obj = document.getElementById('emAddButton_' + oid);
    if (obj) {
        obj.disabled = false;
    }

    //put it in the correct place now
    toggleTexts(oid, true);
    $('#emAddCommentHeader_'+oid).append($('#emAddComment_'+oid));
    $('#replyToEmPost_'+oid).val('');
}



function replyToThisComment(cid, oid) {
    toggleTexts(oid);
    $('#replyToEmPost_'+oid).val(cid);

    //append the form where needed
    $('#emAddComment_'+oid).appendTo('#comment_'+cid);
    $('#addEmComment_'+oid).focus();
}

function toggleTexts(oid, reverse){
    var commentButton  = $('#emAddButton_'+oid);
    var commentText    = $('#addEmComment_'+oid);

    //toggle texts
    if(!commentButton.attr('data-alt-toggled') && !reverse || commentButton.attr('data-alt-toggled') && reverse){
        tempToggle = commentButton.val();
        commentButton.val(commentButton.attr('data-alt-value'));
        commentButton.attr('data-alt-value', tempToggle);
        commentButton.attr('data-alt-toggled', 1);
    }

    if(!commentText.attr('data-alt-toggled') && !reverse || commentText.attr('data-alt-toggled') && reverse){
        tempToggle = commentText.attr('placeholder');
        commentText.attr('placeholder', commentText.attr('data-alt-value'));
        commentText.attr('data-alt-value', tempToggle);
        commentText.attr('data-alt-toggled', 1);
    }
}

/***
 *  When there are more than 2 comments they are hidden and can be opened by this function
 ***/
function viewAllComments(){
    var coms = $$('div.emComment');
    for(var i=0; i<coms.length;i++){
        coms[i].show();
    }
    $('emShowAllComments').hide();
}

jQuery(document).ready(function () {
    //resetFields();
    $('#addEmComment_message_board').bind('keyup', function(event){
        adjustHeight(this);
    });
});