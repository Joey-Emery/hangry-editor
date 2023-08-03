import { createRouter, createWebHashHistory } from 'vue-router';

const router = createRouter({
    history: createWebHashHistory(),
    routes: [
        {
            name: 'Blank',
            path: '/',
            component: require('./layouts/Blank.vue').default,
            children: [
                {
                    path: '/',
                    name: 'projects',
                    component: require('./pages/Projects.vue').default,
                }
            ]
        },
        {
            name: 'App',
            path: '/',
            component: require('./layouts/App.vue').default,
            children: [
                {
                    path: '/editor/:project',
                    name: 'editor',
                    component: require('./pages/Editor.vue').default,
                }
            ]
        },
    ],
});

export default router;