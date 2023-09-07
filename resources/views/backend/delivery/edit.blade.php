@extends('backend.layouts.app')
@section('title', 'Edit Delivery')
@section('content')
    <div class="layout-px-spacing row layout-top-spacing m-0">
        <div id="tableDropdown" class="col-lg-12 col-12 layout-spacing">
            <div class="statbox widget box box-shadow my-1">
                <div class="widget-header">
                    <div class="row justify-content-between align-items-center ">
                        <div class="col-xl-4 col-md-6 col-sm-6 mt-2 mb-2 ">
                            <legend class="h4">
                                Edit Delivery
                            </legend>
                        </div>

                        <div class="col-xl-4 col-md-6 col-sm-6 mb-2 d-flex justify-content-end align-it mt-2">
                            <nav class="breadcrumb-two" aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page"><a
                                            href="javascript:void(0);">Edit Delivery</a></li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <div class="statbox widget box box-shadow temp-a col-md-6">

                <div class="row m-0">
                    <div class="col-12">
                        <form class="mt-3" method="POST" action="{{ route('backend.delivery.update', $delivery->id) }}"
                            enctype="multipart/form-data" autocomplete="off">
                            @csrf
                            <div class="form-group mb-12 row">

                                <div class="col-12">
                                    <label for="formGroupExampleInput" class="">Status</label>
                                    <select name="status" class="form-control" required>
                                        <option value="">Select Any</option>
                                        @if (old('status'))
                                            <option value="Pending"
                                                @if (old('status') == 'Pending') {{ 'selected' }} @endif>Pending
                                            </option>
                                            <option value="Intransit"
                                                @if (old('status') == 'Intransit') {{ 'selected' }} @endif>Intransit
                                            </option>
                                            <option value="Delivered"
                                                @if (old('status') == 'Delivered') {{ 'selected' }} @endif>Delivered
                                            </option>
                                            <option value="Returned"
                                                @if (old('status') == 'Returned') {{ 'selected' }} @endif>Returned
                                            </option>
                                        @else
                                            <option value="Pending"
                                                @if ($delivery->status == 'Pending') {{ 'selected' }} @endif>Pending
                                            </option>
                                            <option value="Intransit"
                                                @if ($delivery->status == 'Intransit') {{ 'selected' }} @endif>Intransit
                                            </option>
                                            <option value="Delivered"
                                                @if ($delivery->status == 'Delivered') {{ 'selected' }} @endif>Delivered
                                            </option>
                                            <option value="Returned"
                                                @if ($delivery->status == 'Returned') {{ 'selected' }} @endif>Returned
                                            </option>
                                        @endif
                                    </select>
                                    @if ($errors->has('status'))
                                        <div class="text-danger" role="alert">{{ $errors->first('status') }}</div>
                                    @endif
                                </div>
                                <div class="col-12">
                                    <label for="formGroupExampleInput" class="">Delivery Date</label>
                                    <input type="date" class="form-control" id="formGroupExampleInput"
                                        placeholder="Enter date" name="delivered_date"
                                        value="{{ $delivery->delivered_date ? dd_format($delivery->delivered_date, 'Y-m-d') : old('delivered_date') }}">
                                    @if ($errors->has('delivered_date'))
                                        <div class="text-danger" role="alert">{{ $errors->first('delivered_date') }}
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary float-right">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
@endsection
