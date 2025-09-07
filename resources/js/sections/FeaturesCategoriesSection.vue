<script setup lang="ts">

import gymImage from '@images/categories/gym.jpg';
import footballImage from '@images/categories/football.jpg';
import cricketImage from '@images/categories/cricket.jpg';
import swimmingImage from '@images/categories/swimming.jpg';
import { Swiper, SwiperSlide  } from 'swiper/vue';
import { Autoplay,EffectCoverflow,FreeMode } from 'swiper/modules';
const modules = [Autoplay,EffectCoverflow,FreeMode]
import 'swiper/css';

const breakpoints = {
    // when window width is <= 640px
    0: {
        slidesPerView: 1, // small devices
    },
    768: {
        slidesPerView: 2, // optional (tablets)
    },
    1024: {
        slidesPerView: 3, // larger screens
    }
}
const items = [
    {
        title: 'Football',
        description: 'Play on our state-of-the-art turf fields.Play on our state-of-the-art turf fields.Play on our state-of-the-art turf fields.Play on our state-of-the-art turf fields.Play on our state-of-the-art turf fields.Play on our state-of-the-art turf fields.',
        image:footballImage,
        href: 'home',
        icon: 'FootballIcon'
    },
    {
        title: 'Cricket',
        description: 'Play on our state-of-the-art turf fields.',
        image:cricketImage,
        href: 'home',
        icon: 'BasketballIcon'
    },
    {
        title: 'Gym',
        description: 'Play on our state-of-the-art turf fields.',
        image:gymImage,
        href: 'home',
        icon: 'FootballIcon'
    },
    {
        title: 'Swimming',
        description: 'Play on our state-of-the-art turf fields.',
        image:swimmingImage,
        href: 'home',
        icon: 'BasketballIcon'
    },
]
</script>

<template>
    <section class="py-12 w-full bg-gray-100 dark:bg-gray-800 text-gray-800 dark:text-white" id="features_and_categories">
        <div class="max-w-8xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Heading -->
            <div class="text-center mb-8">
                <h1 class="text-3xl font-bold sm:text-4xl md:text-4xl">Features & Categories</h1>
                <p class="mt-2 md:text-lg sm:text-sm">Your ultimate destination for sports and fitness. Book facilities, join memberships, and explore our categories.</p>
            </div>

            <!-- Categories Grid -->
            <swiper
                class="w-full mySwiper"
                :slides-per-view="1.5"
                :rewind="true"
                :autoplay="{
                    delay: 2500,
                    disableOnInteraction: false,
                }"
                :breakpoints="breakpoints"
                :loop="true"
                :freeMode="true"
                :effect="'coverflow'"
                :grabCursor="true"
                :centeredSlides="true"
                :coverflowEffect="{
                  rotate: 50,
                  stretch: 0,
                  depth: 100,
                  modifier: 1,
                  slideShadows: true,
                }"
                :modules="modules"
                :space-between="20">
                <swiper-slide v-for="item in items" :key="item.title">
                    <div class="bg-white dark:bg-gray-700 rounded-lg shadow-md overflow-hidden">
                        <img :src="item.image" :alt="item.title" class="w-full h-32 object-cover hover:scale-105 transition-transform duration-300" />
                        <div class="p-6">
                            <h3 class="text-xl font-semibold mb-2">{{  item.title }}</h3>
                            <p class="text-sm mb-4 line-clamp-2">{{ item.description }}</p>
                        </div>
                    </div>
                </swiper-slide>
            </swiper>
        </div>
    </section>
</template>

<style scoped>
img {
    transform-origin: center center;
}

</style>
