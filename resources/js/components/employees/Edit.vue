<template>
    <div>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div>
                            <h2>Edit Employee</h2>
                        </div>
                        <div>
                            <router-link :to="{name:'EmployeeIndex'}" class="btn btn-dark">Back</router-link>
                        </div>
                    </div>

                    <div class="card-body">
                        <form method="POST" @submit.prevent="updateEmployee">
                            
                            <div class="form-group row">
                                <label for="first_name" class="col-md-4 col-form-label text-md-right">First Name</label>

                                <div class="col-md-6">
                                    <input id="first_name" type="text" class="form-control" required v-model="form.first_name">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="middle_name" class="col-md-4 col-form-label text-md-right">Middle Name</label>

                                <div class="col-md-6">
                                    <input id="middle_name" type="text" class="form-control" required v-model="form.middle_name">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="last_name" class="col-md-4 col-form-label text-md-right">Last Name</label>

                                <div class="col-md-6">
                                    <input id="last_name" type="text" class="form-control" required v-model="form.last_name">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="address" class="col-md-4 col-form-label text-md-right">Address</label>

                                <div class="col-md-6">
                                    <input id="address" type="text" class="form-control" required v-model="form.address">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="department" class="col-md-4 col-form-label text-md-right">Department</label>
                                
                                <div class="col-md-6">
                                    <select v-model="form.department_id" id="department" class="form-control">
                                        <option v-for="department in departments" :key="department.id" :value="department.id">{{ department.name }}</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="country" class="col-md-4 col-form-label text-md-right">Country</label>
                                
                                <div class="col-md-6">
                                    <select id="country" class="form-control" v-model="form.country_id" @change="getStates()">
                                        <option v-for="country in countries" :key="country.id" :value="country.id">{{ country.name }}</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="state" class="col-md-4 col-form-label text-md-right">State</label>
                                
                                <div class="col-md-6">
                                    <select id="state" class="form-control" v-model="form.state_id" @change="getCities()">
                                        <option v-for="state in states" :key="state.id" :value="state.id">{{ state.name }}</option>
                                    </select>
                                </div>
                            </div>

                             <div class="form-group row">
                                <label for="city" class="col-md-4 col-form-label text-md-right">City</label>
                                
                                <div class="col-md-6">
                                    <select v-model="form.city_id" id="city" class="form-control">
                                        <option v-for="city in cities" :key="city.id" :value="city.id">{{ city.name }}</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="birth_date" class="col-md-4 col-form-label text-md-right">Date of Birth</label>

                                <div class="col-md-6">
                                    <datepicker input-class="form-control" v-model="form.birth_date"></datepicker>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="date_hired" class="col-md-4 col-form-label text-md-right">Date of Hired</label>

                                <div class="col-md-6">
                                    <datepicker input-class="form-control" v-model="form.date_hired"></datepicker>
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                    Update Employee
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import Datepicker from 'vuejs-datepicker'
import moment from 'moment'

export default {
    name: 'Create',
    components: {
        Datepicker
    },
    data(){
        return{
            countries: [],
            states: [],
            cities: [],
            departments: [],
            form: {
                first_name: '',
                last_name: '',
                address: '',
                country_id: '',
                state_id: '',
                city_id: '',
                department_id: '',
                middle_name: '',
                zip_code: '',
                date_hired: null,
                birth_date: null,
            }
        }
    },
    created(){
        this.getCountries()
        this.getDepartments()
        this.getEmployee()
    },
    methods: {
        getEmployee(){
            axios.get(`/api/employee/${this.$route.params.id}`)
                .then(res => {
                    this.form = res.data.data
                    this.getStates()
                    this.getCities()
                })
                .catch(error => console.log(error))
        },
        getCountries(){
            axios.get('/api/employees/countries')
            .then(res => {
                this.countries = res.data
            })
            .catch(error => { console.log(error)})
        },
        getStates(){
            
            axios.get(`/api/employees/${this.form.country_id}/states`)
            .then(res => {
                this.states = res.data
            })
            .catch(error => { console.log(error)})
        },
        getCities(){
             axios.get(`/api/employees/${this.form.state_id}/cities`)
            .then(res => {
                this.cities = res.data
            })
            .catch(error => { console.log(error)})
        },
        getDepartments(){
             axios.get(`/api/employees/departments`)
            .then(res => {
                this.departments = res.data
            })
            .catch(error => { console.log(error)})
        },
        updateEmployee(){
            axios.put(`/api/employee/${this.$route.params.id}`, { 
                'first_name' : this.form.first_name,
                'last_name' : this.form.last_name,
                'middle_name' : this.form.middle_name,
                'address' : this.form.address,
                'department_id' : this.form.department_id,
                'country_id' : this.form.country_id,
                'state_id' : this.form.state_id,
                'city_id' : this.form.city_id,
                'birth_date' : this.formatDate(this.form.birth_date),
                'date_hired' : this.formatDate(this.form.date_hired),
            })
                .then(res => {
                    this.$router.push({name: 'EmployeeIndex'})
                })
                .catch(error => console.log(error))
        },
        formatDate(value){
            if(value){
                return moment(value).format('YYYY-MM-DD')
            }
        }
    }
}
</script>

