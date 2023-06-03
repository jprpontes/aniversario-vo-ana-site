import "./bootstrap";

import { createApp, h } from "vue";
import { createInertiaApp } from "@inertiajs/vue3";
import { createStore } from "vuex";
import Store from "./Store";
import VueTheMask from 'vue-the-mask'
import VueCookies from 'vue-cookies'

createInertiaApp({
    id: "app",
    resolve: (name) => {
        const pages = import.meta.glob("./Pages/**/*.vue", { eager: true });
        return pages[`./Pages/${name}.vue`];
    },
    setup({ el, App, props, plugin }) {
        const store = createStore(Store);

        const app = createApp({ render: () => h(App, props) })
            .use(plugin)
            .use(store)
            .use(VueTheMask)
            .use(VueCookies, { expires: '30d'})
            .mount(el);
    },
});
