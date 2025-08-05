<template>
    <Head :title="`${category.name} Clothing`" />

    <ShopLayout :cart-count="cartCount">
        <!-- Hero Section -->
        <div class="relative min-h-[40vh] flex items-center justify-center overflow-hidden cursor-default">
            <!-- Background with geometric pattern -->
            <div class="absolute inset-0 bg-gradient-to-br from-slate-800 via-blue-800 to-indigo-800"></div>
            
            <!-- Geometric pattern overlay -->
            <div class="absolute inset-0 opacity-20">
                <div class="absolute inset-0" style="background-image: url('data:image/svg+xml,%3Csvg width=\'60\' height=\'60\' viewBox=\'0 0 60 60\' xmlns=\'http://www.w3.org/2000/svg\'%3E%3Cg fill=\'none\' fill-rule=\'evenodd\'%3E%3Cg fill=\'%23ffffff\' fill-opacity=\'0.1\'%3E%3Ccircle cx=\'30\' cy=\'30\' r=\'2\'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E');"></div>
            </div>
            
            <!-- Animated background elements -->
            <div class="absolute inset-0">
                <div class="absolute top-10 left-10 w-48 h-48 bg-blue-500 rounded-full mix-blend-multiply filter blur-xl opacity-60 animate-blob"></div>
                <div class="absolute top-20 right-10 w-48 h-48 bg-cyan-500 rounded-full mix-blend-multiply filter blur-xl opacity-60 animate-blob animation-delay-2000"></div>
                <div class="absolute -bottom-4 left-20 w-48 h-48 bg-indigo-500 rounded-full mix-blend-multiply filter blur-xl opacity-60 animate-blob animation-delay-4000"></div>
            </div>

            <!-- Hero Content -->
            <div class="relative z-10 text-center text-white px-4 sm:px-6 lg:px-8">
                <div class="max-w-4xl mx-auto">
                    <!-- Breadcrumb -->
                    <div class="flex items-center justify-center mb-6 text-sm">
                        <Link :href="route('shop.index')" class="text-white/70 hover:text-white transition-colors">
                            Home
                        </Link>
                        <span class="mx-2 text-white/50">/</span>
                        <span class="text-white">{{ category.name }}</span>
                    </div>

                    <!-- Main heading -->
                    <h1 class="text-4xl md:text-5xl font-bold mb-4 leading-tight">
                        <span class="bg-gradient-to-r from-white via-blue-200 to-cyan-200 bg-clip-text text-transparent">
                            {{ category.name }}
                        </span>
                        <br>
                        <span class="bg-gradient-to-r from-blue-300 via-cyan-300 to-indigo-300 bg-clip-text text-transparent">
                            Collection
                        </span>
                    </h1>

                    <!-- Subtitle -->
                    <p class="text-lg md:text-xl mb-6 opacity-90 max-w-2xl mx-auto leading-relaxed">
                        {{ category.description }}
                    </p>

                    <!-- Stats -->
                    <div class="flex justify-center items-center space-x-8 text-sm">
                        <div class="text-center">
                            <div class="text-2xl font-bold text-white">{{ products.total }}</div>
                            <div class="text-white/70">Products</div>
                        </div>
                        <div class="text-center">
                            <div class="text-2xl font-bold text-white">{{ products.data.length }}</div>
                            <div class="text-white/70">Showing</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Products Section -->
        <div class="py-16 bg-gray-50">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <!-- Products Grid -->
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8">
                    <div
                        v-for="product in products.data"
                        :key="product.id"
                        class="group bg-white rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-500 overflow-hidden transform hover:-translate-y-2"
                    >
                        <div class="relative overflow-hidden">
                            <img
                                :src="product.main_image || 'https://via.placeholder.com/300x300/f3f4f6/6b7280?text=Product'"
                                :alt="product.name"
                                class="w-full h-80 object-cover group-hover:scale-110 transition-transform duration-500"
                            />
                            
                            <!-- Badges -->
                            <div class="absolute top-4 left-4 flex flex-col gap-2">
                                <div v-if="product.is_on_sale" class="bg-gradient-to-r from-red-500 to-pink-500 text-white px-3 py-1 rounded-full text-sm font-semibold shadow-lg">
                                    {{ product.discount_percentage }}% OFF
                                </div>
                                <div v-if="product.stock_quantity === 0" class="bg-gray-600 text-white px-3 py-1 rounded-full text-sm font-semibold shadow-lg">
                                    Out of Stock
                                </div>
                            </div>

                            <!-- Quick Actions -->
                            <div class="absolute top-4 right-4 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                <button class="w-10 h-10 bg-white/90 backdrop-blur-sm rounded-full flex items-center justify-center shadow-lg hover:bg-white transition-colors">
                                    <svg class="w-5 h-5 text-gray-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                                    </svg>
                                </button>
                            </div>
                        </div>

                        <div class="p-6">
                            <h3 class="text-xl font-bold text-gray-900 mb-2 group-hover:text-blue-600 transition-colors">
                                {{ product.name }}
                            </h3>
                            <p class="text-gray-600 mb-4 line-clamp-2 text-sm leading-relaxed">{{ product.description }}</p>
                            
                            <!-- Sizes and Colors -->
                            <div class="mb-4">
                                <div v-if="product.sizes && product.sizes.length" class="flex flex-wrap gap-2 mb-2">
                                    <span class="text-xs font-medium text-gray-500 uppercase tracking-wide">Sizes:</span>
                                    <span
                                        v-for="size in product.sizes.slice(0, 3)"
                                        :key="size"
                                        class="text-xs bg-gray-100 px-3 py-1 rounded-full font-medium text-gray-700"
                                    >
                                        {{ size }}
                                    </span>
                                    <span v-if="product.sizes.length > 3" class="text-xs text-gray-500">
                                        +{{ product.sizes.length - 3 }} more
                                    </span>
                                </div>
                                <div v-if="product.colors && product.colors.length" class="flex flex-wrap gap-2">
                                    <span class="text-xs font-medium text-gray-500 uppercase tracking-wide">Colors:</span>
                                    <span
                                        v-for="color in product.colors.slice(0, 3)"
                                        :key="color"
                                        class="text-xs bg-gray-100 px-3 py-1 rounded-full font-medium text-gray-700"
                                    >
                                        {{ color }}
                                    </span>
                                    <span v-if="product.colors.length > 3" class="text-xs text-gray-500">
                                        +{{ product.colors.length - 3 }} more
                                    </span>
                                </div>
                            </div>

                            <div class="flex items-center justify-between">
                                <div class="flex items-center space-x-3">
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

                            <!-- Action Buttons -->
                            <div class="flex gap-3 mt-6">
                                <Link
                                    :href="route('shop.product', product.slug)"
                                    class="flex-1 bg-gradient-to-r from-blue-600 to-purple-600 text-white px-4 py-3 rounded-xl text-sm font-semibold hover:from-blue-700 hover:to-purple-700 transition-all duration-300 transform hover:scale-105 text-center"
                                >
                                    View Details
                                </Link>
                                <button
                                    v-if="product.stock_quantity > 0"
                                    @click="addToCart(product)"
                                    class="flex-1 bg-gradient-to-r from-green-600 to-emerald-600 text-white px-4 py-3 rounded-xl text-sm font-semibold hover:from-green-700 hover:to-emerald-700 transition-all duration-300 transform hover:scale-105"
                                >
                                    Add to Cart
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Pagination -->
                <div v-if="products.last_page > 1" class="mt-16 flex justify-center">
                    <nav class="flex items-center space-x-2 bg-white rounded-2xl shadow-lg p-2">
                        <Link
                            v-if="products.prev_page_url"
                            :href="products.prev_page_url"
                            class="px-4 py-2 text-sm font-medium text-gray-500 bg-gray-50 rounded-xl hover:bg-gray-100 transition-colors"
                        >
                            ← Previous
                        </Link>
                        
                        <template v-for="page in getVisiblePages()" :key="page">
                            <Link
                                v-if="page !== '...'"
                                :href="`${route('shop.category', category.slug)}?page=${page}`"
                                :class="[
                                    'px-4 py-2 text-sm font-medium rounded-xl transition-all duration-300',
                                    page === products.current_page
                                        ? 'bg-gradient-to-r from-blue-600 to-purple-600 text-white shadow-lg'
                                        : 'text-gray-500 bg-gray-50 hover:bg-gray-100'
                                ]"
                            >
                                {{ page }}
                            </Link>
                            <span v-else class="px-4 py-2 text-sm text-gray-500">...</span>
                        </template>

                        <Link
                            v-if="products.next_page_url"
                            :href="products.next_page_url"
                            class="px-4 py-2 text-sm font-medium text-gray-500 bg-gray-50 rounded-xl hover:bg-gray-100 transition-colors"
                        >
                            Next →
                        </Link>
                    </nav>
                </div>
            </div>
        </div>
    </ShopLayout>
