@extends('app')

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
            <div class="page-header">
                <h1><small>{{Lang::get('user.page_title')}}</small></h1>
            </div>
            @if ($errors->any())
                <div class="row">
                    <div class="col-md-12">
                        <ul class="alert alert-danger">
                            {{Lang::get('user.error_title')}} <br><br>
                            <div class="row">
                                <div class="col-xs-12 col-xs-offset-1">
                                    @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                    @endforeach
                                </div>
                            </div>
                        </ul>
                    </div>
                </div>
            @endif
            <form class="form-horizontal" role="form" method="POST" action="{{action('PaymentController@pay')}}">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="panel panel-default">
                    <div class="panel-heading">{{Lang::get('user.group')}}</div>
                    <div class="panel-body">
                        <div class="form-group">
                            <label class="col-md-4 control-label">{{Lang::get('user.groups')}}</label>
                            <div class="col-md-6">
                                <label class="radio">
                                    <input type="radio" name="level" value="level_1" checked="checked">
                                    {{Lang::get('user.group_1')}}
                                </label>
                                {{Lang::get('user.group_1_description')}}
                                <label class="radio">
                                    <input type="radio" name="level" value="level_2">
                                    {{Lang::get('user.group_2')}}
                                </label>
                                {{Lang::get('user.group_2_description')}}
                                <label class="radio">
                                    <input type="radio" name="level" value="level_3">
                                    {{Lang::get('user.group_3')}}
                                </label>
                                {{Lang::get('user.group_3_description')}}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">{{Lang::get('user.credentials')}}</div>
                    <div class="panel-body">
                        <div class="form-group">
                            <label class="col-md-4 control-label">{{Lang::get('user.name')}}</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="name" value="{{ old('name') }}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">{{Lang::get('user.email')}}</label>
                            <div class="col-md-6">
                                <input type="email" class="form-control" name="email" value="{{ old('email') }}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">{{Lang::get('user.password')}}</label>
                            <div class="col-md-6">
                                <input type="password" class="form-control" name="password">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">{{Lang::get('user.password_confirmation')}}</label>
                            <div class="col-md-6">
                                <input type="password" class="form-control" name="password_confirmation">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">{{Lang::get('user.basic')}}</div>
                    <div class="panel-body">
                        <div class="form-group">
                            <label class="col-md-4 control-label">{{Lang::get('user.job_title')}}</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="job_title" value="{{ old('job_title') }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">{{Lang::get('user.company_name')}}</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="company_name" value="{{ old('company_name') }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">{{Lang::get('user.company_url')}}</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="company_url" value="{{ old('company_url') }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">{{Lang::get('user.share_profile')}}</label>
                            <div class="col-md-6">
                                <label>
                                    <input type="hidden" name="is_share_profile_student" value=0>
                                    <input type="checkbox" name="is_share_profile_student" value=1> {{Lang::get('user.share_my_profile_student')}}
                                </label>
                                <label>
                                    <input type="hidden" name="is_share_profile_public" value=0>
                                    <input type="checkbox" name="is_share_profile_public" value=1> {{Lang::get('user.share_my_profile_public')}}
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">{{Lang::get('user.contact')}}</div>
                    <div class="panel-body">
                        <div class="form-group">
                            <label class="col-md-4 control-label">{{Lang::get('user.telephone')}}</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="telephone" value="{{ old('telephone') }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">{{Lang::get('user.mobile_phone')}}</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="mobile_phone" value="{{ old('mobile_phone') }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">{{Lang::get('user.address')}}</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="address" value="{{ old('address') }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">{{Lang::get('user.fax')}}</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="fax" value="{{ old('fax') }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">{{Lang::get('user.share_contact')}}</label>
                            <div class="col-md-6">
                                <label>
                                    <input type="hidden" name="is_share_contact" value=0>
                                    <input type="checkbox" name="is_share_contact" value=1> {{Lang::get('user.share_contact_student')}}
                                </label>
                            </div>
                        </div>
                        <div class="alert alert-info col-md-6 col-md-offset-4" role="alert">
                            {{Lang::get('user.share_contact_info')}}
                        </div>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    {{Lang::get('user.register')}}
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

            </form>
		</div>
	</div>
</div>
@endsection
