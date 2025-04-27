// Preview de imagen
function previewImage(event) {
    const preview = document.getElementById('image-preview');
    const file = event.target.files[0];
    
    if(file) {
        const reader = new FileReader();
        reader.onload = function(e) {
            preview.style.display = 'block';
            preview.src = e.target.result;
        }
        reader.readAsDataURL(file);
    }
}

// Contador de caracteres para descripción
document.addEventListener('DOMContentLoaded', function() {
    const descTextarea = document.getElementById('description');
    const descCounter = document.getElementById('desc-counter');
    
    if(descTextarea && descCounter) {
        descTextarea.addEventListener('input', function() {
            const length = this.value.length;
            descCounter.textContent = `${length}/1000 caracteres`;
            descCounter.style.color = length > 1000 ? '#dc3545' : '#888';
        });
    }
});