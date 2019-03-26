Nova.booting((Vue, router, store) => {
    router.addRoutes([
        {
            name: 'NovaLocaleManager',
            path: '/NovaLocaleManager',
            component: require('./components/Tool'),
        },
    ])
})
