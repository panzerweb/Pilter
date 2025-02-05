//Image Upload Handling

let cropper; // Initialize cropper library
let croppedBlob = null; // The cropped image initialization
let uploadedFile = null; // Store the uploaded file

// Load the Modal
let initializeFunction = function () {
    let cropModal = document.getElementById("cropModal");
    let modalInstance = new bootstrap.Modal(cropModal); // Create a modal instance
    modalInstance.show(); // Show the modal
};

// When Modal is Fully Shown, Initialize Cropper
document.getElementById('cropModal').addEventListener('shown.bs.modal', () => {
    const image = document.getElementById('image-crop');
    image.classList.remove('d-none'); // Ensure the image is visible
    image.src = URL.createObjectURL(uploadedFile); // Use the stored file

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
});

// On File Input Change
let loadFile = function (event) {
    if (event.target.files) {
        uploadedFile = event.target.files[0];
    } else if (event instanceof Blob) {
        uploadedFile = event;
    }
    initializeFunction();
};

// On Crop Button Click
let cropImageAfter = function () {
    if (uploadedFile) {
        initializeFunction(); // Show the modal and initialize the cropper
    } else {
        Swal.fire({
            icon: "error",
            title: "Invalid Input",
            text: "Please upload an image first!",
        });    }
};

// Save the Cropped Image
let cropAndSave = function () {
    if (cropper) {
        const canvas = cropper.getCroppedCanvas({
            width: 1000,
            height: 400,
        });

        canvas.toBlob((blob) => {
            imageOutput.src = URL.createObjectURL(blob);
            let cropModal = bootstrap.Modal.getInstance(document.getElementById("cropModal"));
            cropModal.hide();

            croppedBlob = blob; // Save the cropped image blob
        }, 'image/jpeg');
    }
};

// Handle Image Upload
async function uploadImg(){

    let titlePost = document.getElementById('title');
    let descriptionPost = document.getElementById("description");

    let title = titlePost.value;
    let description = descriptionPost.value;
    const formData = new FormData();
    formData.append('title', title); 
    formData.append('description', description); 
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
            Swal.fire({
                title: "Image Uploaded Successfully",
                icon: "success",
                draggable: true
              });
            console.log(response.data);
        } else {
            Swal.fire({
                icon: "error",
                title: "Failed to upload image",
                text: "Something went wrong!",
            });
        }
    } catch (error) {
        console.error('Error uploading image:', error);
        Swal.fire({
            icon: "error",
            title: "Error occurred while uploading",
            text: "Something went wrong!",
        });    }
};

// Reset Cropper and Modal State When Modal is Closed
document.getElementById('cropModal').addEventListener('hidden.bs.modal', () => {
    if (cropper) {
        cropper.destroy(); // Destroy the Cropper instance
        cropper = null; // Reset the Cropper reference
    }
    const image = document.getElementById('image-crop');
    image.src = ''; // Clear the image source
    image.classList.add('d-none'); // Hide the image element
});

document.addEventListener('DOMContentLoaded', () => {
    console.log('Bootstrap loaded:', typeof bootstrap !== 'undefined');
});