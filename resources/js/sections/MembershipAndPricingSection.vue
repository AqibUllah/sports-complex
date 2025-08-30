<script setup lang="ts">

import { Card, CardContent, CardFooter, CardHeader } from '@/components/ui/card'; // Assume Kids Zone image exists
import { ref,computed } from 'vue';

const activeCategory = ref(0);

const categories = ref([
    {
    name: "Gym",
    icon: "fas fa-dumbbell",
    pricing: {
        perVisit: 500,
        monthly: 5000,
        yearly: 50000
    },
    features: {
        perVisit: [
        "Access to all gym equipment",
        "Flexible single-session booking",
        "No long-term commitment",
        "Locker access (with deposit)"
        ],
        monthly: [
        "Unlimited gym access",
        "10% discount on personal training",
        "Priority booking for classes",
        "Free fitness assessment",
        "Locker included"
        ],
        yearly: [
        "Unlimited gym access",
        "15% discount on personal training",
        "Priority booking for classes",
        "Free guest pass (1/month)",
        "2 free personal training sessions",
        "Complimentary fitness assessment every quarter"
        ]
    }
    },
    {
    name: "Swimming",
    icon: "fas fa-swimmer",
    pricing: {
        perVisit: 300,
        monthly: 2500,
        yearly: 22000
    },
    features: {
        perVisit: [
        "Single entry to pool area",
        "Locker access (with deposit)",
        "Towels available for rent"
        ],
        monthly: [
        "Unlimited pool access",
        "Free locker usage",
        "Complimentary towels",
        "10% discount on swimming lessons"
        ],
        yearly: [
        "Unlimited pool access",
        "Free locker with dedicated lock",
        "Complimentary towels",
        "15% discount on swimming lessons",
        "4 free guest passes per year",
        "Priority lane booking"
        ]
    }
    },
    {
    name: "Football",
    icon: "fas fa-futbol",
    pricing: {
        perVisit: 400,
        monthly: 3000,
        yearly: 28000
    },
    features: {
        perVisit: [
        "90 minutes of field time",
        "Equipment rental available",
        "Shared changing facilities"
        ],
        monthly: [
        "8 sessions per month",
        "Priority booking for prime time slots",
        "10% discount on equipment purchase",
        "Free changing room access"
        ],
        yearly: [
        "Unlimited field access (subject to availability)",
        "Priority booking for prime time slots",
        "15% discount on equipment purchase",
        "Personal locker included",
        "4 free guest passes per year",
        "Invitation to member tournaments"
        ]
    }
    },
    {
    name: "Cricket",
    icon: "fas fa-baseball-ball",
    pricing: {
        perVisit: 350,
        monthly: 2800,
        yearly: 25000
    },
    features: {
        perVisit: [
        "Net practice session (1 hour)",
        "Equipment rental available",
        "Basic coaching guidance"
        ],
        monthly: [
        "12 net practice sessions",
        "10% discount on equipment purchase",
        "Group coaching sessions included",
        "Priority booking during league matches"
        ],
        yearly: [
        "Unlimited net practice (subject to availability)",
        "15% discount on equipment purchase",
        "Personalized coaching sessions (4 per year)",
        "Priority booking for matches",
        "Personal locker included",
        "Invitation to member tournaments"
        ]
    }
    },
    {
    name: "Kids Area",
    icon: "fas fa-child",
    pricing: {
        perVisit: 250,
        monthly: 1800,
        yearly: 15000
    },
    features: {
        perVisit: [
        "2 hours of play time",
        "Supervised play area",
        "Basic activities included"
        ],
        monthly: [
        "Unlimited access during operating hours",
        "10% discount on special programs",
        "Priority registration for workshops",
        "One free guest pass per month"
        ],
        yearly: [
        "Unlimited access during operating hours",
        "15% discount on special programs",
        "Priority registration for workshops",
        "Four free guest passes per year",
        "Birthday party discount (20%)",
        "Progress tracking reports"
        ]
    }
    }
]);

const currentCategory = computed(() => {
    return categories.value[activeCategory.value];
});

const customMembership = ref({
    facilities: [],
    billingCycle: "Monthly"
});

const billingCycles = ref(["Monthly", "Quarterly", "Yearly"]);



function selectPlan(planType:string) {
    alert(`You've selected the ${currentCategory.value.name} - ${planType} plan!`);
    // Here you would typically redirect to a signup page or open a modal
}

function calculateSavings(category:any) {
    const monthlyCost = category.pricing.monthly * 12;
    const yearlyCost = category.pricing.yearly;
    const savings = ((monthlyCost - yearlyCost) / monthlyCost) * 100;
    return Math.round(savings);
}

