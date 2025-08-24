<script setup lang="ts">

import gymImage from '@images/categories/gym.jpg';
import swimmingImage from '@images/categories/swimming.jpg';
import { Card,CardContent,CardFooter,CardAction } from '@/components/ui/card'; // Assume Kids Zone image exists

const plans = [
    {
        facility: 'Gym',
        type: 'Per-Visit',
        price: 'Rs 500/visit',
        benefits: [
            'Access to all gym equipment',
            'Flexible single-session booking',
            'No long-term commitment',
        ],
        image: gymImage,
        href: 'membership.gym-per-visit',
    },
    {
        facility: 'Gym',
        type: 'Monthly Membership',
        price: 'Rs 5000/month',
        benefits: [
            'Unlimited gym access',
            '10% discount on personal training',
            'Priority booking for classes',
        ],
        image: gymImage,
        href: 'membership.gym-monthly',
    },
    {
        facility: 'Gym',
        type: 'Annual Membership',
        price: 'Rs 50,000/year',
        benefits: [
            'Unlimited gym access',
            '15% discount on personal training',
            'Priority booking for classes',
            'Free guest pass (1/month)',
        ],
        image: gymImage,
        href: 'membership.gym-annual',
    },
    {
        facility: 'Swimming',
        type: 'Per-Visit',
        price: 'Rs 600/visit',
        benefits: [
            'Access to Olympic-sized pool',
            'Flexible single-session booking',
            'Lifeguard supervision',
        ],
        image: swimmingImage,
        href: 'membership.swimming-per-visit',
    },
    {
        facility: 'Swimming',
        type: 'Monthly Membership',
        price: 'Rs 6000/month',
        benefits: [
            'Unlimited pool access',
            '10% discount on swim lessons',
            'Priority lane booking',
        ],
        image: swimmingImage,
        href: 'membership.swimming-monthly',
    },
    {
        facility: 'Swimming',
        type: 'Annual Membership',
        price: 'Rs 60,000/year',
        benefits: [
            'Unlimited pool access',
            '15% discount on swim lessons',
            'Priority lane booking',
            'Free guest pass (1/month)',
        ],
        image: swimmingImage,
        href: 'membership.swimming-annual',
    },
];
</script>

<template>
    <section class="py-12 w-full bg-gray-100 dark:bg-gray-900 text-gray-800 dark:text-white">
        <div class="max-w-8xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Heading -->
            <div class="text-center mb-8">
                <h1 class="text-3xl font-bold sm:text-4xl md:text-4xl">Membership & Pricing</h1>
                <p class="mt-2 md:text-lg sm:text-sm">
                    Choose the perfect plan for your fitness journey with exclusive benefits.
                </p>
            </div>

            <!-- Pricing Cards -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                <Card v-for="plan in plans"
                      :key="`${plan.facility}-${plan.type}`"
                    class="bg-white/10 backdrop-blur-lg border border-white/10 shadow-md rounded-xl overflow-hidden hover:scale-105 transition-transform duration-300">
                    <CardContent>
                        <img
                            :src="plan.image"
                            :alt="`${plan.facility} ${plan.type}`"
                            class="w-full h-32 object-cover"
                        />
                        <div class="p-4 sm:p-6">
                            <h3 class="text-lg sm:text-xl font-semibold mb-2">
                                {{ plan.facility }} - {{ plan.type }}
                            </h3>
                            <p class="text-sm sm:text-base font-semibold text-primary-dark mb-4">
                                {{ plan.price }}
                            </p>
                            <ul class="text-sm sm:text-base text-gray-100 mb-2 space-y-2">
                                <li v-for="benefit in plan.benefits" :key="benefit" class="flex items-start">
                                    <svg
                                        class="w-5 h-5 text-green-400 mr-2 flex-shrink-0"
                                        fill="currentColor"
                                        viewBox="0 0 20 20"
                                    >
                                        <path
                                            fill-rule="evenodd"
                                            d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                            clip-rule="evenodd"
                                        />
                                    </svg>
                                    {{ benefit }}
                                </li>
                            </ul>
                        </div>
                    </CardContent>
                    <CardFooter>
                        <CardAction class="mb-5">
                            <Link
                                :href="'#'"
                                class="bg-primary-dark cursor-pointer text-white px-3 py-1.5 sm:px-4 sm:py-2 rounded-md hover:bg-primary-light text-sm sm:text-base inline-block"
                            >
                                Join Now
                            </Link>
                        </CardAction>
                    </CardFooter>
                </Card>
            </div>
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
    img {
        transform-origin: center center;
    }
</style>
