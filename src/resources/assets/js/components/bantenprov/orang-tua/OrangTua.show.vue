<template>
  <div class="card">
    <div class="card-header">
      <i class="fa fa-table" aria-hidden="true"></i> Show Data Orang Tua 

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
            <b>Nomor UN :</b> {{ model.nomor_un }}
          </div>
        </div>

        <div class="form-row mt-4">
          <div class="col-md">
            <b>Nomor KK :</b> {{ model.no_kk }}
          </div>
        </div>

        <div class="form-row mt-4">
          <div class="col-md">
            <b>Nomor Telp :</b> {{ model.no_telp }}
          </div>
        </div>

        <div class="form-row mt-4">
          <div class="col-md">
            <b>Nama Ayah :</b> {{ model.nama_ayah }}
          </div>
        </div>

        <div class="form-row mt-4">
          <div class="col-md">
            <b>Nama Ibu :</b> {{ model.nama_ibu }}
          </div>
        </div>

        <div class="form-row mt-4">
          <div class="col-md">
            <b>Pendidikan Ayah :</b> {{ model.pendidikan_ayah }}
          </div>
        </div>

        <div class="form-row mt-4">
          <div class="col-md">
            <b>Pekerjaan Ayah :</b> {{ model.kerja_ayah }}
          </div>
        </div>

        <div class="form-row mt-4">
          <div class="col-md">
            <b>Pendidikan Ibu :</b> {{ model.pendidikan_ibu }}
          </div>
        </div>

        <div class="form-row mt-4">
          <div class="col-md">
            <b>Pekerjaan Ibu :</b> {{ model.kerja_ibu }}
          </div>
        </div>

        <div class="form-row mt-4">
          <div class="col-md">
            <b>Alamat Orang Tua :</b> {{ model.alamat_ortu }}
          </div>
        </div>

      </vue-form>
    </div>
       <div class="card-footer text-muted">
        <div class="row">
          <div class="col-md">
            <b>Username :</b> {{ model.user }}
          </div>
          <div class="col-md">
            <div class="col-md text-right">Dibuat : {{ model.created_at }}</div>
            <div class="col-md text-right">Diperbaiki : {{ model.updated_at }}</div>
          </div>
        </div>
      </div>
  </div>
</template>

<script>
export default {
  mounted() {
    axios.get('api/orang-tua/' + this.$route.params.id)
      .then(response => {
        if (response.data.loaded == true) {
          this.model.user = response.data.orang_tua.user.name;
          this.model.nomor_un = response.data.orang_tua.nomor_un;
          this.model.no_kk = response.data.orang_tua.no_kk;
          this.model.no_telp = response.data.orang_tua.no_telp;
          this.model.nama_ayah = response.data.orang_tua.nama_ayah;
          this.model.nama_ibu = response.data.orang_tua.nama_ibu;
          this.model.pendidikan_ayah = response.data.orang_tua.pendidikan_ayah;
          this.model.kerja_ayah = response.data.orang_tua.kerja_ayah;
          this.model.pendidikan_ibu = response.data.orang_tua.pendidikan_ibu;
          this.model.kerja_ibu = response.data.orang_tua.kerja_ibu;
          this.model.alamat_ortu = response.data.orang_tua.alamat_ortu;
          this.model.created_at = response.data.orang_tua.created_at;
          this.model.updated_at = response.data.orang_tua.updated_at;
        } else {
          alert('Failed');
        }
      })
      .catch(function(response) {
        alert('Break');
        window.location.href = '#/admin/orang-tua';
      })

  },
  data() {
    return {
      state: {},
      model: {
        user: "",
        nomor_un: "",    
        no_kk: "", 
        no_telp: "",
        nama_ayah: "",
        nama_ibu: "",
        pendidikan_ayah: "",
        kerja_ayah: "",
        pendidikan_ibu: "",
        kerja_ibu: "",
        alamat_ortu: "",
        created_at: "",
        updated_at: ""
        
      },
      user: []
    }
  },
  methods: {
    onSubmit: function() {
      let app = this;

      if (this.state.$invalid) {
        return;
      } else {
        axios.put('api/orang-tua/' + this.$route.params.id, {
          nomor_un: this.model.nomor_un,
          no_kk: this.model.no_kk,
          no_telp: this.model.no_telp,
          nama_ayah: this.model.nama_ayah,
          nama_ibu: this.model.nama_ibu,
          pendidikan_ayah: this.model.pendidikan_ayah,
          kerja_ayah: this.model.kerja_ayah,
          pendidikan_ibu: this.model.pendidikan_ibu ,
          kerja_ibu: this.model.kerja_ibu,
          alamat_ortu: this.model.alamat_ortu,
          created_at: this.model.created_at,
          updated_at: this.model.updated_at
             
            
          })
          .then(response => {
            if (response.data.loaded == true) {
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
            alert('Break ' + response.data.message);
          });
      }
    },
    reset() {
      axios.get('api/orang_tua/' + this.$route.params.id + '/edit')
        .then(response => {
          if (response.data.status == true) {
            this.model.nomor_un = response.data.orang_tua.nomor_un;
            this.model.no_kk = response.data.orang_tua.no_kk;
          } else {
            alert('Failed');
          }
        })
        .catch(function(response) {
          alert('Break ');
        });
    },
    back() {
      window.location = '#/admin/orang-tua';
    }
  }
}
</script>
