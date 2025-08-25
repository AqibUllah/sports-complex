<script setup lang="ts">
import { Link } from '@inertiajs/vue3';
import { Swiper, SwiperSlide } from 'swiper/vue';
import { Autoplay, Navigation, Pagination } from 'swiper/modules';
import 'swiper/css';
import 'swiper/css/navigation';
import 'swiper/css/pagination';
import footballImage from '@images/categories/football.jpg';
import cricketImage from '@images/categories/cricket.jpg';
import gymImage from '@images/categories/gym.jpg';
import swimmingImage from '@images/categories/swimming.jpg';
import kidsImage from '@images/categories/kids.jpg';
import { Card,CardContent } from '@/components/ui/card'; // Assume Kids Zone image exists
// Swiper modules
const modules = [Autoplay, Navigation, Pagination];

// Gallery items
const galleryItems = [
    {
        title: 'Football Turf',
        description: 'Experience our state-of-the-art football turf with floodlights.',
        image: footballImage,
        href: 'booking.football',
        type: 'image',
    },
    {
        title: 'Cricket Ground',
        description: 'Play on our professional-grade cricket pitch with excellent facilities.',
        image: cricketImage,
        href: 'booking.cricket',
        type: 'image',
    },
    {
        title: 'Gym',
        description: 'Modern gym with cutting-edge equipment for all fitness levels.',
        image: gymImage,
        href: 'booking.gym',
        type: 'image',
    },
    {
        title: 'Swimming Pool',
        description: 'Dive into our Olympic-sized pool with heated water.',
        image: swimmingImage,
        href: 'booking.swimming',
        type: 'image',
    },
    {
        title: 'Kids Zone',
        description: 'Safe and fun play area for children with supervised activities.',
        image: kidsImage,
        href: 'booking.kids',
        type: 'image',
    },
    {
        title: 'Football Turf 360° View',
        description: 'Explore our football turf in an immersive 360° panoramic view.',
        url: 'https://discover.matterport.com/space/UAe6TFZAey5', // Placeholder for 360° view (e.g., Kuula, Pano2VR)
        href: 'booking.football',
        type: '360',
    },
    {
        title: 'Cricket Ground Drone Tour',
        description: 'Take a drone tour of our expansive cricket ground.',
        url: 'https://www.youtube.com/embed/dQw4w9WgXcQ', // Placeholder for YouTube drone video
        href: 'booking.cricket',
        type: 'video',
    },
];
</script>

<template>
    <section class="py-12 w-full bg-gray-100 dark:bg-gray-800 text-gray-800 dark:text-white">
        <div class="max-w-8xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Heading -->
            <div class="text-center mb-8">
                <h1 class="text-3xl font-bold sm:text-4xl md:text-4xl">Virtual Tour / Gallery</h1>
                <p class="mt-2 md:text-lg sm:text-sm">
                    Take a virtual tour of our world-class facilities and book your experience today.
                </p>
            </div>

            <!-- Swiper Slider -->
            <swiper
                class="w-full"
                :slides-per-view="1"
                :space-between="20"
                :autoplay="{ delay: 5000, disableOnInteraction: false }"
                :loop="true"
                :rewind="true"
                :navigation="true"
                :pagination="{ clickable: true }"
                :modules="modules"
                :breakpoints="{
                    640: { slidesPerView: 1, spaceBetween: 20 },
                    768: { slidesPerView: 2, spaceBetween: 20 },
                    1024: { slidesPerView: 3, spaceBetween: 30 },
                }"
            >
                <swiper-slide v-for="item in galleryItems" :key="item.title">
                    <Card class="bg-white/10 backdrop-blur-lg border border-white/10 shadow-md rounded-xl overflow-hidden">
                        <CardContent>
                            <!-- Image, 360° View, or Video -->
                            <div class="relative w-full h-64 sm:h-80 md:h-96">
                                <img
                                    v-if="item.type === 'image'"
                                    :src="item.image"
                                    :alt="item.title"
                                    class="w-full h-full object-cover"
                                />
                                <!-- Dark overlay for images only -->
                                <div
                                    v-if="item.type === 'image'"
                                    class="absolute inset-0 bg-black/50"
                                ></div>
                                <iframe
                                    v-else-if="item.type === '360'"
                                    :src="item.url"
                                    class="w-full h-full"
                                    frameborder="0"
                                    allowfullscreen
                                ></iframe>
                                <iframe
                                    v-else-if="item.type === 'video'"
                                    :src="item.url"
                                    class="w-full h-full"
                                    frameborder="0"
                                    allow="autoplay; encrypted-media"
                                    allowfullscreen
                                ></iframe>
                                <div class="absolute bottom-0 left-0 w-full p-4 sm:p-6 z-10">
                                    <h3 class="text-lg sm:text-xl font-semibold text-white mb-2">{{ item.title }}</h3>
                                </div>
                            </div>
                        </CardContent>
                    </Card>
