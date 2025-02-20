let profileOutput = document.getElementById('profile-output');

function previewImage(event){
    var input = event.target;
    var reader = new FileReader();
    reader.onload = function(){
        profileOutput.src = reader.result;
        profileOutput.style.display = 'block';
    };
    reader.readAsDataURL(input.files[0]);
}

// var input = event.target;
// var reader = new FileReader();
// reader.onload = function(){
//     let profileOutput = document.getElementById('profile-output');
//     profileOutput.src = reader.result;
//     profileOutput.style.display = 'block';
// };
// reader.readAsDataURL(input.files[0]);