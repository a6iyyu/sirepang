let debounce;

const PreviewImage = (event) => {
    clearTimeout(debounce);
    debounce = setTimeout(() => {
        const file = event.target.files[0];
        const file_upload = document.querySelector("label[for='gambar']");
        const image_preview = document.getElementById('image-preview');
        const reader = new FileReader();
        const size_image = document.getElementById('ukuran-gambar')
        const valid_extension = ['image/jpeg', 'image/jpg', 'image/png'];
        image_preview.innerHTML = '';

        if (!file) {
            image_preview.classList.add('hidden');
            return;
        }

        if (!valid_extension.includes(file.type)) {
            alert("Hanya file dengan format .jpg, .jpeg, atau .png yang diperbolehkan!");
            return;
        }

        if (file.size > 5 * 1024 * 1024) {
            alert('Ukuran gambar tidak boleh lebih dari 5MB!');
            return;
        }

        reader.onload = (e) => {
            const img = document.createElement('img');
            img.src = e.target.result;
            img.alt = 'Dokumentasi Kegiatan';
            file_upload.classList.add('hidden');
            img.classList.add('h-80', 'w-full', 'object-cover', 'rounded-lg');
            image_preview.appendChild(img);
            image_preview.classList.remove('hidden');
            size_image.innerHTML = Math.floor(file.size / 1024 + 1) + ' KB';
        };
        reader.readAsDataURL(file);
    }, 300);
};

window.preview_image = PreviewImage;