</template>

<script setup>
import { Head, Link, router } from '@inertiajs/vue3';
import ShopLayout from '@/Layouts/ShopLayout.vue';

const props = defineProps({
    category: Object,
    products: Object,
    cartCount: Number,
});

const addToCart = (product) => {
    router.post(route('cart.add'), {
        product_id: product.id,
        quantity: 1,
        size: product.sizes ? product.sizes[0] : null,
        color: product.colors ? product.colors[0] : null,
    });
};

const getVisiblePages = () => {
    const current = props.products.current_page;
    const last = props.products.last_page;
    const pages = [];

    if (last <= 7) {
        for (let i = 1; i <= last; i++) {
            pages.push(i);
        }
    } else {
        if (current <= 4) {
            for (let i = 1; i <= 5; i++) {
                pages.push(i);
            }
            pages.push('...');
            pages.push(last);
        } else if (current >= last - 3) {
            pages.push(1);
            pages.push('...');
            for (let i = last - 4; i <= last; i++) {
                pages.push(i);
            }
        } else {
            pages.push(1);
            pages.push('...');
            for (let i = current - 1; i <= current + 1; i++) {
                pages.push(i);
            }
            pages.push('...');
            pages.push(last);
        }
    }

    return pages;
};
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

.animate-blob {
    animation: blob 7s infinite;
}

.animation-delay-2000 {
    animation-delay: 2s;
}

.animation-delay-4000 {
    animation-delay: 4s;
}

.line-clamp-2 {
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
}
</style> 