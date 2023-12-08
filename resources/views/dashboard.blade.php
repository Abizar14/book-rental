@extends('layouts.main')
@section('title', 'Dashboard')

@section('content')

<div class="page-title">
  <h3>Dashboard</h3>
  <p class="breadcrumb-item"><a href={{ route('dashboard') }}>Dashboard</a> / Admin</p>
  
</div>
<section class="section">
  <div class="row mb-2">

      <div class="col-12 col-md-3">
          <div class="card card-statistic">
              <div class="card-body bg-blue p-0">
                  <div class="d-flex flex-column">
                      <div class='px-3 py-3 d-flex justify-content-between'>
                          <h3 class='card-title'>Users</h3>
                          <div class="card-right d-flex align-items-center">
                            <i data-feather="users" width="20" style="color: black; margin-right: 10px; width: 20px; height: 20px;"></i>
                              <p>{{ $user_count }}</p>
                          </div>
                      </div>
                      <div class="chart-wrapper">
                          <canvas id="canvas1" style="height:100px !important"></canvas>
                      </div>
                  </div>
              </div>
          </div>
      </div>
      <div class="col-12 col-md-3">
          <div class="card card-statistic">
              <div class="card-body bg-blue p-0">
                  <div class="d-flex flex-column">
                      <div class='px-3 py-3 d-flex justify-content-between'>
                          <h3 class='card-title'>Books</h3>
                          <div class="card-right d-flex align-items-center">
                            <i data-feather="book" width="20" style="color: black; margin-right: 10px; width: 20px; height: 20px;"></i>
                              <p>{{ $book_count }}</p>
                          </div>
                      </div>
                      <div class="chart-wrapper">
                          <canvas id="canvas2" style="height:100px !important"></canvas>
                      </div>
                  </div>
              </div>
          </div>
      </div>
      <div class="col-12 col-md-3">
          <div class="card card-statistic">
              <div class="card-body bg-blue p-0">
                  <div class="d-flex flex-column">
                      <div class='px-3 py-3 d-flex justify-content-between'>
                          <h3 class='card-title'>Categories</h3>
                          <div class="card-right d-flex align-items-center">
                            <i data-feather="users" width="20" style="color: black; margin-right: 10px; width: 20px; height: 20px;"></i>
                              <p>{{ $categories_count }}</p>
                          </div>
                      </div>
                      <div class="chart-wrapper">
                          <canvas id="canvas3" style="height:100px !important"></canvas>
                      </div>
                  </div>
              </div>
          </div>
      </div>
      <div class="col-12 col-md-3">
          <div class="card card-statistic">
              <div class="card-body p-0">
                  <div class="d-flex flex-column">
                      <div class='px-3 py-3 d-flex justify-content-between'>
                          <h3 class='card-title'>Rent Book</h3>
                          <div class="card-right d-flex align-items-center">
                            <i data-feather="users" width="20" style="color: black; margin-right: 10px; width: 20px; height: 20px;"></i>
                          </div>
                      </div>
                      <div class="chart-wrapper">
                          <canvas id="canvas4" style="height:100px !important"></canvas>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
  <div class="row mb-4">
      <div class="col-md-8">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h4 class="card-title fw-bold">User</h4>
                <div class="d-flex ">
                    <i data-feather="download"></i>
                </div>
            </div>
            <div class="card-body px-0 pb-0">
                <div class="table-responsive">
                    <table class='table mb-0' id="table1">
                        <thead>
                            <tr>
                                <th>Username</th>
                                <th>NIM</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($user as $data)    
                            <tr>
                                <td>{{ $data->username }}</td>
                                <td>{{ $data->nim }}</td>
                                @if($data->status == 'active')
                                <td>
                                    <span class="badge bg-success">{{ $data->status }}</span>
                                </td>
                                @else 
                                <td>
                                    <span class="badge bg-danger">{{ $data->status }}</span>
                                </td>
                                @endif
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="mt-2 float-end">
                        {{ $user->links() }}
                    </div>
                </div>
            </div>
        </div>
          <div class="card">
              <div class="card-header">
                  <h3 class='card-heading p-1 pl-3'>Sales</h3>
              </div>
              <div class="card-body">
                  <div class="row">
                      <div class="col-md-4 col-12">
                          <div class="pl-3">
                              <h1 class='mt-5'>$21,102</h1>
                              <p class='text-xs'><span class="text-green"><i
                                          data-feather="bar-chart" width="15"></i> +19%</span>
                                  than last month</p>
                              <div class="legends">
                                  <div class="legend d-flex flex-row align-items-center">
                                      <div class='w-3 h-3 rounded-full bg-info me-2'></div><span
                                          class='text-xs'>Last Month</span>
                                  </div>
                                  <div class="legend d-flex flex-row align-items-center">
                                      <div class='w-3 h-3 rounded-full bg-blue me-2'></div><span
                                          class='text-xs'>Current Month</span>
                                  </div>
                              </div>
                          </div>
                      </div>
                      <div class="col-md-8 col-12">
                          <canvas id="bar"></canvas>
                      </div>
                  </div>
              </div>
          </div>
          
      </div>
      <div class="col-md-4">
        <div class="card widget-todo">
            <div
                class="card-header border-bottom d-flex justify-content-between align-items-center">
                <h4 class="card-title d-flex">
                    <i class='bx bx-check font-medium-5 pl-25 pr-75'></i>Progress
                </h4>

            </div>
            <div class="card-body px-0 py-1">
                <table class='table table-borderless'>
                    <tr>
                        <td class='col-3'>UI Design</td>
                        <td class='col-6'>
                            <div class="progress progress-info">
                                <div class="progress-bar" role="progressbar" style="width: 60%"
                                    aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">
                                </div>
                            </div>
                        </td>
                        <td class='col-3 text-center'>60%</td>
                    </tr>
                    <tr>
                        <td class='col-3'>VueJS</td>
                        <td class='col-6'>
                            <div class="progress progress-success">
                                <div class="progress-bar" role="progressbar" style="width: 35%"
                                    aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">
                                </div>
                            </div>
                        </td>
                        <td class='col-3 text-center'>30%</td>
                    </tr>
                    <tr>
                        <td class='col-3'>Laravel</td>
                        <td class='col-6'>
                            <div class="progress progress-danger">
                                <div class="progress-bar" role="progressbar" style="width: 50%"
                                    aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">
                                </div>
                            </div>
                        </td>
                        <td class='col-3 text-center'>50%</td>
                    </tr>
                    <tr>
                        <td class='col-3'>ReactJS</td>
                        <td class='col-6'>
                            <div class="progress progress-primary">
                                <div class="progress-bar" role="progressbar" style="width: 80%"
                                    aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">
                                </div>
                            </div>
                        </td>
                        <td class='col-3 text-center'>80%</td>
                    </tr>
                    <tr>
                        <td class='col-3'>Go</td>
                        <td class='col-6'>
                            <div class="progress progress-secondary">
                                <div class="progress-bar" role="progressbar" style="width: 65%"
                                    aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">
                                </div>
                            </div>
                        </td>
                        <td class='col-3 text-center'>65%</td>
                    </tr>
                    <tr>
                        <td class='col-3'>Go</td>
                        <td class='col-6'>
                            <div class="progress progress-secondary">
                                <div class="progress-bar" role="progressbar" style="width: 65%"
                                    aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">
                                </div>
                            </div>
                        </td>
                        <td class='col-3 text-center'>65%</td>
                    </tr>
                    <tr>
                        <td class='col-3'>Go</td>
                        <td class='col-6'>
                            <div class="progress progress-secondary">
                                <div class="progress-bar" role="progressbar" style="width: 65%"
                                    aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">
                                </div>
                            </div>
                        </td>
                        <td class='col-3 text-center'>65%</td>
                    </tr>
                </table>
            </div>
        </div>
          <div class="card ">
              <div class="card-header">
                  <h4>Your Earnings</h4>
              </div>
              <div class="card-body">
                  <div id="radialBars"></div>
                  <div class="text-center mb-5">
                      <h6>From last month</h6>
                      <h1 class='text-green'>+$2,134</h1>
                  </div>
              </div>
          </div>
          
      </div>
  </div>
</section>
@endsection