console.log("Hello World");

const updateImage = async function(id){
    let titleInput = document.getElementById(`title${id}`);
    let descriptionInput = document.getElementById(`description${id}`);

    //value
    let title = titleInput.value;
    let description = descriptionInput.value;
    console.log(title, description);
    try {
        // Retrieve CSRF token
        const csrfToken = document.querySelector('meta[name="csrf-token"]').content;

        // Send Axios POST request
        const response = await axios.put(`/edit-image/${id}`, {
            title: title,
            description: description,
          }, {
            headers: {
                'X-CSRF-TOKEN': csrfToken,
                'Content-Type': 'application/json',
            },
          }
        )

        // Handle response
        if (response.data.success) {
            alert('Image Updated Successfully');
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