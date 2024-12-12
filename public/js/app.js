console.log("Hello World");

// Display image preview
let loadFile = function (event) {
    let image = document.getElementById('image-output');
    image.src = URL.createObjectURL(event.target.files[0]);
};

// Handle image upload
const uploadImg = async () => {
    const fileInput = document.getElementById('file_name');
    const file = fileInput.files[0];

    if (!file) {
        alert('Please select an image to upload.');
        return;
    }

    const formData = new FormData();
    formData.append('file_name', file);

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
            alert('Image uploaded successfully!');
            console.log(response.data);
        } else {
            alert('Failed to upload image.');
        }
    } catch (error) {
        console.error('Error uploading image:', error);
        alert('An error occurred during the upload.');
    }
};
