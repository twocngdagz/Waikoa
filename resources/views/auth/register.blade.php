@extends('app')

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
            <div class="page-header">
                <h1><small>User Registration</small></h1>
            </div>
            <form class="form-horizontal" role="form" method="POST" action="/auth/register">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="panel panel-default">
                    <div class="panel-heading">Select a course</div>
                    <div class="panel-body">
                        Course Selection Here...
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">Credentials</div>
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
                        <div class="form-group">
                            <label class="col-md-4 control-label">Name</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="name" value="{{ old('name') }}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">E-Mail Address</label>
                            <div class="col-md-6">
                                <input type="email" class="form-control" name="email" value="{{ old('email') }}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">Password</label>
                            <div class="col-md-6">
                                <input type="password" class="form-control" name="password">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">Confirm Password</label>
                            <div class="col-md-6">
                                <input type="password" class="form-control" name="password_confirmation">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">Basic Profile Information</div>
                    <div class="panel-body">
                        <div class="form-group">
                            <label class="col-md-4 control-label">Job Title</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="job_title" value="{{ old('job_title') }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">Company Name</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="company_name" value="{{ old('company_name') }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">Company URL</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="company_url" value="{{ old('company_url') }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">Share Profile</label>
                            <div class="col-md-6">
                                <label>
                                    <input type="hidden" name="is_share_profile_student" value=0>
                                    <input type="checkbox" name="is_share_profile_student" value=1> Share my profile info with other student
                                </label>
                                <label>
                                    <input type="hidden" name="is_share_profile_public" value=0>
                                    <input type="checkbox" name="is_share_profile_public" value=1> Share my basic profile info publicly available
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">Contact Informationn</div>
                    <div class="panel-body">
                        <div class="form-group">
                            <label class="col-md-4 control-label">Telephone</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="telephone" value="{{ old('telephone') }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">Mobile Phone</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="mobile_phone" value="{{ old('mobile_phone') }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">Address</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="address" value="{{ old('address') }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">Fax</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="fax" value="{{ old('fax') }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">Share my contacts</label>
                            <div class="col-md-6">
                                <label>
                                    <input type="hidden" name="is_share_contact" value=0>
                                    <input type="checkbox" name="is_share_contact" value=1> Share my contact info with other student
                                </label>
                            </div>
                        </div>
                        <div class="alert alert-info col-md-6 col-md-offset-4" role="alert">
                            Your contact info will never be shared on a public page
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">Select Levels</div>
                    <div class="panel-body">
                        <div class="form-group">
                            <label class="col-md-4 control-label">Levels</label>
                            <div class="col-md-6">
                                <label class="radio">
                                    <input type="radio" name="level" value="level_1" checked="checked">
                                    Level 1
                                </label>
                                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s.
                                <label class="radio">
                                    <input type="radio" name="level" value="level_2">
                                    Level 2
                                </label>
                                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s.
                                <label class="radio">
                                    <input type="radio" name="level" value="level_3">
                                    Level 3
                                </label>
                                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s.
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Register
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
