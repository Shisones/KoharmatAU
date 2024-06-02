var previewImage = () => {
  const file = input_image.files;
  if (file) {
    const fileReader = new FileReader();
    const preview = document.getElementById("input-image-preview");
    fileReader.onload = (event) => {
      preview.innerHTML = `<img src="${event.target.result}" class="h-100"/>`;
    };
    fileReader.readAsDataURL(file[0]);
  }
};

var input_image = document.getElementById("input-image");
input_image.addEventListener("change", previewImage);