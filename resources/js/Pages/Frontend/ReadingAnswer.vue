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
    <div class="p-1">
        <div class="bg-gray-300 rounded-lg p-3">
            <input type="radio" id="opcaoA" name="resposta">
            <label class="pl-6" for="opcaoA">{{ opcaoA }}</label>
        </div>
    </div>
    <div class="p-1">
        <div class="bg-gray-300 rounded-lg p-3">
            <input type="radio" id="opcaoB" name="resposta">
            <label class="pl-6" for="opcaoB">{{ opcaoB }}</label>
        </div>
    </div>
    <div class="p-1">
        <div class="bg-gray-300 rounded-lg p-3">
            <input type="radio" id="opcaoC" name="resposta" >
            <label class="pl-6" for="opcaoC">{{ opcaoC }}</label>
        </div>
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
    opcaoA: {
        type: String,
        required: true
    },
    opcaoB: {
        type: String,
        required: true
    },
    opcaoC: {
        type: String,
        required: true
    },

});

</script>
