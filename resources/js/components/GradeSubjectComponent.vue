<template>
<form @submit.prevent="createGradeSubject" enctype="multipart/form-data">
      <div class="form-group">
            <select v-model="subjects.grade" name="grade" id="grade"
                class="form-control">
                <option value="">Select Grade</option>
                  <option v-for="data in grades" :value="data.id" :key="data.id">{{ data.name }}</option>
                </select>
<div class="form-group">
        <tr v-for="(subject, index) in subjects" :key="index">
    <td scope="row" class="trashIconContainer">
        <i class="far fa-trash-alt" @click="deleteRow(index, subject)"></i>
    </td>
    <td>
        <input title="Required" class="form-control" type="text" name="subjectname[]" id="subjectname[]"  v-model="subject.subjectname" />
    </td>
    <td>
        <input class="form-control" type="text" name="fullmarks[]" id="fullmarks[]" v-model="subject.fullmarks" />
    </td>
    <td>
        <input class="form-control" type="text" name="theorymarks[]" id="theorymarks[]" v-model="subject.theorymarks" />
    </td>
    <td>
        <input class="form-control" type="text" name="practicalmarks[]" id="practicalmarks[]" v-model="subject.practicalmarks" />
    </td>
</tr>
<button type='button' class="btn btn-info" @click="addNewRow">
    <i class="fas fa-plus-circle"></i>
    Add
</button>
</div>
    </div>
    <button type="submit" class="btn btn-primary mt-5">Save</button>
</form>
</template>
<script>
export default {
    data() {
        return{
            grades: [],
            subjectname:[],
             subjects: [{
                subjectname: [],
                fullmarks: [],
                theorymarks: [],
                practicalmarks: [],
                grade: '',
            }]
        }
           
        },
        methods:{
        addNewRow() {
            this.subjects.push({
                subjectname: [],
                fullmarks: [],
                theorymarks: [],
                practicalmarks: [],
            });
        },
        deleteRow(index, subject) {
            var idx = this.subjects.indexOf(subject);
            console.log(idx, index);
            if (idx > -1) {
                this.subjects.splice(idx, 1);
            }
        },
        getGrade(){
              axios.get('/api/getGradeSubject')
              .then(function (response) {
                 this.grades = response.data;
              }.bind(this));

            },
            createGradeSubject(){
                this.$Progress.start()
                axios.post("/api/gradesubject",this.subjects)
                // this.form.post('api/gradesubject')
                .then(()=>{
                    Fire.$emit('AfterCreate');
                    Toast.fire({
                        icon: 'success',
                        title: 'Role Created Successfully'
                        })
                    this.$Progress.finish();
                })
                .catch(()=>{

                })
                
            },
    },
    created(){
        this.getGrade()
    }
}
</script>