<script setup lang="ts">

import footballImage from '@images/categories/football.jpg';
import cricketImage from '@images/categories/cricket.jpg';
import gymImage from '@images/categories/gym.jpg';
import swimmingImage from '@images/categories/swimming.jpg';
import kidsImage from '@images/categories/kids-2.jpg'; // Assume you have an image for Kids Area
import { Card,CardTitle,CardContent,CardHeader,CardFooter,CardAction } from '@/components/ui/card'; // Assume Kids Zone image exists

const facilities = [
    {
        title: 'Football',
        bookingType: 'Hourly Bookings',
        image: footballImage,
        href: 'booking.football',
    },
    {
        title: 'Cricket',
        bookingType: 'Hourly Bookings',
        image: cricketImage,
        href: 'booking.cricket',
    },
    {
        title: 'Kids Area',
        bookingType: 'Per-Visit Access',
        image: kidsImage,
        href: 'booking.kids',
    },
    {
        title: 'Swimming',
        bookingType: 'Per-Visit / Membership / Custom Time',
        image: swimmingImage,
        href: 'booking.swimming',
    },
    {
        title: 'Gym',
        bookingType: 'Per-Visit / Membership',
        image: gymImage,
        href: 'booking.gym',
    },
];
</script>

<template>
    <section class="py-12 w-full bg-gray-100 dark:bg-gray-800 text-gray-800 dark:text-white">
        <div class="max-w-8xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Heading -->
            <div class="text-center mb-8">
                <h1 class="text-3xl font-bold sm:text-4xl md:text-4xl">Booking Options</h1>
                <p class="mt-2 md:text-lg sm:text-sm">
                    Choose your preferred facility and booking type to get started.
                </p>
            </div>

            <!-- Facility Cards -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                <Card v-for="facility in facilities"
                      :key="facility.title"
                      class="bg-white/10 backdrop-blur-lg shadow-md rounded-xl overflow-hidden hover:scale-105 transition-transform duration-300"
                >
                    <CardContent>
                        <img
                            :src="facility.image"
                            :alt="facility.title"
                            class="w-full h-32 object-cover"
                        />
                        <div class="p-4 sm:p-6">
                            <h3 class="text-lg sm:text-xl font-semibold mb-2">{{ facility.title }}</h3>
                            <p class="text-xs text-primary-dark font-bold sm:text-base text-gray-100 mb-4">
                                {{ facility.bookingType }}
                            </p>
                            <Link
                                :href="'#'"
                                class="bg-primary-dark cursor-pointer text-white px-3 py-1.5 sm:px-4 sm:py-2 rounded-md hover:bg-primary-light text-sm sm:text-base inline-block"
                            >
                                Book Now
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
