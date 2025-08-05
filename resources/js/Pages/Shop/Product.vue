<template>
    <Head :title="product.name" />

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
                        <Link :href="route('shop.category', product.category.slug)" class="text-white/70 hover:text-white transition-colors">
                            {{ product.category.name }}
                        </Link>
                        <span class="mx-2 text-white/50">/</span>
                        <span class="text-white">{{ product.name }}</span>
                    </div>

                    <!-- Main heading -->
                    <h1 class="text-3xl md:text-4xl font-bold mb-2 leading-tight">
                        <span class="bg-gradient-to-r from-white via-blue-200 to-cyan-200 bg-clip-text text-transparent">
                            {{ product.name }}
                        </span>
                    </h1>

                    <!-- Category -->
                    <p class="text-lg opacity-90">{{ product.category.name }}</p>
                </div>
            </div>
        </div>

        <!-- Product Details Section -->
        <div class="py-16 bg-gray-50">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
                    <!-- Product Images -->
                    <div class="space-y-6">
                        <div class="bg-white rounded-2xl shadow-lg overflow-hidden">
                            <img
                                :src="selectedImage || product.main_image || 'https://via.placeholder.com/400x400/f3f4f6/6b7280?text=Product'"
                                :alt="product.name"
                                class="w-full h-96 lg:h-[500px] object-cover"
                            />
                        </div>
                        
                        <!-- Thumbnail Images -->
                        <div v-if="product.images && product.images.length > 1" class="grid grid-cols-4 gap-4">
                            <button
                                v-for="image in product.images"
                                :key="image"
                                @click="selectedImage = image"
                                :class="[
                                    'bg-white rounded-xl shadow-md overflow-hidden transition-all duration-300',
                                    selectedImage === image ? 'ring-4 ring-blue-500 shadow-xl' : 'hover:shadow-lg'
                                ]"
                            >
                                <img :src="image" :alt="product.name" class="w-full h-24 object-cover" />
                            </button>
                        </div>
                    </div>

                    <!-- Product Info -->
                    <div class="space-y-8">
                        <!-- Price and Badges -->
                        <div class="flex items-center space-x-4">
                            <span v-if="product.is_on_sale" class="text-4xl font-bold text-red-600">
                                ${{ product.current_price }}
                            </span>
                            <span v-else class="text-4xl font-bold text-gray-900">
                                ${{ product.current_price }}
                            </span>
                            <span v-if="product.is_on_sale" class="text-2xl text-gray-500 line-through">
                                ${{ product.price }}
                            </span>
                            <span v-if="product.is_on_sale" class="bg-gradient-to-r from-red-500 to-pink-500 text-white px-4 py-2 rounded-full text-sm font-semibold shadow-lg">
                                {{ product.discount_percentage }}% OFF
                            </span>
                        </div>

                        <!-- Description -->
                        <div class="bg-white rounded-2xl p-6 shadow-lg">
                            <h3 class="text-xl font-bold text-gray-900 mb-4">Description</h3>
                            <p class="text-gray-600 leading-relaxed">{{ product.description }}</p>
                        </div>

                        <!-- Size Selection -->
                        <div v-if="product.sizes && product.sizes.length" class="bg-white rounded-2xl p-6 shadow-lg">
                            <h3 class="text-xl font-bold text-gray-900 mb-4">Select Size</h3>
                            <div class="flex flex-wrap gap-3">
                                <button
                                    v-for="size in product.sizes"
                                    :key="size"
                                    @click="selectedSize = size"
                                    :class="[
                                        'px-6 py-3 border-2 rounded-xl font-semibold transition-all duration-300 transform hover:scale-105',
                                        selectedSize === size
                                            ? 'border-blue-500 bg-blue-50 text-blue-700 shadow-lg'
                                            : 'border-gray-300 text-gray-700 hover:border-gray-400 hover:bg-gray-50'
                                    ]"
                                >
                                    {{ size }}
                                </button>
                            </div>
                        </div>

                        <!-- Color Selection -->
                        <div v-if="product.colors && product.colors.length" class="bg-white rounded-2xl p-6 shadow-lg">
                            <h3 class="text-xl font-bold text-gray-900 mb-4">Select Color</h3>
                            <div class="flex flex-wrap gap-3">
                                <button
                                    v-for="color in product.colors"
                                    :key="color"
                                    @click="selectedColor = color"
                                    :class="[
                                        'px-6 py-3 border-2 rounded-xl font-semibold transition-all duration-300 transform hover:scale-105',
                                        selectedColor === color
                                            ? 'border-blue-500 bg-blue-50 text-blue-700 shadow-lg'
                                            : 'border-gray-300 text-gray-700 hover:border-gray-400 hover:bg-gray-50'
                                    ]"
                                >
                                    {{ color }}
                                </button>
                            </div>
                        </div>

                        <!-- Quantity -->
                        <div class="bg-white rounded-2xl p-6 shadow-lg">
                            <h3 class="text-xl font-bold text-gray-900 mb-4">Quantity</h3>
                            <div class="flex items-center space-x-4">
                                <button
                                    @click="quantity > 1 && quantity--"
                                    class="w-12 h-12 border-2 border-gray-300 rounded-xl flex items-center justify-center hover:bg-gray-50 transition-colors text-xl font-bold"
                                >
                                    -
                                </button>
                                <span class="text-2xl font-bold w-20 text-center">{{ quantity }}</span>
                                <button
                                    @click="quantity < product.stock_quantity && quantity++"
                                    class="w-12 h-12 border-2 border-gray-300 rounded-xl flex items-center justify-center hover:bg-gray-50 transition-colors text-xl font-bold"
                                >
                                    +
                                </button>
                                <span class="text-sm text-gray-500 ml-4">
                                    {{ product.stock_quantity }} available
                                </span>
                            </div>
                        </div>

                        <!-- Add to Cart -->
                        <div class="space-y-4">
                            <!-- Success Message -->
                            <div v-if="flash && flash.success" class="bg-green-50 border border-green-200 rounded-xl p-4">
                                <p class="text-green-600 text-sm">{{ flash.success }}</p>
                            </div>
                            
                            <!-- Error Messages -->
                            <div v-if="form.errors.quantity" class="bg-red-50 border border-red-200 rounded-xl p-4">
                                <p class="text-red-600 text-sm">{{ form.errors.quantity }}</p>
                            </div>
                            

                            
                            <!-- Authentication Required Message -->
                            <div v-if="!auth.user" class="bg-blue-50 border border-blue-200 rounded-xl p-4">
                                <p class="text-blue-600 text-sm mb-3">Please log in to add items to your cart.</p>
                                <Link
                                    :href="route('login')"
                                    class="inline-block bg-gradient-to-r from-blue-600 to-purple-600 text-white px-4 py-2 rounded-lg text-sm font-semibold hover:from-blue-700 hover:to-purple-700 transition-all duration-300"
                                >
                                    Login to Continue
                                </Link>
                            </div>
                            
                            <button
                                v-if="product.stock_quantity > 0 && auth.user"
                                @click="addToCart"
                                :disabled="!canAddToCart"
                                class="w-full bg-gradient-to-r from-blue-600 to-purple-600 text-white py-4 px-6 rounded-2xl font-bold text-lg hover:from-blue-700 hover:to-purple-700 disabled:bg-gray-400 disabled:cursor-not-allowed transition-all duration-300 transform hover:scale-105 shadow-lg hover:shadow-xl"
                            >
                                Add to Cart
                            </button>
                            <button
                                v-else
                                disabled
                                class="w-full bg-gray-400 text-white py-4 px-6 rounded-2xl font-bold text-lg cursor-not-allowed"
                            >
                                Out of Stock
                            </button>
                        </div>

                        <!-- Product Details -->
                        <div class="bg-white rounded-2xl p-6 shadow-lg">
                            <h3 class="text-xl font-bold text-gray-900 mb-4">Product Details</h3>
                            <dl class="space-y-3">
                                <div class="flex justify-between py-2 border-b border-gray-100">
                                    <dt class="text-gray-600 font-medium">SKU:</dt>
                                    <dd class="text-gray-900 font-semibold">{{ product.id }}</dd>
                                </div>
                                <div class="flex justify-between py-2 border-b border-gray-100">
                                    <dt class="text-gray-600 font-medium">Category:</dt>
                                    <dd class="text-gray-900 font-semibold">{{ product.category.name }}</dd>
                                </div>
                                <div class="flex justify-between py-2">
                                    <dt class="text-gray-600 font-medium">Stock:</dt>
                                    <dd class="text-gray-900 font-semibold">{{ product.stock_quantity }} units</dd>
                                </div>
                            </dl>
                        </div>
                    </div>
                </div>

                <!-- Related Products -->
                <div v-if="relatedProducts.length > 0" class="mt-20">
                    <div class="text-center mb-12">
                        <h2 class="text-3xl font-bold text-gray-900 mb-4">Related Products</h2>
                        <p class="text-gray-600 max-w-2xl mx-auto">Discover more amazing products from our collection</p>
                    </div>
                    
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
                        <div
                            v-for="relatedProduct in relatedProducts"
                            :key="relatedProduct.id"
                            class="group bg-white rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-500 overflow-hidden transform hover:-translate-y-2"
                        >
                            <div class="relative overflow-hidden">
                                <img
                                    :src="relatedProduct.main_image || 'https://via.placeholder.com/300x300/f3f4f6/6b7280?text=Product'"
                                    :alt="relatedProduct.name"
                                    class="w-full h-64 object-cover group-hover:scale-110 transition-transform duration-500"
                                />
                                <div v-if="relatedProduct.is_on_sale" class="absolute top-4 left-4 bg-gradient-to-r from-red-500 to-pink-500 text-white px-3 py-1 rounded-full text-sm font-semibold shadow-lg">
                                    {{ relatedProduct.discount_percentage }}% OFF
                                </div>
                            </div>
                            <div class="p-6">
                                <h3 class="text-lg font-bold text-gray-900 mb-2 group-hover:text-blue-600 transition-colors">
                                    {{ relatedProduct.name }}
                                </h3>
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center space-x-3">
                                        <span v-if="relatedProduct.is_on_sale" class="text-xl font-bold text-red-600">
                                            ${{ relatedProduct.current_price }}
                                        </span>
                                        <span v-else class="text-xl font-bold text-gray-900">
                                            ${{ relatedProduct.current_price }}
                                        </span>
                                        <span v-if="relatedProduct.is_on_sale" class="text-lg text-gray-500 line-through">
                                            ${{ relatedProduct.price }}
                                        </span>
                                    </div>
                                    <Link
                                        :href="route('shop.product', relatedProduct.slug)"
                                        class="bg-gradient-to-r from-blue-600 to-purple-600 text-white px-4 py-2 rounded-xl text-sm font-semibold hover:from-blue-700 hover:to-purple-700 transition-all duration-300 transform hover:scale-105"
                                    >
                                        View
                                    </Link>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </ShopLayout>
