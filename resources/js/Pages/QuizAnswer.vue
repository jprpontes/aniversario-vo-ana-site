<script setup>
import { computed } from "@vue/reactivity";

const props = defineProps(["index", "answer", "correctAnswer", "selected"]);

const isCorrect = computed(() => {
    return props.answer.id == props?.correctAnswer?.id;
});

const isIncorrect = computed(() => {
    return (
        props.selected &&
        props?.correctAnswer &&
        props.answer.id != props?.correctAnswer?.id
    );
});

const getOption = (index) => {
    return ["A", "B", "C", "D", "E"][index];
};
</script>

<template>
    <div
        class="quiz-answer animate__animated"
        :class="{
            selected: props.selected ? true : false,
            correct: isCorrect,
            animate__flash: isCorrect,
            incorrect: isIncorrect,
            animate__shakeX: isIncorrect,
        }"
    >
        <span class="answer-option">{{ getOption(props.index) }}</span>
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

    &:not(.selected, .correct, .incorrect):hover {
        background-color: darken($color: $bg-white-1, $amount: 2%);
        border-color: darken($color: $bg-white-2, $amount: 2%);
    }
}

.answer-option {
    width: 31px;
    height: 31px;
    /* border-top-left-radius: 10px;
    border-bottom-left-radius: 10px; */
    border-radius: 100%;
    display: flex;
    align-items: center;
    justify-content: center;
    background-color: $secondary;
    color: white;
    margin: 0px 15px;
}

.answer-text {
    margin: 0px 5px;
}

.selected {
    background-color: $primary;
    border-color: $primary;
}

.correct {
    background-color: $success;
    border-color: $success;
}

.incorrect {
    background-color: $danger;
    border-color: $danger;
}
</style>
