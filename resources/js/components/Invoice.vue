    <template>
    <div class="row">
        <div class="col-lg-12">
            <h4 style="margin:30px 0 30px 0">Invoices & Quotes</h4>
            <div class="table-responsive table--no-card m-b-40">
                <table class="table table-borderless table-dark">
                    <thead>
                        <tr>
                            <td>S/N</td>
                            <th>Name</th>
                            <th>Company</th>
                            <th>Status</th>
                            <th>Created On</th>
                            <th>Action</th>
                            <th>Add Item</th>
                            <th><button class="btn btn-success btn-sm" @click="clearform"><i class="fa fa-list"></i> </button> </th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="invoice in invoices" :key="invoice.id">
                            <td>{{invoice.id}}</td>
                            <td>{{invoice.name}}</td>
                            <td>{{invoice.organ.name}}</td>
                            <td v-if="invoice.status == 0" class="text-danger">Pending</td>
                            <td v-else class="text-success">Approved</td>
                            <td>{{invoice.created_at | myDate}}</td>
                            <td>
                                <button class="btn btn-outline-light btn-sm" @click="editform(invoice)"><i class="fas fa-edit"></i></button>
                                <button class="btn btn-danger btn-sm" @click="deleteInvoice(invoice.id)"><i class="fas fa-trash"></i></button>
                            </td>
                           <td><button class="btn btn-success btn-sm" @click.prevent="show(invoice)" @click="addItemModal"><i class="fa fa-plus-circle"></i></button></td>
                           <td><button @click.prevent="show(invoice)" class="btn btn-outline-success btn-sm" data-toggle="modal" data-target="#invoiceForm"> <i class="fas fa-eye"></i> </button></td>

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
                            <h5  class="modal-title" id="mediumModalLabel">Create A Quote</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
                        <form @submit.prevent ="editMode ? updateInvoice()  : createInvoice()">
						<div class="modal-body">
							

                            <div class="form-group">
                                <select v-model="form.currency" type="text" name="currency" class="" :class="{ 'is-invalid': form.errors.has('currency') }">
                                    <option value="">Select Currency</option>
                                    <!-- <option value="0" selected>&#8358</option> -->
                                    <option value="1">$</option>
                                    <option value="2">£</option>
                                </select>
                                <has-error :form="form" field="currency"></has-error>
                            </div>

                            <div class="form-group">
                            <input v-model="form.name" type="text" name="name" placeholder="Enter Name"
                                class="form-control" :class="{ 'is-invalid': form.errors.has('name') }">
                            <has-error :form="form" field="name"></has-error>
                            </div>
                            
                            <div class="form-group">
                                <select v-model="form.org_id" type="org_id" name="org_id" class="form-control" :class="{ 'is-invalid': form.errors.has('org_id') }">
                                    <option value="" >Select Organization</option>
                                    <option v-for="organization in organizations" v-bind:key="organization.id" v-bind:value="organization.id">{{organization.name}}</option>
                                </select>
                                <has-error :form="form" field="org_id"></has-error>
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


             <!-- modal medium -->
			<div class="modal fade" id="invoiceForm" tabindex="-1" role="dialog" style="margin-top:60px;background-color:black" aria-labelledby="mediumModalLabel" aria-hidden="true">
				<div class="modal-dialog modal-lg" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<!-- <h5  class="modal-title" id="mediumModalLabel">Update User</h5> -->
                            <h5  class="modal-title" id="mediumModalLabel">Add Quote Items</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
                        
						<div class="modal-body">
							<table class="table table-borderless table-light">
                                <thead>
                                    <tr>
                                        <th>Description</th>
                                        <th>Quantity</th>
                                        <th>Unit Cost</th>
                                        <th>Discount</th>
                                        <th>Total</th>
                                        <th></th>
                                        <!-- <th><button class="btn btn-success btn-sm"><i class="fa fa-plus-circle"></i> </button> </th> -->
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="item in items" v-bind:key="item.id">
                                        <td>{{item.id}}</td>
                                        <td>{{item.name}}</td>
                                        <td>{{item.quantity}}</td>
                                        <td>{{item.unitcost}}</td>
                                        <td>{{item.discount}}</td>
                                        <td></td>
                                        <td>
                                            <!-- <button class="btn btn-outline-info btn-sm" ><i class="fas fa-edit"></i></button> -->
                                        </td>
                                        <td>
                                            <button class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>

                                        </td>
                                    </tr>

                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td>Subtotal:</td>
                                        <td>5,000,000</td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td>VAT(5%):</td>
                                        <td>5,300,000</td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td>Total:</td>
                                        <td>15,500,000</td>
                                    </tr>
                                </tbody>
                            </table>
                    </div>
						<div class="modal-footer">
                            <button type="submit" class="btn btn-success"><i class="fas fa-check"></i>     Submit for Review</button>
							<button type="submit" class="btn btn-danger"><i class="fas fa-download"></i>      Generate Quote</button>
                            <!-- <button  type="submit" class="btn btn-primary">Update</button> -->
						</div>
					
                    </div>
                    
				</div>
			</div>
			<!-- end modal medium -->

             <!-- modal medium -->
			<div class="modal fade" id="addItemModal" tabindex="-1" role="dialog" style="margin-top:60px;background-color:black" aria-labelledby="mediumModalLabel" aria-hidden="true">
				<div class="modal-dialog modal-md" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<!-- <h5  class="modal-title" id="mediumModalLabel">Update User</h5> -->
                            <h5  class="modal-title" id="mediumModalLabel">Create A Quote</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
                        <form @submit.prevent ="addItem()">
						<div class="modal-body">

                            <input type="hidden" name="invoice_id" v-model="form.invoice_id">
                            <!-- <input  type="text" name="org_id" v-model="form.org_id" v-bind:key="organization.id" > -->
                            <input type="hidden" name="currency" v-model="form.currency">
                          
                            <label class="label" for="">Description</label>
                            <div class="form-group">
                            <input v-model="form.name" type="text" name="name"
                                class="form-control" :class="{ 'is-invalid': form.errors.has('name') }">
                            <has-error :form="form" field="name"></has-error>
                            </div>

                            <label class="label" for="">Quantity</label>
                            <div class="form-group">
                            <input v-model="form.quantity" type="number" name="quantity"
                                class="form-control" :class="{ 'is-invalid': form.errors.has('quantity') }">
                            <has-error :form="form" field="quantity"></has-error>
                            </div>

                            <label class="label" for="">Unit Cost</label>
                            <div class="form-group">
                            <input v-model="form.unitcost" type="number" name="unitcost"
                                class="form-control" :class="{ 'is-invalid': form.errors.has('unitcost') }">
                            <has-error :form="form" field="unitcost"></has-error>
                            </div>

                            <label class="label" for="">Discount</label>
                            <div class="form-group">
                            <input v-model="form.discount" type="number" name="discount"
                                class="form-control" :class="{ 'is-invalid': form.errors.has('discount') }">
                            <has-error :form="form" field="discount"></has-error>
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
    data () {
        return {
             invoices: {},
             invoice: {},
             items: {},
             organization:{},
             organizations:[],
            editMode: false,
            form: new Form({
                id: '',
                name: '',
                org_id: '',
                currency: '',
                invoice_id: '',
            })
        }
    },
    methods: {
        getItems() {
            axios.get('api/item')
            .then(({data}) => {
                // console.log(data)
                this.items = data.data;
            })
            .catch((err) => {
                console.log(err)
            })
        },
        addItem() {
            this.$Progress.start()
            this.form.post('api/item')
            .then(() => {
                Fire.$emit('AfterCreate');
                $('#addItemModal').modal('hide')
            })
            .then(() => {
                 swal.fire({
                type: 'success',
                title: 'Your Item has been added Successfully! Check the Eye Icon to view your items'
            })
            })
            .catch(()=> {
                console.log(error)
            })
            .then(() => {
                clearmodal()
            })
            this.$Progress.finish()
        },
         updateInvoice() {
            this.$Progress.start();
            this.form.put('api/invoice/'+ this.form.id)
            .then(() => {
                Fire.$emit('AfterCreate');
                $('#addNew').modal('hide')
            })
            .then(() => {
                 swal.fire({
                type: 'success',
                title: 'Invoice Updated Successfully'
            })
            })
            .catch(()=> {
                console.log(error)
            })
            this.$Progress.finish();

        },
        editform(invoice) {
                
                this.editMode = true;
                this.form.reset()
               $('#addNew').modal('show')
               this.form.fill(invoice)
        },
       
        loadInvoices() {
            axios.get('api/invoice')
            .then(({data}) => {
                // console.log(data)
                this.invoices = data.data;
            })
            .catch((err) => {
                console.log(err)
            })
        },
        createInvoice() {
            
            this.editMode = false;
            this.$Progress.start();
            this.form.post('api/invoice')
            .then(() => {
                  Fire.$emit('AfterCreate');
            $('#addNew').modal('hide')
            })
            .then(() => {
                toast.fire({
                type: 'success',
                title: 'Invoice Created Successfully'
                })
            })
            .then(() => {
                clearform()
            })
            .catch((error) => {
                console.log(error)
            })
              this.$Progress.finish();
        },
        clearform() {
            this.editMode = false;
            this.form.reset()
            $('#addNew').modal('show')
        },
        clearmodal() {
            this.editMode = false;
            this.form.reset()
            $('#addItemModal').modal('show')
        },
        addItemModal(invoice) {
            this.editMode = false;
            this.form.reset()
            this.form.invoice_id = this.invoice.id
            this.form.currency = this.invoice.currency
            this.id = '';
            $('#addItemModal').modal('show')
        },
        fetchOrgs() {
          fetch('api/organization')
            .then(res => res.json())
            .then(res => {
                // console.log(res.data)
                this.organizations = res.data;
            })
            .catch(err => {
                console.log(err);
            })
        },
        deleteInvoice(id) {
            
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
                    this.form.delete('api/invoice/'+id)
                    
                .then(() => {
                 
                  swal.fire(
                'Deleted!',
                'Invoice has been deleted.',
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
            
        },
        show(invoice) {
            this.invoice = invoice;
            axios.get('api/item/'+ invoice.id)
            .then(({data}) => {
              
            })
        },
        showOneOrg(organization) {
            this.organization = organization;
        }
    },
    created () {
    this.loadInvoices();
    this.fetchOrgs();
    this.show(invoice);
    Fire.$on('AfterCreate', () => {this.loadInvoices()});
    }
}
</script>
