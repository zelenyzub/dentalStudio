<template>
<div class="modal fade" tabindex="-1" id="addPatientModal">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">NOVI KARTON</h3>

                <!--begin::Close-->
                <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                    <i class="ki-duotone ki-cross fs-1">
                        <span class="path1"></span><span class="path2"></span>
                    </i>
                </div>
                <!--end::Close-->
            </div>

            <div class="modal-body">
                <div class="row">
                    <div class="col-6">
                        <div class="mb-10">
                            <label for="datepicker" class="required form-label">Datum rođenja</label>
                            <datepicker inputFormat="dd.MM.yyyy." v-model="dateOfBirth" class="form-control form-control" @update:modelValue="moveToNextInput"></datepicker>
                        </div>
                        <div class="mb-10">
                            <label for="exampleFormControlInput1" class="required form-label">Ime</label>
                            <input type="email" class="form-control form-control" v-model="firstName" placeholder="Unesite ime pacijenta"/>
                        </div>
                        <div class="mb-10">
                            <label for="exampleFormControlInput1" class="required form-label">Prezime</label>
                            <input type="email" class="form-control form-control" v-model="lastName" placeholder="Unesite prezime pacijenta"/>
                        </div>
                        <div class="mb-10">
                            <label for="exampleFormControlInput1" class="required form-label">Adresa</label>
                            <input type="email" class="form-control form-control" v-model="address" placeholder="Unesite adresu pacijenta"/>
                        </div>
                        <div class="mb-10">
                            <label for="exampleFormControlInput1" class="required form-label">Broj telefona</label>
                            <input type="email" class="form-control form-control" v-model="tel" placeholder="Unesite broj telefona pacijenta"/>
                        </div> 
                    </div>
                    <div class="col-6">
                        <div>
                            <div class="mb-10">
                            <label for="documentType" class="form-label">JMBG/Br pasoša</label>
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
                            <label for="exampleFormControlInput1" class="form-label">E-mail</label>
                            <input type="text" class="form-control form-control" v-model="email" placeholder="Unesite E-mail pacijenta"/>
                        </div>
                        <div class="mb-10">
                            <label for="exampleFormControlInput1" class="form-label">Pol</label>
                            <select class="form-select" data-control="select2" v-model="gender" placeholder="Odaberite pol">
                                <option disabled value="">Odaberite pol</option>
                                <option value="0">Muški</option>
                                <option value="1">Ženski</option>
                            </select>
                        </div>
                        <div class="mb-10">
                            <label for="exampleFormControlInput1" class="required form-label">Dokumenta</label><br>
                            <button type="button" class="btn btn-light-info form-control" @click="triggerFileInput"><i class="ki-outline ki-document fs-2"></i>Dodaj dokumenta</button>
                            <input class="form-control" type="file" id="formFile" ref="fileInput" @change="handleFileUpload" multiple style="display: none;">
                            
                            <div v-if="files.length" class="mt-3">
                                <h5>Odabrana dokumenta:</h5>
                                <ul>
                                    <li v-for="(file, index) in files" :key="index">
                                        {{ file.name }}
                                        <i class="ki-outline ki-trash text-danger fs-3" @click="removeFile(index)" style="cursor: pointer;"></i>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-light-danger" data-bs-dismiss="modal">Zatvori</button>
                <button type="button" class="btn btn-sm btn-light-success" id="newPatient" @click="saveNewPatient">Sačuvaj</button>
            </div>
        </div>
    </div>
</div>

</template>

<script>

import axios from 'axios';
import Datepicker from 'vue3-datepicker';
export default {
    components:{
        Datepicker
    },
    data() {
        return {
            dateOfBirth: null,
            files: [],

            selectedType: 'jmbg',
            jmbg: '',
            passportNum: '',
            firstName: '',
            lastName: '',
            address: '',
            tel: '',
            email: '',
            gender: '',
        };
    },
    computed: {
        documentValue: {
        get() {
            return this.selectedType === 'jmbg' ? this.jmbg : this.passportNum;
        },
        set(value) {
            if (this.selectedType === 'jmbg') {
            this.jmbg = value;
            } else {
            this.passportNum = value;
            }
        }
        }
    },
  mounted() {
    console.log("Component mounted.");
  },
  methods: {
    open() {
      const modal = new bootstrap.Modal(
        document.getElementById("addPatientModal")
      );
      modal.show();
    },
    moveToNextInput() {
            // Find the next input element and focus it
            const nextInput = document.querySelector('input[placeholder="Example input"]');
            if (nextInput) {
                nextInput.focus();
            }
        },
    triggerFileInput() {
        this.$refs.fileInput.click();
    },
    handleFileUpload(event) {
        // Append new files to the existing files array
        const newFiles = Array.from(event.target.files);
        this.files = [...this.files, ...newFiles];
    },
    removeFile(index) {
        this.files.splice(index, 1);
    },
    saveNewPatient() {
        let formData = new FormData();

        // Format the dateOfBirth to 'yyyy-MM-dd'
        const formattedDateOfBirth = this.dateOfBirth ? new Date(this.dateOfBirth).toISOString().split('T')[0] : null;

        // Append basic patient data
        formData.append('dateOfBirth', formattedDateOfBirth);
        formData.append('firstName', this.firstName);
        formData.append('lastName', this.lastName);
        formData.append('address', this.address);
        formData.append('tel', this.tel);
        formData.append('jmbg', this.jmbg);
        formData.append('passportNum', this.passportNum);
        formData.append('email', this.email);
        formData.append('gender', this.gender);

        // Append each file to the FormData object
        for (let i = 0; i < this.files.length; i++) {
            formData.append(`files[${i}]`, this.files[i]);
        }

        axios.post("/saveNewPatient", formData, {
            headers: {
                "Content-Type": "multipart/form-data",
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
        })
        .then(response => {
            Swal.fire({
                icon: "success",
                text: "Uspešno sačuvan pacijent.",
                timer: 5000,
                confirmButtonColor: "#4eb3ac"
            });
            const modal = bootstrap.Modal.getInstance(document.getElementById("addPatientModal"));
            modal.hide();
        })
        .catch(error => {
            Swal.fire({
                icon: "warning",
                text: "Greška prilikom čuvanja pacijenta!",
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
    display: block; /* Ensures it behaves like a block element */
    width: 100%; /* Full width to match the input field */
    padding: 0.375rem 0.75rem; /* Add padding similar to input */
    border: 1px solid #ced4da; /* Match the border style */
    border-radius: 0.25rem; /* Match the border radius */
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