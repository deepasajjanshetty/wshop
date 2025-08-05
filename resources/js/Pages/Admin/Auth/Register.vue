<script setup>
import { Head, Link, useForm } from '@inertiajs/vue3';

defineProps({
    auth: {
        type: Object,
    },
});

const form = useForm({
    name: '',
    email: '',
    password: '',
    password_confirmation: '',
    admin_code: '',
});

const submit = () => {
    form.post(route('admin.register'), {
        onFinish: () => form.reset('password', 'password_confirmation'),
    });
};
</script>

<template>
    <Head title="Admin Registration" />

    <!-- Hero Section -->
    <div class="relative min-h-screen flex items-center justify-center overflow-hidden cursor-default">
        <!-- Background with geometric pattern -->
        <div class="absolute inset-0 bg-gradient-to-br from-gray-900 via-slate-800 to-gray-900"></div>
        
        <!-- Geometric pattern overlay -->
        <div class="absolute inset-0 opacity-20">
            <div class="absolute inset-0" style="background-image: url('data:image/svg+xml,%3Csvg width=\'60\' height=\'60\' viewBox=\'0 0 60 60\' xmlns=\'http://www.w3.org/2000/svg\'%3E%3Cg fill=\'none\' fill-rule=\'evenodd\'%3E%3Cg fill=\'%23ffffff\' fill-opacity=\'0.1\'%3E%3Ccircle cx=\'30\' cy=\'30\' r=\'2\'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E');"></div>
        </div>
        
        <!-- Animated background elements -->
        <div class="absolute inset-0">
            <div class="absolute top-20 left-20 w-72 h-72 bg-gray-600 rounded-full mix-blend-multiply filter blur-xl opacity-70 animate-blob"></div>
            <div class="absolute top-40 right-20 w-72 h-72 bg-slate-500 rounded-full mix-blend-multiply filter blur-xl opacity-70 animate-blob animation-delay-2000"></div>
            <div class="absolute -bottom-8 left-40 w-72 h-72 bg-zinc-500 rounded-full mix-blend-multiply filter blur-xl opacity-70 animate-blob animation-delay-4000"></div>
        </div>

        <!-- Register Form -->
        <div class="relative z-10 w-full max-w-md">
            <div class="bg-white/10 backdrop-blur-md rounded-3xl shadow-2xl border border-white/20 p-8">
                <!-- Header -->
                <div class="text-center mb-8">
                    <div class="flex items-center justify-center mb-6">
                        <div class="w-12 h-12 bg-gradient-to-br from-gray-700 to-slate-800 rounded-xl flex items-center justify-center mr-3">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"></path>
                            </svg>
                        </div>
                        <span class="text-3xl font-bold bg-gradient-to-r from-white to-gray-300 bg-clip-text text-transparent">Admin Registration</span>
                    </div>
                    <h1 class="text-2xl font-bold text-white mb-2">Create Admin Account</h1>
                    <p class="text-white/70">Register as an administrator to manage your store</p>
                </div>

                <!-- Register Form -->
                <form @submit.prevent="submit" class="space-y-6">
                    <div>
                        <label for="name" class="block text-sm font-semibold text-white/90 mb-2">
                            Full Name
                        </label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                <svg class="w-5 h-5 text-white/50" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                </svg>
                            </div>
                            <input
                                id="name"
                                type="text"
                                v-model="form.name"
                                required
                                autofocus
                                autocomplete="name"
                                class="w-full pl-12 pr-4 py-4 bg-white/10 backdrop-blur-sm border border-white/20 rounded-2xl text-white placeholder-white/50 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:border-transparent transition-all duration-300"
                                placeholder="Enter your full name"
                            />
                        </div>
                        <div v-if="form.errors.name" class="text-red-300 text-sm mt-2">
                            {{ form.errors.name }}
                        </div>
                    </div>

                    <div>
                        <label for="email" class="block text-sm font-semibold text-white/90 mb-2">
                            Email Address
                        </label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                <svg class="w-5 h-5 text-white/50" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207"></path>
                                </svg>
                            </div>
                            <input
                                id="email"
                                type="email"
                                v-model="form.email"
                                required
                                autocomplete="username"
                                class="w-full pl-12 pr-4 py-4 bg-white/10 backdrop-blur-sm border border-white/20 rounded-2xl text-white placeholder-white/50 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:border-transparent transition-all duration-300"
                                placeholder="Enter admin email"
                            />
                        </div>
                        <div v-if="form.errors.email" class="text-red-300 text-sm mt-2">
                            {{ form.errors.email }}
                        </div>
                    </div>

                    <div>
                        <label for="password" class="block text-sm font-semibold text-white/90 mb-2">
                            Password
                        </label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                <svg class="w-5 h-5 text-white/50" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                                </svg>
                            </div>
                            <input
                                id="password"
                                type="password"
                                v-model="form.password"
                                required
                                autocomplete="new-password"
                                class="w-full pl-12 pr-4 py-4 bg-white/10 backdrop-blur-sm border border-white/20 rounded-2xl text-white placeholder-white/50 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:border-transparent transition-all duration-300"
                                placeholder="Create admin password"
                            />
                        </div>
                        <div v-if="form.errors.password" class="text-red-300 text-sm mt-2">
                            {{ form.errors.password }}
                        </div>
                    </div>

                    <div>
                        <label for="password_confirmation" class="block text-sm font-semibold text-white/90 mb-2">
                            Confirm Password
                        </label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                <svg class="w-5 h-5 text-white/50" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </div>
                            <input
                                id="password_confirmation"
                                type="password"
                                v-model="form.password_confirmation"
                                required
                                autocomplete="new-password"
                                class="w-full pl-12 pr-4 py-4 bg-white/10 backdrop-blur-sm border border-white/20 rounded-2xl text-white placeholder-white/50 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:border-transparent transition-all duration-300"
                                placeholder="Confirm admin password"
                            />
                        </div>
                    </div>

                    <div>
                        <label for="admin_code" class="block text-sm font-semibold text-white/90 mb-2">
                            Admin Registration Code
                        </label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                <svg class="w-5 h-5 text-white/50" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                                </svg>
                            </div>
                            <input
                                id="admin_code"
                                type="password"
                                v-model="form.admin_code"
                                required
                                class="w-full pl-12 pr-4 py-4 bg-white/10 backdrop-blur-sm border border-white/20 rounded-2xl text-white placeholder-white/50 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:border-transparent transition-all duration-300"
                                placeholder="Enter admin registration code"
                            />
                        </div>
                        <div v-if="form.errors.admin_code" class="text-red-300 text-sm mt-2">
                            {{ form.errors.admin_code }}
                        </div>
                        <p class="text-xs text-white/50 mt-2">
                            You need the admin registration code to create an admin account.
                        </p>
                    </div>

                    <button
                        type="submit"
                        :disabled="form.processing"
                        class="w-full bg-gradient-to-r from-gray-700 to-slate-800 text-white py-4 px-6 rounded-2xl font-semibold hover:from-gray-800 hover:to-slate-900 disabled:opacity-50 disabled:cursor-not-allowed transition-all duration-300 transform hover:scale-105 shadow-lg"
                    >
                        <span v-if="form.processing" class="flex items-center justify-center">
                            <svg class="animate-spin -ml-1 mr-3 h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                            </svg>
                            Creating account...
                        </span>
                        <span v-else>Create Admin Account</span>
                    </button>
                </form>

                <!-- Divider -->
                <div class="my-8 flex items-center">
                    <div class="flex-1 border-t border-white/20"></div>
                    <span class="px-4 text-sm text-white/50">or</span>
                    <div class="flex-1 border-t border-white/20"></div>
                </div>

                <!-- Login Link -->
                <div class="text-center">
                    <p class="text-white/70 text-sm">
                        Already have an admin account? 
                        <Link :href="route('admin.login')" class="text-gray-300 hover:text-gray-200 font-semibold transition-colors duration-300">
                            Sign in here
                        </Link>
                    </p>
                </div>

                <!-- Back to Shop -->
                <div class="mt-6 text-center">
                    <Link :href="route('shop.index')" class="text-white/50 hover:text-white/70 text-sm transition-colors duration-300">
                        ← Back to Shop
                    </Link>
                </div>
            </div>
        </div>
    </div>
</template>

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