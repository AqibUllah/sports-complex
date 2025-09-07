<script setup lang="ts">
import { Icon } from "@iconify/vue";
</script>

<template>
    <!-- Footer Preview Container -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <h2 class="text-4xl font-bold text-center mb-8 text-gray-100">Uptown Arena Sports Complex</h2>

        <!-- Footer Component -->
        <footer class="bg-gray-900 footer-gradient text-white rounded-xl shadow-2xl overflow-hidden">
            <!-- Newsletter Section -->
            <div class="bg-gray-800 px-6 py-10 md:py-12">
                <div class="max-w-7xl mx-auto flex flex-col md:flex-row items-center justify-between">
                    <div class="mb-6 md:mb-0 md:mr-10">
                        <h3 class="text-2xl font-bold mb-2">Stay Updated</h3>
                        <p class="text-blue-200 max-w-md">Subscribe to our newsletter for exclusive offers, event updates, and sports tips.</p>
                    </div>
                    <div class="flex w-full md:w-auto">
                        <input type="email" placeholder="Your email address" class="newsletter-input">
                        <button class="newsletter-btn px-6 py-3 font-semibold whitespace-nowrap">
                            Subscribe <i class="ml-2 fas fa-arrow-right"></i>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Main Footer Content -->
            <div class="px-6 py-12">
                <div class="max-w-7xl mx-auto grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                    <!-- Brand Column -->
                    <div class="lg:col-span-1">
                        <div class="flex items-center mb-6">
                            <div class="bg-orange-500 h-10 w-10 rounded-lg flex items-center justify-center mr-3">
                                <i class="fas fa-basketball-ball text-white text-xl"></i>
                            </div>
                            <span class="text-xl font-bold">UPTOWN SPORTS ARENA COMPLEX</span>
                        </div>
                        <p class="text-gray-300 mb-6">Premier sports complex offering state-of-the-art facilities for basketball, volleyball, soccer, and more. Your destination for sports excellence.</p>
                        <div class="flex space-x-4">
                            <a href="https://www.facebook.com/UptownSportsArenaPk" target="_blank" class="rounded-full flex items-center justify-center">
                                <Icon icon="ic:baseline-facebook" width="40" />
                            </a>
                            <a href="https://www.instagram.com/uptown_sportsarena" target="_blank" class="rounded-full flex items-center justify-center">
                                <Icon icon="skill-icons:instagram" width="40"></Icon>
                            </a>
                        </div>
                    </div>

                    <!-- Quick Links -->
                    <div>
                        <h4 class="text-lg font-semibold mb-6 relative pb-2 after:absolute after:left-0 after:bottom-0 after:h-1 after:w-10 after:bg-orange-500">Quick Links</h4>
                        <ul class="space-y-3">
                            <li><a href="#home" class="footer-link text-gray-300 flex items-center"><i class="fas fa-chevron-right text-orange-500 mr-2 text-xs"></i> Home</a></li>
                            <li><a href="#venues" class="footer-link text-gray-300 flex items-center"><i class="fas fa-chevron-right text-orange-500 mr-2 text-xs"></i> Venues</a></li>
                            <li><a href="#features_and_categories" class="footer-link text-gray-300 flex items-center"><i class="fas fa-chevron-right text-orange-500 mr-2 text-xs"></i> Features & Categories</a></li>
                            <li><a href="#gallery" class="footer-link text-gray-300 flex items-center"><i class="fas fa-chevron-right text-orange-500 mr-2 text-xs"></i> Gallery</a></li>
                            <li><a href="#booking_options" class="footer-link text-gray-300 flex items-center"><i class="fas fa-chevron-right text-orange-500 mr-2 text-xs"></i> Booking Options</a></li>
                            <li><a href="#membership_and_pricing" class="footer-link text-gray-300 flex items-center"><i class="fas fa-chevron-right text-orange-500 mr-2 text-xs"></i> Membership & Pricing</a></li>
                            <li><a href="#faq" class="footer-link text-gray-300 flex items-center"><i class="fas fa-chevron-right text-orange-500 mr-2 text-xs"></i> Faqs</a></li>
                        </ul>
                    </div>

                    <!-- Sports Categories -->
                    <div>
                        <h4 class="text-lg font-semibold mb-6 relative pb-2 after:absolute after:left-0 after:bottom-0 after:h-1 after:w-10 after:bg-orange-500">Our Facilities</h4>
                        <ul class="space-y-3">
                            <li><a href="#" class="footer-link text-gray-300 flex items-center"><i class="fas fa-basketball-ball text-orange-500 mr-2"></i> Basketball Courts</a></li>
                            <li><a href="#" class="footer-link text-gray-300 flex items-center"><i class="fas fa-volleyball-ball text-orange-500 mr-2"></i> Volleyball Courts</a></li>
                            <li><a href="#" class="footer-link text-gray-300 flex items-center"><i class="fas fa-volleyball-ball text-orange-500 mr-2"></i> Cricket</a></li>
                            <li><a href="#" class="footer-link text-gray-300 flex items-center"><i class="fas fa-futbol text-orange-500 mr-2"></i> Soccer Fields</a></li>
                            <li><a href="#" class="footer-link text-gray-300 flex items-center"><i class="fas fa-table-tennis text-orange-500 mr-2"></i> Table Tennis</a></li>
                            <li><a href="#" class="footer-link text-gray-300 flex items-center"><i class="fas fa-dumbbell text-orange-500 mr-2"></i> Fitness Center</a></li>
                            <li><a href="#" class="footer-link text-gray-300 flex items-center"><i class="fas fa-utensils text-orange-500 mr-2"></i> Sports Cafe</a></li>
                        </ul>
                    </div>

                    <!-- Contact Info -->
                    <div>
                        <h4 class="text-lg font-semibold mb-6 relative pb-2 after:absolute after:left-0 after:bottom-0 after:h-1 after:w-10 after:bg-orange-500">Contact Us</h4>
                        <ul class="space-y-4">
                            <li class="flex">
                                <i class="fas fa-map-marker-alt text-orange-500 mt-1 mr-3"></i>
                                <span class="text-gray-300">Opposite Airport Runway, Railway Line, Abdara, Peshawar</span>
                            </li>
                            <li class="flex">
                                <i class="fas fa-phone-alt text-orange-500 mt-1 mr-3"></i>
                                <span class="text-gray-300">+92 332 1999197</span>
                            </li>
                            <li class="flex">
                                <i class="fas fa-envelope text-orange-500 mt-1 mr-3"></i>
                                <span class="text-gray-300">uptownsportsarena@gmail.com</span>
                            </li>
                            <li class="flex">
                                <i class="fas fa-clock text-orange-500 mt-1 mr-3"></i>
                                <span class="text-gray-300">
                                    Gym: 5:00 AM - 11:00 PM (Daily)<br>
                                    Sports: 6:00 AM - 10:00 PM<br>
                                    Café: 7:00 AM - 9:00 PM
                                </span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Bottom Bar -->
            <div class="border-t border-gray-700 px-6 py-6">
                <div class="max-w-7xl mx-auto flex flex-col md:flex-row items-center justify-between">
                    <p class="text-gray-400 text-sm mb-4 md:mb-0">© 2025 Uptown Arena Sports Complex. All rights reserved.</p>

                    <div class="flex items-center space-x-4">
                        <span class="text-gray-400 text-sm">We accept:</span>
                        <div class="flex space-x-2">
                            <i class="fab fa-cc-visa payment-icon text-2xl"></i>
                            <i class="fab fa-cc-mastercard payment-icon text-2xl"></i>
                            <i class="fab fa-cc-amex payment-icon text-2xl"></i>
                            <i class="fab fa-cc-paypal payment-icon text-2xl"></i>
                            <i class="fab fa-cc-apple-pay payment-icon text-2xl"></i>
                        </div>
                    </div>

                    <div class="mt-4 md:mt-0">
                        <a href="#" class="text-gray-400 text-sm footer-link mr-4">Privacy Policy</a>
                        <a href="#" class="text-gray-400 text-sm footer-link mr-4">Terms of Service</a>
                        <a href="#" class="text-gray-400 text-sm footer-link">Cookie Policy</a>
                    </div>
                </div>
            </div>
        </footer>
    </div>
</template>

<style scoped>
.footer-gradient {
            /* background: linear-gradient(135deg, #1e3a8a 0%, #0f172a 100%); */
        }

        .newsletter-input {
            border: 1px solid rgb(78, 78, 78);
            outline: none;
            padding: 0.75rem 1rem;
            border-radius: 0.375rem 0 0 0.375rem;
            width: 100%;
        }

        .newsletter-btn {
            border-radius: 0 0.375rem 0.375rem 0;
            background: #f97316;
            transition: all 0.3s ease;
        }

        .newsletter-btn:hover {
            background: #ea580c;
        }

        .social-icon {
            transition: all 0.3s ease;
        }

        .social-icon:hover {
            transform: translateY(-3px);
        }

        .footer-link {
            transition: all 0.2s ease;
        }

        .footer-link:hover {
            color: #f97316;
            padding-left: 5px;
        }

        .payment-icon {
            filter: grayscale(100%) brightness(400%);
            opacity: 0.7;
            transition: all 0.3s ease;
        }

        .payment-icon:hover {
            filter: grayscale(0%) brightness(100%);
            opacity: 1;
        }
</style>
