<template>
  <!-- EDIT MODAL -->
  <div class="modal fade" tabindex="-1" id="editModal">
    <div class="modal-dialog modal-lg modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h3 class="modal-title">IZMENA PODATAKA O PACIJENTU</h3>

          <!--begin::Close-->
          <div
            class="btn btn-icon btn-sm btn-active-light-primary ms-2"
            data-bs-dismiss="modal"
            aria-label="Close"
          >
            <i class="ki-duotone ki-cross fs-1"
              ><span class="path1"></span><span class="path2"></span
            ></i>
          </div>
          <!--end::Close-->
        </div>

        <div class="modal-body">
            <div class="row">
                <div class="col-6">
                    <div class="mb-10">
                    <label for="datepicker" class="required form-label">Izmeni datum rođenja</label>
                    <datepicker inputFormat="dd.MM.yyyy." v-model="dateOfBirthRaw" class="form-control form-control" @update:modelValue="moveToNextInput"></datepicker>
                    </div>
                    <div class="mb-10">
                    <label for="exampleFormControlInput1" class="required form-label">Izmeni ime</label>
                    <input type="text" class="form-control" v-model="firstNameEdit" placeholder="Unesite ime pacijenta"/>
                    </div>
                    <div class="mb-10">
                    <label for="exampleFormControlInput1" class="required form-label">Izmeni prezime</label>
                    <input type="text" class="form-control" v-model="lastNameEdit" placeholder="Unesite prezime pacijenta"/>
                    </div>
                    <div class="mb-10">
                    <label for="exampleFormControlInput1" class="required form-label">Izmeni adresu</label>
                    <input type="text" class="form-control" v-model="addressEdit" placeholder="Unesite adresu pacijenta"/>
                    </div>
                    <div class="mb-10">
                    <label for="exampleFormControlInput1" class="required form-label">Izmeni broj telefona</label>
                    <input type="text" class="form-control" v-model="telEdit" placeholder="Unesite broj telefona pacijenta"/>
                    </div>
                </div>
                <div class="col-6">
                    <div>
                    <div class="mb-10">
                        <label for="documentType" class="form-label">Izmeni JMBG/Br pasoša</label>
                        <select v-model="selectedType" data-control="select2" class="form-select">
                        <option value="jmbg">JMBG</option>
                        <option value="passportNum">Broj pasoša</option>
                        </select>
                    </div>

                    <div class="mb-10">
                        <label for="documentInput" class="required form-label">
                        {{ selectedType === 'jmbg' ? 'JMBG' : 'Broj pasoša' }}
                        </label>
                        <input
                        type="text"
                        class="form-control"
                        :placeholder="selectedType === 'jmbg' ? 'Unesite JMBG' : 'Unesite broj pasoša'"
                        v-model="documentValue"
                        />
                    </div>
                    </div>
                    <div class="mb-10">
                    <label for="exampleFormControlInput1" class="form-label">Izmeni E-mail</label>
                    <input type="text" class="form-control" v-model="emailEdit" placeholder="Unesite E-mail pacijenta"/>
                    </div>
                    <div class="mb-10">
                    <label for="exampleFormControlInput1" class="form-label">Izmeni pol</label>
                    <select class="form-select" data-control="select2" v-model="genderEdit" placeholder="Odaberite pol">
                        <option disabled value="">Odaberite pol</option>
                        <option value="0">Muški</option>
                        <option value="1">Ženski</option>
                    </select>
                    </div>
                    <!-- <div class="mb-10">
                        <label for="exampleFormControlInput1" class="required form-label">Dokumenta</label><br>
                        <button type="button" class="btn btn-light-info form-control" @click="triggerFileInput">
                        <i class="ki-outline ki-document fs-2"></i>Dodaj dokumenta
                        </button>
                        <input class="form-control" type="file" id="formFile" ref="fileInput" @change="handleFileUpload" multiple style="display: none;">
                    </div> -->
                </div>
                </div>
            </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-sm btn-light-danger" data-bs-dismiss="modal">Zatvori</button>
            <button type="button" class="btn btn-sm btn-light-success" id="editPatient" @click="updatePatient">Izmeni</button>
        </div>
      </div>
    </div>
  </div>
  <!-- EDIT MODAL -->
</template>

<script>
import Datepicker from 'vue3-datepicker';

