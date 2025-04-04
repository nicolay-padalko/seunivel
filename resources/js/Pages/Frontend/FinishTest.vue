<template>
    <top-bar/>
    <div class="flex justify-center min-h-screen bg-indigo-200">

        <div class="w-5/6 lg:w-2/3">
            <div class="flex flex-row">
                <div class="flex-auto p-2 lg:p-6">
                    <div class="flex justify-center">
                        <h1 class="text-4xl font-bold pt-12 text-blue-800">
                            Teste da língua Inglesa.
                        </h1>
                    </div>
                    <div class="flex justify-center">
                        <p class="text-2xl pt-12">
                            O teste foi finalizado.<br>
                            Obrigado por participar.<br>

                        </p>

                    </div>

                </div>

            </div>
            <!-- <div class="flex justify-center">
                <a href="/question">
                    <button
                        class="bg-blue-500 p-3 font-medium rounded-lg text-center w-72">
                        Start Test
                    </button>
                </a>

            </div> -->
        </div>
    </div>

</template>

<script setup>

import TopBar from "@/Pages/Components/TopBar.vue";


</script>

<style scoped>

</style>
