<template>
    <div class="container-fluid">
        <div class="row">
        <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Grades Table</h3>
                <div class="card-tools">
                 <button class="btn btn-primary" data-toggle="modal" data-target="#addGrade">Add New <i class="fas fa-user-plus fa-fw"></i></button>
                </div>                
              </div>
              <!-- /.card-header -->
              <div class="card-body table-respogradensive p-0">
                <table class="table table-hover text-nowrap">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Grade</th>
                      <th>Modify</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr v-for="grade in grades.data" :key="grade.id">
                      <td>{{grade.id}}</td>
                      <td>{{grade.name}}</td>
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
        <div class="modal fade" id="addGrade" tabindex="-1" role="dialog" aria-labelledby="addGradeLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addGradeLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form @submit.prevent="createGrade">
      <div class="modal-body">
        <div class="form-group">
            <input v-model="form.name" type="text" name="name" placeholder="Name"
                class="form-control" :class="{ 'is-invalid': form.errors.has('name') }">
            <has-error :form="form" field="name"></has-error>
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
                grades: {},
                form:new Form({
                    name: '',
                    description: '',
                })
            }
        },
        methods: {
            createGrade(){
                this.$Progress.start();
                this.form.post('api/grade')
                .then(()=>{
                    Fire.$emit('AfterCreate');
                    $('#addGrade').modal('hide')
                    Toast.fire({
                        icon: 'success',
                        title: 'Grade Created Successfully'
                        })
                    this.$Progress.finish();
                })
                .catch(()=>{

                })
                
            },
            loadGrades(){
                 axios.get("api/grade").then(({data})=>(this.grades=data));
            },
             
        },
        created() {
            this.loadGrades();
             Fire.$on('AfterCreate',()=>{
                this.loadGrades();
            }); 
        }
    }
</script>
