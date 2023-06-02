<script setup>
const props = defineProps(['answer', 'selected'])
</script>

<template>
    <div class="quiz-answer" :class="{'selected': props.selected ? true : false}">
        <span class="answer-text">{{ props.answer.description }}</span>
    </div>
</template>

<style lang="scss" scoped>
@import "../../sass/variables";

.quiz-answer {
    height: 65px;
    border: 2px solid $bg-white-2;
    background-color: $bg-white-1;
    margin: 4px;
    display: flex;
    align-items: center;
    cursor: pointer;
    border-radius: 10px;

    &:not(.selected):hover {
        background-color: darken($color: $bg-white-1, $amount: 2%);
        border-color: darken($color: $bg-white-2, $amount: 2%);
    }
}

.answer-text {
    margin: 0px 20px;
}

.selected {
    background-color: $primary;
    border-color: $primary;
}
</style>
