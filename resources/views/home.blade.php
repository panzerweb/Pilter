@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Image</div>

                <div class="card-body">
                    <div class="d-flex justify-content-center">
                        <img
                        src="{{asset('images/misc/defaultimage.png')}}"
                        class="img-fluid rounded-4"
                        alt="Image Sample"
                        id="image-output"
                        />
                    </div>
                    
                    <div class="button-group d-flex justify-content-center gap-3 my-3">
                        <label for="file_name" class="btn btn-success">Upload Image</label>
                        <input
                            type="file"
                            class="form-control"
                            name="file_name"
                            id="file_name"
                            placeholder="Image"
                            aria-describedby="image"
                            onchange="loadFile(event)" style="display: none;"
                        />
                        <button class="btn btn-primary" id="upload-btn" onclick="uploadImg()">Save Image</button>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

@endsection
