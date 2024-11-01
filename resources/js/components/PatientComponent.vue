<template>
  <!-- begin:breadcrumb -->
  <ol
    class="breadcrumb breadcrumb-dot text-muted fs-6 fw-semibold mb-5"
    style="margin-top: -30px"
  >
    <li class="breadcrumb-item"><a href="/kartoni" class="">Kartoni</a></li>
    <li class="breadcrumb-item text-muted">Pacijent</li>
    <li class="breadcrumb-item text-muted">
      {{ this.first_name }} {{ this.last_name }}
    </li>
  </ol>
  <!-- end:breadcrumb -->

  <!-- HEADER CARD -->
  <div class="card shadow-sm mt-5">
    <div class="card-header d-flex align-items-start mt-5">
      <img
        alt="Logo"
        src="/assets/media/avatars/blank.png"
        class="h-50px me-3"
      />
      <div>
        <h3 class="card-title fs-3 mb-2">
          {{ this.first_name }} {{ this.last_name }}
        </h3>
        <ol class="breadcrumb breadcrumb-dot text-muted fs-7 fw-normal mb-0">
          <li class="breadcrumb-item font-weight-bold">
            <strong>#{{ this.id }}</strong>
          </li>
          <li class="breadcrumb-item">{{ this.email }}</li>
          <li class="breadcrumb-item">{{ this.tel }}</li>
        </ol>
      </div>
      <div class="card-toolbar ms-auto">
        <button
          type="button"
          class="btn btn-sm btn-light-success"
          data-bs-toggle="modal"
          data-bs-target="#addExaminationModal"
        >
          DODAJ PREGLED
        </button>
      </div>
    </div>
  </div>
  <!-- HEADER CARD -->

  <ul
    class="nav nav-stretch nav-line-tabs nav-line-tabs-2x border-transparent fs-6 fw-bold"
  >
    <li class="nav-item">
      <a
        class="nav-link text-active-primary ms-0 me-10"
        :class="{ active: activeTab === 'pregledi' }"
        @click="setActiveTab('pregledi')"
        href="#"
        >Pregledi</a
      >
    </li>
    <li class="nav-item">
      <a
        class="nav-link text-active-primary ms-0 me-10"
        :class="{ active: activeTab === 'profil' }"
        @click="setActiveTab('profil')"
        href="#"
        >Profil</a
      >
    </li>
  </ul>

  <!-- PREGLEDI CARD -->
  <div class="card shadow-sm mb-5" v-if="activeTab === 'pregledi'">
    <div class="card-body">
      <div class="table-responsive">
        <table
          class="table table-row-dashed table-row-gray-300 align-middle gs-0 gy-4"
          id="patientTable"
        >
          <thead>
            <tr class="fw-bold">
              <th>Datum pregleda</th>
              <th>Opis pregleda</th>
              <th></th>
            </tr>
          </thead>
          <tbody></tbody>
        </table>
      </div>
    </div>
    <div class="card-footer"></div>
  </div>
  <!-- PREGLEDI CARD -->

  <!-- PROFIL CARD -->
  <div class="card shadow-sm mb-5" v-if="activeTab === 'profil'">
    <div class="card-body">
      <div class="row">
        <div class="col-6">
          <div class="d-flex flex-column">
            <li class="d-flex flex-column py-2">
              <div class="d-flex align-items-center">
                <span class="bullet bullet-vertical bg-success me-5"></span>
                <span style="font-weight: bold">BROJ KARTONA:</span>
              </div>
              <div class="ms-5">#{{ this.id }}</div>
            </li>
            <li class="d-flex flex-column py-2">
              <div class="d-flex align-items-center">
                <span class="bullet bullet-vertical bg-success me-5"></span>
                <span style="font-weight: bold">IME I PREZIME:</span>
              </div>
              <div class="ms-5">{{ this.first_name }} {{ this.last_name }}</div>
            </li>
            <li class="d-flex flex-column py-2">
              <div class="d-flex align-items-center">
                <span class="bullet bullet-vertical bg-success me-5"></span>
                <span style="font-weight: bold">DATUM ROĐENJA:</span>
              </div>
              <div class="ms-5">{{ this.date_of_birth }}</div>
            </li>
            <li class="d-flex flex-column py-2">
              <div class="d-flex align-items-center">
                <span class="bullet bullet-vertical bg-success me-5"></span>
                <span style="font-weight: bold">ADRESA:</span>
              </div>
              <div class="ms-5">{{ this.address }}</div>
            </li>
            <li class="d-flex flex-column py-2">
              <div class="d-flex align-items-center">
                <span class="bullet bullet-vertical bg-success me-5"></span>
                <span style="font-weight: bold">BROJ TELEFONA:</span>
              </div>
              <div class="ms-5">{{ this.tel }}</div>
            </li>
            <li class="d-flex flex-column py-2">
              <div class="d-flex align-items-center">
                <span class="bullet bullet-vertical bg-success me-5"></span>
                <span style="font-weight: bold">E-MAIL:</span>
              </div>
              <div class="ms-5">{{ this.email ? this.email : "/" }}</div>
            </li>
          </div>
        </div>
        <div class="col-6">
          <div class="d-flex flex-column">
            <li class="d-flex flex-column py-2">
              <div class="d-flex align-items-center">
                <span class="bullet bullet-vertical bg-success me-5"></span>
                <span style="font-weight: bold">JMBG:</span>
              </div>
              <div class="ms-5">{{ this.jmbg ? this.jmbg : "/" }}</div>
            </li>
            <li class="d-flex flex-column py-2">
              <div class="d-flex align-items-center">
                <span class="bullet bullet-vertical bg-success me-5"></span>
                <span style="font-weight: bold">BROJ PASOŠA:</span>
              </div>
              <div class="ms-5">
                {{ this.passportNum ? this.passportNum : "/" }}
              </div>
            </li>
            <li class="d-flex flex-column py-2">
              <div class="d-flex align-items-center">
                <span class="bullet bullet-vertical bg-success me-5"></span>
                <span style="font-weight: bold">POL:</span>
              </div>
              <div class="ms-5">
                {{ gender === 0 ? "Musko" : gender === 1 ? "Zensko" : "/" }}
              </div>
            </li>
            <li class="d-flex flex-column py-2">
              <div class="d-flex align-items-center">
                <span class="bullet bullet-vertical bg-success me-5"></span>
                <span style="font-weight: bold">DOKUMENTA:</span>
              </div>
              <div class="ms-5">
                <ul
                  v-if="
                    this.illness_history[0] != '' && this.illness_history.length
                  "
                >
                  <li
                    v-for="(file, index) in this.illness_history"
                    :key="index"
                    class="d-flex align-items-center py-1"
                  >
                    <i class="ki-outline ki-folder-down me-2"></i>
                    <!-- Icon added here -->
                    <a :href="`/download/${file.split('/').pop()}`" download>
                      {{ `Dokument ${index + 1}` }}
                    </a>
                  </li>
                </ul>
                <p v-else>/</p>
              </div>
            </li>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- PROFIL CARD -->

  <!-- ADD EXAMINATION -->
  <div class="modal fade" id="addExaminationModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h3>NOVI PREGLED - {{ this.first_name }} {{ this.last_name }}</h3>
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
          <div class="mb-10">
            <label for="datepicker" class="required form-label"
              >Datum pregleda</label
            >
            <datepicker
              inputFormat="dd.MM.yyyy."
              v-model="examinationDate"
              class="form-control form-control"
            ></datepicker>
          </div>
          <div class="mb-10">
            <label for="exampleFormControlInput1" class="required form-label"
              >Opsi pregleda</label
            >
            <textarea class="form-control" v-model="examinationDescription" data-kt-autosize="true"></textarea>
          </div>
        </div>

        <div class="modal-footer">
          <button
            type="button"
            class="btn btn-sm btn-light-danger"
            data-bs-dismiss="modal"
          >
            Zatvori
          </button>
          <button
            type="button"
            class="btn btn-sm btn-light-success"
            @click="saveNewExamination"
            data-bs-dismiss="modal"
          >
            Sačuvaj
          </button>
        </div>
      </div>
    </div>
  </div>
  <!-- ADD EXAMINATION -->
