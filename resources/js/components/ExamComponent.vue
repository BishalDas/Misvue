<template>
    <div class="container-fluid">
        <div class="row">
        <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Exam Table</h3>
                <div class="card-tools">
                 <button class="btn btn-primary" data-toggle="modal" data-target="#addExam">Add New <i class="fas fa-user-plus fa-fw"></i></button>
                </div>                
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Exam</th>
                      <th>Modify</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr v-for="exam in exams.data" :key="exam.id">
                      <td>{{exam.id}}</td>
                      <td>{{exam.name}}</td>
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
        <div class="modal fade" id="addExam" tabindex="-1" role="dialog" aria-labelledby="addExamLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addExamLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form @submit.prevent="createExam">
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
                exams: {},
                form:new Form({
                    name: '',
                    description: '',
                })
            }
        },
        methods: {
            createExam(){
                this.$Progress.start();
                this.form.post('api/exam')
                .then(()=>{
                    Fire.$emit('AfterCreate');
                    $('#addExam').modal('hide')
                    Toast.fire({
                        icon: 'success',
                        title: 'ExamType Created Successfully'
                        })
                    this.$Progress.finish();
                })
                .catch(()=>{

                })
                
            },
            loadExams(){
                 axios.get("api/exam").then(({data})=>(this.exams=data));
            },
        },
        created() {
            this.loadExams();
             Fire.$on('AfterCreate',()=>{
                this.loadExams();
            }); 
        }
    }
</script>
