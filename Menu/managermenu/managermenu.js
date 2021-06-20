var confirmDeleteModal = document.querySelector('.confirm-delete-modal')
var cn = document.getAttribute('img')

// Open Confirm Delete Modal
function openConfirmDeleteModal() {
    confirmDeleteModal.style.display = 'inline';
}

// Close Confirm Delete Modal
function closeConfirmDeleteModal() {
    confirmDeleteModal.style.display = 'none';
}