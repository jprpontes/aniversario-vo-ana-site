<script setup>
import { onMounted, reactive } from "vue";
import { useStore } from "vuex";

const store = useStore();

const data = reactive({
    authErrorMessage: null,
    login: {
        nickname: null,
        date_of_birth: null,
    },
});

const formValidate = () => {
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

const login = async () => {
    data.authErrorMessage = null;

    if (!formValidate()) {
        return;
    }

    try {
        const response = await axios.post("/sanctum/token", {
            nickname: data.login.nickname,
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
            <div class="col-auto mx-auto">
                <h2 class="title">Login.</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-md-4 mx-auto my-2">
                <input
                    type="text"
                    class="form-control form-control-lg"
                    placeholder="Apelido"
                    v-model="data.login.nickname"
                />
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-md-4 mx-auto my-2">
                <input
                    type="text"
                    class="form-control form-control-lg"
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
            <div class="col-12 col-md-4 mx-auto my-2">
                <button
                    class="btn btn-lg btn-primary w-100 btn-login"
                    @click="login"
                >
                    Entrar
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

.btn-login {
    height: 60px;
}

.btn-signup {
    margin: 5px;
    height: 60px;
}
</style>