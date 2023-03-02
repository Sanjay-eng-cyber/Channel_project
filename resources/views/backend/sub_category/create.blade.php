@extends('backend.layouts.app')
@section('title', 'Dashboard')
@section('content')
    <div class="layout-px-spacing row layout-top-spacing m-0">
        <div id="tableDropdown" class="col-lg-12 col-12 layout-spacing">
            <div class="statbox widget box box-shadow my-1">
                <div class="widget-header">
                    <div class="row justify-content-between align-items-center ">
                        <div class="col-lg-4 col-md-6 col-sm-6 mt-2 mb-2 ">
                            <legend class="h4">
                                Create Sub Category
                            </legend>
                        </div>

                        <div class="col-lg-4 col-md-6 col-sm-6 mb-2 d-flex justify-content-end align-it mt-2">
                            <nav class="breadcrumb-two" aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page"><a href="javascript:void(0);">Sub
                                            Category</a></li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <div class="statbox widget box box-shadow temp-a col-md-6">
                <div class="row m-0">
                    <div class="col-12">
                        <form class="mt-3" method="POST" action="{{ route('backend.sub_category.store') }}"
                            enctype="multipart/form-data" autocomplete="off">
                            @csrf
                            <div class="form-group mb-3 row">
                                <div class="col-xl-12 col-lg-4 col-md-6 col-sm-12 py-3">
                                    <label for="formGroupExampleInput" class="">Name</label>
                                    <input type="text" class="form-control" id="formGroupExampleInput"
                                        placeholder="Enter Name" minlength="3" maxlength="40" required name="name"
                                        value="{{ old('name') }}">
                                    @if ($errors->has('name'))
                                        <div class="text-danger" role="alert">{{ $errors->first('name') }}</div>
                                    @endif
                                </div>
                                <div class="col-xl-12 col-lg-4 col-md-6 col-sm-12 py-3">
                                    <label for="degree2">Category</label>
                                    <select class="form-control mb-4" name="category_id" required>
                                        <option value="">Select Any Category</option>
                                        @foreach ($categorys as $category)
                                            <option value="{{ $category->id }}"
                                                @if (old('category_id') == $category->id) {{ 'selected' }} @endif>
                                                {{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('category_id'))
                                        <div class="text-danger" role="alert">{{ $errors->first('category_id') }}
                                        </div>
                                    @endif
                                </div>
                                <div class="col-xl-12 col-lg-4 col-md-6 col-sm-12 py-3">
                                    <label for="formGroupExampleInput" class="">Image</label>
                                    <input type="file" class="form-control" id="formGroupExampleInput"required
                                        name="image">
                                    @if ($errors->has('image'))
                                        <div class="text-danger" role="alert">{{ $errors->first('image') }}</div>
                                    @endif
                                </div>
                                <div class="col-xl-12 col-lg-4 col-md-6 col-sm-12 py-3">
                                    <label for="degree2">Description</label>
                                    <textarea class="form-control" placeholder="Enter Description" rows="3" name="descriptions" minlength="3"
                                        maxlength="250">{{ old('descriptions') }}</textarea>
                                    @if ($errors->has('descriptions'))
                                        <div class="text-danger" role="alert">{{ $errors->first('descriptions') }}
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
    <script>
        /*
                                                                                Please try with devices with camera!
                                                                                */

        /*
        Reference:
        https://developer.mozilla.org/en-US/docs/Web/API/MediaDevices/getUserMedia
        https://developers.google.com/web/updates/2015/07/mediastream-deprecations?hl=en#stop-ended-and-active
        https://developer.mozilla.org/en-US/docs/Web/API/WebRTC_API/Taking_still_photos
        */

        // reference to the current media stream
        var mediaStream = null;

        // Prefer camera resolution nearest to 1280x720.
        var constraints = {
            audio: false,
            video: {
                width: {
                    ideal: 640
                },
                height: {
                    ideal: 480
                },
                facingMode: "environment"
            }
        };

        async function getMediaStream(constraints) {
            try {
                mediaStream = await navigator.mediaDevices.getUserMedia(constraints);
                let video = document.getElementById('cam');
                video.srcObject = mediaStream;
                video.onloadedmetadata = (event) => {
                    video.play();
                };
            } catch (err) {
                console.error(err.message);
            }
        };

        async function switchCamera(cameraMode) {
            try {
                // stop the current video stream
                if (mediaStream != null && mediaStream.active) {
                    var tracks = mediaStream.getVideoTracks();
                    tracks.forEach(track => {
                        track.stop();
                    })
                }

                // set the video source to null
                document.getElementById('cam').srcObject = null;

                // change "facingMode"
                constraints.video.facingMode = cameraMode;

                // get new media stream
                await getMediaStream(constraints);
            } catch (err) {
                console.error(err.message);
                alert(err.message);
            }
        }

        function takePicture() {
            let canvas = document.getElementById('canvas');
            let video = document.getElementById('cam');
            let photo = document.getElementById('photo');
            let context = canvas.getContext('2d');
            let clearBtn = document.getElementById('clerPhotoBtn');

            const height = video.videoHeight;
            const width = video.videoWidth;

            if (width && height) {
                canvas.width = width;
                canvas.height = height;
                context.drawImage(video, 0, 0, width, height);
                var data = canvas.toDataURL('image/png');
                photo.setAttribute('src', data);

                const dataURL = canvas.toDataURL('image/png');

                document.querySelector('input[name="profile_image"]').value = dataURL;
            } else {
                clearphoto();
            }
        }

        function clearPhoto() {
            let canvas = document.getElementById('canvas');
            let photo = document.getElementById('photo');
            let context = canvas.getContext('2d');


            context.fillStyle = "#AAA";
            context.fillRect(0, 0, canvas.width, canvas.height);
            var data = canvas.toDataURL('image/png');
            photo.setAttribute('src', data);

            const dataURL = canvas.toDataURL('image/png');

            //   document.querySelector('input[name="profile_image"]').value = dataURL;
            document.querySelector('input[name="profile_image"]').value = null;
        }

        function resetCamera() {
            // console.log('as');
            // stop the current video stream
            if (mediaStream != null && mediaStream.active) {
                var tracks = mediaStream.getVideoTracks();
                tracks.forEach(track => {
                    track.stop();
                })
            }
            // set the video source to null
            document.getElementById('cam').srcObject = null;
        }


        document.getElementById('switchFrontBtn').onclick = (event) => {
            switchCamera("user");
        }

        document.getElementById('switchBackBtn').onclick = (event) => {
            switchCamera("environment");
        }

        document.getElementById('snapBtn').onclick = (event) => {
            takePicture();
            event.preventDefault();
        }

        clearPhoto();

        function changeProfileImageType(imgType) {
            if (imgType == 'camera') {
                $('#camera_div').show()
                $('#myprofile').prop("type", 'hidden')
                // document.getElementById('image_input_div').innerHTML = `<input type="hidden" class="form-control col-12 col-md-4" name="profile_image"
            //                         id="myprofile" >`;
            } else if (imgType == 'file') {
                $('#camera_div').hide()
                // document.getElementById('image_input_div').innerHTML =
                //     `<input type="file" class="form-control col-12 col-md-4" name="profile_image">`;
                $('#myprofile').prop("type", 'file')
            } else {
                $('#camera_div').hide()
                $('#myprofile').prop("type", 'hidden')
            }
        }

        $('#profile_image_type').change(function() {
            changeProfileImageType(this.value)
        });

        $(document).ready(function() {
            changeProfileImageType($('#profile_image_type').val());
        });
    </script>
@endsection
