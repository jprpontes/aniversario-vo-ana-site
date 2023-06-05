<script setup>
import { computed } from "@vue/reactivity";
import { onMounted, reactive } from "vue";
import { useStore } from "vuex";

const store = useStore();

const data = reactive({
    //
});

const getRanking = async () => {
    data.selectedAnswer = null;
    data.question = {};

    try {
        const response = await axios.get("/quiz/question");

        if (response.data.status_code == "COMPLETED") {
            data.completed = true;
            return;
        }

        data.question = response.data.data.question;
    } catch (error) {
        console.error(error);
    }
};

const user = computed(() => {
    return store.state.user;
});

onMounted(() => {
    //getRanking();
});
</script>

<template>
    <div class="container quiz-auth mx-auto">
        <div class="row">
            <div class="col-auto">
                <h1 class="title">
                    Parabéns <span class="text-secondary">{{ user.name }}</span
                    >, você completou o quiz!
                </h1>
            </div>
        </div>
        <div class="row">
            <div class="col-auto">
                <h2 class="subtitle">
                    Agora tenho certeza que você passou a conhecer mais a nossa
                    querida vó Ana, mas lembre-se que você pode conhecê-la ainda
                    mais e saber de mais histórias passando lá e tomando um bom
                    café com biscoito de polvilho.
                </h2>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-md-6 mx-auto my-2 el-quiz-container">
                <a
                    href="#/"
                    class="btn btn-lg btn-secondary w-100 btn-quiz text-white btn-back-home"
                >
                    VOLTAR PARA A PÁGINA PRINCIPAL
                </a>
            </div>
        </div>
    </div>
</template>

<style lang="scss" scoped>
@import "../../sass/variables";
@import "../../sass/custom";

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

.btn-back-home {
    align-items: center;
    justify-content: center;
    display: flex;
}
</style>
