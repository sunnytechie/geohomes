{{-- Desktop --}}
<form method="GET" action="{{ route('search') }}" class="property-search d-none d-lg-block">
    
    <div class="row align-items-lg-center" id="accordion-2">
      <div class="col-xl-2 col-lg-3 col-md-4">
        <div class="property-search-status-tab d-flex flex-row">
          <input class="search-field" type="hidden" name="status" value="for-rent"
                       data-default-value="">
          <button type="button" data-value="for-rent"
                        class="btn shadow-none btn-active-primary text-white rounded-0 hover-white text-uppercase h-lg-80 border-right-0 border-top-0 border-bottom-0 border-left border-white-opacity-03 active flex-md-1">
            Rent
          </button>
          <button type="button" data-value="for-sale"
                        class="btn shadow-none btn-active-primary text-white rounded-0 hover-white text-uppercase h-lg-80 border-left-0 border-top-0 border-bottom-0 border-right border-white-opacity-03 flex-md-1">
            Sale
          </button>
        </div>
      </div>
      <div class="col-xl-8 col-lg-7 d-md-flex">
        <select class="form-control shadow-none form-control-lg selectpicker rounded-right-md-0 rounded-md-top-left-0 rounded-lg-top-left flex-md-1 mt-3 mt-md-0" title="All Types" data-style="btn-lg py-2 h-52 border-right bg-white" id="type-1" name="type">
            <option @if ($type == "Apartment") selected @endif>Apartment</option>
            <option @if ($type == "House") selected @endif>House</option>
            <option @if ($type == "Villa") selected @endif>Villa</option>
            <option @if ($type == "Office") selected @endif>Office</option>
        </select>
        <div class="form-group mb-0 position-relative flex-md-3 mt-3 mt-md-0">
          <input type="text"
                       class="form-control form-control-lg border-0 shadow-none rounded-left-md-0 pr-8 bg-white placeholder-muted"
                       id="key-word-1" name="key_word"
                       value="{{  request('key_word') }}"
                       placeholder="Search property name or title...">
          <button type="submit" class="btn position-absolute pos-fixed-right-center p-0 text-heading fs-20 mr-4 shadow-none">
            <i class="far fa-search"></i>
          </button>
        </div>
      </div>
      <div class="col-lg-2">
        <a href="#advanced-search-filters-2"
               class="icon-primary btn advanced-search w-100 shadow-none text-white text-left rounded-0 fs-14 font-weight-600 position-relative collapsed px-0 d-flex align-items-center"
               data-toggle="collapse" data-target="#advanced-search-filters-2" aria-expanded="true"
               aria-controls="advanced-search-filters-2">
          Advanced Search
        </a>
      </div>
      <div id="advanced-search-filters-2" class="col-12 pb-6 pt-lg-2 collapse" data-parent="#accordion-2">
        <div class="row mx-n2">
          <div class="col-sm-6 col-md-4 col-lg-3 pt-4 px-2">
            <select class="form-control border-0 shadow-none form-control-lg selectpicker bg-white"
                            name="status"
                            title="Status" data-style="btn-lg py-2 h-52 bg-white">
              <option>All status</option>
              <option @if ($status == "For Rent") selected @endif>For Rent</option>
              <option @if ($status == "For Sale") selected @endif>For Sale</option>
            </select>
          </div>
          <div class="col-sm-6 col-md-4 col-lg-3 pt-4 px-2">
            <select class="form-control border-0 shadow-none form-control-lg selectpicker bg-white"
                            name="bedroom"
                            title="Bedrooms" data-style="btn-lg py-2 h-52 bg-white">
              <option>All Bedrooms</option>
              <option @if ($bedroom == "1") selected @endif>1</option>
              <option @if ($bedroom == "2") selected @endif>2</option>
              <option @if ($bedroom == "3") selected @endif>3</option>
              <option @if ($bedroom == "4") selected @endif>4</option>
              <option @if ($bedroom == "4") selected @endif>5</option>
              <option @if ($bedroom == "5") selected @endif>6</option>
              <option @if ($bedroom == "6") selected @endif>7</option>
              <option @if ($bedroom == "7") selected @endif>8</option>
              <option @if ($bedroom == "8") selected @endif>9</option>
              <option @if ($bedroom == "9") selected @endif>10</option>
            </select>
          </div>
          <div class="col-sm-6 col-md-4 col-lg-3 pt-4 px-2">
            <select class="form-control border-0 shadow-none form-control-lg selectpicker bg-white"
                            name="bathrooms"
                            title="Bathrooms" data-style="btn-lg py-2 h-52 bg-white">
              <option>All Bathrooms</option>
              <option @if ($bathrooms == "1") selected @endif>1</option>
              <option @if ($bathrooms == "2") selected @endif>2</option>
              <option @if ($bathrooms == "3") selected @endif>3</option>
              <option @if ($bathrooms == "4") selected @endif>4</option>
              <option @if ($bathrooms == "4") selected @endif>5</option>
              <option @if ($bathrooms == "5") selected @endif>6</option>
              <option @if ($bathrooms == "6") selected @endif>7</option>
              <option @if ($bathrooms == "7") selected @endif>8</option>
              <option @if ($bathrooms == "8") selected @endif>9</option>
              <option @if ($bathrooms == "9") selected @endif>10</option>
            </select>
          </div>
          <div class="col-sm-6 col-md-4 col-lg-3 pt-4 px-2">
            <select class="form-control border-0 shadow-none form-control-lg selectpicker bg-white"
                            title="All Cities" data-style="btn-lg py-2 h-52 bg-white" name="city">
              <option>All Cities</option>
              <option @if ($city == "Abuja") selected @endif>Abuja</option>
              <option @if ($city == "Enugu") selected @endif>Enugu</option>
              <option @if ($city == "Anambra") selected @endif>Anambra</option>
              <option @if ($city == "Ebonyi") selected @endif>Ebonyi</option>
              <option @if ($city == "Lagos") selected @endif>Lagos</option>
              <option @if ($city == "Asaba") selected @endif>Asaba</option>
              <option @if ($city == "Port Harcourt") selected @endif>Port Harcourt</option>
              <option @if ($city == "Kaduna") selected @endif>Kaduna</option>
            </select>
          </div>
          
        </div>
        
       
      </div>
    </div>
