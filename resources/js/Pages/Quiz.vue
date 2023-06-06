<script setup>
import { Head } from "@inertiajs/vue3";
import QuizGame from "./QuizGame.vue";
import QuizAuth from "./QuizAuth.vue";
import QuizWelcome from "./QuizWelcome.vue";
import { useStore } from "vuex";
import { computed } from "@vue/reactivity";
import { onMounted, reactive } from "vue";
import Divider from "./Divider.vue";

const store = useStore();

const data = reactive({
    playing: false,
    mounted: false,
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

onMounted(() => {
    data.mounted = true;
});
</script>

<template>
    <div>
        <Head title="Níver vó Ana" />
        <section class="quiz-section" v-if="data.mounted">
            <!-- <Transition name="effect" mode="out-in"> -->
            <QuizGame v-if="token && data.playing" />
            <QuizWelcome v-else-if="token" @play="play" @signOut="signOut" />
            <QuizAuth v-else />
            <!-- </Transition> -->
        </section>
        <Divider direction="UP" color="#fed54a" style="position:fixed; bottom: 0;" />
    </div>
</template>

<style lang="scss" scoped>
@import "../../sass/variables";

.quiz-section {
    /* height: 100vh; */
    display: flex;
    /* align-items: center; */
    margin-bottom: 10px;
}
.effect-enter-active {
    transition: all 0.3s ease-out;
}

.effect-enter-from {
    transform: translateX(20px);
    opacity: 0;
}
</style>
