@foreach ($photos as $photo)
    <!-- Modal for Editing-->
    <div class="modal fade" id="editModal{{$photo->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog ">
        <div class="modal-content bg-dark text-light border border-2 border-info">
            <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">{{$photo->file_name}}</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="d-flex justify-content-center">
                    <img src="{{asset($photo->file_path)}}" alt="" id="image-update" class="img-fluid rounded-3 border border-2 border-info" style="max-width: 100%;">
                </div>

                <div class="mb-3">
                    <label for="title" class="form-label fw-bold my-3">File Name</label>
                    <input
                        type="text"
                        class="form-control bg-dark border border-2 border-info text-light"
                        name="file_name"
                        id="file_name{{$photo->id}}"
                        aria-describedby="helpId"
                        placeholder="Image Name"
                        value="{{$photo->file_name}}"
                    />
                </div>
                <div class="mb-3">
                    <label for="title" class="form-label fw-bold my-3">Title</label>
                    <input
                        type="text"
                        class="form-control bg-dark border border-2 border-info text-light"
                        name="title"
                        id="title{{$photo->id}}"
                        aria-describedby="helpId"
                        placeholder="Image Title"
                        value="{{$photo->title}}"
                    />
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label fw-bold my-3">Description</label>
                    <textarea class="form-control bg-dark border border-2 border-info text-light" name="description" id="description{{$photo->id}}" rows="3" placeholder="Description">{{$photo->description}}</textarea>
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



