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
            <div class="col-auto">
                <h1 class="title">
                    OLÁ <span class="text-secondary">{{ user.name }}</span
                    >!
                </h1>
            </div>
        </div>
        <div class="row">
            <div class="col-auto">
                <h2 class="subtitle">
                    Pronto para testar seus conhecimentos? Clique no botão
                    abaixo para iniciar.
                </h2>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-md-4 mx-auto el-quiz-container">
                <button
                    class="btn btn-lg btn-secondary w-100 text-white"
                    @click="play"
                >
                    JOGAR
                </button>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-md-4 mx-auto">
                <button
                    class="btn btn-lg btn-link text-secondary w-100"
                    @click="signOut"
                >
                    SAIR
                </button>
            </div>
        </div>
    </div>
</template>

<style lang="scss" scoped>
@import "../../sass/variables";

.quiz-auth {
    max-width: 900px;
}

.title {
    margin: 50px 10px 10px 10px;
    text-transform: uppercase;
}

.subtitle {
    margin: 10px 10px 50px 10px;
    font-weight: normal;
    font-size: 22px;
}
</style>
