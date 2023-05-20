<div class="row">
    <div class="col-xxl-8 mb-6">
      <div class="card px-7 py-6 h-100 chart">
        <div class="card-body p-0 collapse-tabs">
          <div class="d-flex align-items-center mb-5">
            <h2 class="mb-0 text-heading fs-22 lh-15 mr-auto">View statistics</h2>
            <ul class="nav nav-pills justify-content-end d-none d-sm-flex nav-pills-01"
                role="tablist">
              <li class="nav-item px-5 py-1">
                <a class="nav-link active bg-transparent shadow-none p-0 letter-spacing-1"
                       id="hours-tab" data-toggle="tab"
                       href="#hours"
                       role="tab"
                       aria-controls="hours" aria-selected="true">Hours</a>
              </li>
              <li class="nav-item px-5 py-1">
                <a class="nav-link bg-transparent shadow-none p-0 letter-spacing-1" id="weekly-tab"
                       data-toggle="tab"
                       href="#weekly"
                       role="tab"
                       aria-controls="weekly" aria-selected="false">Weekly</a>
              </li>
              <li class="nav-item px-5 py-1">
                <a class="nav-link bg-transparent shadow-none p-0 letter-spacing-1" id="monthly-tab"
                       data-toggle="tab"
                       href="#monthly"
                       role="tab"
                       aria-controls="monthly" aria-selected="false">Monthly</a>
              </li>
            </ul>
          </div>
          <div class="tab-content shadow-none p-0">
            <div id="collapse-tabs-accordion">
              <div class="tab-pane tab-pane-parent fade show active px-0" id="hours"
                     role="tabpanel"
                     aria-labelledby="hours-tab">
                <div class="card bg-transparent mb-sm-0 border-0">
                  <div class="card-header d-block d-sm-none bg-transparent px-0 py-1 border-bottom-0"
                             id="headingHours">
                    <h5 class="mb-0">
                      <button class="btn collapse-parent font-size-h5 btn-block border shadow-none"
                                        data-toggle="collapse"
                                        data-target="#hours-collapse"
                                        aria-expanded="true"
                                        aria-controls="hours-collapse">
                        Hours
                      </button>
                    </h5>
                  </div>
                  <div id="hours-collapse" class="collapse show collapsible"
                             aria-labelledby="headingHours"
                             data-parent="#collapse-tabs-accordion">
                    <div class="card-body p-0 py-4">
                      <canvas class="chartjs" data-chart-options="[]"
                                        data-chart-labels='["05h","08h","11h","14h","17h","20h","23h"]'
                                        data-chart-datasets='[{"label":"Clicked","data":[0,7,10,3,15,30,10],"backgroundColor":"rgba(105, 105, 235, 0.1)","borderColor":"#6969eb","borderWidth":3,"fill":true},{"label":"View","data":[10,9,18,20,28,40,27],"backgroundColor":"rgba(254, 91, 52, 0.1)","borderColor":"#ff6935","borderWidth":3,"fill":true}]'>
                      </canvas>
                    </div>
                  </div>
                </div>
              </div>
              <div class="tab-pane tab-pane-parent fade px-0" id="weekly"
                     role="tabpanel"
                     aria-labelledby="weekly-tab">
                <div class="card bg-transparent mb-sm-0 border-0">
                  <div class="card-header d-block d-sm-none bg-transparent px-0 py-1 border-bottom-0"
                             id="headingWeekly">
                    <h5 class="mb-0">
                      <button class="btn collapse-parent font-size-h5 btn-block collapsed border shadow-none"
                                        data-toggle="collapse"
                                        data-target="#weekly-collapse"
                                        aria-expanded="true"
                                        aria-controls="weekly-collapse">
                        Weekly
                      </button>
                    </h5>
                  </div>
                  <div id="weekly-collapse" class="collapse collapsible" aria-labelledby="headingWeekly" data-parent="#collapse-tabs-accordion">
                    <div class="card-body p-0 py-4">
                      <canvas class="chartjs" data-chart-options="[]"
                                        data-chart-labels='["Mar 12","Mar 13","Mar 14","Mar 15","Mar 16","Mar 17","Mar 18","Mar 19"]'
                                        data-chart-datasets='[{"label":"Clicked","data":[0,13,9,3,15,15,10,0],"backgroundColor":"rgba(105, 105, 235, 0.1)","borderColor":"#6969eb","borderWidth":3,"fill":true},{"label":"View","data":[10,20,18,15,28,33,27,10],"backgroundColor":"rgba(254, 91, 52, 0.1)","borderColor":"#ff6935","borderWidth":3,"fill":true}]'>
                      </canvas>
                    </div>
                  </div>
                </div>
              </div>
              <div class="tab-pane tab-pane-parent fade px-0" id="monthly" role="tabpanel"
                     aria-labelledby="monthly-tab">
                <div class="card bg-transparent mb-sm-0 border-0">
                  <div class="card-header d-block d-sm-none bg-transparent px-0 py-1 border-bottom-0"
                             id="headingMonthly">
                    <h5 class="mb-0">
                      <button class="btn btn-block collapse-parent collapsed border shadow-none"
                                        data-toggle="collapse"
                                        data-target="#monthly-collapse"
                                        aria-expanded="true"
                                        aria-controls="monthly-collapse">
                        Monthly
                      </button>
                    </h5>
                  </div>
                  <div id="monthly-collapse" class="collapse collapsible"
                             aria-labelledby="headingMonthly"
                             data-parent="#collapse-tabs-accordion">
                    <div class="card-body p-0 py-4">
                      <canvas class="chartjs" data-chart-options="[]"
                                        data-chart-labels='["Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec"]'
                                        data-chart-datasets='[{"label":"Clicked","data":[2,15,20,10,15,20,10,0,20,30,10,0],"backgroundColor":"rgba(105, 105, 235, 0.1)","borderColor":"#6969eb","borderWidth":3,"fill":true},{"label":"View","data":[10,20,18,15,28,33,27,10,20,30,10,0],"backgroundColor":"rgba(254, 91, 52, 0.1)","borderColor":"#ff6935","borderWidth":3,"fill":true}]'>
                      </canvas>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-xxl-4 mb-6">
      <div class="card px-7 py-6 h-100">
        <div class="card-body p-0">
          <h2 class="mb-2 text-heading fs-22 lh-15">Recent Activities</h2>
          <ul class="list-group list-group-no-border">
            <li class="list-group-item px-0 py-2">
              <div class="media align-items-center">
                <div class="badge badge-blue w-40px h-40 d-flex align-items-center justify-content-center property fs-18 mr-3">
                  <svg class="icon icon-1">
                    <use xlink:href="#icon-1"></use>
                  </svg>
                </div>
                <div class="media-body">
                  Your listing <a href="#" class="text-heading"> Villa Called Archangel</a> has been
                  approved
                </div>
              </div>
            </li>
            <li class="list-group-item px-0 py-2">
              <div class="media align-items-center">
                <div class="badge badge-yellow w-40px h-40 d-flex align-items-center justify-content-center fs-18 mr-3">
                  <svg class="icon icon-review">
                    <use xlink:href="#icon-review"></use>
                  </svg>
                </div>
                <div class="media-body">
                  Dollie Horton left a review on
                  <a href="#" class="text-heading"> Villa
                    Called Archangel</a>
                </div>
              </div>
            </li>
            <li class="list-group-item px-0 py-2">
              <div class="media align-items-center">
                <div class="badge badge-pink w-40px h-40 d-flex align-items-center justify-content-center fs-18 mr-3">
                  <svg class="icon icon-heart">
                    <use xlink:href="#icon-heart"></use>
                  </svg>
                </div>
                <div class="media-body">
                  Someone favorites your <a href="#" class="text-heading"> Adorable Garden Gingerbread
                    House</a>
                  listing
                </div>
              </div>
            </li>
            <li class="list-group-item px-0 py-2">
              <div class="media align-items-center">
                <div class="badge badge-pink w-40px h-40 d-flex align-items-center justify-content-center fs-18 mr-3">
                  <svg class="icon icon-heart">
                    <use xlink:href="#icon-heart"></use>
                  </svg>
                </div>
                <div class="media-body">
                  Someone favorites your <a href="#" class="text-heading"> Adorable Garden Gingerbread House</a>
                  listing
                </div>
              </div>
            </li>
            <li class="list-group-item px-0 py-2">
              <div class="media align-items-center">
                <div class="badge badge-blue w-40px h-40 d-flex align-items-center justify-content-center fs-18 mr-3">
                  <svg class="icon icon-1">
                    <use xlink:href="#icon-1"></use>
                  </svg>
                </div>
                <div class="media-body">
                  Your listing <a href="#" class="text-heading"> Villa Called Archangel</a> has been
                  approved
                </div>
              </div>
            </li>
            <li class="list-group-item px-0 py-2">
              <div class="media align-items-center">
                <div class="badge badge-yellow w-40px h-40 d-flex align-items-center justify-content-center fs-18 mr-3">
                  <svg class="icon icon-review">
                    <use xlink:href="#icon-review"></use>
                  </svg>
                </div>
                <div class="media-body">
                  Dollie Horton left a review on
                  <a href="#" class="text-heading"> Villa
                    Called Archangel</a>
                </div>
              </div>
            </li>
          </ul>
          <a class="text-heading d-block text-center mt-4"
           role="button">
            View more
            <span class="text-primary d-inline-block ml-2"><i class="fal fa-angle-down"></i></span>
          </a>
        </div>
      </div>
    </div>
  </div>