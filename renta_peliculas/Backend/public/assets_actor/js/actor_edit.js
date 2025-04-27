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

// Contador de biografía
document.addEventListener('DOMContentLoaded', function() {
    const bioTextarea = document.getElementById('biography');
    const bioCounter = document.getElementById('bio-counter');
    
    if(bioTextarea && bioCounter) {
        bioTextarea.addEventListener('input', function() {
            const length = this.value.length;
            bioCounter.textContent = `${length}/500 caracteres`;
            bioCounter.style.color = length > 500 ? '#dc3545' : '#888';
        });
    }
});