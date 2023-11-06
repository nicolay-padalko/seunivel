<template>
    <div class="grid grid-cols-2  pt-6">
        <div class="pl-12">
            <h1 class="text-3xl font-medium">English Test</h1>
        </div>
        <div class="flex flex-row justify-end pr-20">
            <div>
                <Timer/>
            </div>
        </div>
    </div>

    <div class="pl-12 pt-8 pb-6">
        <p>Read the question carefully and choose the best option.</p>
    </div>
    <div class="flex flex-col justify-items-center">
        <div class="grid grid-rows-2">
            <h1 class="text-lg text-center">
                Complete test - part 1 of 3
            </h1>
            <div class="pt-4 pl-12 pr-12">
                <div class="bg-gray-400 rounded-full h-3.5 dark:bg-gray-600 ">
                    <div class="bg-green-500 h-3.5 rounded-full" :style="{width: totalProgress + '%'}"></div>
                </div>
            </div>
        </div>
        <div class="grid grid-rows-2 pt-6">
            <h1 class="text-lg text-center">
                Questions {{ count }} of 18
            </h1>
            <div class="pt-4 pl-12 pr-12">
                <div class="bg-gray-400 rounded-full h-3.5 dark:bg-gray-600">
                    <div class="w-">
                        <div class="bg-green-500 h-3.5 rounded-full" :style="{width: progress + '%'}"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div>
        <div class="pb-12 pt-3">
            <div class="p-4">
                <div class="flex flex-col pt-6 justify-center items-center">
                    <div class="w-full max-w-3xl ">
                        <form @submit.prevent="submit">

                            <Question
                                :question="count"
                                :pergunta="csv[count][0]"
                            />

                            <AnswerOption name="A" id="A"
                                          :value="csv[count][1]"
                                          :selected="selected"
                                          @update:selected="selected = $event"/>

                            <AnswerOption name="B" id="B"
                                          :value="csv[count][2]"
                                          :selected="selected"
                                          @update:selected="selected = $event"/>

                            <AnswerOption name="C" id="C"
                                          :value="csv[count][3]"
                                          :selected="selected"
                                          @update:selected="selected = $event"/>

                            <AnswerOption name="D" id="D"
                                          :value="csv[count][4]"
                                          :selected="selected"
                                          @update:selected="selected = $event"/>


                            <div  class="flex flex-col justify-center pt-6 pl-24 pr-24">
                                <a v-if=" textButton  === 'Finish'" href="/reading">
                                    <button
                                            class="bg-blue-500 p-3 font-medium rounded-lg text-center">
                                        {{ textButton }}
                                    </button>
                                </a>
                                <button v-else  @click="changeQuestion"
                                        class="bg-blue-500 p-3 font-medium rounded-lg text-center">
                                    {{ textButton }}
                                </button>
                            </div>
                        </form>
                        <!--                        <span>Seleção: {{ selected }}</span>-->
                    </div>
                </div>
            </div>
        </div>
    </div>


</template>

<script setup>
import Timer from "@/Pages/Components/Timer.vue";
import Question from "@/Pages/Frontend/Question.vue";
import {ref} from "vue";
import AnswerOption from "@/Pages/Frontend/AnswerOption.vue";
import {useForm} from "@inertiajs/vue3";


const props = defineProps([
    'csv',
    'value',
    'selected',
])

const count = ref(1)
let progress = ref(0)
let totalProgress = ref(0)
let textButton = ref('Next Question')

function changeQuestion() {
    if (count.value <= 17) {
        progress = 100 / 17 * count.value
        let csv = props.csv;
        let selected = props.selected;
        if (selected === csv[count.value][5]) {
            form.answer_id = count.value
            form.answer = 'correct'
        } else {
            form.answer_id = count.value
            form.answer = 'wrong'
        }
        count.value++
    }
    if (count.value === 18) {
        textButton = 'Finish'
        totalProgress = 33
    }
}

const form = useForm({
    answer_id: '',
    answer: '',
    question: '',
});

const submit = () => {
    form.post(route('answer'))
};

</script>



