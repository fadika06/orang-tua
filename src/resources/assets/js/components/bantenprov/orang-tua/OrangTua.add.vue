<template>
  <div class="card">
    <div class="card-header">
      <i class="fa fa-table" aria-hidden="true"></i> {{ title }}

      <ul class="nav nav-pills card-header-pills pull-right">
        <li class="nav-item">
          <button class="btn btn-primary btn-sm" role="button" @click="back">
            <i class="fa fa-arrow-left" aria-hidden="true"></i>
          </button>
        </li>
      </ul>
    </div>

    <div class="card-body">
      <vue-form class="form-horizontal form-validation" :state="state" @submit.prevent="onSubmit">

        <div class="form-row mt-4">
          <div class="col-md">
            <validate tag="div">
            <label for="siswa_id">Nama Siswa</label>
            <v-select name="siswa_id" v-model="model.siswa" :options="siswa" class="mb-4"></v-select>

            <field-messages name="siswa_id" show="$invalid && $submitted" class="text-danger">
              <small class="form-text text-success">Looks good!</small>
              <small class="form-text text-danger" slot="required">Nama Siswa is a required field</small>
            </field-messages>
            </validate>
          </div>
        </div>

        <validate tag="div">
          <div class="form-group">
            <label for="model-no_telp">Nomor Telepon</label>
            <input type="text" class="form-control" id="model-no_telp" v-model="model.no_telp" name="no_telp" placeholder="Nomor Telepon" required>
            <field-messages name="no_telp" show="$invalid && $submitted" class="text-danger">
              <small class="form-text text-success">Looks good!</small>
              <small class="form-text text-danger" slot="required">Nomor Telepon is a required field</small>
            </field-messages>
          </div>
        </validate>

        <validate tag="div">
          <div class="form-group">
            <label for="model-nama_ayah">Nama Ayah</label>
            <input type="text" class="form-control" id="model-nama_ayah" v-model="model.nama_ayah" name="nama_ayah" placeholder="Nama Ayah" required>
            <field-messages name="nama_ayah" show="$invalid && $submitted" class="text-danger">
              <small class="form-text text-success">Looks good!</small>
              <small class="form-text text-danger" slot="required">Nama Ayah is a required field</small>
            </field-messages>
          </div>
        </validate>

        <validate tag="div">
          <div class="form-group">
            <label for="model-nama_ibu">Nama Ibu</label>
            <input type="text" class="form-control" id="model-nama_ibu" v-model="model.nama_ibu" name="nama_ibu" placeholder="Nama Ibu" required>
            <field-messages name="nama_ibu" show="$invalid && $submitted" class="text-danger">
              <small class="form-text text-success">Looks good!</small>
              <small class="form-text text-danger" slot="required">Nama Ibu is a required field</small>
            </field-messages>
          </div>
        </validate>

        <validate tag="div">
          <div class="form-group">
            <label for="model-pendidikan_ayah">Pendidikan Ayah</label>
            <input type="text" class="form-control" id="model-pendidikan_ayah" v-model="model.pendidikan_ayah" name="pendidikan_ayah" placeholder="Pendidikan Ayah" required>
            <field-messages name="pendidikan_ayah" show="$invalid && $submitted" class="text-danger">
              <small class="form-text text-success">Looks good!</small>
              <small class="form-text text-danger" slot="required">Pendidikan Ayah is a required field</small>
            </field-messages>
          </div>
        </validate>

        <validate tag="div">
          <div class="form-group">
            <label for="model-kerja_ayah">Pekerjaan Ayah</label>
            <input type="text" class="form-control" id="model-kerja_ayah" v-model="model.kerja_ayah" name="kerja_ayah" placeholder="Pekerjaan Ayah" required>
            <field-messages name="kerja_ayah" show="$invalid && $submitted" class="text-danger">
              <small class="form-text text-success">Looks good!</small>
              <small class="form-text text-danger" slot="required">Pekerjaan Ayah is a required field</small>
            </field-messages>
          </div>
        </validate>

        <validate tag="div">
          <div class="form-group">
            <label for="model-pendidikan_ibu">Pendidikan Ibu</label>
            <input type="text" class="form-control" id="model-pendidikan_ibu" v-model="model.pendidikan_ibu" name="pendidikan_ibu" placeholder="Pendidikan Ibu" required>
            <field-messages name="pendidikan_ibu" show="$invalid && $submitted" class="text-danger">
              <small class="form-text text-success">Looks good!</small>
              <small class="form-text text-danger" slot="required">Pendidikan Ibu is a required field</small>
            </field-messages>
          </div>
        </validate>

        <validate tag="div">
          <div class="form-group">
            <label for="model-kerja_ibu">Pekerjaan Ibu</label>
            <input type="text" class="form-control" id="model-kerja_ibu" v-model="model.kerja_ibu" name="kerja_ibu" placeholder="Pekerjaan Ibu" required>
            <field-messages name="kerja_ibu" show="$invalid && $submitted" class="text-danger">
              <small class="form-text text-success">Looks good!</small>
              <small class="form-text text-danger" slot="required">Pekerjaan Ibu is a required field</small>
            </field-messages>
          </div>
        </validate>

        <validate tag="div">
          <div class="form-group">
            <label for="model-alamat_ortu">Alamat Orang Tua</label>
            <input type="text" class="form-control" id="model-alamat_ortu" v-model="model.alamat_ortu" name="alamat_ortu" placeholder="Alamat Orang Tua" required>
            <field-messages name="alamat_ortu" show="$invalid && $submitted" class="text-danger">
              <small class="form-text text-success">Looks good!</small>
              <small class="form-text text-danger" slot="required">Alamat Orang Tua is a required field</small>
            </field-messages>
          </div>
        </validate>

        <div class="form-row mt-4">
          <div class="col-md">
            <validate tag="div">
            <label for="user_id">Username</label>
            <v-select name="user_id" v-model="model.user" :options="user" class="mb-4"></v-select>

            <field-messages name="user_id" show="$invalid && $submitted" class="text-danger">
              <small class="form-text text-success">Looks good!</small>
              <small class="form-text text-danger" slot="required">username is a required field</small>
            </field-messages>
            </validate>
          </div>
        </div>

        <div class="form-group">
          <button type="submit" class="btn btn-primary">Submit</button>
          <button type="reset" class="btn btn-secondary" @click="reset">Reset</button>
        </div>

      </vue-form>
    </div>
  </div>
