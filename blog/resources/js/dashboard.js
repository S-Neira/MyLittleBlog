
document.addEventListener('DOMContentLoaded', function () {
    const deleteButtons = document.querySelectorAll('.delete-post');
    const modal = document.getElementById('deleteModal');
    const cancelButton = document.getElementById('cancelButton');
    const confirmButton = document.getElementById('confirmButton');
    let deleteUrl = ''; // Guardará la URL de eliminación


     // Asegúrate de ocultar el modal al cargar la página
     modal.style.display = 'none';

    // Mostrar el modal
    deleteButtons.forEach(button => {
        button.addEventListener('click', function (e) {
            e.preventDefault(); // Evita la redirección inmediata
            deleteUrl = button.getAttribute('href'); // Obtiene la URL del botón
            modal.style.display = 'flex'; // Muestra el modal
        });
    });

    // Cerrar el modal al cancelar
    cancelButton.addEventListener('click', function () {
        modal.style.display = 'none'; // Oculta el modal
    });

    // Confirmar eliminación
    confirmButton.addEventListener('click', function () {
        window.location.href = deleteUrl; // Redirige a la URL de eliminación
        modal.style.display = 'none'; // Oculta el modal
    });

    // Cerrar el modal al hacer clic fuera de él
    window.addEventListener('click', function (e) {
        if (e.target === modal) {
            modal.style.display = 'none';
        }
    });
});