<script setup lang="ts">

</script>

<template>
    <section class="relative bg-primary-50">
        <div class="">
                <video
                autoplay
                muted
                loop
                playsinline
                class="w-full h-auto rounded-md"
            >
                <source src="@videos/intro-2.mp4" type="video/mp4" />
                Your browser does not support the video tag.
            </video>
            <!-- Intro Text Overlay -->
            <transition
                enter-active-class="transition ease-out duration-300"
                enter-from-class="opacity-0 translate-y-10"
                enter-to-class="opacity-100 translate-y-0"
                appear
            >
                <div
                    class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 bg-white/10 backdrop-blur-lg border border-white/10 shadow-md rounded-xl my-8 p-4 sm:p-6 md:p-8 w-full max-w-sm sm:max-w-sm md:max-w-md lg:max-w-lg xl:max-w-2xl mx-auto"
                >
                    <!-- Heading -->
                    <h2
                        class="text-xs sm:text-sm md:text-lg lg:text-xl font-bold text-gray-100 uppercase tracking-wide"
                    >
                        Welcome to
                    </h2>
                    <h1
                        class="text-lg sm:text-2xl md:text-3xl lg:text-4xl xl:text-5xl font-bold text-primary-dark mt-1 sm:mt-2"
                    >
                        Uptown Arena Sports Complex
                    </h1>
                    <p
                        class="mt-2 sm:mt-3 text-xs sm:text-sm md:text-base lg:text-lg text-gray-100 max-w-full sm:max-w-md md:max-w-lg"
                    >
                        Your ultimate destination for sports and fitness. Book facilities, join memberships, and explore our categories.
                    </p>
                    <button
                        class="mt-3 sm:mt-4 px-3 py-1.5 sm:px-4 sm:py-2 md:px-5 md:py-2.5 bg-primary-dark cursor-pointer text-white rounded-md hover:bg-primary-light focus:outline-none focus:ring-2 focus:ring-primary-500 focus:ring-opacity-50 text-sm sm:text-base md:text-lg"
                    >
                        Explore Now
                    </button>
                </div>
            </transition>
        </div>
    </section>
</template>

<style scoped>
.bg-white\/10 {
    background-color: rgba(255, 255, 255, 0.1);
    backdrop-filter: blur(12px);
    -webkit-backdrop-filter: blur(12px);
}
</style>
