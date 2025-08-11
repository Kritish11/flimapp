<div id="categoryModal" class="modal fixed inset-0 z-50 hidden">
    <div class="absolute inset-0 bg-black bg-opacity-50"></div>
    <div class="relative min-h-screen flex items-center justify-center p-4">
        <div class="bg-white rounded-lg shadow-xl w-full max-w-md mx-auto">
            <div class="p-6">
                <div class="flex justify-between items-center mb-4">
                    <h3 id="modalTitle" class="text-lg font-semibold">Add Category</h3>
                    <button onclick="Category.closeModal()" class="text-gray-400 hover:text-gray-600">✕</button>
                </div>

                <form id="categoryForm" onsubmit="Category.handleSubmit(event)" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" id="categoryId" name="id">

                    <div class="mb-4">
                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700 mb-2">Category Image</label>
                            <div class="flex items-center justify-center">
                                <div class="w-32 h-32 relative">
                                    <img id="categoryImagePreview"
                                         src="{{ asset('images/default-category.png') }}"
                                         class="w-full h-full rounded-lg object-cover border-2 border-gray-200">
                                    <input type="file"
                                           id="categoryImage"
                                           name="image"
                                           accept="image/*"
                                           class="absolute inset-0 opacity-0 cursor-pointer"
                                           onchange="Category.previewImage(event)">
                                </div>
                            </div>
                        </div>

                        <label class="block text-sm font-medium text-gray-700 mb-2">Category Name</label>
                        <input type="text"
                               id="categoryName"
                               name="name"
                               required
                               class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent"
                               placeholder="Enter category name">
                        <p id="categoryError" class="mt-2 text-sm text-red-600 hidden"></p>
                    </div>

                    <div class="flex justify-end gap-3">
                        <button type="button"
                                onclick="Category.closeModal()"
                                class="px-4 py-2 border border-gray-300 rounded-lg hover:bg-gray-50">
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