</form>

  {{-- Mobile --}}
  <form method="GET" action="{{ route('search') }}" class="property-search property-search-mobile d-lg-none py-6">
    
    <div class="row align-items-lg-center" id="accordion-2-mobile">
      <div class="col-12">
        <div class="form-group mb-0 position-relative">
          <a href="#advanced-search-filters-2-mobile"
                   class="icon-primary btn advanced-search shadow-none pr-3 pl-0 d-flex align-items-center position-absolute pos-fixed-left-center py-0 h-100 border-right collapsed"
                   data-toggle="collapse" data-target="#advanced-search-filters-2-mobile"
                   aria-expanded="true"
                   aria-controls="advanced-search-filters-2-mobile">
          </a>
          <input type="text"
                       class="form-control form-control-lg border-0 shadow-none pr-9 pl-11 bg-white placeholder-muted"
                       name="key_word"
                       value="{{  request('key_word') }}"
                       placeholder="Search...">
          <button type="submit"
                        class="btn position-absolute pos-fixed-right-center p-0 text-heading fs-20 px-3 shadow-none h-100 border-left bg-white">
            <i class="far fa-search"></i>
          </button>
        </div>
      </div>
      <div id="advanced-search-filters-2-mobile" class="col-12 pt-2 collapse"
             data-parent="#accordion-2-mobile">
        <div class="row mx-n2">
          <div class="col-sm-6 pt-4 px-2">
            <select class="form-control border-0 shadow-none form-control-lg selectpicker bg-white"
                            title="Select" data-style="btn-lg py-2 h-52 bg-white" name="type">
              <option>All status</option>
              <option @if ($status == "For Rent") selected @endif>For Rent</option>
              <option @if ($status == "For Sale") selected @endif>For Sale</option>
            </select>
          </div>
          <div class="col-sm-6 pt-4 px-2">
            <select class="form-control border-0 shadow-none form-control-lg selectpicker bg-white" title="All Types" data-style="btn-lg py-2 h-52 bg-white" name="type">
              <option @if ($type == "Apartment") selected @endif>Apartment</option>
              <option @if ($type == "House") selected @endif>House</option>
              <option @if ($type == "Villa") selected @endif>Villa</option>
              <option @if ($type == "Office") selected @endif>Office</option>
            </select>
          </div>
          <div class="col-sm-6 pt-4 px-2">
            <select class="form-control border-0 shadow-none form-control-lg selectpicker bg-white"
                            name="bedroom"
                            title="Bedrooms" data-style="btn-lg py-2 h-52 bg-white">
              <option>All Bedrooms</option>
              <option @if ($bedroom == "1") selected @endif>1</option>
              <option @if ($bedroom == "2") selected @endif>2</option>
              <option @if ($bedroom == "3") selected @endif>3</option>
              <option @if ($bedroom == "4") selected @endif>4</option>
              <option @if ($bedroom == "4") selected @endif>5</option>
              <option @if ($bedroom == "5") selected @endif>6</option>
              <option @if ($bedroom == "6") selected @endif>7</option>
              <option @if ($bedroom == "7") selected @endif>8</option>
              <option @if ($bedroom == "8") selected @endif>9</option>
              <option @if ($bedroom == "9") selected @endif>10</option>
            </select>
          </div>
          <div class="col-sm-6 pt-4 px-2">
            <select class="form-control border-0 shadow-none form-control-lg selectpicker bg-white"
                            name="bathrooms"
                            title="Bathrooms" data-style="btn-lg py-2 h-52 bg-white">
              <option>All Bathrooms</option>
              <option @if ($bathrooms == "1") selected @endif>1</option>
              <option @if ($bathrooms == "2") selected @endif>2</option>
              <option @if ($bathrooms == "3") selected @endif>3</option>
              <option @if ($bathrooms == "4") selected @endif>4</option>
              <option @if ($bathrooms == "4") selected @endif>5</option>
              <option @if ($bathrooms == "5") selected @endif>6</option>
              <option @if ($bathrooms == "6") selected @endif>7</option>
              <option @if ($bathrooms == "7") selected @endif>8</option>
              <option @if ($bathrooms == "8") selected @endif>9</option>
              <option @if ($bathrooms == "9") selected @endif>10</option>
            </select>
          </div>
          <div class="col-sm-6 pt-4 px-2">
            <select class="form-control border-0 shadow-none form-control-lg selectpicker bg-white"
                            title="All Cities" data-style="btn-lg py-2 h-52 bg-white" name="city">
              <option>All Cities</option>
              <option @if ($city == "Abuja") selected @endif>Abuja</option>
              <option @if ($city == "Enugu") selected @endif>Enugu</option>
              <option @if ($city == "Anambra") selected @endif>Anambra</option>
              <option @if ($city == "Ebonyi") selected @endif>Ebonyi</option>
              <option @if ($city == "Lagos") selected @endif>Lagos</option>
              <option @if ($city == "Asaba") selected @endif>Asaba</option>
              <option @if ($city == "Port Harcourt") selected @endif>Port Harcourt</option>
              <option @if ($city == "Kaduna") selected @endif>Kaduna</option>
            </select>
          </div>
        </div>
        
      </div>
    </div>
  </form>