<script setup>
// import Layout from './Layout'
import { Head } from "@inertiajs/vue3";
import Ranking from "./Ranking.vue";
import Plan from "./Plan.vue";
import Divider from "./Divider.vue";
import { nextTick, onMounted, reactive } from "vue";

const data = reactive({
    buyModal: {
        open: false,
        amount: 0,
    },
});

const openBuyModal = (amount) => {
    data.buyModal.open = true;
    data.buyModal.amount = amount;
    nextTick(() => {
        const myModalEl = document.getElementById("buy-modal");
        myModalEl.addEventListener("hidden.bs.modal", (event) => {
            data.buyModal.open = false;
        });

        var myModal = new bootstrap.Modal($("#buy-modal"), {});
        myModal.show();
    });
};

const copyToClipboard = (element) => {
    $(element).select();
    document.execCommand("copy");
};

onMounted(() => {
    //
});
</script>

<template>
    <div>
        <Head title="Níver vó Ana" />
        <header>
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h5 class="text-center text-secondary">25, 26 e 27 DE AGOSTO</h5>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <h1 class="text-center fw-bold feliz-aniversario">
                            FELIZ ANIVERSÁRIO
                        </h1>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <h4 class="text-center text-secondary">
                            Ana Maria Pontes (Vó Ana)
                        </h4>
                    </div>
                </div>
                <!-- <div class="row">
                    <div class="col-4 mx-auto">
                        <img src="/img/vovo.png" class="img-fluid" />
                    </div>
                </div> -->
            </div>
        </header>
        <Divider direction="UP" color="#f5f5f5" />
        <section class="ranking-section pb-5">
            <div class="container">
                <div class="row">
                    <div class="col text-center">
                        <h3 class="mt-5 mb-3">Quiz da vovó</h3>
                    </div>
                </div>
                <div class="row">
                    <div class="col mb-4 mb-md-0">
                        <div class="row">
                            <div class="col">
                                <p>
                                    Será que você sabe tudo sobre Ana Maria
                                    Pontes, nossa querida vó Ana? Prove que você
                                    já a conhece bem e aprenda mais neste jogo
                                    de perguntas e respostas.
                                </p>
                            </div>
                        </div>
                        <div class="row">
                            <div
                                class="col-12 col-md-auto el-quiz-container col-btn-acessar-quiz"
                            >
                                <a
                                    href="#/quiz"
                                    class="btn btn-secondary btn-lg w-100 text-white btn-go-to-quiz"
                                >
                                    ACESSAR O QUIZ
                                </a>
                            </div>
                        </div>
                    </div>
                    <div
                        class="col-12 col-md-6 col-lg-4 ms-auto ranking-container"
                    >
                        <Ranking />
                    </div>
                </div>
            </div>
        </section>
        <Divider direction="DOWN" color="#f5f5f5" />
        <section class="pb-4">
            <div class="container">
                <div class="row">
                    <div class="col text-center">
                        <h3 class="mt-5 mb-3">Garanta sua vaga</h3>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-12 col-md-4 mb-4">
                        <Plan
                            name="São"
                            :amount="100"
                            :includedIn="[
                                'Sítio',
                                'Comida',
                                'Churrasco',
                                'Sem chope',
                            ]"
                            @buy="openBuyModal(100)"
                        />
                    </div>
                    <div class="col-12 col-md-4 mb-4">
                        <Plan
                            name="Pinguço"
                            :amount="180"
                            :includedIn="[
                                'Sítio',
                                'Comida',
                                'Churrasco',
                                'Chope',
                            ]"
                            @buy="openBuyModal(180)"
                        />
                    </div>
                    <div class="col-12 col-md-4 mb-4">
                        <Plan
                            name="Criança até 9 anos"
                            :amount="0"
                            :includedIn="['Sítio', 'Comida', 'Churrasco']"
                        />
                    </div>
                </div>
            </div>
        </section>
        <Divider direction="UP" color="#f5f5f5" />
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
        <!-- <footer></footer> -->
        <div
            v-if="data.buyModal.open"
            class="modal fade"
            id="buy-modal"
            data-bs-backdrop="static"
            data-bs-keyboard="false"
            tabindex="-1"
        >
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5">Forma de Pagamento PIX</h1>
                        <button
                            type="button"
                            class="btn-close"
                            data-bs-dismiss="modal"
                            aria-label="Close"
                        ></button>
                    </div>
                    <div class="modal-body">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-12">
                                    <label for="banco" class="form-label"
                                        >Valor por pessoa</label
                                    >
                                    <div class="input-group mb-3">
                                        <input
                                            type="text"
                                            id="amount"
                                            class="form-control"
                                            :value="`R$ ${data.buyModal.amount},00`"
                                            readonly
                                        />
                                    </div>
                                </div>
                                <div class="col-12">
                                    <label for="banco" class="form-label"
                                        >Banco</label
                                    >
                                    <div class="input-group mb-3">
                                        <input
                                            type="text"
                                            id="banco"
                                            class="form-control"
                                            value="NU PAGAMENTOS - IP"
                                            readonly
                                        />
                                    </div>
                                </div>
                                <div class="col-12">
                                    <label for="titular" class="form-label"
                                        >Nome</label
                                    >
                                    <div class="input-group mb-3">
                                        <input
                                            type="text"
                                            id="titular"
                                            class="form-control"
                                            value="JOAO PAULO RIBEIRO PONTES 11597613614 ou PASBE"
                                            readonly
                                        />
                                    </div>
                                </div>
                                <div class="col-12">
                                    <label for="chave-pix" class="form-label"
                                        >Chave PIX</label
                                    >
                                    <div class="input-group mb-3">
                                        <input
                                            type="text"
                                            id="chave-pix"
                                            class="form-control"
                                            value="43.347.133/0001-41"
                                            readonly
                                        />
                                        <button
                                            class="btn btn-outline-secondary"
                                            type="button"
                                            id="btn-copy"
                                            @click="
                                                copyToClipboard('#chave-pix')
                                            "
                                        >
                                            Copiar
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button
                            type="button"
                            class="btn btn-secondary text-white"
                            data-bs-dismiss="modal"
                        >
                            Fechar
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<style lang="scss" scoped>
@import "../../sass/variables";

header {
    height: 300px;
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
    margin-top: -30px;
}

.curve-2 {
    fill: $bg-white-1;
    margin-top: -60px;
}

.ranking-section {
    position: relative;
    background-color: $bg-white-2;
}

.ranking-container {
    /* margin-top: -100px; */
    height: 330px;
}

.location-section {
    background-color: $bg-white-2;
}

.btn-go-to-quiz {
    align-items: center;
    justify-content: center;
    display: flex;
}

.feliz-aniversario {
    color: $info;
}

.gmap_canvas {
    overflow: hidden;
    background-color: $primary;
}

#gmap_canvas {
    width: 100%;
    height: 20rem;
}

#banco {
    color: #673ab7;
}

#banco,
#titular,
#chave-pix,
#amount {
    font-weight: 500;
}

@media (max-width: 768px) {
    .col-btn-acessar-quiz {
        margin-left: auto;
        margin-right: auto;
    }
}
</style>
