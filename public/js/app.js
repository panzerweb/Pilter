let cropper; //Initialize cropper library
let croppedBlob = null; //The cropped image initialization

// Load the Modal and Crop the Image
let loadFile = function (event) {
    let cropModal = document.getElementById("cropModal");
    let modalInstance = new bootstrap.Modal(cropModal); // Create a modal instance
    modalInstance.show();

    const image = document.getElementById('image-crop');
    image.src = URL.createObjectURL(event.target.files[0]);


    if (cropper) {
        cropper.destroy();
    }
    
    cropper = new Cropper(image, {
        responsive: true,
        autoCrop: false,
        zoomOnWheel: true,
        autoCropArea: 1,
        center: true,
        viewMode: 1, // Restrict the cropping box within the canvas
        ready() {
            this.cropper.crop();
            const cropContainer = cropper.cropper;
            cropContainer.style.width = '100%';
        },
    });

};


//Save the Cropped Image
let cropAndSave = function(){
    if (cropper) {
        const canvas = cropper.getCroppedCanvas({
            width: 1280,
            height: 720,
        });

        canvas.toBlob((blob) => {
            let imageInput = document.getElementById('image-output');
            imageInput.src = URL.createObjectURL(blob);
            let cropModal = bootstrap.Modal.getInstance(document.getElementById("cropModal"));
            cropModal.hide();

            croppedBlob = blob;
            
        }, 'image/jpeg');
    }
}

// Handle image upload
const uploadImg = async () => {

    const formData = new FormData();
    formData.append('file_name', croppedBlob, 'cropped_image.jpg'); // Append the cropped Blob with a filename

    try {
        // Retrieve CSRF token
        const csrfToken = document.querySelector('meta[name="csrf-token"]').content;

        // Send Axios POST request
        const response = await axios.post('/upload-image', formData, {
            headers: {
                'X-CSRF-TOKEN': csrfToken,
                'Content-Type': 'multipart/form-data',
            },
        });

        // Handle response
        if (response.data.success) {
            alert('Image Uploaded Successfully')
            console.log(response.data);
        } else {
            alert('Failed to upload image.');
        }
    } catch (error) {
        console.error('Error uploading image:', error);
        alert('An error occurred during the upload.');
    }
};