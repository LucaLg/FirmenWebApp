<template>
    <div class="card">
        <h2>{{ $route.params.firmenname }} Mitarbeiter</h2>
        <ul class="liste">
            <li v-for="arbeiter in mitarbeiter" :key="arbeiter.id">
                <span
                    >{{ arbeiter.vorname }} {{ arbeiter.nachname }} |
                    {{ arbeiter.email }}</span
                >
                <button class="delete" @click="deleteArbeiter(arbeiter)">
                    X
                </button>
            </li>
        </ul>
        <add-mitarbeiter
            :firmenId="$route.params.id"
            @saved="addArbeiter"
        ></add-mitarbeiter>
        <router-link class="back" :to="{ name: 'home' }">Back </router-link>
    </div>
</template>

<script>
import axios from "axios";
import AddMitarbeiter from "./AddMitarbeiter.vue";
export default {
    components: { AddMitarbeiter },

    data() {
        return { mitarbeiter: [] };
    },
    created() {
        this.getMitarbeiter();
    },
    methods: {
        /*
        Hole alle Mitarbeiter der Firma mittels der Firmen Id uber den Endpoint /api/firmen/firmenId
        */
        getMitarbeiter() {
            let firmaId = this.$route.params.id;
            let url = "/api/firmen/" + firmaId;
            console.log(url);
            axios.get(url).then((res) => {
                this.mitarbeiter = res.data;
            });
        },
        /*
            Mitarbeiter Liste wird im Frontend durch das Event Saved geupdated
        */
        addArbeiter(value) {
            this.mitarbeiter.push(value);
        },
        /*
            Nach klick des Delte Buttons wird der Arbeiter gelöscht
        */
        deleteArbeiter(arbeiter) {
            let url = "/api/mitarbeiter/" + arbeiter.id;
            console.log(url);
            axios.delete(url).then((res) => {
                console.log(res);
            });

            this.mitarbeiter.splice(this.mitarbeiter.indexOf(arbeiter), 1);
        },
    },
};
</script>

<style>
.card {
    background-color: white;
    width: 25rem;

    margin: 0 auto;
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column;

    border-radius: 10px;
    box-shadow: 5px 5px 1px white;
}
.liste {
    padding: 0 0;
    width: 20rem;
}
.liste > li {
    margin-top: 0.5em;
    display: grid;
    grid-template-columns: 8fr 1fr;
    align-items: center;
    justify-content: center;
    font-size: larger;
    color: black;
    text-decoration: none;
}
.back {
    justify-self: left;
    cursor: pointer;
    text-decoration: none;
    color: black;
}
</style>
