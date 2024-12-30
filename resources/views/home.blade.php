{{-- Page for the main dashboard --}}

@extends('layouts.app')

@section('content')


<div class="container">
    <div class="row justify-content-center">
        <h1 class="text-center text-light fw-semibold">PILTER</h1>
        <h5 class="text-center text-light fw-light mb-4">Enhance your Memories that you captured</h5>

        {{-- Upload Image --}}
        <div class="col-md-5">
            <div class="card text-bg-dark border-info mb-3">
                <div class="card-header text-center">
                    <h1 class="fs-4">Upload Image</h1>
                    <span class="text-secondary">Maximum Size: 5mb | </span>
                    <span class="text-secondary">Accepted File Types: .jpg,.png,.jpeg</span>
                </div>

                {{-- Image --}}
                <div class="d-flex justify-content-center" id="croppedResult">
                    <img
                    src="{{asset('images/misc/defaultimage.png')}}"
                    class="img-fluid d-block"
                    alt="Image Sample"
                    id="image-output"
                    style="max-width: 100%;"
                    />
                </div>

                {{-- Behavior Buttons --}}
                <div class="card-body">
                    <div class="button-group d-flex justify-content-center flex-column flex-md-row gap-3 my-3">
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
                        <button class="btn btn-danger" id="crop-btn" onclick="cropImageAfter()">Crop Image</button>
                        <button class="btn btn-primary" id="upload-btn">Save Image</button>
                    </div>
                </div>
            </div>

        </div>

        {{-- Filters --}}
        <div class="col-md-5">
            <div class="card text-bg-dark border-info mb-3">
                <div class="card-header text-center">
                    <h1 class="fs-4">Filters</h1>
                    <span class="text-secondary">Limited features of filters as of now.</span>
                </div>
                <div class="card-body">
                    <div class="controls p-3">
                        <label for="brightness" class="form-label text-light fw-semibold">
                            Brightness:
                        </label>
                        <input type="range" id="brightness" 
                               min="0" max="200" value="100" class="form-range"/>
                        <br />
                        <label for="contrast" class="form-label text-light fw-semibold">
                            Contrast:
                        </label>
                        <input type="range" id="contrast" 
                               min="0" max="200" value="100" class="form-range" />
                        <br />
                        <label for="grayscale" class="form-label text-light fw-semibold">
                            Grayscale:
                        </label>
                        <input type="range" id="grayscale" 
                               min="0" max="100" value="0" class="form-range" />
                        <br />
                        <label for="sepia" class="form-label text-light fw-semibold">
                            Sepia:
                        </label>
                        <input type="range" id="sepia" min="0" max="100" value="0" class="form-range" />
                        <br />
                        <label for="hue" class="form-label text-light fw-semibold">
                            Hue Rotation:
                        </label>
                        <input type="range" id="hue" 
                               min="0" max="360" value="0" class="form-range" />
                        <br />
                        <button id="reset" class="btn btn-danger">Reset</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Modal for Cropping-->
<div class="modal fade" id="cropModal" tabindex="-1" aria-labelledby="cropModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="cropModalLabel">Modal title</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div>
                <img id="image-crop" src="" style="max-width: 100%; height: auto;" class="d-none">
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary" onclick="cropAndSave()">Save changes</button>
        </div>
      </div>
    </div>
</div>


@endsection
