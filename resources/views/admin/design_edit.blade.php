<!-- resources/views/modal.blade.php -->
<div x-show="showModal" class="fixed inset-0 flex items-center justify-center bg-gray-900 bg-opacity-50">
    <div class="bg-white p-4 rounded shadow-lg w-96">
        <h2 class="text-lg font-semibold mb-3">Editar Descripción</h2>

        <textarea x-model="description" class="border rounded w-full p-2"></textarea>

        <div class="flex justify-end space-x-2 mt-3">
            <button @click="showModal = false" class="bg-gray-300 px-3 py-1 rounded">Cancelar</button>
            <button @click="saveDescription()" class="bg-blue-500 text-white px-3 py-1 rounded">Guardar</button>
        </div>
    </div>
</div>