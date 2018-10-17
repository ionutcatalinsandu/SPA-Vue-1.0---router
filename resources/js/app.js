/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */
require("./bootstrap.js");
import router from "./routes";
import VueRouter from "vue-router";
import Vue from "vue";
import Form from "./core/Form";

window.Form = Form;

Vue.use(VueRouter);
new Vue({
    el: "#app",
    router
});
