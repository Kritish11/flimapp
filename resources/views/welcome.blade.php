<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>🎨 Cartoon World Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Fredoka+One&family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style>
        .cartoon-font { font-family: 'Fredoka One', cursive; }
        .clean-font { font-family: 'Poppins', sans-serif; }
        .sidebar-active {
            background-color: rgb(139 92 246);
            color: white;
        }
        .sidebar-active:hover {
            background-color: rgb(139 92 246) !important;
            color: white !important;
        }
        .tab-content {
            opacity: 0;
            display: none;
            transition: opacity 0.3s ease-in-out;
        }
        .tab-content.active {
            opacity: 1;
            display: block;
        }
        .sidebar-item.active {
            @apply bg-purple-600 text-white;
        }

        /* Bottom Sheet Modal Styles */
        .bottom-sheet {
            transform: translateY(100%);
            transition: transform 0.3s ease-in-out;
        }
        .bottom-sheet.active {
            transform: translateY(0);
        }
        .backdrop {
            background-color: rgba(0, 0, 0, 0);
            transition: background-color 0.3s ease-in-out;
            pointer-events: none;
        }
        .backdrop.active {
            background-color: rgba(0, 0, 0, 0.5);
            pointer-events: auto;
        }

        .custom-alert {
            transform: translateY(-100%);
            transition: transform 0.3s ease-in-out;
        }
        .custom-alert.active {
            transform: translateY(0);
        }

        .modal-backdrop {
            background-color: rgba(0, 0, 0, 0);
            opacity: 0;
            transition: all 0.3s ease-in-out;
        }
        .modal-backdrop.active {
            background-color: rgba(0, 0, 0, 0.5);
            opacity: 1;
        }
        .modal-content {
            transform: scale(0.95);
            opacity: 0;
            transition: all 0.3s ease-in-out;
        }
        .modal-content.active {
            transform: scale(1);
            opacity: 1;
        }
        .modal {
            opacity: 0;
            visibility: hidden;
            transition: all 0.3s ease;
        }
        .modal.active {
            opacity: 1;
            visibility: visible;
            background-color: rgba(0, 0, 0, 0.5);
        }
        .modal-content {
            transform: scale(0.95);
            opacity: 0;
            transition: all 0.3s ease;
        }
        .modal-content.active {
            transform: scale(1);
            opacity: 1;
        }
    </style>
