
<script setup lang="ts">
import 'animate.css';

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
                <div
                    class="animate__animated animate__fadeInUp absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 bg-white/10 backdrop-blur-lg border border-white/10 shadow-md rounded-xl my-8 p-4 sm:p-6 md:p-8 w-full max-w-sm sm:max-w-sm md:max-w-md lg:max-w-lg xl:max-w-2xl mx-auto"
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
                        class="explore-btn bg-gradient-to-r from-yellow-200 via-yellow-400 to-yellow-500 hover:bg-gradient-to-br focus:ring-yellow-300 dark:focus:ring-yellow-100 shadow-lg shadow-lime-500/50 dark:shadow-lg dark:shadow-lime-800/80 mt-3 sm:mt-4 px-3 py-1.5 sm:px-4 sm:py-2 md:px-5 md:py-2.5 bg-primary-dark cursor-pointer text-white rounded-md hover:bg-primary-light focus:outline-none focus:ring-2 focus:ring-primary-500 focus:ring-opacity-50 text-sm sm:text-base md:text-lg"
                    >
                        Explore Now
                    </button>

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

</style>
