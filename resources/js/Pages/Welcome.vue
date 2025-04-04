<script setup>
import {Head, Link, useForm} from '@inertiajs/vue3';
import TopBar from "@/Pages/Components/TopBar.vue";
import InputLabel from "@/Components/InputLabel.vue";
import InputError from "@/Components/InputError.vue";
import TextInput from "@/Components/TextInput.vue";
import * as path from "path";

const registerUser = () => {
    return view('register');
};
</script>

<template>
    <TopBar/>
    <div class="flex flex-col bg-indigo-200 min-h-screen pt-12 ">
        <div class="">
            <div class="flex flex-col pt-6 justify-center items-center">
                <div class="w-full max-w-2xl ">

<!--                    <div class="place-content-center">-->
<!--                        <div class="mt-8 ">-->
<!--                            <InputLabel for="email" value="Email"/>-->
<!--                            <TextInput-->
<!--                                id="email"-->
<!--                                type="email"-->
<!--                                class="mt-1 block w-full"-->
<!--                                v-model="form.email"-->
<!--                                required-->
<!--                                autocomplete="username"-->
<!--                            />-->
<!--                            <InputError class="mt-2" :message="form.errors.email"/>-->
<!--                        </div>-->
<!--                        <div class="mt-4">-->
<!--                            <InputLabel for="password" value="Password"/>-->

<!--                            <TextInput-->
<!--                                id="password"-->
<!--                                type="password"-->
<!--                                class="mt-1 block w-full"-->
<!--                                v-model="form.password"-->
<!--                                required-->
<!--                                autocomplete="new-password"-->
<!--                            />-->
<!--                            <InputError class="mt-2" :message="form.errors.password"/>-->
<!--                        </div>-->
<!--                    </div>-->
                </div>
                <div>
                    <h1 class="text-sm md:text-xl text-black text-center md:pt-12">
                        Teste de Inglês.

                    </h1>
                </div>

                <h1 class="text-sm md:text-xl text-black text-center md:pt-12">
<!--                    Digite seu email e senha para acessar o sistema.-->
                    Crie seu cadatro com usuario e senha.
                </h1>
            </div>
            <div class="flex justify-center pt-9">
                <a href="/register">
                    <button
                        class="bg-blue-500 p-3 font-medium rounded-lg text-center w-72">
                        Iniciar
                    </button>
                </a>

            </div>


        </div>

    </div>


</template>

<style>

</style>
