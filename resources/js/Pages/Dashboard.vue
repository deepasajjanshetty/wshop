<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';

defineProps({
    auth: {
        type: Object,
    },
});
</script>

<template>
    <Head title="User Dashboard" />

    <AuthenticatedLayout>
        <template #header>
            <h2
                class="text-xl font-semibold leading-tight text-gray-800"
            >
                User Dashboard
            </h2>
        </template>

        <div class="py-12">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div
                    class="overflow-hidden bg-white shadow-sm sm:rounded-lg"
                >
                    <div class="p-6 text-gray-900">
                        <h3 class="text-2xl font-semibold mb-4">Welcome, {{ auth.user.name }}!</h3>
                        <p class="text-gray-600 mb-6">This is your personal user dashboard. You are logged in as a regular user.</p>
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                            <!-- User Stats Card -->
                            <div class="bg-blue-50 p-6 rounded-lg">
                                <h4 class="text-lg font-semibold text-blue-900 mb-2">Your Profile</h4>
                                <p class="text-blue-600">Manage your account settings</p>
                            </div>

                            <!-- User Stats Card -->
                            <div class="bg-green-50 p-6 rounded-lg">
                                <h4 class="text-lg font-semibold text-green-900 mb-2">Your Activities</h4>
                                <p class="text-green-600">View your recent activities</p>
                            </div>

                            <!-- User Stats Card -->
                            <div class="bg-purple-50 p-6 rounded-lg">
                                <h4 class="text-lg font-semibold text-purple-900 mb-2">Your Settings</h4>
                                <p class="text-purple-600">Customize your preferences</p>
                            </div>
                        </div>

                        <div class="mt-8 p-4 bg-yellow-50 border border-yellow-200 rounded-lg">
                            <h4 class="text-lg font-semibold text-yellow-800 mb-2">User Information</h4>
                            <p class="text-yellow-700">
                                <strong>Email:</strong> {{ auth.user.email }}<br>
                                <strong>Role:</strong> {{ auth.user.role }}<br>
                                <strong>Member since:</strong> {{ new Date(auth.user.created_at).toLocaleDateString() }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
