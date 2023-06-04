<script setup>
import { onMounted, reactive } from "vue";

const data = reactive({
    ranking: [],
});

const getRanking = async () => {
    try {
        const response = await axios.get("/quiz/ranking");
        data.ranking = response.data.data.ranking;
    } catch (error) {
        console.error(error);
    }
};

onMounted(() => {
    getRanking();
});
</script>

<template>
    <div class="ranking-container">
        <div class="ranking-title-container">
            <span class="ranking-title">Ranking do quiz</span>
        </div>
        <div class="scores">
            <div
                v-for="(score, index) in data.ranking"
                :key="score.id"
                class="score"
                :class="{
                    first: index == 0,
                    second: index == 1,
                    third: index == 2,
                }"
            >
                <span class="position">{{ index + 1 }}º</span>
                <span class="name">{{ score.name }}</span>
                <span class="points">{{ score.points }}pts</span>
            </div>
        </div>
    </div>
</template>

<style lang="scss" scoped>
@import "../../sass/variables";

.ranking-container {
    width: 100%;
    height: 100%;
    border-radius: 20px;
    background-color: $bg-white-2;
    border: 3px solid #fff;
    display: flex;
    flex-direction: column;
}

.scores {
    display: flex;
    flex-direction: column;
    overflow-y: auto;
}

.ranking-title-container {
    background-color: $bg-green-1;
    border-bottom: 2px solid white;
    padding: 10px 20px;
    border-top-right-radius: 20px;
    border-top-left-radius: 20px;
}

.ranking-title {
    font-weight: bold;
}

.score {
    width: 100%;
    min-height: 50px;
    display: flex;
    flex-direction: row;
    align-items: center;
    border-bottom: 2px solid white;
    border-top: 1px solid white;
    border-bottom: 1px solid white;
}

.position {
    margin: 5px 5px 5px 5px;
    width: 40px;
    text-align: center;
}

.name {
    margin: 5px 5px 5px 5px;
    flex: 1;
}

.points {
    margin: 5px 30px 5px 5px;
}

.first {
    border-left: 4px solid green;
}

.second {
    border-left: 4px solid gray;
}

.third {
    border-left: 4px solid orange;
}
</style>
