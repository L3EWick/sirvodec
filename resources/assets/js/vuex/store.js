//import Vue from "Vue";
//import Vuex from "Vuex";

import notifications from "./modulos/notifications";

Vue.use(Vuex);

export default new Vuex.Store({

    modules: {
        notifications,
    }
})
