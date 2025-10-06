@include('admin.partials.__header')
@include('admin.partials.__nav')

<main id="main" class="main">

    <div class="pagetitle">
        <h1>Settings</h1>
    </div><!-- End Page Title -->

    <section class="section settings">
        <div class="card">
            
            <div class="card-body p-3">
                <div class="row">
                    <!-- Vertical tab navigation -->
                    <div class="col-md-3 border-end">
                        <div class="nav flex-column nav-pills" id="settings-tab" role="tablist"
                            aria-orientation="vertical">
                            <button class="nav-link active" id="frontpage-tab" data-bs-toggle="pill"
                                data-bs-target="#frontpage" type="button" role="tab" aria-controls="frontpage"
                                aria-selected="true">
                               Digital Fashion Hub
                            </button>
                            {{-- <button class="nav-link" id="mission-vision-tab" data-bs-toggle="pill"
                                data-bs-target="#mission-vision" type="button" role="tab" aria-controls="mission-vision"
                                aria-selected="false">
                                Mission and Vision
                            </button> --}}
                            <button class="nav-link" id="changepassword-tab" data-bs-toggle="pill"
                                data-bs-target="#changepassword" type="button" role="tab" aria-controls="changepassword"
                                aria-selected="false">
                                Change Password
                            </button>
                        </div>
                    </div>

                    <!-- Tab content -->
                    <div class="col-md-9">
                        <div class="tab-content" id="settings-tabContent">
                            <div class="tab-pane fade show active" id="frontpage" role="tabpanel"
                                aria-labelledby="frontpage-tab">
                                @include('admin.pages.settings.frontpage')
                            </div>
                            <div class="tab-pane fade" id="mission-vision" role="tabpanel"
                                aria-labelledby="mission-vision-tab">
                                @include('admin.pages.settings.mission-vision')
                            </div>
                            <div class="tab-pane fade" id="changepassword" role="tabpanel"
                                aria-labelledby="changepassword-tab">
                                @include('admin.pages.settings.changepassword')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>



</main>

@include('admin.partials.__footer')