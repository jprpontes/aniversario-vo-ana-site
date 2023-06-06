<script setup>
import { onMounted, reactive } from "vue";
import QuizAuthLogin from "./QuizAuthLogin.vue";
import QuizAuthSignUp from "./QuizAuthSignUp.vue";

const step = {
    INIT: "init",
    LOGIN: "login",
    SIGNUP: "signup",
};

const data = reactive({
    state: step.INIT,
});

const changeStep = (e, newState) => {
    data.state = newState;
};

onMounted(() => {
    //
});
</script>

<template>
    <div class="container quiz-auth mx-auto" v-if="data.state == step.INIT">
        <div class="row">
            <div class="col-auto p-0">
                <img src="/img/vovo.png" class="img-fluid img-vovo" alt="">
            </div>
            <div class="col-auto p-0 d-flex align-items-center">
                <h1 class="title">QUIZ DA VOVÓ</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-auto">
                <h2 class="subtitle">
                    Será que você sabe tudo sobre Ana Maria Pontes, nossa
                    querida vó Ana? Prove que você já a conhece bem e aprenda
                    mais neste jogo de perguntas e respostas.
                </h2>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-md-4 mx-auto my-2 el-quiz-container">
                <button
                    class="btn btn-lg btn-secondary w-100 text-white"
                    @click="changeStep($event, step.SIGNUP)"
                >
                    NOVO JOGADOR
                </button>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-md-4 mx-auto my-2 el-quiz-container">
                <button
                    class="btn btn-lg btn-outline-secondary w-100"
                    @click="changeStep($event, step.LOGIN)"
                >
                    JÁ TENHO CONTA
                </button>
            </div>
        </div>
    </div>
    <QuizAuthLogin
        v-else-if="data.state == step.LOGIN"
        @back="changeStep($event, step.INIT)"
    />
    <QuizAuthSignUp
        v-else-if="data.state == step.SIGNUP"
        @back="changeStep($event, step.INIT)"
    />
</template>

<style lang="scss" scoped>
@import "../../sass/variables";

.img-vovo {
    width: 100px;
}

.quiz-auth {
    max-width: 900px;
}

.title {
    margin: 0px;
}

.subtitle {
    margin: 10px 10px 50px 10px;
    font-weight: normal;
    font-size: 22px;
}
</style>
