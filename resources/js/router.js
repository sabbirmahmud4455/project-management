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
//project create
import CreateProject from './pages/projects/create.vue'
//project create
import UpdateProject from './pages/projects/update.vue'
//project view
import ViewProject from './pages/projects/view/index.vue'
//product view status
import product_view_status from './pages/projects/view/status.vue'
//product view module
import product_view_module from './pages/projects/view/module.vue'
//product view task
import product_view_task from './pages/projects/view/task.vue'
//product view details
import product_view_details from './pages/projects/view/details.vue'


//all module
import ModuleIndex from './pages/modules/index.vue'
//create module
import ModuleCreate from './pages/modules/create.vue'
//update module
import ModuleUpdate from './pages/modules/update.vue'
//View module
import ModuleView from './pages/modules/view.vue'


//all module
import TasksIndex from './pages/tasks/index.vue'
//create module
import TaskCreate from './pages/tasks/create.vue'




const routes = new VueRouter({
    mode: 'history',
    routes: [

        //home page route
        {
            path: '/home',
            component: Home,
            name: 'home',
        },

        //user route
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

        //client route
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


        //project route
        {
            path: '/projects',
            component: Projects,
            name: 'projects',
            // children: [
            //     { path: '',
            //     component: product_view_status,
            //     name: 'project_view_status',
            //     },
            //     // { path: '/users-admin',
            //     // component: Users_admin, 
            //     // name:'users_admin' 
            //     // },
            //     // { path: '/users-member',
            //     // component: Users_member,
            //     // name:'users_member'
            //     // },
            // ]
            
        },
        {
            path: '/project-view/:id',
            component: ViewProject,
            children: [
                { path: '',
                component: product_view_status,
                name: 'project_view',
                },
                { path: '/project-view/module/:id',
                component: product_view_module, 
                name:'project_view_module' 
                },
                { path: '/project-view/tasks/:id',
                component: product_view_task,
                name:'project_view_tasks'
                },
                { path: '/project-view/details/:id',
                component: product_view_details,
                name:'project_view_details'
                },
            ]
        },
        {
            path: '/project-create',
            component: CreateProject,
            name: 'project_create',
        },
        {
            path: '/project-update/:id',
            component: UpdateProject,
            name: 'project_update',
        },



        //module route
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
            path: '/module-update/:id',
            component: ModuleUpdate,
            name: 'module_update',
        },
        {
            path: '/module-view/:id',
            component: ModuleView,
            name: 'module_view',
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