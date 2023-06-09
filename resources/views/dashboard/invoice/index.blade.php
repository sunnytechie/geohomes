@extends('layouts.admin')

@section('content')
    <div class="px-3 px-lg-6 px-xxl-13 py-5 py-lg-10 invoice-listing">
      <div class="mb-6">
        <div class="row">
          <div class="col-sm-12 col-md-6 d-flex justify-content-md-start justify-content-center">
            <div class="d-flex form-group mb-0 align-items-center">
              <label for="invoice-list_length" class="d-block mr-2 mb-0">Results:</label>
              <select
                    name="invoice-list_length" id="invoice-list_length"
                    aria-controls="invoice-list" class="form-control form-control-lg mr-2 selectpicker"
                    data-style="bg-white btn-lg h-52 py-2 border">
                <option value="7">7</option>
                <option value="10">10</option>
                <option value="20">20</option>
                <option value="50">50</option>
              </select>
            </div>
            <div class="align-self-center">
              <button class="btn btn-primary btn-lg" tabindex="0"
                    aria-controls="invoice-list"><span>Add New</span></button>
            </div>
          </div>
          <div class="col-sm-12 col-md-6 d-flex justify-content-md-end justify-content-center mt-md-0 mt-3">
            <div class="input-group input-group-lg bg-white mb-0 position-relative mr-2">
              <input type="text" class="form-control bg-transparent border-1x" placeholder="Search..."
                   aria-label=""
                   aria-describedby="basic-addon1">
              <div class="input-group-append position-absolute pos-fixed-right-center">
                <button class="btn bg-transparent border-0 text-gray lh-1" type="button"><i
                        class="fal fa-search"></i></button>
              </div>
            </div>
            <div class="align-self-center">
              <button class="btn btn-danger btn-lg" tabindex="0"
                    aria-controls="invoice-list"><span>Delete</span></button>
            </div>
          </div>
        </div>
      </div>
      <div class="table-responsive">
        <table id="invoice-list" class="table table-hover bg-white border rounded-lg">
          <thead>
            <tr role="row">
              <th class="no-sort py-6 pl-6"><label
                    class="new-control new-checkbox checkbox-primary m-auto">
                  <input type="checkbox"
                       class="new-control-input chk-parent select-customers-info">
                </label></th>
              <th class="py-6">Invoice Id</th>
              <th class="py-6">Name</th>
              <th class="py-6">Email</th>
              <th class="py-6">Date</th>
              <th class="py-6">Amount</th>
              <th class="py-6">Status</th>
              <th class="no-sort py-6">Actions</th>
            </tr>
          </thead>
          <tbody>
            <tr role="row">
              <td class="checkbox-column py-6 pl-6"><label
                    class="new-control new-checkbox checkbox-primary m-auto">
                  <input type="checkbox" class="new-control-input child-chk select-customers-info">
                </label></td>
              <td class="align-middle"><a href="dashboard-preview-invoice.html"><span
                    class="inv-number">#081451</span></a>
              </td>
              <td class="align-middle">
                <div class="d-flex align-items-center">
                  <div class="usr-img-frame mr-2 rounded-circle">
                    <img alt="avatar" class="img-fluid rounded-circle w-30px"
                             src="images/profile-28.jpeg">
                  </div>
                  <p class="align-self-center mb-0 user-name">Laurie Fox</p>
                </div>
              </td>
              <td class="align-middle"><span class="text-primary pr-1"><i class="fal fa-envelope"></i></span>lauriefox@company.com</td>
              <td class="align-middle"><span class="text-success pr-1"><i class="fal fa-calendar"></i></span>15 Dec 2020</td>
              <td class="align-middle"><span class="inv-amount">$2275.45</span></td>
              <td class="align-middle"><span class="badge badge-green text-capitalize">Paid</span></td>
              <td class="align-middle">
                <a href="#" data-toggle="tooltip" title="Edit"
                   class="d-inline-block fs-18 text-muted hover-primary mr-5"><i
                        class="fal fa-pencil-alt"></i></a>
                <a href="#" data-toggle="tooltip" title="Delete"
                   class="d-inline-block fs-18 text-muted hover-primary"><i
                        class="fal fa-trash-alt"></i></a>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
      <div class="mt-6">
        <nav>
          <ul class="pagination rounded-active justify-content-center">
            <li class="page-item"><a class="page-link" href="#"><i class="far fa-angle-double-left"></i></a>
            </li>
            <li class="page-item"><a class="page-link" href="#">1</a></li>
            <li class="page-item active"><a class="page-link" href="#">2</a></li>
            <li class="page-item d-none d-sm-block"><a class="page-link" href="#">3</a></li>
            <li class="page-item">...</li>
            <li class="page-item"><a class="page-link" href="#">6</a></li>
            <li class="page-item"><a class="page-link" href="#"><i
                class="far fa-angle-double-right"></i></a></li>
          </ul>
        </nav>
        <div class="text-center mt-2">6-10 of 29 Results</div>
      </div>
    </div>
@endsection