</head>
<body class="bg-gray-50 clean-font">
    <div class="flex">
        <!-- Enhanced Sidebar -->
        <aside class="fixed h-screen w-64 bg-white shadow-lg z-50 flex flex-col">
            <!-- Logo Section -->
            <div class="p-4 border-b">
                <div class="flex items-center space-x-2">
                    <span class="text-3xl">🎨</span>
                    <h1 class="cartoon-font text-2xl text-purple-600">Cartoon World</h1>
                </div>
            </div>

            <!-- Profile Section -->
            <div class="p-4 border-b">
                <div class="flex items-center space-x-3 mb-3">
                    <img src="https://api.dicebear.com/6.x/adventurer/svg?seed=Felix" class="w-10 h-10 rounded-full ring-2 ring-purple-500">
                    <div>
                        <h3 class="font-semibold">Admin User</h3>
                        <p class="text-xs text-gray-500">administrator</p>
                    </div>
                </div>
            </div>

            <!-- Navigation -->
            <nav class="flex-1 p-4 space-y-2 overflow-y-auto">
                <a href="#" onclick="showTab('dashboard')" class="sidebar-item sidebar-active flex items-center space-x-3 p-3 rounded-lg hover:bg-purple-50 group transition-colors" data-target="dashboard">
                    <span class="text-xl group-hover:scale-110 transition-transform">📊</span>
                    <span>Dashboard</span>
                </a>
                <a href="#" onclick="showTab('videos')" class="sidebar-item flex items-center space-x-3 p-3 rounded-lg hover:bg-purple-50 group transition-colors" data-target="videos">
                    <span class="text-xl group-hover:scale-110 transition-transform">🎬</span>
                    <span class="group-hover:text-purple-600">Cartoon Videos</span>
                </a>
                <a href="#" onclick="showTab('categories')" class="sidebar-item flex items-center space-x-3 p-3 rounded-lg hover:bg-purple-50 group transition-colors" data-target="categories">
                    <span class="text-xl group-hover:scale-110 transition-transform">📁</span>
                    <span class="group-hover:text-purple-600">Categories</span>
                </a>
                <a href="#" onclick="showTab('admob')" class="sidebar-item flex items-center space-x-3 p-3 rounded-lg hover:bg-purple-50 group transition-colors" data-target="admob">
                    <span class="text-xl group-hover:scale-110 transition-transform">📱</span>
                    <span class="group-hover:text-purple-600">AdMob Settings</span>
                </a>
            </nav>

            <!-- Bottom Actions -->
            <div class="p-4 border-t space-y-2">
                <button class="flex items-center space-x-3 p-3 rounded-lg hover:bg-red-50 w-full group transition-colors">
                    <span class="text-xl group-hover:scale-110 transition-transform">🚪</span>
                    <span class="group-hover:text-red-600">Logout</span>
                </button>
            </div>
        </aside>

        <!-- Main Content -->
        <div class="ml-64 flex-1">
            <main class="p-8">
                <!-- Dashboard Content -->
                <div id="dashboard" class="tab-content active">
                    <h2 class="text-2xl font-bold mb-6">Dashboard Overview</h2>

                    <!-- Stats Cards -->
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">
                        <div class="bg-gradient-to-br from-purple-500 to-purple-600 rounded-2xl p-6 text-white shadow-lg">
                            <div class="flex justify-between items-center">
                                <div>
                                    <p class="text-purple-100">Total Videos</p>
                                    <h3 class="text-3xl font-bold">248</h3>
                                </div>
                                <span class="text-4xl">🎬</span>
                            </div>
                        </div>
                        <div class="bg-gradient-to-br from-pink-500 to-pink-600 rounded-2xl p-6 text-white shadow-lg">
                            <div class="flex justify-between items-center">
                                <div>
                                    <p class="text-pink-100">Categories</p>
                                    <h3 class="text-3xl font-bold">12</h3>
                                </div>
                                <span class="text-4xl">📁</span>
                            </div>
                        </div>
                        <div class="bg-gradient-to-br from-orange-500 to-orange-600 rounded-2xl p-6 text-white shadow-lg">
                            <div class="flex justify-between items-center">
                                <div>
                                    <p class="text-orange-100">New Today</p>
                                    <h3 class="text-3xl font-bold">8</h3>
                                </div>
                                <span class="text-4xl">⭐</span>
                            </div>
                        </div>
                    </div>

                    <!-- Video Grid -->
                    <div class="mb-8">
                        <h3 class="text-xl font-bold mb-4">Recent Videos</h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                            <div class="bg-white rounded-xl shadow-md overflow-hidden">
                                <div class="aspect-video bg-purple-100 relative">
                                    <span class="absolute inset-0 flex items-center justify-center text-4xl">🎥</span>
                                </div>
                                <div class="p-4">
                                    <span class="px-2 py-1 bg-purple-100 text-purple-600 rounded-full text-sm">Adventure</span>
                                    <h4 class="mt-2 font-semibold">Cartoon Title 1</h4>
                                    <p class="text-sm text-gray-500">Added 2 days ago</p>
                                </div>
                            </div>
                            <div class="bg-white rounded-xl shadow-md overflow-hidden">
                                <div class="aspect-video bg-purple-100 relative">
                                    <span class="absolute inset-0 flex items-center justify-center text-4xl">🎥</span>
                                </div>
                                <div class="p-4">
                                    <span class="px-2 py-1 bg-purple-100 text-purple-600 rounded-full text-sm">Adventure</span>
                                    <h4 class="mt-2 font-semibold">Cartoon Title 2</h4>
                                    <p class="text-sm text-gray-500">Added 2 days ago</p>
                                </div>
                            </div>
                            <div class="bg-white rounded-xl shadow-md overflow-hidden">
                                <div class="aspect-video bg-purple-100 relative">
                                    <span class="absolute inset-0 flex items-center justify-center text-4xl">🎥</span>
                                </div>
                                <div class="p-4">
                                    <span class="px-2 py-1 bg-purple-100 text-purple-600 rounded-full text-sm">Adventure</span>
                                    <h4 class="mt-2 font-semibold">Cartoon Title 3</h4>
                                    <p class="text-sm text-gray-500">Added 2 days ago</p>
                                </div>
                            </div>
                            <div class="bg-white rounded-xl shadow-md overflow-hidden">
                                <div class="aspect-video bg-purple-100 relative">
                                    <span class="absolute inset-0 flex items-center justify-center text-4xl">🎥</span>
                                </div>
                                <div class="p-4">
                                    <span class="px-2 py-1 bg-purple-100 text-purple-600 rounded-full text-sm">Adventure</span>
                                    <h4 class="mt-2 font-semibold">Cartoon Title 4</h4>
                                    <p class="text-sm text-gray-500">Added 2 days ago</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Categories Table -->
                    <div>
                        <h3 class="text-xl font-bold mb-4">Categories Overview</h3>
                        <div class="bg-white rounded-xl shadow-md overflow-hidden">
                            <table class="min-w-full">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Category</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Videos</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Last Updated</th>
                                        <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-200">
                                    <tr>
                                        <td class="px-6 py-4">
                                            <div class="flex items-center">
                                                <span class="text-xl mr-2">📁</span>
                                                <span>Adventure</span>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4">42</td>
                                        <td class="px-6 py-4 text-gray-500">2 hours ago</td>
                                        <td class="px-6 py-4 text-right">
                                            <button class="text-blue-600 hover:text-blue-800 mx-1">Edit</button>
                                            <button class="text-red-600 hover:text-red-800 mx-1">Delete</button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="px-6 py-4">
                                            <div class="flex items-center">
                                                <span class="text-xl mr-2">📁</span>
                                                <span>Comedy</span>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4">42</td>
                                        <td class="px-6 py-4 text-gray-500">2 hours ago</td>
                                        <td class="px-6 py-4 text-right">
                                            <button class="text-blue-600 hover:text-blue-800 mx-1">Edit</button>
                                            <button class="text-red-600 hover:text-red-800 mx-1">Delete</button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="px-6 py-4">
                                            <div class="flex items-center">
                                                <span class="text-xl mr-2">📁</span>
                                                <span>Educational</span>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4">42</td>
                                        <td class="px-6 py-4 text-gray-500">2 hours ago</td>
                                        <td class="px-6 py-4 text-right">
                                            <button class="text-blue-600 hover:text-blue-800 mx-1">Edit</button>
                                            <button class="text-red-600 hover:text-red-800 mx-1">Delete</button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <!-- Videos Content -->
                <div id="videos" class="tab-content hidden">
                    <div class="flex justify-between items-center mb-6">
                        <h2 class="text-2xl font-bold">Cartoon Videos</h2>
                        <button class="bg-purple-600 text-white px-4 py-2 rounded-lg hover:bg-purple-700 flex items-center gap-2">
                            <span>➕</span> Add New Video
                        </button>
                    </div>

                    <!-- Video Grid -->
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                        <div class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-lg transition-shadow">
                            <div class="aspect-video bg-purple-100 relative group">
                                <img src="https://picsum.photos/400/225?random=1" class="w-full h-full object-cover" alt="Video thumbnail">
                                <div class="absolute inset-0 bg-black bg-opacity-50 hidden group-hover:flex items-center justify-center space-x-4">
                                    <button class="p-2 bg-white rounded-full hover:bg-purple-100">✏️</button>
                                    <button class="p-2 bg-white rounded-full hover:bg-purple-100">🗑️</button>
                                    <button class="p-2 bg-white rounded-full hover:bg-purple-100">▶️</button>
                                </div>
                            </div>
                            <div class="p-4">
                                <div class="flex gap-2 mb-2">
                                    <span class="px-2 py-1 bg-purple-100 text-purple-600 rounded-full text-xs">Adventure</span>
                                    <span class="px-2 py-1 bg-pink-100 text-pink-600 rounded-full text-xs">Kids</span>
                                </div>
                                <h4 class="font-semibold mb-1">Awesome Cartoon Episode 1</h4>
                                <p class="text-sm text-gray-500">Duration: 22:30</p>
                            </div>
                        </div>
                        <div class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-lg transition-shadow">
                            <div class="aspect-video bg-purple-100 relative group">
                                <img src="https://picsum.photos/400/225?random=2" class="w-full h-full object-cover" alt="Video thumbnail">
                                <div class="absolute inset-0 bg-black bg-opacity-50 hidden group-hover:flex items-center justify-center space-x-4">
                                    <button class="p-2 bg-white rounded-full hover:bg-purple-100">✏️</button>
                                    <button class="p-2 bg-white rounded-full hover:bg-purple-100">🗑️</button>
                                    <button class="p-2 bg-white rounded-full hover:bg-purple-100">▶️</button>
                                </div>
                            </div>
                            <div class="p-4">
                                <div class="flex gap-2 mb-2">
                                    <span class="px-2 py-1 bg-purple-100 text-purple-600 rounded-full text-xs">Adventure</span>
                                    <span class="px-2 py-1 bg-pink-100 text-pink-600 rounded-full text-xs">Kids</span>
                                </div>
                                <h4 class="font-semibold mb-1">Awesome Cartoon Episode 2</h4>
                                <p class="text-sm text-gray-500">Duration: 22:30</p>
                            </div>
                        </div>
                        <div class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-lg transition-shadow">
                            <div class="aspect-video bg-purple-100 relative group">
                                <img src="https://picsum.photos/400/225?random=3" class="w-full h-full object-cover" alt="Video thumbnail">
                                <div class="absolute inset-0 bg-black bg-opacity-50 hidden group-hover:flex items-center justify-center space-x-4">
                                    <button class="p-2 bg-white rounded-full hover:bg-purple-100">✏️</button>
                                    <button class="p-2 bg-white rounded-full hover:bg-purple-100">🗑️</button>
                                    <button class="p-2 bg-white rounded-full hover:bg-purple-100">▶️</button>
                                </div>
                            </div>
                            <div class="p-4">
                                <div class="flex gap-2 mb-2">
                                    <span class="px-2 py-1 bg-purple-100 text-purple-600 rounded-full text-xs">Adventure</span>
                                    <span class="px-2 py-1 bg-pink-100 text-pink-600 rounded-full text-xs">Kids</span>
                                </div>
                                <h4 class="font-semibold mb-1">Awesome Cartoon Episode 3</h4>
                                <p class="text-sm text-gray-500">Duration: 22:30</p>
                            </div>
                        </div>
                        <div class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-lg transition-shadow">
                            <div class="aspect-video bg-purple-100 relative group">
                                <img src="https://picsum.photos/400/225?random=4" class="w-full h-full object-cover" alt="Video thumbnail">
                                <div class="absolute inset-0 bg-black bg-opacity-50 hidden group-hover:flex items-center justify-center space-x-4">
                                    <button class="p-2 bg-white rounded-full hover:bg-purple-100">✏️</button>
                                    <button class="p-2 bg-white rounded-full hover:bg-purple-100">🗑️</button>
                                    <button class="p-2 bg-white rounded-full hover:bg-purple-100">▶️</button>
                                </div>
                            </div>
                            <div class="p-4">
                                <div class="flex gap-2 mb-2">
                                    <span class="px-2 py-1 bg-purple-100 text-purple-600 rounded-full text-xs">Adventure</span>
                                    <span class="px-2 py-1 bg-pink-100 text-pink-600 rounded-full text-xs">Kids</span>
                                </div>
                                <h4 class="font-semibold mb-1">Awesome Cartoon Episode 4</h4>
                                <p class="text-sm text-gray-500">Duration: 22:30</p>
                            </div>
                        </div>
                        <div class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-lg transition-shadow">
                            <div class="aspect-video bg-purple-100 relative group">
                                <img src="https://picsum.photos/400/225?random=5" class="w-full h-full object-cover" alt="Video thumbnail">
                                <div class="absolute inset-0 bg-black bg-opacity-50 hidden group-hover:flex items-center justify-center space-x-4">
                                    <button class="p-2 bg-white rounded-full hover:bg-purple-100">✏️</button>
                                    <button class="p-2 bg-white rounded-full hover:bg-purple-100">🗑️</button>
                                    <button class="p-2 bg-white rounded-full hover:bg-purple-100">▶️</button>
                                </div>
                            </div>
                            <div class="p-4">
                                <div class="flex gap-2 mb-2">
                                    <span class="px-2 py-1 bg-purple-100 text-purple-600 rounded-full text-xs">Adventure</span>
                                    <span class="px-2 py-1 bg-pink-100 text-pink-600 rounded-full text-xs">Kids</span>
                                </div>
                                <h4 class="font-semibold mb-1">Awesome Cartoon Episode 5</h4>
                                <p class="text-sm text-gray-500">Duration: 22:30</p>
                            </div>
                        </div>
                        <div class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-lg transition-shadow">
                            <div class="aspect-video bg-purple-100 relative group">
                                <img src="https://picsum.photos/400/225?random=6" class="w-full h-full object-cover" alt="Video thumbnail">
                                <div class="absolute inset-0 bg-black bg-opacity-50 hidden group-hover:flex items-center justify-center space-x-4">
                                    <button class="p-2 bg-white rounded-full hover:bg-purple-100">✏️</button>
                                    <button class="p-2 bg-white rounded-full hover:bg-purple-100">🗑️</button>
                                    <button class="p-2 bg-white rounded-full hover:bg-purple-100">▶️</button>
                                </div>
                            </div>
                            <div class="p-4">
                                <div class="flex gap-2 mb-2">
                                    <span class="px-2 py-1 bg-purple-100 text-purple-600 rounded-full text-xs">Adventure</span>
                                    <span class="px-2 py-1 bg-pink-100 text-pink-600 rounded-full text-xs">Kids</span>
                                </div>
                                <h4 class="font-semibold mb-1">Awesome Cartoon Episode 6</h4>
                                <p class="text-sm text-gray-500">Duration: 22:30</p>
                            </div>
                        </div>
                        <div class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-lg transition-shadow">
                            <div class="aspect-video bg-purple-100 relative group">
                                <img src="https://picsum.photos/400/225?random=7" class="w-full h-full object-cover" alt="Video thumbnail">
                                <div class="absolute inset-0 bg-black bg-opacity-50 hidden group-hover:flex items-center justify-center space-x-4">
                                    <button class="p-2 bg-white rounded-full hover:bg-purple-100">✏️</button>
                                    <button class="p-2 bg-white rounded-full hover:bg-purple-100">🗑️</button>
                                    <button class="p-2 bg-white rounded-full hover:bg-purple-100">▶️</button>
                                </div>
                            </div>
                            <div class="p-4">
                                <div class="flex gap-2 mb-2">
                                    <span class="px-2 py-1 bg-purple-100 text-purple-600 rounded-full text-xs">Adventure</span>
                                    <span class="px-2 py-1 bg-pink-100 text-pink-600 rounded-full text-xs">Kids</span>
                                </div>
                                <h4 class="font-semibold mb-1">Awesome Cartoon Episode 7</h4>
                                <p class="text-sm text-gray-500">Duration: 22:30</p>
                            </div>
                        </div>
                        <div class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-lg transition-shadow">
                            <div class="aspect-video bg-purple-100 relative group">
                                <img src="https://picsum.photos/400/225?random=8" class="w-full h-full object-cover" alt="Video thumbnail">
                                <div class="absolute inset-0 bg-black bg-opacity-50 hidden group-hover:flex items-center justify-center space-x-4">
                                    <button class="p-2 bg-white rounded-full hover:bg-purple-100">✏️</button>
                                    <button class="p-2 bg-white rounded-full hover:bg-purple-100">🗑️</button>
                                    <button class="p-2 bg-white rounded-full hover:bg-purple-100">▶️</button>
                                </div>
                            </div>
                            <div class="p-4">
                                <div class="flex gap-2 mb-2">
                                    <span class="px-2 py-1 bg-purple-100 text-purple-600 rounded-full text-xs">Adventure</span>
                                    <span class="px-2 py-1 bg-pink-100 text-pink-600 rounded-full text-xs">Kids</span>
                                </div>
                                <h4 class="font-semibold mb-1">Awesome Cartoon Episode 8</h4>
                                <p class="text-sm text-gray-500">Duration: 22:30</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Categories Content -->
                <div id="categories" class="tab-content active">
                    <div class="flex justify-between items-center mb-6">
                        <h2 class="text-2xl font-bold">Categories</h2>
                        <button onclick="showCategoryModal()" class="bg-purple-600 text-white px-4 py-2 rounded-lg hover:bg-purple-700 flex items-center gap-2">
                            <span>➕</span> Add Category
                        </button>
                    </div>

                    <!-- Categories Table -->
                    <div id="categoriesGrid" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        @foreach($categories as $category)
                        <div class="bg-white rounded-xl shadow-md p-6 hover:shadow-lg transition-shadow" id="category-{{ $category->id }}">
                            <div class="flex justify-between items-start mb-4">
                                <div class="flex items-center gap-3">
                                    <span class="text-3xl">📁</span>
                                    <div>
                                        <h3 class="font-semibold text-lg category-name">{{ $category->name }}</h3>
                                        <p class="text-sm text-gray-500">0 videos</p>
                                    </div>
                                </div>
                                <div class="flex gap-2">
                                    <button onclick="showCategoryModal({{ json_encode($category) }})" class="p-2 hover:bg-gray-100 rounded-lg">✏️</button>
                                    <button onclick="showDeleteModal({{ $category->id }}, '{{ $category->name }}')" class="p-2 hover:bg-gray-100 rounded-lg">🗑️</button>
                                </div>
                            </div>
                            <div class="bg-gray-50 rounded-lg p-3">
                                <div class="text-sm text-gray-600">
                                    <p>Last updated: {{ $category->updated_at->diffForHumans() }}</p>
                                    <p>Created: {{ $category->created_at->format('M d, Y') }}</p>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>

                    <!-- Category Modal -->
                    <div id="categoryModal" class="modal fixed inset-0 z-50 hidden">
                        <div class="absolute inset-0 bg-black bg-opacity-50"></div>
                        <div class="relative min-h-screen flex items-center justify-center p-4">
                            <div class="bg-white rounded-lg shadow-xl w-full max-w-md mx-auto">
                                <div class="p-6">
                                    <div class="flex justify-between items-center mb-4">
                                        <h3 id="modalTitle" class="text-lg font-semibold">Add Category</h3>
                                        <button onclick="hideCategoryModal()" class="text-gray-400 hover:text-gray-600">✕</button>
                                    </div>

                                    <form id="categoryForm" onsubmit="Category.handleSubmit(event)">
                                        @csrf
                                        <input type="hidden" id="categoryId" name="id">
                                        <div class="mb-4">
                                            <label class="block text-sm font-medium text-gray-700 mb-2">Category Name</label>
                                            <input type="text" id="categoryName" name="name" required
                                                class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent"
                                                placeholder="Enter category name">
                                            <p id="categoryError" class="mt-2 text-sm text-red-600 hidden"></p>
                                        </div>
                                        <div class="flex justify-end gap-3">
                                            <button type="button" onclick="hideCategoryModal()"
                                                class="px-4 py-2 border border-gray-300 rounded-lg hover:bg-gray-50">
                                                Cancel
                                            </button>
                                            <button type="submit" id="submitBtn"
                                                class="px-4 py-2 bg-purple-600 text-white rounded-lg hover:bg-purple-700">
                                                Save
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Delete Modal -->
                    <div id="deleteModal" class="modal fixed inset-0 z-50 hidden">
                        <div class="absolute inset-0 bg-black bg-opacity-50"></div>
                        <div class="relative min-h-screen flex items-center justify-center p-4">
                            <div class="bg-white rounded-lg shadow-xl w-full max-w-md mx-auto p-6">
                                <div class="text-center">
                                    <div class="mx-auto flex items-center justify-center h-12 w-12 rounded-full bg-red-100 mb-4">
                                        <span class="text-2xl">🗑️</span>
                                    </div>
                                    <h3 class="text-lg font-medium text-gray-900 mb-2">Delete Category</h3>
                                    <p id="deleteMessage" class="text-sm text-gray-500 mb-6"></p>
                                    <div class="flex justify-center gap-3">
                                        <button onclick="hideDeleteModal()"
                                            class="px-4 py-2 border border-gray-300 rounded-lg hover:bg-gray-50">
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
                    </div>

                    <!-- Success Toast -->
                    <div id="toast" class="fixed top-4 right-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded z-50 hidden">
                        <span id="toastMessage"></span>
                    </div>
                </div>

                <!-- AdMob Settings Content -->
                <div id="admob" class="tab-content hidden">
                    <div class="flex justify-between items-center mb-6">
                        <h2 class="text-2xl font-bold">AdMob Configuration</h2>
                        <button class="bg-purple-600 text-white px-4 py-2 rounded-lg hover:bg-purple-700 flex items-center gap-2">
                            <span>💾</span> Save Settings
                        </button>
                    </div>

                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                        <!-- App Configuration -->
                        <div class="bg-white rounded-xl shadow-md p-6">
                            <div class="flex items-center gap-3 mb-4">
                                <span class="text-2xl">📱</span>
                                <h3 class="text-lg font-semibold">App Configuration</h3>
                            </div>
                            <div class="space-y-4">
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">App ID</label>
                                    <input type="text" placeholder="ca-app-pub-xxxxxxxxxxxxxxxx~yyyyyyyyyy" class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent">
                                    <p class="text-xs text-gray-500 mt-1">Your AdMob App ID from Google AdMob console</p>
                                </div>
                            </div>
                        </div>

                        <!-- Banner Ads -->
                        <div class="bg-white rounded-xl shadow-md p-6">
                            <div class="flex items-center gap-3 mb-4">
                                <span class="text-2xl">📰</span>
                                <h3 class="text-lg font-semibold">Banner Ads</h3>
                            </div>
                            <div class="space-y-4">
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Banner Ad Unit ID</label>
                                    <input type="text" placeholder="ca-app-pub-xxxxxxxxxxxxxxxx/yyyyyyyyyy" class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent">
                                </div>
                                <div class="flex items-center gap-3">
                                    <input type="checkbox" id="banner-enabled" class="w-4 h-4 text-purple-600 focus:ring-purple-500 border-gray-300 rounded">
                                    <label for="banner-enabled" class="text-sm text-gray-700">Enable Banner Ads</label>
                                </div>
                            </div>
                        </div>

                        <!-- Interstitial Ads -->
                        <div class="bg-white rounded-xl shadow-md p-6">
                            <div class="flex items-center gap-3 mb-4">
                                <span class="text-2xl">🎯</span>
                                <h3 class="text-lg font-semibold">Interstitial Ads</h3>
                            </div>
                            <div class="space-y-4">
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Interstitial Ad Unit ID</label>
                                    <input type="text" placeholder="ca-app-pub-xxxxxxxxxxxxxxxx/yyyyyyyyyy" class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent">
                                </div>
                                <div class="flex items-center gap-3">
                                    <input type="checkbox" id="interstitial-enabled" class="w-4 h-4 text-purple-600 focus:ring-purple-500 border-gray-300 rounded">
                                    <label for="interstitial-enabled" class="text-sm text-gray-700">Enable Interstitial Ads</label>
                                </div>
                            </div>
                        </div>

                        <!-- Native Banner Ads -->
                        <div class="bg-white rounded-xl shadow-md p-6">
                            <div class="flex items-center gap-3 mb-4">
                                <span class="text-2xl">📄</span>
                                <h3 class="text-lg font-semibold">Native Banner Ads</h3>
                            </div>
                            <div class="space-y-4">
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Native Banner Ad Unit ID</label>
                                    <input type="text" placeholder="ca-app-pub-xxxxxxxxxxxxxxxx/yyyyyyyyyy" class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent">
                                </div>
                                <div class="flex items-center gap-3">
                                    <input type="checkbox" id="native-banner-enabled" class="w-4 h-4 text-purple-600 focus:ring-purple-500 border-gray-300 rounded">
                                    <label for="native-banner-enabled" class="text-sm text-gray-700">Enable Native Banner Ads</label>
                                </div>
                            </div>
                        </div>

                        <!-- Rewarded Ads -->
                        <div class="bg-white rounded-xl shadow-md p-6">
                            <div class="flex items-center gap-3 mb-4">
                                <span class="text-2xl">🎁</span>
                                <h3 class="text-lg font-semibold">Rewarded Ads</h3>
                            </div>
                            <div class="space-y-4">
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Rewarded Ad Unit ID</label>
                                    <input type="text" placeholder="ca-app-pub-xxxxxxxxxxxxxxxx/yyyyyyyyyy" class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent">
                                </div>
                                <div class="flex items-center gap-3">
                                    <input type="checkbox" id="rewarded-enabled" class="w-4 h-4 text-purple-600 focus:ring-purple-500 border-gray-300 rounded">
                                    <label for="rewarded-enabled" class="text-sm text-gray-700">Enable Rewarded Ads</label>
                                </div>
                            </div>
                        </div>

                        <!-- App Open Ads -->
                        <div class="bg-white rounded-xl shadow-md p-6">
                            <div class="flex items-center gap-3 mb-4">
                                <span class="text-2xl">🚀</span>
                                <h3 class="text-lg font-semibold">App Open Ads</h3>
                            </div>
                            <div class="space-y-4">
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">App Open Ad Unit ID</label>
                                    <input type="text" placeholder="ca-app-pub-xxxxxxxxxxxxxxxx/yyyyyyyyyy" class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent">
                                </div>
                                <div class="flex items-center gap-3">
                                    <input type="checkbox" id="app-open-enabled" class="w-4 h-4 text-purple-600 focus:ring-purple-500 border-gray-300 rounded">
                                    <label for="app-open-enabled" class="text-sm text-gray-700">Enable App Open Ads</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <script>
                    document.addEventListener('DOMContentLoaded', function() {
                        // Set initial active tab
                        showTab('dashboard');

                        // Add click handlers to all sidebar items
                        document.querySelectorAll('.sidebar-item').forEach(item => {
                            item.addEventListener('click', (e) => {
                                e.preventDefault();
                                const targetId = item.getAttribute('data-target');
                                showTab(targetId);
                            });
                        });
                    });

                    function showTab(tabId) {
                        // Hide all tabs
                        document.querySelectorAll('.tab-content').forEach(tab => {
                            tab.classList.add('hidden');
                            tab.classList.remove('active');
                        });

                        // Show selected tab
                        const selectedTab = document.getElementById(tabId);
                        if (selectedTab) {
                            selectedTab.classList.remove('hidden');
                            selectedTab.classList.add('active');
                        }

                        // Update sidebar items
                        document.querySelectorAll('.sidebar-item').forEach(item => {
                            if (item.getAttribute('data-target') === tabId) {
                                item.classList.add('sidebar-active');
                            } else {
                                item.classList.remove('sidebar-active');
                            }
                        });
                    }

                    function showSuccessAlert(message) {
                        const alert = document.getElementById('successAlert');
                        document.getElementById('successMessage').textContent = message;
                        alert.classList.remove('hidden');
                        alert.classList.add('active');
                        setTimeout(() => {
                            alert.classList.remove('active');
                            setTimeout(() => alert.classList.add('hidden'), 300);
                        }, 3000);
                    }

                    function confirmDelete(id, name) {
                        const modal = document.getElementById('deleteModal');
                        const message = document.getElementById('deleteMessage');
                        const confirmBtn = document.getElementById('confirmDeleteBtn');

                        message.textContent = `Are you sure you want to delete "${name}"?`;
                        modal.classList.remove('hidden');
                        confirmBtn.onclick = () => deleteCategory(id);
                    }

                    function hideDeleteModal() {
                        const modal = document.getElementById('deleteModal');
                        modal.classList.add('hidden');
                    }

                    async function deleteCategory(id) {
                        try {
                            const response = await fetch(`{{ url('/categories') }}/${id}`, {
                                method: 'DELETE',
                                headers: {
                                    'Accept': 'application/json',
                                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                                }
                            });

                            const data = await response.json();

                            if (data.success) {
                                const element = document.getElementById(`category-${id}`);
                                element.remove();
                                hideDeleteModal();
                                showSuccessAlert('Category deleted successfully');
                            } else {
                                throw new Error(data.message);
                            }
                        } catch (error) {
                            alert('Failed to delete category: ' + error.message);
                        }
                    }

                    function showCategoryModal(category = null) {
                        const modal = document.getElementById('categoryModal');
                        const form = document.getElementById('categoryForm');
                        const title = document.getElementById('modalTitle');
                        const submitBtn = document.getElementById('submitBtn');
                        const idInput = document.getElementById('categoryId');
                        const nameInput = document.getElementById('categoryName');

                        // Reset form
                        form.reset();
                        document.getElementById('categoryError').classList.add('hidden');

                        if (category) {
                            // Update mode
                            title.textContent = 'Update Category';
                            submitBtn.textContent = 'Update';
                            idInput.value = category.id;
                            nameInput.value = category.name;
                        } else {
                            // Add mode
                            title.textContent = 'Add New Category';
                            submitBtn.textContent = 'Add Category';
                            idInput.value = '';
                        }

                        modal.classList.remove('hidden');
                        setTimeout(() => {
                            modal.classList.add('active');
                            modal.querySelector('.modal-content').classList.add('active');
                        }, 50);
                        nameInput.focus();
                    }

                    function hideCategoryModal() {
                        const modal = document.getElementById('categoryModal');
                        const content = modal.querySelector('.modal-content');
                        content.classList.remove('active');
                        modal.classList.remove('active');
                        setTimeout(() => modal.classList.add('hidden'), 300);
                    }\n

                    async function handleCategorySubmit(event) {
                        event.preventDefault();
                        const form = event.target;
                        const id = form.id.value;
                        const isUpdate = !!id;

                        try {
                            const formData = new FormData(form);
                            const url = isUpdate
                                ? `{{ url('/categories') }}/${id}`
                                : '{{ route("categories.store") }}';

                            const response = await fetch(url, {
                                method: isUpdate ? 'PUT' : 'POST',
                                headers: {
                                    'Accept': 'application/json',
                                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                                },
                                body: formData
                            });

                            const data = await response.json();

                            if (data.success) {
                                hideCategoryModal();
                                showSuccessAlert(data.message);
                                if (isUpdate) {
                                    updateCategoryInUI(data.category);
                                } else {
                                    addCategoryToUI(data.category);
                                }
                            }
                        } catch (error) {
                            document.getElementById('categoryError').textContent = error.message;
                            document.getElementById('categoryError').classList.remove('hidden');
                        }
                    }

                    function showDeleteModal(id, name) {
                        const modal = document.getElementById('deleteModal');
                        const message = document.getElementById('deleteMessage');
                        const confirmBtn = document.getElementById('confirmDeleteBtn');

                        message.textContent = `Are you sure you want to delete "${name}"?`;
                        confirmBtn.onclick = () => deleteCategory(id);

                        modal.classList.remove('hidden');
                        setTimeout(() => {
                            modal.classList.add('active');
                            modal.querySelector('.modal-content').classList.add('active');
                        }, 50);
                    }

                    function hideDeleteModal() {
                        const modal = document.getElementById('deleteModal');
                        const content = modal.querySelector('.modal-content');
                        content.classList.remove('active');
                        modal.classList.remove('active');
                        setTimeout(() => modal.classList.add('hidden'), 300);
                    }

                    // Update category grid item functions
                    function updateCategoryInUI(category) {
                        const element = document.getElementById(`category-${category.id}`);
                        if (element) {
                            element.querySelector('.category-name').textContent = category.name;
                        }
                    }

                    function addCategoryToUI(category) {
                        const html = `
                            <div class="bg-white rounded-xl shadow-md p-6 hover:shadow-lg transition-shadow" id="category-${category.id}">
                                <div class="flex justify-between items-start mb-4">
                                    <div class="flex items-center gap-3">
                                        <span class="text-3xl">📁</span>
                                        <div>
                                            <h3 class="font-semibold text-lg category-name">${category.name}</h3>
                                            <p class="text-sm text-gray-500">0 videos</p>
                                        </div>
                                    </div>
                                    <div class="flex gap-2">
                                        <button onclick="openCategoryModal(${JSON.stringify(category)})" class="p-2 hover:bg-gray-100 rounded-lg">✏️</button>
                                        <button onclick=\"showDeleteModal(${category.id}, \'${category.name}\')\" class=\"p-2 hover:bg-gray-100 rounded-lg\">🗑️</button>\n
                                    </div>
                                </div>
                                <div class="bg-gray-50 rounded-lg p-3">
                                    <div class="text-sm text-gray-600">
                                        <p>Last updated: Just now</p>
                                        <p>Created: Just now</p>
                                    </div>
                                </div>
                            </div>
                        `;
                        document.getElementById('categoriesGrid').insertAdjacentHTML('afterbegin', html);
                    }

                    function showSuccessAlert(message) {
                        const alert = document.getElementById('successAlert');
                        document.getElementById('successMessage').textContent = message;
                        alert.classList.remove('hidden');
                        setTimeout(() => alert.classList.add('hidden'), 3000);
                    }

                    // Close modals when clicking outside
                    document.querySelectorAll('.modal').forEach(modal => {
                        modal.addEventListener('click', (e) => {
                            if (e.target === modal) {
                                if (modal.id === 'categoryModal') closeCategoryModal();
                                if (modal.id === 'deleteModal') closeDeleteModal();
                            }
                        });
                    });
                </script>
            </main>
        </div>
    </div>
</body>
</html>
