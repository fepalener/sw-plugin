import template from './local-shop-list.html.twig';

const {Component} = Shopware;
const {Criteria} = Shopware.Data;

Component.register('local-shop-list', {
    template,

    inject: [
        'repositoryFactory'
    ],

    data() {
        return {
            repository: null,
            entities: null
        };
    },

    metaInfo() {
        return {
            title: this.$createTitle()
        };
    },

    computed: {
        columns() {
            return [
                {
                    property: 'name',
                    dataIndex: 'name',
                    label: this.$t('local-shop.list.columnName'),
                    routerLink: 'local.shop.detail',
                    inlineEdit: 'string',
                    allowResize: true,
                    primary: true
                },
                {
                    property: 'addressCity',
                    dataIndex: 'addressCity',
                    label: this.$t('local-shop.list.columnAddressCity'),
                    allowResize: true,
                },
                {
                    property: 'addressZipCode',
                    dataIndex: 'addressZipCode',
                    label: this.$t('local-shop.list.columnAddressZipCode'),
                    allowResize: true,
                },
                {
                    property: 'addressStreet',
                    dataIndex: 'addressStreet',
                    label: this.$t('local-shop.list.columnAddressStreet'),
                    allowResize: true,
                },
                {
                    property: 'addressBuildingNumber',
                    dataIndex: 'addressBuildingNumber',
                    label: this.$t('local-shop.list.columnAddressBuildingNumber'),
                    allowResize: true,
                },
                {
                    property: 'addressContactPhone',
                    dataIndex: 'addressContactPhone',
                    label: this.$t('local-shop.list.columnAddressContactPhone'),
                    allowResize: true,
                }
            ];
        }
    },

    created() {
        this.repository = this.repositoryFactory.create('local_shop');

        this.repository
            .search(new Criteria(), Shopware.Context.api)
            .then((result) => {
                this.entities = result;
            });
    }
});
