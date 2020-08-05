import template from './local-shop-detail.html.twig';

const {Component, Mixin} = Shopware;

Component.register('local-shop-detail', {
    template,

    inject: [
        'repositoryFactory'
    ],

    mixins: [
        Mixin.getByName('notification')
    ],

    metaInfo() {
        return {
            title: this.$createTitle()
        };
    },

    data() {
        return {
            entity: null,
            isLoading: false,
            processSuccess: false,
            repository: null
        };
    },

    computed: {

    },

    created() {
        this.repository = this.repositoryFactory.create('local_shop');
        this.getEntity();
    },

    methods: {
        getEntity() {
            this.repository
                .get(this.$route.params.id, Shopware.Context.api)
                .then((entity) => {
                    this.entity = entity;
                });
        },

        onClickSave() {
            this.isLoading = true;

            this.repository
                .save(this.entity, Shopware.context.api)
                .then(() => {
                    this.getEntity();
                    this.isLoading = false;
                    this.processSuccess = true;
                }).catch((exception) => {
                    this.isLoading = false;
                    this.createNotificationError({
                        title: this.$t('local-shop.detail.errorTitle'),
                        message: exception
                    });
                });
        },

        saveFinish() {
            this.processSuccess = false;
        }
    }
});
