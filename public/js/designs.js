
function saveDesign(button) {
    let key = button.dataset.key;
    let value = document.getElementById(key).value;
    
    fetch('/home.updateddesign', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        },
        body: JSON.stringify({ key: key, value: value})
    })
    
    .then(response => response.json())
    .then(data => {
        alert(key + value);
        if (data.success) {
            alert("Diseño guardado correctamente.");
        } else {
            alert("Error al guardar el color.");
        }
        location.reload();
    })
    .catch(error => console.error("Error:", error));
}

// document.getElementById('image-input').addEventListener('change', function(event) {
//     let reader = new FileReader();
//     reader.onload = function(){
//         let preview = document.getElementById('preview');
//         preview.src = reader.result;
//         preview.classList.remove('hidden');
//     };
//     reader.readAsDataURL(event.target.files[0]);
// });

