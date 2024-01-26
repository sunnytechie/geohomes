<title>FBILTD Admins Allocation</title>
@extends('layouts.admin')

@section('content')
  {{-- alert --}}
  {{-- session --}}
  @if (session('message'))
    <div class="px-3">
      <div class="row">
        <div class="col-md-12">
            <div class="hide-from-mobile mt-2"></div>

                {{-- alert --}}
                <div class="alert alert-info alert-dismissible fade show" role="alert">
                    {{ session('message') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close" style="margin-top: 6px">
                      <span aria-hidden="true"><i class="fa fa-window-close"></i></span>
                    </button>
                </div>

        </div>
    </div>
    </div>
  @endif

    <div class="px-3 px-lg-6 px-xxl-13 py-5 py-lg-10 invoice-listing">
      <div class="mb-6">
        <div class="row">
            <div class="col-md-7 shadow offset-md-2">
              @if ($transaction->allocation_status == "Pending")
                <div style="padding: 15px; background: #fff">
                    <div class="text-center mt-2 mb-3" style="font-size: 20px; color: #654321; font-weight:700">Allocate Plot.</div>
                    <form action="{{ route('allocatePost') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="transaction_id" value="{{ $transaction->id }}">
                        <div class="from-group mb-3">
                            <label for="plot">Allocate a plot to Subscriber: <strong style="color: #654321">{{ $transaction->user->name }}</strong> <br> subscribed to Estate: <strong style="color: #654321">{{ $transaction->project->title }}</strong></label>
                            <p>You are expected to select maximum of <strong style="color: #654321">{{ $transaction->plots }} plots.</strong></p>
                            {{-- <select name="plot" id="plot" class="form-control border-0 shadow-none form-control-lg selectpicker">
                            </select>   --}}
                            @foreach ($plots as $plot)
                            <div class="custom-control custom-checkbox">
                              <input type="checkbox" class="custom-control-input plot-checkbox" id="customCheck{{ $plot->id }}" name="plots[]" value="{{ $plot->id }}">
                              <label class="custom-control-label" for="customCheck{{ $plot->id }}">{{ $plot->title }}</label>
                            </div>
                          @endforeach

                          <div class="mt-1"><strong style="color: #654321">Information that will be contained in the Email for the customer</strong></div>

                                <input class="form-control form-control-lg" readonly type="text" id="plotNames" name="plotNames" placeholder="Plot 1, plot, 2">
                                @error('plotNames')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                              @if ($plots->count() == 0)
                                <div class="mt-3" style="color: #654321">You do not have any plots left to allocate, kindly <a href="{{ route('plots.create') }}">Add new plots</a> to this estate before allocating it to this customer.</div>
                              @endif
                        </div>


                        <div class="form-group">

                            <label for="plot_id">Plot ID:</label>
                            <input class="form-control form-control-lg" type="text" id="plot_id" value="{{ old('plot_id') }}" name="plot_id" placeholder="005 (Assign an ID for this plots)">

                            @error('plot_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                      {{-- <div class="form-group">

                        <label for="plot_names">Plot Names:</label>
                        <input class="form-control form-control-lg" type="text" id="plot_names" value="{{ old('plot_names') }}" name="plot_names" placeholder="Ex. 2-10 or plot 1 - 3 (Will appear on the paper.)">

                        @error('plot_names')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                      </div> --}}

                      {{-- <div class="form-group">

                        <label for="pdf">Upload downlable allocation file (Must be PDF)</label>
                        <input class="form-control form-control-lg" type="file" id="pdf" name="pdf">

                        @error('pdf')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                      </div>

                      <div class="form-group">
                        <label for="finalpdf">Upload downlable Final allocation file that will be available to the user to download after they must have paid for the land. (Must be PDF)</label>
                        <input class="form-control form-control-lg" type="file" id="finalpdf" name="finalpdf">

                        @error('finalpdf')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                      </div> --}}

                        <div class="spacer p-2"></div>

                        <div class="form-group mt-3">
                            <button class="btn w-100 w-md-50 btn-md p-2" @if ($plots->count() == 0) disabled @endif style="background: #654321; color:#fff">Allocate</button>
                        </div>
                    </form>
                </div>
                @else
                <div class="alert alert-primary mt-3 text-center" role="alert">
                  <strong style="color: #654321">Allocated!</strong> This Transaction has been Allocated and has/will expired: {{ $transaction->expiry_date }}
                </div>

              @endif


            </div>
        </div>
      </div>


    </div>

    <script>
        const checkboxes = document.querySelectorAll('.plot-checkbox');
        const plotNamesInput = document.getElementById('plotNames');

        // Function to update the plotNames input based on checked checkboxes
        function updatePlotNames() {
          const checkedTitles = Array.from(checkboxes)
            .filter(checkbox => checkbox.checked)
            .map(checkbox => checkbox.nextElementSibling.textContent.trim());

          plotNamesInput.value = checkedTitles.join(', ');
        }

        // Event listener to handle checkbox changes
        checkboxes.forEach(checkbox => {
          checkbox.addEventListener('change', updatePlotNames);
        });
    </script>

@endsection
