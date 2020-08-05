Shopware.Module.register('local-shop', {
    color: '#ff17d3',
    icon: 'default-shopping-paper-bag-product',
    title: 'Local Shops',
    description: 'Manage local shops.',

    routes: {
        list: {
            component: 'local-shop-list',
            path: 'list'
        },
        detail: {
            component: 'local-shop-detail',
            path: 'detail/:id',
            meta: {
                parentPath: 'local.shop.list'
            }
        },
        create: {
            component: 'local-shop-create',
            path: 'create',
            meta: {
                parentPath: 'local.shop.list'
            }
        },
    }
});