</template>
  
  <script>
import axios from 'axios';
import Datepicker from "vue3-datepicker";

export default {
  components: {
    Datepicker,
  },
  props: {
    patientId: {
      type: Number,
      required: true,
    },
  },
  data() {
    return {
      activeTab: "pregledi",
      id: this.patientId,
      first_name: "",
      last_name: "",
      date_of_birth: "",
      address: "",
      tel: "",
      email: "",
      jmbg: "",
      passportNum: "",
      gender: "",
      illness_history: [],

      examinationID: null,
      examinationDate: null,
      examinationDescription: null,
    };
  },
  mounted() {
    let th = this;
    this.patientTable();
    this.getPatientData();
    $(document).on("click", "#examinationDelete", function (e) {
      th.examinationID = $(this).data("entry-id");
      th.deleteExamination();
    });
  },
  methods: {
    resetInputs(){
        this.examinationDate = null;
        this.examinationDescription = null;
    },
    saveNewExamination(event) {
        event.preventDefault();
        let formData = new FormData();

        const formatedExaminationDate = this.examinationDate ? new Date(this.examinationDate).toISOString().split('T')[0] : null;

        formData.append('examinationDate', formatedExaminationDate);
        formData.append('examinationDescription', this.examinationDescription);
        formData.append('id', this.id);

        axios.post("/saveNewExamination", formData, {
            headers: {
                "Content-Type": "multipart/form-data",
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
        })
        .then(response => {
            this.patientTable();
            this.resetInputs();
            Swal.fire({
                icon: "success",
                text: "Uspešno sačuvan pregled.",
                timer: 5000,
                confirmButtonColor: "#4eb3ac"
            });
            
        })
        .catch(error => {
            Swal.fire({
                icon: "warning",
                text: "Greška prilikom čuvanja pregleda!",
                confirmButtonColor: "#4eb3ac"
            });
            console.error(error);
        });
    },
    setActiveTab(tab) {
      this.activeTab = tab;
    },
    getPatientData() {
      let th = this;
      axios
        .post("/kartoni/patientData", { patientID: th.id })
        .then((response) => {
          const patient = response.data.data;

          const dob = new Date(patient.date_of_birth);
          const day = String(dob.getDate()).padStart(2, "0");
          const month = String(dob.getMonth() + 1).padStart(2, "0");
          const year = dob.getFullYear();
          const formattedDob = `${day}.${month}.${year}`;

          th.first_name = patient.first_name;
          th.last_name = patient.last_name;
          th.date_of_birth = formattedDob;
          th.address = patient.address;
          th.tel = patient.tel;
          th.email = patient.email;
          th.jmbg = patient.jmbg;
          th.passportNum = patient.passportNum;
          th.gender = patient.gender;
          th.illness_history = patient.illness_history;
        })
        .catch((error) => {
          console.error(
            "Greška prilikom dohvatanja podataka o pacijentu:",
            error
          );
        });
    },
    patientTable() {
      var th = this;

      $("#patientTable").DataTable().clear().draw();
      $("#patientTable").DataTable().clear().destroy();
      var patientTable = $("#patientTable").DataTable({
        oLanguage: {
          oPaginate: {
            sNext: "Sledeća",
            sPrevious: "Prethodna",
          },
          sEmptyTable: "Nema podataka.",
          sLengthMenu: "Prikaz _MENU_ pregleda",
          sZeroRecords: "Nema pronađenih unosa!",
          sInfo: "Prikazano _START_ do _END_ od _TOTAL_ unosa",
          sInfoEmpty: "Nema unosa",
          sInfoFiltered: "(filtrirano od _MAX_ unosa)",
          sSearch: "Pretraga:",
          sProcessing: "Molimo sačekajte ...",
        },
        processing: true,
        serverSide: true,
        destroy: true,
        ajax: {
          url: "/kartoni/pacijent/lista-pregleda",
          type: "POST",
          data: { id: th.id },
          // error: function (xhr, textStatus, errorThrown) {
          //     if (xhr.status === 401 || xhr.status === 419) {
          //         window.location.replace("/login");
          //     }
          // },
          headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
          },
        },
        columnDefs: [
          { targets: 0, orderable: true },
          { targets: 1, orderable: true },
          { targets: 2, orderable: false },
        ],
        columns: [
          {
            data: "examination_date",
            render: function (data, type, row) {
              if (type === "display" || type === "filter") {
                var startDate = new Date(data);
                var formattedStartDate =
                  ("0" + startDate.getDate()).slice(-2) +
                  "." +
                  ("0" + (startDate.getMonth() + 1)).slice(-2) +
                  "." +
                  startDate.getFullYear();
                return formattedStartDate;
              }
              return data;
            },
          },
          {
            data: "description",
          },
          {
            data: "akcije",
            render: function (data, type, row) {
              return `
                <div class="d-flex justify-content-center">
                    <div class="dropdown">
                        <button type="button" class="btn btn-link" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="ki-outline ki-burger-menu-3 text-success fs-1"></i>
                        </button>
                        <div class="dropdown-menu">
                            <a type="button" data-bs-toggle="modal" data-bs-target="#infoModal" id="examinationInfo" class="dropdown-item d-flex align-items-center" data-entry-id="${row.id}">
                                <i class="ki-outline ki-information-4 fs-3 me-3"></i>
                                Detalji pregleda
                            </a>
                            <a type="button" data-bs-toggle="modal" data-bs-target="#editModal" id="examinationEdit" class="dropdown-item d-flex align-items-center" data-entry-id="${row.id}">
                                <i class="ki-outline ki-notepad-edit fs-3 me-3"></i>
                                Izmeni podatke
                            </a>
                            <a type="button" id="examinationDelete" class="dropdown-item d-flex align-items-center" data-entry-id="${row.id}">
                                <i class="ki-outline ki-trash fs-3 me-3"></i>
                                Obriši pregled
                            </a>
                        </div>
                    </div>
                </div>
            `;
            },
          },
        ],
      });
    },
    deleteExamination() {
      let th = this;
      Swal.fire({
        title: `Da li ste sigurni da želite da obrišete pregled #${th.examinationID}?`,
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#d33",
        cancelButtonColor: "#3085d6",
        confirmButtonText: "Obriši",
        cancelButtonText: "Odustani",
      }).then((result) => {
        if (result.isConfirmed) {
          axios
            .post("/pregled/delete", { examinationID: th.examinationID })
            .then((response) => {
              th.patientTable();
              Swal.fire("Obrisano!", "Pregled uspešno obrisan", "success");
            })
            .catch((error) => {
              console.error("Error deleting examination:", error);
              Swal.fire(
                "Greška!",
                "Greška prilikom brisanja pregleda!",
                "error"
              );
            });
        } else if (result.dismiss === Swal.DismissReason.cancel) {
          Swal.fire("Otkazano!", "Brisanje je uspešno otkazano", "info");
        }
      });
    },
  },
};
</script>
  
  <style>
.nav-link.active {
  color: green; /* Change this to your active color */
}
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
  --vdp-box-shadow: 0 4px 10px 0 rgba(128, 144, 160, 0.1),
    0 0 1px 0 rgba(128, 144, 160, 0.81);
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
