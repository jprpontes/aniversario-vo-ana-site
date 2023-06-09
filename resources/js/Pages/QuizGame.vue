<script setup>
import { onMounted, reactive } from "vue";
import QuizAnswer from "./QuizAnswer.vue";
import QuizCompleted from "./QuizCompleted.vue";
import QuizStory from "./QuizStory.vue";
import QuizProgress from "./QuizProgress.vue";

const step = {
    QUESTION: "question",
    QUESTION_RESULT: "question_result",
    STORY: "story",
    CONGRATS: "congrats",
};

const changeStep = (e, newState) => {
    data.state = newState;
};

const data = reactive({
    state: step.QUESTION,
    question: null,
    progress: null,
    story: null,
    correctAnswer: null,
    selectedAnswer: null,
});

const getQuestion = async () => {
    data.selectedAnswer = null;
    data.question = null;
    data.story = null;
    data.correctAnswer = null;

    try {
        const response = await axios.get("/quiz/question");

        if (response.data.status_code == "COMPLETED") {
            data.state = step.CONGRATS;
            return;
        }

        data.question = response.data.data.question;
        data.progress = response.data.data.progress;
    } catch (error) {
        console.error(error);
    }
};

const selectAnswer = (event, answer) => {
    if (data.correctAnswer) {
        return;
    } else if (answer.id == data.selectedAnswer?.id) {
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
        data.story = response.data.data.story;
        data.correctAnswer = response.data.data.correctAnswer;
        data.state = step.QUESTION_RESULT;
    } catch (error) {
        console.error(error);
    }
};

const showStory = () => {
    data.state = step.STORY;
};

const nextQuestion = () => {
    data.state = step.QUESTION;
    getQuestion();
};

onMounted(() => {
    getQuestion();
});
</script>

<template>
    <QuizCompleted v-if="data.state == step.CONGRATS" />
    <QuizStory
        v-else-if="data.state == step.STORY"
        :story="data.story"
        @next-question="nextQuestion"
    />
    <div
        v-else-if="
            data.state == step.QUESTION || data.state == step.QUESTION_RESULT
        "
        class="container quiz-component mx-auto"
    >
        <div class="row">
            <div class="col-12">
                <QuizProgress class="animate__animated animate__bounceInLeft" :total="data.progress?.total" :completed="data.progress?.completed" />
            </div>
        </div>
        <div class="row">
            <div class="col">
                <h2 class="quiz-question animate__animated animate__bounceInLeft">{{ data.question?.description }}</h2>
            </div>
        </div>
        <div
            v-for="(answer, index) in data.question?.answers"
            :key="answer.id"
            class="row animate__animated animate__bounceInRight"
        >
            <div class="col">
                <QuizAnswer
                    :index="index"
                    :answer="answer"
                    :correctAnswer="data.correctAnswer"
                    :selected="data.selectedAnswer?.id == answer.id"
                    @click="selectAnswer($event, answer)"
                />
            </div>
        </div>
        <div
            class="row"
            v-if="data.state == step.QUESTION && data.selectedAnswer"
        >
            <div class="col-12 col-md-3 ms-auto m-3 el-quiz-container">
                <button class="btn btn-success btn-lg w-100" @click="confirm">
                    CONFIRMAR
                </button>
            </div>
        </div>
        <div class="row" v-else-if="data.state == step.QUESTION_RESULT">
            <div class="col-12 col-md-3 ms-auto m-3 el-quiz-container">
                <button v-if="data?.question?.hasStory" class="btn btn-success btn-lg w-100" @click="showStory">
                    VER HISTÓRIA
                </button>
                <button v-else class="btn btn-secondary btn-lg w-100 text-white" @click="nextQuestion">
                    PRÓXIMA QUESTÃO
                </button>
            </div>
        </div>
    </div>
</template>

<style lang="scss" scoped>
@import "../../sass/variables";

.quiz-component {
    margin: 10px;
    max-width: 900px;
}

.quiz-question {
    margin: 10px 10px 30px 10px;
}
</style>
