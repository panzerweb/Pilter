// Permanent Delete
function deleteUser(id){
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
            adminDelete(id);
        }
      });
}

// Handle User Delete
const adminDelete = async (id) => {
    try {
        // Retrieve CSRF token
        const csrfToken = document.querySelector('meta[name="csrf-token"]').content;

        // Send Axios POST request
        const response = await axios.delete(`/delete-user/${id}`, {
            headers: {
                'X-CSRF-TOKEN': csrfToken,
            },
        });

        // Handle response
        if (response.data.success) {
            Swal.fire({
                title: "User Deleted Successfully",
                icon: "success",
                draggable: true
              }).then(()=>{
                location.reload();
              });
            console.log(response.data);
        } else {
            Swal.fire({
                icon: "error",
                title: "Failed to Delete User",
                text: "Something went wrong!",
            });
        }
    } catch (error) {
        console.error('Error User image:', error);
        Swal.fire({
            icon: "error",
            title: "Error occurred while deleting",
            text: "Something went wrong!",
        });    }
};