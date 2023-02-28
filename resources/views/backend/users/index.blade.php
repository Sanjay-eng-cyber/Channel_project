@extends('cms.layouts.app')
@section('title', 'Dashboard')
@section('content')
    <div class="layout-px-spacing row layout-top-spacing m-0">
        <div id="tableDropdown" class="col-lg-12 col-12 layout-spacing ">

            {{-- new --}}

            <div class="statbox widget box box-shadow my-1">
                <div class="widget-header">
                    <div class="row justify-content-between align-items-center mb-1 m-0">
                        <div class="col-lg-6 col-md-6 col-sm-6 mt-2">
                            <legend class="h4">
                                Users
                            </legend>
                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-6  d-flex justify-content-end align-it mt-2 ">
                            <nav class="breadcrumb-two" aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page"><a
                                            href="javascript:void(0);">Users</a></li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>

            <div class="statbox widget box box-shadow my-1">
                <div class="widget-header">
                    <div class="row align-items-center">
                        <div class="col-xl-4 col-md-4 col-sm-4 col-4">
                            {{-- <h4>Appointments</h4> --}}
                        </div>
                        <div class="col-xl-4 col-md-4 col-sm-4 col-4">
                        </div>
                    </div>
                </div>
                <div class="widget-content widget-content-area">
                    <div class="table-responsive min-height-20em">
                        <table class="table table-bordered mb-4">
                            <thead>
                                <tr>
                                    <th>Sr no.</th>
                                    <th>Name</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($users as $user)
                                    <tr>
                                        <td>{{ tableRowSrNo($loop->index, $users) }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td class="text-center">
                                            <div class="dropdown custom-dropdown">
                                                <a class="dropdown-toggle" href="#" role="button"
                                                    id="dropdownMenuLink1" data-toggle="dropdown" aria-haspopup="true"
                                                    aria-expanded="false">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                        class="feather feather-more-horizontal">
                                                        <circle cx="12" cy="12" r="1"></circle>
                                                        <circle cx="19" cy="12" r="1"></circle>
                                                        <circle cx="5" cy="12" r="1"></circle>
                                                    </svg>
                                                </a>

                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink1">
                                                    {{-- <a class="dropdown-item" href="">View</a> --}}
                                                    <a class="dropdown-item"
                                                        href="{{ route('cms.user.edit', $user->id) }}">Edit</a>
                                                    {{-- <a class="dropdown-item"
                                                        href="{{ route('cms.followups.delete', $user->id) }}"
                                                        onclick="return confirm('Are you sure you want to delete this Follow-Up?')">Delete</a> --}}
                                                </div>
                                            </div>

                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td class="text-center" colspan="3">No Records Found</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    <div class="pagination col-lg-12">
                        <div class="col-md-12 text-center align-self-center">
                            <ul class="pagination text-center">
                                {{ $users->appends(Request::all())->links('pagination::bootstrap-4') }}
                            </ul>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <div id="tableDropdown" class="col-lg-12 col-12 layout-spacing">

        </div>
    </div>
@endsection
@section('js')

@endsection
