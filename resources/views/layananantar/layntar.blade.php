@extends('layouts.template_layantar.header')

@section('content')
    <div class="card m-5">
        <div class="card-header">
            <h3>Layanan Antar Barang Bukti</h3>
        </div>
        <div class="card-body">
            <form>
                <div class="row">
                    <div class="col">
                        <div class="mb-3">
                            <label for="" class="form-label">No. Registrasi Barang Bukti</label>
                            <input type="email" name="noreg" class="form-control" aria-describedby="emailHelp" value="$data">
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Status Penerima BB</label>
                            <select class="form-select" name="statuspenerima" aria-label="Default select example">
                                <option selected>Pilih</option>
                                <option value="1">Keluarga Korban</option>
                                <option value="2">KeluargaTerpidana</option>
                                <option value="3">Korban</option>
                              </select>
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Alamat Lengkap</label>
                            <textarea class="form-control" name="alamat" id="validationTextarea" placeholder="Required example textarea"></textarea>
                        </div>
                    </div>
                    <div class="col" colspan="2">
                        <div class="mb-3">
                            <label for="" class="form-label">Nama Pemilik BB</label>
                            <input type="email" name="namapemilikbb" class="form-control" aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Nomor Tlp/WA</label>
                            <input type="email" name="notelp" class="form-control" aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Keterangan BB</label>
                            <textarea class="form-control" name="keteranganbb" id="validationTextarea" placeholder="Required example textarea"></textarea>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
              </form>
        </div>
    </div>
    <!-- ====================================================================================== -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" />
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>


<div class="main-container container-fluid">
  <!-- heading -->
  <div class="container-fluid">
    <div class="row">
      <div class="col">
        <h1 class="text-primary mr-auto">Example list</h1>
      </div>
    </div>
  </div>
  <!-- /heading -->
  <!-- table -->
  <table class="table table-striped table-bordered" id="myTable" cellspacing="0" width="100%">
    <thead class="thead-dark">
      <tr>
        <th>#</th>
        <th> Name</th>
        <th> Description</th>
        <th> Action</th>
      </tr>
    </thead>
    <tbody>
      <tr class="data-row">
        <td class="align-middle iteration">1</td>
        <td class="align-middle name">Name 1</td>
        <td class="align-middle word-break description">Description 1</td>
        <td class="align-middle">
          <button type="button" class="btn btn-success" id="edit-item" data-item-id="1">edit</button>
        </td>
      </tr>
    </tbody>
  </table>
  <!-- /table -->
</div>
<!-- Attachment Modal -->
<div class="modal fade" id="edit-modal" tabindex="-1" role="dialog" aria-labelledby="edit-modal-label" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="edit-modal-label">Edit Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="attachment-body-content">
        <form id="edit-form" class="form-horizontal" method="POST" action="">
          <div class="card text-white bg-dark mb-0">
            <div class="card-header">
              <h2 class="m-0">Edit</h2>
            </div>
            <div class="card-body">
              <!-- id -->
              <div class="form-group">
                <label class="col-form-label" for="modal-input-id">Id (just for reference not meant to be shown to the general public) </label>
                <input type="text" name="modal-input-id" class="form-control" id="modal-input-id" required>
              </div>
              <!-- /id -->
              <!-- name -->
              <div class="form-group">
                <label class="col-form-label" for="modal-input-name">Name</label>
                <input type="text" name="modal-input-name" class="form-control" id="modal-input-name" required autofocus>
              </div>
              <!-- /name -->
              <!-- description -->
              <div class="form-group">
                <label class="col-form-label" for="modal-input-description">Email</label>
                <input type="text" name="modal-input-description" class="form-control" id="modal-input-description" required>
              </div>
              <!-- /description -->
            </div>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Done</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<!-- /Attachment Modal -->
@endsection
