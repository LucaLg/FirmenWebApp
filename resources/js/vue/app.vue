<template>
    <div class="container">
        <router-view></router-view>
    </div>
</template>

<script>
import AddMitarbeiter from "./AddMitarbeiter.vue";
import FirmaDetail from "./FirmaDetail.vue";
import ListFirma from "./ListFirma.vue";
export default {
    components: {
        AddMitarbeiter,
        FirmaDetail,
        ListFirma,
    },

    data() {
        return {
            firmen: [],
        };
    },
    methods: {},
};
</script>

<style>
.container {
    display: flex;
    justify-content: space-around;
    margin: 2em auto;
    width: 30rem;
}
</style>
