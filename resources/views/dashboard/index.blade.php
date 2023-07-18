@include('dashboard.components.header')
<x-master>
    <x-slot name="bread_index">
        <h4 class="page-title">Klanten</h4>
        <div class="breadcrumb-list">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
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
                    <div id="clientFormContainer">
                        <div class="modal-body">
                            <form id="client-form" action="{{ route('dashboard.create_client') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="patientname">Naam van de klant</label>
                                        <input type="text" class="form-control" name="name" id="patientname">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="patientadd">Basiskleur van de huisstijl</label>
                                        <input type="text" class="form-control" id="patintadd" name="primary_color">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="patientmonitoredby">Logo Upload</label>
                                        <input type="file" name="logo" class="form-control" id="patientmonitoredby">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="patienttreatment">Secondaire kleur van de huisstijl</label>
                                        <input type="text" class="form-control" id="patienttreatment" name="second_color">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="verzamelen_van_email">Verzamelen van e-mailadressen</label><br>
                                        <input class="form-check-input ml-0" type="radio" name="collect_email" id="verzamelen_van_email_ja" value="1" checked>
                                        <label class="form-check-label m-l-20" for="verzamelen_van_email_ja">
                                            Ja
                                        </label><br>
                                        <input class="form-check-input ml-0" type="radio" name="collect_email" id="verzamelen_van_email_nee" value="0">
                                        <label class="form-check-label m-l-20" for="verzamelen_van_email_nee">
                                            Nee
                                        </label>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="akkord_voor_vragen">Akkoord vragen voor plaatsen</label><br>
                                        <input class="form-check-input ml-0" type="radio" name="consent_for_questions" id="akkord_voor_vragen_ja" value="1" checked>
                                        <label class="form-check-label m-l-20" for="akkord_voor_vragen_ja">
                                            Ja
                                        </label><br>
                                        <input class="form-check-input ml-0" type="radio" name="consent_for_questions" id="akkord_voor_vragen_nee" value="0">
                                        <label class="form-check-label m-l-20" for="akkord_voor_vragen_nee">
                                            Nee
                                        </label>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary"><i class="feather icon-plus mr-2"></i>Nieuwe Klanten</button>
                                </div>
                                <div id="success-message" style="display: none;"></div>
                            </form>
                        </div>
                    </div>
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
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($modifiedClients as $client)
                        <tr>
                            @foreach($client->getAttributes() as $fieldName => $fieldValue)

                                @if (!in_array($fieldName, ['created_at', 'updated_at']))

                                    @if ($fieldName === 'logo')

                                        <td><img src="{{ asset($fieldValue) }}" alt="Logo" style="width: {{ $width }}px; height: {{ $height }}px;" ></td>
                                    @else
                                        <td>{{ $fieldValue }}</td>
                                    @endif
                                @endif
                            @endforeach
                            <td>
                                <div class="button-list horizontal-home">
                                    <div class="button-list-horizontal horizontal-index">
                                        <a href="{{ route('dashboard.edit', ['id' => $client->id]) }}" class="btn btn-success-rgba">
                                            Edit <i class="feather icon-edit-2"></i>
                                        </a>

                                        <form action="{{ route('dashboard.destroy', $client->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this client?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger-rgba">
                                                Delete <i class="feather icon-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>

                </table>
            </div>
        </div>
    </x-slot>
</x-master>
@include('dashboard.components.footer')
