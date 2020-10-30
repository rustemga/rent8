import Router from 'vue-router';
import Users from './components/Users'

Vue.use(Router) //регистрируем роутер как плагин

export default new Router({//новый экземпляр класса Router с объектом в конструкторе
    mode: 'history',
    routes: [
        {
            path: '/',
            component: Users
        }
    ]
})
