<template>

    <div class="p-1">
        <div class="bg-gray-300 rounded-lg p-3">
            <input
                type="radio"
                :value=value
                :checked="isSelected"
                @input="$emit('update:selected', value)">

            <label class="pl-6">{{ value }}</label>
        </div>
    </div>


</template>
<script setup>

import {defineProps, defineEmits} from 'vue';

const {value} = defineProps(['value', 'selected']);
const emit = defineEmits();


</script>

<script>

export default {
    computed: {
        isSelected() {
            return this.value === this.selected;
        },
    }
}
</script>


