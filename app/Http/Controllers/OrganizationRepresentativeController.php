<?php

namespace App\Http\Controllers;

use App\Exports\OrganizationRepresentativesExport;
use App\Models\OrganizationRepresentative;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

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
        $districts = ['thiruvananthapuram', 'kollam', 'pathanamthitta', 'alappuzha', 'kottayam', 'idukki', 'ernakulam', 'thrissur', 'palakkad', 'malappuram', 'kozhikode', 'wayanad', 'kannur', 'kasaragod'];

        $rules = [
            'organization_name' => 'required|string|max:255',
            'other_organization_name' => 'nullable|string|max:255',
            'filled_by_name' => 'required|string|max:255',
            'filled_by_mobile' => 'required|string|max:15',
        ];

        // Add validation rules for all districts and both coordinators
        foreach ($districts as $district) {
            $rules["{$district}_coordinator1_position"] = 'nullable|string|max:255';
            $rules["{$district}_coordinator1_name"] = 'nullable|string|max:255';
            $rules["{$district}_coordinator1_phone"] = 'nullable|string|max:15';
            $rules["{$district}_coordinator1_whatsapp"] = 'nullable|string|max:15';
            $rules["{$district}_coordinator2_position"] = 'nullable|string|max:255';
            $rules["{$district}_coordinator2_name"] = 'nullable|string|max:255';
            $rules["{$district}_coordinator2_phone"] = 'nullable|string|max:15';
            $rules["{$district}_coordinator2_whatsapp"] = 'nullable|string|max:15';
        }

        // If "Others" is selected, require the other_organization_name field
        if ($request->organization_name === 'Others') {
            $rules['other_organization_name'] = 'required|string|max:255';
        }

        $validated = $request->validate($rules);
        if($request->organization_name === 'Others'){
            $validated['organization_name'] = $request->other_organization_name;
        }
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

    /**
     * Export all organization representative responses as an Excel file.
     */
    public function export()
    {
        $fileName = 'organization-representatives-' . now()->format('Y-m-d_H-i') . '.xlsx';

        return Excel::download(new OrganizationRepresentativesExport(), $fileName);
    }
}
