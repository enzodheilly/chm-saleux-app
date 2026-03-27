			document.addEventListener("DOMContentLoaded", () => {
			    const fileInput = document.querySelector("input[type='file']");
			    const previewContainer = document.getElementById("preview-container");
			    const previewImg = document.getElementById("image-preview");
			
			    if (fileInput && previewContainer && previewImg) {
			        fileInput.addEventListener("change", function() {
			            const file = this.files[0];
			
			            if (file) {
			                const reader = new FileReader();
			                reader.onload = function(e) {
			                    previewImg.src = e.target.result;
			                    previewContainer.style.display = "block";
			                };
			                reader.readAsDataURL(file);
			            } else {
			                previewImg.src = "";
			                previewContainer.style.display = "none";
			            }
			        });
			    }
			});