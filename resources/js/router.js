import Vue from 'vue'
import VueRouter from 'vue-router'
Vue.use(VueRouter)

//home 
import Home from './pages/home.vue'


//user pager
import Users from './pages/users/index.vue'
import UserProfile from './pages/users/profile.vue'
//all users
import Users_all from './pages/users/user_table/all.vue'
//member users
import Users_member from './pages/users/user_table/member.vue'
//admin users
import Users_admin from './pages/users/user_table/admin.vue'
//user create 
import User_create from './pages/users/create.vue'
//user update 
import User_update from './pages/users/update.vue'


// Clients
import Clients from './pages/clients/index.vue'
// create Client
import Clients_create from './pages/clients/create.vue'
// update Client
import Clients_update from './pages/clients/update.vue'
// profile Client
import Clients_profile from './pages/clients/profile.vue'


//projects
import Projects from './pages/projects/index.vue'
//project view
import ViewProject from './pages/projects/view.vue'
//project create
import CreateProject from './pages/projects/create.vue'
//all projects
import All_projects from './pages/projects/projects_table/all.vue'


//all module
import ModuleIndex from './pages/modules/index.vue'
//create module
import ModuleCreate from './pages/modules/create.vue'


//all module
import TasksIndex from './pages/tasks/index.vue'
//create module
import TaskCreate from './pages/tasks/create.vue'




const routes = new VueRouter({
    mode: 'history',
    routes: [
        {
            path: '/home',
            component: Home,
            name: 'home',
        },
        {
            path: '/users',
            component: Users,
            children: [
                { path: '',
                component: Users_all,
                name: 'users',
                },
                { path: '/users-admin', 
                component: Users_admin, 
                name:'users_admin' 
                },
                { path: '/users-member',
                component: Users_member,
                name:'users_member'
                },
            ]
            
        },
        {
            path: '/user-profile/:id',
            component: UserProfile,
            name: 'user_profile',
        },
        {
            path: '/user-create',
            component: User_create,
            name: 'user_create',
        },
        {
            path: '/user-update/:id',
            component: User_update,
            name: 'user_update',
        },
        {
            path: '/clients',
            component: Clients,
            name: 'clients',
        },
        {
            path: '/clients-create',
            component: Clients_create,
            name: 'clients_create',
        },
        {
            path: '/client-update/:id',
            component: Clients_update,
            name: 'client_update',
        },
        {
            path: '/client-profile/:id',
            component: Clients_profile,
            name: 'client_profile',
        },
        {
            path: '/projects',
            component: Projects,
            children: [
                { path: '',
                component: All_projects,
                name: 'projects',
                },
                { path: '/users-admin',
                component: Users_admin, 
                name:'users_admin' 
                },
                { path: '/users-member',
                component: Users_member,
                name:'users_member'
                },
            ]
            
        },
        {
            path: '/projects/view',
            component: ViewProject,
            name: 'project_view',
        },
        {
            path: '/project-create',
            component: CreateProject,
            name: 'project_create',
        },
        {
            path: '/modules',
            component: ModuleIndex,
            name: 'modules',
        },
        {
            path: '/module-create',
            component: ModuleCreate,
            name: 'module_create',
        },
        {
            path: '/tasks',
            component: TasksIndex,
            name: 'tasks',
        },
        {
            path: '/task-create',
            component: TaskCreate,
            name: 'task_create',
        },
        
    ]
});

export default routes;