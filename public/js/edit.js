const updateImage = async function(id){
    //Input HTML elements
    let titleInput = document.getElementById(`title${id}`);
    let descriptionInput = document.getElementById(`description${id}`);
    let file_nameInput = document.getElementById(`file_name${id}`);

    //value
    let title = titleInput.value;
    let description = descriptionInput.value;
    let file_name = file_nameInput.value; 
    console.log(title, description, file_name);

    try {
        // Retrieve CSRF token
        const csrfToken = document.querySelector('meta[name="csrf-token"]').content;


        // Send Axios POST request
        const response = await axios.put(`/edit-image/${id}`, {
            title: title,
            description: description,
            file_name: file_name,
          }, {
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