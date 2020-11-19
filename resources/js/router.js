import Vue from 'vue';
import VueRouter from 'vue-router';
import Foo from './components/FooComponent';
import Bar from './components/BarComponent';
import RentsComponent from './components/RentsComponent'

Vue.use(VueRouter) //регистрируем роутер как плагин

const routes = [
    { path: '/', component: RentsComponent },
    { path: '/foo', component: Foo },
    { path: '/bar', component: Bar }
]

export default new VueRouter({//новый экземпляр класса Router с объектом в конструкторе
    mode: 'history',
    routes
})