<!--                    <div-->
<!--                        class="bg-white/10 backdrop-blur-lg border border-white/10 shadow-md rounded-xl overflow-hidden"-->
<!--                    >-->
<!--                        &lt;!&ndash; Image, 360° View, or Video &ndash;&gt;-->
<!--                        <div class="relative w-full h-64 sm:h-80 md:h-96">-->
<!--                            <img-->
<!--                                v-if="item.type === 'image'"-->
<!--                                :src="item.image"-->
<!--                                :alt="item.title"-->
<!--                                class="w-full h-full object-cover"-->
<!--                            />-->
<!--                            &lt;!&ndash; Dark overlay for images only &ndash;&gt;-->
<!--                            <div-->
<!--                                v-if="item.type === 'image'"-->
<!--                                class="absolute inset-0 bg-black/50"-->
<!--                            ></div>-->
<!--                            <iframe-->
<!--                                v-else-if="item.type === '360'"-->
<!--                                :src="item.url"-->
<!--                                class="w-full h-full"-->
<!--                                frameborder="0"-->
<!--                                allowfullscreen-->
<!--                            ></iframe>-->
<!--                            <iframe-->
<!--                                v-else-if="item.type === 'video'"-->
<!--                                :src="item.url"-->
<!--                                class="w-full h-full"-->
<!--                                frameborder="0"-->
<!--                                allow="autoplay; encrypted-media"-->
<!--                                allowfullscreen-->
<!--                            ></iframe>-->
<!--                            &lt;!&ndash; Caption and Button &ndash;&gt;-->
<!--                            <div class="absolute bottom-0 left-0 w-full p-4 sm:p-6 z-10">-->
<!--                                <h3 class="text-lg sm:text-xl font-semibold text-white mb-2">{{ item.title }}</h3>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                    </div>-->
                </swiper-slide>
            </swiper>
        </div>
    </section>
</template>

<style scoped>
/* macOS-like translucent effect */
.bg-white\/10 {
    background-color: rgba(255, 255, 255, 0.1);
    backdrop-filter: blur(12px);
    -webkit-backdrop-filter: blur(12px);
}

.bg-black\/50 {
    background-color: rgba(0, 0, 0, 0.5);
}

/* Ensure images/videos are centered */
img,
iframe {
    transform-origin: center center;
}

/* Swiper navigation and pagination styling */
:deep(.swiper-button-prev),
:deep(.swiper-button-next) {
    color: #fff;
    background-color: rgba(0, 0, 0, 0.5);
    border-radius: 50%;
    width: 40px;
    height: 40px;
    display: flex;
    align-items: center;
    justify-content: center;
}
:deep(.swiper-button-prev:after),
:deep(.swiper-button-next:after) {
    font-size: 20px;
}
:deep(.swiper-pagination-bullet) {
    background: #fff;
    opacity: 0.5;
}
:deep(.swiper-pagination-bullet-active) {
    background: #fff;
    opacity: 1;
}
</style>
