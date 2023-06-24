<script setup>
import { onMounted, reactive } from "vue";
import { useStore } from "vuex";

const store = useStore();

const emit = defineEmits(["back"]);

const back = () => {
    emit("back");
};

const data = reactive({
    authErrorMessage: null,
    login: {
        name: null,
        nickname: null,
        date_of_birth: null,
    },
});

const formValidate = () => {
    if (!data.login.name) {
        data.authErrorMessage = "Informe seu nome completo.";
        return false;
    }

    if (!data.login.nickname) {
        data.authErrorMessage = "Informe um apelido.";
        return false;
    }

    if (!moment(data.login.date_of_birth, "DD/MM/YYYY", true).isValid()) {
        data.authErrorMessage = "Data de nascimento inválida.";
        return false;
    }

    return true;
};

const formatDateOfBirth = (date) => {
    const dt = moment(date, "DD/MM/YYYY");
    return dt.format("YYYY-MM-DD");
};

const signup = async () => {
    data.authErrorMessage = null;

    if (!formValidate()) {
        return;
    }

    try {
        const response = await axios.post("/sanctum/signup", {
            name: data.login.name,
            nickname: data.login.nickname.toString().toLowerCase(),
            date_of_birth: formatDateOfBirth(data.login.date_of_birth),
        });
        store.dispatch("signIn", {
            token: response.data.data.token,
            user: response.data.data.user,
        });
    } catch (error) {
        if (error?.response?.data?.message) {
            data.authErrorMessage = error?.response?.data?.message;
        } else {
            data.authErrorMessage = "Houve um erro inesperado ao fazer login.";
        }
    }
};

onMounted(() => {
    //
});
</script>

<template>
    <div class="container quiz-auth mx-auto">
        <div class="row">
            <div class="col-auto">
                <h1 class="title">NOVO JOGADOR</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-auto">
                <h2 class="subtitle">
                    Informe seu nome, um apelido e sua data de nascimento.
                    Guarde este apelido, pois ele será usado para você fazer
                    login novamente.
                </h2>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-md-4 mx-auto my-1 el-quiz-container">
                <input
                    type="text"
                    class="form-control form-control-lg input-quiz"
                    placeholder="Nome completo"
                    v-model="data.login.name"
                />
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-md-4 mx-auto my-1 el-quiz-container">
                <input
                    type="text"
                    class="form-control form-control-lg input-quiz input-nickname"
                    placeholder="Apelido"
                    v-mask="'XXXXXXXXXXXXXXXXXXXXXXXXX'"
                    max="25"
                    v-model="data.login.nickname"
                />
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-md-4 mx-auto my-1 el-quiz-container">
                <input
                    type="text"
                    class="form-control form-control-lg input-quiz"
                    placeholder="Data de Nascimento"
                    v-mask="'##/##/####'"
                    v-model="data.login.date_of_birth"
                />
            </div>
        </div>
        <div class="row" v-if="data.authErrorMessage">
            <div class="col-12 col-md-4 mx-auto my-2 text-center">
                <span class="text-danger fw-bold">{{
                    data.authErrorMessage
                }}</span>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-md-4 mx-auto my-2 el-quiz-container">
                <button
                    class="btn btn-lg btn-secondary w-100 text-white"
                    @click="signup"
                >
                    CRIAR JOGADOR
                </button>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-md-4 mx-auto my-2 el-quiz-container">
                <button
                    class="btn btn-lg btn-link text-secondary w-100"
                    @click="back"
                >
                    VOLTAR
                </button>
            </div>
        </div>
    </div>
</template>

<style lang="scss" scoped>
@import "../../sass/variables";

.quiz-auth {
    max-width: 900px;
}

.title {
    margin: 50px 10px 10px 10px;
}

.subtitle {
    margin: 10px 10px 50px 10px;
    font-weight: normal;
    font-size: 22px;
}

.input-nickname {
    text-transform: lowercase;
}
</style>
