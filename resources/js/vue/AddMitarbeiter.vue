<template>
    <form @submit.prevent="submit">
        <div class="form-group">
            <label>Vorname</label>
            <input
                required
                type="text"
                class="form-control"
                name="vorname"
                placeholder="Vorname"
                oninvalid="this.setCustomValidity('Es muss ein Vorname angegeben werden!')"
                oninput="this.setCustomValidity('')"
            />
        </div>

        <div class="form-group">
            <label>Nachname</label>
            <input
                required
                type="text"
                class="form-control"
                name="nachname"
                placeholder="Nachname"
                oninvalid="this.setCustomValidity('Es muss ein Nachname angegeben werden!')"
                oninput="this.setCustomValidity('')"
            />
        </div>

        <div class="form-group">
            <label>Email</label>
            <input
                pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$"
                type="email"
                class="form-control"
                name="email"
                placeholder="Email"
                oninvalid="this.setCustomValidity('Geben sie eine gültige Email an!')"
                oninput="this.setCustomValidity('')"
            />
        </div>
        <button type="submit">Add</button>
        <div v-if="validationError">
            <div v-for="error in errorArr" class="errorMessages" :key="error">
                {{ error }}
            </div>
        </div>
    </form>
</template>

<script>
import axios from "axios";
export default {
    props: {
        firmenId: String,
    },
    data() {
        return {
            mitarbeiter: {
                firmen_id: null,
                vorname: null,
                nachname: null,
                email: null,
            },
            validationError: false,
            errors: {
                vorname: null,
                nachname: null,
                email: null,
            },
            errorArr: [],
        };
    },
    methods: {
        /*
         Speicher neuen Mitarbeiter
        */
        submit(event) {
            const headers = {
                "Content-Type": "application/json",
            };
            this.mitarbeiter.firmen_id = parseInt(this.firmenId);
            this.mitarbeiter.vorname = Object.fromEntries(
                new FormData(event.target)
            ).vorname;
            this.mitarbeiter.nachname = Object.fromEntries(
                new FormData(event.target)
            ).nachname;
            this.mitarbeiter.email = Object.fromEntries(
                new FormData(event.target)
            ).email;

            console.log(this.mitarbeiter);
            //Api Call
            axios
                .post("/api/mitarbeiter", this.mitarbeiter)
                .then((res) => {
                    this.validationError = false;
                    console.log(res);
                    this.onSave();
                })
                .catch((error) => {
                    this.errors = error.response.data.errors;
                    let errorMessageArray = Object.values(this.errors);
                    if (!this.validationError)
                        errorMessageArray.forEach((err) => {
                            this.errorArr.push(err[0]);
                        });
                    this.validationError = true;
                });

            //Schicke Mitarbeiter an Mitarbeiter List
        },
        onSave() {
            this.$emit("saved", this.mitarbeiter);
        },
    },
};
</script>

<style>
form {
    margin-top: 3rem;
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column;
}
.form-group {
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column;
}
input {
    margin-bottom: 5vh;
    border-right: none;
    border-top: none;
    border-left: none;
    background-color: transparent;
    outline: none;
    color: black;
    caret-color: black;
}
button {
    background: rgba(219, 219, 219, 0.884);
    font-size: large;
    font-weight: bold;
    width: 5rem;
    padding: 2vh;
    border: none;
    cursor: pointer;
    border-radius: 4px 4px;
}
.errorMessages {
    color: red;
}
</style>
