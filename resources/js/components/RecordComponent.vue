<template>
  <!-- begin:breadcrumb -->
  <ol
    class="breadcrumb breadcrumb-dot text-muted fs-6 fw-semibold mb-5"
    style="margin-top: -30px"
  >
    <!-- <li class="breadcrumb-item"><a href="#" class="">Kartoni</a></li> -->
    <!-- <li class="breadcrumb-item"><a href="#" class="">Library</a></li> -->
    <li class="breadcrumb-item text-muted">Kartoni</li>
  </ol>
  <!-- end:breadcrumb -->

  <div class="card shadow-sm mt-5 mb-5">
    <div class="card-header">
      <h3 class="card-title">LISTA PACIJENATA</h3>
      <div class="card-toolbar">
        <button type="button" class="btn btn-sm btn btn-light-success" @click="openAddPatientModal">
          DODAJ PACIJENTA
        </button>
        <AddPatientComponent ref="addPatientModal" @recordTable="recordTable" />
        <EditPatientComponent 
          ref="editPatientModal"
          :patientID="this.patientID"
          :firstName="this.first_name"
          :lastName="this.last_name"
          :dateOfBirth="this.date_of_birth"
          :address="this.address"
          :tel="this.tel"
          :email="this.email"
          :jmbg="this.jmbg"
          :passportNum="this.passportNum"
          :gender="this.gender"
          :illnessHistory="this.illness_history"
        />
      </div>
    </div>
    <div class="card-body">
      <!-- begin:recordTable -->
      <div class="table-responsive">
        <table class="table table-row-dashed table-row-gray-300 align-middle gs-0 gy-4" id="recordTable">
            <thead>
                <tr class="fw-bold">
                    <th>Ime i prezime</th>
                    <th>Datum rođenja</th>
                    <th>JMBG</th>
                    <th>Broj pasoša</th>
                    <th></th>
                </tr>
            </thead>
            <tbody></tbody>
        </table>
      </div>
      <!-- end:recordTable -->
    </div>
    <div class="card-footer"></div>
  </div>

  <!-- INFO MODAL -->
  <div class="modal fade" tabindex="-1" id="infoModal">
    <div class="modal-dialog modal-lg modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h3 class="modal-title">DETALJI PACIJENTA</h3>

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
              <div class="d-flex flex-column">
                <li class="d-flex flex-column py-2">
                  <div class="d-flex align-items-center">
                    <span class="bullet bullet-vertical bg-success me-5"></span>
                    <span style="font-weight: bold">BROJ KARTONA:</span>
                  </div>
                  <div class="ms-5">#{{ this.patientID }}</div>
                </li>
                <li class="d-flex flex-column py-2">
                  <div class="d-flex align-items-center">
                    <span class="bullet bullet-vertical bg-success me-5"></span>
                    <span style="font-weight: bold">IME I PREZIME:</span>
                  </div>
                  <div class="ms-5">
                    {{ this.first_name }} {{ this.last_name }}
                  </div>
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
                    <ul v-if="this.illness_history[0] != '' && this.illness_history.length">
                      <li v-for="(file, index) in this.illness_history" :key="index" class="d-flex align-items-center py-1">
                        <i class="ki-outline ki-folder-down me-2"></i> <!-- Icon added here -->
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

        <div class="modal-footer">
          <button
            type="button"
            class="btn btn-sm btn btn-light-danger"
            data-bs-dismiss="modal"
          >
            Zatvori
          </button>
        </div>
      </div>
    </div>
  </div>
  <!-- INFO MODAL -->

  <!-- DELETE MODAL -->
  <div class="modal fade" tabindex="-1" id="deleteModal">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h3 class="modal-title">Modal title</h3>

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
          <p>{{ this.patientID }}</p>
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-light" data-bs-dismiss="modal">
            Close
          </button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
  </div>
  <!-- DELETE MODAL -->
</template>

