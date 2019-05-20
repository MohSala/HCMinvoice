    <template>
    <div class="row">
        <div class="col-lg-12">
            <h2 style="margin-top:30px">Organizations</h2>
            <div class="table-responsive table--no-card m-b-40">
                <table class="table table-borderless table-light">
                    <thead>
                        <tr>
                         
                            <th>Name</th>
                            <th>Address</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Managed By</th>
                            <th>Action</th>
                            <th><button class="btn btn-outline-dark" @click="clearform"><i class="fa fa-plus-circle"></i> </button> </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr  v-for="organization in organizations " :key="organization.id">
                          
                            <td>{{organization.name}}</td>
                            <td>{{organization.address}}</td>
                            <td>{{organization.email}}</td>
                            <td>{{organization.phone}}</td>
                            <td>{{organization.managed_by}}</td>
                            <td>
                                <button class="btn btn-outline-info btn-sm" @click="editform(organization)"><i class="fas fa-edit"></i></button>
                            </td>
                            <td>
                                <button class="btn btn-danger btn-sm" @click="deleteOrgs(organization.id)"><i class="fas fa-trash"></i></button>

                            </td>
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
                            <h5  class="modal-title" id="mediumModalLabel">Add Organization</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
                        <form @submit.prevent ="editMode ? updateOrgs()  : createOrg()">
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
                            <input v-model="form.address" type="address" name="address" placeholder="Enter address"
                                class="form-control" :class="{ 'is-invalid': form.errors.has('address') }">
                            <has-error :form="form" field="address"></has-error>
                            </div>

                            <div class="form-group">
                            <input v-model="form.phone" type="phone" name="phone" placeholder="Enter phone(Optional)"
                                class="form-control" :class="{ 'is-invalid': form.errors.has('phone') }">
                            <has-error :form="form" field="phone"></has-error>
                            </div>

                            <div class="form-group">
                            <input v-model="form.managed_by" type="managed_by" name="managed_by" placeholder="Your Full Name"
                                class="form-control" :class="{ 'is-invalid': form.errors.has('managed_by') }">
                            <has-error :form="form" field="managed_by"></has-error>
                            </div>

                            

						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
							<button type="submit" class="btn btn-success">Confirm</button>
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
    data() {
        return {
           organizations: {},
           editMode: false,
           form: new Form({
               id: '',
                name: '',
                address: '',
                email: '',
                phone: '',
                managed_by:'',
           })
        }
    },

    methods: {
         updateOrgs() {
            this.$Progress.start();
            this.form.put('api/organization/'+ this.form.id)
            .then(() => {
                Fire.$emit('AfterCreate');
                $('#addNew').modal('hide')
            })
            .then(() => {
                 swal.fire({
                type: 'success',
                title: 'Organization Updated Successfully'
            })
            })
            .catch(()=> {
                console.log(error)
            })
            this.$Progress.finish();

        },
            editform(organization) {
                this.editMode = true;
                this.form.reset()
               $('#addNew').modal('show')
               this.form.fill(organization)
        },
        loadOrgs() {
            axios.get('api/organization')
            .then(({data}) => {
                    this.organizations = data.data
                })
        },
        createOrg() {
         this.editMode = false;
        this.$Progress.start();
              this.form.post('api/organization')
               .then(() => {
                Fire.$emit('AfterCreate');
            $('#addNew').modal('hide')
            })
            .then(()=> {
                toast.fire({
                type: 'success',
                title: 'Organization Created Successfully'
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
         deleteOrgs(id) {
            
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
                    this.form.delete('api/organization/'+id)
                    
                .then(() => {
                 
                  swal.fire(
                'Deleted!',
                'Organization Data has been deleted.',
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
        this.loadOrgs();
        Fire.$on('AfterCreate', () => {this.loadOrgs()});
    }
}
</script>


</template>
