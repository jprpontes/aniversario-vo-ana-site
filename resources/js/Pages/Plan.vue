<script setup>
const props = defineProps({
    name: null,
    amount: 0,
    includedIn: null,
});

const emit = defineEmits(["buy"]);
</script>

<template>
    <div class="card mb-4 rounded-3 shadow-sm h-100">
        <div class="card-header py-3">
            <h4 class="my-0 fw-normal">{{ props.name }}</h4>
        </div>
        <div class="card-body d-flex flex-column">
            <h1 class="card-title pricing-card-title">
                R$ {{ props.amount
                }}<small class="text-body-secondary fw-light">,00</small>
            </h1>
            <ul class="list-unstyled mt-3 mb-4">
                <li v-for="(inc, index) in props.includedIn" :key="index">
                    {{ inc }}
                </li>
            </ul>
            <button
                type="button"
                class="w-100 btn btn-lg btn-primary mt-auto"
                :disabled="amount == 0"
                @click="emit('buy')"
            >
                {{ amount == 0 ? "Grátis" : "Quero este" }}
            </button>
        </div>
    </div>
</template>

<style lang="scss" scoped>
@import "../../sass/variables";

@media (max-width: 768px) {
}
</style>
