<template>
    <div class="container-fluid">
        <div class="row">
        <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">sections Table</h3>
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
                      <th>Name</th>
                      <th>Role</th>
                      <th>Modify</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr v-for="section in sections.data" :key="section.id">
                      <td>{{section.id}}</td>
                      <td>{{section.name}}</td>
                      <td>{{section.role}}</td>
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
      <form @submit.prevent="createSection">
      <div class="modal-body">
        <div class="form-group">
            <input v-model="form.name" type="text" name="name" placeholder="Name"
                class="form-control" :class="{ 'is-invalid': form.errors.has('name') }">
            <has-error :form="form" field="name"></has-error>
        </div>
        <div class="form-group">
            <select v-model="form.grade" name="grade" id="grade"
                class="form-control" :class="{ 'is-invalid': form.errors.has('grade') }">
                <option value="0">Select Grade</option>
                  <option v-for="data in grades" :key="data.id">{{ data.name }}</option>
                </select>
            <has-error :form="form" field="grade"></has-error>
        </div>  
        <div class="form-group">
            <input v-model="form.description" type="text" name="description" placeholder="Description"
                class="form-control" :class="{ 'is-invalid': form.errors.has('description') }">
            <has-error :form="form" field="description"></has-error>
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
                sections: {},
                grades: [],
                form:new Form({
                    name: '',
                    description: '',
                })
            }
        },
        methods: {
            createSection(){
                this.$Progress.start()
                this.form.post('api/section')
                .then(()=>{
                    this.grades=res.data.grades
                    Fire.$emit('AfterCreate');
                    $('#addSection').modal('hide')
                    Toast.fire({
                        icon: 'success',
                        title: 'Section Created Successfully'
                        })
                    this.$Progress.finish();
                })
                .catch(()=>{

                })
                
            },
            loadSections(){
                 axios.get("api/section").then(({data})=>(this.sections=data));
            },
              getGrade(){
              axios.get('/api/getGrade')
              .then(function (response) {
                 this.grades = response.data;
              }.bind(this));

            },
        },
        created() {
            this.getGrade()
            this.loadSections();
             Fire.$on('AfterCreate',()=>{
                this.loadSections();
            }); 
        }
    }
</script>
