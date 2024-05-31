<?php
$title = 'Edit Services';
$active_doctors = 'active';
include_once('header.php');
?>

<body>
  <!-- start wrapper -->
  <div class="my-wrapper">
    <!-- start container fluid -->
    <div class="container-fluid">
      <div class="row">
        <div class="col-4">
          <h1>Edit Doctors</h1>
        </div>
      </div>
      <!-- add button -->
      <div class="row">
        <div class="col-12">
          <button type="button" class="btn btn-primary mt-3 mb-3 float-end" data-bs-toggle="modal"
          data-bs-target="#modAddDoctor">Add Doctor</button>
        </div>
      </div>
      <!-- end button -->
      <!-- table -->
      <div class="row">
        <div class="col-md-12">
          <table class="table table-striped text-end">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Doctor Name</th>
                <th scope="col">Available Date</th>
                <th scope="col">Available Time</th>
                <th scope="col">Contact</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody id="tbodyDoctors">

            </tbody>
          </table>
        </div>
      </div>
      <!-- end table -->
      <!-- add doctor modal -->
      <form id="frmAddDoctor" method="POST">
        <div class="modal fade" id="modAddDoctor" tabindex="-1" aria-labelledby="modAddDoctorLabel" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered modal-md">
            <div class="modal-content">
              <div class="modal-header">
                <h1 class="modal-title fs-5" id="modAddDoctorLabel">Add New Doctor</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <!-- doctor first_name, middle_name, last_name, contact, avail_date, avail_time, action -->
                <!-- start doctor name -->
                <label for="first_name" class="form-label">Doctor's First Name</label>
                <input type="text" id="first_name" class="form-control" required>
                <pre></pre>
                <label for="middle_name" class="form-label">Doctor's Middle Name</label>
                <input type="text" id="middle_name" class="form-control">
                <pre></pre>
                <label for="last_name" class="form-label">Doctor's Last Name</label>
                <input type="text" id="last_name" class="form-control" required>
                <pre></pre>
                <!-- end doctor name -->
                <!-- start doctor contact -->
                <label for="contact" class="form-label">Doctor's Contact</label>
                <input type="number" id="contact" class="form-control" required>
                <pre></pre>
                <!-- end doctor contact -->
                <!-- start doctor sched -->
                <button id="btnSetSched" type="button" class="btn btn-warning w-100" data-bs-toggle="modal" data-bs-target="#modDoctorSched">Set Schedule</button>
                <!-- end doctor sched -->
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                
                <button type="submit" class="btn btn-primary">Add Doctor</button>
              </div>
            </div>
          </div>
        </div>
      </form>
      <!-- end modal -->
      <!-- start doctor sched modal -->
      <?php
        include_once('doctor_sched_modal.php');
      ?>
      <!-- end doctor sched modal -->
    </div>
    <!-- end container fluid -->
  </div>
  <!-- end wrapper -->

  <!-- start jQuery script -->
  <script>
    $(document).ready(function () {
      console.log('ready');

      // CREATE DOCTOR
      $('#frmAddDoctor').submit(function (e) {
        e.preventDefault();

        var doctor_data = $(this).serialize();

        $.ajax({
          type: 'POST',
          url: 'handles/doctors/create_doctor.php',
          data: doctor_data,
          success: function (response) {
            console.log('ADD DOCTOR RESPONSE:', response);
          },
          error: function (error) {
            console.log('ADD DOCTOR ERROR:', error);
          }
        });
      });


      // CLOSE MODAL FUNCTION
      function closeModal() {
        $('#modAddDoctor .btn-close').click();
        $('#modEditDoctor .btn-close').click();
        $('#modDeleteDoctor .btn-close').click();
        clearFields();
      } // END CLOSE MODAL FUNCTION

      // CLEAR FIELDS FUNCTION
      function clearFields() {
        $('#first_name').val('');
        $('#middle_name').val('');
        $('#last_name').val('');
        $('#contact').val('');
      } // END CLEAR FIELDS FUNCTION

      // ON CLOSE MODAL
      $('#modAddDoctor').on('hidden.bs.modal', function () {
        clearFields();
      });

      $('#modEditDoctor').on('hidden.bs.modal', function () {
        clearFields();
      });

      $('#modDeleteDoctor').on('hidden.bs.modal', function () {
        clearFields();
      }); // END ON CLOSE MODAL

    }); // END READY
  </script>

  <script src='https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js'></script>
</body>

</html>
