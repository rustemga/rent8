import Vue from 'vue';
import VueRouter from 'vue-router';
import Foo from './components/FooComponent';
import Bar from './components/BarComponent';
import RentsComponent from './components/RentsComponent';
import RentRegister from './components/RentRegisterFormComponent';
import RentOwnerHome from './components/RentOwherHomeComponent';

Vue.use(VueRouter) //регистрируем роутер как плагин

const routes = [
    { path: '/foo', component: Foo },
    { path: '/bar', component: Bar },
    { path: '/rent-register', component: RentRegister },
    { path: '/home-rent-service-owner', component: RentOwnerHome },
]

export default new VueRouter({//новый экземпляр класса Router с объектом в конструкторе
    mode: 'history',
    routes
})
