//require("./bootstrap");

import { createApp } from "vue";
import axios from "axios";
import VueAxios from "vue-axios";
import app from "./vue/app.vue";
import router from "./router";

const applet = createApp(app);
applet.use(VueAxios, axios);
applet.use(router);
applet.provide("axios", applet.config.globalProperties.axios); // provide 'axios'
applet.mount("#app");
