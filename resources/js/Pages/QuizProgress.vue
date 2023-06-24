<script setup>
const props = defineProps(["total", "completed"]);
</script>

<template>
    <div class="quiz-progress">
        <span>Questão </span>
        <span>{{ props.completed+1 }}</span>
        <span> de </span>
        <span>{{ props.total }}</span>
    </div>
</template>

<style lang="scss" scoped>
@import "../../sass/variables";

.quiz-progress {
    margin: 10px 10px 10px 10px;
}
</style>
