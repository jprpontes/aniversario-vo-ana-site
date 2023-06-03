<script setup>
import { computed } from "@vue/reactivity";
import { onMounted } from "vue";
import { useStore } from "vuex";

const store = useStore();

const emit = defineEmits(["play", "signOut"]);

const play = () => {
    emit("play");
};

const signOut = () => {
    emit("signOut");
};

const user = computed(() => {
    return store.state.user;
});

onMounted(() => {
    //
});
</script>

<template>
    <div class="container quiz-auth mx-auto">
        <div class="row">
            <div class="col-auto mx-auto">
                <h2 class="title">Olá {{ user.name }}!</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-md-4 mx-auto">
                <button
                    class="btn btn-lg btn-primary w-100 btn-login"
                    @click="play"
                >
                    Jogar
                </button>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-md-4 mx-auto">
                <button class="btn btn-lg btn-link w-100" @click="signOut">
                    Sair
                </button>
            </div>
        </div>
    </div>
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
    margin: 5px;
    height: 60px;
}

.btn-signup {
    margin: 5px;
    height: 60px;
}
</style>
