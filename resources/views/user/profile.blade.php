@extends('app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="page-header">
                <h1><small>Your Profile</small></h1>
            </div>
            <form class="form-horizontal" role="form" method="POST" action="/user/profile">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="user_id" value="{{ $user->id }}">
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
                        @if (isset($success))
                            @if ($success)
                                <div class="alert alert-success">
                                    <strong>Congrats</strong> You have save your profile successfully.<br><br>
                                </div>
                            @endif
                        @endif
                        <div class="form-group">
                            <label class="col-md-4 control-label">Name</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="name" value="{{ $user->name }}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">E-Mail Address</label>
                            <div class="col-md-6">
                                <input type="email" class="form-control" name="email" value="{{ $user->email }}">
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
                                <input type="text" class="form-control" name="job_title" value="{{ $user->job_title }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">Company Name</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="company_name" value="{{ $user->company_name }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">Company URL</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="company_url" value="{{ $user->company_url }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">Share Profile</label>
                            <div class="col-md-6">
                                <label>
                                    <input type="hidden" name="is_share_profile_student" value=0>
                                    <input type="checkbox" name="is_share_profile_student" value="{{ $user->is_share_profile_student }}"> Share my profile info with other student
                                </label>
                                <label>
                                    <input type="hidden" name="is_share_profile_public" value=0>
                                    <input type="checkbox" name="is_share_profile_public" value="{{ $user->is_share_profile_public }}"> Share my basic profile info publicly available
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
                                <input type="text" class="form-control" name="telephone" value="{{ $user->telephone }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">Mobile Phone</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="mobile_phone" value="{{ $user->mobile_phone }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">Address</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="address" value="{{ $user->address }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">Fax</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="fax" value="{{ $user->fax }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">Share my contacts</label>
                            <div class="col-md-6">
                                <label>
                                    <input type="hidden" name="is_share_contact" value=0>
                                    <input type="checkbox" name="is_share_contact" value="{{ $user->is_share_contact }}"> Share my contact info with other student
                                </label>
                            </div>
                        </div>
                        <div class="alert alert-info col-md-6 col-md-offset-4" role="alert">
                            Your contact info will never be shared on a public page
                        </div>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Update Profile
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
