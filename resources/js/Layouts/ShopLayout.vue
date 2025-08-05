<script setup>
import { ref } from 'vue';
import { Link } from '@inertiajs/vue3';
import Dropdown from '@/Components/Dropdown.vue';
import DropdownLink from '@/Components/DropdownLink.vue';

const props = defineProps({
    cartCount: {
        type: Number,
        default: 0,
    },
});

const showingNavigationDropdown = ref(false);
</script>

<template>
    <div class="min-h-screen bg-gray-50">
        <!-- Navigation -->
        <nav class="bg-white/80 backdrop-blur-md shadow-lg border-b border-gray-200/50 sticky top-0 z-50">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between h-20">
                    <div class="flex items-center">
                        <!-- Logo -->
                        <Link :href="route('shop.index')" class="flex items-center group">
                            <div class="w-10 h-10 bg-gradient-to-br from-blue-600 to-purple-600 rounded-xl flex items-center justify-center mr-3 group-hover:scale-110 transition-transform duration-300 shadow-lg">
                                <span class="text-white font-bold text-lg">w</span>
                            </div>
                            <span class="text-2xl font-bold bg-gradient-to-r from-blue-600 to-purple-600 bg-clip-text text-transparent">wshop</span>
                        </Link>

                        <!-- Navigation Links -->
                        <div class="hidden md:ml-12 md:flex md:space-x-8">
                            <Link
                                :href="route('shop.index')"
                                class="relative text-gray-700 hover:text-blue-600 px-4 py-2 text-sm font-semibold transition-all duration-300 group"
                            >
                                Home
                                <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-gradient-to-r from-blue-600 to-purple-600 group-hover:w-full transition-all duration-300"></span>
                            </Link>
                            <Link
                                :href="route('shop.category', 'men')"
                                class="relative text-gray-700 hover:text-blue-600 px-4 py-2 text-sm font-semibold transition-all duration-300 group"
                            >
                                Men
                                <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-gradient-to-r from-blue-600 to-purple-600 group-hover:w-full transition-all duration-300"></span>
                            </Link>
                            <Link
                                :href="route('shop.category', 'women')"
                                class="relative text-gray-700 hover:text-blue-600 px-4 py-2 text-sm font-semibold transition-all duration-300 group"
                            >
                                Women
                                <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-gradient-to-r from-blue-600 to-purple-600 group-hover:w-full transition-all duration-300"></span>
                            </Link>
                            <Link
                                :href="route('shop.category', 'children')"
                                class="relative text-gray-700 hover:text-blue-600 px-4 py-2 text-sm font-semibold transition-all duration-300 group"
                            >
                                Children
                                <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-gradient-to-r from-blue-600 to-purple-600 group-hover:w-full transition-all duration-300"></span>
                            </Link>
                        </div>
                    </div>

                    <div class="flex items-center space-x-6">
                        <!-- Search -->
                        <div class="hidden lg:block">
                            <form :action="route('shop.search')" method="GET" class="flex">
                                <div class="relative">
                                    <input
                                        type="text"
                                        name="q"
                                        placeholder="Search products..."
                                        class="w-80 px-4 py-3 pl-12 pr-4 bg-gray-50 border border-gray-200 rounded-2xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent focus:bg-white transition-all duration-300"
                                    />
                                    <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                        <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                        </svg>
                                    </div>
                                    <button
                                        type="submit"
                                        class="absolute inset-y-0 right-0 px-4 bg-gradient-to-r from-blue-600 to-purple-600 text-white rounded-r-2xl hover:from-blue-700 hover:to-purple-700 transition-all duration-300 transform hover:scale-105"
                                    >
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                        </svg>
                                    </button>
                                </div>
                            </form>
                        </div>

                        <!-- Cart (only for authenticated users) -->
                        <Link
                            v-if="$page.props.auth.user"
                            :href="route('cart.index')"
                            class="relative p-3 text-gray-700 hover:text-blue-600 transition-all duration-300 group"
                        >
                            <div class="w-10 h-10 bg-gray-100 rounded-xl flex items-center justify-center group-hover:bg-blue-50 group-hover:scale-110 transition-all duration-300">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4m0 0L7 13m0 0l-2.5 5M7 13l2.5 5m6-5v6a2 2 0 01-2 2H9a2 2 0 01-2-2v-6m6 0V9a2 2 0 00-2-2H9a2 2 0 00-2 2v4.01" />
                                </svg>
                            </div>
                            <span v-if="cartCount > 0" class="absolute -top-1 -right-1 bg-gradient-to-r from-red-500 to-pink-500 text-white text-xs rounded-full h-6 w-6 flex items-center justify-center font-bold shadow-lg">
                                {{ cartCount }}
                            </span>
                        </Link>

                        <!-- User Menu -->
                        <div v-if="$page.props.auth.user" class="relative">
                            <Dropdown align="right" width="48">
                                <template #trigger>
                                    <button class="flex items-center space-x-3 p-2 bg-gray-100 rounded-xl hover:bg-blue-50 transition-all duration-300 group">
                                        <div class="w-8 h-8 bg-gradient-to-br from-blue-600 to-purple-600 rounded-full flex items-center justify-center">
                                            <span class="text-white font-bold text-sm">{{ $page.props.auth.user.name.charAt(0).toUpperCase() }}</span>
                                        </div>
                                        <span class="text-sm font-semibold text-gray-700 group-hover:text-blue-600">{{ $page.props.auth.user.name }}</span>
                                        <svg class="h-4 w-4 text-gray-400 group-hover:text-blue-600" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                        </svg>
                                    </button>
                                </template>

                                <template #content>
                                    <DropdownLink :href="route('orders.index')" class="flex items-center">
                                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                                        </svg>
                                        My Orders
                                    </DropdownLink>
                                    <DropdownLink :href="route('profile.edit')" class="flex items-center">
                                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                        </svg>
                                        Profile
                                    </DropdownLink>
                                    <DropdownLink
                                        :href="route('logout')"
                                        method="post"
                                        as="button"
                                        class="flex items-center text-red-600 hover:text-red-800"
                                    >
                                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                                        </svg>
                                        Log Out
                                    </DropdownLink>
                                </template>
                            </Dropdown>
                        </div>

                        <!-- Login/Register -->
                        <div v-else class="flex items-center space-x-4">
                            <Link
                                :href="route('login')"
                                class="text-gray-700 hover:text-blue-600 px-4 py-2 text-sm font-semibold transition-all duration-300"
                            >
                                Login
                            </Link>
                            <Link
                                :href="route('register')"
                                class="bg-gradient-to-r from-blue-600 to-purple-600 text-white px-6 py-3 rounded-2xl text-sm font-semibold hover:from-blue-700 hover:to-purple-700 transition-all duration-300 transform hover:scale-105 shadow-lg"
                            >
                                Register
                            </Link>
                        </div>

                        <!-- Mobile menu button -->
                        <div class="md:hidden">
                            <button
                                @click="showingNavigationDropdown = !showingNavigationDropdown"
                                class="p-2 bg-gray-100 rounded-xl hover:bg-blue-50 transition-all duration-300"
                            >
                                <svg class="w-6 h-6 text-gray-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path v-if="!showingNavigationDropdown" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                                    <path v-else stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Mobile Navigation -->
                <div v-if="showingNavigationDropdown" class="md:hidden">
                    <div class="px-4 pt-4 pb-6 space-y-3 bg-white/95 backdrop-blur-md rounded-2xl mt-4 shadow-lg border border-gray-200/50">
                        <!-- Mobile Search -->
                        <form :action="route('shop.search')" method="GET" class="mb-4">
                            <div class="relative">
                                <input
                                    type="text"
                                    name="q"
                                    placeholder="Search products..."
                                    class="w-full px-4 py-3 pl-12 pr-4 bg-gray-50 border border-gray-200 rounded-2xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent focus:bg-white transition-all duration-300"
                                />
                                <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                    <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                    </svg>
                                </div>
                            </div>
                        </form>
                        
                        <Link
                            :href="route('shop.index')"
                            class="block px-4 py-3 text-gray-700 hover:text-blue-600 hover:bg-blue-50 rounded-xl text-base font-semibold transition-all duration-300"
                        >
                            Home
                        </Link>
                        <Link
                            :href="route('shop.category', 'men')"
                            class="block px-4 py-3 text-gray-700 hover:text-blue-600 hover:bg-blue-50 rounded-xl text-base font-semibold transition-all duration-300"
                        >
                            Men
                        </Link>
                        <Link
                            :href="route('shop.category', 'women')"
                            class="block px-4 py-3 text-gray-700 hover:text-blue-600 hover:bg-blue-50 rounded-xl text-base font-semibold transition-all duration-300"
                        >
                            Women
                        </Link>
                        <Link
                            :href="route('shop.category', 'children')"
                            class="block px-4 py-3 text-gray-700 hover:text-blue-600 hover:bg-blue-50 rounded-xl text-base font-semibold transition-all duration-300"
                        >
                            Children
                        </Link>
                        <Link
                            :href="route('cart.index')"
                            class="block px-4 py-3 text-gray-700 hover:text-blue-600 hover:bg-blue-50 rounded-xl text-base font-semibold transition-all duration-300"
                        >
                            Cart
                        </Link>
                    </div>
                </div>
            </div>
        </nav>

        <!-- Page Content -->
        <main>
            <slot />
        </main>

        <!-- Footer -->
        <footer class="bg-gradient-to-br from-gray-900 via-gray-800 to-gray-900 text-white py-16">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                    <div>
                        <div class="flex items-center mb-6">
                            <div class="w-10 h-10 bg-gradient-to-br from-blue-600 to-purple-600 rounded-xl flex items-center justify-center mr-3">
                                <span class="text-white font-bold text-lg">w</span>
                            </div>
                            <span class="text-2xl font-bold bg-gradient-to-r from-blue-400 to-purple-400 bg-clip-text text-transparent">wshop</span>
                        </div>
                        <p class="text-gray-400 leading-relaxed">
                            Your one-stop destination for stylish and comfortable clothing for everyone. Discover the latest trends and premium quality fashion.
                        </p>
                    </div>
                    <div>
                        <h4 class="text-lg font-bold mb-6 text-white">Categories</h4>
                        <ul class="space-y-3 text-gray-400">
                            <li><Link :href="route('shop.category', 'men')" class="hover:text-blue-400 transition-colors duration-300">Men's Collection</Link></li>
                            <li><Link :href="route('shop.category', 'women')" class="hover:text-blue-400 transition-colors duration-300">Women's Collection</Link></li>
                            <li><Link :href="route('shop.category', 'children')" class="hover:text-blue-400 transition-colors duration-300">Children's Collection</Link></li>
                        </ul>
                    </div>
                    <div>
                        <h4 class="text-lg font-bold mb-6 text-white">Customer Service</h4>
                        <ul class="space-y-3 text-gray-400">
                            <li><a href="#" class="hover:text-blue-400 transition-colors duration-300">Contact Us</a></li>
                            <li><a href="#" class="hover:text-blue-400 transition-colors duration-300">Shipping Info</a></li>
                            <li><a href="#" class="hover:text-blue-400 transition-colors duration-300">Returns & Exchanges</a></li>
                            <li><a href="#" class="hover:text-blue-400 transition-colors duration-300">Size Guide</a></li>
                        </ul>
                    </div>
                    <div>
                        <h4 class="text-lg font-bold mb-6 text-white">Follow Us</h4>
                        <p class="text-gray-400 mb-4">Stay updated with our latest collections and offers.</p>
                        <div class="flex space-x-4">
                            <a href="#" class="w-10 h-10 bg-gray-800 rounded-xl flex items-center justify-center text-gray-400 hover:text-blue-400 hover:bg-gray-700 transition-all duration-300">
                                <span class="sr-only">Facebook</span>
                                <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24">
                                    <path fill-rule="evenodd" d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z" clip-rule="evenodd" />
                                </svg>
                            </a>
                            <a href="#" class="w-10 h-10 bg-gray-800 rounded-xl flex items-center justify-center text-gray-400 hover:text-pink-400 hover:bg-gray-700 transition-all duration-300">
                                <span class="sr-only">Instagram</span>
                                <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24">
                                    <path fill-rule="evenodd" d="M12.315 2c2.43 0 2.784.013 3.808.06 1.064.049 1.791.218 2.427.465a4.902 4.902 0 011.772 1.153 4.902 4.902 0 011.153 1.772c.247.636.416 1.363.465 2.427.048 1.067.06 1.407.06 4.123v.08c0 2.643-.012 2.987-.06 4.043-.049 1.064-.218 1.791-.465 2.427a4.902 4.902 0 01-1.153 1.772 4.902 4.902 0 01-1.772 1.153c-.636.247-1.363.416-2.427.465-1.067.048-1.407.06-4.123.06h-.08c-2.643 0-2.987-.012-4.043-.06-1.064-.049-1.791-.218-2.427-.465a4.902 4.902 0 01-1.772-1.153 4.902 4.902 0 01-1.153-1.772c-.247-.636-.416-1.363-.465-2.427-.047-1.024-.06-1.379-.06-3.808v-.63c0-2.43.013-2.784.06-3.808.049-1.064.218-1.791.465-2.427a4.902 4.902 0 011.153-1.772A4.902 4.902 0 015.45 2.525c.636-.247 1.363-.416 2.427-.465C8.901 2.013 9.256 2 11.685 2h.63zm-.081 1.802h-.468c-2.456 0-2.784.011-3.807.058-.975.045-1.504.207-1.857.344-.467.182-.8.398-1.15.748-.35.35-.566.683-.748 1.15-.137.353-.3.882-.344 1.857-.047 1.023-.058 1.351-.058 3.807v.468c0 2.456.011 2.784.058 3.807.045.975.207 1.504.344 1.857.182.466.399.8.748 1.15.35.35.683.566 1.15.748.353.137.882.3 1.857.344 1.054.048 1.37.058 4.041.058h.08c2.597 0 2.917-.01 3.96-.058.976-.045 1.505-.207 1.858-.344.466-.182.8-.398 1.15-.748.35-.35.566-.683.748-1.15.137-.353.3-.882.344-1.857.048-1.055.058-1.37.058-4.041v-.08c0-2.597-.01-2.917-.058-3.96-.045-.976-.207-1.505-.344-1.858a3.097 3.097 0 00-.748-1.15 3.098 3.098 0 00-1.15-.748c-.353-.137-.882-.3-1.857-.344-1.023-.047-1.351-.058-3.807-.058zM12 6.865a5.135 5.135 0 110 10.27 5.135 5.135 0 010-10.27zm0 1.802a3.333 3.333 0 100 6.666 3.333 3.333 0 000-6.666zm5.338-3.205a1.2 1.2 0 110 2.4 1.2 1.2 0 010-2.4z" clip-rule="evenodd" />
                                </svg>
                            </a>
                            <a href="#" class="w-10 h-10 bg-gray-800 rounded-xl flex items-center justify-center text-gray-400 hover:text-blue-400 hover:bg-gray-700 transition-all duration-300">
                                <span class="sr-only">Twitter</span>
                                <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M8.29 20.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0022 5.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.072 4.072 0 012.8 9.713v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 012 18.407a11.616 11.616 0 006.29 1.84" />
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="mt-12 pt-8 border-t border-gray-800 text-center">
                    <p class="text-gray-400">&copy; 2024 wshop. All rights reserved. | Made with ❤️ for fashion lovers</p>
                </div>
            </div>
        </footer>
    </div>
</template> 