<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DischargeMedicationSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('medications')->delete();
        
        \DB::table('medications')->insert(array (
            0 => 
            array (
                'drug_name' => 'Acetazolamide',
                'concentration' => '250mg',
            ),
            1 => 
            array (
                'drug_name' => 'Actinomycin ',
                'concentration' => '0.5mg',
            ),
            2 => 
            array (
                'drug_name' => 'Acyclovir ',
                'concentration' => '400mg',
            ),
            3 => 
            array (
                'drug_name' => 'Acyclovir 4.5g ',
                'concentration' => '3%',
            ),
            4 => 
            array (
                'drug_name' => 'Adrenaline',
                'concentration' => '1mg in 1ml',
            ),
            5 => 
            array (
                'drug_name' => 'Albendazole',
                'concentration' => '200mg',
            ),
            6 => 
            array (
                'drug_name' => 'Allopurinol ',
                'concentration' => '100mg',
            ),
            7 => 
            array (
            'drug_name' => 'Amethocaine  (Minims)',
                'concentration' => '0.5%',
            ),
            8 => 
            array (
                'drug_name' => 'Aminophylline',
                'concentration' => '250mg in 10ml',
            ),
            9 => 
            array (
                'drug_name' => 'Amiodarone',
                'concentration' => '200mg',
            ),
            10 => 
            array (
                'drug_name' => 'Amitriptyline ',
                'concentration' => '50mg',
            ),
            11 => 
            array (
                'drug_name' => 'Amoxycillin ',
                'concentration' => '250mg in 5ml',
            ),
            12 => 
            array (
                'drug_name' => 'Amoxycillin ',
                'concentration' => '250mg',
            ),
            13 => 
            array (
                'drug_name' => 'Amoxycillin/Clavulanic Acid ',
                'concentration' => '500mg/125mg',
            ),
            14 => 
            array (
                'drug_name' => 'Amphotericin B ',
                'concentration' => '50mg',
            ),
            15 => 
            array (
                'drug_name' => 'Ampicillin',
                'concentration' => '500mg',
            ),
            16 => 
            array (
                'drug_name' => 'Anti-haemorrhoid',
                'concentration' => NULL,
            ),
            17 => 
            array (
                'drug_name' => 'Antiseptic Soap',
                'concentration' => NULL,
            ),
            18 => 
            array (
                'drug_name' => 'Artemether / Lumefantrine ',
                'concentration' => '20mg/120mg',
            ),
            19 => 
            array (
                'drug_name' => 'Artesunate',
                'concentration' => '60mg',
            ),
            20 => 
            array (
                'drug_name' => 'Artesunate ',
                'concentration' => '50mg',
            ),
            21 => 
            array (
                'drug_name' => 'Artesunate',
                'concentration' => '200mg',
            ),
            22 => 
            array (
                'drug_name' => 'Aspirin',
                'concentration' => '300mg',
            ),
            23 => 
            array (
                'drug_name' => 'Atenolol ',
                'concentration' => '50mg',
            ),
            24 => 
            array (
                'drug_name' => 'Atracurium Besylate',
                'concentration' => '25mg in 2.5ml',
            ),
            25 => 
            array (
                'drug_name' => 'Atropine ',
                'concentration' => '1%',
            ),
            26 => 
            array (
                'drug_name' => 'Atropine sulphate',
                'concentration' => '600mcg in 1ml',
            ),
            27 => 
            array (
                'drug_name' => 'Azathioprine ',
                'concentration' => '50mg',
            ),
            28 => 
            array (
                'drug_name' => 'Azithromycin',
                'concentration' => '500mg ',
            ),
            29 => 
            array (
                'drug_name' => 'B.S.S ointment 20g',
                'concentration' => NULL,
            ),
            30 => 
            array (
                'drug_name' => 'Baclofen',
                'concentration' => '10mg',
            ),
            31 => 
            array (
                'drug_name' => 'BCG Vaccine 20 dose amp and diluent',
                'concentration' => '20 dose',
            ),
            32 => 
            array (
                'drug_name' => 'Beclomethasone',
                'concentration' => '100mcg/dose',
            ),
            33 => 
            array (
                'drug_name' => 'Benzathine Penicillin 1.2 Mega IU ',
                'concentration' => '0.9g',
            ),
            34 => 
            array (
                'drug_name' => 'Benzathine Penicillin 2.4 Mega IU ',
                'concentration' => '1.8g',
            ),
            35 => 
            array (
                'drug_name' => 'Benzhexol ',
                'concentration' => '5mg',
            ),
            36 => 
            array (
                'drug_name' => 'Benztropine mesylate',
                'concentration' => '2mg in 2ml',
            ),
            37 => 
            array (
                'drug_name' => 'Benzyl benzoate 200ml',
                'concentration' => '25%',
            ),
            38 => 
            array (
                'drug_name' => 'Benzylpenicillin 1 Mega Unit',
                'concentration' => '600mg',
            ),
            39 => 
            array (
                'drug_name' => 'Benzylpenicillin 5 Mega Units',
                'concentration' => '3g',
            ),
            40 => 
            array (
                'drug_name' => 'Betamethasone / Neomycin  5ml',
                'concentration' => '0.1% / 0.5%',
            ),
            41 => 
            array (
                'drug_name' => 'Bisacodyl ',
                'concentration' => '10mg',
            ),
            42 => 
            array (
                'drug_name' => 'Bisacodyl ',
                'concentration' => '5mg',
            ),
            43 => 
            array (
                'drug_name' => 'Blood Glucose Meter',
                'concentration' => NULL,
            ),
            44 => 
            array (
                'drug_name' => 'Blood glucose meter test strips',
                'concentration' => NULL,
            ),
            45 => 
            array (
                'drug_name' => 'Bromocriptine ',
                'concentration' => '2.5mg',
            ),
            46 => 
            array (
                'drug_name' => 'Bupivacaine plain 20ml',
                'concentration' => '0.5%',
            ),
            47 => 
            array (
                'drug_name' => 'Bupivacaine spinal heavy 4ml',
                'concentration' => '0.5%',
            ),
            48 => 
            array (
                'drug_name' => 'Busulfan ',
                'concentration' => '2mg',
            ),
            49 => 
            array (
                'drug_name' => 'Calcium Carbonate ',
                'concentration' => '600mg',
            ),
            50 => 
            array (
            'drug_name' => 'Calcium Folinate (Folinic acid) ',
                'concentration' => '15mg',
            ),
            51 => 
            array (
            'drug_name' => 'Calcium Folinate (Folinic acid) 5ml',
                'concentration' => '10mg in 1ml',
            ),
            52 => 
            array (
                'drug_name' => 'Calcium Gluconate 10ml',
                'concentration' => '10%',
            ),
            53 => 
            array (
                'drug_name' => 'Captopril ',
                'concentration' => '25mg',
            ),
            54 => 
            array (
                'drug_name' => 'Carbachol',
                'concentration' => '0.01%',
            ),
            55 => 
            array (
                'drug_name' => 'Carbamazepine',
                'concentration' => '200mg',
            ),
            56 => 
            array (
                'drug_name' => 'Carbimazole',
                'concentration' => '5mg',
            ),
            57 => 
            array (
                'drug_name' => 'Carboplatin ',
                'concentration' => '150mg in 15ml',
            ),
            58 => 
            array (
                'drug_name' => 'Cefazolin ',
                'concentration' => '500mg',
            ),
            59 => 
            array (
                'drug_name' => 'Cefazolin',
                'concentration' => '1g',
            ),
            60 => 
            array (
                'drug_name' => 'Cefixime',
                'concentration' => '400mg',
            ),
            61 => 
            array (
                'drug_name' => 'Cefotaxime ',
                'concentration' => '500mg',
            ),
            62 => 
            array (
                'drug_name' => 'Cefotaxime ',
                'concentration' => '1g',
            ),
            63 => 
            array (
                'drug_name' => 'Ceftriaxone',
                'concentration' => '1g',
            ),
            64 => 
            array (
                'drug_name' => 'Chloramphenicol ',
                'concentration' => '1%',
            ),
            65 => 
            array (
                'drug_name' => 'Chloramphenicol ',
                'concentration' => '0.50%',
            ),
            66 => 
            array (
                'drug_name' => 'Chloramphenicol/Prednisolone',
                'concentration' => '5%/0.5%',
            ),
            67 => 
            array (
                'drug_name' => 'Chloramphenicol sodium succinate',
                'concentration' => '1g',
            ),
            68 => 
            array (
                'drug_name' => 'Chloramphenicol ',
                'concentration' => '125mg in 5ml',
            ),
            69 => 
            array (
                'drug_name' => 'Chloramphenicol ',
                'concentration' => '250mg',
            ),
            70 => 
            array (
                'drug_name' => 'Chlorhexidine in spirit bottle 1L',
                'concentration' => '0.5% in 70%',
            ),
            71 => 
            array (
                'drug_name' => 'Chlorhexidine in spirit bottle 2L',
                'concentration' => '0.5% in 70%',
            ),
            72 => 
            array (
                'drug_name' => 'Chlorhexidine mouth wash 200ml',
                'concentration' => '0.2%',
            ),
            73 => 
            array (
                'drug_name' => 'Chlorhexidine 100g',
                'concentration' => '1%',
            ),
            74 => 
            array (
                'drug_name' => 'Chlorhexidine 20g',
                'concentration' => '0.5%',
            ),
            75 => 
            array (
                'drug_name' => 'Chlorhexidine/Ethanol hand wash',
                'concentration' => '0.5% / 70%',
            ),
            76 => 
            array (
                'drug_name' => 'Chlorhexidine/Cetrimide conc.',
                'concentration' => '1.5% / 15%',
            ),
            77 => 
            array (
                'drug_name' => 'Chlorhexidine ',
                'concentration' => '4%',
            ),
            78 => 
            array (
            'drug_name' => 'Chlorine (effervescent)',
                'concentration' => '1g',
            ),
            79 => 
            array (
                'drug_name' => 'Chloroquine',
                'concentration' => '150mg base',
            ),
            80 => 
            array (
                'drug_name' => 'Chlorpheniramine',
                'concentration' => '4mg',
            ),
            81 => 
            array (
                'drug_name' => 'Chlorpromazine',
                'concentration' => '50mg in 2ml',
            ),
            82 => 
            array (
                'drug_name' => 'Chlorpromazine',
                'concentration' => '100mg',
            ),
            83 => 
            array (
                'drug_name' => 'Ciprofloxacin 10ml',
                'concentration' => '0.3%',
            ),
            84 => 
            array (
                'drug_name' => 'Ciprofloxacin ',
                'concentration' => '200mg in 100ml',
            ),
            85 => 
            array (
                'drug_name' => 'Ciprofloxacin ',
                'concentration' => '250mg in 5ml',
            ),
            86 => 
            array (
                'drug_name' => 'Ciprofloxacin',
                'concentration' => '250mg',
            ),
            87 => 
            array (
                'drug_name' => 'Cisplatin',
                'concentration' => '50mg in 50ml',
            ),
            88 => 
            array (
                'drug_name' => 'Cisplatin',
                'concentration' => '100mg in 100ml',
            ),
            89 => 
            array (
                'drug_name' => 'Citanest/Octapressin dental 2.2ml',
                'concentration' => '3%',
            ),
            90 => 
            array (
                'drug_name' => 'Clindamycin',
                'concentration' => '150mg',
            ),
            91 => 
            array (
                'drug_name' => 'Clindamycin',
                'concentration' => '600mg in 4ml',
            ),
            92 => 
            array (
                'drug_name' => 'Clofazimine ',
                'concentration' => '50mg',
            ),
            93 => 
            array (
                'drug_name' => 'Clomiphene',
                'concentration' => '50mg',
            ),
            94 => 
            array (
                'drug_name' => 'Clopidogrel',
                'concentration' => '75mg',
            ),
            95 => 
            array (
                'drug_name' => 'Clotrimazole ',
                'concentration' => '500mg',
            ),
            96 => 
            array (
                'drug_name' => 'Clotrimazole',
                'concentration' => '1%',
            ),
            97 => 
            array (
                'drug_name' => 'Clotrimazole ',
                'concentration' => '2%',
            ),
            98 => 
            array (
                'drug_name' => 'Cloxacillin ',
                'concentration' => '250mg',
            ),
            99 => 
            array (
                'drug_name' => 'Cloxacillin sodium',
                'concentration' => '500mg',
            ),
            100 => 
            array (
                'drug_name' => 'Codeine ',
                'concentration' => '30mg',
            ),
            101 => 
            array (
                'drug_name' => 'Colchicine ',
                'concentration' => '0.5mg',
            ),
            102 => 
            array (
                'drug_name' => 'Condom Female',
                'concentration' => NULL,
            ),
            103 => 
            array (
                'drug_name' => 'Condom Male',
                'concentration' => NULL,
            ),
            104 => 
            array (
                'drug_name' => 'Copper IUD ',
                'concentration' => 'T380A®',
            ),
            105 => 
            array (
                'drug_name' => 'Cortisone acetate',
                'concentration' => '5mg',
            ),
            106 => 
            array (
                'drug_name' => 'Co-trimoxazole ',
                'concentration' => '240mg in 5mL',
            ),
            107 => 
            array (
                'drug_name' => 'Co-trimoxazole ',
                'concentration' => '480mg',
            ),
            108 => 
            array (
                'drug_name' => 'Cromoglycate',
                'concentration' => '2%',
            ),
            109 => 
            array (
            'drug_name' => 'Cyclopentolate (Minims)',
                'concentration' => '0.5%',
            ),
            110 => 
            array (
                'drug_name' => 'Cyclophosphamide',
                'concentration' => '200mg',
            ),
            111 => 
            array (
                'drug_name' => 'Cyclophosphamide ',
                'concentration' => '500mg',
            ),
            112 => 
            array (
                'drug_name' => 'Cyclophosphamide',
                'concentration' => '1g',
            ),
            113 => 
            array (
                'drug_name' => 'Cyclophosphamide',
                'concentration' => '50mg',
            ),
            114 => 
            array (
                'drug_name' => 'Dapsone ',
                'concentration' => '100mg',
            ),
            115 => 
            array (
                'drug_name' => 'Dexamethasone',
                'concentration' => '0.5mg',
            ),
            116 => 
            array (
                'drug_name' => 'Dexamethasone',
                'concentration' => '4mg',
            ),
            117 => 
            array (
                'drug_name' => 'Dexamethasone 10ml',
                'concentration' => '0.10%',
            ),
            118 => 
            array (
                'drug_name' => 'Dexamethasone/Neomycin',
                'concentration' => '0.1%/0.5%',
            ),
            119 => 
            array (
                'drug_name' => 'Dexamethasone',
                'concentration' => '4mg in 1ml',
            ),
            120 => 
            array (
                'drug_name' => 'Dextrose 500ml',
                'concentration' => '5%',
            ),
            121 => 
            array (
                'drug_name' => 'Dextrose 500ml',
                'concentration' => '10%',
            ),
            122 => 
            array (
                'drug_name' => 'Dextrose 50ml',
                'concentration' => '50%',
            ),
            123 => 
            array (
                'drug_name' => 'Dextrose in sodium chloride 1000ml',
                'concentration' => '5% in 0.9%',
            ),
            124 => 
            array (
                'drug_name' => 'Diazepam ',
                'concentration' => '10mg in 2ml ',
            ),
            125 => 
            array (
                'drug_name' => 'Diazepam ',
                'concentration' => '5mg',
            ),
            126 => 
            array (
                'drug_name' => 'Diclofenac sodium',
                'concentration' => '25mg',
            ),
            127 => 
            array (
                'drug_name' => 'Diethylcarbamazine',
                'concentration' => '50mg',
            ),
            128 => 
            array (
                'drug_name' => 'Digoxin',
                'concentration' => '50mcg in 2ml',
            ),
            129 => 
            array (
                'drug_name' => 'Digoxin',
                'concentration' => '500mcg in 2ml',
            ),
            130 => 
            array (
                'drug_name' => 'Digoxin',
                'concentration' => '62.5mcg',
            ),
            131 => 
            array (
                'drug_name' => 'Digoxin',
                'concentration' => '250mcg',
            ),
            132 => 
            array (
                'drug_name' => 'Digoxin ',
                'concentration' => '50mcg in 1ml',
            ),
            133 => 
            array (
                'drug_name' => 'Disinfectant Phenolic hospital grade',
                'concentration' => '1%',
            ),
            134 => 
            array (
                'drug_name' => 'Dobutamine',
                'concentration' => '250mg in 20ml',
            ),
            135 => 
            array (
                'drug_name' => 'Dopamine',
                'concentration' => '200mg in 5ml',
            ),
            136 => 
            array (
                'drug_name' => 'Dorzolamide',
                'concentration' => '2%',
            ),
            137 => 
            array (
                'drug_name' => 'Dothiepin ',
                'concentration' => '25mg',
            ),
            138 => 
            array (
                'drug_name' => 'Doxorubicin 5ml',
                'concentration' => '2mg in 1ml',
            ),
            139 => 
            array (
                'drug_name' => 'Doxorubicin 10ml',
                'concentration' => '2mg in 1ml',
            ),
            140 => 
            array (
                'drug_name' => 'Doxorubicin 25ml',
                'concentration' => '2mg in 1ml',
            ),
            141 => 
            array (
                'drug_name' => 'Doxycycline ',
                'concentration' => '100mg',
            ),
            142 => 
            array (
                'drug_name' => 'Econazole',
                'concentration' => '1%',
            ),
            143 => 
            array (
                'drug_name' => 'Efavirenz',
                'concentration' => '600mg',
            ),
            144 => 
            array (
                'drug_name' => 'Enalapril',
                'concentration' => '5mg',
            ),
            145 => 
            array (
                'drug_name' => 'Ephedrine',
                'concentration' => '30mg in 1ml',
            ),
            146 => 
            array (
                'drug_name' => 'Erythromycin ',
                'concentration' => '200mg in 5ml',
            ),
            147 => 
            array (
                'drug_name' => 'Erythromycin ',
                'concentration' => '250mg',
            ),
            148 => 
            array (
                'drug_name' => 'Erythromycin ',
                'concentration' => '1g',
            ),
            149 => 
            array (
                'drug_name' => 'Ethambutol',
                'concentration' => '400mg',
            ),
            150 => 
            array (
                'drug_name' => 'Ethanol Alcohol ',
                'concentration' => '95%',
            ),
            151 => 
            array (
                'drug_name' => 'Ethinyloestradiol ',
                'concentration' => '0.01mg',
            ),
            152 => 
            array (
                'drug_name' => 'Ethyl Chloride spray can 100ml',
                'concentration' => NULL,
            ),
            153 => 
            array (
                'drug_name' => 'Fentanyl citrate',
                'concentration' => '100mcg in 2ml',
            ),
            154 => 
            array (
                'drug_name' => 'Ferrous sulphate',
                'concentration' => '30mg in 1ml',
            ),
            155 => 
            array (
                'drug_name' => 'Ferrous sulphate/folic acid',
                'concentration' => '200mg / 0.4mg',
            ),
            156 => 
            array (
                'drug_name' => 'Flucloxacillin',
                'concentration' => '125mg in 5ml',
            ),
            157 => 
            array (
                'drug_name' => 'Fluconazole',
                'concentration' => '200mg',
            ),
            158 => 
            array (
                'drug_name' => 'Fluconazole',
                'concentration' => '200mg in 100ml',
            ),
            159 => 
            array (
                'drug_name' => 'Fludrocortisone',
                'concentration' => '0.1mg',
            ),
            160 => 
            array (
                'drug_name' => 'Flumazenil',
                'concentration' => '0.1mg in 1 ml',
            ),
            161 => 
            array (
                'drug_name' => 'Fluorescin eye strips box/100',
                'concentration' => NULL,
            ),
            162 => 
            array (
                'drug_name' => 'Fluorometholone',
                'concentration' => '0.1%',
            ),
            163 => 
            array (
                'drug_name' => 'Fluorouracil ',
                'concentration' => '250mg in 5ml',
            ),
            164 => 
            array (
                'drug_name' => 'Fluorouracil ',
                'concentration' => '500mg in 10ml',
            ),
            165 => 
            array (
                'drug_name' => 'Fluorouracil ',
                'concentration' => '500mg in 20ml',
            ),
            166 => 
            array (
                'drug_name' => 'Fluphenazine decanoate',
                'concentration' => '25mg',
            ),
            167 => 
            array (
                'drug_name' => 'Folic acid ',
                'concentration' => '5mg',
            ),
            168 => 
            array (
                'drug_name' => 'Formaldehyde solution 2L',
                'concentration' => '37%',
            ),
            169 => 
            array (
                'drug_name' => 'Frusemide',
                'concentration' => '20mg in 2ml',
            ),
            170 => 
            array (
                'drug_name' => 'Frusemide ',
                'concentration' => '20mg',
            ),
            171 => 
            array (
                'drug_name' => 'Frusemide',
                'concentration' => '40mg',
            ),
            172 => 
            array (
            'drug_name' => 'Gaviscon® (or equivalent)',
                'concentration' => NULL,
            ),
            173 => 
            array (
                'drug_name' => 'Gel, Ultrasound',
                'concentration' => NULL,
            ),
            174 => 
            array (
                'drug_name' => 'Gentamicin ',
                'concentration' => '80mg in 2ml',
            ),
            175 => 
            array (
                'drug_name' => 'Gentamicin 10ml',
                'concentration' => '0.3%',
            ),
            176 => 
            array (
                'drug_name' => 'Gentian violet paint',
                'concentration' => '0.5%',
            ),
            177 => 
            array (
                'drug_name' => 'Glibenclamide',
                'concentration' => '5mg',
            ),
            178 => 
            array (
                'drug_name' => 'Glipizide',
                'concentration' => '5mg',
            ),
            179 => 
            array (
            'drug_name' => 'Glutaraldehyde (eg. Cidex®)',
                'concentration' => '2%',
            ),
            180 => 
            array (
                'drug_name' => 'Glyceryl trinitrate',
                'concentration' => '0.6mg',
            ),
            181 => 
            array (
                'drug_name' => 'Glycopyrrolate',
                'concentration' => '200mcg in 1ml',
            ),
            182 => 
            array (
                'drug_name' => 'Griseofulvin ',
                'concentration' => '500mg',
            ),
            183 => 
            array (
                'drug_name' => 'Haloperidol',
                'concentration' => '5mg in 1ml',
            ),
            184 => 
            array (
                'drug_name' => 'Haloperidol',
                'concentration' => '5mg',
            ),
            185 => 
            array (
                'drug_name' => 'Halothane anaesthetic',
                'concentration' => NULL,
            ),
            186 => 
            array (
                'drug_name' => 'Heparin ',
                'concentration' => '25,000IU in 5ml',
            ),
            187 => 
            array (
                'drug_name' => 'Heparinised saline ',
                'concentration' => '50IU in 5ml',
            ),
            188 => 
            array (
                'drug_name' => 'Hepatitis B vaccine',
                'concentration' => '10mcg in 0.5ml',
            ),
            189 => 
            array (
                'drug_name' => 'Homatropine',
                'concentration' => '2%',
            ),
            190 => 
            array (
                'drug_name' => 'Hyaluronidase',
                'concentration' => '1,500IU',
            ),
            191 => 
            array (
                'drug_name' => 'Hydralazine',
                'concentration' => '20mg',
            ),
            192 => 
            array (
                'drug_name' => 'Hydralazine',
                'concentration' => '25mg',
            ),
            193 => 
            array (
                'drug_name' => 'Hydrochlorothiazide ',
                'concentration' => '25mg',
            ),
            194 => 
            array (
                'drug_name' => 'Hydrocortisone ',
                'concentration' => '1%',
            ),
            195 => 
            array (
                'drug_name' => 'Hydrocortisone sodium',
                'concentration' => '100mg',
            ),
            196 => 
            array (
                'drug_name' => 'Hydrogen Peroxide',
                'concentration' => '30%',
            ),
            197 => 
            array (
                'drug_name' => 'Hydroxychloroquine',
                'concentration' => '200mg',
            ),
            198 => 
            array (
                'drug_name' => 'Hydroxycobalamin',
                'concentration' => '1mg in 1ml',
            ),
            199 => 
            array (
                'drug_name' => 'Hydroxypropylmethylcellulose',
                'concentration' => '20mg in 1ml',
            ),
            200 => 
            array (
                'drug_name' => 'Hydroxyurea',
                'concentration' => '500mg',
            ),
            201 => 
            array (
                'drug_name' => 'Hyoscine Butylbromide ',
                'concentration' => '10mg',
            ),
            202 => 
            array (
                'drug_name' => 'Hyoscine Butylbromide',
                'concentration' => '20mg in 1ml',
            ),
            203 => 
            array (
                'drug_name' => 'Hypromellose ',
                'concentration' => '0.5%',
            ),
            204 => 
            array (
                'drug_name' => 'Ibuprofen',
                'concentration' => '100mg in 5ml',
            ),
            205 => 
            array (
                'drug_name' => 'Ibuprofen',
                'concentration' => '200mg',
            ),
            206 => 
            array (
                'drug_name' => 'Idoxuridine 5g ',
                'concentration' => '0.5%',
            ),
            207 => 
            array (
                'drug_name' => 'Imatinib',
                'concentration' => '400mg',
            ),
            208 => 
            array (
                'drug_name' => 'Inactivated Polio vaccine',
                'concentration' => '0.5mL',
            ),
            209 => 
            array (
                'drug_name' => 'Indomethacin ',
                'concentration' => '25mg',
            ),
            210 => 
            array (
                'drug_name' => 'Insulin Human soluble Actrapid® 10ml',
                'concentration' => '100IU in 1ml',
            ),
            211 => 
            array (
                'drug_name' => 'Insulin Human Isophane 10ml',
                'concentration' => '100IU in 1ml',
            ),
            212 => 
            array (
                'drug_name' => 'Insulin Human biphasic Mixtard® 30/70 10ml',
                'concentration' => '100IU in 1ml',
            ),
            213 => 
            array (
                'drug_name' => 'Iodine tincture 500ml ',
                'concentration' => NULL,
            ),
            214 => 
            array (
                'drug_name' => 'Ipratropium',
                'concentration' => '250mcg in 1ml',
            ),
            215 => 
            array (
                'drug_name' => 'Iron dextran 2ml',
                'concentration' => '50mg in 1ml',
            ),
            216 => 
            array (
                'drug_name' => 'Isoflurane anaesthetic',
                'concentration' => NULL,
            ),
            217 => 
            array (
                'drug_name' => 'Isoniazid ',
                'concentration' => '100mg',
            ),
            218 => 
            array (
                'drug_name' => 'Isoniazid',
                'concentration' => '300mg',
            ),
            219 => 
            array (
                'drug_name' => 'Isoniazid/Rifamp/Ethambutol/Pyrazinamide',
                'concentration' => '75/150/275/400mg',
            ),
            220 => 
            array (
                'drug_name' => 'Isopropyl alcohol',
                'concentration' => '70%',
            ),
            221 => 
            array (
                'drug_name' => 'Isosorbide dinitrate ',
                'concentration' => '10mg',
            ),
            222 => 
            array (
                'drug_name' => 'Ivermectin',
                'concentration' => '3mg',
            ),
            223 => 
            array (
                'drug_name' => 'Ketamine ',
                'concentration' => '500mg in 10ml',
            ),
            224 => 
            array (
                'drug_name' => 'Ketoconazole ',
                'concentration' => '200mg',
            ),
            225 => 
            array (
                'drug_name' => 'Lactulose 500ml',
                'concentration' => '3.3g in 5ml',
            ),
            226 => 
            array (
                'drug_name' => 'Lamivudine',
                'concentration' => '150mg',
            ),
            227 => 
            array (
                'drug_name' => 'Lamivudine ',
                'concentration' => '10mg in 5ml',
            ),
            228 => 
            array (
                'drug_name' => 'Lamivudine/Tenofovir/Efavirenz',
                'concentration' => '300/300/600mg',
            ),
            229 => 
            array (
                'drug_name' => 'Lamivudine/Zidovudine',
                'concentration' => '150/300mg',
            ),
            230 => 
            array (
                'drug_name' => 'Lamivudine/Zidovudine/Efavirenz',
                'concentration' => '150/300/600mg',
            ),
            231 => 
            array (
                'drug_name' => 'Latanoprost',
                'concentration' => '0.005%',
            ),
            232 => 
            array (
                'drug_name' => 'Levodopa/Carbidopa',
                'concentration' => '100mg / 25mg',
            ),
            233 => 
            array (
                'drug_name' => 'Levodopa/Carbidopa',
                'concentration' => '250mg / 25mg',
            ),
            234 => 
            array (
                'drug_name' => 'Levonorgestrel',
                'concentration' => '0.03mg',
            ),
            235 => 
            array (
                'drug_name' => 'Levonorgestrel',
                'concentration' => '1.5mg',
            ),
            236 => 
            array (
                'drug_name' => 'Levonorgestrel/Ethinyloestradiol',
                'concentration' => '0.15mg / 0.03mg',
            ),
            237 => 
            array (
                'drug_name' => 'Lignocaine',
                'concentration' => '0.5%',
            ),
            238 => 
            array (
                'drug_name' => 'Lignocaine',
                'concentration' => '1%',
            ),
            239 => 
            array (
                'drug_name' => 'Lignocaine topical solution',
                'concentration' => '4%',
            ),
            240 => 
            array (
            'drug_name' => 'Lignocaine/Adrenaline 20ml (1:200,000)',
                'concentration' => '2%',
            ),
            241 => 
            array (
                'drug_name' => 'Lignocaine/Chlorhexidine',
                'concentration' => '2% / 0.05%',
            ),
            242 => 
            array (
                'drug_name' => 'Lopinavir/Ritonavir ',
                'concentration' => '200mg / 500mg',
            ),
            243 => 
            array (
                'drug_name' => 'Lubricating jelly',
                'concentration' => NULL,
            ),
            244 => 
            array (
                'drug_name' => 'Magnesium Sulphate ',
                'concentration' => '50%',
            ),
            245 => 
            array (
                'drug_name' => 'Magnesium Trisilicate',
                'concentration' => '250mg/120mg',
            ),
            246 => 
            array (
                'drug_name' => 'Mannitol 500ml',
                'concentration' => '20%',
            ),
            247 => 
            array (
                'drug_name' => 'MB adult leprosy pack: ',
                'concentration' => NULL,
            ),
            248 => 
            array (
                'drug_name' => '  Rifampicin 300mg/clofazimine100mg-50mg/dapsone100mg',
                'concentration' => NULL,
            ),
            249 => 
            array (
                'drug_name' => 'MB child leprosy pack: ',
                'concentration' => NULL,
            ),
            250 => 
            array (
                'drug_name' => '  Rifampicin 300mg/clofazimine 50mg/dapsone 50mg',
                'concentration' => NULL,
            ),
            251 => 
            array (
            'drug_name' => 'Measles Rubella (MR) Vaccine',
                'concentration' => '0.5ml',
            ),
            252 => 
            array (
            'drug_name' => 'Medroxyprogesterone (Depo Provera or equiv)',
                'concentration' => '150mg in 1ml',
            ),
            253 => 
            array (
                'drug_name' => 'Melphalan ',
                'concentration' => '2mg',
            ),
            254 => 
            array (
                'drug_name' => 'Mercaptopurine',
                'concentration' => '50mg',
            ),
            255 => 
            array (
                'drug_name' => 'Mesterolone',
                'concentration' => '25mg',
            ),
            256 => 
            array (
                'drug_name' => 'Metaraminol',
                'concentration' => '10mg in 1ml',
            ),
            257 => 
            array (
                'drug_name' => 'Metformin ',
                'concentration' => '500mg',
            ),
            258 => 
            array (
                'drug_name' => 'Methionine ',
                'concentration' => '500mg',
            ),
            259 => 
            array (
                'drug_name' => 'Methotrexate',
                'concentration' => '50mg in 2ml',
            ),
            260 => 
            array (
                'drug_name' => 'Methotrexate',
                'concentration' => '2.5mg',
            ),
            261 => 
            array (
                'drug_name' => 'Methyldopa',
                'concentration' => '250mg',
            ),
            262 => 
            array (
                'drug_name' => 'Methylene blue ',
                'concentration' => '50mg in 5ml',
            ),
            263 => 
            array (
                'drug_name' => 'Methylprednisolone',
                'concentration' => '40mg in 1ml',
            ),
            264 => 
            array (
                'drug_name' => 'Methylprednisolone',
                'concentration' => '500mg',
            ),
            265 => 
            array (
                'drug_name' => 'Methylsalicylate 20g',
                'concentration' => '50%',
            ),
            266 => 
            array (
                'drug_name' => 'Metoclopramide',
                'concentration' => '10mg',
            ),
            267 => 
            array (
                'drug_name' => 'Metoclopramide',
                'concentration' => '10mg in 2ml ',
            ),
            268 => 
            array (
                'drug_name' => 'Metronidazole ',
                'concentration' => '200mg in 5ml',
            ),
            269 => 
            array (
                'drug_name' => 'Metronidazole ',
                'concentration' => '250mg',
            ),
            270 => 
            array (
                'drug_name' => 'Metronidazole',
                'concentration' => '500mg',
            ),
            271 => 
            array (
                'drug_name' => 'Metronidazole ',
                'concentration' => '500mg in 100ml',
            ),
            272 => 
            array (
                'drug_name' => 'Midazolam ',
                'concentration' => '5mg in 1ml',
            ),
            273 => 
            array (
                'drug_name' => 'Midazolam',
                'concentration' => '5mg in 5ml',
            ),
            274 => 
            array (
                'drug_name' => 'Midazolam ',
                'concentration' => NULL,
            ),
            275 => 
            array (
                'drug_name' => 'Misoprostol ',
                'concentration' => '200mcg',
            ),
            276 => 
            array (
                'drug_name' => 'Morphine ',
                'concentration' => '10mg in 1ml',
            ),
            277 => 
            array (
                'drug_name' => 'Morphine',
                'concentration' => '10mg in 1ml',
            ),
            278 => 
            array (
                'drug_name' => 'Morphine ',
                'concentration' => '10mg',
            ),
            279 => 
            array (
                'drug_name' => 'Multivitamin',
                'concentration' => NULL,
            ),
            280 => 
            array (
                'drug_name' => 'Multivitamin drops 30ml',
                'concentration' => NULL,
            ),
            281 => 
            array (
            'drug_name' => 'Naloxone (neonatal)',
                'concentration' => '40mcg in 2ml',
            ),
            282 => 
            array (
                'drug_name' => 'Naloxone',
                'concentration' => '400mcg in 1ml',
            ),
            283 => 
            array (
                'drug_name' => 'Naphazoline/Antazoline',
                'concentration' => '0.025%/0.5%',
            ),
            284 => 
            array (
                'drug_name' => 'Natamycin ',
                'concentration' => '5%',
            ),
            285 => 
            array (
                'drug_name' => 'Neostigmine',
                'concentration' => '0.5mg in 1ml',
            ),
            286 => 
            array (
                'drug_name' => 'Neostigmine',
                'concentration' => '2.5mg in 1ml',
            ),
            287 => 
            array (
                'drug_name' => 'Nevirapine ',
                'concentration' => '10mg in 1ml',
            ),
            288 => 
            array (
                'drug_name' => 'Nevirapine',
                'concentration' => '200mg ',
            ),
            289 => 
            array (
                'drug_name' => 'Nifedipine',
                'concentration' => '20mg',
            ),
            290 => 
            array (
                'drug_name' => 'Nitrofurantoin',
                'concentration' => '50mg',
            ),
            291 => 
            array (
                'drug_name' => 'Nitrous Oxide Inhalation',
                'concentration' => NULL,
            ),
            292 => 
            array (
                'drug_name' => 'Noradrenaline',
                'concentration' => '2mg in 2ml',
            ),
            293 => 
            array (
                'drug_name' => 'Norethisterone',
                'concentration' => '5mg',
            ),
            294 => 
            array (
                'drug_name' => 'Nystatin oral drops',
                'concentration' => '100,000U in 1ml',
            ),
            295 => 
            array (
                'drug_name' => 'Nystatin ',
                'concentration' => '100,000U',
            ),
            296 => 
            array (
                'drug_name' => 'Olive oil ',
                'concentration' => NULL,
            ),
            297 => 
            array (
                'drug_name' => 'Omeprazole',
                'concentration' => '20mg',
            ),
            298 => 
            array (
                'drug_name' => 'Omeprazole',
                'concentration' => '40mg',
            ),
            299 => 
            array (
                'drug_name' => 'Oral Polio Vaccine',
                'concentration' => '10 doses in 1vial',
            ),
            300 => 
            array (
                'drug_name' => 'Oral Rehydration Salts',
                'concentration' => NULL,
            ),
            301 => 
            array (
                'drug_name' => 'Oxybutynin',
                'concentration' => '5mg',
            ),
            302 => 
            array (
                'drug_name' => 'Oxycodone',
                'concentration' => '5mg',
            ),
            303 => 
            array (
                'drug_name' => 'Oxygen inhalation',
                'concentration' => NULL,
            ),
            304 => 
            array (
                'drug_name' => 'Oxytocin ',
                'concentration' => '5IU in 1ml',
            ),
            305 => 
            array (
                'drug_name' => 'Pancuronium ',
                'concentration' => '4mg in 2ml',
            ),
            306 => 
            array (
                'drug_name' => 'Paracetamol ',
                'concentration' => '100mg',
            ),
            307 => 
            array (
                'drug_name' => 'Paracetamol ',
                'concentration' => '500mg',
            ),
            308 => 
            array (
                'drug_name' => 'Paracetamol',
                'concentration' => '120mg in 5ml',
            ),
            309 => 
            array (
                'drug_name' => 'Paracetamol ',
                'concentration' => '125mg',
            ),
            310 => 
            array (
                'drug_name' => 'Paracetamol',
                'concentration' => '250mg',
            ),
            311 => 
            array (
                'drug_name' => 'Paracetamol',
                'concentration' => '500mg',
            ),
            312 => 
            array (
                'drug_name' => 'Paracetamol/Codeine Phosphate',
                'concentration' => '500mg / 8mg',
            ),
            313 => 
            array (
                'drug_name' => ' Rifampicin 300mg/dapsone 100mg',
                'concentration' => NULL,
            ),
            314 => 
            array (
                'drug_name' => ' Rifampicin 300mg-150mg /dapsone 50mg',
                'concentration' => NULL,
            ),
            315 => 
            array (
                'drug_name' => 'Penicillin Procaine Fort 4 mega IU ',
                'concentration' => '250mg in 1ml',
            ),
            316 => 
            array (
                'drug_name' => 'Penicillin V ',
                'concentration' => '250mg',
            ),
            317 => 
            array (
            'drug_name' => 'Pentavalent Vaccine (DPT-HEPB-HIB)',
                'concentration' => NULL,
            ),
            318 => 
            array (
                'drug_name' => 'Permethrin',
                'concentration' => '10mg in 1ml',
            ),
            319 => 
            array (
                'drug_name' => 'Pethidine',
                'concentration' => '50mg in 1ml',
            ),
            320 => 
            array (
                'drug_name' => 'Pethidine',
                'concentration' => '100mg in 2ml',
            ),
            321 => 
            array (
                'drug_name' => 'Phenobarbitone ',
                'concentration' => '200mg in 1ml',
            ),
            322 => 
            array (
                'drug_name' => 'Phenobarbitone ',
                'concentration' => '30mg',
            ),
            323 => 
            array (
                'drug_name' => 'Phenoxybenzamine',
                'concentration' => '10mg',
            ),
            324 => 
            array (
                'drug_name' => 'Phenylephrine minims ',
                'concentration' => '2.5%',
            ),
            325 => 
            array (
                'drug_name' => 'Phenylephrine minims ',
                'concentration' => '10%',
            ),
            326 => 
            array (
                'drug_name' => 'Phenytoin',
                'concentration' => '250mg in 5ml',
            ),
            327 => 
            array (
                'drug_name' => 'Phenytoin ',
                'concentration' => '100mg',
            ),
            328 => 
            array (
                'drug_name' => 'Phytomenadione ',
                'concentration' => '1mg in 1ml',
            ),
            329 => 
            array (
                'drug_name' => 'Phytomenadione ',
                'concentration' => '10mg in 1ml',
            ),
            330 => 
            array (
                'drug_name' => 'Picoprep',
                'concentration' => '15.5g',
            ),
            331 => 
            array (
                'drug_name' => 'Pilocarpine',
                'concentration' => '4%',
            ),
            332 => 
            array (
            'drug_name' => 'Pneumococcal conjugate Vaccine (13vPCV)',
                'concentration' => '0.5mL',
            ),
            333 => 
            array (
            'drug_name' => 'Polygeline infusion (Haemaccel or equiv)',
                'concentration' => NULL,
            ),
            334 => 
            array (
                'drug_name' => 'Polyhydroxymethylcellulose',
                'concentration' => '2%',
            ),
            335 => 
            array (
                'drug_name' => 'Potassium chloride 10ml',
                'concentration' => '10%',
            ),
            336 => 
            array (
                'drug_name' => 'Potassium chloride',
                'concentration' => '600mg',
            ),
            337 => 
            array (
                'drug_name' => 'Povidone iodine 500ml',
                'concentration' => '10%',
            ),
            338 => 
            array (
                'drug_name' => 'Povidone iodine surgical hand scrub',
                'concentration' => '7.5%',
            ),
            339 => 
            array (
                'drug_name' => 'Pralidoxime',
                'concentration' => '1g in 5ml',
            ),
            340 => 
            array (
                'drug_name' => 'Prazosin',
                'concentration' => '1mg',
            ),
            341 => 
            array (
                'drug_name' => 'Prednisolone 10ml ',
                'concentration' => '0.5%',
            ),
            342 => 
            array (
                'drug_name' => 'Prednisolone 5ml ',
                'concentration' => '1%',
            ),
            343 => 
            array (
                'drug_name' => 'Prednisolone',
                'concentration' => '5mg',
            ),
            344 => 
            array (
                'drug_name' => 'Prednisolone',
                'concentration' => '25mg',
            ),
            345 => 
            array (
                'drug_name' => 'Primaquine',
                'concentration' => '7.5mg',
            ),
            346 => 
            array (
                'drug_name' => 'Probenecid',
                'concentration' => '500mg',
            ),
            347 => 
            array (
                'drug_name' => 'Procarbazine',
                'concentration' => '50mg',
            ),
            348 => 
            array (
                'drug_name' => 'Prochlorperazine ',
                'concentration' => '12.5mg in 1ml',
            ),
            349 => 
            array (
                'drug_name' => 'Promethazine',
                'concentration' => '10mg',
            ),
            350 => 
            array (
                'drug_name' => 'Promethazine',
                'concentration' => '25mg',
            ),
            351 => 
            array (
                'drug_name' => 'Promethazine',
                'concentration' => '50mg in 2ml',
            ),
            352 => 
            array (
                'drug_name' => 'Promethazine',
                'concentration' => '5mg in 5ml',
            ),
            353 => 
            array (
                'drug_name' => 'Propofol ',
                'concentration' => '200mg in 20ml',
            ),
            354 => 
            array (
                'drug_name' => 'Propranolol',
                'concentration' => '1mg in 1ml',
            ),
            355 => 
            array (
                'drug_name' => 'Propranolol',
                'concentration' => '40mg',
            ),
            356 => 
            array (
                'drug_name' => 'Propylthiouracil ',
                'concentration' => '50mg',
            ),
            357 => 
            array (
                'drug_name' => 'Protamine',
                'concentration' => '50mg in 5ml',
            ),
            358 => 
            array (
                'drug_name' => 'Pyrazinamide',
                'concentration' => '500mg',
            ),
            359 => 
            array (
                'drug_name' => 'Pyridostigmine',
                'concentration' => '60mg',
            ),
            360 => 
            array (
            'drug_name' => 'Pyridoxine (Vit B6)',
                'concentration' => '50mg',
            ),
            361 => 
            array (
                'drug_name' => 'Quinine dihydrochloride',
                'concentration' => '600mg in 10ml',
            ),
            362 => 
            array (
                'drug_name' => 'Quinine sulphate',
                'concentration' => '300mg',
            ),
            363 => 
            array (
                'drug_name' => 'Ranitidine ',
                'concentration' => '150mg',
            ),
            364 => 
            array (
                'drug_name' => 'Ranitidine ',
                'concentration' => '25mg in 1ml',
            ),
            365 => 
            array (
                'drug_name' => 'Ranitidine ',
                'concentration' => '15mg in 1ml',
            ),
            366 => 
            array (
                'drug_name' => 'ReSoMal oral rehydration salt',
                'concentration' => NULL,
            ),
            367 => 
            array (
                'drug_name' => 'Rifampicin',
                'concentration' => '150mg',
            ),
            368 => 
            array (
                'drug_name' => 'Rifampicin',
                'concentration' => '300mg',
            ),
            369 => 
            array (
                'drug_name' => 'Rifampicin',
                'concentration' => '100mg in 5ml',
            ),
            370 => 
            array (
                'drug_name' => 'Rifampicin/Isoniazid',
                'concentration' => '150 / 75mg',
            ),
            371 => 
            array (
                'drug_name' => 'Rifampicin/Isoniazid',
                'concentration' => '300 / 150mg',
            ),
            372 => 
            array (
                'drug_name' => 'Rocuronium bromide',
                'concentration' => '50mg in 5ml',
            ),
            373 => 
            array (
                'drug_name' => 'Salbutamol',
                'concentration' => '100mcg/dose',
            ),
            374 => 
            array (
                'drug_name' => 'Salbutamol',
                'concentration' => '0.5mg in 1ml',
            ),
            375 => 
            array (
                'drug_name' => 'Salbutamol ',
                'concentration' => '4mg',
            ),
            376 => 
            array (
                'drug_name' => 'Salbutamol nebs  ',
                'concentration' => '5mg in 1ml',
            ),
            377 => 
            array (
                'drug_name' => 'Silver nitrate pencil',
                'concentration' => '75%',
            ),
            378 => 
            array (
                'drug_name' => 'Silver sulphadiazine 50g',
                'concentration' => '1%',
            ),
            379 => 
            array (
                'drug_name' => 'Simvastatin',
                'concentration' => '20mg',
            ),
            380 => 
            array (
                'drug_name' => 'Soda lime granules 5L',
                'concentration' => NULL,
            ),
            381 => 
            array (
                'drug_name' => 'Sodium bicarbonate 20ml',
                'concentration' => '8.4%',
            ),
            382 => 
            array (
                'drug_name' => 'Sodium chloride 1000ml',
                'concentration' => '0.9%',
            ),
            383 => 
            array (
                'drug_name' => 'Sodium chloride 10ml',
                'concentration' => '0.9%',
            ),
            384 => 
            array (
                'drug_name' => 'Sodium chloride 30ml',
                'concentration' => '0.9%',
            ),
            385 => 
            array (
                'drug_name' => 'Sodium chloride powder 5kg',
                'concentration' => NULL,
            ),
            386 => 
            array (
                'drug_name' => 'Sodium citrate 30ml sachets',
                'concentration' => '8.80%',
            ),
            387 => 
            array (
            'drug_name' => 'Sodium lactate comp (Hartmann’s) 1000ml',
                'concentration' => NULL,
            ),
            388 => 
            array (
                'drug_name' => 'Sodium nitroprusside',
                'concentration' => '50mg',
            ),
            389 => 
            array (
            'drug_name' => 'Sodium Polystyrene (Resonium A)',
                'concentration' => '454g',
            ),
            390 => 
            array (
                'drug_name' => 'Sodium tetradecyl 2ml',
                'concentration' => '3%',
            ),
            391 => 
            array (
                'drug_name' => 'Spectinomycin ',
                'concentration' => '2g',
            ),
            392 => 
            array (
                'drug_name' => 'Spironolactone ',
                'concentration' => '25mg',
            ),
            393 => 
            array (
            'drug_name' => 'STI pack: Azithromycin(2)/cefixime(1)',
                'concentration' => '500/400mg',
            ),
            394 => 
            array (
                'drug_name' => 'Streptokinase',
                'concentration' => '1,500,000 IU',
            ),
            395 => 
            array (
                'drug_name' => 'Streptomycin ',
                'concentration' => '1g',
            ),
            396 => 
            array (
                'drug_name' => 'Sumatriptan',
                'concentration' => '50mg',
            ),
            397 => 
            array (
                'drug_name' => 'Suxamethonium ',
                'concentration' => '100mg in 2ml',
            ),
            398 => 
            array (
                'drug_name' => 'Tamoxifen',
                'concentration' => '20mg',
            ),
            399 => 
            array (
                'drug_name' => 'TB pack category II',
                'concentration' => NULL,
            ),
            400 => 
            array (
                'drug_name' => 'TB pack category I & III',
                'concentration' => NULL,
            ),
            401 => 
            array (
                'drug_name' => 'Terbinafine',
                'concentration' => '250mg',
            ),
            402 => 
            array (
                'drug_name' => 'Tetanus toxoid Vaccine',
                'concentration' => '10 doses in 1vial',
            ),
            403 => 
            array (
                'drug_name' => 'Tetracycline 4g tube',
                'concentration' => '1%',
            ),
            404 => 
            array (
                'drug_name' => 'Thiopentone sodium',
                'concentration' => '0.5g',
            ),
            405 => 
            array (
                'drug_name' => 'Thyroxine',
                'concentration' => '0.1mg',
            ),
            406 => 
            array (
                'drug_name' => 'Timolol',
                'concentration' => '0.25%',
            ),
            407 => 
            array (
                'drug_name' => 'Timolol ',
                'concentration' => '0.5%',
            ),
            408 => 
            array (
                'drug_name' => 'Tinidazole',
                'concentration' => '500mg',
            ),
            409 => 
            array (
                'drug_name' => 'Triamcinolone',
                'concentration' => '40mg in 1ml',
            ),
            410 => 
            array (
                'drug_name' => 'Trifluoperazine',
                'concentration' => '5mg',
            ),
            411 => 
            array (
                'drug_name' => 'Tropicamide 15ml',
                'concentration' => '1%',
            ),
            412 => 
            array (
            'drug_name' => 'Tuberculin PPD (Mantoux) 10ml ',
                'concentration' => NULL,
            ),
            413 => 
            array (
                'drug_name' => 'Urine reagent strip glucose/protein',
                'concentration' => NULL,
            ),
            414 => 
            array (
                'drug_name' => 'Valproate sodium ',
                'concentration' => '200mg',
            ),
            415 => 
            array (
                'drug_name' => 'Valproate sodium ',
                'concentration' => '500mg',
            ),
            416 => 
            array (
                'drug_name' => 'Vancomycin ',
                'concentration' => '500mg',
            ),
            417 => 
            array (
                'drug_name' => 'Vecuronium',
                'concentration' => '4mg',
            ),
            418 => 
            array (
                'drug_name' => 'Verapamil',
                'concentration' => '80mg',
            ),
            419 => 
            array (
                'drug_name' => 'Verapamil',
                'concentration' => '5mg in 2ml',
            ),
            420 => 
            array (
                'drug_name' => 'Vincristine ',
                'concentration' => '1mg in 1ml',
            ),
            421 => 
            array (
                'drug_name' => 'Vincristine ',
                'concentration' => '2mg in 2ml',
            ),
            422 => 
            array (
                'drug_name' => 'Vitamin A ',
                'concentration' => '100,000IU',
            ),
            423 => 
            array (
            'drug_name' => 'Warfarin (Coumadin)',
                'concentration' => '1mg',
            ),
            424 => 
            array (
            'drug_name' => 'Warfarin (Coumadin)',
                'concentration' => '2mg',
            ),
            425 => 
            array (
            'drug_name' => 'Warfarin (Coumadin)',
                'concentration' => '5mg',
            ),
            426 => 
            array (
            'drug_name' => 'Warfarin (Marevan)',
                'concentration' => '1mg',
            ),
            427 => 
            array (
            'drug_name' => 'Warfarin (Marevan) ',
                'concentration' => '3mg',
            ),
            428 => 
            array (
            'drug_name' => 'Warfarin (Marevan) ',
                'concentration' => '5mg',
            ),
            429 => 
            array (
                'drug_name' => 'Water for Injection 10ml',
                'concentration' => NULL,
            ),
            430 => 
            array (
                'drug_name' => 'Yellow fever Vaccine single dose',
                'concentration' => NULL,
            ),
            431 => 
            array (
                'drug_name' => 'Zidovudine ',
                'concentration' => '50mg in 5ml',
            ),
            432 => 
            array (
                'drug_name' => 'Zidovudine ',
                'concentration' => '300mg',
            ),
            433 => 
            array (
                'drug_name' => 'Zinc sulphate dispersible',
                'concentration' => '20mg',
            ),
            434 => 
            array (
                'drug_name' => 'Test',
                'concentration' => NULL,
            ),
            435 => 
            array (
                'drug_name' => 'Flagyl',
                'concentration' => NULL,
            ),
            436 => 
            array (
                'drug_name' => 'Nill',
                'concentration' => NULL,
            ),
            437 => 
            array (
                'drug_name' => 'Mixturd',
                'concentration' => NULL,
            ),
            438 => 
            array (
                'drug_name' => 'Flagyl / Fefol',
                'concentration' => NULL,
            ),
            439 => 
            array (
                'drug_name' => 'Fefol Cloxacilline',
                'concentration' => NULL,
            ),
            440 => 
            array (
                'drug_name' => 'Fefol',
                'concentration' => NULL,
            ),
            441 => 
            array (
                'drug_name' => 'HRZE',
                'concentration' => NULL,
            ),
            442 => 
            array (
                'drug_name' => 'FETOL',
                'concentration' => NULL,
            ),
            443 => 
            array (
                'drug_name' => 'Maxalon',
                'concentration' => NULL,
            ),
            444 => 
            array (
                'drug_name' => 'Fefol Amoxicillin Fl',
                'concentration' => NULL,
            ),
            445 => 
            array (
                'drug_name' => 'Flagyl Panadol',
                'concentration' => NULL,
            ),
            446 => 
            array (
                'drug_name' => 'Chemoterephy',
                'concentration' => NULL,
            ),
            447 => 
            array (
                'drug_name' => 'UPROFLOXALIA',
                'concentration' => NULL,
            ),
            448 => 
            array (
                'drug_name' => 'Ntrofurantoin',
                'concentration' => NULL,
            ),
            449 => 
            array (
                'drug_name' => 'SSD Cream',
                'concentration' => NULL,
            ),
            450 => 
            array (
                'drug_name' => 'SSG',
                'concentration' => NULL,
            ),
            451 => 
            array (
                'drug_name' => 'Nurofen Panadol',
                'concentration' => NULL,
            ),
            452 => 
            array (
                'drug_name' => 'Septrine Gprofloxan',
                'concentration' => NULL,
            ),
            453 => 
            array (
                'drug_name' => 'GILBENDAMIDE',
                'concentration' => NULL,
            ),
        ));
        
        
    }
}