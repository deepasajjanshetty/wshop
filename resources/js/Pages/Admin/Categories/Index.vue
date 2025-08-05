<script setup>
import { Head, Link, router } from '@inertiajs/vue3';
import { ref } from 'vue';

const props = defineProps({
    categories: Object,
    auth: Object,
});

const search = ref('');
const selectedStatus = ref('all');

const getStatusColor = (status) => {
    return status ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800';
};

const deleteCategory = (categoryId) => {
    if (confirm('Are you sure you want to delete this category?')) {
        router.delete(route('admin.categories.destroy', categoryId));
    }
};

const filteredCategories = () => {
    let filtered = props.categories.data;
    
    if (search.value) {
        filtered = filtered.filter(category => 
            category.name.toLowerCase().includes(search.value.toLowerCase()) ||
            category.description?.toLowerCase().includes(search.value.toLowerCase())
        );
    }
    
    if (selectedStatus.value !== 'all') {
        const isActive = selectedStatus.value === 'active';
        filtered = filtered.filter(category => category.is_active === isActive);
    }
    
    return filtered;
};
</script>

<template>
    <Head title="Categories Management" />

    <div class="min-h-screen bg-gradient-to-br from-gray-50 via-blue-50 to-indigo-50">
        <!-- Navigation -->
        <nav class="bg-white/80 backdrop-blur-sm border-b border-gray-200 sticky top-0 z-50">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between h-16">
                    <div class="flex items-center">
                        <Link href="/admin/dashboard" class="flex items-center space-x-3">
                            <div class="w-10 h-10 bg-gradient-to-r from-blue-600 to-purple-600 rounded-lg flex items-center justify-center">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                                </svg>
                            </div>
                            <div>
                                <h1 class="text-xl font-bold text-gray-900">wshop</h1>
                                <p class="text-xs text-gray-500">Admin Panel</p>
                            </div>
                        </Link>
                    </div>

                    <div class="hidden md:flex items-center space-x-8">
                        <Link href="/admin/products" class="text-gray-700 hover:text-blue-600 font-medium transition-colors">Products</Link>
                        <Link href="/admin/categories" class="text-blue-600 font-medium">Categories</Link>
                        <Link href="/admin/orders" class="text-gray-700 hover:text-blue-600 font-medium transition-colors">Orders</Link>
                        <Link href="/admin/users" class="text-gray-700 hover:text-blue-600 font-medium transition-colors">Customers</Link>
                    </div>

                    <div class="flex items-center space-x-4">
                        <span class="text-gray-700 font-medium">{{ auth.user.name }}</span>
                        <button @click="router.post(route('admin.logout'))" class="inline-flex items-center px-4 py-2 bg-red-600 border border-transparent rounded-lg font-semibold text-sm text-white hover:bg-red-700 transition-all duration-200">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                            </svg>
                            Logout
                        </button>
                    </div>
                </div>
            </div>
        </nav>

        <!-- Page Content -->
        <main class="py-8">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <!-- Header -->
                <div class="flex items-center justify-between mb-8">
                    <div>
                        <h2 class="text-3xl font-bold text-gray-900">Categories Management</h2>
                        <p class="text-gray-600 mt-1">Organize your products with categories</p>
                    </div>
                    <Link href="/admin/categories/create" class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-blue-600 to-purple-600 text-white font-semibold rounded-xl hover:from-blue-700 hover:to-purple-700 transition-all duration-200 shadow-lg hover:shadow-xl">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                        </svg>
                        Add New Category
                    </Link>
                </div>

                <!-- Filters -->
                <div class="bg-white/80 backdrop-blur-sm rounded-2xl shadow-lg border border-white/20 p-6 mb-8">
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Search Categories</label>
                            <input
                                v-model="search"
                                type="text"
                                placeholder="Search by name or description..."
                                class="w-full px-4 py-2 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-300"
                            />
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Status</label>
                            <select
                                v-model="selectedStatus"
                                class="w-full px-4 py-2 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-300"
                            >
                                <option value="all">All Status</option>
                                <option value="active">Active</option>
                                <option value="inactive">Inactive</option>
                            </select>
                        </div>
                        <div class="flex items-end">
                            <button @click="search = ''; selectedStatus = 'all'" class="w-full px-4 py-2 bg-gray-100 text-gray-700 rounded-xl hover:bg-gray-200 transition-all duration-200">
                                Clear Filters
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Categories Grid -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                    <div v-for="category in filteredCategories()" :key="category.id" class="bg-white/80 backdrop-blur-sm rounded-2xl shadow-lg border border-white/20 overflow-hidden hover:shadow-xl transition-all duration-300">
                        <!-- Category Image -->
                        <div class="relative h-48 bg-gray-100">
                            <img
                                :src="category.image || 'https://via.placeholder.com/300x200/f3f4f6/6b7280?text=Category'"
                                :alt="category.name"
                                class="w-full h-full object-cover"
                            />
                            <div class="absolute top-3 right-3">
                                <span :class="`inline-flex px-2 py-1 text-xs font-semibold rounded-full ${getStatusColor(category.is_active)}`">
                                    {{ category.is_active ? 'Active' : 'Inactive' }}
                                </span>
                            </div>
                        </div>

                        <!-- Category Info -->
                        <div class="p-6">
                            <h3 class="text-lg font-bold text-gray-900 mb-2">{{ category.name }}</h3>
                            <p class="text-sm text-gray-600 mb-4 line-clamp-2">{{ category.description || 'No description available' }}</p>
                            
                            <div class="flex items-center justify-between mb-4">
                                <div class="flex items-center space-x-2">
                                    <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                                    </svg>
                                    <span class="text-sm text-gray-600">{{ category.products_count }} products</span>
                                </div>
                            </div>

                            <!-- Actions -->
                            <div class="flex space-x-2">
                                <Link :href="`/admin/categories/${category.id}/edit`" class="flex-1 px-3 py-2 bg-blue-600 text-white text-sm font-medium rounded-lg hover:bg-blue-700 transition-colors text-center">
                                    Edit
                                </Link>
                                <button @click="deleteCategory(category.id)" class="px-3 py-2 bg-red-600 text-white text-sm font-medium rounded-lg hover:bg-red-700 transition-colors">
                                    Delete
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Empty State -->
                <div v-if="filteredCategories().length === 0" class="text-center py-12">
                    <svg class="w-16 h-16 text-gray-400 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                    </svg>
                    <h3 class="text-lg font-medium text-gray-900 mb-2">No categories found</h3>
                    <p class="text-gray-500 mb-6">Try adjusting your search or filter criteria</p>
                    <Link href="/admin/categories/create" class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-blue-600 to-purple-600 text-white font-semibold rounded-xl hover:from-blue-700 hover:to-purple-700 transition-all duration-200">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                        </svg>
                        Add Your First Category
                    </Link>
                </div>

                <!-- Pagination -->
                <div v-if="categories.links && categories.links.length > 3" class="mt-8 flex justify-center">
                    <nav class="flex space-x-2">
                        <Link
                            v-for="link in categories.links"
                            :key="link.label"
                            :href="link.url"
                            :class="`px-4 py-2 rounded-lg text-sm font-medium transition-colors ${
                                link.active
                                    ? 'bg-blue-600 text-white'
                                    : 'bg-white/80 text-gray-700 hover:bg-white hover:text-blue-600'
                            }`"
                        >
                            <span v-html="link.label"></span>
                        </Link>
                    </nav>
                </div>
            </div>
        </main>
    </div>
</template>

<style scoped>
.line-clamp-2 {
    display: -webkit-box;
    -webkit-line-clamp: 2;
    line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
}
</style> 