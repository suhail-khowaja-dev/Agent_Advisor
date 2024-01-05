@extends('layouts.simple.master')
@section('title', 'Project List')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/datatables.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/owlcarousel.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/rating.css') }}">
@endsection

@section('style')
@endsection

@section('breadcrumb-title')
    <h3>Configration</h3>
@endsection

@section('breadcrumb-items')
    <li class="breadcrumb-item">Configration</li>
    <li class="breadcrumb-item active"> links</li>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <!-- Individual column searching (text inputs) Starts-->
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">

                        <div class="row">
                            <div class="col-md-8">
                                <h5>Email Settings</h5>
                            </div>
                            <div class="col-md-4" align="right">
                                <a class="btn btn-primary" href="{{ route('congfigrationCreate') }}"> <i
                                        data-feather="plus-square"> </i> Create</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive product-table">
                            <table class="display" id="basic-1">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Type</th>
                                        <th>Email</th>
                                        {{-- <th>Email: 02</th>
                                        <th>Email: 03</th>
                                        <th>Contact</th>
                                        <th>Copyright</th> --}}
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($getCMS as $key => $value)
                                        <tr>
                                            <td>{{ $key+1}}</td>
                                            <td>{{ $value->email_type }}</td>
                                            <td>{{ $value->email_one }}</td>
                                            {{-- <td>{{ $value->email_two }}</td>
                                            <td>{{ $value->email_three }}</td>
                                            <td>{{ $value->contact }}</td>
                                            <td>{{ $value->copyright }}</td> --}}
                                            <td>
                                                <button class="btn btn-danger btn-xs" type="button" data-original-title="btn btn-danger btn-xs" title=""><a  href="{{ route('congfigrationdestroy', $value->id) }}" id="delete">Delete</a></button>
                                                <button class="btn btn-success btn-xs" type="button" data-original-title="btn btn-danger btn-xs" title=""> <a href="{{ route('congfigrationEdit', $value->id) }}">Edit</a></button>
                                             </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Individual column searching (text inputs) Ends-->
        </div>
        {{-- <div class="row project-cards">
               <div class="col-md-12 project-list">
                  <div class="card">
                     <div class="row">
                        <div class="col-md-6">
                           <ul class="nav nav-tabs border-tab" id="top-tab" role="tablist">
                              <li class="nav-item"><a class="nav-link active" id="top-home-tab" data-bs-toggle="tab" href="#top-home" role="tab" aria-controls="top-home" aria-selected="true"><i data-feather="target"></i>All</a></li>
                              <li class="nav-item"><a class="nav-link" id="profile-top-tab" data-bs-toggle="tab" href="#top-profile" role="tab" aria-controls="top-profile" aria-selected="false"><i data-feather="info"></i>Doing</a></li>
                              <li class="nav-item"><a class="nav-link" id="contact-top-tab" data-bs-toggle="tab" href="#top-contact" role="tab" aria-controls="top-contact" aria-selected="false"><i data-feather="check-circle"></i>Done</a></li>
                           </ul>
                        </div>
                        <div class="col-md-6">
                           <div class="form-group mb-0 me-0"></div>
                           <a class="btn btn-primary" href="{{ route('projectcreate') }}"> <i data-feather="plus-square"> </i>Create New Project</a>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="col-sm-12">
                  <div class="card">
                     <div class="card-body">
                        <div class="tab-content" id="top-tabContent">
                           <div class="tab-pane fade show active" id="top-home" role="tabpanel" aria-labelledby="top-home-tab">
                              <div class="row">
                                 <div class="col-xxl-4 col-lg-6">
                                    <div class="project-box">
                                       <span class="badge badge-primary">Doing</span>
                                       <h6>Endless admin Design</h6>
                                       <div class="media">
                                          <img class="img-20 me-1 rounded-circle" src="{{asset('assets/images/user/3.jpg')}}" alt="" data-original-title="" title="">
                                          <div class="media-body">
                                             <p>Themeforest, australia</p>
                                          </div>
                                       </div>
                                       <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                                       <div class="row details">
                                          <div class="col-6"><span>Issues </span></div>
                                          <div class="col-6 text-primary">12 </div>
                                          <div class="col-6"> <span>Resolved</span></div>
                                          <div class="col-6 text-primary">5</div>
                                          <div class="col-6"> <span>Comment</span></div>
                                          <div class="col-6 text-primary">7</div>
                                       </div>
                                       <div class="customers">
                                          <ul>
                                             <li class="d-inline-block"><img class="img-30 rounded-circle" src="{{asset('assets/images/user/3.jpg')}}" alt="" data-original-title="" title=""></li>
                                             <li class="d-inline-block"><img class="img-30 rounded-circle" src="{{asset('assets/images/user/5.jpg')}}" alt="" data-original-title="" title=""></li>
                                             <li class="d-inline-block"><img class="img-30 rounded-circle" src="{{asset('assets/images/user/1.jpg')}}" alt="" data-original-title="" title=""></li>
                                             <li class="d-inline-block ms-2">
                                                <p class="f-12">+10 More</p>
                                             </li>
                                          </ul>
                                       </div>
                                       <div class="project-status mt-4">
                                          <div class="media mb-0">
                                             <p>70% </p>
                                             <div class="media-body text-end"><span>Done</span></div>
                                          </div>
                                          <div class="progress" style="height: 5px">
                                             <div class="progress-bar-animated bg-primary progress-bar-striped" role="progressbar" style="width: 70%" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="col-xxl-4 col-lg-6">
                                    <div class="project-box">
                                       <span class="badge badge-success">Done</span>
                                       <h6>Universal admin Design</h6>
                                       <div class="media">
                                          <img class="img-20 me-1 rounded-circle" src="{{asset('assets/images/user/3.jpg')}}" alt="" data-original-title="" title="">
                                          <div class="media-body">
                                             <p>Envato, australia</p>
                                          </div>
                                       </div>
                                       <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                                       <div class="row details">
                                          <div class="col-6"><span>Issues </span></div>
                                          <div class="col-6 text-success">24</div>
                                          <div class="col-6"> <span>Resolved</span></div>
                                          <div class="col-6 text-success">24</div>
                                          <div class="col-6"> <span>Comment</span></div>
                                          <div class="col-6 text-success">40</div>
                                       </div>
                                       <div class="customers">
                                          <ul>
                                             <li class="d-inline-block"><img class="img-30 rounded-circle" src="{{asset('assets/images/user/3.jpg')}}" alt="" data-original-title="" title=""></li>
                                             <li class="d-inline-block"><img class="img-30 rounded-circle" src="{{asset('assets/images/user/5.jpg')}}" alt="" data-original-title="" title=""></li>
                                             <li class="d-inline-block"><img class="img-30 rounded-circle" src="{{asset('assets/images/user/1.jpg')}}" alt="" data-original-title="" title=""></li>
                                             <li class="d-inline-block ms-2">
                                                <p class="f-12">+3 More</p>
                                             </li>
                                          </ul>
                                       </div>
                                       <div class="project-status mt-4">
                                          <div class="media mb-0">
                                             <p>100% </p>
                                             <div class="media-body text-end"><span>Done</span></div>
                                          </div>
                                          <div class="progress" style="height: 5px">
                                             <div class="progress-bar-animated bg-success" role="progressbar" style="width: 100%" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="col-xxl-4 col-lg-6">
                                    <div class="project-box">
                                       <span class="badge badge-success">Done</span>
                                       <h6>Poco admin Design</h6>
                                       <div class="media">
                                          <img class="img-20 me-1 rounded-circle" src="{{asset('assets/images/user/3.jpg')}}" alt="" data-original-title="" title="">
                                          <div class="media-body">
                                             <p>Envato, australia</p>
                                          </div>
                                       </div>
                                       <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                                       <div class="row details">
                                          <div class="col-6"><span>Issues </span></div>
                                          <div class="col-6 text-success">40</div>
                                          <div class="col-6"> <span>Resolved</span></div>
                                          <div class="col-6 text-success">40</div>
                                          <div class="col-6"> <span>Comment</span></div>
                                          <div class="col-6 text-success">20</div>
                                       </div>
                                       <div class="customers">
                                          <ul>
                                             <li class="d-inline-block"><img class="img-30 rounded-circle" src="{{asset('assets/images/user/3.jpg')}}" alt="" data-original-title="" title=""></li>
                                             <li class="d-inline-block"><img class="img-30 rounded-circle" src="{{asset('assets/images/user/5.jpg')}}" alt="" data-original-title="" title=""></li>
                                             <li class="d-inline-block"><img class="img-30 rounded-circle" src="{{asset('assets/images/user/1.jpg')}}" alt="" data-original-title="" title=""></li>
                                             <li class="d-inline-block ms-2">
                                                <p class="f-12">+2 More</p>
                                             </li>
                                          </ul>
                                       </div>
                                       <div class="project-status mt-4">
                                          <div class="media mb-0">
                                             <p>100% </p>
                                             <div class="media-body text-end"><span>Done</span></div>
                                          </div>
                                          <div class="progress" style="height: 5px">
                                             <div class="progress-bar-animated bg-success" role="progressbar" style="width: 100%" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="col-xxl-4 col-lg-6">
                                    <div class="project-box">
                                       <span class="badge badge-success">Done</span>
                                       <h6>Universal admin Design</h6>
                                       <div class="media">
                                          <img class="img-20 me-1 rounded-circle" src="{{asset('assets/images/user/3.jpg')}}" alt="" data-original-title="" title="">
                                          <div class="media-body">
                                             <p>Envato, australia</p>
                                          </div>
                                       </div>
                                       <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                                       <div class="row details">
                                          <div class="col-6"><span>Issues </span></div>
                                          <div class="col-6 text-success">24</div>
                                          <div class="col-6"> <span>Resolved</span></div>
                                          <div class="col-6 text-success">24</div>
                                          <div class="col-6"> <span>Comment</span></div>
                                          <div class="col-6 text-success">40</div>
                                       </div>
                                       <div class="customers">
                                          <ul>
                                             <li class="d-inline-block"><img class="img-30 rounded-circle" src="{{asset('assets/images/user/3.jpg')}}" alt="" data-original-title="" title=""></li>
                                             <li class="d-inline-block"><img class="img-30 rounded-circle" src="{{asset('assets/images/user/5.jpg')}}" alt="" data-original-title="" title=""></li>
                                             <li class="d-inline-block"><img class="img-30 rounded-circle" src="{{asset('assets/images/user/1.jpg')}}" alt="" data-original-title="" title=""></li>
                                             <li class="d-inline-block ms-2">
                                                <p class="f-12">+3 More</p>
                                             </li>
                                          </ul>
                                       </div>
                                       <div class="project-status mt-4">
                                          <div class="media mb-0">
                                             <p>100% </p>
                                             <div class="media-body text-end"><span>Done</span></div>
                                          </div>
                                          <div class="progress" style="height: 5px">
                                             <div class="progress-bar-animated bg-success" role="progressbar" style="width: 100%" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="col-xxl-4 col-lg-6">
                                    <div class="project-box">
                                       <span class="badge badge-primary">Doing</span>
                                       <h6>Endless admin Design</h6>
                                       <div class="media">
                                          <img class="img-20 me-1 rounded-circle" src="{{asset('assets/images/user/3.jpg')}}" alt="" data-original-title="" title="">
                                          <div class="media-body">
                                             <p>Themeforest, australia</p>
                                          </div>
                                       </div>
                                       <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                                       <div class="row details">
                                          <div class="col-6"><span>Issues </span></div>
                                          <div class="col-6 text-primary">12 </div>
                                          <div class="col-6"> <span>Resolved</span></div>
                                          <div class="col-6 text-primary">5</div>
                                          <div class="col-6"> <span>Comment</span></div>
                                          <div class="col-6 text-primary">7</div>
                                       </div>
                                       <div class="customers">
                                          <ul>
                                             <li class="d-inline-block"><img class="img-30 rounded-circle" src="{{asset('assets/images/user/3.jpg')}}" alt="" data-original-title="" title=""></li>
                                             <li class="d-inline-block"><img class="img-30 rounded-circle" src="{{asset('assets/images/user/5.jpg')}}" alt="" data-original-title="" title=""></li>
                                             <li class="d-inline-block"><img class="img-30 rounded-circle" src="{{asset('assets/images/user/1.jpg')}}" alt="" data-original-title="" title=""></li>
                                             <li class="d-inline-block ms-2">
                                                <p class="f-12">+10 More</p>
                                             </li>
                                          </ul>
                                       </div>
                                       <div class="project-status mt-4">
                                          <div class="media mb-0">
                                             <p>70% </p>
                                             <div class="media-body text-end"><span>Done</span></div>
                                          </div>
                                          <div class="progress" style="height: 5px">
                                             <div class="progress-bar-animated bg-primary progress-bar-striped" role="progressbar" style="width: 70%" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="col-xxl-4 col-lg-6">
                                    <div class="project-box">
                                       <span class="badge badge-success">Done</span>
                                       <h6>Poco admin Design</h6>
                                       <div class="media">
                                          <img class="img-20 me-1 rounded-circle" src="{{asset('assets/images/user/3.jpg')}}" alt="" data-original-title="" title="">
                                          <div class="media-body">
                                             <p>Envato, australia</p>
                                          </div>
                                       </div>
                                       <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                                       <div class="row details">
                                          <div class="col-6"><span>Issues </span></div>
                                          <div class="col-6 text-success">40</div>
                                          <div class="col-6"> <span>Resolved</span></div>
                                          <div class="col-6 text-success">40</div>
                                          <div class="col-6"> <span>Comment</span></div>
                                          <div class="col-6 text-success">20</div>
                                       </div>
                                       <div class="customers">
                                          <ul>
                                             <li class="d-inline-block"><img class="img-30 rounded-circle" src="{{asset('assets/images/user/3.jpg')}}" alt="" data-original-title="" title=""></li>
                                             <li class="d-inline-block"><img class="img-30 rounded-circle" src="{{asset('assets/images/user/5.jpg')}}" alt="" data-original-title="" title=""></li>
                                             <li class="d-inline-block"><img class="img-30 rounded-circle" src="{{asset('assets/images/user/1.jpg')}}" alt="" data-original-title="" title=""></li>
                                             <li class="d-inline-block ms-2">
                                                <p class="f-12">+2 More</p>
                                             </li>
                                          </ul>
                                       </div>
                                       <div class="project-status mt-4">
                                          <div class="media mb-0">
                                             <p>100% </p>
                                             <div class="media-body text-end"><span>Done</span></div>
                                          </div>
                                          <div class="progress" style="height: 5px">
                                             <div class="progress-bar-animated bg-success" role="progressbar" style="width: 100%" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="tab-pane fade" id="top-profile" role="tabpanel" aria-labelledby="profile-top-tab">
                              <div class="row">
                                 <div class="col-xxl-4 col-lg-6">
                                    <div class="project-box">
                                       <span class="badge badge-primary">Doing</span>
                                       <h6>Endless admin Design</h6>
                                       <div class="media">
                                          <img class="img-20 me-1 rounded-circle" src="{{asset('assets/images/user/3.jpg')}}" alt="" data-original-title="" title="">
                                          <div class="media-body">
                                             <p>Themeforest, australia</p>
                                          </div>
                                       </div>
                                       <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                                       <div class="row details">
                                          <div class="col-6"><span>Issues </span></div>
                                          <div class="col-6 text-primary">12 </div>
                                          <div class="col-6"> <span>Resolved</span></div>
                                          <div class="col-6 text-primary">5</div>
                                          <div class="col-6"> <span>Comment</span></div>
                                          <div class="col-6 text-primary">7</div>
                                       </div>
                                       <div class="customers">
                                          <ul>
                                             <li class="d-inline-block"><img class="img-30 rounded-circle" src="{{asset('assets/images/user/3.jpg')}}" alt="" data-original-title="" title=""></li>
                                             <li class="d-inline-block"><img class="img-30 rounded-circle" src="{{asset('assets/images/user/5.jpg')}}" alt="" data-original-title="" title=""></li>
                                             <li class="d-inline-block"><img class="img-30 rounded-circle" src="{{asset('assets/images/user/1.jpg')}}" alt="" data-original-title="" title=""></li>
                                             <li class="d-inline-block ms-2">
                                                <p class="f-12">+10 More</p>
                                             </li>
                                          </ul>
                                       </div>
                                       <div class="project-status mt-4">
                                          <div class="media mb-0">
                                             <p>70% </p>
                                             <div class="media-body text-end"><span>Done</span></div>
                                          </div>
                                          <div class="progress" style="height: 5px">
                                             <div class="progress-bar-animated bg-primary progress-bar-striped" role="progressbar" style="width: 70%" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="col-xxl-4 col-lg-6">
                                    <div class="project-box">
                                       <span class="badge badge-primary">Doing</span>
                                       <h6>Universal admin Design</h6>
                                       <div class="media">
                                          <img class="img-20 me-1 rounded-circle" src="{{asset('assets/images/user/3.jpg')}}" alt="" data-original-title="" title="">
                                          <div class="media-body">
                                             <p>Envato, australia</p>
                                          </div>
                                       </div>
                                       <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                                       <div class="row details">
                                          <div class="col-6"><span>Issues </span></div>
                                          <div class="col-6 text-primary">24</div>
                                          <div class="col-6"> <span>Resolved</span></div>
                                          <div class="col-6 text-primary">24</div>
                                          <div class="col-6"> <span>Comment</span></div>
                                          <div class="col-6 text-primary">40</div>
                                       </div>
                                       <div class="customers">
                                          <ul>
                                             <li class="d-inline-block"><img class="img-30 rounded-circle" src="{{asset('assets/images/user/3.jpg')}}" alt="" data-original-title="" title=""></li>
                                             <li class="d-inline-block"><img class="img-30 rounded-circle" src="{{asset('assets/images/user/5.jpg')}}" alt="" data-original-title="" title=""></li>
                                             <li class="d-inline-block"><img class="img-30 rounded-circle" src="{{asset('assets/images/user/1.jpg')}}" alt="" data-original-title="" title=""></li>
                                             <li class="d-inline-block ms-2">
                                                <p class="f-12">+3 More</p>
                                             </li>
                                          </ul>
                                       </div>
                                       <div class="project-status mt-4">
                                          <div class="media mb-0">
                                             <p>100% </p>
                                             <div class="media-body text-end"><span>Done</span></div>
                                          </div>
                                          <div class="progress" style="height: 5px">
                                             <div class="progress-bar-animated bg-primary" role="progressbar" style="width: 100%" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="col-xxl-4 col-lg-6">
                                    <div class="project-box">
                                       <span class="badge badge-primary">Doing</span>
                                       <h6>Poco admin Design</h6>
                                       <div class="media">
                                          <img class="img-20 me-1 rounded-circle" src="{{asset('assets/images/user/3.jpg')}}" alt="" data-original-title="" title="">
                                          <div class="media-body">
                                             <p>Envato, australia</p>
                                          </div>
                                       </div>
                                       <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                                       <div class="row details">
                                          <div class="col-6"><span>Issues </span></div>
                                          <div class="col-6 text-primary">40</div>
                                          <div class="col-6"> <span>Resolved</span></div>
                                          <div class="col-6 text-primary">40</div>
                                          <div class="col-6"> <span>Comment</span></div>
                                          <div class="col-6 text-primary">20</div>
                                       </div>
                                       <div class="customers">
                                          <ul>
                                             <li class="d-inline-block"><img class="img-30 rounded-circle" src="{{asset('assets/images/user/3.jpg')}}" alt="" data-original-title="" title=""></li>
                                             <li class="d-inline-block"><img class="img-30 rounded-circle" src="{{asset('assets/images/user/5.jpg')}}" alt="" data-original-title="" title=""></li>
                                             <li class="d-inline-block"><img class="img-30 rounded-circle" src="{{asset('assets/images/user/1.jpg')}}" alt="" data-original-title="" title=""></li>
                                             <li class="d-inline-block ms-2">
                                                <p class="f-12">+2 More</p>
                                             </li>
                                          </ul>
                                       </div>
                                       <div class="project-status mt-4">
                                          <div class="media mb-0">
                                             <p>100% </p>
                                             <div class="media-body text-end"><span>Done</span></div>
                                          </div>
                                          <div class="progress" style="height: 5px">
                                             <div class="progress-bar-animated bg-primary" role="progressbar" style="width: 100%" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="col-xxl-4 col-lg-6">
                                    <div class="project-box">
                                       <span class="badge badge-primary">Doing</span>
                                       <h6>Universal admin Design</h6>
                                       <div class="media">
                                          <img class="img-20 me-1 rounded-circle" src="{{asset('assets/images/user/3.jpg')}}" alt="" data-original-title="" title="">
                                          <div class="media-body">
                                             <p>Envato, australia</p>
                                          </div>
                                       </div>
                                       <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                                       <div class="row details">
                                          <div class="col-6"><span>Issues </span></div>
                                          <div class="col-6 text-primary">24</div>
                                          <div class="col-6"> <span>Resolved</span></div>
                                          <div class="col-6 text-primary">24</div>
                                          <div class="col-6"> <span>Comment</span></div>
                                          <div class="col-6 text-primary">40</div>
                                       </div>
                                       <div class="customers">
                                          <ul>
                                             <li class="d-inline-block"><img class="img-30 rounded-circle" src="{{asset('assets/images/user/3.jpg')}}" alt="" data-original-title="" title=""></li>
                                             <li class="d-inline-block"><img class="img-30 rounded-circle" src="{{asset('assets/images/user/5.jpg')}}" alt="" data-original-title="" title=""></li>
                                             <li class="d-inline-block"><img class="img-30 rounded-circle" src="{{asset('assets/images/user/1.jpg')}}" alt="" data-original-title="" title=""></li>
                                             <li class="d-inline-block ms-2">
                                                <p class="f-12">+3 More</p>
                                             </li>
                                          </ul>
                                       </div>
                                       <div class="project-status mt-4">
                                          <div class="media mb-0">
                                             <p>100% </p>
                                             <div class="media-body text-end"><span>Done</span></div>
                                          </div>
                                          <div class="progress" style="height: 5px">
                                             <div class="progress-bar-animated bg-primary" role="progressbar" style="width: 100%" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="col-xxl-4 col-lg-6">
                                    <div class="project-box">
                                       <span class="badge badge-primary">Doing</span>
                                       <h6>Endless admin Design</h6>
                                       <div class="media">
                                          <img class="img-20 me-1 rounded-circle" src="{{asset('assets/images/user/3.jpg')}}" alt="" data-original-title="" title="">
                                          <div class="media-body">
                                             <p>Themeforest, australia</p>
                                          </div>
                                       </div>
                                       <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                                       <div class="row details">
                                          <div class="col-6"><span>Issues </span></div>
                                          <div class="col-6 text-primary">12 </div>
                                          <div class="col-6"> <span>Resolved</span></div>
                                          <div class="col-6 text-primary">5</div>
                                          <div class="col-6"> <span>Comment</span></div>
                                          <div class="col-6 text-primary">7</div>
                                       </div>
                                       <div class="customers">
                                          <ul>
                                             <li class="d-inline-block"><img class="img-30 rounded-circle" src="{{asset('assets/images/user/3.jpg')}}" alt="" data-original-title="" title=""></li>
                                             <li class="d-inline-block"><img class="img-30 rounded-circle" src="{{asset('assets/images/user/5.jpg')}}" alt="" data-original-title="" title=""></li>
                                             <li class="d-inline-block"><img class="img-30 rounded-circle" src="{{asset('assets/images/user/1.jpg')}}" alt="" data-original-title="" title=""></li>
                                             <li class="d-inline-block ms-2">
                                                <p class="f-12">+10 More</p>
                                             </li>
                                          </ul>
                                       </div>
                                       <div class="project-status mt-4">
                                          <div class="media mb-0">
                                             <p>70% </p>
                                             <div class="media-body text-end"><span>Done</span></div>
                                          </div>
                                          <div class="progress" style="height: 5px">
                                             <div class="progress-bar-animated bg-primary progress-bar-striped" role="progressbar" style="width: 70%" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="col-xxl-4 col-lg-6">
                                    <div class="project-box">
                                       <span class="badge badge-primary">Doing</span>
                                       <h6>Poco admin Design</h6>
                                       <div class="media">
                                          <img class="img-20 me-1 rounded-circle" src="{{asset('assets/images/user/3.jpg')}}" alt="" data-original-title="" title="">
                                          <div class="media-body">
                                             <p>Envato, australia</p>
                                          </div>
                                       </div>
                                       <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                                       <div class="row details">
                                          <div class="col-6"><span>Issues </span></div>
                                          <div class="col-6 text-primary">40</div>
                                          <div class="col-6"> <span>Resolved</span></div>
                                          <div class="col-6 text-primary">40</div>
                                          <div class="col-6"> <span>Comment</span></div>
                                          <div class="col-6 text-primary">20</div>
                                       </div>
                                       <div class="customers">
                                          <ul>
                                             <li class="d-inline-block"><img class="img-30 rounded-circle" src="{{asset('assets/images/user/3.jpg')}}" alt="" data-original-title="" title=""></li>
                                             <li class="d-inline-block"><img class="img-30 rounded-circle" src="{{asset('assets/images/user/5.jpg')}}" alt="" data-original-title="" title=""></li>
                                             <li class="d-inline-block"><img class="img-30 rounded-circle" src="{{asset('assets/images/user/1.jpg')}}" alt="" data-original-title="" title=""></li>
                                             <li class="d-inline-block ms-2">
                                                <p class="f-12">+2 More</p>
                                             </li>
                                          </ul>
                                       </div>
                                       <div class="project-status mt-4">
                                          <div class="media mb-0">
                                             <p>100% </p>
                                             <div class="media-body text-end"><span>Done</span></div>
                                          </div>
                                          <div class="progress" style="height: 5px">
                                             <div class="progress-bar-animated bg-primary" role="progressbar" style="width: 100%" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="tab-pane fade" id="top-contact" role="tabpanel" aria-labelledby="contact-top-tab">
                              <div class="row">
                                 <div class="col-xxl-4 col-lg-6">
                                    <div class="project-box">
                                       <span class="badge badge-success">Done</span>
                                       <h6>Endless admin Design</h6>
                                       <div class="media">
                                          <img class="img-20 me-1 rounded-circle" src="{{asset('assets/images/user/3.jpg')}}" alt="" data-original-title="" title="">
                                          <div class="media-body">
                                             <p>Themeforest, australia</p>
                                          </div>
                                       </div>
                                       <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                                       <div class="row details">
                                          <div class="col-6"><span>Issues </span></div>
                                          <div class="col-6 text-success">12 </div>
                                          <div class="col-6"> <span>Resolved</span></div>
                                          <div class="col-6 text-success">5</div>
                                          <div class="col-6"> <span>Comment</span></div>
                                          <div class="col-6 text-success">7</div>
                                       </div>
                                       <div class="customers">
                                          <ul>
                                             <li class="d-inline-block"><img class="img-30 rounded-circle" src="{{asset('assets/images/user/3.jpg')}}" alt="" data-original-title="" title=""></li>
                                             <li class="d-inline-block"><img class="img-30 rounded-circle" src="{{asset('assets/images/user/5.jpg')}}" alt="" data-original-title="" title=""></li>
                                             <li class="d-inline-block"><img class="img-30 rounded-circle" src="{{asset('assets/images/user/1.jpg')}}" alt="" data-original-title="" title=""></li>
                                             <li class="d-inline-block ms-2">
                                                <p class="f-12">+10 More</p>
                                             </li>
                                          </ul>
                                       </div>
                                       <div class="project-status mt-4">
                                          <div class="media mb-0">
                                             <p>70% </p>
                                             <div class="media-body text-end"><span>Done</span></div>
                                          </div>
                                          <div class="progress" style="height: 5px">
                                             <div class="progress-bar-animated bg-success progress-bar-striped" role="progressbar" style="width: 70%" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="col-xxl-4 col-lg-6">
                                    <div class="project-box">
                                       <span class="badge badge-success">Done</span>
                                       <h6>Universal admin Design</h6>
                                       <div class="media">
                                          <img class="img-20 me-1 rounded-circle" src="{{asset('assets/images/user/3.jpg')}}" alt="" data-original-title="" title="">
                                          <div class="media-body">
                                             <p>Envato, australia</p>
                                          </div>
                                       </div>
                                       <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                                       <div class="row details">
                                          <div class="col-6"><span>Issues </span></div>
                                          <div class="col-6 text-success">24</div>
                                          <div class="col-6"> <span>Resolved</span></div>
                                          <div class="col-6 text-success">24</div>
                                          <div class="col-6"> <span>Comment</span></div>
                                          <div class="col-6 text-success">40</div>
                                       </div>
                                       <div class="customers">
                                          <ul>
                                             <li class="d-inline-block"><img class="img-30 rounded-circle" src="{{asset('assets/images/user/3.jpg')}}" alt="" data-original-title="" title=""></li>
                                             <li class="d-inline-block"><img class="img-30 rounded-circle" src="{{asset('assets/images/user/5.jpg')}}" alt="" data-original-title="" title=""></li>
                                             <li class="d-inline-block"><img class="img-30 rounded-circle" src="{{asset('assets/images/user/1.jpg')}}" alt="" data-original-title="" title=""></li>
                                             <li class="d-inline-block ms-2">
                                                <p class="f-12">+3 More</p>
                                             </li>
                                          </ul>
                                       </div>
                                       <div class="project-status mt-4">
                                          <div class="media mb-0">
                                             <p>100% </p>
                                             <div class="media-body text-end"><span>Done</span></div>
                                          </div>
                                          <div class="progress" style="height: 5px">
                                             <div class="progress-bar-animated bg-success" role="progressbar" style="width: 100%" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="col-xxl-4 col-lg-6">
                                    <div class="project-box">
                                       <span class="badge badge-success">Done</span>
                                       <h6>Poco admin Design</h6>
                                       <div class="media">
                                          <img class="img-20 me-1 rounded-circle" src="{{asset('assets/images/user/3.jpg')}}" alt="" data-original-title="" title="">
                                          <div class="media-body">
                                             <p>Envato, australia</p>
                                          </div>
                                       </div>
                                       <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                                       <div class="row details">
                                          <div class="col-6"><span>Issues </span></div>
                                          <div class="col-6 text-success">40</div>
                                          <div class="col-6"> <span>Resolved</span></div>
                                          <div class="col-6 text-success">40</div>
                                          <div class="col-6"> <span>Comment</span></div>
                                          <div class="col-6 text-success">20</div>
                                       </div>
                                       <div class="customers">
                                          <ul>
                                             <li class="d-inline-block"><img class="img-30 rounded-circle" src="{{asset('assets/images/user/3.jpg')}}" alt="" data-original-title="" title=""></li>
                                             <li class="d-inline-block"><img class="img-30 rounded-circle" src="{{asset('assets/images/user/5.jpg')}}" alt="" data-original-title="" title=""></li>
                                             <li class="d-inline-block"><img class="img-30 rounded-circle" src="{{asset('assets/images/user/1.jpg')}}" alt="" data-original-title="" title=""></li>
                                             <li class="d-inline-block ms-2">
                                                <p class="f-12">+2 More</p>
                                             </li>
                                          </ul>
                                       </div>
                                       <div class="project-status mt-4">
                                          <div class="media mb-0">
                                             <p>100% </p>
                                             <div class="media-body text-end"><span>Done</span></div>
                                          </div>
                                          <div class="progress" style="height: 5px">
                                             <div class="progress-bar-animated bg-success" role="progressbar" style="width: 100%" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="col-xxl-4 col-lg-6">
                                    <div class="project-box">
                                       <span class="badge badge-success">Done</span>
                                       <h6>Universal admin Design</h6>
                                       <div class="media">
                                          <img class="img-20 me-1 rounded-circle" src="{{asset('assets/images/user/3.jpg')}}" alt="" data-original-title="" title="">
                                          <div class="media-body">
                                             <p>Envato, australia</p>
                                          </div>
                                       </div>
                                       <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                                       <div class="row details">
                                          <div class="col-6"><span>Issues </span></div>
                                          <div class="col-6 text-success">24</div>
                                          <div class="col-6"> <span>Resolved</span></div>
                                          <div class="col-6 text-success">24</div>
                                          <div class="col-6"> <span>Comment</span></div>
                                          <div class="col-6 text-success">40</div>
                                       </div>
                                       <div class="customers">
                                          <ul>
                                             <li class="d-inline-block"><img class="img-30 rounded-circle" src="{{asset('assets/images/user/3.jpg')}}" alt="" data-original-title="" title=""></li>
                                             <li class="d-inline-block"><img class="img-30 rounded-circle" src="{{asset('assets/images/user/5.jpg')}}" alt="" data-original-title="" title=""></li>
                                             <li class="d-inline-block"><img class="img-30 rounded-circle" src="{{asset('assets/images/user/1.jpg')}}" alt="" data-original-title="" title=""></li>
                                             <li class="d-inline-block ms-2">
                                                <p class="f-12">+3 More</p>
                                             </li>
                                          </ul>
                                       </div>
                                       <div class="project-status mt-4">
                                          <div class="media mb-0">
                                             <p>100% </p>
                                             <div class="media-body text-end"><span>Done</span></div>
                                          </div>
                                          <div class="progress" style="height: 5px">
                                             <div class="progress-bar-animated bg-success" role="progressbar" style="width: 100%" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="col-xxl-4 col-lg-6">
                                    <div class="project-box">
                                       <span class="badge badge-primary">Done</span>
                                       <h6>Endless admin Design</h6>
                                       <div class="media">
                                          <img class="img-20 me-1 rounded-circle" src="{{asset('assets/images/user/3.jpg')}}" alt="" data-original-title="" title="">
                                          <div class="media-body">
                                             <p>Themeforest, australia</p>
                                          </div>
                                       </div>
                                       <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                                       <div class="row details">
                                          <div class="col-6"><span>Issues </span></div>
                                          <div class="col-6 text-success">12 </div>
                                          <div class="col-6"> <span>Resolved</span></div>
                                          <div class="col-6 text-success">5</div>
                                          <div class="col-6"> <span>Comment</span></div>
                                          <div class="col-6 text-success">7</div>
                                       </div>
                                       <div class="customers">
                                          <ul>
                                             <li class="d-inline-block"><img class="img-30 rounded-circle" src="{{asset('assets/images/user/3.jpg')}}" alt="" data-original-title="" title=""></li>
                                             <li class="d-inline-block"><img class="img-30 rounded-circle" src="{{asset('assets/images/user/5.jpg')}}" alt="" data-original-title="" title=""></li>
                                             <li class="d-inline-block"><img class="img-30 rounded-circle" src="{{asset('assets/images/user/1.jpg')}}" alt="" data-original-title="" title=""></li>
                                             <li class="d-inline-block ms-2">
                                                <p class="f-12">+10 More</p>
                                             </li>
                                          </ul>
                                       </div>
                                       <div class="project-status mt-4">
                                          <div class="media mb-0">
                                             <p>70% </p>
                                             <div class="media-body text-end"><span>Done</span></div>
                                          </div>
                                          <div class="progress" style="height: 5px">
                                             <div class="progress-bar-animated bg-success progress-bar-striped" role="progressbar" style="width: 70%" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="col-xxl-4 col-lg-6">
                                    <div class="project-box">
                                       <span class="badge badge-success">Done</span>
                                       <h6>Poco admin Design</h6>
                                       <div class="media">
                                          <img class="img-20 me-1 rounded-circle" src="{{asset('assets/images/user/3.jpg')}}" alt="" data-original-title="" title="">
                                          <div class="media-body">
                                             <p>Envato, australia</p>
                                          </div>
                                       </div>
                                       <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                                       <div class="row details">
                                          <div class="col-6"><span>Issues </span></div>
                                          <div class="col-6 text-success">40</div>
                                          <div class="col-6"> <span>Resolved</span></div>
                                          <div class="col-6 text-success">40</div>
                                          <div class="col-6"> <span>Comment</span></div>
                                          <div class="col-6 text-success">20</div>
                                       </div>
                                       <div class="customers">
                                          <ul>
                                             <li class="d-inline-block"><img class="img-30 rounded-circle" src="{{asset('assets/images/user/3.jpg')}}" alt="" data-original-title="" title=""></li>
                                             <li class="d-inline-block"><img class="img-30 rounded-circle" src="{{asset('assets/images/user/5.jpg')}}" alt="" data-original-title="" title=""></li>
                                             <li class="d-inline-block"><img class="img-30 rounded-circle" src="{{asset('assets/images/user/1.jpg')}}" alt="" data-original-title="" title=""></li>
                                             <li class="d-inline-block ms-2">
                                                <p class="f-12">+2 More</p>
                                             </li>
                                          </ul>
                                       </div>
                                       <div class="project-status mt-4">
                                          <div class="media mb-0">
                                             <p>100% </p>
                                             <div class="media-body text-end"><span>Done</span></div>
                                          </div>
                                          <div class="progress" style="height: 5px">
                                             <div class="progress-bar-animated bg-success" role="progressbar" style="width: 100%" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
   </div> --}}
    </div>
@endsection

@section('script')
    <script src="{{ asset('assets/js/datatable/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/js/rating/jquery.barrating.js') }}"></script>
    <script src="{{ asset('assets/js/rating/rating-script.js') }}"></script>
    <script src="{{ asset('assets/js/owlcarousel/owl.carousel.js') }}"></script>
    <script src="{{ asset('assets/js/ecommerce.js') }}"></script>
    <script src="{{ asset('assets/js/product-list-custom.js') }}"></script>
@endsection
