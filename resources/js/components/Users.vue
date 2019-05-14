<template>
    <div class="container">
        <div class="row">
            <h2 class="title-1 m-b-25">Users</h2>
            <div class="table-responsive table--no-card m-b-40">
                <table class="table table-borderless table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Type</th>
                            <th>Action</th>
                            <th><button class="btn btn-success" data-toggle="modal" data-target="#addNew"><i class="fas fa-user-plus"></i></button></th>
                        </tr>
                    </thead>
                    <tbody>
                        
                        <tr>
                            <td>1</td>
                            <td>Bola Sanusi</td>
                            <td>Game@gamd.com</td>
                            <td>Admin User</td>
                            <td>
                                <button class="btn btn-outline-info">Edit</button>
                                <button class="btn btn-danger">Delete</button>
                            </td>
                            <td></td>
                        </tr>
                        
                       
                    </tbody>
                </table>
            </div>
        </div>


        <!-- modal medium -->
			<div class="modal fade" id="addNew" tabindex="-1" role="dialog" style="margin-top:60px;background-color:black" aria-labelledby="mediumModalLabel" aria-hidden="true">
				<div class="modal-dialog modal-md" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<!-- <h5  class="modal-title" id="mediumModalLabel">Update User</h5> -->
                            <h5  class="modal-title" id="mediumModalLabel">Add User</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
                        <form @submit.prevent ="createUser()">
						<div class="modal-body">
							
                            <div class="form-group">
                            <input v-model="form.name" type="text" name="name" placeholder="Enter Name"
                                class="form-control" :class="{ 'is-invalid': form.errors.has('name') }">
                            <has-error :form="form" field="name"></has-error>
                            </div>

                            <div class="form-group">
                            <input v-model="form.email" type="email" name="email" placeholder="Enter email"
                                class="form-control" :class="{ 'is-invalid': form.errors.has('email') }">
                            <has-error :form="form" field="email"></has-error>
                            </div>

                            <div class="form-group">
                            <select v-model="form.type" type="text" name="type"
                                class="form-control" :class="{ 'is-invalid': form.errors.has('type') }">
                                <option value="">Select User Type</option>
                                <option value="admin">Admin</option>
                                <option value="user">Standard User</option>
                                <option value="author">Author</option>
                            </select>
                            <has-error :form="form" field="type"></has-error>
                            </div>

                            <div class="form-group">
                            <input v-model="form.password" type="password" name="password" placeholder="Enter password"
                                class="form-control" :class="{ 'is-invalid': form.errors.has('password') }">
                            <has-error :form="form" field="password"></has-error>
                            </div>

						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
							<button type="submit" class="btn btn-primary">Confirm</button>
                            <!-- <button  type="submit" class="btn btn-primary">Update</button> -->
						</div>
					</form>
                    </div>
                    
				</div>
			</div>
			<!-- end modal medium -->

    </div>


    
</template>

<script>
export default {
    data () {
        return {
            form: new Form({
                id: '',
                name: '',
                email: '',
                password:'',
                type:'',
            })
        }
    },
    methods: {

    }
}
</script>

