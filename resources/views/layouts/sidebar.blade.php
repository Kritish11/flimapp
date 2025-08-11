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
            <img src="https://api.dicebear.com/6.x/adventurer/svg?seed=Felix"
                 class="w-10 h-10 rounded-full ring-2 ring-purple-500">
            <div>
                <h3 class="font-semibold">Admin User</h3>
                <p class="text-xs text-gray-500">administrator</p>
            </div>
        </div>
    </div>

    <!-- Navigation -->
    <nav class="flex-1 p-4 space-y-2 overflow-y-auto">
        <a href="{{ route('dashboard') }}"
           class="sidebar-item {{ request()->routeIs('dashboard') ? 'sidebar-active' : '' }} flex items-center space-x-3 p-3 rounded-lg hover:bg-purple-50 group transition-colors">
            <span class="text-xl group-hover:scale-110 transition-transform">📊</span>
            <span>Dashboard</span>
        </a>
        <a href="{{ route('videos.index') }}"
           class="sidebar-item {{ request()->is('videos*') ? 'sidebar-active' : '' }} flex items-center space-x-3 p-3 rounded-lg hover:bg-purple-50 group transition-colors">
            <span class="text-xl group-hover:scale-110 transition-transform">🎬</span>
            <span>Cartoon Videos</span>
        </a>
        <a href="{{ route('categories.index') }}"
           class="sidebar-item {{ request()->routeIs('categories.*') ? 'sidebar-active' : '' }} flex items-center space-x-3 p-3 rounded-lg hover:bg-purple-50 group transition-colors">
            <span class="text-xl group-hover:scale-110 transition-transform">📁</span>
            <span>Categories</span>
        </a>
        <a href="#"
           class="sidebar-item flex items-center space-x-3 p-3 rounded-lg hover:bg-purple-50 group transition-colors">
            <span class="text-xl group-hover:scale-110 transition-transform">📱</span>
            <span>AdMob Settings</span>
        </a>
    </nav>

    <!-- Bottom Actions -->
    <div class="p-4 border-t space-y-2">
        <button onclick="logout()"
                class="flex items-center space-x-3 p-3 rounded-lg hover:bg-red-50 w-full group transition-colors">
            <span class="text-xl group-hover:scale-110 transition-transform">🚪</span>
            <span class="group-hover:text-red-600">Logout</span>
        </button>
    </div>
</aside>

<script>
function logout() {
    if (confirm('Are you sure you want to logout?')) {
        window.location.href = '/login';
    }
}
</script>
