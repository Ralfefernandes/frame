<!-- Include the Sortable library -->

<div class="col-md-8 col-lg-8">
    <h4 class="page-title">Frames</h4>
</div>
<div class="card mt-5">
    <div class="card-body">
        <!-- Frame creation button -->
        <button type="button" class="btn btn-primary-rgba float-right" data-toggle="modal" data-target="#createFrameModal">
            <i class="feather icon-plus mr-2"></i>Nieuwe Frame
        </button>

        <!-- Frame table -->
    @include('dashboard.frame.update')

        <!-- End Frame table -->

    </div>
</div>

<!-- Sortable script -->
@include('dashboard.frame.scripts.sort')
<!-- end Sortable script -->
<!-- Frame creation modal -->
@include('dashboard.frame.create')
<!-- End Frame creation modal -->



<!-- trigger create form -->
@include('dashboard.scripts.frame.frame')
<!-- End trigger create form -->

