<template>
    <Head title="Shopping Cart" />

    <ShopLayout :cart-count="cartCount">
        <!-- Hero Section -->
        <div class="relative min-h-[30vh] flex items-center justify-center overflow-hidden cursor-default">
            <!-- Background with geometric pattern -->
            <div class="absolute inset-0 bg-gradient-to-br from-slate-800 via-blue-800 to-indigo-800"></div>
            
            <!-- Geometric pattern overlay -->
            <div class="absolute inset-0 opacity-20">
                <div class="absolute inset-0" style="background-image: url('data:image/svg+xml,%3Csvg width=\'60\' height=\'60\' viewBox=\'0 0 60 60\' xmlns=\'http://www.w3.org/2000/svg\'%3E%3Cg fill=\'none\' fill-rule=\'evenodd\'%3E%3Cg fill=\'%23ffffff\' fill-opacity=\'0.1\'%3E%3Ccircle cx=\'30\' cy=\'30\' r=\'2\'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E');"></div>
            </div>
            
            <!-- Animated background elements -->
            <div class="absolute inset-0">
                <div class="absolute top-10 left-10 w-32 h-32 bg-blue-500 rounded-full mix-blend-multiply filter blur-xl opacity-60 animate-blob"></div>
                <div class="absolute top-20 right-10 w-32 h-32 bg-cyan-500 rounded-full mix-blend-multiply filter blur-xl opacity-60 animate-blob animation-delay-2000"></div>
                <div class="absolute -bottom-4 left-20 w-32 h-32 bg-indigo-500 rounded-full mix-blend-multiply filter blur-xl opacity-60 animate-blob animation-delay-4000"></div>
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
                        <span class="text-white">Shopping Cart</span>
                    </div>

                    <!-- Main heading -->
                    <h1 class="text-4xl md:text-5xl font-bold mb-4 leading-tight">
                        <span class="bg-gradient-to-r from-white via-blue-200 to-cyan-200 bg-clip-text text-transparent">
                            Shopping Cart
                        </span>
                    </h1>

                    <!-- Subtitle -->
                    <p class="text-lg md:text-xl opacity-90 max-w-2xl mx-auto leading-relaxed">
                        Review your items and proceed to checkout
                    </p>
                </div>
            </div>
        </div>

        <!-- Cart Section -->
        <div class="py-16 bg-gray-50">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <!-- Empty Cart -->
                <div v-if="cartItems.length === 0" class="text-center py-20">
                    <div class="bg-white rounded-2xl shadow-lg p-12 max-w-md mx-auto">
                        <div class="text-gray-400 mb-6">
                            <svg class="mx-auto h-24 w-24" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4m0 0L7 13m0 0l-2.5 5M7 13l2.5 5m6-5v6a2 2 0 01-2 2H9a2 2 0 01-2-2v-6m6 0V9a2 2 0 00-2-2H9a2 2 0 00-2 2v4.01" />
                            </svg>
                        </div>
                        <h2 class="text-2xl font-bold text-gray-900 mb-4">Your cart is empty</h2>
                        <p class="text-gray-600 mb-8">Looks like you haven't added any items to your cart yet.</p>
                        <Link
                            :href="route('shop.index')"
                            class="bg-gradient-to-r from-blue-600 to-purple-600 text-white px-8 py-4 rounded-2xl font-bold hover:from-blue-700 hover:to-purple-700 transition-all duration-300 transform hover:scale-105 shadow-lg"
                        >
                            Start Shopping
                        </Link>
                    </div>
                </div>

                <!-- Cart with Items -->
                <div v-else class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                    <!-- Cart Items -->
                    <div class="lg:col-span-2">
                        <div class="bg-white rounded-2xl shadow-lg overflow-hidden">
                            <div class="p-8">
                                <div class="flex items-center justify-between mb-8">
                                    <h2 class="text-2xl font-bold text-gray-900">Cart Items</h2>
                                    <Link
                                        :href="route('shop.index')"
                                        class="text-blue-600 hover:text-blue-800 font-semibold flex items-center"
                                    >
                                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                                        </svg>
                                        Continue Shopping
                                    </Link>
                                </div>
                                
                                <div class="space-y-6">
                                    <div
                                        v-for="item in cartItems"
                                        :key="item.id"
                                        class="flex items-center space-x-6 p-6 bg-gray-50 rounded-2xl hover:bg-gray-100 transition-colors"
                                    >
                                        <div class="flex-shrink-0">
                                            <img
                                                :src="item.main_image || 'https://via.placeholder.com/100x100/f3f4f6/6b7280?text=Product'"
                                                :alt="item.name"
                                                class="w-24 h-24 object-cover rounded-xl shadow-md"
                                            />
                                        </div>
                                        <div class="flex-1 min-w-0">
                                            <div class="flex items-center justify-between">
                                                <div>
                                                    <h3 class="text-xl font-bold text-gray-900 mb-2">
                                                        {{ item.name }}
                                                    </h3>
                                                    <p class="text-gray-600 mb-2">
                                                        {{ item.category?.name }}
                                                    </p>
                                                    <div class="flex items-center space-x-4">
                                                        <span v-if="item.size" class="text-sm bg-blue-100 text-blue-800 px-3 py-1 rounded-full font-medium">
                                                            Size: {{ item.size }}
                                                        </span>
                                                        <span v-if="item.color" class="text-sm bg-green-100 text-green-800 px-3 py-1 rounded-full font-medium">
                                                            Color: {{ item.color }}
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="text-right">
                                                    <p class="text-2xl font-bold text-gray-900 mb-1">
                                                        ${{ item.total }}
                                                    </p>
                                                    <p class="text-sm text-gray-500">
                                                        ${{ item.price }} each
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="flex items-center justify-between mt-6">
                                                <div class="flex items-center space-x-3">
                                                    <button
                                                        @click="updateQuantity(item, item.quantity - 1)"
                                                        :disabled="item.quantity <= 1"
                                                        class="w-10 h-10 border-2 border-gray-300 rounded-xl flex items-center justify-center hover:bg-gray-50 disabled:opacity-50 disabled:cursor-not-allowed transition-colors font-bold"
                                                    >
                                                        -
                                                    </button>
                                                    <span class="w-16 text-center font-bold text-lg">{{ item.quantity }}</span>
                                                    <button
                                                        @click="updateQuantity(item, item.quantity + 1)"
                                                        class="w-10 h-10 border-2 border-gray-300 rounded-xl flex items-center justify-center hover:bg-gray-50 transition-colors font-bold"
                                                    >
                                                        +
                                                    </button>
                                                </div>
                                                <button
                                                    @click="removeItem(item)"
                                                    class="text-red-600 hover:text-red-800 font-semibold text-sm flex items-center"
                                                >
                                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                                    </svg>
                                                    Remove
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Order Summary -->
                    <div class="lg:col-span-1">
                        <div class="bg-white rounded-2xl shadow-lg p-8 sticky top-8">
                            <h2 class="text-2xl font-bold text-gray-900 mb-8">Order Summary</h2>
                            <div class="space-y-4">
                                <div class="flex justify-between py-3 border-b border-gray-100">
                                    <span class="text-gray-600 font-medium">Subtotal</span>
                                    <span class="font-bold text-lg">${{ subtotal.toFixed(2) }}</span>
                                </div>
                                <div class="flex justify-between py-3 border-b border-gray-100">
                                    <span class="text-gray-600 font-medium">Tax (8%)</span>
                                    <span class="font-bold text-lg">${{ tax.toFixed(2) }}</span>
                                </div>
                                <div class="flex justify-between py-3 border-b border-gray-100">
                                    <span class="text-gray-600 font-medium">Shipping</span>
                                    <span class="font-bold text-lg">${{ shipping.toFixed(2) }}</span>
                                </div>
                                <div class="pt-4">
                                    <div class="flex justify-between">
                                        <span class="text-2xl font-bold text-gray-900">Total</span>
                                        <span class="text-2xl font-bold text-gray-900">${{ total.toFixed(2) }}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-8 space-y-4">
                                <Link
                                    :href="route('orders.checkout')"
                                    class="w-full bg-gradient-to-r from-blue-600 to-purple-600 text-white py-4 px-6 rounded-2xl font-bold text-lg hover:from-blue-700 hover:to-purple-700 transition-all duration-300 transform hover:scale-105 shadow-lg text-center block"
                                >
                                    Proceed to Checkout
                                </Link>
                                <button
                                    @click="clearCart"
                                    class="w-full bg-gray-200 text-gray-800 py-4 px-6 rounded-2xl font-bold text-lg hover:bg-gray-300 transition-all duration-300 transform hover:scale-105"
                                >
                                    Clear Cart
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </ShopLayout>
</template>

<script setup>
import { Head, Link, router } from '@inertiajs/vue3';
import ShopLayout from '@/Layouts/ShopLayout.vue';

const props = defineProps({
    cartItems: Array,
    subtotal: Number,
    tax: Number,
    shipping: Number,
    total: Number,
    cartCount: Number,
});

const updateQuantity = (item, newQuantity) => {
    if (newQuantity < 1) return;
    
    router.patch(route('cart.update'), {
        cart_item_id: item.id,
        quantity: newQuantity,
    });
};

const removeItem = (item) => {
    router.delete(route('cart.remove'), {
        data: {
            cart_item_id: item.id,
        },
    });
};

const clearCart = () => {
    if (confirm('Are you sure you want to clear your cart?')) {
        router.delete(route('cart.clear'));
    }
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
</style> 