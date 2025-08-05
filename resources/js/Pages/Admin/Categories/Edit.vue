<script setup>
import { Head, Link, useForm } from '@inertiajs/vue3';

const props = defineProps({
    category: Object,
    auth: Object,
});

const form = useForm({
    name: props.category.name,
    description: props.category.description || '',
    image: props.category.image || '',
    is_active: props.category.is_active,
});

const submit = () => {
    form.put(route('admin.categories.update', props.category.id));
};
</script>

<template>
    <Head title="Edit Category" />

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
                        <Link href="/admin/logout" method="post" as="button" class="inline-flex items-center px-4 py-2 bg-red-600 border border-transparent rounded-lg font-semibold text-sm text-white hover:bg-red-700 transition-all duration-200">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                            </svg>
                            Logout
                        </Link>
                    </div>
                </div>
            </div>
        </nav>

        <!-- Page Content -->
        <main class="py-8">
            <div class="max-w-2xl mx-auto px-4 sm:px-6 lg:px-8">
                <!-- Header -->
                <div class="flex items-center justify-between mb-8">
                    <div>
                        <h2 class="text-3xl font-bold text-gray-900">Edit Category</h2>
                        <p class="text-gray-600 mt-1">Update category information and settings</p>
                    </div>
                    <Link href="/admin/categories" class="inline-flex items-center px-4 py-2 bg-gray-600 text-white font-semibold rounded-xl hover:bg-gray-700 transition-all duration-200">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                        </svg>
                        Back to Categories
                    </Link>
                </div>

                <!-- Form -->
                <form @submit.prevent="submit" class="space-y-8">
                    <div class="bg-white/80 backdrop-blur-sm rounded-2xl shadow-lg border border-white/20 p-8">
                        <!-- Basic Information -->
                        <div class="mb-8">
                            <h3 class="text-xl font-bold text-gray-900 mb-6 flex items-center">
                                <svg class="w-6 h-6 mr-3 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                Category Information
                            </h3>
                            
                            <div class="space-y-6">
                                <div>
                                    <label class="block text-sm font-semibold text-gray-700 mb-2">Category Name *</label>
                                    <input
                                        v-model="form.name"
                                        type="text"
                                        required
                                        class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-300"
                                        placeholder="Enter category name"
                                    />
                                    <div v-if="form.errors.name" class="text-red-500 text-sm mt-1">{{ form.errors.name }}</div>
                                </div>

                                <div>
                                    <label class="block text-sm font-semibold text-gray-700 mb-2">Description</label>
                                    <textarea
                                        v-model="form.description"
                                        rows="4"
                                        class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-300 resize-none"
                                        placeholder="Enter category description (optional)..."
                                    ></textarea>
                                    <div v-if="form.errors.description" class="text-red-500 text-sm mt-1">{{ form.errors.description }}</div>
                                </div>

                                <div>
                                    <label class="block text-sm font-semibold text-gray-700 mb-2">Category Image URL</label>
                                    <input
                                        v-model="form.image"
                                        type="url"
                                        class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-300"
                                        placeholder="https://example.com/category-image.jpg"
                                    />
                                    <div v-if="form.errors.image" class="text-red-500 text-sm mt-1">{{ form.errors.image }}</div>
                                </div>
                            </div>
                        </div>

                        <!-- Settings -->
                        <div class="mb-8">
                            <h3 class="text-xl font-bold text-gray-900 mb-6 flex items-center">
                                <svg class="w-6 h-6 mr-3 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                                Category Settings
                            </h3>
                            
                            <div class="space-y-4">
                                <div class="flex items-center">
                                    <input
                                        v-model="form.is_active"
                                        type="checkbox"
                                        id="is_active"
                                        class="w-4 h-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500"
                                    />
                                    <label for="is_active" class="ml-3 text-sm font-medium text-gray-700">
                                        Category is active and visible to customers
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <div class="flex justify-end space-x-4">
                        <Link href="/admin/categories" class="px-6 py-3 bg-gray-600 text-white font-semibold rounded-xl hover:bg-gray-700 transition-all duration-200">
                            Cancel
                        </Link>
                        <button
                            type="submit"
                            :disabled="form.processing"
                            class="px-8 py-3 bg-gradient-to-r from-blue-600 to-purple-600 text-white font-semibold rounded-xl hover:from-blue-700 hover:to-purple-700 disabled:from-gray-400 disabled:to-gray-500 disabled:cursor-not-allowed transition-all duration-200 shadow-lg hover:shadow-xl"
                        >
                            <div v-if="form.processing" class="flex items-center">
                                <svg class="animate-spin -ml-1 mr-3 h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                                </svg>
                                Updating Category...
                            </div>
                            <span v-else>Update Category</span>
                        </button>
                    </div>
                </form>
            </div>
        </main>
    </div>
</template> 