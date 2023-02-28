@extends('cms.layouts.app')
@section('title', 'Dashboard')
@section('content')
    <div class="layout-px-spacing row layout-top-spacing m-0">
        {{-- <div id="tableDropdown" class="col-lg-12 col-12 layout-spacing">
        <div class="statbox widget box box-shadow" style="padding: 10px">
            <div class="widget-header">
                <div class="row justify-content-between align-items-center">
                    <div class="col-3">
                        <h5>Expenses</h5>
                    </div>
                    <div class="col-7">
                    </div>
                    <div class="col-2">
                        <p>Home -> Expenses</p>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
        <div id="tableDropdown" class="col-lg-12 col-12 layout-spacing">
            <div class="statbox widget box box-shadow my-1">
                <div class="widget-header">
                    <div class="row justify-content-between align-items-center mb-1">
                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <legend class="h4">
                                Edit User
                            </legend>
                        </div>

                        <div class="col-lg-4 col-md-6 col-sm-12 mb-2 d-flex justify-content-end align-it mt-2 mt-lg-0">
                            <nav class="breadcrumb-two" aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page"><a
                                            href="javascript:void(0);">User</a></li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 col-lg-8">
                    <div class="statbox widget box box-shadow">
                        <form class="mt-3" method="POST" action="{{ route('cms.user.update', $users->id) }}">
                            @csrf
                            <div class="form-group mb-4 row">
                                <div class="col-md-6">
                                    <input type="hidden" name="role" value="receptionist">
                                    <label for="formGroupExampleInput3">Name</label>
                                    <input type="text" class="form-control" id="formGroupExampleInput3"
                                        placeholder="Enter Name" value="{{ old('name', $users->name) }}" minlength="3"
                                        maxlength="80" required name="name">
                                    @if ($errors->has('name'))
                                        <div class="text-danger" role="alert">{{ $errors->first('name') }}</div>
                                    @endif
                                </div>
                                <div class="col-md-6">
                                    <label for="formGroupExampleInput3">Email</label>
                                    <input type="text" class="form-control" id="formGroupExampleInput3"
                                        placeholder="Enter Email" value="{{ old('email', $users->email) }}" minlength="6"
                                        required name="email">
                                    @if ($errors->has('email'))
                                        <div class="text-danger" role="alert">{{ $errors->first('email') }}</div>
                                    @endif
                                </div>
                                <div class="col-md-6">
                                    <label for="formGroupExampleInput3">Password</label>
                                    <input type="password" class="form-control" id="formGroupExampleInput3"
                                        placeholder="Enter Password" minlength="8" required name="password">
                                    @if ($errors->has('password'))
                                        <div class="text-danger" role="alert">{{ $errors->first('password') }}</div>
                                    @endif
                                </div>
                                <div class="col-md-6">
                                    <label for="formGroupExampleInput3">Confirm Password</label>
                                    <input type="password" class="form-control" id="formGroupExampleInput3"
                                        placeholder="Enter Confirm Password" minlength="8" required
                                        name="confirm_password">
                                    @if ($errors->has('confirm_password'))
                                        <div class="text-danger" role="alert">{{ $errors->first('confirm_password') }}
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <input type="submit" class="btn btn-primary">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
@endsection
