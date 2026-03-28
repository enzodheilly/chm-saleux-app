			document.addEventListener("DOMContentLoaded", () => {
			    const fileInput = document.querySelector("input[type='file']");
			    const previewImg = document.getElementById("image-preview");
			    const previewItem = document.getElementById("new-preview-item");
			
			    if (fileInput && previewImg && previewItem) {
			        fileInput.addEventListener("change", function() {
			            const file = this.files[0];
			
			            if (file) {
			                const reader = new FileReader();
			                reader.onload = function(e) {
			                    previewImg.src = e.target.result;
			                    previewItem.style.display = "block";
			                };
			                reader.readAsDataURL(file);
			            } else {
			                previewImg.src = "";
			                previewItem.style.display = "none";
			            }
			        });
			    }
			});

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
    const imageInput   = document.querySelector('input[type="file"]');
    const previewItem  = document.getElementById('new-preview-item');
    const previewImg   = document.getElementById('image-preview');

    if (imageInput && previewItem && previewImg) {
        imageInput.addEventListener('change', function () {
            if (this.files && this.files[0]) {
                const reader = new FileReader();
                reader.onload = function (e) {
                    previewImg.src = e.target.result;
                    previewItem.classList.remove('form-hidden');
                };
                reader.readAsDataURL(this.files[0]);
            }
        });
    }

});