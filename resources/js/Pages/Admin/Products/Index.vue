<script setup>
import { Head, Link, router } from '@inertiajs/vue3';
import { ref } from 'vue';

const props = defineProps({
    products: Object,
    auth: Object,
});

const search = ref('');
const selectedStatus = ref('all');
const selectedCategory = ref('all');

const formatCurrency = (amount) => {
    return new Intl.NumberFormat('en-US', {
        style: 'currency',
        currency: 'USD',
    }).format(amount);
};

const getStatusColor = (status) => {
    return status ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800';
};

const getFeaturedColor = (featured) => {
    return featured ? 'bg-purple-100 text-purple-800' : 'bg-gray-100 text-gray-800';
};

const deleteProduct = (productId) => {
    if (confirm('Are you sure you want to delete this product?')) {
        router.delete(route('admin.products.destroy', productId));
    }
};

const toggleActive = (product) => {
    router.patch(route('admin.products.toggle-active', product.id));
};

const toggleFeatured = (product) => {
    router.patch(route('admin.products.toggle-featured', product.id));
};

const filteredProducts = () => {
    let filtered = props.products.data;
    
    if (search.value) {
        filtered = filtered.filter(product => 
            product.name.toLowerCase().includes(search.value.toLowerCase()) ||
            product.description.toLowerCase().includes(search.value.toLowerCase())
        );
    }
    
    if (selectedStatus.value !== 'all') {
        const isActive = selectedStatus.value === 'active';
        filtered = filtered.filter(product => product.is_active === isActive);
    }
    
    if (selectedCategory.value !== 'all') {
        filtered = filtered.filter(product => product.category_id == selectedCategory.value);
    }
    
    return filtered;
};
</script>

<template>
    <Head title="Products Management" />

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
                        <Link href="/admin/products" class="text-blue-600 font-medium">Products</Link>
                        <Link href="/admin/categories" class="text-gray-700 hover:text-blue-600 font-medium transition-colors">Categories</Link>
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
                        <h2 class="text-3xl font-bold text-gray-900">Products Management</h2>
                        <p class="text-gray-600 mt-1">Manage your product catalog and inventory</p>
                    </div>
                    <Link href="/admin/products/create" class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-blue-600 to-purple-600 text-white font-semibold rounded-xl hover:from-blue-700 hover:to-purple-700 transition-all duration-200 shadow-lg hover:shadow-xl">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                        </svg>
                        Add New Product
                    </Link>
                </div>

                <!-- Filters -->
                <div class="bg-white/80 backdrop-blur-sm rounded-2xl shadow-lg border border-white/20 p-6 mb-8">
                    <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Search Products</label>
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
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Category</label>
                            <select
                                v-model="selectedCategory"
                                class="w-full px-4 py-2 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-300"
                            >
                                <option value="all">All Categories</option>
                                <option v-for="category in products.data.map(p => p.category).filter((c, i, arr) => arr.findIndex(cat => cat.id === c.id) === i)" :key="category.id" :value="category.id">
                                    {{ category.name }}
                                </option>
                            </select>
                        </div>
                        <div class="flex items-end">
                            <button @click="search = ''; selectedStatus = 'all'; selectedCategory = 'all'" class="w-full px-4 py-2 bg-gray-100 text-gray-700 rounded-xl hover:bg-gray-200 transition-all duration-200">
                                Clear Filters
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Products Grid -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                    <div v-for="product in filteredProducts()" :key="product.id" class="bg-white/80 backdrop-blur-sm rounded-2xl shadow-lg border border-white/20 overflow-hidden hover:shadow-xl transition-all duration-300">
                        <!-- Product Image -->
                        <div class="relative h-48 bg-gray-100">
                            <img
                                :src="product.main_image || 'https://via.placeholder.com/300x200/f3f4f6/6b7280?text=Product'"
                                :alt="product.name"
                                class="w-full h-full object-cover"
                            />
                            <div class="absolute top-3 right-3 flex space-x-2">
                                <span :class="`inline-flex px-2 py-1 text-xs font-semibold rounded-full ${getStatusColor(product.is_active)}`">
                                    {{ product.is_active ? 'Active' : 'Inactive' }}
                                </span>
                                <span :class="`inline-flex px-2 py-1 text-xs font-semibold rounded-full ${getFeaturedColor(product.is_featured)}`">
                                    {{ product.is_featured ? 'Featured' : 'Regular' }}
                                </span>
                            </div>
                        </div>

                        <!-- Product Info -->
                        <div class="p-6">
                            <div class="flex items-start justify-between mb-2">
                                <h3 class="text-lg font-bold text-gray-900 truncate">{{ product.name }}</h3>
                            </div>
                            
                            <p class="text-sm text-gray-600 mb-3 line-clamp-2">{{ product.description }}</p>
                            
                            <div class="flex items-center justify-between mb-4">
                                <div>
                                    <p class="text-lg font-bold text-gray-900">{{ formatCurrency(product.price) }}</p>
                                    <p v-if="product.sale_price" class="text-sm text-red-600 line-through">{{ formatCurrency(product.sale_price) }}</p>
                                </div>
                                <div class="text-right">
                                    <p class="text-sm text-gray-600">Stock: {{ product.stock_quantity }}</p>
                                    <p class="text-xs text-gray-500">{{ product.order_items_count }} orders</p>
                                </div>
                            </div>

                            <!-- Actions -->
                            <div class="flex space-x-2">
                                <Link :href="`/admin/products/${product.id}/edit`" class="flex-1 px-3 py-2 bg-blue-600 text-white text-sm font-medium rounded-lg hover:bg-blue-700 transition-colors text-center">
                                    Edit
                                </Link>
                                <button @click="toggleActive(product)" :class="`px-3 py-2 text-sm font-medium rounded-lg transition-colors ${product.is_active ? 'bg-yellow-600 text-white hover:bg-yellow-700' : 'bg-green-600 text-white hover:bg-green-700'}`">
                                    {{ product.is_active ? 'Deactivate' : 'Activate' }}
                                </button>
                                <button @click="toggleFeatured(product)" :class="`px-3 py-2 text-sm font-medium rounded-lg transition-colors ${product.is_featured ? 'bg-gray-600 text-white hover:bg-gray-700' : 'bg-purple-600 text-white hover:bg-purple-700'}`">
                                    {{ product.is_featured ? 'Unfeature' : 'Feature' }}
                                </button>
                                <button @click="deleteProduct(product.id)" class="px-3 py-2 bg-red-600 text-white text-sm font-medium rounded-lg hover:bg-red-700 transition-colors">
                                    Delete
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Empty State -->
                <div v-if="filteredProducts().length === 0" class="text-center py-12">
                    <svg class="w-16 h-16 text-gray-400 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                    </svg>
                    <h3 class="text-lg font-medium text-gray-900 mb-2">No products found</h3>
                    <p class="text-gray-500 mb-6">Try adjusting your search or filter criteria</p>
                    <Link href="/admin/products/create" class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-blue-600 to-purple-600 text-white font-semibold rounded-xl hover:from-blue-700 hover:to-purple-700 transition-all duration-200">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                        </svg>
                        Add Your First Product
                    </Link>
                </div>

                <!-- Pagination -->
                <div v-if="products.links && products.links.length > 3" class="mt-8 flex justify-center">
                    <nav class="flex space-x-2">
                        <Link
                            v-for="link in products.links"
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