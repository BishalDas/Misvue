<template>
    <div class="container-fluid">
        <div class="row">
        <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Roles Table</h3>
                <div class="card-tools">
                 <button class="btn btn-primary" data-toggle="modal" data-target="#addStudent">Add New <i class="fas fa-user-plus fa-fw"></i></button>
                </div>                
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>NAME</th>
                      <th>Email</th>
                      <th>MODIFY</th>
                    </tr>
                    <tr v-for="student in students.data" :key="student.id">
                        <td>{{student.id}}</td>
                        <td>{{student.name}}</td>
                        <td>{{student.email}}</td>
                        <td>
                            <a href="#"><i class="fa fa-edit"></i></a>
                            <a href="#"><i class="fa fa-trash text-danger"></i></a>
                        </td>
                    </tr>
                  </thead>
                  <tbody>
                                       
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>
        <div class="modal fade" id="addStudent" tabindex="-1" role="dialog" aria-labelledby="addStudentLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addStudentLabel">Add New Student</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form @submit.prevent="createStudent">
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
            <input v-model="form.password" type="password" name="password" id="password" placeholder="Password"
                class="form-control" :class="{ 'is-invalid': form.errors.has('password') }">
            <has-error :form="form" field="password "></has-error>
        </div>
          <div class="form-group">
              <label for="role" class="">Select Student Role<span class="text-danger">*</span> </label><br/>
            <select v-model="form.role" name="role" id="role"
                class="form-control" :class="{ 'is-invalid': form.errors.has('role') }">
                <option value="">Select User Role</option>
                  <option v-for="data in roles" :key="data.id">{{ data.name }}</option>
                </select>
            <has-error :form="form" field="role"></has-error>
        </div>
        <div class="form-group">
            <label for="gender" class="">Gender<span class="text-danger">*</span> </label><br/>
            <div class="custom-control custom-radio custom-control-inline">
                <input  v-model="form.gender" type="radio" id="male" name="gender" value="male" class="custom-control-input">
                <label class="custom-control-label" for="male">MALE</label>
            </div>
            <div class="custom-control custom-radio custom-control-inline">
                <input v-model="form.gender" type="radio" id="female" name="gender" value="female" class="custom-control-input">
                <label class="custom-control-label" for="female">FEMALE</label>
            </div>
        </div>
        <div class="form-group">
            <input v-model="form.guardian_name" type="text" name="guardian_name" placeholder="Guardian Name"
                class="form-control" :class="{ 'is-invalid': form.errors.has('guardian_name') }">
            <has-error :form="form" field="guardian_name"></has-error>
        </div>
        <div class="form-group">
            <input v-model="form.guardian_email" type="email" name="guardian_email" placeholder="Guardian Email"
                class="form-control" :class="{ 'is-invalid': form.errors.has('guardian_email') }">
            <has-error :form="form" field="guardian_email"></has-error>
        </div>  
        <div class="form-group">
            <input v-model="form.guardian_address" type="text" name="guardian_address" placeholder="Guardian Address"
                class="form-control" :class="{ 'is-invalid': form.errors.has('guardian_address') }">
            <has-error :form="form" field="guardian_address"></has-error>
        </div>
        <div class="form-group">
            <input v-model="form.guardian_contact" type="text" name="guardian_contact" placeholder="Guardian Contact"
                class="form-control" :class="{ 'is-invalid': form.errors.has('guardian_contact') }">
            <has-error :form="form" field="guardian_contact"></has-error>
        </div>  
        <div class="form-group">
            <select v-model="form.grade" @change="getSection()" name="grade" id="grade"
                class="form-control" :class="{ 'is-invalid': form.errors.has('grade') }">
                <option value="">Select Grade</option>
                  <option v-for="data in grades" :value="data.id" :key="data.id">{{ data.name }}</option>
                </select>
            <has-error :form="form" field="grade"></has-error>
        </div>    
        <div class="form-group">
            <select v-model="form.section" name="section" id="section" 
                class="form-control" :class="{ 'is-invalid': form.errors.has('section') }">
                <option value="">Select Section</option>
                  <option v-for="data in sections" :value="data.id" :key="data.id">{{ data.name }}</option>
                </select>
            <has-error :form="form" field="section"></has-error>
        </div> 
        <div class="form-group">
            <input v-model="form.reg_no" type="text" name="reg_no" placeholder="Registration Number"
                class="form-control" :class="{ 'is-invalid': form.errors.has('reg_no') }">
            <has-error :form="form" field="reg_no"></has-error>
        </div>
          <div class="form-group">
            <input v-model="form.roll_no" type="text" name="roll_no" placeholder="Roll no"
                class="form-control" :class="{ 'is-invalid': form.errors.has('roll_no') }">
            <has-error :form="form" field="roll_no"></has-error>
        </div>   
        <div class="form-group">
             <label for="date_of_birth" class="">Date of Birth<span class="text-danger">*</span> </label><br/>
            <input v-model="form.date_of_birth" type="date" name="date_of_birth" placeholder="Date of Birth"
                class="form-control" :class="{ 'is-invalid': form.errors.has('date_of_birth') }">
            <has-error :form="form" field="date_of_birth"></has-error>
        </div>
        <div class="form-group">
            <input v-model="form.address" type="text" name="address" placeholder="Address"
                class="form-control" :class="{ 'is-invalid': form.errors.has('address') }">
            <has-error :form="form" field="address"></has-error>
        </div>  
         <div class="form-group">
            <input type="file" name="image" placeholder="Image"
                class="form-control" :class="{ 'is-invalid': form.errors.has('image') }">
            <has-error :form="form" field="image"></has-error>
        </div>
          <div class="form-group">
               <label for="admission_date" class="">Admission Date<span class="text-danger">*</span> </label><br/>
            <input v-model="form.date_of_admission" type="date" name="date_of_admission" placeholder="Date of Admission"
                class="form-control" :class="{ 'is-invalid': form.errors.has('date_of_admission') }">
            <has-error :form="form" field="date_of_admission"></has-error>
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
                students: {},
                grades: [],
                sections: [],
                roles: [],
                form:new Form({
                    name: '',
                    email: '',
                    password: '',
                    role: '',
                    gender: '',
                    guardian_name: '',
                    guardian_email: '',
                    guardian_address: '',
                    guardian_contact: '',                    
                    grade: '',
                    section: '',
                    reg_no: '',
                    date_of_birth: '',
                    date_of_admission: '',
                    address: '',
                    contact:'',
                })
            }
        },
        methods: {
            createStudent(){
                this.$Progress.start()
                this.form.post('api/student')
                .then(()=>{
                    Fire.$emit('AfterCreate');
                    $('#addStudent').modal('hide')
                    Toast.fire({
                        icon: 'success',
                        title: 'Role Created Successfully'
                        })
                    this.$Progress.finish();
                })
                .catch(()=>{

                })
                
            },
            loadStudents(){
                 axios.get("api/student").then(({data})=>(this.students=data));
            },
            getGrade(){
              axios.get('/api/getGrade')
              .then(function (response) {
                 this.grades = response.data;
              }.bind(this));

            },
            getSection() {
                axios.get('/api/getSection',{
                 params: {
                   grade_id: this.form.grade
                 }
              }).then(function(response){
                    this.sections = response.data;
                }.bind(this));
            },
            getRole(){
              axios.get('/api/getRoles')
              .then(function (response) {
                 this.roles = response.data;
              }.bind(this));

            },            
        },
        
        created() {
            this.getRole()
            this.getGrade()
            this.loadStudents();
             Fire.$on('AfterCreate',()=>{
                this.loadStudents();
            }); 
        },
           
        
        
    }
</script>
