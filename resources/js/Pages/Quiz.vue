<script setup>
import { Head } from "@inertiajs/vue3";
import QuizComponent from './QuizComponent.vue';
</script>

<template>
    <div>
        <Head title="Aniversário Ana Maria Pontes" />
        <section class="quiz-section">
            <QuizComponent />
        </section>
    </div>
</template>

<style lang="scss" scoped>
@import "../../sass/variables";
.quiz-section {
    margin-top: 56px;
}
</style>
