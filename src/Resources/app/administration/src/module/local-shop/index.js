import './page/local-shop-list';
import './page/local-shop-detail';
import './page/local-shop-create';

import deDE from './snippet/de-DE.json';
import enGB from './snippet/en-GB.json';

const { Module } = Shopware;

Module.register('local-shop', {
    type: 'plugin',
    name: 'LocalShop',
    title: 'local-shop.general.mainMenuItemGeneral',
    description: 'local-shop.general.descriptionTextModule',
    icon: 'default-shopping-paper-bag-product',
    color: '#ff17d3',

    snippets: {
        'de-DE': deDE,
        'en-GB': enGB
    },

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
    },

    navigation: [{
        label: 'local-shop.general.mainMenuItemGeneral',
        color: '#ff17d3',
        path: 'local.shop.list',
        icon: 'default-shopping-paper-bag-product',
        position: 100
    }]
});
