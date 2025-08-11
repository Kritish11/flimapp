<div id="deleteCategoryModal" class="fixed inset-0 bg-black/50 flex items-center justify-center hidden z-50">
    <div class="bg-white rounded-lg p-6 w-full max-w-sm mx-4">
        <div class="text-center">
            <div class="mb-4 text-3xl">🗑️</div>
            <h3 class="text-lg font-semibold mb-2">Delete Category</h3>
            <p id="deleteConfirmText" class="text-gray-600 mb-6">Are you sure you want to delete this category?</p>

            <div class="flex justify-center gap-3">
                <button onclick="closeDeleteModal()"
                        class="px-4 py-2 bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200">
                    Cancel
                </button>
                <button id="confirmDeleteBtn"
                        class="px-4 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700">
                    Delete
                </button>
            </div>
        </div>
    </div>
</div>

<script>
let categoryToDelete = null;

function openDeleteModal(id, name) {
    categoryToDelete = id;
    document.getElementById('deleteConfirmText').textContent = `Are you sure you want to delete "${name}"?`;
    document.getElementById('deleteCategoryModal').classList.remove('hidden');
    document.getElementById('confirmDeleteBtn').onclick = confirmDelete;
}

function closeDeleteModal() {
    document.getElementById('deleteCategoryModal').classList.add('hidden');
    categoryToDelete = null;
}

async function confirmDelete() {
    if (!categoryToDelete) return;

    try {
        const response = await fetch(`/categories/${categoryToDelete}`, {
            method: 'DELETE',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                'Accept': 'application/json'
            }
        });

        const data = await response.json();
        if (data.success) {
            document.getElementById(`category-${categoryToDelete}`).remove();
            closeDeleteModal();
            showToast('Category deleted successfully');
        } else {
            throw new Error(data.message);
        }
    } catch (error) {
        showToast(error.message, 'error');
    }
}
</script>

<!-- Toast Message -->
<div id="toast" class="fixed top-4 right-4 p-4 rounded-lg hidden"></div>
