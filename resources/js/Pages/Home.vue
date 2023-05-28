<script setup>
// import Layout from './Layout'
import { Head } from "@inertiajs/vue3";
import Ranking from "./Ranking.vue";
</script>

<template>
    <div>
        <Head title="Aniversário Ana Maria Pontes" />
        <header>
            <div class="container">
                <div class="row">
                    <div class="col">
                        <h1 class="text-center text-secondary">
                            Vamos juntos comemorar mais um aniversário dessa
                            pessoa tão especial, nossa vó Ana!
                        </h1>
                    </div>
                    <div class="col-auto mx-auto">
                        <!-- <svg
                            preserveAspectRatio="xMidYMid meet"
                            data-bbox="5.976 15.803 188.024 168.532"
                            viewBox="5.976 15.803 188.024 168.532"
                            height="300"
                            width="300"
                            xmlns="http://www.w3.org/2000/svg"
                            data-type="color"
                            role="presentation"
                            aria-hidden="true"
                            class="baloon-1"
                        >
                            <g>
                                <path
                                    d="M91.052 173.189C119.033 208.059 194 154.166 194 107.109 194 72.067 160 19 113.041 16 71.147 13.324 9.093 38.026 6.094 86.084S58 132 91.052 173.189z"
                                    data-color="1"
                                ></path>
                            </g>
                        </svg> -->
                    </div>
                </div>
            </div>
        </header>
        <svg
            viewBox="0 0 500 70"
            preserveAspectRatio="xMinYMin meet"
            class="curve-1"
        >
            <path
                d="M0,50 C250,100 250,0 500,50 L500,00 L0,0 Z"
                style="stroke: none"
            ></path>
        </svg>
        <section class="ranking-section pb-5">
            <div class="container">
                <div class="row">
                    <div class="col text-center">
                        <h3 class="mt-5 mb-3">Quiz da família</h3>
                    </div>
                </div>
                <div class="row">
                    <div class="col mb-4 mb-md-0">
                        <p>
                            Mostre que você conhece tudo sobre a família neste
                            quiz com histórias incríveis.
                        </p>
                        <br />
                        <button class="btn btn-secondary btn-lg">
                            Acessar o Quiz
                        </button>
                    </div>
                    <div
                        class="col-12 col-md-6 col-lg-4 ms-auto ranking-container"
                    >
                        <Ranking />
                    </div>
                </div>
            </div>
        </section>
        <!-- <svg
            viewBox="0 0 500 70"
            preserveAspectRatio="xMinYMin meet"
            class="curve-2"
        >
            <path
                d="M0,50 C250,100 250,0 500,50 L500,00 L0,0 Z"
                style="stroke: none"
            ></path>
        </svg> -->
        <section class="pb-4">
            <div class="container">
                <div class="row">
                    <div class="col text-center">
                        <h3 class="mt-5 mb-3">Garanta sua vaga</h3>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-auto mb-4">
                        <div
                            class="card mb-4 rounded-3 shadow-sm"
                            style="width: 18rem"
                        >
                            <div class="card-header py-3">
                                <h4 class="my-0 fw-normal">Plano São</h4>
                            </div>
                            <img
                                src="https://htmlcolorcodes.com/assets/images/colors/light-gray-color-solid-background-1920x1080.png"
                                alt="..."
                            />
                            <div class="card-body">
                                <h1 class="card-title pricing-card-title">
                                    R$ 100<small
                                        class="text-body-secondary fw-light"
                                        >,00</small
                                    >
                                </h1>
                                <ul class="list-unstyled mt-3 mb-4">
                                    <li>20 users included</li>
                                    <li>10 GB of storage</li>
                                    <li>Priority email support</li>
                                    <li>Help center access</li>
                                </ul>
                                <!-- <button
                                    type="button"
                                    class="w-100 btn btn-lg btn-primary"
                                >
                                    Get started
                                </button> -->
                            </div>
                        </div>
                    </div>
                    <div class="col-auto mb-4">
                        <div
                            class="card mb-4 rounded-3 shadow-sm"
                            style="width: 18rem"
                        >
                            <div class="card-header py-3">
                                <h4 class="my-0 fw-normal">Plano Bebum</h4>
                            </div>
                            <img
                                src="https://htmlcolorcodes.com/assets/images/colors/light-gray-color-solid-background-1920x1080.png"
                                alt="..."
                            />
                            <div class="card-body">
                                <h1 class="card-title pricing-card-title">
                                    R$ 100<small
                                        class="text-body-secondary fw-light"
                                        >,00</small
                                    >
                                </h1>
                                <ul class="list-unstyled mt-3 mb-4">
                                    <li>20 users included</li>
                                    <li>10 GB of storage</li>
                                    <li>Priority email support</li>
                                    <li>Help center access</li>
                                </ul>
                                <!-- <button
                                    type="button"
                                    class="w-100 btn btn-lg btn-primary"
                                >
                                    Get started
                                </button> -->
                            </div>
                        </div>
                    </div>
                    <div class="col-auto mb-4">
                        <div
                            class="card mb-4 rounded-3 shadow-sm"
                            style="width: 18rem"
                        >
                            <div class="card-header py-3">
                                <h4 class="my-0 fw-normal">Plano Kids</h4>
                            </div>
                            <img
                                src="https://htmlcolorcodes.com/assets/images/colors/light-gray-color-solid-background-1920x1080.png"
                                alt="..."
                            />
                            <div class="card-body">
                                <h1 class="card-title pricing-card-title">
                                    R$ 100<small
                                        class="text-body-secondary fw-light"
                                        >,00</small
                                    >
                                </h1>
                                <ul class="list-unstyled mt-3 mb-4">
                                    <li>20 users included</li>
                                    <li>10 GB of storage</li>
                                    <li>Priority email support</li>
                                    <li>Help center access</li>
                                </ul>
                                <!-- <button
                                    type="button"
                                    class="w-100 btn btn-lg btn-primary"
                                >
                                    Get started
                                </button> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="location-section">
            <div class="container-fluid p-0">
                <div class="row">
                    <div class="col text-center">
                        <h3 class="mt-5 mb-3 secondary">
                            Localização da festa
                        </h3>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="mapouter">
                            <div class="gmap_canvas">
                                <iframe
                                    id="gmap_canvas"
                                    src="https://maps.google.com/maps?q=Recanto%20Lopes%20-%20Corrego%20do%20Bamb%C3%BA,%20Caratinga%20-%20MG&t=&z=13&ie=UTF8&iwloc=&output=embed"
                                    frameborder="0"
                                    scrolling="no"
                                    marginheight="0"
                                    marginwidth="0"
                                ></iframe>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <footer></footer>
    </div>
</template>

<style lang="scss" scoped>
@import "../../sass/variables";

header {
    background-color: $primary;
    /* margin-top: 56px; */
    position: relative;
    height: 400px;
    display: flex;
    align-items: center;
}

footer {
    background-color: $primary;
    position: relative;
    height: 300px;
}

.baloon-1 {
    path {
        fill: $secondary;
    }
}

.curve-1 {
    background-color: $bg-white-1;
    fill: $primary;
    margin-top: -60px;
}

.curve-2 {
    fill: $bg-white-1;
    margin-top: -60px;
}

.ranking-section {
    position: relative;
    background-color: $bg-white-1;
}

.ranking-container {
    /* margin-top: -100px; */
    height: 300px;
}

.location-section {
    background-color: $bg-white-1;
}

.gmap_canvas {
    overflow: hidden;
    background-color: $primary;
}

#gmap_canvas {
    width: 100%;
    height: 20rem;
}
</style>
