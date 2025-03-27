let debounce;

export const PreviewImage = (event) => {
    clearTimeout(debounce);
    debounce = setTimeout(() => {
        const file = event.target.files[0];
        const file_upload = document.querySelector("label[for='gambar']");
        const image_preview = document.getElementById("image-preview");
        let reader = new FileReader();
        image_preview.innerHTML = "";

        if (file) {
            reader.onload = (e) => {
                const img = document.createElement("img");
                img.src = e.target.result;
                img.alt = "Dokumentasi Kegiatan";

                file_upload.classList.add("hidden");
                img.classList.add("h-80", "w-full", "object-cover", "rounded-lg");
                image_preview.appendChild(img);
                image_preview.classList.remove("hidden");
            };

            console.log(reader.readAsDataURL(file));
        } else {
            image_preview.classList.add("hidden");
        }
    }, 300);
};