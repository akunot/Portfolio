// Contador de caracteres para biografía
const bioTextarea = document.getElementById('biography');
const bioCounter = document.getElementById('bio-counter');

if (bioTextarea && bioCounter) {
    bioTextarea.addEventListener('input', function() {
        const length = this.value.length;
        bioCounter.textContent = `${length}/500 caracteres`;
        
        if (length > 500) {
            bioCounter.style.color = '#dc3545'; // Rojo si excede el límite
        } else {
            bioCounter.style.color = '#6c757d'; // Gris si está dentro del límite
        }
    });
}

// Validación de archivo de imagen
const imageInput = document.getElementById('image');
if (imageInput) {
    imageInput.addEventListener('change', function() {
        const file = this.files[0];
        const maxSize = 5 * 1024 * 1024; // 5MB
        const allowedTypes = ['image/jpeg', 'image/png'];

        if (file && !allowedTypes.includes(file.type)) {
            alert('Formato de archivo no válido. Solo se permiten imágenes JPEG o PNG.');
            this.value = ''; // Limpiar el input
        }

        if (file && file.size > maxSize) {
            alert('El archivo es demasiado grande. El tamaño máximo permitido es 5MB.');
            this.value = ''; // Limpiar el input
        }
    });
}

// Vista previa de la imagen
function previewImage(event) {
    var reader = new FileReader();
    reader.onload = function(){
        var output = document.getElementById('image-preview');
        output.src = reader.result;
        output.style.display = 'block';
    };
    reader.readAsDataURL(event.target.files[0]);
}