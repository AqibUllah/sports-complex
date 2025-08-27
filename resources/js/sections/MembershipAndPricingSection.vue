<script setup lang="ts">

import gymImage from '@images/categories/gym.jpg';
import swimmingImage from '@images/categories/swimming.jpg';
import { Card,CardContent,CardFooter,CardAction } from '@/components/ui/card'; // Assume Kids Zone image exists
import { ref,computed } from 'vue';
const selectedFacility = ref('Gym');
const selectFacility = (facility:any) => {
    selectedFacility.value = facility;
};

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

    <section class="bg-gray-100 py-16 px-6">
        <div class="max-w-7xl mx-auto">
            <h2 class="text-4xl font-bold text-center mb-12 text-gray-800">Choose Your Membership</h2>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Per Visit Plan -->
                <div
                    :class="[
                    'bg-white rounded-xl shadow-md p-8 transition-transform duration-300',
                    true ? 'border-4 border-yellow-400 scale-105' : 'hover:shadow-lg'
                    ]"
                    >
                    <h3 class="text-xl font-semibold text-gray-800 mb-2">Gym - Annual Membership</h3>
                    <div class="text-3xl font-bold text-indigo-600 mb-1">₹50,000</div>
                    <div class="text-gray-500 mb-6">per year</div>

                    <ul class="space-y-3 mb-6">
                        <li v-for="(feature, index) in [
                                'Unlimited gym access',
                                '15% discount on personal training',
                                'Priority booking for classes',
                                'Free guest pass (1/month)'
                            ]" :key="index" class="flex items-center text-gray-700">
                            <svg class="w-5 h-5 text-green-500 mr-2" fill="none" stroke="currentColor" stroke-width="2"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                            </svg>
                            {{ feature }}
                        </li>
                    </ul>

                    <button
                        class="w-full bg-indigo-600 hover:bg-indigo-700 text-white font-medium py-2 px-4 rounded-lg transition duration-300"
                        >
                        Join Now
                    </button>
                </div>
                <!-- Per Visit Plan -->
                <div
                    :class="[
                    'bg-white rounded-xl shadow-md p-8 transition-transform duration-300',
                    false ? 'border-4 border-yellow-400 scale-105' : 'hover:shadow-lg'
                    ]"
                    >
                    <h3 class="text-xl font-semibold text-gray-800 mb-2">Gym - Monthly Membership</h3>
                    <div class="text-3xl font-bold text-indigo-600 mb-1">₹5000</div>
                    <div class="text-gray-500 mb-6">per month</div>

                    <ul class="space-y-3 mb-6">
                        <li v-for="(feature, index) in [
                                'Unlimited gym access',
                                '10% discount on personal training',
                                'Priority booking for classes'
                            ]" :key="index" class="flex items-center text-gray-700">
                            <svg class="w-5 h-5 text-green-500 mr-2" fill="none" stroke="currentColor" stroke-width="2"
                            viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                            </svg>
                            {{ feature }}
                        </li>
                    </ul>

                    <button
                        class="w-full bg-indigo-600 hover:bg-indigo-700 text-white font-medium py-2 px-4 rounded-lg transition duration-300"
                        >
                        Join Now
                    </button>
                </div>
            </div>
        </div>
    </section>

    <div id="app" class="container mx-auto max-w-7xl">
        <!-- Header -->
        <header class="text-center mb-12">
        <h1 class="text-4xl md:text-5xl font-bold text-gray-200 dark:text-gray-800 mb-4">Premium Sports Club Memberships</h1>
        <p class="text-xl text-gray-400 dark:text-gray-700 max-w-4xl mx-auto">Choose from our variety of facilities and membership options designed to fit your lifestyle and fitness goals.</p>
        </header>

        <!-- Category Tabs -->
        <div class="flex flex-wrap justify-center gap-4 mb-12 border-b pb-4">
        <button
            v-for="(category, index) in categories"
            :key="index"
            @click="activeCategory = index"
            :class="{'tab-active': activeCategory === index}"
            class="px-6 py-3 text-lg font-medium rounded-lg hover:tab-active transition-all duration-300 hover:text-primary-dark cursor-pointer"
        >
            <i :class="category.icon" class="mr-2"></i>
            {{ category.name }}
        </button>
        </div>

        <!-- Membership Cards -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 mb-16">
        <!-- Per Visit Card -->
        <div class="bg-white rounded-xl shadow-lg overflow-hidden card-hover border border-gray-200 flex flex-col">
            <div class="p-8 flex-grow">
            <div class="text-blue-500 mb-4"><i class="fas fa-ticket-alt text-4xl"></i></div>
            <h3 class="text-2xl font-bold text-gray-800 mb-2">Per Visit Pass</h3>
            <p class="text-gray-600 mb-6">Pay as you go with our flexible single-entry option</p>
            <div class="mb-6">
                <span class="text-4xl font-bold text-gray-800">₹{{ currentCategory.pricing.perVisit }}</span>
                <span class="text-gray-600">/visit</span>
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
            </div>
            <div class="px-8 pb-8">
            <button @click="selectPlan('perVisit')" class="w-full bg-blue-500 hover:bg-blue-600 py-3 px-4 rounded-lg text-white font-semibold transition duration-300">
                Select Plan
            </button>
            </div>
        </div>

        <!-- Monthly Membership Card -->
        <div class="bg-white rounded-xl shadow-lg overflow-hidden card-hover border-2 border-blue-500 transform scale-105 flex flex-col relative">
            <div class="absolute top-0 right-0 bg-blue-500 text-white px-4 py-1 text-sm font-semibold rounded-bl-lg">
            MOST POPULAR
            </div>
            <div class="p-8 flex-grow">
            <div class="text-blue-500 mb-4"><i class="fas fa-calendar text-4xl"></i></div>
            <h3 class="text-2xl font-bold text-gray-800 mb-2">Monthly Membership</h3>
            <p class="text-gray-600 mb-6">Perfect for regular visitors with unlimited access</p>
            <div class="mb-6">
                <span class="text-4xl font-bold text-gray-800">₹{{ currentCategory.pricing.monthly }}</span>
                <span class="text-gray-600">/month</span>
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
            </div>
            <div class="px-8 pb-8">
            <button @click="selectPlan('monthly')" class="w-full bg-blue-500 hover:bg-blue-600 py-3 px-4 rounded-lg text-white font-semibold transition duration-300">
                Select Plan
            </button>
            </div>
        </div>

        <!-- Annual Membership Card -->
        <div class="bg-white rounded-xl shadow-lg overflow-hidden card-hover border border-gray-200 flex flex-col">
            <div class="p-8 flex-grow">
            <div class="text-blue-500 mb-4"><i class="fas fa-award text-4xl"></i></div>
            <h3 class="text-2xl font-bold text-gray-800 mb-2">Annual Membership</h3>
            <p class="text-gray-600 mb-6">Best value for dedicated enthusiasts</p>
            <div class="mb-6">
                <span class="text-4xl font-bold text-gray-800">₹{{ currentCategory.pricing.yearly }}</span>
                <span class="text-gray-600">/year</span>
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
            </div>
            <div class="px-8 pb-8">
            <button @click="selectPlan('yearly')" class="w-full bg-blue-500 hover:bg-blue-600 py-3 px-4 rounded-lg text-white font-semibold transition duration-300">
                Select Plan
            </button>
            </div>
        </div>
        </div>

        <!-- Custom Membership Builder -->
        <div class="bg-white rounded-xl shadow-lg p-8 mb-16">
        <h2 class="text-3xl font-bold text-center text-gray-800 mb-8">Custom Membership Builder</h2>
        <p class="text-gray-600 text-center max-w-3xl mx-auto mb-8">Create your perfect membership package by selecting multiple facilities with your preferred billing cycle.</p>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <!-- Facility Selection -->
            <div>
            <h3 class="text-xl font-semibold text-gray-800 mb-4">Select Facilities</h3>
            <div class="space-y-3">
                <div v-for="(category, index) in categories" :key="index" class="flex items-center">
                <input :id="'facility-'+index" type="checkbox" v-model="customMembership.facilities" :value="category.name" class="h-5 w-5 text-blue-600 rounded">
                <label :for="'facility-'+index" class="ml-3 text-gray-700">
                    <i :class="category.icon" class="mr-2"></i>
                    {{ category.name }}
                </label>
                </div>
            </div>
            </div>

            <!-- Billing Cycle -->
            <div>
            <h3 class="text-xl font-semibold text-gray-800 mb-4">Billing Cycle</h3>
            <div class="space-y-3">
                <div v-for="(cycle, index) in billingCycles" :key="index" class="flex items-center">
                <input :id="'cycle-'+index" type="radio" v-model="customMembership.billingCycle" :value="cycle" name="billingCycle" class="h-5 w-5 text-blue-600">
                <label :for="'cycle-'+index" class="ml-3 text-gray-700">{{ cycle }}</label>
                </div>
            </div>

            <div class="mt-6 p-4 bg-blue-50 rounded-lg">
                <h4 class="font-semibold text-gray-800 mb-2">Estimated Price:</h4>
                <div class="text-2xl font-bold text-blue-600">₹{{ calculateCustomPrice() }}/{{ customMembership.billingCycle.toLowerCase() }}</div>
                <p class="text-sm text-gray-600 mt-2">*Final price may vary based on package combinations</p>
            </div>
            </div>
        </div>

        <div class="text-center mt-8">
            <button class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-3 px-8 rounded-lg transition duration-300">
            Get Custom Quote
            </button>
        </div>
        </div>

    </div>

    <section class="py-12 w-full bg-gray-100 dark:bg-gray-900 text-gray-800 dark:text-white">
        <div class="max-w-8xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Heading -->
            <div class="text-center mb-8">
                <h1 class="text-3xl font-bold sm:text-4xl md:text-4xl">Membership & Pricing</h1>
                <p class="mt-2 md:text-lg sm:text-sm">
                    Choose the perfect plan for your fitness journey with exclusive benefits.
                </p>
            </div>

            <div class="flex justify-center space-x-2 sm:space-x-4 mb-8">
                <button
                    v-for="facility in ['Gym', 'Swimming']"
                    :key="facility"
                    @click="selectFacility(facility)"
                    :class="[
                    'px-3 py-1.5 sm:px-4 sm:py-2 md:px-5 md:py-2.5 text-sm sm:text-base md:text-lg font-semibold rounded-md transition-colors duration-200',
                        selectedFacility === facility
                          ? 'bg-primary-dark text-white'
                          : 'bg-transparent border border-primary-dark text-primary-dark hover:bg-primary-dark/10',
                      ]"
                    >
                    {{ facility }}
                </button>
            </div>

            <!-- Pricing Cards -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                <Card v-for="plan in plans.filter(p => p.facility === selectedFacility)"
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
    .tab-active {
      position: relative;
      color: #ffa500;
      font-weight: 600;
    }
    .tab-active:after {
      content: '';
      position: absolute;
      bottom: -8px;
      left: 0;
      right: 0;
      height: 3px;
      background-color: #ffa500;
      border-radius: 3px;
    }
</style>
