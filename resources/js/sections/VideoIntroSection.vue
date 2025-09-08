
<script setup lang="ts">
import 'animate.css';
</script>

<template>
<!--    <section class="relative bg-primary-50" id="home">-->
<!--        <div class="">-->
<!--                <video-->
<!--                autoplay-->
<!--                muted-->
<!--                loop-->
<!--                playsinline-->
<!--                preload="none"-->
<!--                class="w-[2000px] h-auto rounded-md"-->
<!--            >-->
<!--                <source src="@videos/intro-3.mp4" type="video/mp4" />-->
<!--                Your browser does not support the video tag.-->
<!--            </video>-->
<!--            &lt;!&ndash; Intro Text Overlay &ndash;&gt;-->
<!--                <div-->
<!--                    class="animate__animated animate__fadeInUp hidden lg:block absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 bg-white/10 backdrop-blur-lg border border-white/10 shadow-md rounded-xl my-8 p-4 sm:p-6 md:p-8 w-full max-w-sm sm:max-w-sm md:max-w-md lg:max-w-lg xl:max-w-2xl mx-auto"-->
<!--                >-->
<!--                    &lt;!&ndash; Heading &ndash;&gt;-->
<!--                    <h1-->
<!--                        class="text-xs sm:text-sm md:text-lg dark:text-white lg:text-2xl font-bold text-gray-800 uppercase tracking-wide"-->
<!--                    >-->
<!--                        Welcome to-->
<!--                    </h1>-->
<!--                    <h1-->
<!--                        class="text-lg sm:text-2xl md:text-3xl lg:text-4xl xl:text-5xl font-bold text-primary-dark mt-1 sm:mt-2"-->
<!--                    >-->
<!--                        Uptown Arena Sports Complex-->
<!--                    </h1>-->
<!--                    <p-->
<!--                        class="mt-2 mb-5 sm:mt-3 text-xs sm:text-sm md:text-base dark:text-white lg:text-lg text-gray-900 max-w-full sm:max-w-md md:max-w-lg"-->
<!--                    >-->
<!--                        Your ultimate destination for sports and fitness. Book facilities, join memberships, and explore our categories.-->
<!--                    </p>-->
<!--                    <Link-->
<!--                        href="#venues"-->
<!--                        class="explore-btn bg-gradient-to-r from-yellow-200 via-yellow-400 to-yellow-500 hover:bg-gradient-to-br dark:focus:ring-yellow-100 shadow-lg shadow-lime-500/50 dark:shadow-lg dark:shadow-lime-800/80 mt-3 sm:mt-4 px-3 py-1.5 sm:px-4 sm:py-2 md:px-5 md:py-2.5 bg-primary-dark cursor-pointer text-white rounded-md hover:bg-primary-light focus:outline-none focus:ring-2 focus:ring-primary-500 focus:ring-opacity-50 text-sm sm:text-base md:text-lg"-->
<!--                    >-->
<!--                        Explore Now-->
<!--                    </Link>-->

<!--                </div>-->

