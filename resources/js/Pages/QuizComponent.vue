<script setup>
import { onMounted, reactive } from "vue";
import QuizAnswer from "./QuizAnswer.vue";

const data = reactive({
    question: {},
    selectedAnswer: null
});

const getQuestion = async () => {
    try {
        const response = await axios.get("/quiz/question");
        data.question.description = response.data.question.description;
        data.question.answers = response.data.question.answers;
    } catch (error) {
        console.error(error);
    }
};

const selectAnswer = (event, answer) => {
    data.selectedAnswer = answer;
};

onMounted(() => {
    getQuestion();
});
</script>

<template>
    <div class="container quiz-component mx-auto">
        <div class="row">
            <h2 class="quiz-question">{{ data.question?.description }}</h2>
        </div>
        <div v-for="answer in data.question?.answers" :key="answer.id" class="row">
            <div class="col">
                <QuizAnswer
                    :answer="answer"
                    :selected="data.selectedAnswer?.id == answer.id"
                    @click="selectAnswer($event, answer)"
                />
            </div>
        </div>
        <div class="row">
            <div class="col-auto ms-auto m-3">
                <button class="btn btn-success btn-lg">Confirmar</button>
            </div>
        </div>
    </div>
</template>

<style lang="scss" scoped>
@import "../../sass/variables";

.quiz-component {
    margin: 20px;
    max-width: 900px;
}

.quiz-question {
    margin: 40px 10px 30px 10px;
}
</style>
