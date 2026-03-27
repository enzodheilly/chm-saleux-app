document.addEventListener("DOMContentLoaded", () => {
			    const input = document.querySelector("input[type='file']");
			    const preview = document.getElementById("image-preview");
			    const previewBox = document.getElementById("new-preview-box");
			
			    if (input && preview && previewBox) {
			        input.addEventListener("change", function() {
			            const file = this.files[0];
			
			            if (file) {
			                const reader = new FileReader();
			                reader.onload = function(e) {
			                    preview.src = e.target.result;
			                    previewBox.style.display = "block";
			                };
			                reader.readAsDataURL(file);
			            } else {
			                preview.src = "";
			                previewBox.style.display = "none";
			            }
			        });
			    }
			});