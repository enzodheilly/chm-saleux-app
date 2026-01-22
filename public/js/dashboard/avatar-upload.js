(() => {
    const avatar = document.getElementById('user-avatar-img');
    const fileInput = document.getElementById('avatar-file-input');
    const form = document.getElementById('avatar-upload-form');
    const cropperModal = document.getElementById('cropperModal');
    const cropperImage = document.getElementById('cropperImage');
    const cropButton = document.getElementById('cropButton');
    const cancelCropButton = document.getElementById('cancelCropButton');
    if (!avatar || !fileInput || !form || !cropperModal || !cropperImage || !cropButton || !cancelCropButton) return;

    let cropper;

    avatar.addEventListener('click', () => fileInput.click());

    fileInput.addEventListener('change', () => {
        if (fileInput.files && fileInput.files[0]) {
            const reader = new FileReader();
            reader.onload = e => {
                cropperImage.src = e.target.result;
                cropperModal.style.display = 'flex';
                if (cropper) cropper.destroy();
                cropper = new Cropper(cropperImage, { aspectRatio: 1, viewMode: 1, background: false });
            };
            reader.readAsDataURL(fileInput.files[0]);
        }
    });

    cropButton.addEventListener('click', () => {
        if (!cropper) return;
        cropper.getCroppedCanvas({ width: 300, height: 300, fillColor: '#fff' }).toBlob(blob => {
            const croppedFile = new File([blob], "profile.png", { type: "image/png" });
            const dataTransfer = new DataTransfer();
            dataTransfer.items.add(croppedFile);
            fileInput.files = dataTransfer.files;
            form.submit();
            cropperModal.style.display = 'none';
        }, 'image/png');
    });

    cancelCropButton.addEventListener('click', () => {
        cropperModal.style.display = 'none';
        if (cropper) cropper.destroy();
    });
})();
