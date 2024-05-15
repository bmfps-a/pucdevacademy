// script.js
function previewImage(event) {
    const input = event.target;
    const preview = document.getElementById('profilePreview');
    const reader = new FileReader();

    reader.onload = function() {
        preview.src = reader.result;
    }

    if (input.files && input.files[0]) {
        reader.readAsDataURL(input.files[0]);
    }
}

document.getElementById('profilePicture').addEventListener('change', previewImage);
