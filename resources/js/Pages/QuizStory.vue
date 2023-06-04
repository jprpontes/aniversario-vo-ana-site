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
            <div class="col-auto mx-auto">
                <h2 class="title">
                    {{ props.story.name }}
                </h2>
            </div>
        </div>
        <div class="row">
            <div class="col-auto mx-auto">
                <p class="description">
                    {{ props.story.description }}
                </p>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-md-4 mx-auto">
                <button
                    class="btn btn-lg btn-primary w-100 btn-next"
                    @click="nextQuestion"
                >
                    Próxima questão
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

.description {
    margin: 0px 10px 30px 10px;
}

.btn-next {
    margin: 5px;
}
</style>