function calculateCustomPrice() {
    if (customMembership.value.facilities.length === 0) return 0;

    // Simplified calculation - in a real app, this would be more complex
    let basePrice = 0;
    const facilityCount = customMembership.value.facilities.length;

    customMembership.value.facilities.forEach((facilityName:string) => {
    const category = categories.value.find(c => c.name === facilityName);
    if (category) {
        if (customMembership.value.billingCycle === "Monthly") {
        basePrice += category.pricing.monthly;
        } else if (customMembership.value.billingCycle === "Quarterly") {
        basePrice += category.pricing.monthly * 3 * 0.9; // 10% discount for quarterly
        } else {
        basePrice += category.pricing.yearly;
        }
    }
    });

    // Apply multi-facility discount
    if (facilityCount > 1) {
    const discount = Math.min(20, (facilityCount - 1) * 8); // 8% discount per additional facility, max 20%
    basePrice = basePrice * (1 - discount/100);
    }

    return Math.round(basePrice);
}

</script>

<template>

    <section class="container mx-auto max-w-7xl py-16">
        <!-- Header -->
        <header class="text-center mb-12">
            <h1 class="text-4xl md:text-5xl font-bold text-gray-800 dark:text-gray-200 mb-4">Premium Sports Club Memberships</h1>
            <p class="text-xl text-gray-400 dark:text-gray-400 max-w-4xl mx-auto">Choose from our variety of facilities and membership options designed to fit your lifestyle and fitness goals.</p>
        </header>

        <!-- Category Tabs -->
        <div class="flex flex-wrap justify-center gap-4 mb-12 border-b border-gray-800 pb-4">
            <button
                v-for="(category, index) in categories"
                :key="index"
                @click="activeCategory = index"
                :class="{'tab-active': activeCategory === index}"
                class="px-6 py-3 text-lg font-medium rounded-lg hover:tab-active transition-all duration-300 text-gray-200 hover:text-primary-dark cursor-pointer"
            >
                <i :class="category.icon" class="mr-2"></i>
                {{ category.name }}
            </button>
        </div>

        <!-- Membership Cards -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 mb-16">
            <!-- Per Visit Card -->
            <Card class="rounded-xl shadow-lg overflow-hidden card-hover border border-gray-200 dark:border-gray-800 flex flex-col hover:bg-gray-800 transition-all duration-200">
                <CardContent class="p-8 flex-grow">
                    <div class="text-blue-500 mb-4"><i class="fas fa-ticket-alt text-4xl"></i></div>
                    <h3 class="text-2xl font-bold text-primary-dark mb-2">Per Visit Pass</h3>
                    <p class="text-gray-600 dark:text-gray-400 mb-6">Pay as you go with our flexible single-entry option</p>
                    <div class="mb-6">
                        <span class="text-4xl font-bold text-gray-800 dark:text-white">₹{{ currentCategory.pricing.perVisit }}</span>
                        <span class="text-gray-600 dark:text-sky-400">/visit</span>
                    </div>
                    <ul class="space-y-3 mb-8">
                        <li v-for="(feature, index) in currentCategory.features.perVisit" :key="index" class="flex items-start">
                        <svg class="w-5 h-5 text-green-500 mr-2" fill="none" stroke="currentColor" stroke-width="2"
                        viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                        </svg>
                        <span>{{ feature }}</span>
                        </li>
                    </ul>
                </CardContent>
                <CardFooter class="px-8 pb-8">
                    <button @click="selectPlan('perVisit')" class="w-full cursor-pointer bg-primary-dark hover:bg-primary-light py-3 px-4 rounded-lg text-white font-semibold transition duration-300">
                        Select Plan
                    </button>
                </CardFooter>
            </Card>

            <!-- Monthly Membership Card -->
            <Card class="rounded-xl shadow-lg overflow-hidden card-hover border border-blue-800 transform scale-105 flex flex-col relative hover:bg-blue-900 transition-all duration-200">
                <div class="absolute top-0 right-0 bg-blue-500 text-white px-4 py-1 text-sm font-semibold rounded-bl-lg">
                MOST POPULAR
                </div>
                <CardContent class="p-8 flex-grow">
                    <div class="text-blue-500 mb-4"><i class="fas fa-calendar text-4xl"></i></div>
                    <h3 class="text-2xl font-bold text-primary-dark mb-2">Monthly Membership</h3>
                    <p class="text-gray-600 mb-6 dark:text-gray-400">Perfect for regular visitors with unlimited access</p>
                    <div class="mb-6">
                        <span class="text-4xl font-bold dark:text-white">₹{{ currentCategory.pricing.monthly }}</span>
                        <span class="dark:text-sky-400">/month</span>
                    </div>
                    <ul class="space-y-3 mb-8">
                        <li v-for="(feature, index) in currentCategory.features.monthly" :key="index" class="flex items-start">
                            <svg class="w-5 h-5 text-green-500 mr-2" fill="none" stroke="currentColor" stroke-width="2"
                            viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                            </svg>
                            <span>{{ feature }}</span>
                        </li>
                    </ul>
                </CardContent>
                <CardFooter class="px-8 pb-8">
                    <button @click="selectPlan('monthly')" class="w-full bg-blue-500 hover:bg-blue-600 hover:cursor-pointer py-3 px-4 rounded-lg text-white font-semibold transition duration-300">
                        Select Plan
                    </button>
                </CardFooter>
            </Card>

            <!-- Annual Membership Card -->
            <Card class="rounded-xl shadow-lg overflow-hidden card-hover border border-gray-800 flex flex-col hover:bg-gray-800 transition-all duration-200">
            <CardContent class="p-8 flex-grow">
                <div class="text-blue-500 mb-4"><i class="fas fa-award text-4xl"></i></div>
                <h3 class="text-2xl font-bold text-primary-dark mb-2">Annual Membership</h3>
                <p class="dark:text-gray-400 mb-6">Best value for dedicated enthusiasts</p>
                <div class="mb-6">
                    <span class="text-4xl font-bold dark:text-white">₹{{ currentCategory.pricing.yearly }}</span>
                    <span class="text-sky-400">/year</span>
                    <p class="text-sm text-green-600 mt-2">Save {{ calculateSavings(currentCategory) }}% compared to monthly</p>
                </div>
                <ul class="space-y-3 mb-8">
                    <li v-for="(feature, index) in currentCategory.features.yearly" :key="index" class="flex items-start">
                        <svg class="w-5 h-5 text-green-500 mr-2" fill="none" stroke="currentColor" stroke-width="2"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                        </svg>
                        <span>{{ feature }}</span>
                    </li>
                </ul>
            </CardContent>
            <CardFooter class="px-8 pb-8">
                <button @click="selectPlan('yearly')" class="w-full bg-primary-dark hover:bg-primary-light hover:cursor-pointer py-3 px-4 rounded-lg text-white font-semibold transition duration-300">
                    Select Plan
                </button>
            </CardFooter>
        </Card>
        </div>

        <!-- Custom Membership Builder -->
        <Card class="border border-gray-800 rounded-xl shadow-lg p-8 mb-16">
            <CardHeader>
                <h2 class="text-3xl font-bold text-center dark:text-gray-200 mb-2">Custom Membership Builder</h2>
                <p class="dark:text-gray-400 text-center max-w-3xl mx-auto mb-8">Create your perfect membership package by selecting multiple facilities with your preferred billing cycle.</p>
            </CardHeader>
            <CardContent class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <!-- Facility Selection -->
                <div>
                    <h3 class="text-xl font-semibold dark:text-gray-200 mb-4">Select Facilities</h3>
                    <div class="space-y-3">
                        <div v-for="(category, index) in categories" :key="index" class="flex items-center">
                            <input :id="'facility-'+index" type="checkbox" v-model="customMembership.facilities" :value="category.name" class="h-5 w-5 text-blue-600 rounded">
                            <label :for="'facility-'+index" class="ml-3 dark:text-gray-400">
                                <i :class="category.icon" class="mr-2"></i>
                                {{ category.name }}
                            </label>
                        </div>
                    </div>
                </div>

                <!-- Billing Cycle -->
                <div>
                    <h3 class="text-xl font-semibold dark:text-gray-200 mb-4">Billing Cycle</h3>
                    <div class="space-y-3">
                        <div v-for="(cycle, index) in billingCycles" :key="index" class="flex items-center">
                        <input :id="'cycle-'+index" type="radio" v-model="customMembership.billingCycle" :value="cycle" name="billingCycle" class="h-5 w-5 text-blue-600">
                        <label :for="'cycle-'+index" class="ml-3 dark:text-gray-400">{{ cycle }}</label>
                        </div>
                    </div>

                    <div class="mt-6 p-4 dark:bg-gray-900 rounded-lg">
                        <h4 class="font-semibold dark:text-gray-300 mb-2">Estimated Price:</h4>
                        <div class="text-2xl font-bold dark:text-white">₹{{ calculateCustomPrice() }}/{{ customMembership.billingCycle.toLowerCase() }}</div>
                        <p class="text-sm dark:text-gray-400 mt-2">*Final price may vary based on package combinations</p>
                    </div>
                </div>
            </CardContent>
            <CardFooter class="text-center justify-center mt-8">
                <button class="bg-white text-black hover:bg-primary-dark hover:text-white cursor-pointer font-semibold py-3 px-8 rounded-lg transition duration-300">
                Get Custom Quote
                </button>
            </CardFooter>
        </Card>
    </section>
</template>

<style scoped>
    img {
        transform-origin: center center;
    }
    .tab-active {
      position: relative;
      color: #ffa500;
      font-weight: 600;
    }
    .tab-active:after {
      content: '';
      position: absolute;
      bottom: 0;
      left: 0;
      right: 0;
      height: 3px;
      background-color: #ffa500;
      border-radius: 3px;
    }
</style>
