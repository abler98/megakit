let Validator = {};

Validator.install = (Vue) => {

    if (!window.axios) {
        console.error('You have to install axios');
        return;
    }

    Vue.directive('validate', {
        //
    });

    window.axios.interceptors.request.use((config) => {
        hideValidationErrors(config.url);
        return config;
    });

    window.axios.interceptors.response.use((response) => response, (error) => {
        if (error.response.status === 422) {
            showValidationErrors(error.response.data);
        }
        return Promise.reject(error);
    });

    function hideValidationErrors(url) {
        $('[data-validate]').each(function () {
            let $this = $(this).removeClass('has-error');
            $this.find('.help-block').remove();
        });
    }

    function showValidationErrors(errors) {
        $.each(errors, (key, value) => {
            let $el = $(`[data-validate="${key}"]`);
            let $error = $('<span/>').addClass('help-block').html(`<strong>${value[0]}</strong>`);
            $el.addClass('has-error').find('div').append($error);
            console.log(key, value);
        });
    }

};

module.exports = Validator;