@foreach ($photos as $photo)
    <!-- Modal for Editing-->
    <div class="modal fade" id="editModal{{$photo->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #2a3056;">
                <h1 class="modal-title fs-5 text-light" id="exampleModalLabel">{{$photo->file_name}}</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row justify-content-evenly">
                    <div class="col-lg-6">
                        <div class="d-flex justify-content-center flex-column">
                            <img src="{{asset($photo->file_path)}}" alt="" id="image-update" class="img-fluid rounded-3 border border-2 border-info" style="max-width: 100%;">
                        </div>
                    </div>
                    <div class="col-lg-5">
                        <div class="mb-3">
                            <label for="title" class="form-label fw-bold my-2">Title</label>
                            <input
                                type="text"
                                class="form-control border border-2 border-info"
                                name="title"
                                id="title{{$photo->id}}"
                                aria-describedby="helpId"
                                placeholder="Image Title"
                                value="{{$photo->title}}"
                            />
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label fw-bold my-2">Description</label>
                            <textarea class="form-control border border-2 border-info" name="description" id="description{{$photo->id}}" rows="3" placeholder="Description">{{$photo->description}}</textarea>
                        </div>
                        
                        <div class="mb-3">
                            <form action="{{ route('image.download', $photo->id) }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-primary">
                                    Download
                                </button>
                            </form>               
                        </div>
                    </div>

                </div>
                    
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="button" class="btn btn-info" onclick="updateImage({{$photo->id}})">Update</button>
            </div>
        </div>
        </div>
    </div>

@endforeach



