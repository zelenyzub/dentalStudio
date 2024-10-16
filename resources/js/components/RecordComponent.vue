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
        <button type="button" class="btn btn-sm btn btn-light-success">
          DODAJ PACIJENTA
        </button>
      </div>
    </div>
    <div class="card-body">
      <!-- begin:recordTable -->
      <div class="table-responsive">
        <table class="table table-row-bordered gy-5" id="recordTable">
          <thead>
            <tr class="fw-bold fs-6 text-gray-800">
              <th>Broj kartona</th>
              <th class="table-sort-desc">Ime i prezime</th>
              <th class="table-sort-asc">Datum rodjenja</th>
              <th>Adresa</th>
              <th>Broj Telefona</th>
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
    <div class="card-footer">Footer</div>
  </div>
</template>

<script>
export default {
  mounted() {
    console.log("record component.");
  },
};
</script>
