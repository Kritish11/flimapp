<div id="category-{{ $category->id }}" class="bg-white rounded-xl shadow-md p-6 hover:shadow-lg transition-shadow">
    <div class="flex justify-between items-start mb-4">
        <div class="flex items-center gap-3">
            <div class="w-12 h-12 bg-purple-100 rounded-lg flex items-center justify-center">
                <span class="text-2xl">📁</span>
            </div>
            <div>
                <h3 class="font-semibold text-lg">{{ $category->name }}</h3>
                <p class="text-sm text-gray-500">0 videos</p>
            </div>
        </div>
        <div class="flex gap-2">
            <button onclick='openModal(@json($category))' class="p-2 hover:bg-gray-100 rounded-lg">✏️</button>
            <button onclick='deleteCategory({{ $category->id }})' class="p-2 hover:bg-gray-100 rounded-lg">🗑️</button>
        </div>
    </div>
</div>
