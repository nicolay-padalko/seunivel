<template>
    <div class="grid grid-cols-2  pt-6">
        <div class="pl-12">
            <h1 class="text-3xl font-medium">English Test</h1>
        </div>
        <div class="flex flex-row justify-end pr-20">
            <div>
                <Timer />
            </div>
        </div>
    </div>
    <div class="pl-12 pt-8 pb-6">
        <p>Read the text carefully and choose the best option.</p>
    </div>
    <div class="flex flex-col justify-items-center">
        <div class="grid grid-rows-2">
            <h1 class="text-lg text-center">
                Complete test - part 2 of 3
            </h1>
            <div class="pt-4 pl-12 pr-12">
                <div class="bg-gray-400 rounded-full h-3.5 dark:bg-gray-600 ">
                    <div class="bg-green-500 h-3.5 rounded-full" :style="{ width: totalProgress + '%' }"></div>
                </div>
            </div>
        </div>
        <div class="grid grid-rows-2 pt-6">
            <h1 class="text-lg text-center">
                Questions {{ count }} of 5
            </h1>
            <div class="pt-4 pl-12 pr-12">
                <div class="bg-gray-400 rounded-full h-3.5 dark:bg-gray-600">
                    <div class="w-">
                        <div class="bg-green-500 h-3.5 rounded-full" :style="{ width: progress + '%' }"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="p-6 lg:pr-16 pl-16 pt-16 pb-6">
        <p> Hi! Sue

            I've been meaning to write for ages and finally today I'm actually doing something about it. Not that I'm
            trying to make excuses for myself, it's been really hard to sit down and write, as I've been moving around
            so much. Since we last saw each other I've unpacked my bags in four different cities. This job has turned
            out to be more of a whirlwind than I expected, but it's all good!
            I went from London to Prague to set up a new regional office there. You know I'd always wanted to go, but
            maybe I was imagining Prague in spring when I used to talk about that. Winter was really hard, with minus 15
            degrees in the mornings and dark really early in the evening. But at least it was blue skies and white snow
            and not days on end of grey skies and rain, like at home. It's tough being away from home over Christmas,
            though, and Skype on Christmas Day wasn't really the same as being with everyone.
            So then I was posted to LA, which felt like a whole other country compared with the East Coast. I could
            definitely get used to that kind of outdoor, beach lifestyle, but I didn't spend as much time getting to
            know California as I could have because I kind of met someone (!) More about Michael later.
            Those three months flew by and then I was off again, to Frankfurt, which is where I am now. And … so is
            Michael! He got a month off work and we're trying to work out how we can be in the same place at the same
            time for a while. We figure the first step in that direction is getting married, which is also why I wanted
            to write – I can't get married without my oldest friend there! The wedding's going to be at home in London
            in September and I hope you can come!
            Anyway, tell me all your news and I promise not to leave it so long this time!
            Lots of love,
            Kathy

        </p>
    </div>
    <div class="flex flex-col pt-2 justify-center items-center">
        <div class="w-full max-w-3xl p-2">
            <form @submit.prevent="submit">

                <Question :question="count" :pergunta="read[count][0]" />

                <Answer name="A" id="A" :value="read[count][1]" :selected="selected"
                    @update:selected="selected = $event" />
                <Answer name="B" id="B" :value="read[count][2]" :selected="selected"
                    @update:selected="selected = $event" />
                <Answer name="C" id="C" :value="read[count][3]" :selected="selected"
                    @update:selected="selected = $event" />

                <div class="flex flex-col justify-center pt-6 pl-24 pr-24">
                    <button v-if="textButton === 'Finish'" @click="finishTest"
                        class="bg-blue-500 p-3 font-medium rounded-lg text-center">
                        {{ textButton }}
                    </button>
                    <button v-else @click="changeQuestion" class="bg-blue-500 p-3 font-medium rounded-lg text-center">
                        {{ textButton }}
                    </button>
                </div>
            </form>
        </div>
    </div>

</template>

<script setup>

import { ref } from "vue";
import Timer from "@/Pages/Components/Timer.vue";
import Question from "@/Pages/Frontend/Question.vue";
import Answer from "@/Pages/Frontend/AnswerOption.vue";
import { useForm } from "@inertiajs/vue3";

const props = defineProps([
    'read',
    'value',
    'selected',
])

const count = ref(1)
let progress = ref(0)
let textButton = ref('Next Question')

let totalProgress = ref(33)

function changeQuestion() {
    let read = props.read;
    let selected = props.selected;

    if (selected === read[count.value][4]) {
        form.r_answer_id = count.value;
        form.r_answer = 'correct';
    } else {
        form.r_answer_id = count.value;
        form.r_answer = 'wrong';
    }

    submit();
    

    if (count.value < 5) {
        count.value++;
        progress.value = (100 / 5) * (count.value - 1);
    }
    if (count.value === 5) {
        textButton.value = 'Finish';
        totalProgress.value = 66;
    }
}

function finishTest() {
    let read = props.read;
    let selected = props.selected;

    if (selected === read[count.value][4]) {
        form.r_answer_id = count.value;
        form.r_answer = 'correct';
    } else {
        form.r_answer_id = count.value;
        form.r_answer = 'wrong';
    }
    submit();

    setTimeout(() => {
        goToEmail();
    }, 500); 
}

function goToEmail() {
    // window.location.href = '/write';
    window.location.href = '/finish';
}

const form = useForm({
    question_id: '',
    r_answer_id: '',
    r_answer: '',
    question: '',
});

const submit = () => {
    form.post(route('readAnswer'))
};

</script>

<style scoped></style>
