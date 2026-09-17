<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function index(): View
    {
        return view('home');
    }

    public function generate(Request $request): Response
    {
        $request->validate([
            'business_type' => ['required', 'string', 'max:255'],
        ]);

        return response('Generated successfully');
    }

    public function submitViewingRequest(Request $request): RedirectResponse
    {
        $validator = Validator::make($request->all(), [
            'full_name' => ['required', 'string', 'max:120'],
            'mobile_number' => ['required', 'string', 'max:32'],
            'email' => ['required', 'email', 'max:255'],
            'preferred_property' => ['required', 'in:willow,cedar,oak,not_sure'],
            'preferred_viewing_date' => ['required', 'date'],
            'message' => ['nullable', 'string', 'max:1000'],
        ]);

        if ($validator->fails()) {
            return redirect()
                ->route('home')
                ->withFragment('viewing')
                ->withErrors($validator)
                ->withInput();
        }

        return redirect()
            ->route('home')
            ->withFragment('viewing')
            ->with('viewing_success', 'Demo request received. No information was sent or stored, and no real viewing appointment was created.');
    }
}
