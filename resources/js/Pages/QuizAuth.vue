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
            <div class="col-auto mx-auto">
                <h2 class="title">
                    Para jogar o quiz faça login ou crie um novo jogador.
                </h2>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-md-4 mx-auto my-2">
                <button
                    class="btn btn-lg btn-primary w-100 btn-login"
                    @click="changeStep($event, step.LOGIN)"
                >
                    Login
                </button>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-md-4 mx-auto my-2">
                <button
                    class="btn btn-lg btn-outline-secondary w-100 btn-signup"
                    @click="changeStep($event, step.SIGNUP)"
                >
                    Criar novo jogador
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

.quiz-auth {
    margin: 20px;
    max-width: 900px;
}

.title {
    margin: 40px 10px 30px 10px;
}

.btn-login {
    height: 60px;
}

.btn-signup {
    height: 60px;
}
</style>
