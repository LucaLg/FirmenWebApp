<template>
    <div class="card">
        <div class="header">
            <h1>Firmen Liste</h1>
        </div>

        <ul>
            <li class="firma" v-for="firma in firmen" :key="firma.id">
                <router-link
                    :to="{
                        name: 'firma',
                        params: { id: firma.id, firmenname: firma.firmenname },
                    }"
                >
                    <span>{{ firma.firmenname }}</span>
                </router-link>
                <button @click="deleteFirma(firma)" class="delete">X</button>
            </li>
        </ul>
    </div>
</template>

<script>
import axios from "axios";
export default {
    // props: ["firmen"],
    data() {
        return { firmen: [] };
    },
    created() {
        this.getFirmenList();
    },
    methods: {
        getFirmenList() {
            let url = "api/firmen";

            axios.get(url).then((firmenListe) => {
                this.firmen = firmenListe.data;
            });
        },
        deleteFirma(firma) {
            let url = "api/firmen/" + firma.id;
            console.log(url);
            axios.delete(url).then((res) => {
                this.firmen.splice(this.firmen.indexOf(firma), 1);
                console.log(res);
            });
        },
    },
};
</script>

<style>
.header {
    text-align: center;
}
.card {
    background-color: white;
    width: 25rem;
    margin: 5em auto;
    display: grid;
    grid-template: 1fr;
    justify-items: center;
    align-items: center;

    border-radius: 10px;
    box-shadow: 5px 5px 1px white;
}
ul {
    list-style: none;
}
.firma {
    margin-top: 0.5em;
    display: grid;
    grid-template-columns: 8fr 1fr;

    align-items: center;
    font-size: larger;
    color: black;
    text-decoration: none;
}

.firma > a {
    cursor: pointer;
    text-decoration: none;
    color: black;
}
</style>
