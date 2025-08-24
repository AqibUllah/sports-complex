<script setup lang="ts">
import { Head, Link } from '@inertiajs/vue3';
import Header from '@/components/app/Header.vue';
import VideoIntroSection from '@/sections/VideoIntroSection.vue';
import FeaturesCategoriesSection from '@/sections/FeaturesCategoriesSection.vue';
import VenuesSection from '@/sections/VenuesSection.vue';
import BookingOptionsSection from '@/sections/BookingOptionsSection.vue';
import MembershipAndPricingSection from '@/sections/MembershipAndPricingSection.vue';
import GallerySection from '@/sections/GallerySection.vue';

</script>

<template>
    <Head title="Welcome">
        <link rel="preconnect" href="https://rsms.me/" />
        <link rel="stylesheet" href="https://rsms.me/inter/inter.css" />
    </Head>
    <div class="flex min-h-screen flex-col items-center bg-[#FDFDFC] text-[#1b1b18] lg:justify-center dark:bg-[#0a0a0a]">
        <Header />

        <!-- First Section: Video Intro Section -->
        <VideoIntroSection />

        <!-- Second Section: Features/Categories -->
        <FeaturesCategoriesSection />

        <!-- Third Section: Second Section -->
        <VenuesSection />

        <!-- Fourth Section: Bookings Section -->
        <BookingOptionsSection />

        <!-- Fifth Section: Membership And Pricing Section -->
        <MembershipAndPricingSection />

        <!-- Sixth Section: Gallery Section -->
        <GallerySection />
            <!-- Main Content -->
<!--            <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">-->
<!--                <section class="text-center">-->
<!--                    <h2 class="text-3xl font-semibold text-primary-700">Explore Our Facilities</h2>-->
<!--                    <p class="mt-4 text-gray-600">Start your journey with us today.</p>-->
<!--                    <button-->
<!--                        class="mt-6 px-6 py-2 bg-primary-500 text-white rounded-md hover:bg-primary-dark focus:outline-none focus:ring-2 focus:ring-primary-500 focus:ring-opacity-50"-->
<!--                    >-->
<!--                        Book a Tour-->
<!--                    </button>-->
<!--                </section>-->
<!--            </main>-->
        <div class="hidden h-14.5 lg:block"></div>
    </div>
</template>
