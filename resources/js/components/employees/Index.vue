<template>
    <div>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="alert alert-success" v-if="showMessage">
                        {{ message }}
                    </div>
                    
                    <div class="card-header d-flex justify-content-between">
                        <div>
                            <h2>Employees</h2>
                        </div>
                        <div>
                            <form class="d-flex" method="GET" action="">
                                <div  class="mr-2">
                                    <input type="text" class="form-control" placeholder="Search" name="search">
                                </div>
                                <div>
                                    <button type="submit" class="btn btn-primary mb-3">Search</button>
                                </div>
                            </form>
                        </div>
                        <div>
                            <router-link
                                :to="{name: 'EmployeeCreate'}"
                            >Create Employee</router-link>
                        </div>
                    </div>

                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                <th scope="col">#</th>
                                <th scope="col">First Name</th>
                                <th scope="col">Last Name</th>
                                <th scope="col">Address</th>
                                <th scope="col">Department</th>
                                </tr>
                            </thead>
                            <tbody>
                            <tr v-for="employee in employees" :key="employee.id">
                                <td>#{{ employee.id }}</td>
                                <td>{{ employee.first_name }}</td>
                                <td>{{ employee.last_name }}</td>
                                <td>{{ employee.address }}</td>
                                <td>{{ employee.department.name }}</td>
                                <td>
                                    <router-link :to="{name: 'EmployeeEdit', params: {id: employee.id}}" class="btn btn-sm btn-success">Edit</router-link>
                                    |
                                    <button @click="deleteEmployee(employee.id)" class="btn btn-sm btn-danger">Delete</button>
                                </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <router-view></router-view>
    </div>
</template>

<script>
export default {
    name: 'Index',
    data(){
        return {
            employees: [],
            showMessage: false,
            message: ''
        }
    },
    created(){
        this.getEmployees();
    },
    methods: {
        getEmployees(){
            axios.get('/api/employees')
                .then(res => {
                    this.employees = res.data.data
                })
                .catch(error => console.log(error))
        },
        deleteEmployee(id){

            axios.delete(`/api/employee/${id}`)
                .then(res => {
                    this.showMessage = true
                    this.message = res.data
                    this.getEmployees();
                })
                .catch(error => console.log(error));
        }
    }
}
</script>