@include('dashboard.components.header')
<x-master>
    <x-slot name="bread_index">
        <h4 class="page-title">Klanten</h4>
        <div class="breadcrumb-list">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{('index.html')}}">Home</a></li>
                <li class="breadcrumb-item"><a href="#">TheMindOffice</a></li>
                <li class="breadcrumb-item active" aria-current="page">Klanten</li>
            </ol>
        </div>
    </x-slot>

    <x-slot name="klanten_aanmaken">
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary-rgba" data-toggle="modal" data-target="#exampleModalCenter"><i class="feather icon-plus mr-2"></i>Nieuwe Klanten</button>
        <!-- Modal -->
        <div class="modal fade text-left" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalCenterTitle">Create New klant</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    {{-- Create form--}}
                    @include('dashboard.klant.create.form')
                    {{-- End create form--}}
                </div>
            </div>
        </div>
    </x-slot>

    <x-slot name="show_klanten">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-borderless">
                    <thead>
                    <tr>
                        @include('dashboard.components.formattribute')
                        {{-- <th>Actions</th>--}}
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($modifiedClients as $client)
                        @php
                            $colorClass = 'bg-' . ['primary', 'success'][$loop->iteration % 2] . '-transparent';
                        @endphp
                        <tr class="{{ $colorClass }}" {{ $client->id }}">
                        @foreach($client->getAttributes() as $fieldName => $fieldValue)

                            @if (!in_array($fieldName, ['created_at', 'updated_at', 'id', 'url']))
                                <td>
                                    @if ($fieldName === 'logo')
                                        <img src="{{ asset($fieldValue) }}" alt="Logo" style="width: {{ $width }}px; height: {{ $height }}px;">
                                    @elseif ($fieldName === 'collect_email' || $fieldName === 'consent_for_questions')
                                        {{ $fieldValue ? 'Yes' : 'No' }}
                                    @else
                                        {{ $fieldValue }}
                                    @endif
                                </td>
                            @endif
                        @endforeach

                        <td>
                            <div class="button-list horizontal-home">
                                <div class="button-list-horizontal horizontal-index">
                                    <a href="{{ route('dashboard.edit', ['client' => $client]) }}" class="btn btn-success-rgba">
                                        Edit <i class="feather icon-edit-2"></i>
                                    </a>
                                    {{-- Destroy klant--}}
                                    @include('dashboard.klant.delete.destroy')
                                    {{--End destroy--}}
                                </div>
                            </div>
                        </td>
                        </tr>
                    @endforeach

                    </tbody>

                </table>
                <!-- Display Bootstrap pagination links -->
                <nav aria-label="Page navigation example">
                    <ul class="pagination justify-content-center">
                        <li class="page-item {{ $clients->currentPage() == 1 ? 'disabled' : '' }}">
                            <a class="page-link" href="{{ $clients->previousPageUrl() }}" aria-label="Previous">
                                <span aria-hidden="true">&laquo;</span>
                                <span class="sr-only">Previous</span>
                            </a>
                        </li>

                        @for ($i = 1; $i <= $clients->lastPage(); $i++)
                            <li class="page-item {{ $clients->currentPage() == $i ? 'active' : '' }}">
                                <a class="page-link" href="{{ $clients->url($i) }}">{{ $i }}</a>
                            </li>
                        @endfor

                        <li class="page-item {{ $clients->currentPage() == $clients->lastPage() ? 'disabled' : '' }}">
                            <a class="page-link" href="{{ $clients->nextPageUrl() }}" aria-label="Next">
                                <span aria-hidden="true">&raquo;</span>
                                <span class="sr-only">Next</span>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </x-slot>
</x-master>
@include('dashboard.components.footer')
