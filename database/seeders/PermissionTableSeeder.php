<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [

            [
                'group_name' => 'litigation-calendar',
                'permissions' => [
                    'litigation-calendar-list',
                    'litigation-calendar-short',
                ]
            ],
            [
                'group_name' => 'role',
                'permissions' => [
                    'role-list',
                    'role-create',
                    'role-edit',
                    'role-delete',
                ]
            ],
            [
                'group_name' => 'user',
                'permissions' => [
                    'user-list',
                    'user-create',
                    'user-edit',
                    'user-delete',
                    'individual-users-permission',
                ]
            ],
            [
                'group_name' => 'counsel',
                'permissions' => [
                    'counsel-list',
                    'counsel-add',
                    'counsel-edit',
                    'counsel-delete',
                ]
            ],
            [
                'group_name' => 'chamber-staff',
                'permissions' => [
                    'chamber-staff-list',
                    'chamber-staff-add',
                    'chamber-staff-edit',
                    'chamber-staff-delete',
                ]
            ],
            [
                'group_name' => 'chamber-list',
                'permissions' => [
                    'chamber-list',
                    'chamber-add',
                    'chamber-edit',
                    'chamber-delete',
                ]
            ],
            [
                'group_name' => 'internal-counsel',
                'permissions' => [
                    'internal-counsel-list',
                    'internal-counsel-add',
                    'internal-counsel-edit',
                    'internal-counsel-delete',
                ]
            ],
            [
                'group_name' => 'accused',
                'permissions' => [
                    'accused-list',
                    'accused-create',
                    'accused-edit',
                    'accused-delete',
                ]
            ],
            [
                'group_name' => 'allegation-claim',
                'permissions' => [
                    'allegation-claim-list',
                    'allegation-claim-create',
                    'allegation-claim-edit',
                    'allegation-claim-delete',
                ]
            ],
            [
                'group_name' => 'area',
                'permissions' => [
                    'area-list',
                    'area-create',
                    'area-edit',
                    'area-delete',
                ]
            ],
            [
                'group_name' => 'bank',
                'permissions' => [
                    'bank-list',
                    'bank-create',
                    'bank-edit',
                    'bank-delete',
                ]
            ],
            [
                'group_name' => 'bank-branch',
                'permissions' => [
                    'bank-branch-list',
                    'bank-branch-create',
                    'bank-branch-edit',
                    'bank-branch-delete',
                ]
            ],
            [
                'group_name' => 'bill-type',
                'permissions' => [
                    'bill-type-list',
                    'bill-type-create',
                    'bill-type-edit',
                    'bill-type-delete',
                ]
            ],
            [
                'group_name' => 'bill-particulars',
                'permissions' => [
                    'bill-particulars-list',
                    'bill-particulars-create',
                    'bill-particulars-edit',
                    'bill-particulars-delete',
                ]
            ],
            [
                'group_name' => 'bill-schedules',
                'permissions' => [
                    'bill-schedules-list',
                    'bill-schedules-create',
                    'bill-schedules-edit',
                    'bill-schedules-delete',
                ]
            ],
            [
                'group_name' => 'branch',
                'permissions' => [
                    'branch-list',
                    'branch-create',
                    'branch-edit',
                    'branch-delete',
                ]
            ],
            [
                'group_name' => 'cabinet',
                'permissions' => [
                    'cabinet-list',
                    'cabinet-create',
                    'cabinet-edit',
                    'cabinet-delete',
                ]
            ],
            [
                'group_name' => 'case-status',
                'permissions' => [
                    'case-status-list',
                    'case-status-create',
                    'case-status-edit',
                    'case-status-delete',
                ]
            ],
            [
                'group_name' => 'case-title',
                'permissions' => [
                    'case-title-list',
                    'case-title-create',
                    'case-title-edit',
                    'case-title-delete',
                ]
            ],
            [
                'group_name' => 'case-category',
                'permissions' => [
                    'case-category-list',
                    'case-category-create',
                    'case-category-edit',
                    'case-category-delete',
                ]
            ],
            [
                'group_name' => 'case-matter',
                'permissions' => [
                    'case-matter-list',
                    'case-matter-create',
                    'case-matter-edit',
                    'case-matter-delete',
                ]
            ],
            [
                'group_name' => 'case-type',
                'permissions' => [
                    'case-type-list',
                    'case-type-create',
                    'case-type-edit',
                    'case-type-delete',
                ]
            ],
            [
                'group_name' => 'client-group',
                'permissions' => [
                    'client-group-list',
                    'client-group-create',
                    'client-group-edit',
                    'client-group-delete',
                ]
            ],
            [
                'group_name' => 'client-name',
                'permissions' => [
                    'client-name-list',
                    'client-name-create',
                    'client-name-edit',
                    'client-name-delete',
                ]
            ],
            [
                'group_name' => 'client-which-party',
                'permissions' => [
                    'client-which-party-list',
                    'client-which-party-create',
                    'client-which-party-edit',
                    'client-which-party-delete',
                ]
            ],
            [
                'group_name' => 'complainant',
                'permissions' => [
                    'complainant-list',
                    'complainant-create',
                    'complainant-edit',
                    'complainant-delete',
                ]
            ],
            [
                'group_name' => 'coordinator-or-tadbirkar',
                'permissions' => [
                    'coordinator-or-tadbirkar-list',
                    'coordinator-or-tadbirkar-create',
                    'coordinator-or-tadbirkar-edit',
                    'coordinator-or-tadbirkar-delete',
                ]
            ],
            [
                'group_name' => 'court-name',
                'permissions' => [
                    'court-name-list',
                    'court-name-create',
                    'court-name-edit',
                    'court-name-delete',
                ]
            ],
            [
                'group_name' => 'court-order',
                'permissions' => [
                    'court-order-list',
                    'court-order-create',
                    'court-order-edit',
                    'court-order-delete',
                ]
            ],
            [
                'group_name' => 'court-proceeding',
                'permissions' => [
                    'court-proceeding-list',
                    'court-proceeding-create',
                    'court-proceeding-edit',
                    'court-proceeding-delete',
                ]
            ],
            [
                'group_name' => 'day-notes',
                'permissions' => [
                    'day-notes-list',
                    'day-notes-create',
                    'day-notes-edit',
                    'day-notes-delete',
                ]
            ],
            [
                'group_name' => 'designation',
                'permissions' => [
                    'designation-list',
                    'designation-create',
                    'designation-edit',
                    'designation-delete',
                ]
            ],
            [
                'group_name' => 'documents',
                'permissions' => [
                    'documents-list',
                    'documents-create',
                    'documents-edit',
                    'documents-delete',
                ]
            ],
            [
                'group_name' => 'documents-type',
                'permissions' => [
                    'documents-type-list',
                    'documents-type-create',
                    'documents-type-edit',
                    'documents-type-delete',
                ]
            ],
            [
                'group_name' => 'external-council',
                'permissions' => [
                    'external-council-list',
                    'external-council-create',
                    'external-council-edit',
                    'external-council-delete',
                ]
            ],
            [
                'group_name' => 'internal-council',
                'permissions' => [
                    'internal-council-list',
                    'internal-council-create',
                    'internal-council-edit',
                    'internal-council-delete',
                ]
            ],
            [
                'group_name' => 'in-favour-of',
                'permissions' => [
                    'in-favour-of-list',
                    'in-favour-of-create',
                    'in-favour-of-edit',
                    'in-favour-of-delete',
                ]
            ],
            [
                'group_name' => 'law',
                'permissions' => [
                    'law-list',
                    'law-create',
                    'law-edit',
                    'law-delete',
                ]
            ],
            [
                'group_name' => 'legal-issue',
                'permissions' => [
                    'legal-issue-list',
                    'legal-issue-create',
                    'legal-issue-edit',
                    'legal-issue-delete',
                ]
            ],
            [
                'group_name' => 'legal-service',
                'permissions' => [
                    'legal-service-list',
                    'legal-service-create',
                    'legal-service-edit',
                    'legal-service-delete',
                ]
            ],
            [
                'group_name' => 'mode-of-received',
                'permissions' => [
                    'mode-of-received-list',
                    'mode-of-received-create',
                    'mode-of-received-edit',
                    'mode-of-received-delete',
                ]
            ],
            [
                'group_name' => 'next-date-fixed-for',
                'permissions' => [
                    'next-date-fixed-for-list',
                    'next-date-fixed-for-create',
                    'next-date-fixed-for-edit',
                    'next-date-fixed-for-delete',
                ]
            ],
            [
                'group_name' => 'next-day-presence',
                'permissions' => [
                    'next-day-presence-list',
                    'next-day-presence-create',
                    'next-day-presence-edit',
                    'next-day-presence-delete',
                ]
            ],
            [
                'group_name' => 'opposition-which-party',
                'permissions' => [
                    'opposition-which-party-list',
                    'opposition-which-party-create',
                    'opposition-which-party-edit',
                    'opposition-which-party-delete',
                ]
            ],
            [
                'group_name' => 'particulars',
                'permissions' => [
                    'particulars-list',
                    'particulars-create',
                    'particulars-edit',
                    'particulars-delete',
                ]
            ],
            [
                'group_name' => 'party-category',
                'permissions' => [
                    'party-category-list',
                    'party-category-create',
                    'party-category-edit',
                    'party-category-delete',
                ]
            ],
            [
                'group_name' => 'party-subcategory',
                'permissions' => [
                    'party-subcategory-list',
                    'party-subcategory-create',
                    'party-subcategory-edit',
                    'party-subcategory-delete',
                ]
            ],
            [
                'group_name' => 'payment-type',
                'permissions' => [
                    'payment-type-list',
                    'payment-type-create',
                    'payment-type-edit',
                    'payment-type-delete',
                ]
            ],
            [
                'group_name' => 'payment-mode',
                'permissions' => [
                    'payment-mode-list',
                    'payment-mode-create',
                    'payment-mode-edit',
                    'payment-mode-delete',
                ]
            ],
            [
                'group_name' => 'profession',
                'permissions' => [
                    'profession-list',
                    'profession-create',
                    'profession-edit',
                    'profession-delete',
                ]
            ],
            [
                'group_name' => 'program',
                'permissions' => [
                    'program-list',
                    'program-create',
                    'program-edit',
                    'program-delete',
                ]
            ],
            [
                'group_name' => 'progress',
                'permissions' => [
                    'progress-list',
                    'progress-create',
                    'progress-edit',
                    'progress-delete',
                ]
            ],
            [
                'group_name' => 'referrer',
                'permissions' => [
                    'referrer-list',
                    'referrer-create',
                    'referrer-edit',
                    'referrer-delete',
                ]
            ],
            [
                'group_name' => 'section',
                'permissions' => [
                    'section-list',
                    'section-create',
                    'section-edit',
                    'section-delete',
                ]
            ],
            [
                'group_name' => 'title',
                'permissions' => [
                    'title-list',
                    'title-create',
                    'title-edit',
                    'title-delete',
                ]
            ],
            [
                'group_name' => 'zone',
                'permissions' => [
                    'zone-list',
                    'zone-create',
                    'zone-edit',
                    'zone-delete',
                ]
            ],
            [
                'group_name' => 'division',
                'permissions' => [
                    'division-list',
                    'division-create',
                    'division-edit',
                    'division-delete',
                ]
            ],
            [
                'group_name' => 'district',
                'permissions' => [
                    'district-list',
                    'district-create',
                    'district-edit',
                    'district-delete',
                ]
            ],
            [
                'group_name' => 'thana',
                'permissions' => [
                    'thana-list',
                    'thana-create',
                    'thana-edit',
                    'thana-delete',
                ]
            ],
            [
                'group_name' => 'floor',
                'permissions' => [
                    'floor-list',
                    'floor-create',
                    'floor-edit',
                    'floor-delete',
                ]
            ],
            [
                'group_name' => 'flat-number',
                'permissions' => [
                    'flat-number-list',
                    'flat-number-create',
                    'flat-number-edit',
                    'flat-number-delete',
                ]
            ],
            [
                'group_name' => 'property-type',
                'permissions' => [
                    'property-type-list',
                    'property-type-create',
                    'property-type-edit',
                    'property-type-delete',
                ]
            ],
            [
                'group_name' => 'seller-or-buyer',
                'permissions' => [
                    'seller-or-buyer-list',
                    'seller-or-buyer-create',
                    'seller-or-buyer-edit',
                    'seller-or-buyer-delete',
                ]
            ],
            [
                'group_name' => 'compliance-category',
                'permissions' => [
                    'compliance-category-list',
                    'compliance-category-create',
                    'compliance-category-edit',
                    'compliance-category-delete',
                ]
            ],
            [
                'group_name' => 'compliance-type',
                'permissions' => [
                    'compliance-type-list',
                    'compliance-type-create',
                    'compliance-type-edit',
                    'compliance-type-delete',
                ]
            ],
            [
                'group_name' => 'company-type',
                'permissions' => [
                    'company-type-list',
                    'company-type-create',
                    'company-type-edit',
                    'company-type-delete',
                ]
            ],
            [
                'group_name' => 'company',
                'permissions' => [
                    'company-list',
                    'company-create',
                    'company-edit',
                    'company-delete',
                ]
            ],
            [
                'group_name' => 'civil-cases',
                'permissions' => [
                    'civil-cases-list',
                    'civil-cases-create',
                    'civil-cases-edit',
                    'civil-cases-delete',
                    'civil-cases-view',
                    'civil-cases-add-billing',
                ]
            ],
            [
                'group_name' => 'criminal-cases',
                'permissions' => [
                    'criminal-cases-list',
                    'criminal-cases-create',
                    'criminal-cases-edit',
                    'criminal-cases-delete',
                    'criminal-cases-view',
                    'criminal-cases-add-billing',
//                    'criminal-cases-info-print-preview',
//                    'criminal-cases-send-messages-email',
//                    'criminal-cases-proceedings-log',
//                    'criminal-cases-activity-log',
//                    'criminal-cases-proceedings-print-preview',
//                    'criminal-cases-documents-log',
//                    'criminal-cases-billing-print-preview',
//                    'criminal-cases-basic-info-update',
//                    'criminal-cases-primary-info-update',
//                    'criminal-cases-opposite-party-info-update',
//                    'criminal-cases-documents-received-required-update',
//                    'criminal-cases-case-info-update',
//                    'criminal-cases-status-of-the-case-update',
//                    'criminal-cases-letter-notice-reply-update',
//                    'criminal-cases-case-steps-update',
//                    'criminal-cases-lawyers-info-update',

                ]
            ],
            [
                'group_name' => 'service-matter',
                'permissions' => [
                    'service-matter-list',
                    'service-matter-create',
                    'service-matter-edit',
                    'service-matter-delete',
                    'service-matter-view',
                    'service-matter-add-billing',
                ]
            ],
            [
                'group_name' => 'quassi-judicial-cases',
                'permissions' => [
                    'quassi-judicial-cases-list',
                    'quassi-judicial-cases-create',
                    'quassi-judicial-cases-edit',
                    'quassi-judicial-cases-delete',
                    'quassi-judicial-cases-view',
                    'quassi-judicial-cases-add-billing',
                ]
            ],
            [
                'group_name' => 'high-court-cases',
                'permissions' => [
                    'high-court-cases-list',
                    'high-court-cases-create',
                    'high-court-cases-edit',
                    'high-court-cases-delete',
                    'high-court-cases-view',
                    'high-court-cases-add-billing',
                ]
            ],
            [
                'group_name' => 'appellate-court-cases',
                'permissions' => [
                    'appellate-court-cases-list',
                    'appellate-court-cases-create',
                    'appellate-court-cases-edit',
                    'appellate-court-cases-delete',
                    'appellate-court-cases-view',
                    'appellate-court-cases-add-billing',
                ]
            ],
            [
                'group_name' => 'search-wizard',
                'permissions' => [
                    'search-wizard-list',
                ]
            ],
            [
                'group_name' => 'billing',
                'permissions' => [
                    'billing-list',
                    'billing-add',
                ]
            ],
            [
                'group_name' => 'land-information',
                'permissions' => [
                    'land-information-list',
                    'land-information-create',
                    'land-information-edit',
                    'land-information-delete',
                    'land-information-view',
                ]
            ],
            [
                'group_name' => 'flat-information',
                'permissions' => [
                    'flat-information-list',
                    'flat-information-create',
                    'flat-information-edit',
                    'flat-information-delete',
                    'flat-information-view',
                ]
            ],
            [
                'group_name' => 'regulatory-compliance-info',
                'permissions' => [
                    'regulatory-compliance-info-list',
                    'regulatory-compliance-info-create',
                    'regulatory-compliance-info-edit',
                    'regulatory-compliance-info-delete',
                    'regulatory-compliance-info-view',
                ]
            ],
            [
                'group_name' => 'social-compliance-info',
                'permissions' => [
                    'social-compliance-info-list',
                    'social-compliance-info-create',
                    'social-compliance-info-edit',
                    'social-compliance-info-delete',
                    'social-compliance-info-view',
                ]
            ],
            [
                'group_name' => 'document-management',
                'permissions' => [
                    'document-management-list',
                    'document-management-create',
                    'external-document-list',
                ]
            ],



        ];



        for ($i = 0; $i<count($permissions); $i++){
            $permissionGroup = $permissions[$i]['group_name'];
            for ($j = 0; $j<count($permissions[$i]['permissions']); $j++){
                Permission::create(['name' => $permissions[$i]['permissions'][$j], 'group_name' => $permissionGroup]);
            }
        }


    }
}
