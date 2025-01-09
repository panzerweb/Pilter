function cropUpdate(id){
    let saveButton = document.getElementById('saveButton');
    image = document.getElementById('image-update');
    image.src = id;

    if (cropper) {
        cropper.destroy(); // Destroy existing cropper instance
    }

    cropper = new Cropper(image, {
        responsive: true,
        autoCrop: false,
        zoomOnWheel: true,
        autoCropArea: 0.8,
        center: true,
        viewMode: 1, // Restrict the cropping box within the canvas
        ready() {
            this.cropper.crop();
        },
    });

    saveButton.style.display = 'block';
}

function saveUpdatedCroppedImage(){
    // Code here for saving an updated cropped image
}

const updateImage = async function(id){
    //Input HTML elements
    let titleInput = document.getElementById(`title${id}`);
    let descriptionInput = document.getElementById(`description${id}`);
    let file_nameInput = document.getElementById(`file_name${id}`);
    let croppedImage;

    //value
    let title = titleInput.value;
    let description = descriptionInput.value;
    let file_name = file_nameInput.value; 
    console.log(title, description, file_name);
    try {
        
        if(window.cropper){
            croppedImage = await new Promise((resolve) =>{
                window.cropper.getCroppedCanvas().toBlob((blob) =>{
                    resolve(blob);
                })
            })
        }

        let updateFormData = new FormData();
        updateFormData.append('title', title);
        updateFormData.append('description', description);
        updateFormData.append('file_name', file_name);

        if (croppedImage) {  
            updateFormData.append('image', blob); // Cropped image as a Blob
        }

        console.log(updateFormData);
        // Retrieve CSRF token
        const csrfToken = document.querySelector('meta[name="csrf-token"]').content;

        // Send Axios POST request
        const response = await axios.put(`/edit-image/${id}`, updateFormData, {
            headers: {
                'X-CSRF-TOKEN': csrfToken,
                'Content-Type': 'application/json',
            },
          }
        )

        // Handle response
        if (response.data.success) {
            let timerInterval;
            Swal.fire({
                title: "Image Updated Successfully",
                icon: "success",
                draggable: true,
                timer: 1000,
                timerProgressBar: true,
                didOpen: () => {
                    Swal.showLoading();
                },
                willClose: () => {
                clearInterval(timerInterval);
                }
                }).then((result) => {
                  /* Read more about handling dismissals below */
                  if (result.dismiss === Swal.DismissReason.timer) {
                    console.log("I was closed by the timer");
                  }
            });
            let cropModal = bootstrap.Modal.getInstance(document.getElementById(`editModal${id}`));
            cropModal.hide();

            // Dynamically update the title in the view
            const titleElement = document.querySelector(`#photo-title-${id}`);
            titleElement.textContent = title;
            
            console.log(response.data);
        } else {
            alert('Failed to Update image.');
        }
    } catch (error) {
        console.error('Error Updating image:', error);
        alert('An error occurred during the upload.');
    }
}

