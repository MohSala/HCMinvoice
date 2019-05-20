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
                            <th><button class="btn btn-success" @click="clearform"><i class="fas fa-user-plus"></i></button></th>
                        </tr>
                    </thead>
                    <tbody>
                        
                        <tr v-for="user in users " :key="user.id">
                            <td>{{user.id}}</td>
                            <td>{{user.name}}</td>
                            <td>{{user.email}}</td>
                            <td>{{user.type}}</td>
                            <td>
                                <button class="btn btn-outline-info" @click="editform(user)">Edit</button>
                                <button class="btn btn-danger" @click="deleteUser(user.id)">Delete</button>
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
							<h5 v-show="editMode"  class="modal-title" id="mediumModalLabel">Update User</h5>
                            <h5 v-show="!editMode" class="modal-title" id="mediumModalLabel">Add User</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
                        <form @submit.prevent ="editMode ? updateUser()  : createUser()">
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
                                <option value="admin_user">Administrator</option>
                                <option value="normal_user">Standard User</option>
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
            users: {},
            editMode: false,
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
              updateUser() {
            this.$Progress.start();
            this.form.put('api/user/'+ this.form.id)
            .then(() => {
                Fire.$emit('AfterCreate');
                $('#addNew').modal('hide')
            })
            .then(() => {
                 swal.fire({
                type: 'success',
                title: 'User Updated Successfully'
            })
            })
            .catch(()=> {
                console.log(error)
            })
            this.$Progress.finish();

        },
            editform(user) {
                this.editMode = true;
                this.form.reset()
               $('#addNew').modal('show')
               this.form.fill(user)
        },
            loadUsers() {
                axios.get('api/user')
                .then(({data}) => {
                    this.users = data.data
                })
            },
            createUser() {
                this.editMode = false;
                this.$Progress.start();
              this.form.post('api/user')
               .then(() => {
                Fire.$emit('AfterCreate');
            $('#addNew').modal('hide')
            })
            .then(()=> {
                toast.fire({
                type: 'success',
                title: 'User Created Successfully'
                })
            })
            .then(()=> {
                clearform()
            })

            .catch(() => {
                console.log(error)
            })
              this.$Progress.finish(); 
            },
            clearform() {
                this.editMode = false;
                this.form.reset()
               $('#addNew').modal('show')
            },
             deleteUser(id) {
            
            swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
            })
            
            .then((result) => {
               if(result.value) {
                   this.$Progress.start()
                    this.form.delete('api/user/'+id)
                    
                .then(() => {
                 
                  swal.fire(
                'Deleted!',
                'User has been deleted.',
                'success'
                )
                Fire.$emit('AfterCreate');
               
              })
               
                .catch(()=> {
                    swal('Failed','There was something wrong','danger')
                });
                this.$Progress.finish()
               }
            })
            
        }
    },
    created() {
        this.loadUsers();
        Fire.$on('AfterCreate', () => {this.loadUsers()});
    }
}
</script>

