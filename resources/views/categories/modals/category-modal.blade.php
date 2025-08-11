<div id="categoryModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden">
    <div class="bg-white rounded-lg shadow-xl max-w-md w-full mx-4">
        <div class="p-6">
            <div class="flex justify-between items-center mb-4">
                <h3 id="modalTitle" class="text-lg font-semibold">Add Category</h3>
                <button onclick="closeModal('categoryModal')" class="text-gray-500 hover:text-gray-700">✕</button>
            </div>

            <form id="categoryForm" onsubmit="handleCategorySubmit(event)">
                @csrf
                <input type="hidden" id="categoryId" name="id">

                <div class="mb-4">
                    <label for="categoryName" class="block text-sm font-medium text-gray-700 mb-1">Category Name</label>
                    <input type="text"
                           id="categoryName"
                           name="name"
                           class="w-full p-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500"
                           required>
                </div>

                <div class="flex justify-end gap-2">
                    <button type="button"
                            onclick="closeModal('categoryModal')"
                            class="px-4 py-2 text-gray-700 bg-gray-100 rounded-lg hover:bg-gray-200">
                        Cancel
                    </button>
                    <button type="submit"
                            class="px-4 py-2 text-white bg-purple-600 rounded-lg hover:bg-purple-700">
                        Save
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
