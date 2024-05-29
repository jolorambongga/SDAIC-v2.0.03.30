<?php
$title = 'Edit Services';
$active_services = 'active';
include_once('header.php');
?>

<body>
  <!-- start wrapper -->
  <div class="my-wrapper">
    <!-- start container fluid -->
    <div class="container-fluid">
      <!-- start label -->
      <div class="row">
        <div class="col-4">
          <h1>Edit Services</h1>
        </div>
      </div>
      <!-- end label -->
      <!-- start add button -->
      <div class="row">
        <div class="col-12">
          <button type="button" class="btn btn-primary mt-3 mb-3 float-end" data-bs-toggle="modal"
          data-bs-target="#modAddService">Add Service</button>
        </div>
      </div>
      <!-- end add button -->
      <!-- start table -->
      <div class="row">
        <div class="col-md-12">

          <table class="table table-striped text-end">
            <!-- start table head -->
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Service Name</th>
                <th scope="col">Description</th>
                <th scope="col">Date Available</th>
                <th scope="col">Time Available</th>
                <th scope="col">Duration</th>
                <th scope="col">Cost</th>
                <th scope="col">Doctor</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <!-- end table head -->
            <!-- start table body -->
            <tbody id="tbodyServices">

            </tbody>
            <!-- end table body -->
          </table>
        </div>
      </div>
      <!-- end table -->
      <!-- add service modal -->
      <form id="frmAddService">
        <div class="modal fade" id="modAddService" tabindex="-1" aria-labelledby="modAddServiceLabel" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
              <!-- start modal header -->
              <div class="modal-header">
                <h1 class="modal-title fs-5" id="modAddServiceLabel">Add New Service</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
              </div>
              <!-- end modal header -->
              <div class="modal-body">
                <!-- start service name -->
                <label for="service_name" class="form-label">Service Name</label>
                <input type="text" id="service_name" class="form-control">
                <pre></pre>
                <!-- end service name -->
                <!-- start service description -->
                <label for="description" class="form-label">Service Description</label>
                <textarea type="text" id="description" class="form-control"></textarea>
                <pre></pre>
                <!-- end service description -->
                <!-- service available date -->
                <div class="btn-group w-100" role="group">

                  <input type="checkbox" class="btn-check" id="day_sun" autocomplete="off">
                  <label class="btn btn-outline-primary" for="day_sun">Sun</label>

                  <input type="checkbox" class="btn-check" id="day_mon" autocomplete="off">
                  <label class="btn btn-outline-primary" for="day_mon">Mon</label>

                  <input type="checkbox" class="btn-check" id="day_tues" autocomplete="off">
                  <label class="btn btn-outline-primary" for="day_tues">Tues</label>

                  <input type="checkbox" class="btn-check" id="day_wed" autocomplete="off">
                  <label class="btn btn-outline-primary" for="day_wed">Wed</label>

                  <input type="checkbox" class="btn-check" id="day_thurs" autocomplete="off">
                  <label class="btn btn-outline-primary" for="day_thurs">Thurs</label>

                  <input type="checkbox" class="btn-check" id="day_fri" autocomplete="off">
                  <label class="btn btn-outline-primary" for="day_fri">Fri</label>

                  <input type="checkbox" class="btn-check" id="day_sat" autocomplete="off">
                  <label class="btn btn-outline-primary" for="day_sat">Sat</label>
                </div>
                <pre></pre>
                <!-- end service avaiblable date -->
                <!-- start service available time -->
                <label class="form-label">Service Available Time</label>
                <!-- start service start time -->
                <div class="input-group mb-3">
                  <label class="input-group-text" for="start_time">Start Time</label>
                  <select class="form-select" id="start_time">
                    <option selected>Select Start Time...</option>
                    <optgroup label="AM">
                      <option value="9:00 AM">9:00 AM</option>
                      <option value="10:00 AM">10:00 AM</option>
                      <option value="11:00 AM">11:00 AM</option>
                    </optgroup>
                    <optgroup label="PM">
                      <option value="12:00 PM">12:00 PM</option>
                      <option value="1:00 PM">1:00 PM</option>
                      <option value="2:00 PM">2:00 PM</option>
                      <option value="3:00 PM">3:00 PM</option>
                      <option value="4:00 PM">4:00 PM</option>
                      <option value="5:00 PM">5:00 PM</option>
                    </optgroup>
                  </select>
                </div>
                <!-- end service start time -->
                <!-- start service end time -->
                <div class="input-group mb-3">
                  <label class="input-group-text" for="end_time">End Time</label>
                  <select class="form-select" id="start_time">
                    <option selected>Select Start Time...</option>
                    <optgroup label="AM">
                      <option value="9:00 AM">10:00 AM</option>
                      <option value="9:00 AM">11:00 AM</option>
                    </optgroup>
                    <optgroup label="PM">
                      <option value="12:00 PM">12:00 PM</option>
                      <option value="1:00 PM">1:00 PM</option>
                      <option value="2:00 PM">2:00 PM</option>
                      <option value="3:00 PM">3:00 PM</option>
                      <option value="4:00 PM">4:00 PM</option>
                      <option value="5:00 PM">5:00 PM</option>
                      <option value="5:00 PM">6:00 PM</option>
                    </optgroup>
                  </select>
                </div>
                <!-- end service end time -->
                <!-- end service available time -->
                <!-- service duration -->
                <label for="duration" class="form-label">Service Duration</label>
                <input type="number" id="duration" class="form-control">
                <pre></pre>
                <!-- end service duration -->
                <!-- service cost -->
                <label for="cost" class="form-label">Service Cost</label>
                <div class="input-group mb-3">
                  <span class="input-group-text">₱</span>
                  <input type="text" class="form-control">
                  <span class="input-group-text">.00</span>
                </div>
                <!-- end service cost -->
                <!-- service doctor -->
                <label class="form-label">Choose Doctor</label>
                <div class="input-group mb-3">
                  <label class="input-group-text" for="doctor">Options</label>
                  <select class="form-select" id="doctor">
                    <option selected>Select Doctor...</option>
                    <option value="1">Doctor 1</option>
                    <option value="2">Doctor 2</option>
                    <option value="3">Doctor 3</option>
                  </select>
                </div>
                <!-- end service doctor -->
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-success">Add Service</button>
              </div>
            </div>
          </div>
        </div>
      </form>
      <!-- end modal -->
    </div>
    <!-- end container fluid -->
  </div>
  <!-- end wrapper -->


  <script src='https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js'></script>
</body>

</html>