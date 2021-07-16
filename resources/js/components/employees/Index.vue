<template>
    <div>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="alert alert-success"></div>
                    
                    <div class="alert alert-danger"></div>
                    
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
                            <a href="">Create Employee</a>
                        </div>
                    </div>

                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                <th scope="col">#</th>
                                <th scope="col">Code</th>
                                <th scope="col">Name</th>
                                </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <th scope="row"></th>
                                <td></td>
                                <td></td>
                                <td><a href="" class="btn btn-sm btn-success">Edit</a></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: 'Index'
}
</script>