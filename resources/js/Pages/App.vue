<script setup>
import { ref, computed, onMounted } from "vue";
import { useStore } from "vuex";
import Home from "./Home.vue";
import Quiz from "./Quiz.vue";
import Divider from "./Divider.vue";

const store = useStore();

const routes = {
    "/": Home,
    "/quiz": Quiz,
};

const currentPath = ref(window.location.hash);

window.addEventListener("hashchange", () => {
    currentPath.value = window.location.hash;
});

const currentView = computed(() => {
    return routes[currentPath.value.slice(1) || "/"] || NotFound;
});

onMounted(() => {
    store.dispatch("checkAuth");
});
</script>

<template>
    <!-- <a href="#/">Home</a> | <a href="#/about">About</a> |
    <a href="#/non-existent-path">Broken Link</a> -->
    <nav class="navbar navbar-expand-lg bg-primary">
        <div class="container">
            <a class="navbar-brand" href="#">Níver vó Ana</a>
            <button
                class="navbar-toggler"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#navbarNavDropdown"
                aria-controls="navbarNavDropdown"
                aria-expanded="false"
                aria-label="Toggle navigation"
            >
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#/"
                            >Home</a
                        >
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#/quiz">Quiz</a>
                    </li>
                    <!-- <li class="nav-item">
                        <a class="nav-link" href="#">Local</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Planos</a>
                    </li> -->
                </ul>
            </div>
        </div>
    </nav>
    <Divider direction="DOWN" color="#fed54a" />
    <component :is="currentView" />
</template>

<style lang="scss" scoped>
@import "../../sass/variables";
/* @import "../../sass/custom"; */
</style>
<style lang="scss">
#app {
    overflow-x: hidden !important;
}
</style>
