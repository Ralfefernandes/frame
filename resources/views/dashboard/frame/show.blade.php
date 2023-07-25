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
        <div class="table-responsive">
            <table class="table  table-striped">
                <thead>
                <tr>
                    @foreach($filteredColumns as $columnName)
                        <th class="">{{ $columnName }}</th>
                    @endforeach
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody id="sortable">
                @php
                    $colors = ['table-secondary', 'table-info'];
                @endphp
                @foreach($frames as $index => $frame)
                    @php
                        $color = $colors[$index % 2];
                    @endphp
                    <tr id="frames_{{ $frame->id }}" class="frame-row {{ $color }}">
                        <td class="text-black">{{ $frame->title }}</td>
                        <td class="text-black">{{ $frame->filename }}</td>
                        <td>
                            <img src="{{ asset($frame->photo_url) }}" alt="Frame image" width="100px" height="100px">
                        </td>
                        <td>
                            <a href="{{ route('frames.edit', $frame->id) }}" class="btn btn-success-rgba" data-frameid="{{ $frame->id }}">
                                Edit <i class="feather icon-edit-2"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
                <tr>
                    <td colspan="5">
                        <form id="client-order-form" method="POST">
                            @csrf
                            <input type="hidden" name="order" id="client-sorter-input">
                            <button type="button" id="save-order-btn">Save Order</button>
                        </form>
                    </td>
                </tr>
            </table>
        </div>
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

