<template>
    <nav class="bg-blue-500 p-4">
        <div class="flex items-center justify-between">
            <div class="text-white text-lg font-bold">URL Shortener</div>

            <div class="md:hidden">
                <button @click="toggleMenu" class="text-white focus:outline-none">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>
                    </svg>
                </button>
            </div>

            <div class="hidden md:flex space-x-4">
                <a href="https://github.com/justtpaulo" class="bg-white rounded-full py-2 px-4 text-black">Autor</a>
            </div>
        </div>

        <div v-if="isMenuOpen" class="md:hidden mt-2">
            <a href="https://github.com/justtpaulo" class="p-2 text-white">• Autor</a>
        </div>
    </nav>
</template>
  
<script setup>
    import { ref } from "vue";

    const isMenuOpen = ref(false);
    
    const toggleMenu = () => {
        isMenuOpen.value = !isMenuOpen.value;
    };
</script>

<style>
</style>