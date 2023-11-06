<template>
    <div class="bg-blue-700 rounded-full w-12 h-12">
        <h1 class="text-center text-white text-2xl font-bold pt-2">
            {{  question }}
        </h1>
    </div>
    <div class="pb-4 pt-4">
        <h1 class="">
            {{ pergunta }}
        </h1>
    </div>


</template>
<script setup>

defineProps({
    question: {
        type: Number,
    },
    pergunta: {
        type: String,
        required: true
    },

});

</script>
