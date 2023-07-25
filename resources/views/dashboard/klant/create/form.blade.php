<div id="clientFormContainer">
    <div class="modal-body">
        <form id="client-form" action="{{ route('dashboard.create_client') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="patientname">Naam van de klant</label>
                    <input type="text" class="form-control p-3 mb-2 bg-light text-dark border border-danger" name="name" id="patientname">
                </div>
                <div class="form-group col-md-6">
                    <label for="patientadd">Basiskleur van de huisstijl</label>
                    <input type="color" class="form-control p-3 mb-2 bg-light text-dark border border-danger" id="patintadd" name="primary_color" onchange="updateValue(this.value, 'colorValue')">
                    {{--                    <input type="text" class="col-md-5" id="colorValue" readonly>--}}
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="patientmonitoredby">Logo Upload</label>
                    <input type="file" name="logo" class="form-control" id="patientmonitoredby">
                </div>
                <div class="form-group col-md-6 ">
                    <label for="patienttreatment" class="">Secondaire kleur van de huisstijl</label>
                    <input type="color" class="form-control p-3 mb-2 bg-light text-dark border border-danger" id="patienttreatment" name="second_color">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="verzamelen_van_email">Verzamelen van e-mailadressen</label><br>
                    <input class="form-check-input ml-0 p-3 mb-2 bg-light text-dark border border-danger" type="radio" name="collect_email" id="verzamelen_van_email_ja" value="1" checked>
                    <label class="form-check-label m-l-20" for="verzamelen_van_email_ja">
                        Ja
                    </label><br>
                    <input class="form-check-input ml-0 p-3 mb-2 bg-info text-white border border-danger" type="radio" name="collect_email" id="verzamelen_van_email_nee" value="0">
                    <label class="form-check-label m-l-20" for="verzamelen_van_email_nee">
                        Nee
                    </label>
                </div>
                <div class="form-group col-md-6">
                    <label for="akkord_voor_vragen">Akkoord vragen voor plaatsen</label><br>
                    <input class="form-check-input ml-0 " type="radio" name="consent_for_questions" id="akkord_voor_vragen_ja" value="1" checked>
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
