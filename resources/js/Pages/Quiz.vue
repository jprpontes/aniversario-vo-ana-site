<script setup>
import { Head } from "@inertiajs/vue3";
import QuizGame from "./QuizGame.vue";
import QuizAuth from "./QuizAuth.vue";
import QuizWelcome from "./QuizWelcome.vue";
import { useStore } from "vuex";
import { computed } from "@vue/reactivity";
import { reactive } from "vue";

const store = useStore();

const data = reactive({
    playing: false,
});

const token = computed(() => {
    return store.state.token;
});

const play = () => {
    data.playing = true;
};

const signOut = async () => {
    try {
        const response = await axios.delete("/sanctum/token");
    } catch (error) {
        console.log(error);
    } finally {
        store.dispatch("signOut");
        data.playing = false;
    }
};
</script>

<template>
    <div>
        <Head title="Aniversário Ana Maria Pontes" />
        <section class="quiz-section">
            <QuizGame v-if="token && data.playing" />
            <QuizWelcome v-else-if="token" @play="play" @signOut="signOut" />
            <QuizAuth v-else />
        </section>
    </div>
</template>

<style lang="scss" scoped>
@import "../../sass/variables";
.quiz-section {
    margin-top: 56px;
    /* height: calc(100vh - 56px); */
    /* display: flex; */
    /* align-items: center; */
}
</style>
