
function saveColor(button) {
    let key = button.dataset.key;
    let color = document.getElementById(key).value;
    alert(`Color: ${color}, key: ${key}`);
    
    fetch('/home.updateddesign', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        },
        body: JSON.stringify({ key: key, color: color})
    })
    
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            alert("Color guardado correctamente!!.");
        } else {
            alert("Error al guardar el color.");
        }
        location.reload();
    })
    .catch(error => console.error("Error:", error));
}
