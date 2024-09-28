import './bootstrap';
import '../css/app.css';

import { createApp, h } from 'vue';
import { createInertiaApp } from '@inertiajs/vue3';
import { resolvePageComponent } from 'laravel-vite-plugin/inertia-helpers';
import { ZiggyVue } from '../../vendor/tightenco/ziggy';
import moment from 'moment';

moment.locale("pt-br");

const appName = import.meta.env.VITE_APP_NAME || 'Laravel';

createInertiaApp({
    title: (title) => `${title} - ${appName}`,
    resolve: (name) => resolvePageComponent(`./Pages/${name}.vue`, import.meta.glob('./Pages/**/*.vue')),
    setup({ el, App, props, plugin }) {
        const app = createApp({ render: () => h(App, props) })
            .use(plugin)
            .use(ZiggyVue);

        // Register a global method for date formatting
        app.config.globalProperties.$formatDate = (value) => {
            if (value) {
                return moment(value).format('DD/MM/YYYY HH:mm');
            }
            return '';
        };

        // Mount the app
        app.mount(el);
    },
    progress: {
        color: '#4B5563',
    },
});
