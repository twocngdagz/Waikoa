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
                <div class="panel-heading">{{Lang::get('message_board.title_panel')}}</div>

                <div class="panel-body">

                    <div  class="marketing_area">
                        @include('partials.facebook_comment',
                            [
                                'href'          =>Lang::get('message_board.href'),
                                'numposts'      =>Lang::get('message_board.numposts'),
                                'colorscheme'   =>Lang::get('message_board.colorscheme'),
                                'width'         =>Lang::get('message_board.width')
                            ]
                        )
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection