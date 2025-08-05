<template>
    <Head title="Checkout" />

    <div class="min-h-screen bg-gradient-to-br from-blue-50 via-indigo-50 to-purple-50">
        <!-- Hero Section -->
        <div class="relative overflow-hidden bg-gradient-to-r from-blue-600 via-purple-600 to-indigo-700">
            <div class="absolute inset-0 bg-black/20"></div>
            <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
                <div class="text-center">
                    <h1 class="text-4xl md:text-5xl font-bold text-white mb-4">
                        Secure Checkout
                    </h1>
                    <p class="text-xl text-blue-100 max-w-2xl mx-auto">
                        Complete your purchase with confidence. Your order is just a few steps away.
                    </p>
                </div>
            </div>
            <!-- Animated background elements -->
            <div class="absolute top-0 left-0 w-full h-full overflow-hidden">
                <div class="absolute -top-40 -right-40 w-80 h-80 bg-white/10 rounded-full blur-3xl animate-pulse"></div>
                <div class="absolute -bottom-40 -left-40 w-80 h-80 bg-white/10 rounded-full blur-3xl animate-pulse delay-1000"></div>
            </div>
        </div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
            <!-- Progress Indicator -->
            <div class="mb-8">
                <div class="flex items-center justify-center space-x-4">
                    <div class="flex items-center">
                        <div class="w-8 h-8 bg-green-500 rounded-full flex items-center justify-center">
                            <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                            </svg>
                        </div>
                        <span class="ml-2 text-sm font-medium text-gray-600">Cart</span>
                    </div>
                    <div class="w-16 h-0.5 bg-gray-300"></div>
                    <div class="flex items-center">
                        <div class="w-8 h-8 bg-blue-600 rounded-full flex items-center justify-center">
                            <span class="text-white text-sm font-bold">2</span>
                        </div>
                        <span class="ml-2 text-sm font-medium text-blue-600">Checkout</span>
                    </div>
                    <div class="w-16 h-0.5 bg-gray-300"></div>
                    <div class="flex items-center">
                        <div class="w-8 h-8 bg-gray-300 rounded-full flex items-center justify-center">
                            <span class="text-gray-500 text-sm font-bold">3</span>
                        </div>
                        <span class="ml-2 text-sm font-medium text-gray-400">Confirmation</span>
                    </div>
                </div>
            </div>

            <div class="flex items-center justify-between mb-8">
                <div></div>
                <Link
                    :href="route('cart.index')"
                    class="inline-flex items-center px-4 py-2 bg-white/80 backdrop-blur-sm border border-gray-200 rounded-lg text-gray-700 hover:bg-white hover:shadow-lg transition-all duration-300 group"
                >
                    <svg class="w-4 h-4 mr-2 group-hover:-translate-x-1 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                    </svg>
                    Back to Cart
                </Link>
            </div>

            <form @submit.prevent="placeOrder" class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                <!-- Shipping Information -->
                <div class="lg:col-span-2 space-y-6">
                    <!-- Personal Information -->
                    <div class="bg-white/80 backdrop-blur-sm rounded-2xl shadow-xl border border-white/20 p-8">
                        <div class="flex items-center mb-6">
                            <div class="w-10 h-10 bg-gradient-to-r from-blue-500 to-purple-600 rounded-lg flex items-center justify-center mr-4">
                                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                </svg>
                            </div>
                            <h2 class="text-2xl font-bold text-gray-900">Personal Information</h2>
                        </div>
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div class="space-y-2">
                                <label class="block text-sm font-semibold text-gray-700">
                                    Full Name
                                </label>
                                <input
                                    v-model="form.full_name"
                                    type="text"
                                    required
                                    class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-300 bg-white/50 backdrop-blur-sm"
                                    placeholder="Enter your full name"
                                />
                                <div v-if="errors.full_name" class="text-red-500 text-sm">
                                    {{ errors.full_name }}
                                </div>
                            </div>

                            <div class="space-y-2">
                                <label class="block text-sm font-semibold text-gray-700">
                                    Email Address
                                </label>
                                <input
                                    v-model="form.email"
                                    type="email"
                                    required
                                    class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-300 bg-white/50 backdrop-blur-sm"
                                    placeholder="your@email.com"
                                />
                                <div v-if="errors.email" class="text-red-500 text-sm">
                                    {{ errors.email }}
                                </div>
                            </div>

                            <div class="space-y-2">
                                <label class="block text-sm font-semibold text-gray-700">
                                    Phone Number
                                </label>
                                <input
                                    v-model="form.shipping_phone"
                                    type="tel"
                                    required
                                    class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-300 bg-white/50 backdrop-blur-sm"
                                    placeholder="+1 (555) 123-4567"
                                />
                                <div v-if="errors.shipping_phone" class="text-red-500 text-sm">
                                    {{ errors.shipping_phone }}
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Shipping Address -->
                    <div class="bg-white/80 backdrop-blur-sm rounded-2xl shadow-xl border border-white/20 p-8">
                        <div class="flex items-center mb-6">
                            <div class="w-10 h-10 bg-gradient-to-r from-green-500 to-teal-600 rounded-lg flex items-center justify-center mr-4">
                                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                            </div>
                            <h2 class="text-2xl font-bold text-gray-900">Shipping Address</h2>
                        </div>
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div class="md:col-span-2 space-y-2">
                                <label class="block text-sm font-semibold text-gray-700">
                                    Street Address
                                </label>
                                <input
                                    v-model="form.shipping_address"
                                    type="text"
                                    required
                                    class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-300 bg-white/50 backdrop-blur-sm"
                                    placeholder="123 Main Street"
                                />
                                <div v-if="errors.shipping_address" class="text-red-500 text-sm">
                                    {{ errors.shipping_address }}
                                </div>
                            </div>

                            <div class="space-y-2">
                                <label class="block text-sm font-semibold text-gray-700">
                                    City
                                </label>
                                <input
                                    v-model="form.shipping_city"
                                    type="text"
                                    required
                                    class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-300 bg-white/50 backdrop-blur-sm"
                                    placeholder="New York"
                                />
                                <div v-if="errors.shipping_city" class="text-red-500 text-sm">
                                    {{ errors.shipping_city }}
                                </div>
                            </div>

                            <div class="space-y-2">
                                <label class="block text-sm font-semibold text-gray-700">
                                    State/Province
                                </label>
                                <input
                                    v-model="form.shipping_state"
                                    type="text"
                                    required
                                    class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-300 bg-white/50 backdrop-blur-sm"
                                    placeholder="NY"
                                />
                                <div v-if="errors.shipping_state" class="text-red-500 text-sm">
                                    {{ errors.shipping_state }}
                                </div>
                            </div>

                            <div class="space-y-2">
                                <label class="block text-sm font-semibold text-gray-700">
                                    ZIP/Postal Code
                                </label>
                                <input
                                    v-model="form.shipping_zip"
                                    type="text"
                                    required
                                    class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-300 bg-white/50 backdrop-blur-sm"
                                    placeholder="10001"
                                />
                                <div v-if="errors.shipping_zip" class="text-red-500 text-sm">
                                    {{ errors.shipping_zip }}
                                </div>
                            </div>

                            <div class="space-y-2">
                                <label class="block text-sm font-semibold text-gray-700">
                                    Country
                                </label>
                                <input
                                    v-model="form.shipping_country"
                                    type="text"
                                    required
                                    class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-300 bg-white/50 backdrop-blur-sm"
                                    placeholder="United States"
                                />
                                <div v-if="errors.shipping_country" class="text-red-500 text-sm">
                                    {{ errors.shipping_country }}
                                </div>
                            </div>
                        </div>

                        <div class="mt-6 space-y-2">
                            <label class="block text-sm font-semibold text-gray-700">
                                Order Notes (Optional)
                            </label>
                            <textarea
                                v-model="form.notes"
                                rows="3"
                                class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-300 bg-white/50 backdrop-blur-sm resize-none"
                                placeholder="Any special instructions for your order..."
                            ></textarea>
                            <div v-if="errors.notes" class="text-red-500 text-sm">
                                {{ errors.notes }}
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Order Summary -->
                <div class="lg:col-span-1">
                    <div class="bg-white/80 backdrop-blur-sm rounded-2xl shadow-xl border border-white/20 p-6 sticky top-8">
                        <div class="flex items-center mb-6">
                            <div class="w-10 h-10 bg-gradient-to-r from-orange-500 to-red-600 rounded-lg flex items-center justify-center mr-4">
                                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                                </svg>
                            </div>
                            <h2 class="text-xl font-bold text-gray-900">Order Summary</h2>
                        </div>
                        
                        <!-- Cart Items -->
                        <div class="space-y-4 mb-6 max-h-64 overflow-y-auto">
                            <div
                                v-for="item in cartItems"
                                :key="item.key"
                                class="flex items-center space-x-3 p-3 bg-gray-50/50 rounded-xl"
                            >
                                <img
                                    :src="item.product.main_image || 'https://via.placeholder.com/60x60/f3f4f6/6b7280?text=Product'"
                                    :alt="item.product.name"
                                    class="w-12 h-12 object-cover rounded-lg shadow-sm"
                                />
                                <div class="flex-1 min-w-0">
                                    <h4 class="text-sm font-semibold text-gray-900 truncate">
                                        {{ item.product.name }}
                                    </h4>
                                    <p class="text-xs text-gray-500">
                                        Qty: {{ item.quantity }}
                                        <span v-if="item.size"> | Size: {{ item.size }}</span>
                                        <span v-if="item.color"> | Color: {{ item.color }}</span>
                                    </p>
                                </div>
                                <div class="text-right">
                                    <p class="text-sm font-bold text-gray-900">
                                        ${{ item.total.toFixed(2) }}
                                    </p>
                                </div>
                            </div>
                        </div>

                        <!-- Totals -->
                        <div class="space-y-4 border-t border-gray-200 pt-6">
                            <div class="flex justify-between items-center">
                                <span class="text-gray-600 font-medium">Subtotal</span>
                                <span class="font-semibold text-gray-900">${{ subtotal.toFixed(2) }}</span>
                            </div>
                            <div class="flex justify-between items-center">
                                <span class="text-gray-600 font-medium">Tax (8%)</span>
                                <span class="font-semibold text-gray-900">${{ tax.toFixed(2) }}</span>
                            </div>
                            <div class="flex justify-between items-center">
                                <span class="text-gray-600 font-medium">Shipping</span>
                                <span class="font-semibold text-gray-900">${{ shipping.toFixed(2) }}</span>
                            </div>
                            <div class="border-t border-gray-200 pt-4">
                                <div class="flex justify-between items-center">
                                    <span class="text-lg font-bold text-gray-900">Total</span>
                                    <span class="text-xl font-bold text-blue-600">${{ total.toFixed(2) }}</span>
                                </div>
                            </div>
                        </div>

                        <!-- Security Badge -->
                        <div class="mt-6 p-4 bg-green-50 rounded-xl border border-green-200">
                            <div class="flex items-center">
                                <svg class="w-5 h-5 text-green-600 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd" />
                                </svg>
                                <span class="text-sm font-medium text-green-800">Secure Checkout</span>
                            </div>
                            <p class="text-xs text-green-600 mt-1">Your payment information is encrypted and secure</p>
                        </div>

                        <!-- Place Order Button -->
                        <div class="mt-6">
                            <button
                                type="submit"
                                :disabled="processing"
                                class="w-full bg-gradient-to-r from-blue-600 to-purple-600 text-white py-4 px-6 rounded-xl font-bold hover:from-blue-700 hover:to-purple-700 disabled:from-gray-400 disabled:to-gray-500 disabled:cursor-not-allowed transition-all duration-300 transform hover:scale-105 disabled:transform-none shadow-lg hover:shadow-xl"
                            >
                                <div v-if="processing" class="flex items-center justify-center">
                                    <svg class="animate-spin -ml-1 mr-3 h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                                    </svg>
                                    Processing Order...
                                </div>
                                <span v-else class="flex items-center justify-center">
                                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                                    </svg>
                                    Place Order
                                </span>
                            </button>
                        </div>

                        <!-- Trust Indicators -->
                        <div class="mt-6 text-center">
                            <div class="flex items-center justify-center space-x-4 text-xs text-gray-500">
                                <div class="flex items-center">
                                    <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                    </svg>
                                    SSL Secure
                                </div>
                                <div class="flex items-center">
                                    <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                    </svg>
                                    24/7 Support
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</template>

<script setup>
import { Head, Link, router, useForm } from '@inertiajs/vue3';
import { ref } from 'vue';

const props = defineProps({
    cartItems: Array,
    subtotal: Number,
    tax: Number,
    shipping: Number,
    total: Number,
    errors: Object,
});

const processing = ref(false);

const form = useForm({
    full_name: '',
    email: '',
    shipping_address: '',
    shipping_city: '',
    shipping_state: '',
    shipping_zip: '',
    shipping_country: '',
    shipping_phone: '',
    notes: '',
});

const placeOrder = () => {
    processing.value = true;
    form.post(route('orders.store'), {
        onFinish: () => {
            processing.value = false;
        },
    });
};
</script>

<style scoped>
/* Custom scrollbar for order summary */
.overflow-y-auto::-webkit-scrollbar {
    width: 4px;
}

.overflow-y-auto::-webkit-scrollbar-track {
    background: #f1f5f9;
    border-radius: 2px;
}

.overflow-y-auto::-webkit-scrollbar-thumb {
    background: #cbd5e1;
    border-radius: 2px;
}

.overflow-y-auto::-webkit-scrollbar-thumb:hover {
    background: #94a3b8;
}
</style>