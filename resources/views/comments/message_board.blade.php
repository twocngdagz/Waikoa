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
                        @include('partials.facebook_comment', ['object_id'=>'message_board'])
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection

