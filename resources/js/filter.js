window.Vue = require('vue');

Vue.filter('shortDescription', function(text) {
    return text.substring(0, 100);
});