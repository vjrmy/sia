            <div class="content-wrapper container">
                
<section class="section">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">
                Jadwal Kelas Perkuliahan
                </h5>
                <br>
                <button class="btn btn-success" data-toggle="modal" data-target="matkulAdd">Add New</button>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table" id="matkul">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Tahun Ajaran</th>
                                <th>Jurusan</th>
                                <th>Program Studi</th>
                                <th>Mata Kuliah</th>
                                <th>Semester</th>
                                <th>Ruang</th>
                                <th>Hari</th>
                                <th>Waktu</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
</section>
    <div class="modal fade text-left" id="inlineForm" tabindex="-1" role="dialog"
        aria-labelledby="myModalLabel33" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable"
            role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel33">Login Form </h4>
                    <button type="button" class="close" data-bs-dismiss="modal"
                        aria-label="Close">
                        <i data-feather="x"></i>
                    </button>
                </div>
                <form class="form">
                    <div class="row">
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label for="first-name-column">First Name</label>
                                <input type="text" id="first-name-column" class="form-control"
                                    placeholder="First Name" name="fname-column">
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label for="last-name-column">Last Name</label>
                                <input type="text" id="last-name-column" class="form-control"
                                    placeholder="Last Name" name="lname-column">
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label for="city-column">City</label>
                                <input type="text" id="city-column" class="form-control" placeholder="City"
                                    name="city-column">
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label for="country-floating">Country</label>
                                <input type="text" id="country-floating" class="form-control"
                                    name="country-floating" placeholder="Country">
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label for="company-column">Company</label>
                                <input type="text" id="company-column" class="form-control"
                                    name="company-column" placeholder="Company">
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label for="email-id-column">Email</label>
                                <input type="email" id="email-id-column" class="form-control"
                                    name="email-id-column" placeholder="Email">
                            </div>
                        </div>
                        <div class="form-group col-12">
                            <div class='form-check'>
                                <div class="checkbox">
                                    <input type="checkbox" id="checkbox5" class='form-check-input' checked>
                                    <label for="checkbox5">Remember Me</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
                            <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
            </div>



<script src="<?= base_url() ?>assets/extensions/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?= base_url() ?>assets/extensions/datatables.net-bs5/js/dataTables.bootstrap5.min.js"></script>
<script src="<?= base_url() ?>assets/extensions/jquery/jquery.min.js"></script>
<script>
        $(document).ready(function(){
            $("#matkul").DataTable({
                "processing": true,
                "serverSide": true,
                "order": [],
                "ajax": {
                    "url": "<?= base_url('Matkul/getData'); ?>",
                    "type": "POST"
                },
                "columnDefs": [{
                    "target":[-1],
                    "orderable": false
                }]
            });
        });
</script>