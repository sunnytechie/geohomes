<title>FBILTD - Admin management</title>
@extends('layouts.admin')
@section('content')
<main id="content" class="bg-gray-01">
    <div class="px-3 px-lg-6 px-xxl-13 py-5 py-lg-10 my-profile">
      {{-- <div class="mb-6">
        <h2 class="mb-0 text-heading fs-22 lh-15">Add new property
        </h2>
        <p class="mb-1">Lorem ipsum dolor sit amet, consec tetur cing elit. Suspe ndisse suscipit</p>
      </div> --}}

      <div class="row justify-content-center">
        <div class="col-md-8">
          <form action="{{ route('admins.update', $admin->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="card mb-6">
              <div class="card-body p-6">
                  <h3 class="card-title mb-0 text-heading fs-22 lh-15">Manage Admin Auth</h3>
                  <p class="card-text mb-5">Manage admin</p>

                  <div class="form-group">
                      <label for="name" class="text-heading">User Name <span class="text-muted">(mandatory)</span></label>
                      <input type="text" class="form-control form-control-lg border-0 @error('name') is-invalid @enderror" placeholder="Full Legal Name" id="name" value="{{ $admin->name ?? old('name') }}" name="name">
                      
                      @if ($errors->has('name'))
                          <div id="nameHelp" class="form-text text-danger">
                              <div>{{ $errors->first('name') }}</div>
                          </div>
                      @endif
                  </div>

                  <div class="form-group">
                      <label for="email" class="text-heading">email <span class="text-muted">(mandatory)</span></label>
                      <input type="email" class="form-control form-control-lg border-0 @error('email') is-invalid @enderror" placeholder="Email Address" id="email" value="{{ $admin->email ?? old('email') }}" name="email">
                      
                      @if ($errors->has('email'))
                          <div id="emailHelp" class="form-text text-danger">
                              <div>{{ $errors->first('email') }}</div>
                          </div>
                      @endif
                  </div>

                  <div class="form-group">
                    <label for="role" class="text-heading">Role <span class="text-muted">(mandatory)</span></label>
                    <select class="form-control border-0 shadow-none form-control-lg selectpicker" name="role" id="role">
                      {{-- <option value="superadmin" {{ "1" == $admin->role ? 'selected' : '' }}>Super Admin</option> --}}
                      @if (Auth::user()->is_admin)
                      <option value="admin" {{ "1" == $admin->is_admin ? 'selected' : '' }}>Super Admin</option>
                      @endif
                      <option value="manager" {{ "manager" == $admin->role ? 'selected' : '' }}>Manager</option>
                      <option value="auditor" {{ "auditor" == $admin->role ? 'selected' : '' }}>Auditor</option>
                      <option value="accountant" {{ "accountant" == $admin->role ? 'selected' : '' }}>Accountant</option>
                      <option value="marketer" {{ "marketer" == $admin->role ? 'selected' : '' }}>Marketer</option>
                      <option value="secretary" {{ "secretary" == $admin->role ? 'selected' : '' }}>Secretary</option>
                      <option value="staff" {{ "staff" == $admin->role ? 'selected' : '' }}>Staff</option>
                      <option value="user" {{ "user" == $admin->role ? 'selected' : '' }}>User</option>
                      <option value="agent" {{ "agent" == $admin->role ? 'selected' : '' }}>Agent</option>
                    </select>
                    
                    @if ($errors->has('role'))
                        <div id="roleHelp" class="form-text text-danger">
                            <div>{{ $errors->first('role') }}</div>
                        </div>
                    @endif
                </div>

                  <div class="form-group">
                      <label for="password" class="text-heading">Create password <span class="text-muted">(Min: 8 characters)</span></label>
                      <input type="password" class="form-control form-control-lg border-0 @error('password') is-invalid @enderror" placeholder="password Address" id="password" value="{{ old('password') }}" name="password">
                      
                      @if ($errors->has('password'))
                          <div id="passwordHelp" class="form-text text-danger">
                              <div>{{ $errors->first('password') }}</div>
                          </div>
                      @endif
                  </div>

                  <div class="form-group">
                    <button class="btn btn-lg btn-primary my-3 w-100">Authorize Admin</button>
                  </div>


              </div>
          </div>
          </form>
        </div>
      </div>
      </div>
    </div>
  </main>
@endsection