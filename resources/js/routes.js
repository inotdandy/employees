import EmployeeIndex from './components/employees/Index'
import EmployeeCreate from './components/employees/Create'
import EmployeeEdit from './components/employees/Edit'

export const routes = [
    {
        path: '/employees',
        name: 'employees.index',
        component: EmployeeIndex
    },
    {
        path: '/create',
        name: 'employees.create',
        component: EmployeeCreate
    },
    {
        path: '/employees',
        name: 'employees.edit',
        component: EmployeeEdit
    }
]