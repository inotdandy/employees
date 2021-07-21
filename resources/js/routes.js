import EmployeeIndex from './components/employees/Index'
import EmployeeCreate from './components/employees/Create'
import EmployeeEdit from './components/employees/Edit'

export const routes = [
    {
        path: '/employees',
        name: 'EmployeeIndex',
        component: EmployeeIndex
    },
    {
        path: '/employee/create',
        name: 'EmployeeCreate',
        component: EmployeeCreate
    },
    {
        path: '/employee/edit/:id',
        name: 'EmployeeEdit',
        component: EmployeeEdit
    }
]