<script setup>


import {Link} from "@inertiajs/vue3";
import ApplicationLogo from "@/Components/ApplicationLogo.vue";
</script>

<template>
    <div class="bg-gray-100 min-h-screen flex flex-col pt-6 justify-center items-center">
        <div class="bg-white w-full max-w-3xl mt-6 px-6 py-4 overflow-hidden rounded-lg">
            <slot/>
        </div>
    </div>
</template>

<style scoped>

</style>
