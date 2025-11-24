<?php

namespace App\Exports;

use App\Models\OrganizationRepresentative;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class OrganizationRepresentativesExport implements FromCollection, WithHeadings, WithMapping
{
    /**
     * @var array<string, string>
     */
    private array $districts = [
        'thiruvananthapuram' => 'Thiruvananthapuram',
        'kollam' => 'Kollam',
        'pathanamthitta' => 'Pathanamthitta',
        'alappuzha' => 'Alappuzha',
        'kottayam' => 'Kottayam',
        'idukki' => 'Idukki',
        'ernakulam' => 'Ernakulam',
        'thrissur' => 'Thrissur',
        'palakkad' => 'Palakkad',
        'malappuram' => 'Malappuram',
        'kozhikode' => 'Kozhikode',
        'wayanad' => 'Wayanad',
        'kannur' => 'Kannur',
        'kasaragod' => 'Kasaragod',
    ];

    public function collection(): Collection
    {
        return OrganizationRepresentative::orderByDesc('created_at')->get();
    }

    public function headings(): array
    {
        $headings = [
            'Organization Name',
            'Other Organization Name',
            'Filled By Name',
            'Filled By Mobile',
            'Submitted At',
        ];

        foreach ($this->districts as $districtName) {
            foreach ([1, 2] as $index) {
                $prefix = "{$districtName} Coordinator {$index}";
                $headings[] = "{$prefix} Position";
                $headings[] = "{$prefix} Name";
                $headings[] = "{$prefix} Phone";
                $headings[] = "{$prefix} WhatsApp";
            }
        }

        return $headings;
    }

    /**
     * @param  OrganizationRepresentative  $record
     */
    public function map($record): array
    {
        $row = [
            $record->organization_name,
            $record->other_organization_name,
            $record->filled_by_name,
            $record->filled_by_mobile,
            optional($record->created_at)->format('Y-m-d H:i:s'),
        ];

        foreach (array_keys($this->districts) as $districtKey) {
            foreach ([1, 2] as $index) {
                $prefix = "{$districtKey}_coordinator{$index}_";
                $row[] = $record->getAttribute("{$prefix}position");
                $row[] = $record->getAttribute("{$prefix}name");
                $row[] = $record->getAttribute("{$prefix}phone");
                $row[] = $record->getAttribute("{$prefix}whatsapp");
            }
        }

        return $row;
    }
}