<script>
import AddPatientComponent from './AddPatientComponent.vue';
import EditPatientComponent from './EditPatientComponent.vue';
export default {
  components: {
    AddPatientComponent,
    EditPatientComponent
  },
  data() {
    return {
      patientID: null,
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
    };
  },
  mounted() {
    let th = this;
    this.recordTable();
    $(document).on("click", "#patientInfo", function (e) {
      th.patientID = $(this).data("entry-id");
      th.getPatientInfo();
    });
    $(document).on("click", "#patientEdit", function (e) {
      th.patientID = $(this).data("entry-id");
      th.getPatientInfo().then(() => {
        th.$refs.editPatientModal.open(); // Open the modal in child component after getting the patient data
      });
    });
    $(document).on("click", "#patientDelete", function (e) {
      th.patientID = $(this).data("entry-id");

      // th.getPatientInfo();
      th.deletePatient();
    });
  },
  methods: {
    openAddPatientModal() {
      this.$refs.addPatientModal.open();
    },
    deletePatient() {
      let th = this;
      Swal.fire({
        title: `Da li ste sigurni da želite da obrišete pacijenta #${th.patientID}?`,
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#d33",
        cancelButtonColor: "#3085d6",
        confirmButtonText: "Obriši",
        cancelButtonText: "Odustani",
      }).then((result) => {
        if (result.isConfirmed) {
          axios
            .post("/kartoni/deletePatient", { patientID: th.patientID })
            .then((response) => {
              th.recordTable();
              Swal.fire(
                "Obrisano!",
                "Pacijent uspešno obrisan",
                "success"
              );
            })
            .catch((error) => {
              console.error("Error deleting patient:", error);
              Swal.fire(
                "Greška!",
                "Greška prilikom brisanja pacijenta!",
                "error"
              );
            });
        } else if (result.dismiss === Swal.DismissReason.cancel) {
          Swal.fire(
                "Otkazano!",
                "Brisanje je uspešno otkazano",
                "info"
              );
        }
      });
    },
    async getPatientInfo() {
      let th = this;
      await axios
        .post("/kartoni/patientData", { patientID: th.patientID })
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
          th.illness_history = patient.illness_history
        })
        .catch((error) => {
          console.error(
            "Greška prilikom dohvatanja podataka o pacijentu:",
            error
          );
        });
    },
    recordTable() {
      var th = this;
      
      $("#recordTable").DataTable().clear().draw();
      $("#recordTable").DataTable().clear().destroy();
      var recordTable = $("#recordTable").DataTable({
        oLanguage: {
          oPaginate: {
            sNext: "Sledeća",
            sPrevious: "Prethodna",
          },
          sEmptyTable: "Nema podataka.",
          sLengthMenu: "Prikaz _MENU_ kartona",
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
          url: "/kartoni/lista-kartona",
          type: "POST",
          // error: function (xhr, textStatus, errorThrown) {
          //     if (xhr.status === 401 || xhr.status === 419) {
          //         window.location.replace("/login");
          //     }
          // },
          data: {},
          headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
          },
        },
        columnDefs: [
          { targets: 0, orderable: true },
          { targets: 1, orderable: true },
          { targets: 2, orderable: false },
          { targets: 3, orderable: false },
          { targets: 4, orderable: false },
        ],
        columns: [
          {
            data: null,
            render: function (data, type, row) {
              return `
                <a href="/kartoni/pacijent/${row.id}" class="text-gray-900 fw-bold text-hover-primary fs-6" 
                  data-entry-id="${row.id}">
                  ${row.first_name} ${row.last_name}
                </a>
                <br><span style="font-size: 0.8em; font-weight: bold;">#${row.id}</span>
              `;
            },
          },
          {
            data: "date_of_birth",
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
            data: (row) => (row.jmbg ? row.jmbg : "/"),
          },
          {
            data: (row) => (row.passportNum ? row.passportNum : "/"),
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
                        <a type="button" data-bs-toggle="modal" data-bs-target="#infoModal" id="patientInfo" class="dropdown-item d-flex align-items-center" data-entry-id="${row.id}">
                            <i class="ki-outline ki-information-4 fs-3 me-3"></i>
                            Detalji pacijenta
                        </a>
                        <a type="button" data-bs-toggle="modal" data-bs-target="#editModal" id="patientEdit" class="dropdown-item d-flex align-items-center" data-entry-id="${row.id}">
                            <i class="ki-outline ki-notepad-edit fs-3 me-3"></i>
                            Izmeni podatke
                        </a>
                        <a type="button" id="patientDelete" class="dropdown-item d-flex align-items-center" data-entry-id="${row.id}">
                            <i class="ki-outline ki-trash fs-3 me-3"></i>
                            Obriši pacijenta
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
  },
};
</script>
<style scoped>
.dropdown-toggle::after {
  display: none;
}
</style>
