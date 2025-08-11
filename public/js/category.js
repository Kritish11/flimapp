const Category = {
    init() {
        // Close modals when clicking outside
        document.querySelectorAll('.modal').forEach(modal => {
            modal.addEventListener('click', (e) => {
                if (e.target === modal) {
                    if (modal.id === 'categoryModal') this.closeModal();
                    if (modal.id === 'deleteModal') this.closeDeleteModal();
                }
            });
        });
    },

    previewImage(event) {
        const file = event.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = (e) => {
                document.getElementById('categoryImagePreview').src = e.target.result;
            };
            reader.readAsDataURL(file);
        }
    },

    // ... rest of your existing Category object methods ...
};

// Initialize Category functionality
Category.init();