</template>

<script setup>
import { Head, Link, router, useForm } from '@inertiajs/vue3';
import { ref, computed } from 'vue';
import ShopLayout from '@/Layouts/ShopLayout.vue';

const props = defineProps({
    product: Object,
    relatedProducts: Array,
    flash: Object,
    auth: Object,
    cartCount: Number,
});

const selectedImage = ref(props.product.main_image);
const selectedSize = ref(props.product.sizes ? props.product.sizes[0] : null);
const selectedColor = ref(props.product.colors ? props.product.colors[0] : null);
const quantity = ref(1);

const canAddToCart = computed(() => {
    if (props.product.stock_quantity === 0) return false;
    if (props.product.sizes && !selectedSize.value) return false;
    if (props.product.colors && !selectedColor.value) return false;
    return true;
});

const isAuthenticated = computed(() => {
    return props.auth && props.auth.user;
});

const form = useForm({
    product_id: props.product.id,
    quantity: 1,
    size: null,
    color: null,
});

const addToCart = () => {
    if (!canAddToCart.value) return;

    // Create a new form instance with the current data
    const cartForm = useForm({
        product_id: props.product.id,
        quantity: quantity.value,
        size: selectedSize.value,
        color: selectedColor.value,
    });

    cartForm.post(route('cart.add'), {
        onSuccess: () => {
            // Success message will be shown via flash message
        },
        onError: (errors) => {
            console.error('Error adding to cart:', errors);
        },
    });
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