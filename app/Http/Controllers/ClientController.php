<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\URL;
class ClientController extends Controller
{
    public function create()
    {
        $client = Client::create([
           'name' => 'naam',
            'logo' => 'logo',
            'basis_kleur' => 'basis_kleur',
            'tweede_kleur' => 'tweede_kleur',
            'verzamelen_van_email' => 'verzamelen_van_email',
            'akkord_voor_vragen' => 'akkord_voor_vragen'
        ]);
    }
    public function getSignalUrl($id)
    {
        return URL::signedRoute(
            'client.autoLogin', ['id' => $id]
        );

    }
    public function autoLogin(Request $request, $id)
    {
        if(!$request->hasValidSignature()) {
            abort(401);
        }
        $client = Client::find($id);

        Auth::login($client);

        return redirect('clientDashboard');
    }
}