<!--            &lt;!&ndash; Intro Text Overlay for sm and larger screens &ndash;&gt;-->
<!--            <div-->
<!--                class="md:hidden block animate__animated animate__fadeInUp absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 bg-white/10 backdrop-blur-lg border border-white/10 shadow-md rounded-xl p-1 w-11/12 sm:w-10/12 md:w-3/4 lg:w-2/3 xl:w-1/2 max-w-2xl mx-auto my-5"-->
<!--            >-->
<!--                &lt;!&ndash; Heading &ndash;&gt;-->
<!--                <h2-->
<!--                    class="text-xs dark:text-white sm:text-sm md:text-base lg:text-lg xl:text-xl font-bold text-gray-800 uppercase tracking-wide text-center"-->
<!--                >-->
<!--                    Welcome to-->
<!--                </h2>-->
<!--                <h1-->
<!--                    class="text-xl sm:text-2xl md:text-2xl lg:text-3xl xl:text-4xl font-bold text-primary-dark mt-1 sm:mt-2 text-center"-->
<!--                >-->
<!--                    Uptown Arena Sports Complex-->
<!--                </h1>-->
<!--                <p-->
<!--                    class="mt-2 sm:mt-3 text-xs sm:text-sm md:text-base dark:text-white lg:text-lg text-gray-900 text-center"-->
<!--                >-->
<!--                    Your ultimate destination for sports and fitness. Book facilities, join memberships, and explore our categories.-->
<!--                </p>-->
<!--            </div>-->
<!--        </div>-->
<!--    </section>-->

    <section class="relative overflow-hidden w-full" id="home">
        <!-- Hero Section with Background Image -->
        <div class="hero-image min-h-screen flex items-center justify-center pt-20 pb-12 px-4 sm:px-6 lg:px-8">
            <div class="hero-gradient absolute inset-0"></div>

            <div class="relative z-10 max-w-7xl mx-auto w-full">
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                    <!-- Text Content -->
                    <div class="text-center lg:text-left animate__animated animate__fadeInLeft">
                        <div class="mb-6">
                            <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold text-white leading-tight">
                                Uptown Arena <span class="text-yellow-300">Sports Complex</span>
                            </h1>
                            <div class="h-1 w-24 bg-yellow-400 my-6 mx-auto lg:mx-0"></div>
                            <p class="text-xl text-gray-100 mt-4 max-w-2xl">
                                Uptown Sports Arena offers world-class indoor cricket, futsal, gym, swimming pool, kids play area, and café for the entire family.                             </p>
                        </div>

                        <div class="mt-10 flex flex-col sm:flex-row gap-4 justify-center lg:justify-start">
                            <a href="#venues" class="explore-btn bg-gradient-to-r from-yellow-400 to-yellow-500 text-gray-900 font-semibold py-4 px-8 rounded-lg text-lg">
                                Explore Facilities
                            </a>
                            <a href="#membership_and_pricing" class="bg-transparent border-2 border-white text-white font-semibold py-4 px-8 rounded-lg text-lg hover:bg-white hover:text-gray-900 transition duration-300">
                                Memberships
                            </a>
                        </div>

                        <!-- Sports Icons -->
                        <div class="mt-12 flex justify-center lg:justify-start space-x-8">
                            <div class="sports-icon text-white bg-white/10 p-4 rounded-full backdrop-blur-sm">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </div>
                            <div class="sports-icon text-white bg-white/10 p-4 rounded-full backdrop-blur-sm">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 18.657A8 8 0 016.343 7.343S7 9 9 10c0-2 .5-5 2.986-7C14 5 16.09 5.777 17.656 7.343A7.975 7.975 0 0120 13a7.975 7.975 0 01-2.343 5.657z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.879 16.121A3 3 0 1012.015 11L11 14H9c0 .768.293 1.536.879 2.121z" />
                                </svg>
                            </div>
                            <div class="sports-icon text-white bg-white/10 p-4 rounded-full backdrop-blur-sm">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                                </svg>
                            </div>
                        </div>
                    </div>

                    <!-- Stats Card -->
                    <div class="animate__animated animate__fadeInRight">
                        <div class="floating-card bg-white/10 backdrop-blur-lg rounded-2xl p-8 border border-white/20 text-white max-w-md mx-auto lg:mx-0 lg:ml-auto">
                            <h2 class="text-2xl font-bold mb-6 text-center">Why Choose Uptown Arena?</h2>

                            <div class="space-y-6">
                                <div class="flex items-start">
                                    <div class="pulse-animation bg-yellow-400 p-2 rounded-full mr-4">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-900" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                        </svg>
                                    </div>
                                    <div>
                                        <h3 class="font-semibold text-lg">Professional Facilities</h3>
                                        <p class="text-gray-200">Olympic-standard courts and fields for all sports</p>
                                    </div>
                                </div>

                                <div class="flex items-start">
                                    <div class="pulse-animation bg-yellow-400 p-2 rounded-full mr-4">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-900" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                        </svg>
                                    </div>
                                    <div>
                                        <h3 class="font-semibold text-lg">Expert Coaching</h3>
                                        <p class="text-gray-200">Certified trainers for personalized development</p>
                                    </div>
                                </div>

                                <div class="flex items-start">
                                    <div class="pulse-animation bg-yellow-400 p-2 rounded-full mr-4">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-900" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                        </svg>
                                    </div>
                                    <div>
                                        <h3 class="font-semibold text-lg">Flexible Memberships</h3>
                                        <p class="text-gray-200">Options for individuals, families, and teams</p>
                                    </div>
                                </div>
                            </div>

                            <div class="mt-8 pt-6 border-t border-white/20">
                                <div class="flex justify-between text-center">
                                    <div>
                                        <p class="text-3xl font-bold">15+</p>
                                        <p class="text-sm text-gray-200">Sports</p>
                                    </div>
                                    <div>
                                        <p class="text-3xl font-bold">25+</p>
                                        <p class="text-sm text-gray-200">Courts</p>
                                    </div>
                                    <div>
                                        <p class="text-3xl font-bold">5,000+</p>
                                        <p class="text-sm text-gray-200">Members</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>

