<template>
    <div class="container-fluid">
        <div class="row">
        <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Teachers Table</h3>
                <div class="card-tools">
                 <button class="btn btn-primary" data-toggle="modal" data-target="#addNew">Add New <i class="fas fa-user-plus fa-fw"></i></button>
                </div>                
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Teachers</th>
                      <th>Modify</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr v-for="teacher in teachers.data" :key="teacher.id">
                      <td>{{teacher.id}}</td>
                      <td>{{teacher.name}}</td>
                      <td>
                          <a href="#"><i class="fa fa-edit"></i></a>
                          <a href="#"><i class="fa fa-trash text-danger"></i></a>
                      </td>
                      
                    </tr>                    
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>
        <div class="modal fade" id="addNew" tabindex="-1" role="dialog" aria-labelledby="addNewLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addNewLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form @submit.prevent="createTeacher">
      <div class="modal-body">
        <div class="form-group">
            <input v-model="form.name" type="text" name="name" placeholder="Name"
                class="form-control" :class="{ 'is-invalid': form.errors.has('name') }">
            <has-error :form="form" field="name"></has-error>
        </div>
        <div class="form-group">
            <input v-model="form.email" type="email" name="email" placeholder="Email"
                class="form-control" :class="{ 'is-invalid': form.errors.has('email') }">
            <has-error :form="form" field="email"></has-error>
        </div>
        <div class="form-group">
            <label for="role">Select Teacher Role</label>
            <select v-model="form.role" name="role" id="role"
                class="form-control" :class="{ 'is-invalid': form.errors.has('role') }">
                <option value="0">Select User Role</option>
                  <option v-for="data in roles" :key="data.id">{{ data.name }}</option>
                </select>
            <has-error :form="form" field="type"></has-error>
        </div>
        <div class="form-group">
            <input v-model="form.password" type="password" name="password" id="password"
                class="form-control" :class="{ 'is-invalid': form.errors.has('password') }">
            <has-error :form="form" field="password "></has-error>
        </div>        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
      </form>
    </div>
  </div>
</div>
    </div>
    
</template>

<script>
    export default {
        data(){
            return{
                teachers: {},
                roles: [],
                form:new Form({
                    name: '',
                    email: '',
                    password: '',
                    role: '',
                })
            }
        },
        methods: {
            createTeacher(){
                this.$Progress.start();
                this.form.post('api/teacher')
                .then(()=>{
                    Fire.$emit('AfterCreate');
                    $('#addNew').modal('hide')
                    Toast.fire({
                        icon: 'success',
                        title: 'Role Created Successfully'
                        })
                    this.$Progress.finish();
                })
                .catch(()=>{

                })
                
            },
            loadTeachers(){
                 axios.get("api/teacher").then(({data})=>(this.teachers=data));
            },
            getRole(){
              axios.get('/api/getteacherRoles')
              .then(function (response) {
                 this.roles = response.data;
              }.bind(this));

            }, 
        },
        created() {
            this.getRole()
            this.loadTeachers();
             Fire.$on('AfterCreate',()=>{
                this.loadTeachers();
            }); 
        }
    }
</script>
