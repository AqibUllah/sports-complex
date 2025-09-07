<script setup lang="ts">

import { ref } from 'vue';
import { Link } from '@inertiajs/vue3';
import footballImage from '@images/categories/football.jpg';
import cricketImage from '@images/categories/cricket.jpg';
import gymImage from '@images/categories/gym.jpg';
import swimmingImage from '@images/categories/swimming.jpg';
import { Card,CardContent } from '@/components/ui/card'; // Assume Kids Zone image exists
import { Icon } from "@iconify/vue";

// Reactive state for selected sport tab
const selectedSport = ref('Football');

// Venue data for each sport
const venues = {
    Football: [
        {
            title: 'Football A',
            price: 'RS800',
            rating: 4.7,
            description: 'Premium turf field with floodlights, ideal for competitive matches and training sessions.',
            image: footballImage,
            href: 'venue.football-a',
        },
        {
            title: 'Football B',
            price: 'RS800',
            rating: 4.5,
            description: 'Spacious field with high-quality turf, perfect for casual games and team practice.',
            image: footballImage,
            href: 'venue.football-b',
        },
        {
            title: 'Football C',
            price: 'RS1200',
            rating: 4.8,
            description: 'Spacious field with high-quality turf, perfect for casual games and team practice.',
            image: footballImage,
            href: 'venue.football-c',
        },
    ],
    Cricket: [
        {
            title: 'Cricket Pitch A',
            price: 'RS1500',
            rating: 4.8,
            description: 'Professional-grade cricket pitch with excellent drainage and lighting.',
            image: cricketImage,
            href: 'venue.cricket-a',
        },
        {
            title: 'Cricket Pitch B',
            price: 'RS1000',
            rating: 4.1,
            description: 'Professional-grade cricket pitch with excellent drainage and lighting.',
            image: cricketImage,
            href: 'venue.cricket-a',
        },
        {
            title: 'Cricket Pitch C',
            price: 'RS800',
            rating: 3.9,
            description: 'Professional-grade cricket pitch with excellent drainage and lighting.',
            image: cricketImage,
            href: 'venue.cricket-a',
        },
    ],
    Gym: [
        {
            title: 'Gym Studio A',
            price: 'RS1100',
            rating: 4.4,
            description: 'State-of-the-art gym with modern equipment and personal training options.',
            image: gymImage,
            href: 'venue.gym-a',
        },
        {
            title: 'Gym Studio B',
            price: 'RS700',
            rating: 4.1,
            description: 'State-of-the-art gym with modern equipment and personal training options.',
            image: gymImage,
            href: 'venue.gym-a',
        },
        {
            title: 'Gym Studio C',
            price: 'RS500',
            rating: 3.9,
            description: 'State-of-the-art gym with modern equipment and personal training options.',
            image: gymImage,
            href: 'venue.gym-a',
        },
    ],
    Swimming: [
        {
            title: 'Swimming Pool A',
            price: 'RS1800',
            rating: 4.4,
            description: 'Olympic-sized pool with heated water and professional lifeguards.',
            image: swimmingImage,
            href: 'venue.swimming-a',
        },
        {
            title: 'Swimming Pool B',
            price: 'RS1300',
            rating: 4.1,
            description: 'Olympic-sized pool with heated water and professional lifeguards.',
            image: swimmingImage,
            href: 'venue.swimming-a',
        },
        {
            title: 'Swimming Pool C',
            price: 'RS900',
            rating: 3.7,
            description: 'Olympic-sized pool with heated water and professional lifeguards.',
            image: swimmingImage,
            href: 'venue.swimming-a',
        },
    ],
};

// Function to switch tabs
const selectSport = (sport: string) => {
    selectedSport.value = sport;
};
</script>

<template>
    <section class="py-12 w-full bg-gray-100 dark:bg-gray-900 text-gray-800 dark:text-white" id="venues">
        <div class="max-w-8xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Heading -->
            <div class="text-center mb-8">
                <h1 class="text-3xl font-bold sm:text-4xl md:text-4xl">Our Venues</h1>
                <p class="mt-2 md:text-lg sm:text-sm">
                    Explore our top-notch facilities for your favorite sports and activities.
                </p>
            </div>

            <!-- Tabs -->
            <div class="flex justify-center space-x-2 sm:space-x-4 mb-8">
                <button
                    v-for="sport in Object.keys(venues)"
                    :key="sport"
                    @click="selectSport(sport)"
                    :class="[
                    'px-3 py-1.5 sm:px-4 sm:py-2 md:px-8 md:py-2.5 text-sm sm:text-base md:text-lg font-semibold rounded-md transition-colors duration-200',
                        selectedSport === sport
                          ? 'bg-primary-dark text-white'
                          : 'bg-transparent border border-primary-dark text-primary-dark hover:bg-primary-dark/10',
                      ]"
                    >
                    {{ sport }}
                </button>
            </div>

            <!-- Venue Cards -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 place-items-center gap-4">
                <Card
                    v-for="venue in venues[selectedSport]"
                    :key="venue.title"
                    class="bg-gray-100 backdrop-blur-lg shadow-md rounded-xl overflow-hidden transition-transform duration-300 card-hover flex flex-col h-full"
                    >
                    <CardContent>
                        <div class="flex-1">
                            <div class="flex">
                                <img
                                    :src="venue.image"
                                    :alt="venue.title"
                                    class="w-1/2 h-46 object-cover"
                                />
                                <div class="w-full">
                                    <div class="p-2 flex-1">
                                        <h3 class="text-md sm:text-lg font-semibold mb-2 text-gray-800">{{ venue.title }}</h3>
                                        <div class="flex items-center justify-between mb-2  border border-primary-dark px-2 rounded-md max-w-[60px]">
                                            <svg
                                                class="w-5 h-5 text-yellow-400 mr-1"
                                                fill="currentColor"
                                                viewBox="0 0 20 20"
                                            >
                                                <path
                                                    d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"
                                                />
                                            </svg>
                                            <span class="text-sm sm:text-base text-gray-500">{{ venue.rating }}</span>
                                        </div>
                                        <p class="text-xs sm:text-sm text-gray-600 mb-4 line-clamp-2">
                                            {{ venue.description }}
                                        </p>
                                        <span class="md:text-4xl text-gray-600 sm:text-base mb-4">{{ venue.price }}<span class="text-lg">/hr</span></span>
                                    </div>
                                </div>
                            </div>
                            <Link
                                :href="'#'"
                                class="mt-auto bg-primary-dark hover:bg-primary-light transition-all duration-300 text-gray-100 px-4 py-3 flex items-center justify-between"
                                >
                                <span>Book Now</span>
                                <Icon icon="line-md:chevron-small-double-right" class="text-gray-100" width="25" height="25" />
                            </Link>
                        </div>
                    </CardContent>
                </Card>
            </div>
        </div>
    </section>
</template>

<style scoped>
    img {
        transform-origin: center center;
    }
</style>
