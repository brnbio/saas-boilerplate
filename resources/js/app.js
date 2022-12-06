require('./functions');

import 'bootstrap';
import { createInertiaApp } from '@inertiajs/inertia-vue3'
import { InertiaProgress }  from '@inertiajs/progress';
import { createApp, h }     from 'vue'
import { ZiggyVue }         from 'ziggy';

createInertiaApp({
    resolve: name => require(`./views/${ name }`),
    setup({ el, App, props, plugin }) {
        createApp({ render: () => h(App, props) })
            .use(plugin)
            .use(ZiggyVue)
            .mount(el);
    },
    title: title => title + ' &ndash;'
});

InertiaProgress.init({
    color: '#014185',
    showSpinner: true,
    delay: 250
});