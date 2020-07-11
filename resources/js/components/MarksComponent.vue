<template>
<div class="container-fluid">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <form action="">
                    <div class="form-group">
                        <select v-model="form.grade" @change="getSection()" name="grade" id="grade"
                            class="form-control" :class="{ 'is-invalid': form.errors.has('grade') }">
                            <option value="">Select Grade</option>
                            <option v-for="data in grades" :value="data.id" :key="data.id">{{ data.name }}</option>
                            </select>
                        <has-error :form="form" field="grade"></has-error>
                    </div>    
                    <div class="form-group">
                        <select v-model="form.section" @change="getStudent()" name="section" id="section" 
                            class="form-control" :class="{ 'is-invalid': form.errors.has('section') }">
                            <option value="">Select Section</option>
                            <option v-for="data in sections" :value="data.id" :key="data.id">{{ data.name }}</option>
                            </select>
                        <has-error :form="form" field="section"></has-error>
                    </div> 
                      <table class="table table-hover text-nowrap">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>NAME</th>
                      <th>ATTENDANCE</th>
                    </tr>
                  </thead>
                  <tbody>                    
                    <tr v-for="student in students" :value="student.id" :key="student.id">
                        <td>{{student.id}}</td>
                        <td>{{student.name}}</td>
                        <td>
                           <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                             View
                           </button>
                        </td>
                    </tr>             
                  </tbody>
                </table>
                <!-- Button trigger modal -->
       

<!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                ...
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
            </div>
        </div>
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
            present :1,
            absent: 0,
            form:new Form({
                grade: '',
                section: '',
                attendance: '',
            })
        }
    },
    methods:{
        getGrade(){
              axios.get('/api/getGrades')
              .then(function (response) {
                 this.grades = response.data;
              }.bind(this));

            },
            getSection() {
                axios.get('/api/getSections',{
                 params: {
                   grade_id: this.form.grade
                 }
              }).then(function(response){
                    this.sections = response.data;
                }.bind(this));
            },
             getStudent() {
                axios.get('/api/getStudents',{
                 params: {
                   section_id: this.form.section
                 }
              }).then(function(response){
                    this.students = response.data;
                }.bind(this));
            },  
    },
     created() {
            this.getGrade()
            this.getSection()
            this.getStudent()
            // this.loadStudents();
            //  Fire.$on('AfterCreate',()=>{
            //     this.loadStudents();
            // }); 
        },
           
    
}
</script>