export default {
  props: {
    patientID: {
      type: Number,
      required: true,
    },
    firstName: String,
    lastName: String,
    dateOfBirth: String,
    address: String,
    tel: String,
    email: String,
    jmbg: String,
    passportNum: String,
    gender: String,
  },
    components:{
        Datepicker
    },
  data() {
    return {
        dateOfBirthRaw: null,
        patientID: this.patientID,
        firstNameEdit: null,
        lastNameEdit: null,
        addressEdit: null,
        telEdit: null,
        emailEdit: null,
        genderEdit: null,
        documentValue: null,
        selectedType: 'jmbg'
    };
  },
  computed: {
    firstNameInput: {
      get() {
        return this.firstName || '';
      },
      set(value) {
        this.$emit('update:firstName', value);
      },
    },
    lastNameInput: {
      get() {
        return this.lastName || '';
      },
      set(value) {
        this.$emit('update:lastName', value);
      },
    },
    dateOfBirthInput: {
        get() {
        return this.dateOfBirthRaw ? this.formatDate(this.dateOfBirthRaw) : '';
        },
        set(value) {
        if (typeof value === 'string') {
            this.dateOfBirthRaw = this.parseDate(value);
            this.$emit('update:dateOfBirth', value);
        } else {
            this.dateOfBirthRaw = null; 
        }
        },
    },
    addressInput: {
      get() {
        return this.address || '';
      },
      set(value) {
        this.$emit('update:address', value);
      },
    },
    telInput: {
      get() {
        return this.tel || '';
      },
      set(value) {
        this.$emit('update:tel', value);
      },
    },
    emailInput: {
      get() {
        return this.email || '';
      },
      set(value) {
        this.$emit('update:email', value);
      },
    },
    genderInput: {
      get() {
        return this.gender || '';
      },
      set(value) {
        this.$emit('update:gender', value);
      },
    },
    allFiles() {
      return [...this.illnessHistory, ...this.files];
    },
  },
  watch: {
    jmbg(newVal) {
      this.documentValue = newVal;
      this.selectedType = 'jmbg';
    },
    passportNum(newVal) {
      if (newVal) {
        this.documentValue = newVal;
        this.selectedType = 'passportNum';
      }
    },
  },
  mounted() {},
  methods: {
    formatDate(date) {
        if (!date || !(date instanceof Date)) 
            return ''; 
            const day = String(date.getDate()).padStart(2, '0');
            const month = String(date.getMonth() + 1).padStart(2, '0'); 
            const year = date.getFullYear();
            return `${day}.${month}.${year}.`;
    },
    parseDate(dateString) {
    if (typeof dateString !== 'string') 
        return null; 
        const parts = dateString.split('.');
    if (parts.length !== 3) 
        return null; 
        const day = parseInt(parts[0], 10);
        const month = parseInt(parts[1], 10) - 1; 
        const year = parseInt(parts[2], 10);
        return new Date(year, month, day);
    },
    open() {
        this.patientID = this.patientID || '';
        this.firstNameEdit = this.firstName || '';
        this.lastNameEdit = this.lastName || '';
        this.dateOfBirthRaw = this.parseDate(this.dateOfBirth);
        this.addressEdit = this.address || '';
        this.telEdit = this.tel || '';
        this.emailEdit = this.email || '';
        this.genderEdit = this.gender !== '' ? Number(this.gender) : null;
      $('#editModal').modal('show');
    },
    close() {
    $('#editModal').modal('hide').on('hidden.bs.modal', () => {
            document.body.removeAttribute('inert');
            $('.modal-backdrop').remove(); // Manually remove any remaining backdrops
        });
    },
    async updatePatient() {
        const updatePatientData = {
          patientID: this.patientID,
          firstName: this.firstNameEdit,
          lastName: this.lastNameEdit,
          dateOfBirth: this.dateOfBirthInput,
          address: this.addressEdit,
          tel: this.telEdit,
          email: this.emailEdit,
          gender: this.genderEdit,
          [this.selectedType === 'jmbg' ? 'jmbg' : 'passportNum']: this.documentValue
        };
        await axios.post('/kartoni/updatePatient', updatePatientData, {
            headers: {
                "Content-Type": "multipart/form-data",
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
        })
        .then(response => {
            Swal.fire({
                icon: "success",
                text: "Uspešno izmenjeni podaci o pacijentu.",
                timer: 5000,
                confirmButtonColor: "#4eb3ac"
            });
            this.close();
            this.$emit('updated');
            window.location.reload();
        })
        .catch(error => {
            Swal.fire({
                icon: "warning",
                text: "Greška prilikom izmene podataka o pacijentu!",
                confirmButtonColor: "#4eb3ac"
            });
            console.error(error);
        });
    },
  },
};
</script>
<style>
    .datepicker {
    display: block; 
    width: 100%; 
    padding: 0.375rem 0.75rem; 
    border: 1px solid #ced4da; 
    border-radius: 0.25rem; 
}

:root {
  --vdp-bg-color: #ffffff;
  --vdp-text-color: #000000;
  --vdp-box-shadow: 0 4px 10px 0 rgba(128, 144, 160, 0.1), 0 0 1px 0 rgba(128, 144, 160, 0.81);
  --vdp-border-radius: 5px;
  --vdp-heading-size: 2.5em;
  --vdp-heading-weight: bold;
  --vdp-heading-hover-color: #eeeeee;
  --vdp-arrow-color: currentColor;
  --vdp-elem-color: currentColor;
  --vdp-disabled-color: #d5d9e0;
  --vdp-hover-color: #ffffff;
  --vdp-hover-bg-color: #0baf74;
  --vdp-selected-color: #ffffff;
  --vdp-selected-bg-color: #0baf74;
  --vdp-current-date-outline-color: #888888;
  --vdp-current-date-font-weight: bold;
  --vdp-elem-font-size: 1em;
  --vdp-elem-border-radius: 5px;
  --vdp-divider-color: #d5d9e0;
}

</style>