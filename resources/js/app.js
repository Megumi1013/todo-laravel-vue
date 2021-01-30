import Vue from 'vue'

Vue.config.productionTip = false

const app = new Vue({
    el: '#app',
    delimiters: ["<%","%>"], // この行を追加
});