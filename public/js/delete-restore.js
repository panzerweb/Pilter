//Soft Delete
function softDeleteImage(id){
    Swal.fire({
        title: "Are you sure?",
        text: "You can restore this in the trash.",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, delete it!"
      }).then((result) => {
        if (result.isConfirmed) {
            softDel(id);
        }
      });
}

const softDel = async (id) =>{
    try {
        // Retrieve CSRF token
        const csrfToken = document.querySelector('meta[name="csrf-token"]').content;

        // Send Axios POST request
        const response = await axios.delete(`/delete-image/${id}`, {
            headers: {
                'X-CSRF-TOKEN': csrfToken,
            },
        });

        // Handle response
        if (response.data.success) {
            Swal.fire({
                title: "Image Deleted Successfully",
                icon: "success",
                draggable: true
              }).then(()=>{
                location.reload();
              });
            console.log(response.data);
        } else {
            Swal.fire({
                icon: "error",
                title: "Failed to Delete image",
                text: "Something went wrong!",
            });
        }
    } catch (error) {
        console.error('Error Deleting image:', error);
        Swal.fire({
            icon: "error",
            title: "Error occurred while deleting",
            text: "Something went wrong!",
        });    }
}

// Restore Deleted Image
function restoreImage(id){
    Swal.fire({
        title: "Restore Selected Image?",
        text: "Go back to My Photos to see image",
        icon: "question",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, Restore it!"
      }).then((result) => {
        if (result.isConfirmed) {
            restore(id);       
        }
    });
}

// Handle Image Restore through Axios
const restore = async (id) => {
    try {
        // Retrieve CSRF token
        const csrfToken = document.querySelector('meta[name="csrf-token"]').content;

        // Send Axios POST request
        const response = await axios.get(`/restore-image/${id}`, {
            headers: {
                'X-CSRF-TOKEN': csrfToken,
            },
        });

        // Handle response
        if (response.data.success) {
            Swal.fire({
                title: "Image Restored Successfully",
                icon: "success",
                draggable: true
              }).then(()=>{
                location.reload();
              });
            console.log(response.data);
        } else {
            Swal.fire({
                icon: "error",
                title: "Failed to Restore image",
                text: "Something went wrong!",
            });
        }
    } catch (error) {
        console.error('Error Restoring image:', error);
        Swal.fire({
            icon: "error",
            title: "Error occurred while restoring",
            text: "Something went wrong!",
        });    }
};

// Permanent Delete
function permanentDelete(id){
    Swal.fire({
        title: "Are you sure to permanently delete this?",
        text: "You won't be able to revert this!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, delete it!"
      }).then((result) => {
        if (result.isConfirmed) {
            permDelete(id);
        }
      });
}

// Handle Image Upload
const permDelete = async (id) => {
    try {
        // Retrieve CSRF token
        const csrfToken = document.querySelector('meta[name="csrf-token"]').content;

        // Send Axios POST request
        const response = await axios.delete(`/permanently-delete/${id}`, {
            headers: {
                'X-CSRF-TOKEN': csrfToken,
            },
        });

        // Handle response
        if (response.data.success) {
            Swal.fire({
                title: "Image Delete Successfully",
                icon: "success",
                draggable: true
              }).then(()=>{
                location.reload();
              });
            console.log(response.data);
        } else {
            Swal.fire({
                icon: "error",
                title: "Failed to Delete image",
                text: "Something went wrong!",
            });
        }
    } catch (error) {
        console.error('Error Deleting image:', error);
        Swal.fire({
            icon: "error",
            title: "Error occurred while deleting",
            text: "Something went wrong!",
        });    }
};

// Delete All function

function deleteAll(){
    Swal.fire({
        title: "Are you sure to permanently delete all image?",
        text: "You won't be able to revert this!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, delete it!"
      }).then((result) => {
        if (result.isConfirmed) {
            deleteAllImage();
        }
      });
}

const deleteAllImage = async () => {
    try {
        // Retrieve CSRF token
        const csrfToken = document.querySelector('meta[name="csrf-token"]').content;

        // Send Axios POST request
        const response = await axios.delete(`/delete-all-image`, {
            headers: {
                'X-CSRF-TOKEN': csrfToken,
            },
        });

        // Handle response
        if (response.data.success) {
            Swal.fire({
                title: "All Image Deleted Successfully",
                icon: "success",
                draggable: true
              }).then(()=>{
                location.reload();
              });
            console.log(response.data);
        } else {
            Swal.fire({
                icon: "error",
                title: "Failed to Delete images",
                text: "Something went wrong!",
            });
        }
    } catch (error) {
        console.error('Error Deleting image:', error);
        Swal.fire({
            icon: "error",
            title: "Error occurred while deleting",
            text: "Something went wrong!",
        });    }
}