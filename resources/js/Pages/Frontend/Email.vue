
<template>
    <div class=" pt-6">
        <div class="pl-12">
            <h1 class="text-3xl font-medium">Writing - Answer this email in 150 words</h1>
        </div>
    </div>
    <div class="flex flex-col justify-items-center">
        <div class="grid grid-rows-2">
            <h1 class="text-lg text-center">
                Complete test - part 3 of 3
            </h1>
            <div class="pt-4 pl-12 pr-12">
                <div class="bg-gray-400 rounded-full h-3.5 dark:bg-gray-600 ">
                    <div class="bg-green-500 h-3.5 rounded-full" style="width: 66%"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="p-32 pt-16 pb-6">
        <p> Hi Helga,

            I've been meaning to write to you for ages now so don't worry! How is work? And the family, I’d love to hear
            your news!!!!
            As for me, I'll have been in the new job three months by the end of next week so I'm feeling more settled
            in. At first I felt like I had no idea what I was doing but now I realise it's normal to feel like that.
            There was a lot to learn – there still is actually – and I soon had to get used to the idea that I can't
            know everything. I used to work late a lot and at weekends but I'm slowly getting into a normal routine.
            Which means I'd love to come and visit! We really need a good catch up! I can't believe we haven't seen each
            other since Carl's wedding. How does next month sound?

            Anyway, I'd better get back to work.
            Please do write and share your news

            Love,
            Linda

            Hi Linda,
        </p>
    </div>
    <form @submit.prevent="submit">
        <div class="pr-24 pl-24">
            <label for="message" class="block mb-2 text-sm font-medium text-gray-900 ">Your answer</label>

            <textarea id="message"
                      rows="4"
                      v-model="form.answer"
                      class="block p-2.5 w-full text-sm text-gray-900 bg-gray-200 rounded-lg border border-gray-300
              focus:ring-blue-500 focus:border-blue-500"
                      placeholder="Type your answer here..."></textarea>
        </div>
        <div class="flex flex-col justify-center pt-6 pl-24 pr-24">
            <button type="submit" class="bg-blue-500 p-3 font-medium rounded-lg text-center">
                Send Answer
            </button>
        </div>
    </form>
</template>

<script setup>

import {useForm} from "@inertiajs/vue3";
import {defineProps} from "vue";

const props = defineProps([
    'answer',
])

const form = useForm({
    answer: props.answer,
});
const submit = () => {
    form.post(route('emailanswer'))
};
</script>

