const routes = [
    {
        path: '/',
        component: () => import('../components/pages/Home.vue'),
        name: 'Home',
    },
    {
        path: '/link/:id',
        component: () => import('../components/pages/Link.vue'),
        name: 'Link',
    },
];

export default routes;
