@extends('layouts.main')
@section('content')
<div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <x-header-component></x-header-component>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_settings-panel.html -->
      <div class="theme-setting-wrapper">
        <div id="settings-trigger"><i class="ti-settings"></i></div>
        <div id="theme-settings" class="settings-panel">
          <i class="settings-close ti-close"></i>
          <p class="settings-heading">SIDEBAR SKINS</p>
          <div class="sidebar-bg-options selected" id="sidebar-light-theme"><div class="img-ss rounded-circle bg-light border me-3"></div>Light</div>
          <div class="sidebar-bg-options" id="sidebar-dark-theme"><div class="img-ss rounded-circle bg-dark border me-3"></div>Dark</div>
          <p class="settings-heading mt-2">HEADER SKINS</p>
          <div class="color-tiles mx-0 px-4">
            <div class="tiles success"></div>
            <div class="tiles warning"></div>
            <div class="tiles danger"></div>
            <div class="tiles info"></div>
            <div class="tiles dark"></div>
            <div class="tiles default"></div>
          </div>
        </div>
      </div>

      <!-- partial -->
      <!-- partial:partials/_sidebar.html -->
      <x-sidebar-component></x-sidebar-component>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-sm-12">
              <div class="home-tab">
                <div class="d-sm-flex align-items-center justify-content-between border-bottom">
                  <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item">
                      <a class="nav-link active ps-0" id="home-tab" data-bs-toggle="tab" href="#overview" role="tab" aria-controls="overview" aria-selected="true">Overview</a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>

          <section class="sample">
            <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Request a Document</h4>

                    {{-- notification --}}

                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif

                    @if (session()->has('success'))
                    <p class="alert alert-success">{{ session()->get('success') }}</p>
                    @endif

                    {{-- end notification --}}

                    <form action="{{ url('request-document-process') }}" method="POST">
                        <div class="form-group">
                          <label for="exampleInputEmail1">Select a Document</label>
                          <select name="document" id="" class="form-control">
                            @forelse ($documents as $doc)
                                <option value="{{ $doc->id }}">{{ $doc->document }}</option>
                            @empty
                                <option value="" disabled>No Documents</option>
                            @endforelse
                          </select>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Select your Department and Level</label>
                            <select name="departmentlevel" id="" class="form-control">
                                @forelse ($departmentlevels as $dep)
                                    <option value="{{ $dep->id }}">{{ $dep->departmentlevel }}</option>
                                @empty
                                    <option value="" disabled>No Department Levels</option>
                                @endforelse
                            </select>
                          </div>

                          <div class="form-group">
                            <label for="exampleInputEmail1">Phone Number</label>
                            <input type="number" name="phonenumber" id="" class="form-control">
                          </div>

                          <div class="form-group">
                            <label for="exampleInputEmail1">School Year Graduated</label>
                            <select name="schoolyeargraduated" id="" class="form-control">
                              @for ($i = 1990; $i <= date('Y'); $i++)
                                @if ($i == date('Y'))
                                    <option value="{{ $i }}" selected>{{ $i }} (Current Year)</option>
                                @else
                                    <option value="{{ $i }}">{{ $i }}</option>
                                @endif
                              @endfor
                            </select>
                          </div>

                          <div class="form-group">
                            <label for="exampleInputEmail1">Remarks (optional)</label>
                            <textarea name="remarks" class="form-control" id="" style="height: 100px"></textarea>
                          </div>
                        @csrf
                        <button type="submit" class="btn btn-primary">Request Document</button>
                    </form>
                </div>
              </div>
          </section>

        </div>
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->

        <x-footer-component></x-footer-component>
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
@endsection
