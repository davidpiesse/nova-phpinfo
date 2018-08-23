Nova.booting((Vue, router) => {
    router.addRoutes([
        {
            name: 'nova-phpinfo',
            path: '/nova-phpinfo',
            component: require('./components/Tool'),
        },
    ])
})