</template>

<script>
export default {
   mounted(){
    axios.get('api/orang-tua/create')
    .then(response => {
      this.model.user = response.data.current_user;

      response.data.siswa.forEach(element => {
          this.siswa.push(element);
        });

      if(response.data.user_special == true){
        response.data.user.forEach(user_element => {
          this.user.push(user_element);
        });
      }else{
        this.user.push(response.data.user);
      }
    })
    .catch(function(response) {
      alert('Break');
      window.location = '#/admin/orang-tua';
    });
  },
  data() {
    return {
      state: {},
      title: 'Add Orang Tua',
      model: {
        user : "",
        siswa: "",
        no_telp : "",
        nama_ayah : "",
        nama_ibu : "",
        pendidikan_ayah : "",
        kerja_ayah : "",
        pendidikan_ibu : "",
        kerja_ibu : "",
        alamat_ortu : ""
      },
      user: [],
      siswa: []
    }
  },
  methods: {
    onSubmit: function() {
      let app = this;

      if (this.state.$invalid) {
        return;
      } else {
        axios.post('api/orang-tua', {
            user_id : this.model.user.id,
            siswa_id : this.model.siswa.id,
            nomor_un: this.model.siswa.nomor_un,
            no_telp : this.model.no_telp,
            nama_ayah : this.model.nama_ayah,
            nama_ibu : this.model.nama_ibu,
            pendidikan_ayah : this.model.pendidikan_ayah,
            kerja_ayah : this.model.kerja_ayah,
            pendidikan_ibu : this.model.pendidikan_ibu,
            kerja_ibu : this.model.kerja_ibu,
            alamat_ortu : this.model.alamat_ortu
          })
          .then(response => {
            if (response.data.status == true) {
              if(response.data.message == 'success'){
                alert(response.data.message);
                app.back();
              }else{
                alert(response.data.message);
              }
            } else {
              alert(response.data.message);
            }
          })
          .catch(function(response) {
            alert('Break');
          });
      }
    },
    reset() {
      axios.get('api/orang-tua/create')
        .then(response => {
          if (response.data.status == true) {
            this.model.no_telp  = response.data.orang_tua.no_telp;
            this.model.nama_ayah  = response.data.orang_tua.nama_ayah;
            this.model.nama_ibu  = response.data.orang_tua.nama_ibu;
            this.model.pendidikan_ayah  = response.data.orang_tua.pendidikan_ayah;
            this.model.kerja_ayah  = response.data.orang_tua.kerja_ayah;
            this.model.pendidikan_ibu  = response.data.orang_tua.pendidikan_ibu;
            this.model.kerja_ibu  = response.data.orang_tua.kerja_ibu;
            this.model.alamat_ortu  = response.data.orang_tua.alamat_ortu;
          } else {
            alert('Failed');
          }
        })
        .catch(function(response) {
          alert('Break');
          window.location.href = '#/admin/orang-tua';
        });
    },
    back() {
      window.location = '#/admin/orang-tua';
    }
  }
}
</script>
