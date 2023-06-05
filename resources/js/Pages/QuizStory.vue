<script setup>
import { onMounted, reactive } from "vue";
import { useStore } from "vuex";

const store = useStore();

const props = defineProps(["story"]);

const emit = defineEmits(["next-question"]);

const nextQuestion = () => {
    emit("next-question");
};

const data = reactive({
    //
});

onMounted(() => {
    //
});
</script>

<template>
    <div class="container quiz-auth mx-auto">
        <div class="row">
            <div class="col-auto">
                <h1 class="title">{{ props.story.name }}</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-auto">
                <p class="description">
                    {{ props.story.description }}
                </p>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-md-3 ms-auto m-3 el-quiz-container">
                <button
                    class="btn btn-lg btn-secondary w-100 btn-quiz text-white"
                    @click="nextQuestion"
                >
                    PRÓXIMA QUESTÃO
                </button>
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
}

.description {
    margin: 10px 10px 50px 10px;
    font-weight: normal;
}
</style>
