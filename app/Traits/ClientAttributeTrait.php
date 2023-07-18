<?php
//
//namespace App\Traits;
//
//use App\Http\Requests\ClientDataEditRequest;
//use App\Http\Requests\ClientDataRequest;
//use App\Models\Client;
//use Illuminate\Http\Request;
//
//trait ClientAttributeTrait
//{
//    public function updateClientAttributes(array $validatedData, ClientDataRequest $request)
//    {
//        // Find the client by ID
//
//        $client = new Client;
//        $client->name = $validatedData['name'];
//        $client->primary_color = $validatedData['primary_color'];
//        $client->second_color = $validatedData['second_color'];
//        $client->collect_email = $validatedData['collect_email'];
//        $client->consent_for_questions = $validatedData['consent_for_questions'];
//
//        if ($request->hasFile('logo')) {
//            $logoFile = $request->file('logo');
//            $logoPath = '/klanten/logo/' . $logoFile->getClientOriginalName();
//            $logoFile->move(public_path('klanten/logo'), $logoPath);
//            $client->logo = $logoPath;
//        }
//
//        $client->save();
//
//        // image
//    }
//    public function updateLogo(ClientDataEditRequest $request, $client)
//    {
//        if ($request->hasFile('logo')) {
//            $logoFile = $request->file('logo');
//            $logoPath = '/klanten/logo/' . $logoFile->getClientOriginalName();
//            $logoFile->move(public_path('klanten/logo'), $logoPath);
//            $client->logo = $logoPath;
//        }
//
//        return $client;
//    }
//}
