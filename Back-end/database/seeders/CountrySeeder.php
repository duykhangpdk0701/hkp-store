<?php

namespace Database\Seeders;

use App\Models\SysCountry;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (SysCountry::count() > 0) {
            return false;
        }

        $countries = [
            ['code' => 'US', 'name' => 'United States'],
            ['code' => 'CA', 'name' => 'Canada'],
            ['code' => 'AF', 'name' => 'Afghanistan'],
            ['code' => 'AL', 'name' => 'Albania'],
            ['code' => 'DZ', 'name' => 'Algeria'],
            ['code' => 'AS', 'name' => 'American Samoa'],
            ['code' => 'AD', 'name' => 'Andorra'],
            ['code' => 'AO', 'name' => 'Angola'],
            ['code' => 'AI', 'name' => 'Anguilla'],
            ['code' => 'AQ', 'name' => 'Antarctica'],
            ['code' => 'AG', 'name' => 'Antigua and/or Barbuda'],
            ['code' => 'AR', 'name' => 'Argentina'],
            ['code' => 'AM', 'name' => 'Armenia'],
            ['code' => 'AW', 'name' => 'Aruba'],
            ['code' => 'AU', 'name' => 'Australia'],
            ['code' => 'AT', 'name' => 'Austria'],
            ['code' => 'AZ', 'name' => 'Azerbaijan'],
            ['code' => 'BS', 'name' => 'Bahamas'],
            ['code' => 'BH', 'name' => 'Bahrain'],
            ['code' => 'BD', 'name' => 'Bangladesh'],
            ['code' => 'BB', 'name' => 'Barbados'],
            ['code' => 'BY', 'name' => 'Belarus'],
            ['code' => 'BE', 'name' => 'Belgium'],
            ['code' => 'BZ', 'name' => 'Belize'],
            ['code' => 'BJ', 'name' => 'Benin'],
            ['code' => 'BM', 'name' => 'Bermuda'],
            ['code' => 'BT', 'name' => 'Bhutan'],
            ['code' => 'BO', 'name' => 'Bolivia'],
            ['code' => 'BA', 'name' => 'Bosnia and Herzegovina'],
            ['code' => 'BW', 'name' => 'Botswana'],
            ['code' => 'BV', 'name' => 'Bouvet Island'],
            ['code' => 'BR', 'name' => 'Brazil'],
            ['code' => 'IO', 'name' => 'British lndian Ocean Territory'],
            ['code' => 'BN', 'name' => 'Brunei Darussalam'],
            ['code' => 'BG', 'name' => 'Bulgaria'],
            ['code' => 'BF', 'name' => 'Burkina Faso'],
            ['code' => 'BI', 'name' => 'Burundi'],
            ['code' => 'KH', 'name' => 'Cambodia'],
            ['code' => 'CM', 'name' => 'Cameroon'],
            ['code' => 'CV', 'name' => 'Cape Verde'],
            ['code' => 'KY', 'name' => 'Cayman Islands'],
            ['code' => 'CF', 'name' => 'Central African Republic'],
            ['code' => 'TD', 'name' => 'Chad'],
            ['code' => 'CL', 'name' => 'Chile'],
            ['code' => 'CN', 'name' => 'China'],
            ['code' => 'CX', 'name' => 'Christmas Island'],
            ['code' => 'CC', 'name' => 'Cocos (Keeling] Islands'],
            ['code' => 'CO', 'name' => 'Colombia'],
            ['code' => 'KM', 'name' => 'Comoros'],
            ['code' => 'CG', 'name' => 'Congo'],
            ['code' => 'CK', 'name' => 'Cook Islands'],
            ['code' => 'CR', 'name' => 'Costa Rica'],
            ['code' => 'HR', 'name' => 'Croatia (Hrvatska]'],
            ['code' => 'CU', 'name' => 'Cuba'],
            ['code' => 'CY', 'name' => 'Cyprus'],
            ['code' => 'CZ', 'name' => 'Czech Republic'],
            ['code' => 'CD', 'name' => 'Democratic Republic of Congo'],
            ['code' => 'DK', 'name' => 'Denmark'],
            ['code' => 'DJ', 'name' => 'Djibouti'],
            ['code' => 'DM', 'name' => 'Dominica'],
            ['code' => 'DO', 'name' => 'Dominican Republic'],
            ['code' => 'TP', 'name' => 'East Timor'],
            ['code' => 'EC', 'name' => 'Ecudaor'],
            ['code' => 'EG', 'name' => 'Egypt'],
            ['code' => 'SV', 'name' => 'El Salvador'],
            ['code' => 'GQ', 'name' => 'Equatorial Guinea'],
            ['code' => 'ER', 'name' => 'Eritrea'],
            ['code' => 'EE', 'name' => 'Estonia'],
            ['code' => 'ET', 'name' => 'Ethiopia'],
            ['code' => 'FK', 'name' => 'Falkland Islands (Malvinas]'],
            ['code' => 'FO', 'name' => 'Faroe Islands'],
            ['code' => 'FJ', 'name' => 'Fiji'],
            ['code' => 'FI', 'name' => 'Finland'],
            ['code' => 'FR', 'name' => 'France'],
            ['code' => 'FX', 'name' => 'France, Metropolitan'],
            ['code' => 'GF', 'name' => 'French Guiana'],
            ['code' => 'PF', 'name' => 'French Polynesia'],
            ['code' => 'TF', 'name' => 'French Southern Territories'],
            ['code' => 'GA', 'name' => 'Gabon'],
            ['code' => 'GM', 'name' => 'Gambia'],
            ['code' => 'GE', 'name' => 'Georgia'],
            ['code' => 'DE', 'name' => 'Germany'],
            ['code' => 'GH', 'name' => 'Ghana'],
            ['code' => 'GI', 'name' => 'Gibraltar'],
            ['code' => 'GR', 'name' => 'Greece'],
            ['code' => 'GL', 'name' => 'Greenland'],
            ['code' => 'GD', 'name' => 'Grenada'],
            ['code' => 'GP', 'name' => 'Guadeloupe'],
            ['code' => 'GU', 'name' => 'Guam'],
            ['code' => 'GT', 'name' => 'Guatemala'],
            ['code' => 'GN', 'name' => 'Guinea'],
            ['code' => 'GW', 'name' => 'Guinea-Bissau'],
            ['code' => 'GY', 'name' => 'Guyana'],
            ['code' => 'HT', 'name' => 'Haiti'],
            ['code' => 'HM', 'name' => 'Heard and Mc Donald Islands'],
            ['code' => 'HN', 'name' => 'Honduras'],
            ['code' => 'HK', 'name' => 'Hong Kong'],
            ['code' => 'HU', 'name' => 'Hungary'],
            ['code' => 'IS', 'name' => 'Iceland'],
            ['code' => 'IN', 'name' => 'India'],
            ['code' => 'ID', 'name' => 'Indonesia'],
            ['code' => 'IR', 'name' => 'Iran (Islamic Republic of]'],
            ['code' => 'IQ', 'name' => 'Iraq'],
            ['code' => 'IE', 'name' => 'Ireland'],
            ['code' => 'IL', 'name' => 'Israel'],
            ['code' => 'IT', 'name' => 'Italy'],
            ['code' => 'CI', 'name' => 'Ivory Coast'],
            ['code' => 'JM', 'name' => 'Jamaica'],
            ['code' => 'JP', 'name' => 'Japan'],
            ['code' => 'JO', 'name' => 'Jordan'],
            ['code' => 'KZ', 'name' => 'Kazakhstan'],
            ['code' => 'KE', 'name' => 'Kenya'],
            ['code' => 'KI', 'name' => 'Kiribati'],
            ['code' => 'KP', 'name' => 'Korea, Democratic People\'s Republic of'],
            ['code' => 'KR', 'name' => 'Korea, Republic of'],
            ['code' => 'KW', 'name' => 'Kuwait'],
            ['code' => 'KG', 'name' => 'Kyrgyzstan'],
            ['code' => 'LA', 'name' => 'Lao People\'s Democratic Republic'],
            ['code' => 'LV', 'name' => 'Latvia'],
            ['code' => 'LB', 'name' => 'Lebanon'],
            ['code' => 'LS', 'name' => 'Lesotho'],
            ['code' => 'LR', 'name' => 'Liberia'],
            ['code' => 'LY', 'name' => 'Libyan Arab Jamahiriya'],
            ['code' => 'LI', 'name' => 'Liechtenstein'],
            ['code' => 'LT', 'name' => 'Lithuania'],
            ['code' => 'LU', 'name' => 'Luxembourg'],
            ['code' => 'MO', 'name' => 'Macau'],
            ['code' => 'MK', 'name' => 'Macedonia'],
            ['code' => 'MG', 'name' => 'Madagascar'],
            ['code' => 'MW', 'name' => 'Malawi'],
            ['code' => 'MY', 'name' => 'Malaysia'],
            ['code' => 'MV', 'name' => 'Maldives'],
            ['code' => 'ML', 'name' => 'Mali'],
            ['code' => 'MT', 'name' => 'Malta'],
            ['code' => 'MH', 'name' => 'Marshall Islands'],
            ['code' => 'MQ', 'name' => 'Martinique'],
            ['code' => 'MR', 'name' => 'Mauritania'],
            ['code' => 'MU', 'name' => 'Mauritius'],
            ['code' => 'TY', 'name' => 'Mayotte'],
            ['code' => 'MX', 'name' => 'Mexico'],
            ['code' => 'FM', 'name' => 'Micronesia, Federated States of'],
            ['code' => 'MD', 'name' => 'Moldova, Republic of'],
            ['code' => 'MC', 'name' => 'Monaco'],
            ['code' => 'MN', 'name' => 'Mongolia'],
            ['code' => 'MS', 'name' => 'Montserrat'],
            ['code' => 'MA', 'name' => 'Morocco'],
            ['code' => 'MZ', 'name' => 'Mozambique'],
            ['code' => 'MM', 'name' => 'Myanmar'],
            ['code' => 'NA', 'name' => 'Namibia'],
            ['code' => 'NR', 'name' => 'Nauru'],
            ['code' => 'NP', 'name' => 'Nepal'],
            ['code' => 'NL', 'name' => 'Netherlands'],
            ['code' => 'AN', 'name' => 'Netherlands Antilles'],
            ['code' => 'NC', 'name' => 'New Caledonia'],
            ['code' => 'NZ', 'name' => 'New Zealand'],
            ['code' => 'NI', 'name' => 'Nicaragua'],
            ['code' => 'NE', 'name' => 'Niger'],
            ['code' => 'NG', 'name' => 'Nigeria'],
            ['code' => 'NU', 'name' => 'Niue'],
            ['code' => 'NF', 'name' => 'Norfork Island'],
            ['code' => 'MP', 'name' => 'Northern Mariana Islands'],
            ['code' => 'NO', 'name' => 'Norway'],
            ['code' => 'OM', 'name' => 'Oman'],
            ['code' => 'PK', 'name' => 'Pakistan'],
            ['code' => 'PW', 'name' => 'Palau'],
            ['code' => 'PA', 'name' => 'Panama'],
            ['code' => 'PG', 'name' => 'Papua New Guinea'],
            ['code' => 'PY', 'name' => 'Paraguay'],
            ['code' => 'PE', 'name' => 'Peru'],
            ['code' => 'PH', 'name' => 'Philippines'],
            ['code' => 'PN', 'name' => 'Pitcairn'],
            ['code' => 'PL', 'name' => 'Poland'],
            ['code' => 'PT', 'name' => 'Portugal'],
            ['code' => 'PR', 'name' => 'Puerto Rico'],
            ['code' => 'QA', 'name' => 'Qatar'],
            ['code' => 'SS', 'name' => 'Republic of South Sudan'],
            ['code' => 'RE', 'name' => 'Reunion'],
            ['code' => 'RO', 'name' => 'Romania'],
            ['code' => 'RU', 'name' => 'Russian Federation'],
            ['code' => 'RW', 'name' => 'Rwanda'],
            ['code' => 'KN', 'name' => 'Saint Kitts and Nevis'],
            ['code' => 'LC', 'name' => 'Saint Lucia'],
            ['code' => 'VC', 'name' => 'Saint Vincent and the Grenadines'],
            ['code' => 'WS', 'name' => 'Samoa'],
            ['code' => 'SM', 'name' => 'San Marino'],
            ['code' => 'ST', 'name' => 'Sao Tome and Principe'],
            ['code' => 'SA', 'name' => 'Saudi Arabia'],
            ['code' => 'SN', 'name' => 'Senegal'],
            ['code' => 'RS', 'name' => 'Serbia'],
            ['code' => 'SC', 'name' => 'Seychelles'],
            ['code' => 'SL', 'name' => 'Sierra Leone'],
            ['code' => 'SG', 'name' => 'Singapore'],
            ['code' => 'SK', 'name' => 'Slovakia'],
            ['code' => 'SI', 'name' => 'Slovenia'],
            ['code' => 'SB', 'name' => 'Solomon Islands'],
            ['code' => 'SO', 'name' => 'Somalia'],
            ['code' => 'ZA', 'name' => 'South Africa'],
            ['code' => 'GS', 'name' => 'South Georgia South Sandwich Islands'],
            ['code' => 'ES', 'name' => 'Spain'],
            ['code' => 'LK', 'name' => 'Sri Lanka'],
            ['code' => 'SH', 'name' => 'St. Helena'],
            ['code' => 'PM', 'name' => 'St. Pierre and Miquelon'],
            ['code' => 'SD', 'name' => 'Sudan'],
            ['code' => 'SR', 'name' => 'Suriname'],
            ['code' => 'SJ', 'name' => 'Svalbarn and Jan Mayen Islands'],
            ['code' => 'SZ', 'name' => 'Swaziland'],
            ['code' => 'SE', 'name' => 'Sweden'],
            ['code' => 'CH', 'name' => 'Switzerland'],
            ['code' => 'SY', 'name' => 'Syrian Arab Republic'],
            ['code' => 'TW', 'name' => 'Taiwan'],
            ['code' => 'TJ', 'name' => 'Tajikistan'],
            ['code' => 'TZ', 'name' => 'Tanzania, United Republic of'],
            ['code' => 'TH', 'name' => 'Thailand'],
            ['code' => 'TG', 'name' => 'Togo'],
            ['code' => 'TK', 'name' => 'Tokelau'],
            ['code' => 'TO', 'name' => 'Tonga'],
            ['code' => 'TT', 'name' => 'Trinidad and Tobago'],
            ['code' => 'TN', 'name' => 'Tunisia'],
            ['code' => 'TR', 'name' => 'Turkey'],
            ['code' => 'TM', 'name' => 'Turkmenistan'],
            ['code' => 'TC', 'name' => 'Turks and Caicos Islands'],
            ['code' => 'TV', 'name' => 'Tuvalu'],
            ['code' => 'UG', 'name' => 'Uganda'],
            ['code' => 'UA', 'name' => 'Ukraine'],
            ['code' => 'AE', 'name' => 'United Arab Emirates'],
            ['code' => 'GB', 'name' => 'United Kingdom'],
            ['code' => 'UM', 'name' => 'United States minor outlying islands'],
            ['code' => 'UY', 'name' => 'Uruguay'],
            ['code' => 'UZ', 'name' => 'Uzbekistan'],
            ['code' => 'VU', 'name' => 'Vanuatu'],
            ['code' => 'VA', 'name' => 'Vatican City State'],
            ['code' => 'VE', 'name' => 'Venezuela'],
            ['code' => 'VN', 'name' => 'Vietnam'],
            ['code' => 'VG', 'name' => 'Virgin Islands (British]'],
            ['code' => 'VI', 'name' => 'Virgin Islands (U.S.]'],
            ['code' => 'WF', 'name' => 'Wallis and Futuna Islands'],
            ['code' => 'EH', 'name' => 'Western Sahara'],
            ['code' => 'YE', 'name' => 'Yemen'],
            ['code' => 'YU', 'name' => 'Yugoslavia'],
            ['code' => 'ZR', 'name' => 'Zaire'],
            ['code' => 'ZM', 'name' => 'Zambia'],
            ['code' => 'ZW', 'name' => 'Zimbabwe'],
        ];

        DB::table('sys_countries')->insert($countries);
    }
}
