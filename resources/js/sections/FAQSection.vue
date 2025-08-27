<script setup lang="ts">
import { ref } from "vue"

const toggleFaq = (index:number) => {
    faqs.value[index].open = !faqs.value[index].open;
}

const faqs = ref([
    {
    question: "Can I access multiple facilities with one membership?",
    answer: "Yes, we offer multi-facility memberships at discounted rates. Our custom membership builder allows you to select the facilities you need and get a personalized quote.",
    open: false
    },
    {
    question: "Are there family discounts available?",
    answer: "Absolutely! We offer family packages with discounts of up to 20% for families with 3 or more members. Visit our front desk for more information.",
    open: false
    },
    {
    question: "Can I upgrade or change my membership plan?",
    answer: "Yes, you can upgrade your plan at any time. The remaining value of your current plan will be applied to the upgraded membership. Downgrades are possible at renewal time.",
    open: false
    },
    {
    question: "What payment methods do you accept?",
    answer: "We accept all major credit cards, debit cards, UPI, net banking, and cash. Corporate memberships are also available through payroll deductions.",
    open: false
    }
]);

</script>

<template>
    <!-- FAQ Section -->
    <section class="max-w-6xl mx-auto py-16">
        <h2 class="text-4xl font-bold text-center text-gray-200 mb-8">Frequently Asked Questions</h2>
        <div class="space-y-4">
            <div v-for="(faq, index) in faqs" :key="index" class="bg-white rounded-lg shadow p-6">
            <button @click="toggleFaq(index)" class="flex justify-between items-center w-full text-left">
                <span class="font-semibold text-gray-800">{{ faq.question }}</span>
                <i :class="{'rotate-180': faq.open}" class="fas fa-chevron-down transform transition-transform duration-300"></i>
            </button>
            <div v-if="faq.open" class="mt-4 text-gray-600">
                {{ faq.answer }}
            </div>
            </div>
        </div>
    </section>
</template>

<style scoped>

</style>