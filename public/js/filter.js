//Source code for the filter feature
//https://www.geeksforgeeks.org/create-a-photo-filters-and-effects-project-using-html-css-javascript/


let fileInput = document.getElementById("file_name"); //Input file element
let imageOutput = document.getElementById('image-output'); //Preview of Image

// Filter Section
let brightnessRange = document.getElementById("brightness");

const resetButton = document.getElementById("reset");
const saveButton = document.getElementById("upload-btn");

let currentImage = null;

// Reads the uploaded file
fileInput.addEventListener("change", function(event){
    const file = event.target.files[0];

    if(file){
        const reader = new FileReader();
        reader.onload = (event) => {
            currentImage =
                new Image();
            currentImage.src =
                event.target.result;
            currentImage.onload =
                () => {
                    imageOutput.src = fileInput.src;
                    resetFilters();
                };
        };
        reader.readAsDataURL(file);
    }
});

// Filter Section
brightnessRange.addEventListener(
    "input",
    () => {
    applyFilters();
});

// Reset button
resetButton.addEventListener(
    "click",
    () => {
        resetFilters();
});

// Save Button
saveButton.addEventListener(
    "click",
    () => {
        saveEditedImage();
});

// Apply the filters
function applyFilters() {
    if (currentImage) {
        const brightnessValue = brightnessRange.value;

        const filterValue = `brightness(${brightnessValue}%)`;
        imageOutput.style.filter = filterValue;
    }
}

// Reset all filters
function resetFilters() {
    if (currentImage) {
        brightnessRange.value = 100;
        imageOutput.style.filter =
            "none";
    }
}
// Save Edited Image and Transfer it to the uploadImg function to save to backend
function saveEditedImage() {
    if (currentImage) {
        const canvas = document.createElement("canvas");
        canvas.width = currentImage.width;
        canvas.height = currentImage.height;

        const context = canvas.getContext("2d");

        // Apply filters directly to the canvas
        context.filter = imageOutput.style.filter || "none";
        context.drawImage(currentImage, 0, 0, canvas.width, canvas.height);

        // Convert canvas to Blob and pass to the upload function
        canvas.toBlob((blob) => {
            croppedBlob = blob; // Assign the Blob for upload
            uploadImg(); // Call upload function
        }, "image/jpeg");
    }
}