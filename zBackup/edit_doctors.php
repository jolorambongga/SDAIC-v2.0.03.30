<?php
$title = 'Edit Services';
$active_doctors = 'active';
include_once('header.php');
?>

<body>

  <div class="my-wrapper">
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
      <form id="frmAddDoctor">
        <div class="modal fade" id="modAddDoctor" tabindex="-1" aria-labelledby="modAddDoctorLabel" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
              <div class="modal-header">
                <h1 class="modal-title fs-5" id="modAddDoctorLabel">Add New Doctor</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <!-- doctor name, avail date, avail time, contact, email, address, action -->
                <!-- doctor name -->
                <label for="doctor_name" class="form-label">Doctor Name</label>
                <input type="text" id="doctor_name" class="form-control">
                <pre></pre>
                <label for="avail_date" class="form-label">Available Date</label>
                <input type="text" id="avail_date" class="form-control">
                <pre></pre>
                <label for="avail_time" class="form-label">Available Time</label>
                <input type="text" id="avail_time" class="form-control">
                <pre></pre>
                <label for="contact" class="form-label">Contact</label>
                <input type="text" id="contact" class="form-control">
                <pre></pre>
                <label for="email" class="form-label">Email</label>
                <input type="text" id="email" class="form-control">
                <pre></pre>
                <label for="address" class="form-label">Address</label>
                <input type="text" id="address" class="form-control">
                <pre></pre>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-success">Add Doctor</button>
              </div>
            </div>
          </div>
        </div>
      </form>
      <!-- end modal -->
      <!-- edit doctor modal -->
      <form id="frmEditDoctor">
        <div class="modal fade" id="modEditDoctor" tabindex="-1" aria-labelledby="modEditDoctorLabel" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
              <div class="modal-header">
                <h1 class="modal-title fs-5" id="modEditDoctorLabel">Edit Doctor</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <!-- doctor name, avail date, avail time, contact, email, address, action -->
                <!-- doctor name -->
                <label for="edit_doctor_name" class="form-label">Doctor Name</label>
                <input type="text" id="edit_doctor_name" class="form-control">
                <pre></pre>
                <label for="edit_avail_date" class="form-label">Available Date</label>
                <input type="text" id="edit_avail_date" class="form-control">
                <pre></pre>
                <label for="edit_avail_time" class="form-label">Available Time</label>
                <input type="text" id="edit_avail_time" class="form-control">
                <pre></pre>
                <label for="edit_contact" class="form-label">Contact</label>
                <input type="text" id="edit_contact" class="form-control">
                <pre></pre>
                <label for="edit_email" class="form-label">Email</label>
                <input type="text" id="edit_email" class="form-control">
                <pre></pre>
                <label for="edit_address" class="form-label">Address</label>
                <input type="text" id="edit_address" class="form-control">
                <pre></pre>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-success">Save Changes</button>
              </div>
            </div>
          </div>
        </div>
      </form>
      <!-- end modal -->
      <!-- delete doctor modal -->
      <div class="modal fade" id="modDeleteDoctor" tabindex="-1" aria-labelledby="modDeleteDoctorLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="modDeleteDoctorLabel">Delete Doctor</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <!-- doctor name -->
              <label for="delete_user_input" class="form-label">Type <b>DELETE</b> to delete this.</label>
              <input type="text" id="delete_user_input" class="form-control">
              <pre></pre>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Cancel</button>
              <button id="btnDelete" type="button" class="btn btn-danger">Delete</button>
            </div>
          </div>
        </div>
      </div>
      <!-- end modal -->
    </div>
  </div>

  <script>
    $(document).ready(function () {
      loadDoctors();
      // LOAD DOCTORS
      function loadDoctors() {
        $.ajax({
          type: 'GET',
          url: 'handles/doctors/read_doctors.php',
          dataType: 'json',
          success: function(response) {
            console.log(response);
            $('#tbodyDoctors').empty();
            $.each(response.data, function(key, value) {
              // id, doctor name, avail date, avail time, contact   , email, address, action
              const data = `
              <tr>
              <th scope="row">${value.doctor_id}</th>
              <td>${value.doctor_name}</td>
              <td>${value.avail_date}</td>
              <td>${value.avail_time}</td>
              <td>${value.contact}</td>
              <td>${value.email}</td>
              <td>${value.address}</td>
              <td data-doctor-id="${value.doctor_id}">
              <div class="d-grid gap-2 d-md-flex justify-content-md-start text-center float-end">
              <button id="callEdit" type='button' class='btn btn-success' data-bs-toggle='modal' data-bs-target='#modEditDoctor'>EDIT</button>
              <button id="callDelete" type='button' class='btn btn-danger' data-bs-toggle='modal' data-bs-target='#modDeleteDoctor'>DELETE</button>
              </div>
              </td>
              </tr>
              `;
              $('#tbodyDoctors').append(data);
            });
          },
          error: function(error) {
            console.log("ERROR LOAD:", error);
          }
        });
      } // END LOAD DOCTORS FUNCTION

      // CREATE DOCTOR
      $('#frmAddDoctor').off('submit').submit(function (e) {
        e.preventDefault();
        var doctor_name = $('#doctor_name').val();
        var avail_date = $('#avail_date').val();
        var avail_time = $('#avail_time').val();
        var contact = $('#contact').val();
        var email = $('#email').val();
        var address = $('#address').val();

        var dataDoctor = {
          doctor_name: doctor_name,
          avail_date: avail_date,
          avail_time: avail_time,
          contact: contact,
          email: email,
          address: address
        }

        $.ajax({
          type: 'POST',
          url: 'handles/doctors/add_doctor.php',
          data: dataDoctor,
          dataType: 'json',
          success: function(response) {
            console.log("RESPONSE:", response);
            console.log("CONSOLE DATA DOCTOR:", dataDoctor);
            closeModal();
            loadDoctors();
          },
          error: function(error) {
            console.log("CREATE DOCTOR ERROR:", error);
          }
        });
      }); // END CREATE DOCTOR

      // UPDATE DOCTOR
      $(document).on('click', '#callEdit', function () {
        var doctor_id = $(this).closest("td").data('doctor-id');
        console.log("EDIT CALL DOCTOR ID:", doctor_id);
        $.ajax({
          type: 'GET',
          url: 'handles/doctors/get_doctor.php',
          data: {doctor_id: doctor_id},
          dataType: 'json',
          success: function(response) {
            var doctor = response.data[0];
            $('#edit_doctor_name').val(doctor.doctor_name);
            $('#edit_avail_date').val(doctor.avail_date);
            $('#edit_avail_time').val(doctor.avail_time);
            $('#edit_contact').val(doctor.contact);
            $('#edit_email').val(doctor.email);
            $('#edit_address').val(doctor.address);

            // ACTUAL UPDATE
            $('#frmEditDoctor').off('submit').submit(function (e) {
              e.preventDefault();
              var doctor_name = $('#edit_doctor_name').val();
              var avail_date = $('#edit_avail_date').val();
              var avail_time = $('#edit_avail_time').val();
              var contact = $('#edit_contact').val();
              var email = $('#edit_email').val();
              var address = $('#edit_address').val();

              var dataDoctor = {
                doctor_id: doctor_id,
                doctor_name: doctor_name,
                avail_date: avail_date,
                avail_time: avail_time,
                contact: contact,
                email: email,
                address: address
              }

              $.ajax({
                type: 'POST',
                url: 'handles/doctors/update_doctor.php',
                data: dataDoctor,
                dataType: 'json',
                success: function(response) {
                  console.log("ACTUAL UPDATE RESPONSE:", response);
                  closeModal();
                  loadDoctors();
                },
                error: function(error) {
                  console.log("ACTUAL UPDATE ERROR:", error);
                }
              });
            }); // END ACTUAL UPDATE
          },
          error: function(error) {
            console.log("GET DOCTOR ERROR:", error);
          }
        });
      }); // END UPDATE DOCTOR

      // DELETE DOCTOR
      $(document).on('click', '#callDelete', function() {
        var doctor_id = $(this).closest("td").data('doctor-id');
        $(document).on('click', '#btnDelete', function() {
          var user_input = $('#delete_user_input').val();
          var data = {
            doctor_id: doctor_id,
            user_input: user_input
          }
          console.log(data);
          $.ajax({
            type: 'POST',
            url: 'handles/doctors/delete_doctor.php',
            data: data,
            dataType: 'json',
            success: function(response) {
              console.log(response);
              loadDoctors();
              closeModal();
            },
            error: function(error) {
              console.log(error);
            }
          });
        });
        console.log("DEL DOCTOR ID:", doctor_id);
        }); // END DELETE DOCTOR

      // CLOSE MODAL FUNCTION
      function closeModal() {
        $('#modAddDoctor .btn-close').click();
        $('#modEditDoctor .btn-close').click();
        $('#modDeleteDoctor .btn-close').click();
        clearFields();
      }

      // CLEAR FIELDS FUNCTION
      function clearFields() {
        $('#doctor_name').val('');
        $('#avail_date').val('');
        $('#avail_time').val('');
        $('#contact').val('');
        $('#email').val('');
        $('#address').val('');

        $('#edit_doctor_name').val('');
        $('#edit_avail_date').val('');
        $('#edit_avail_time').val('');
        $('#edit_contact').val('');
        $('#edit_email').val('');
        $('#edit_address').val('');

        $('#delete_user_input').val('');
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