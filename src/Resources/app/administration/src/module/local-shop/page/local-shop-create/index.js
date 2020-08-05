Shopware.Component.extend('local-shop-create', 'local-shop-detail', {
    methods: {
        getBundle() {
            this.entity = this.repository.create(Shopware.Context.api);
        },

        onClickSave() {
            this.isLoading = true;

            this.repository
                .save(this.entity, Shopware.Context.api)
                .then(() => {
                    this.isLoading = false;
                    this.$router.push({name: 'local.shop.detail', params: {id: this.entity.id}});
                }).catch((exception) => {
                    this.isLoading = false;

                    this.createNotificationError({
                        title: this.$t('local-shop.detail.errorTitle'),
                        message: exception
                    });
                });
        }
    }
});
