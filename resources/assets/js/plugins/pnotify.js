let VuePNotify = {};

VuePNotify.install = (Vue) => {

    if (!window.PNotify) {
        console.error('You have to install PNotify');
        return;
    }

    let wrapper = (message, type = "info", delay = 1000) => {
        new window.PNotify({
            text: message,
            type: type,
            delay: delay,
            hide: true,
        })
    };

    Object.defineProperties(Vue.prototype, {
        $notify: {
            get() {
                return wrapper;
            }
        }
    });

};

module.exports = VuePNotify;