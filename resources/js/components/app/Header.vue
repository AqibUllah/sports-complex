<script setup lang="ts">
import { Link } from '@inertiajs/vue3';
import { ref, onMounted, onUnmounted } from 'vue';
import MenuItem from '@/components/MenuItem.vue';
import UserAvatar from '@/components/app/UserAvatar.vue';
import { Button } from '@/components/ui/button';

// const page = usePage();
// const user = page.props.auth.user;

const menuOpen = ref(false)

const toggleMenu = () => {
    menuOpen.value = !menuOpen.value
}


const scrolled = ref(false)

const handleScroll = () => {
    scrolled.value = window.scrollY > 20 // threshold
}

onMounted(() => {
    window.addEventListener("scroll", handleScroll)
})

onUnmounted(() => {
    window.removeEventListener("scroll", handleScroll)
})

const menus = [
    { route: 'home', name: 'Home', url: "#home" },
    { route: 'home', name: 'Venues', url: "#venues" },
    { route: 'home', name: 'Features & Categories', url: "#features_and_categories" },
    { route: 'home', name: 'Gallery', url: "#gallery" },
    { route: 'home', name: 'Booking Options', url: "#booking_options" },
    { route: 'home', name: 'Membership & Pricing', url: "#membership_and_pricing" },
    { route: 'home', name: 'Faqs', url: "#faq" },
]
</script>

<template>
    <header class="fixed top-0 left-0 text-gray-800 dark:text-white w-full z-50"
        :class="scrolled ? 'bg-gray-100 dark:bg-gray-800 shadow-md' : 'bg-transparent'">

        <!-- menus -->
        <div class="max-w-8xl mx-auto px-4 sm:px-6 lg:px-8 transition-all duration-300 ease-in-out "
             :class="scrolled ? 'py-0' : 'py-4'">
            <div class="flex justify-between items-center h-16">
                <!-- Logo/Brand -->
                <div class="flex-shrink-0">
                    <Link :href="route('home')">
                        <img src="@images/logos/2.png" alt="logo"
                             class="md:w-[200px] w-[134px] block dark:hidden" />
                        <!-- Dark logo -->
                        <img src="@images/logos/1.png" alt="logo"
                             class="md:w-[200px] w-[134px] hidden dark:block" />
                    </Link>
                </div>

                <!-- Navigation Links (Desktop) -->
                <nav class="hidden md:flex space-x-4">
                    <MenuItem v-for="menu in menus" :key="menu.name" :href="menu.route" :url="menu.url" :name="menu.name" />
                </nav>

                <!-- User Menu (Desktop) -->
                <div class="hidden md:flex items-center space-x-4">
                    <template v-if="$page.props.auth.user">
                        <UserAvatar />
                    </template>
                    <template v-else>
                        <Button class="bg-primary-dark cursor-pointer" size="lg" @click="$inertia.visit(route('login'))">Login</Button>
                        <Button variant="default" class="cursor-pointer" size="lg" @click="$inertia.visit(route('filament.admin.pages.dashboard'))">Admin Panel</Button>
                    </template>
                </div>

                <!-- Mobile Menu Button -->
                <div class="md:hidden">
                    <button
                        @click="toggleMenu"
                        class="hover:bg-gray-200 dark:hover:bg-gray-700 p-2 rounded-md focus:outline-none"
                        aria-label="Toggle menu"
                    >
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path v-if="!menuOpen" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7" />
                            <path v-else stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            </div>

            <!-- Mobile Menu -->
            <transition
                enter-active-class="transition ease-out duration-200"
                enter-from-class="transform opacity-0 scale-95"
                enter-to-class="transform opacity-100 scale-100"
                leave-active-class="transition ease-in duration-150"
                leave-from-class="transform opacity-100 scale-100"
                leave-to-class="transform opacity-0 scale-95"
            >
                <div v-show="menuOpen" class="md:hidden">
                    <nav class="flex flex-col space-y-2 px-4 pb-4 pt-2 bg-gray-100 dark:bg-gray-800 rounded-md">
                        <MenuItem v-for="menu in menus" :key="menu.name" :href="menu.route" :url="menu.url" :name="menu.name" />
                        <template v-if="$page.props.auth.user">
                            <UserAvatar />
                        </template>
                        <template v-else>
                            <Button class="bg-primary-dark cursor-pointer" size="lg" @click="$inertia.visit(route('login'))">Login</Button>
                            <Button variant="default" class="cursor-pointer" size="lg" @click="$inertia.visit(route('register'))">Register</Button>
                        </template>
                    </nav>
                </div>
            </transition>
        </div>
    </header>
</template>

<style scoped>

</style>
