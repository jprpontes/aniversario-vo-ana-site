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
            <div class="col-auto mx-auto">
                <h2 class="title">
                    Parabéns {{ user.name }}, você completou o quiz!
                </h2>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-md-4 mx-auto">
                <a href="#/" class="btn btn-lg btn-primary w-100 btn-back-home">
                    Voltar para a página principal
                </a>
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

.btn-back-home {
    margin: 5px;
}

.btn-signup {
    margin: 5px;
    height: 60px;
}
</style>
