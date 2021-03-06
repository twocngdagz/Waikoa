<div class="panel panel-default">
    <div class="panel-heading">{{Lang::get('login.login_title')}}</div>
    <div class="panel-body">
        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form class="form-horizontal" role="form" method="POST" action="/auth/login">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">

            <div class="form-group">
                <div class="col-md-12">
                    <input type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Email Address">
                </div>
            </div>

            <div class="form-group">
                <div class="col-md-12">
                    <input type="password" class="form-control" name="password" placeholder="Password">
                </div>
            </div>

            <div class="form-group">
                <div class="col-md-12">
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" name="remember"> {{Lang::get('login.remember_me')}}
                        </label>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="col-md-12">
                    <button type="submit" class="btn btn-primary" style="margin-right: 15px;">
                        {{Lang::get('login.login_button')}}
                    </button>

                    <a href="/password/email">{{Lang::get('login.forgot_password')}}</a>
                </div>
            </div>
        </form>
    </div>
</div>
