<script setup>
import { onMounted, reactive } from "vue";
import QuizAnswer from "./QuizAnswer.vue";

const data = reactive({
    question: {},
    selectedAnswer: null,
});

const getQuestion = async () => {
    data.selectedAnswer = null;
    data.question = {};

    try {
        const response = await axios.get("/quiz/question");

        if (response.data.status_code == 'COMPLETED') {
            //Exibir parabéns para o jogador.
            return;
        }

        data.question = response.data.data.question;
    } catch (error) {
        console.error(error);
    }
};

const selectAnswer = (event, answer) => {
    if (answer.id == data.selectedAnswer?.id) {
        data.selectedAnswer = null;
    } else {
        data.selectedAnswer = answer;
    }
};

const confirm = async () => {
    try {
        const response = await axios.post("/quiz/answer-question", {
            question_id: data.question.id,
            answer_id: data.selectedAnswer.id,
        });
        getQuestion();
    } catch (error) {
        console.error(error);
    }
};

onMounted(() => {
    getQuestion();
});
</script>

<template>
    <div class="container quiz-component mx-auto">
        <div class="row">
            <div class="col">
                <h2 class="quiz-question">{{ data.question?.description }}</h2>
            </div>
        </div>
        <div
            v-for="(answer, index) in data.question?.answers"
            :key="answer.id"
            class="row"
        >
            <div class="col">
                <QuizAnswer
                    :index="index"
                    :answer="answer"
                    :selected="data.selectedAnswer?.id == answer.id"
                    @click="selectAnswer($event, answer)"
                />
            </div>
        </div>
        <div class="row" v-if="data.selectedAnswer">
            <div class="col-auto ms-auto m-3">
                <button class="btn btn-success btn-lg" @click="confirm">
                    Confirmar
                </button>
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
