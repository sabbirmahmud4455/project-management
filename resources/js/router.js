import Vue from 'vue'
import VueRouter from 'vue-router'
Vue.use(VueRouter)

//home
import Home from './pages/home.vue'


//user pager
import Users from './pages/users/index.vue'
//user create
import User_create from './pages/users/create.vue'
//user update
import User_update from './pages/users/update.vue'
//user profile index
import UserProfile from './pages/users/view/index.vue'
//user profile active task
import UserProfile_Activ_task from './pages/users/view/active_task.vue'
//user profile complete task
import UserProfile_Complete_task from './pages/users/view/complete_task.vue'



//projects
import Projects from './pages/projects/index.vue'
//project create
import CreateProject from './pages/projects/create.vue'
//project create
import UpdateProject from './pages/projects/update.vue'
//project view
import ViewProject from './pages/projects/view/index.vue'



//all module
import ModuleIndex from './pages/modules/index.vue'
//create module
import ModuleCreate from './pages/modules/create.vue'
//update module
import ModuleUpdate from './pages/modules/update.vue'
//View module
import ModuleView from './pages/modules/view.vue'


//all task
import TasksIndex from './pages/tasks/index.vue'
//create task
import TaskCreate from './pages/tasks/create.vue'
//update task
import TaskUpdate from './pages/tasks/update.vue'
//view task
import TaskView from './pages/tasks/view.vue'

//sprints
import SprintList from './pages/sprint/sprint_list'
import SprintCreate from './pages/sprint/create_sprint'
import SprintUpdate from './pages/sprint/update_sprint'
import SprintDetails from './pages/sprint/sprint_details'
import SprintTask from './pages/sprint/add_sprint_task'
import sprintTaskEdit from './pages/sprint/independent_task_edit'



//app info
import appInfo from './dashboard/settings/app_info/index'


//user routes

import MyTask from './pages/user/task/index';

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
            name: 'users',

        },
        {
            path: '/user-profile/:id',
            component: UserProfile,
            children: [
                { path: '',
                component: UserProfile_Activ_task,
                name: 'user_profile',
                },
                { path: '/user-view/module/:id',
                component: UserProfile_Complete_task,
                name:'user_view_complete_task'
                }
            ]
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




        //project route
        {
            path: '/projects',
            component: Projects,
            name: 'projects',
        },
        {
            path: '/project-view/:id',
            component: ViewProject,
            name: 'project_view',
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
            path: '/module-create/:id',
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

        //task
        {
            path: '/tasks',
            component: TasksIndex,
            name: 'tasks',
        },
        {
            path: '/task-create/:id',
            component: TaskCreate,
            name: 'task_create',
        },
        {
            path: '/task-update/:id',
            component: TaskUpdate,
            name: 'task_update',
        },
        {
            path: '/task-view/:id',
            component: TaskView,
            name: 'task_view',
        },

        //sprint
        {
            path: '/sprints',
            component: SprintList,
            name: 'sprints',
        },
        {
            path: '/sprint-create',
            component: SprintCreate,
            name: 'sprint_create',
        },
        {
            path: '/sprint-update/:id',
            component: SprintUpdate,
            name: 'sprint_update',
        },
        {
            path: '/sprint-details/:id',
            component: SprintDetails,
            name: 'sprint_details',
        },
        {
            path: '/sprint/sprint-task/:id',
            component: SprintTask,
            name: 'sprint_task',
        },
        {
            path: '/sprint/sprint-task-edit/:id',
            component: sprintTaskEdit,
            name: 'sprint_task_edit',
        },



        //app info
        {
            path: '/app-info',
            component: appInfo,
            name: 'app_info',
        },

        //user routes

        {
            path: '/my-task',
            component: MyTask,
            name: 'my_task',
        },

    ]
});

export default routes;
