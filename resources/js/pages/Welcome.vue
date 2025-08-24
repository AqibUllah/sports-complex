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

        <div class="hidden h-14.5 lg:block"></div>

    </div>
</template>
