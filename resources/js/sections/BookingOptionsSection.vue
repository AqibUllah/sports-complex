<script setup lang="ts">

import footballImage from '@images/categories/football.jpg';
import cricketImage from '@images/categories/cricket.jpg';
import gymImage from '@images/categories/gym.jpg';
import swimmingImage from '@images/categories/swimming.jpg';
import kidsImage from '@images/categories/kids-2.jpg'; // Assume you have an image for Kids Area
import { Icon } from "@iconify/vue";

const facilities = [
    {
        title: 'Football',
        bookingType: 'Hourly Bookings',
        image: footballImage,
        href: 'booking.football',
        icon:'material-symbols:sports-football-outline'
    },
    {
        title: 'Cricket',
        bookingType: 'Hourly Bookings',
        image: cricketImage,
        href: 'booking.cricket',
        icon:'material-symbols:sports-cricket-outline'
    },
    {
        title: 'Kids Area',
        bookingType: 'Per-Visit Access',
        image: kidsImage,
        href: 'booking.kids',
        icon:'material-symbols:bedroom-baby-outline-rounded'
    },
    {
        title: 'Swimming',
        bookingType: 'Per-Visit / Membership / Custom Time',
        image: swimmingImage,
        href: 'booking.swimming',
        icon:'material-symbols:water'
    },
    {
        title: 'Gym',
        bookingType: 'Per-Visit / Membership',
        image: gymImage,
        href: 'booking.gym',
        icon:'material-symbols:sports-gymnastics-rounded'
    },
];
</script>

<template>
<!--    <section class="py-12 w-full bg-gray-100 dark:bg-gray-800 text-gray-800 dark:text-white">-->
<!--        <div class="max-w-8xl mx-auto px-4 sm:px-6 lg:px-8">-->
<!--            &lt;!&ndash; Heading &ndash;&gt;-->
<!--            <div class="text-center mb-8">-->
<!--                <h1 class="text-3xl font-bold sm:text-4xl md:text-4xl">Booking Options</h1>-->
<!--                <p class="mt-2 md:text-lg sm:text-sm">-->
<!--                    Choose your preferred facility and booking type to get started.-->
<!--                </p>-->
<!--            </div>-->

<!--            &lt;!&ndash; Facility Cards &ndash;&gt;-->
<!--            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">-->
<!--                <Card v-for="facility in facilities"-->
<!--                      :key="facility.title"-->
<!--                      class="bg-white/10 backdrop-blur-lg shadow-md rounded-xl overflow-hidden hover:scale-105 transition-transform duration-300"-->
<!--                >-->
<!--                    <CardContent>-->
<!--                        <img-->
<!--                            :src="facility.image"-->
<!--                            :alt="facility.title"-->
<!--                            class="w-full h-32 object-cover"-->
<!--                        />-->
<!--                        <div class="p-4 sm:p-6">-->
<!--                            <h3 class="text-lg sm:text-xl font-semibold mb-2">{{ facility.title }}</h3>-->
<!--                            <p class="text-xs text-primary-dark font-bold sm:text-base text-gray-100 mb-4">-->
<!--                                {{ facility.bookingType }}-->
<!--                            </p>-->
<!--                            <Link-->
<!--                                :href="'#'"-->
<!--                                class="bg-primary-dark cursor-pointer text-white px-3 py-1.5 sm:px-4 sm:py-2 rounded-md hover:bg-primary-light text-sm sm:text-base inline-block"-->
<!--                            >-->
<!--                                Book Now-->
<!--                            </Link>-->
<!--                        </div>-->
<!--                    </CardContent>-->
<!--                </Card>-->
<!--            </div>-->
<!--        </div>-->
<!--    </section>-->

    <!-- Booking Options Section -->
    <section class="py-12 w-full bg-gray-800" id="booking_options">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Heading -->
            <div class="text-center mb-12">
                <h1 class="text-3xl font-bold sm:text-4xl md:text-5xl text-gray-100">Booking Options</h1>
                <p class="mt-4 text-lg text-gray-600 dark:text-gray-400 max-w-2xl mx-auto">
                    Choose your preferred facility and booking type to get started.
                </p>
            </div>

            <!-- Facility Cards - Redesigned -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <!-- Football Card -->
                <div v-for="facility in facilities"
                      :key="facility.title" class="booking-card bg-white rounded-xl p-6 shadow-sm border-l-4 border-l-green-500">
                    <div class="flex items-start justify-between mb-4">
                        <div class="booking-icon bg-orange-300 p-3 rounded-lg">
                            <i class="fas fa-futbol text-green-600 text-xl"></i>
                            <Icon :icon="facility.icon" width="32" height="32" />

                        </div>
                        <span class="badge bg-green-100 text-green-800 text-xs font-medium px-2.5 py-0.5 rounded">Popular</span>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 mb-2">{{ facility.title }}</h3>
                    <p class="text-gray-600 text-sm mb-4 line-clamp-2">Hourly bookings available for individuals and teams</p>
                    <div class="flex items-center justify-between">
                        <span class="text-primary-dark font-medium">Hourly Bookings</span>
                        <button class="bg-primary-dark cursor-pointer text-white px-4 py-2 rounded-lg text-sm hover:bg-primary-light transition-colors">
                            Book Now
                        </button>
                    </div>
                </div>


                <!-- Special Offer Card -->
                <div class="booking-card bg-gradient-to-r from-primary to-primary-dark rounded-xl p-6 shadow-sm ">
                    <div class="flex items-start justify-between mb-4">
                        <div class="booking-icon bg-white bg-opacity-20 p-3 rounded-lg">
                            <i class="fas fa-star text-xl"></i>
                            <Icon icon="material-symbols:more-horiz" />

                        </div>
                    </div>
                    <h3 class="text-xl font-semibold mb-2">Special Package</h3>
                    <p class="text-opacity-80 text-sm mb-4">Get access to multiple facilities with our premium membership</p>
                    <div class="flex items-center justify-between">
                        <span class="font-medium">All Facilities Access</span>
                        <button class="bg-white cursor-pointer text-primary-dark px-4 py-2 rounded-lg text-sm hover:bg-gray-100 transition-colors">
                            Learn More
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>

</template>

<style scoped>
    img {
        transform-origin: center center;
    }
    .booking-card {
            transition: all 0.3s ease;
            border-left: 4px solid;
        }

        .booking-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.1);
        }

        .booking-icon {
            transition: all 0.3s ease;
        }

        .booking-card:hover .booking-icon {
            transform: scale(1.1);
        }

        .badge {
            transition: all 0.3s ease;
        }

        .booking-card:hover .badge {
            background-color: #3730a3;
            color: white;
        }
</style>
