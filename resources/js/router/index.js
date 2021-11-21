import { createRouter, createWebHistory } from "vue-router";

import app from "../vue/app.vue";
import FirmaDetail from "../vue/FirmaDetail.vue";
import ListFirma from "../vue/ListFirma.vue";
const routes = [
    { path: "/", name: "home", component: ListFirma },
    { path: "/firma/:id/:firmenname", name: "firma", component: FirmaDetail },
];

const router = createRouter({
    history: createWebHistory(process.env.BASE_URL),
    routes,
});
export default router;
