<div id="categoryModal" class="fixed inset-0 bg-black/50 hidden z-50">
    <!-- Added inner wrapper for centering -->
    <div class="flex items-center justify-center h-full">
        <div class="bg-white rounded-lg w-full max-w-lg mx-4">
            <div class="p-6">
                <div class="flex justify-between items-center mb-4">
                    <h3 id="modalTitle" class="text-lg font-semibold">Add Category</h3>
                    <button onclick="closeFormModal()" class="text-gray-400 hover:text-gray-600 text-xl">✕</button>
                </div>

                <form id="categoryForm" onsubmit="submitCategoryForm(event)">
                    @csrf
                    <input type="hidden" id="categoryId" name="id">

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700 mb-2">Category Name</label>
                        <input type="text"
                               id="categoryName"
                               name="name"
                               class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500"
                               required>
                        <p id="nameError" class="mt-1 text-sm text-red-600 hidden"></p>
                    </div>

                    <div class="flex justify-end gap-2">
                        <button type="button"
                                onclick="closeFormModal()"
                                class="px-4 py-2 bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200">
                            Cancel
                        </button>
                        <button type="submit"
                                id="submitBtn"
                                class="px-4 py-2 bg-purple-600 text-white rounded-lg hover:bg-purple-700">
                            Save
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
function openFormModal(category = null) {
    const modal = document.getElementById('categoryModal');
    const form = document.getElementById('categoryForm');
    const title = document.getElementById('modalTitle');

    form.reset();
    document.getElementById('nameError').classList.add('hidden');

    if (category) {
        title.textContent = 'Edit Category';
        document.getElementById('categoryId').value = category.id;
        document.getElementById('categoryName').value = category.name;
    } else {
        title.textContent = 'Add Category';
        document.getElementById('categoryId').value = '';
    }

    modal.classList.remove('hidden');
    document.getElementById('categoryName').focus();
}

function closeFormModal() {
    document.getElementById('categoryModal').classList.add('hidden');
    document.getElementById('categoryForm').reset();
    document.getElementById('nameError').classList.add('hidden');
}

async function submitCategoryForm(event) {
    event.preventDefault();
    const form = event.target;
    const id = form.id.value;
    const isEdit = !!id;
    const errorEl = document.getElementById('nameError');
    const submitBtn = document.getElementById('submitBtn');

    try {
        submitBtn.disabled = true;
        const formData = new FormData(form);

        const response = await fetch(isEdit ? `/categories/${id}` : '/categories', {
            method: isEdit ? 'PUT' : 'POST',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                'Accept': 'application/json'
            },
            body: formData
        });

        const data = await response.json();
        if (data.success) {
            closeFormModal();
            location.reload(); // Or update UI without reload
        } else {
            errorEl.textContent = data.message;
            errorEl.classList.remove('hidden');
        }
    } catch (error) {
        errorEl.textContent = 'An error occurred. Please try again.';
        errorEl.classList.remove('hidden');
    } finally {
        submitBtn.disabled = false;
    }
}

// Close modals when clicking outside
document.getElementById('categoryModal').addEventListener('click', function(e) {
    if (e.target === this) closeFormModal();
});

// Close on escape key
document.addEventListener('keydown', function(e) {
    if (e.key === 'Escape') {
        closeFormModal();
        closeDeleteModal();
    }
});
</script>
