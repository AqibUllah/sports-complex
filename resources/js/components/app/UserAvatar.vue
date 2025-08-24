<script setup lang="ts">

import { Link, usePage } from '@inertiajs/vue3';
import { ref } from 'vue';

const page = usePage();
const user = page.props.auth.user;
const menuOpen = ref(false)


const isOpen = ref(false)
</script>

<template>
    <div class="relative">
        <!-- Avatar Button -->
        <button
            @click="isOpen = !isOpen"
            class="flex items-center focus:outline-none"
            aria-label="User menu"
        >
            <img
                :src="user.avatar || 'https://ui-avatars.com/api/?name=' + user.name"
                alt="User avatar"
                class="h-10 w-10 rounded-full object-cover"
            />
        </button>

        <!-- Dropdown Menu -->
        <transition
            enter-active-class="transition ease-out duration-100"
            enter-from-class="transform opacity-0 scale-95"
            enter-to-class="transform opacity-100 scale-100"
            leave-active-class="transition ease-in duration-75"
            leave-from-class="transform opacity-100 scale-100"
            leave-to-class="transform opacity-0 scale-95"
        >
            <div
                v-if="isOpen"
                class="absolute right-0 mt-2 sm:w-full md:w-48 rounded-md shadow-lg py-1 bg-white dark:bg-gray-900 ring-1 ring-black ring-opacity-5"
                role="menu"
                aria-orientation="vertical"
            >
                <Link
                    :href="route('dashboard')"
                    class="block px-4 py-2 text-sm text-gray-700 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800"
                    role="menuitem"
                >
                    Dashboard
                </Link>
                <Link
                    :href="route('logout')"
                    method="post"
                    as="button"
                    class="block w-full text-left px-4 py-2 text-sm text-gray-700 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800"
                    role="menuitem"
                >
                    Logout
                </Link>
            </div>
        </transition>
    </div>
</template>

<style scoped>

</style>
