<template>
    <Head title="wshop" />

    <ShopLayout :cart-count="cartCount">
                  <!-- Hero Section with Parallax Effect -->
          <div class="relative min-h-[60vh] flex items-center justify-center overflow-hidden cursor-default">
            <!-- Background with geometric pattern -->
            <div class="absolute inset-0 bg-gradient-to-br from-slate-900 via-blue-900 to-indigo-900"></div>
            
            <!-- Geometric pattern overlay -->
            <div class="absolute inset-0 opacity-20">
                <div class="absolute inset-0" style="background-image: url('data:image/svg+xml,%3Csvg width=\'60\' height=\'60\' viewBox=\'0 0 60 60\' xmlns=\'http://www.w3.org/2000/svg\'%3E%3Cg fill=\'none\' fill-rule=\'evenodd\'%3E%3Cg fill=\'%23ffffff\' fill-opacity=\'0.1\'%3E%3Ccircle cx=\'30\' cy=\'30\' r=\'2\'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E');"></div>
            </div>
            
            <!-- Animated background elements -->
            <div class="absolute inset-0">
                <div class="absolute top-10 left-10 w-64 h-64 bg-blue-500 rounded-full mix-blend-multiply filter blur-xl opacity-60 animate-blob"></div>
                <div class="absolute top-20 right-10 w-64 h-64 bg-cyan-500 rounded-full mix-blend-multiply filter blur-xl opacity-60 animate-blob animation-delay-2000"></div>
                <div class="absolute -bottom-4 left-20 w-64 h-64 bg-indigo-500 rounded-full mix-blend-multiply filter blur-xl opacity-60 animate-blob animation-delay-4000"></div>
            </div>
            
            <!-- Floating geometric shapes -->
            <div class="absolute inset-0">
                <div class="absolute top-1/4 left-1/4 w-8 h-8 bg-white/10 rotate-45 animate-pulse"></div>
                <div class="absolute top-1/3 right-1/4 w-6 h-6 bg-white/10 rounded-full animate-pulse animation-delay-1000"></div>
                <div class="absolute bottom-1/4 left-1/3 w-10 h-10 bg-white/10 transform rotate-12 animate-pulse animation-delay-2000"></div>
                <div class="absolute top-1/2 right-1/3 w-4 h-4 bg-white/10 rounded-full animate-pulse animation-delay-3000"></div>
            </div>

            <!-- Hero Content -->
            <div class="relative z-10 text-center text-white px-4 sm:px-6 lg:px-8">
                <div class="max-w-4xl mx-auto">
                    <!-- Animated badge -->
                    <div class="inline-flex items-center px-4 py-2 bg-white/10 backdrop-blur-sm rounded-full border border-white/20 mb-8 animate-fade-in-up">
                        <span class="w-2 h-2 bg-green-400 rounded-full mr-2 animate-pulse"></span>
                        <span class="text-sm font-medium">New Collection Available</span>
                    </div>

                    <!-- Main heading with gradient text -->
                    <h1 class="text-4xl md:text-6xl font-bold mb-4 leading-tight">
                        <span class="bg-gradient-to-r from-white via-purple-200 to-pink-200 bg-clip-text text-transparent">
                            Discover Your
                        </span>
                        <br>
                        <span class="bg-gradient-to-r from-purple-300 via-pink-300 to-yellow-300 bg-clip-text text-transparent">
                            Perfect Style
                        </span>
                    </h1>

                    <!-- Subtitle -->
                    <p class="text-lg md:text-xl mb-8 opacity-90 max-w-2xl mx-auto leading-relaxed">
                        Explore our curated collection of premium clothing that combines comfort, style, and affordability for everyone.
                    </p>

                    <!-- CTA Buttons -->
                    <div class="flex flex-col sm:flex-row gap-4 justify-center items-center">
                        <Link
                            :href="route('shop.category', 'men')"
                            class="group relative px-6 py-3 bg-white text-gray-900 rounded-full font-semibold hover:bg-gray-100 transition-all duration-300 transform hover:scale-105 shadow-lg hover:shadow-xl"
                        >
                            <span class="relative z-10">Shop Men's Collection</span>
                            <div class="absolute inset-0 bg-gradient-to-r from-blue-500 to-purple-500 rounded-full opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                        </Link>
                        
                        <Link
                            :href="route('shop.category', 'women')"
                            class="group relative px-6 py-3 bg-transparent border-2 border-white text-white rounded-full font-semibold hover:bg-white hover:text-gray-900 transition-all duration-300 transform hover:scale-105"
                        >
                            Shop Women's Collection
                        </Link>
                    </div>


                </div>
            </div>
        </div>

        <!-- Features Section -->
        <div class="py-20 bg-white">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    <div class="text-center group">
                        <div class="w-16 h-16 bg-gradient-to-br from-blue-500 to-purple-600 rounded-full flex items-center justify-center mx-auto mb-4 group-hover:scale-110 transition-transform duration-300">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                            </svg>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-2">Premium Quality</h3>
                        <p class="text-gray-600">Handpicked materials and expert craftsmanship for lasting comfort and style.</p>
                    </div>
                    
                    <div class="text-center group">
                        <div class="w-16 h-16 bg-gradient-to-br from-green-500 to-teal-600 rounded-full flex items-center justify-center mx-auto mb-4 group-hover:scale-110 transition-transform duration-300">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-2">Fast Delivery</h3>
                        <p class="text-gray-600">Quick and reliable shipping to get your new style to your doorstep faster.</p>
                    </div>
                    
                    <div class="text-center group">
                        <div class="w-16 h-16 bg-gradient-to-br from-pink-500 to-red-600 rounded-full flex items-center justify-center mx-auto mb-4 group-hover:scale-110 transition-transform duration-300">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                            </svg>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-2">Easy Returns</h3>
                        <p class="text-gray-600">Hassle-free returns and exchanges if your style doesn't fit perfectly.</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Categories Section with Enhanced Design -->
        <div class="py-20 bg-gray-50">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-16">
                    <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mb-4">
                        Shop by Category
                    </h2>
                    <p class="text-xl text-gray-600 max-w-2xl mx-auto">
                        Explore our diverse collection across different categories, each designed with unique styles and preferences in mind.
                    </p>
                </div>
                
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    <div
                        v-for="category in categories"
                        :key="category.id"
                        class="group relative overflow-hidden rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-500 transform hover:-translate-y-2"
                    >
                        <div class="aspect-w-16 aspect-h-9 bg-gray-200">
                            <img
                                :src="category.image || 'https://via.placeholder.com/400x300/f3f4f6/6b7280?text=Category'"
                                :alt="category.name"
                                class="w-full h-80 object-cover group-hover:scale-110 transition-transform duration-700"
                            />
                        </div>
                        <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/40 to-transparent flex items-end">
                            <div class="p-8 w-full">
                                <h3 class="text-3xl font-bold text-white mb-3">{{ category.name }}</h3>
                                <p class="text-white/80 mb-6 text-lg">{{ category.description }}</p>
                                <Link
                                    :href="route('shop.category', category.slug)"
                                    class="inline-flex items-center px-6 py-3 bg-white text-gray-900 rounded-full font-semibold hover:bg-gray-100 transition-all duration-300 transform hover:scale-105 group-hover:shadow-lg"
                                >
                                    Shop Now
                                    <svg class="w-5 h-5 ml-2 group-hover:translate-x-1 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                                    </svg>
                                </Link>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Featured Products Section with Enhanced Cards -->
        <div class="py-20 bg-white">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-16">
                    <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mb-4">
                        Featured Products
                    </h2>
                    <p class="text-xl text-gray-600 max-w-2xl mx-auto">
                        Discover our most popular and trending items, carefully selected for their style and quality.
                    </p>
                </div>
                
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
                    <div
                        v-for="product in featuredProducts"
                        :key="product.id"
                        class="group bg-white rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-500 transform hover:-translate-y-2 overflow-hidden"
                    >
                        <div class="relative overflow-hidden">
                            <img
                                :src="product.main_image || 'https://via.placeholder.com/300x300/f3f4f6/6b7280?text=Product'"
                                :alt="product.name"
                                class="w-full h-80 object-cover group-hover:scale-110 transition-transform duration-700"
                            />
                            
                            <!-- Sale badge -->
                            <div v-if="product.is_on_sale" class="absolute top-4 left-4 bg-gradient-to-r from-red-500 to-pink-500 text-white px-3 py-1 rounded-full text-sm font-semibold shadow-lg">
                                {{ product.discount_percentage }}% OFF
                            </div>
                            
                            <!-- Quick action overlay -->
                            <div class="absolute inset-0 bg-black/50 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center">
                                <Link
                                    :href="route('shop.product', product.slug)"
                                    class="bg-white text-gray-900 px-6 py-3 rounded-full font-semibold hover:bg-gray-100 transition-all duration-300 transform hover:scale-105"
                                >
                                    View Details
                                </Link>
                            </div>
                        </div>
                        
                        <div class="p-6">
                            <h3 class="text-xl font-semibold text-gray-900 mb-2 group-hover:text-blue-600 transition-colors duration-300">
                                {{ product.name }}
                            </h3>
                            <p class="text-gray-600 mb-4">{{ product.category.name }}</p>
                            
                            <div class="flex items-center justify-between">
                                <div class="flex items-center space-x-2">
                                    <span v-if="product.is_on_sale" class="text-2xl font-bold text-red-600">
                                        ${{ product.current_price }}
                                    </span>
                                    <span v-else class="text-2xl font-bold text-gray-900">
                                        ${{ product.current_price }}
                                    </span>
                                    <span v-if="product.is_on_sale" class="text-lg text-gray-500 line-through">
                                        ${{ product.price }}
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>



        <!-- Call to Action Section -->
        <div class="py-20 bg-gray-900 text-white">
            <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
                <h2 class="text-4xl md:text-5xl font-bold mb-6">
                    Ready to Transform Your Style?
                </h2>
                <p class="text-xl mb-10 opacity-90 max-w-2xl mx-auto">
                    Join thousands of satisfied customers who have discovered their perfect look with our curated collection.
                </p>
                <div class="flex flex-col sm:flex-row gap-6 justify-center">
                    <Link
                        :href="route('shop.category', 'men')"
                        class="group relative px-8 py-4 bg-gradient-to-r from-blue-500 to-purple-600 text-white rounded-full font-semibold hover:from-blue-600 hover:to-purple-700 transition-all duration-300 transform hover:scale-105 shadow-lg hover:shadow-xl"
                    >
                        <span class="relative z-10">Start Shopping</span>
                    </Link>
                    <Link
                        :href="route('shop.category', 'women')"
                        class="group relative px-8 py-4 bg-transparent border-2 border-white text-white rounded-full font-semibold hover:bg-white hover:text-gray-900 transition-all duration-300 transform hover:scale-105"
                    >
                        Explore Collection
                    </Link>
                </div>
            </div>
        </div>
    </ShopLayout>
</template>

<script setup>
import { Head, Link } from '@inertiajs/vue3';
import ShopLayout from '@/Layouts/ShopLayout.vue';

defineProps({
    featuredProducts: Array,
    categories: Array,
    cartCount: Number,
});
</script>

<style scoped>
@keyframes blob {
    0% {
        transform: translate(0px, 0px) scale(1);
    }
    33% {
        transform: translate(30px, -50px) scale(1.1);
    }
    66% {
        transform: translate(-20px, 20px) scale(0.9);
    }
    100% {
        transform: translate(0px, 0px) scale(1);
    }
}

@keyframes fade-in-up {
    from {
        opacity: 0;
        transform: translateY(30px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

.animate-blob {
    animation: blob 7s infinite;
}

.animation-delay-1000 {
    animation-delay: 1s;
}

.animation-delay-2000 {
    animation-delay: 2s;
}

.animation-delay-3000 {
    animation-delay: 3s;
}

.animation-delay-4000 {
    animation-delay: 4s;
}

.animate-fade-in-up {
    animation: fade-in-up 1s ease-out;
}
</style> 