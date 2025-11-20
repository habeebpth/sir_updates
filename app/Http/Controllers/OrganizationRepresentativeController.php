<?php

namespace App\Http\Controllers;

use App\Models\OrganizationRepresentative;
use Illuminate\Http\Request;

class OrganizationRepresentativeController extends Controller
{
    /**
     * Display the data collection form.
     */
    public function create()
    {
        $districts = [
            'thiruvananthapuram' => 'തിരുവനന്തപുരം',
            'kollam' => 'കൊല്ലം',
            'pathanamthitta' => 'പത്തനംതിട്ട',
            'alappuzha' => 'ആലപ്പുഴ',
            'kottayam' => 'കോട്ടയം',
            'idukki' => 'ഇടുക്കി',
            'ernakulam' => 'എറണാകുളം',
            'thrissur' => 'തൃശ്ശൂർ',
            'palakkad' => 'പാലക്കാട്',
            'malappuram' => 'മലപ്പുറം',
            'kozhikode' => 'കോഴിക്കോട്',
            'wayanad' => 'വയനാട്',
            'kannur' => 'കണ്ണൂർ',
            'kasaragod' => 'കാസർഗോഡ്',
        ];

        return view('data_form', compact('districts'));
    }

    /**
     * Get organization data for auto-populate.
     */
    public function getOrganizationData($organizationName)
    {
        $data = OrganizationRepresentative::where('organization_name', $organizationName)->first();
        
        if ($data) {
            return response()->json([
                'success' => true,
                'data' => $data
            ]);
        }
        
        return response()->json([
            'success' => false,
            'message' => 'No data found'
        ]);
    }

    /**
     * Store the submitted data.
     */
    public function store(Request $request)
    {
        $rules = [
            'organization_name' => 'required|string|max:255',
            'other_organization_name' => 'nullable|string|max:255',
            'filled_by_name' => 'required|string|max:255',
            'filled_by_mobile' => 'required|string|max:15',
            'thiruvananthapuram_position' => 'nullable|string|max:255',
            'thiruvananthapuram_name' => 'nullable|string|max:255',
            'thiruvananthapuram_phone' => 'nullable|string|max:15',
            'thiruvananthapuram_whatsapp' => 'nullable|string|max:15',
            'kollam_position' => 'nullable|string|max:255',
            'kollam_name' => 'nullable|string|max:255',
            'kollam_phone' => 'nullable|string|max:15',
            'kollam_whatsapp' => 'nullable|string|max:15',
            'pathanamthitta_position' => 'nullable|string|max:255',
            'pathanamthitta_name' => 'nullable|string|max:255',
            'pathanamthitta_phone' => 'nullable|string|max:15',
            'pathanamthitta_whatsapp' => 'nullable|string|max:15',
            'alappuzha_position' => 'nullable|string|max:255',
            'alappuzha_name' => 'nullable|string|max:255',
            'alappuzha_phone' => 'nullable|string|max:15',
            'alappuzha_whatsapp' => 'nullable|string|max:15',
            'kottayam_position' => 'nullable|string|max:255',
            'kottayam_name' => 'nullable|string|max:255',
            'kottayam_phone' => 'nullable|string|max:15',
            'kottayam_whatsapp' => 'nullable|string|max:15',
            'idukki_position' => 'nullable|string|max:255',
            'idukki_name' => 'nullable|string|max:255',
            'idukki_phone' => 'nullable|string|max:15',
            'idukki_whatsapp' => 'nullable|string|max:15',
            'ernakulam_position' => 'nullable|string|max:255',
            'ernakulam_name' => 'nullable|string|max:255',
            'ernakulam_phone' => 'nullable|string|max:15',
            'ernakulam_whatsapp' => 'nullable|string|max:15',
            'thrissur_position' => 'nullable|string|max:255',
            'thrissur_name' => 'nullable|string|max:255',
            'thrissur_phone' => 'nullable|string|max:15',
            'thrissur_whatsapp' => 'nullable|string|max:15',
            'palakkad_position' => 'nullable|string|max:255',
            'palakkad_name' => 'nullable|string|max:255',
            'palakkad_phone' => 'nullable|string|max:15',
            'palakkad_whatsapp' => 'nullable|string|max:15',
            'malappuram_position' => 'nullable|string|max:255',
            'malappuram_name' => 'nullable|string|max:255',
            'malappuram_phone' => 'nullable|string|max:15',
            'malappuram_whatsapp' => 'nullable|string|max:15',
            'kozhikode_position' => 'nullable|string|max:255',
            'kozhikode_name' => 'nullable|string|max:255',
            'kozhikode_phone' => 'nullable|string|max:15',
            'kozhikode_whatsapp' => 'nullable|string|max:15',
            'wayanad_position' => 'nullable|string|max:255',
            'wayanad_name' => 'nullable|string|max:255',
            'wayanad_phone' => 'nullable|string|max:15',
            'wayanad_whatsapp' => 'nullable|string|max:15',
            'kannur_position' => 'nullable|string|max:255',
            'kannur_name' => 'nullable|string|max:255',
            'kannur_phone' => 'nullable|string|max:15',
            'kannur_whatsapp' => 'nullable|string|max:15',
            'kasaragod_position' => 'nullable|string|max:255',
            'kasaragod_name' => 'nullable|string|max:255',
            'kasaragod_phone' => 'nullable|string|max:15',
            'kasaragod_whatsapp' => 'nullable|string|max:15',
        ];

        // If "Others" is selected, require the other_organization_name field
        if ($request->organization_name === 'Others') {
            $rules['other_organization_name'] = 'required|string|max:255';
        }

        $validated = $request->validate($rules);

        OrganizationRepresentative::updateOrCreate(
            ['organization_name' => $validated['organization_name']],
            $validated
        );

        return redirect()->back()->with('success', 'ഡാറ്റ വിജയകരമായി സംരക്ഷിച്ചു!');
    }

    /**
     * Display all records.
     */
    public function index()
    {
        $records = OrganizationRepresentative::latest()->paginate(10);
        
        $districts = [
            'thiruvananthapuram' => 'തിരുവനന്തപുരം',
            'kollam' => 'കൊല്ലം',
            'pathanamthitta' => 'പത്തനംതിട്ട',
            'alappuzha' => 'ആലപ്പുഴ',
            'kottayam' => 'കോട്ടയം',
            'idukki' => 'ഇടുക്കി',
            'ernakulam' => 'എറണാകുളം',
            'thrissur' => 'തൃശ്ശൂർ',
            'palakkad' => 'പാലക്കാട്',
            'malappuram' => 'മലപ്പുറം',
            'kozhikode' => 'കോഴിക്കോട്',
            'wayanad' => 'വയനാട്',
            'kannur' => 'കണ്ണൂർ',
            'kasaragod' => 'കാസർഗോഡ്',
        ];
        
        return view('organization-representative.index', compact('records', 'districts'));
    }
}