(function() {
    
    document.addEventListener("trix-attachment-add", async function(event) {
        if (event.attachment.file) {
            let file = event.attachment.file;
            //let attachment = event.attachment;
            let input = document.querySelector("#company_description_1");
            let  newInput = input.value + `<img src='/storage/uploads/${file.name}'>`;
            // if (input) {
            //     input.value += `<img src='/storage/uploads/${file.name}'>`;
            //     input.dispatchEvent(new Event("input")); // Notificar a Alpine.js
            //     console.log(input.value);
            // }
            
            await uploadFile(file, newInput);

            // if (imageUrl) {
            //     // Inserta la imagen en Trix
            //     attachment.setAttributes({
            //         url: imageUrl,
            //         href: imageUrl
            //     });

            //     // Busca el input con x-model="newDescription" y agrega la imagen
            //     let input = document.querySelector("#company_description_1");
            //     if (input) {
            //         input.value += `<img src='${imageUrl}'>`;
            //         input.dispatchEvent(new Event("input")); // Notificar a Alpine.js
            //     }
            // }
        }
    });

    async function uploadFile(file, newInput) {
        let formData = new FormData();
        formData.append("file", file);
        formData.append("newInput", newInput);

        let response = await fetch('/upload-image', {
            method: "POST",
            headers: { 
                "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            },
            body: formData
        });

        if (!response.ok) {
            console.error("Error al subir el archivo");
            return null;
        }

        // let result = await response.json();
        // return result.url; // Laravel debe devolver {"url": "/storage/uploads/nombre_image.jpg"}
    }
})();


