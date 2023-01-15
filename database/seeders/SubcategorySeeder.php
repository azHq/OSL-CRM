<?php

namespace Database\Seeders;

use App\Models\Subcategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SubcategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $list1 = [
            'New Leads',
            '1st Contact',
            '2nd Contact',
            '3rd Contact',
            'Final Call',
            'Cold',
            'Dead'
        ];
        foreach ($list1 as $subcat) {
            Subcategory::create(['name' => $subcat, 'category_id' => 1]);
        }

        $list2 = [
            'Appointment Book',
            'Waiting for Documents'
        ];
        foreach ($list2 as $subcat) {
            Subcategory::create(['name' => $subcat, 'category_id' => 2]);
        }

        $list3 = [
            'Partial Documnets',
            'Document Received',
            'Applied',
            'Waiting for Conditional Offer Issued',
            'Waiting for Unconditional Offer Issued',
            'Payment Expected',
            'Paid'
        ];
        foreach ($list3 as $subcat) {
            Subcategory::create(['name' => $subcat, 'category_id' => 3]);
        }

        $list4 = [
            'Waiting for CAS',
            'Interview in process',
            'CAS or Final Confirmation Letter Issued',
            'Applied for Visa',
            'Visa Issued',
            'Enrolled',
            'Refund',
            'Withdrawn'
        ];
        foreach ($list4 as $subcat) {
            Subcategory::create(['name' => $subcat, 'category_id' => 4]);
        }
    }
}
