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