<style scoped>
.bg-white\/10 {
    background-color: rgba(255, 255, 255, 0.1);
    backdrop-filter: blur(12px);
    -webkit-backdrop-filter: blur(12px);
}


.explore-btn {
  transition: 0.5s;
  letter-spacing: 2px;
}
.explore-btn:hover {
  background: #ffffff;
  color: #000000;
  box-shadow: 0 0 5px #fff, 0 0 25px #fff, 0 0 50px #fff, 0 0 200px #fff;
}

.explore-btn span {
  position: absolute;
  display: block;
}

.explore-btn span:nth-child(1) {
  top: 0;
  left: 0;
  width: 100%;
  height: 10px;
  background: linear-gradient(90deg, transparent, #fff);
  animation: animate1 1s linear infinite;
}

@keyframes animate1 {
  0% {
    left: -100%;
  }
  50%,
  100% {
    left: 100%;
  }
}

.explore-btn span:nth-child(2) {
  top: -100%;
  right: 0;
  width: 10px;
  height: 100%;
  background: linear-gradient(180deg, transparent, #fff);
  animation: animate2 1s linear infinite;
  animation-delay: 0.25s;
}

@keyframes animate2 {
  0% {
    top: -100%;
  }
  50%,
  100% {
    top: 100%;
  }
}

.explore-btn span:nth-child(3) {
  bottom: 0;
  right: 0;
  width: 100%;
  height: 10px;
  background: linear-gradient(270deg, transparent, #fff);
  animation: animate3 1s linear infinite;
  animation-delay: 0.5s;
}

@keyframes animate3 {
  0% {
    right: -100%;
  }
  50%,
  100% {
    right: 100%;
  }
}

.explore-btn span:nth-child(4) {
  bottom: -100%;
  left: 0;
  width: 10px;
  height: 100%;
  background: linear-gradient(360deg, transparent, #fff);
  animation: animate4 1s linear infinite;
  animation-delay: 0.75s;
}

@keyframes animate4 {
  0% {
    bottom: -100%;
  }
  50%,
  100% {
    bottom: 100%;
  }
}


.hero-gradient {
    background: linear-gradient(135deg, rgba(21, 26, 63, 0.85) 0%, rgba(40, 50, 124, 0.8) 100%);
}

.hero-image {
    background-image: url('https://images.unsplash.com/photo-1534438327276-14e5300c3a48?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1770&q=80');
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
}

.floating-card {
    box-shadow: 0 15px 35px rgba(0, 0, 0, 0.2);
    border: 1px solid rgba(255, 255, 255, 0.18);
}

.explore-btn {
    transition: all 0.3s ease;
    position: relative;
    overflow: hidden;
    z-index: 1;
}

.explore-btn:after {
    content: "";
    position: absolute;
    left: 0;
    top: 0;
    height: 100%;
    width: 100%;
    background: #ffffff;
    z-index: -1;
    transition: transform 0.3s ease;
    transform: scaleX(0);
    transform-origin: right;
}

.explore-btn:hover {
    color: #151a3f;
    box-shadow: 0 5px 15px rgba(255, 215, 0, 0.4);
}

.explore-btn:hover:after {
    transform: scaleX(1);
    transform-origin: left;
}

.sports-icon {
    transition: all 0.3s ease;
}

.sports-icon:hover {
    transform: translateY(-5px);
}

@keyframes pulse-glow {
    0% {
        box-shadow: 0 0 5px rgba(255, 215, 0, 0.5);
    }
    50% {
        box-shadow: 0 0 20px rgba(255, 215, 0, 0.8);
    }
    100% {
        box-shadow: 0 0 5px rgba(255, 215, 0, 0.5);
    }
}

.pulse-animation {
    animation: pulse-glow 2s infinite;
}

</style>
