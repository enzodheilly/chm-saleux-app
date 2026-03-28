document.addEventListener('DOMContentLoaded', function () {

    // Confirmation suppression
    document.querySelectorAll('[data-confirm][data-submit]').forEach(function (btn) {
        btn.addEventListener('click', function () {
            if (confirm(this.dataset.confirm)) {
                document.getElementById(this.dataset.submit).submit();
            }
        });
    });

    // Preview nouvelle image
    const imageInput  = document.querySelector('input[type="file"]');
    const previewBox  = document.getElementById('new-preview-box');
    const previewImg  = document.getElementById('image-preview');

    if (imageInput && previewBox && previewImg) {
        imageInput.addEventListener('change', function () {
            if (this.files && this.files[0]) {
                const reader = new FileReader();
                reader.onload = function (e) {
                    previewImg.src = e.target.result;
                    previewBox.classList.remove('form-hidden');
                };
                reader.readAsDataURL(this.files[0]);
            }
        });
    }

});