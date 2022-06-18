<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cities')->delete();
        $cities = array(
            array('name' => "Bombuflat",'state_id' => 1),
            array('name' => "Garacharma",'state_id' => 1),
            array('name' => "Port Blair",'state_id' => 1),
            array('name' => "Rangat",'state_id' => 1),
            array('name' => "Addanki",'state_id' => 2),
            array('name' => "Adivivaram",'state_id' => 2),
            array('name' => "Adoni",'state_id' => 2),
            array('name' => "Aganampudi",'state_id' => 2),
            array('name' => "Ajjaram",'state_id' => 2),
            array('name' => "Akividu",'state_id' => 2),
            array('name' => "Akkarampalle",'state_id' => 2),
            array('name' => "Akkayapalle",'state_id' => 2),
            array('name' => "Akkireddipalem",'state_id' => 2),
            array('name' => "Alampur",'state_id' => 2),
            array('name' => "Amalapuram",'state_id' => 2),
            array('name' => "Amudalavalasa",'state_id' => 2),
            array('name' => "Amur",'state_id' => 2),
            array('name' => "Anakapalle",'state_id' => 2),
            array('name' => "Anantapur",'state_id' => 2),
            array('name' => "Andole",'state_id' => 2),
            array('name' => "Atmakur",'state_id' => 2),
            array('name' => "Attili",'state_id' => 2),
            array('name' => "Avanigadda",'state_id' => 2),
            array('name' => "Badepalli",'state_id' => 2),
            array('name' => "Badvel",'state_id' => 2),
            array('name' => "Balapur",'state_id' => 2),
            array('name' => "Bandarulanka",'state_id' => 2),
            array('name' => "Banganapalle",'state_id' => 2),
            array('name' => "Bapatla",'state_id' => 2),
            array('name' => "Bapulapadu",'state_id' => 2),
            array('name' => "Belampalli",'state_id' => 2),
            array('name' => "Bestavaripeta",'state_id' => 2),
            array('name' => "Betamcherla",'state_id' => 2),
            array('name' => "Bhattiprolu",'state_id' => 2),
            array('name' => "Bhimavaram",'state_id' => 2),
            array('name' => "Bhimunipatnam",'state_id' => 2),
            array('name' => "Bobbili",'state_id' => 2),
            array('name' => "Bombuflat",'state_id' => 2),
            array('name' => "Bommuru",'state_id' => 2),
            array('name' => "Bugganipalle",'state_id' => 2),
            array('name' => "Challapalle",'state_id' => 2),
            array('name' => "Chandur",'state_id' => 2),
            array('name' => "Chatakonda",'state_id' => 2),
            array('name' => "Chemmumiahpet",'state_id' => 2),
            array('name' => "Chidiga",'state_id' => 2),
            array('name' => "Chilakaluripet",'state_id' => 2),
            array('name' => "Chimakurthy",'state_id' => 2),
            array('name' => "Chinagadila",'state_id' => 2),
            array('name' => "Chinagantyada",'state_id' => 2),
            array('name' => "Chinnachawk",'state_id' => 2),
            array('name' => "Chintalavalasa",'state_id' => 2),
            array('name' => "Chipurupalle",'state_id' => 2),
            array('name' => "Chirala",'state_id' => 2),
            array('name' => "Chittoor",'state_id' => 2),
            array('name' => "Chodavaram",'state_id' => 2),
            array('name' => "Choutuppal",'state_id' => 2),
            array('name' => "Chunchupalle",'state_id' => 2),
            array('name' => "Cuddapah",'state_id' => 2),
            array('name' => "Cumbum",'state_id' => 2),
            array('name' => "Darnakal",'state_id' => 2),
            array('name' => "Dasnapur",'state_id' => 2),
            array('name' => "Dauleshwaram",'state_id' => 2),
            array('name' => "Dharmavaram",'state_id' => 2),
            array('name' => "Dhone",'state_id' => 2),
            array('name' => "Dommara Nandyal",'state_id' => 2),
            array('name' => "Dowlaiswaram",'state_id' => 2),
            array('name' => "East Godavari Dist.",'state_id' => 2),
            array('name' => "Eddumailaram",'state_id' => 2),
            array('name' => "Edulapuram",'state_id' => 2),
            array('name' => "Ekambara kuppam",'state_id' => 2),
            array('name' => "Eluru",'state_id' => 2),
            array('name' => "Enikapadu",'state_id' => 2),
            array('name' => "Fakirtakya",'state_id' => 2),
            array('name' => "Farrukhnagar",'state_id' => 2),
            array('name' => "Gaddiannaram",'state_id' => 2),
            array('name' => "Gajapathinagaram",'state_id' => 2),
            array('name' => "Gajularega",'state_id' => 2),
            array('name' => "Gajuvaka",'state_id' => 2),
            array('name' => "Gannavaram",'state_id' => 2),
            array('name' => "Garacharma",'state_id' => 2),
            array('name' => "Garimellapadu",'state_id' => 2),
            array('name' => "Giddalur",'state_id' => 2),
            array('name' => "Godavarikhani",'state_id' => 2),
            array('name' => "Gopalapatnam",'state_id' => 2),
            array('name' => "Gopalur",'state_id' => 2),
            array('name' => "Gorrekunta",'state_id' => 2),
            array('name' => "Gudivada",'state_id' => 2),
            array('name' => "Gudur",'state_id' => 2),
            array('name' => "Guntakal",'state_id' => 2),
            array('name' => "Guntur",'state_id' => 2),
            array('name' => "Guti",'state_id' => 2),
            array('name' => "Hindupur",'state_id' => 2),
            array('name' => "Hukumpeta",'state_id' => 2),
            array('name' => "Ichchapuram",'state_id' => 2),
            array('name' => "Isnapur",'state_id' => 2),
            array('name' => "Jaggayyapeta",'state_id' => 2),
            array('name' => "Jallaram Kamanpur",'state_id' => 2),
            array('name' => "Jammalamadugu",'state_id' => 2),
            array('name' => "Jangampalli",'state_id' => 2),
            array('name' => "Jarjapupeta",'state_id' => 2),
            array('name' => "Kadiri",'state_id' => 2),
            array('name' => "Kaikalur",'state_id' => 2),
            array('name' => "Kakinada",'state_id' => 2),
            array('name' => "Kallur",'state_id' => 2),
            array('name' => "Kalyandurg",'state_id' => 2),
            array('name' => "Kamalapuram",'state_id' => 2),
            array('name' => "Kamareddi",'state_id' => 2),
            array('name' => "Kanapaka",'state_id' => 2),
            array('name' => "Kanigiri",'state_id' => 2),
            array('name' => "Kanithi",'state_id' => 2),
            array('name' => "Kankipadu",'state_id' => 2),
            array('name' => "Kantabamsuguda",'state_id' => 2),
            array('name' => "Kanuru",'state_id' => 2),
            array('name' => "Karnul",'state_id' => 2),
            array('name' => "Katheru",'state_id' => 2),
            array('name' => "Kavali",'state_id' => 2),
            array('name' => "Kazipet",'state_id' => 2),
            array('name' => "Khanapuram Haveli",'state_id' => 2),
            array('name' => "Kodar",'state_id' => 2),
            array('name' => "Kollapur",'state_id' => 2),
            array('name' => "Kondapalem",'state_id' => 2),
            array('name' => "Kondapalle",'state_id' => 2),
            array('name' => "Kondukur",'state_id' => 2),
            array('name' => "Kosgi",'state_id' => 2),
            array('name' => "Kothavalasa",'state_id' => 2),
            array('name' => "Kottapalli",'state_id' => 2),
            array('name' => "Kovur",'state_id' => 2),
            array('name' => "Kovurpalle",'state_id' => 2),
            array('name' => "Kovvur",'state_id' => 2),
            array('name' => "Krishna",'state_id' => 2),
            array('name' => "Kuppam",'state_id' => 2),
            array('name' => "Kurmannapalem",'state_id' => 2),
            array('name' => "Kurnool",'state_id' => 2),
            array('name' => "Lakshettipet",'state_id' => 2),
            array('name' => "Lalbahadur Nagar",'state_id' => 2),
            array('name' => "Machavaram",'state_id' => 2),
            array('name' => "Macherla",'state_id' => 2),
            array('name' => "Machilipatnam",'state_id' => 2),
            array('name' => "Madanapalle",'state_id' => 2),
            array('name' => "Madaram",'state_id' => 2),
            array('name' => "Madhuravada",'state_id' => 2),
            array('name' => "Madikonda",'state_id' => 2),
            array('name' => "Madugule",'state_id' => 2),
            array('name' => "Mahabubnagar",'state_id' => 2),
            array('name' => "Mahbubabad",'state_id' => 2),
            array('name' => "Malkajgiri",'state_id' => 2),
            array('name' => "Mamilapalle",'state_id' => 2),
            array('name' => "Mancheral",'state_id' => 2),
            array('name' => "Mandapeta",'state_id' => 2),
            array('name' => "Mandasa",'state_id' => 2),
            array('name' => "Mangalagiri",'state_id' => 2),
            array('name' => "Manthani",'state_id' => 2),
            array('name' => "Markapur",'state_id' => 2),
            array('name' => "Marturu",'state_id' => 2),
            array('name' => "Metpalli",'state_id' => 2),
            array('name' => "Mindi",'state_id' => 2),
            array('name' => "Mirpet",'state_id' => 2),
            array('name' => "Moragudi",'state_id' => 2),
            array('name' => "Mothugudam",'state_id' => 2),
            array('name' => "Nagari",'state_id' => 2),
            array('name' => "Nagireddipalle",'state_id' => 2),
            array('name' => "Nandigama",'state_id' => 2),
            array('name' => "Nandikotkur",'state_id' => 2),
            array('name' => "Nandyal",'state_id' => 2),
            array('name' => "Narasannapeta",'state_id' => 2),
            array('name' => "Narasapur",'state_id' => 2),
            array('name' => "Narasaraopet",'state_id' => 2),
            array('name' => "Narayanavanam",'state_id' => 2),
            array('name' => "Narsapur",'state_id' => 2),
            array('name' => "Narsingi",'state_id' => 2),
            array('name' => "Narsipatnam",'state_id' => 2),
            array('name' => "Naspur",'state_id' => 2),
            array('name' => "Nathayyapalem",'state_id' => 2),
            array('name' => "Nayudupeta",'state_id' => 2),
            array('name' => "Nelimaria",'state_id' => 2),
            array('name' => "Nellore",'state_id' => 2),
            array('name' => "Nidadavole",'state_id' => 2),
            array('name' => "Nuzvid",'state_id' => 2),
            array('name' => "Omerkhan daira",'state_id' => 2),
            array('name' => "Ongole",'state_id' => 2),
            array('name' => "Osmania University",'state_id' => 2),
            array('name' => "Pakala",'state_id' => 2),
            array('name' => "Palakole",'state_id' => 2),
            array('name' => "Palakurthi",'state_id' => 2),
            array('name' => "Palasa",'state_id' => 2),
            array('name' => "Palempalle",'state_id' => 2),
            array('name' => "Palkonda",'state_id' => 2),
            array('name' => "Palmaner",'state_id' => 2),
            array('name' => "Pamur",'state_id' => 2),
            array('name' => "Panjim",'state_id' => 2),
            array('name' => "Papampeta",'state_id' => 2),
            array('name' => "Parasamba",'state_id' => 2),
            array('name' => "Parvatipuram",'state_id' => 2),
            array('name' => "Patancheru",'state_id' => 2),
            array('name' => "Payakaraopet",'state_id' => 2),
            array('name' => "Pedagantyada",'state_id' => 2),
            array('name' => "Pedana",'state_id' => 2),
            array('name' => "Peddapuram",'state_id' => 2),
            array('name' => "Pendurthi",'state_id' => 2),
            array('name' => "Penugonda",'state_id' => 2),
            array('name' => "Penukonda",'state_id' => 2),
            array('name' => "Phirangipuram",'state_id' => 2),
            array('name' => "Pithapuram",'state_id' => 2),
            array('name' => "Ponnur",'state_id' => 2),
            array('name' => "Port Blair",'state_id' => 2),
            array('name' => "Pothinamallayyapalem",'state_id' => 2),
            array('name' => "Prakasam",'state_id' => 2),
            array('name' => "Prasadampadu",'state_id' => 2),
            array('name' => "Prasantinilayam",'state_id' => 2),
            array('name' => "Proddatur",'state_id' => 2),
            array('name' => "Pulivendla",'state_id' => 2),
            array('name' => "Punganuru",'state_id' => 2),
            array('name' => "Puttur",'state_id' => 2),
            array('name' => "Qutubullapur",'state_id' => 2),
            array('name' => "Rajahmundry",'state_id' => 2),
            array('name' => "Rajamahendri",'state_id' => 2),
            array('name' => "Rajampet",'state_id' => 2),
            array('name' => "Rajendranagar",'state_id' => 2),
            array('name' => "Rajoli",'state_id' => 2),
            array('name' => "Ramachandrapuram",'state_id' => 2),
            array('name' => "Ramanayyapeta",'state_id' => 2),
            array('name' => "Ramapuram",'state_id' => 2),
            array('name' => "Ramarajupalli",'state_id' => 2),
            array('name' => "Ramavarappadu",'state_id' => 2),
            array('name' => "Rameswaram",'state_id' => 2),
            array('name' => "Rampachodavaram",'state_id' => 2),
            array('name' => "Ravulapalam",'state_id' => 2),
            array('name' => "Rayachoti",'state_id' => 2),
            array('name' => "Rayadrug",'state_id' => 2),
            array('name' => "Razam",'state_id' => 2),
            array('name' => "Razole",'state_id' => 2),
            array('name' => "Renigunta",'state_id' => 2),
            array('name' => "Repalle",'state_id' => 2),
            array('name' => "Rishikonda",'state_id' => 2),
            array('name' => "Salur",'state_id' => 2),
            array('name' => "Samalkot",'state_id' => 2),
            array('name' => "Sattenapalle",'state_id' => 2),
            array('name' => "Seetharampuram",'state_id' => 2),
            array('name' => "Serilungampalle",'state_id' => 2),
            array('name' => "Shankarampet",'state_id' => 2),
            array('name' => "Shar",'state_id' => 2),
            array('name' => "Singarayakonda",'state_id' => 2),
            array('name' => "Sirpur",'state_id' => 2),
            array('name' => "Sirsilla",'state_id' => 2),
            array('name' => "Sompeta",'state_id' => 2),
            array('name' => "Sriharikota",'state_id' => 2),
            array('name' => "Srikakulam",'state_id' => 2),
            array('name' => "Srikalahasti",'state_id' => 2),
            array('name' => "Sriramnagar",'state_id' => 2),
            array('name' => "Sriramsagar",'state_id' => 2),
            array('name' => "Srisailam",'state_id' => 2),
            array('name' => "Srisailamgudem Devasthanam",'state_id' => 2),
            array('name' => "Sulurpeta",'state_id' => 2),
            array('name' => "Suriapet",'state_id' => 2),
            array('name' => "Suryaraopet",'state_id' => 2),
            array('name' => "Tadepalle",'state_id' => 2),
            array('name' => "Tadepalligudem",'state_id' => 2),
            array('name' => "Tadpatri",'state_id' => 2),
            array('name' => "Tallapalle",'state_id' => 2),
            array('name' => "Tanuku",'state_id' => 2),
            array('name' => "Tekkali",'state_id' => 2),
            array('name' => "Tenali",'state_id' => 2),
            array('name' => "Tigalapahad",'state_id' => 2),
            array('name' => "Tiruchanur",'state_id' => 2),
            array('name' => "Tirumala",'state_id' => 2),
            array('name' => "Tirupati",'state_id' => 2),
            array('name' => "Tirvuru",'state_id' => 2),
            array('name' => "Trimulgherry",'state_id' => 2),
            array('name' => "Tuni",'state_id' => 2),
            array('name' => "Turangi",'state_id' => 2),
            array('name' => "Ukkayapalli",'state_id' => 2),
            array('name' => "Ukkunagaram",'state_id' => 2),
            array('name' => "Uppal Kalan",'state_id' => 2),
            array('name' => "Upper Sileru",'state_id' => 2),
            array('name' => "Uravakonda",'state_id' => 2),
            array('name' => "Vadlapudi",'state_id' => 2),
            array('name' => "Vaparala",'state_id' => 2),
            array('name' => "Vemalwada",'state_id' => 2),
            array('name' => "Venkatagiri",'state_id' => 2),
            array('name' => "Venkatapuram",'state_id' => 2),
            array('name' => "Vepagunta",'state_id' => 2),
            array('name' => "Vetapalem",'state_id' => 2),
            array('name' => "Vijayapuri",'state_id' => 2),
            array('name' => "Vijayapuri South",'state_id' => 2),
            array('name' => "Vijayawada",'state_id' => 2),
            array('name' => "Vinukonda",'state_id' => 2),
            array('name' => "Visakhapatnam",'state_id' => 2),
            array('name' => "Vizianagaram",'state_id' => 2),
            array('name' => "Vuyyuru",'state_id' => 2),
            array('name' => "Wanparti",'state_id' => 2),
            array('name' => "West Godavari Dist.",'state_id' => 2),
            array('name' => "Yadagirigutta",'state_id' => 2),
            array('name' => "Yarada",'state_id' => 2),
            array('name' => "Yellamanchili",'state_id' => 2),
            array('name' => "Yemmiganur",'state_id' => 2),
            array('name' => "Yenamalakudru",'state_id' => 2),
            array('name' => "Yendada",'state_id' => 2),
            array('name' => "Yerraguntla",'state_id' => 2),
            array('name' => "Along",'state_id' => 3),
            array('name' => "Basar",'state_id' => 3),
            array('name' => "Bondila",'state_id' => 3),
            array('name' => "Changlang",'state_id' => 3),
            array('name' => "Daporijo",'state_id' => 3),
            array('name' => "Deomali",'state_id' => 3),
            array('name' => "Itanagar",'state_id' => 3),
            array('name' => "Jairampur",'state_id' => 3),
            array('name' => "Khonsa",'state_id' => 3),
            array('name' => "Naharlagun",'state_id' => 3),
            array('name' => "Namsai",'state_id' => 3),
            array('name' => "Pasighat",'state_id' => 3),
            array('name' => "Roing",'state_id' => 3),
            array('name' => "Seppa",'state_id' => 3),
            array('name' => "Tawang",'state_id' => 3),
            array('name' => "Tezu",'state_id' => 3),
            array('name' => "Ziro",'state_id' => 3),
            array('name' => "Abhayapuri",'state_id' => 4),
            array('name' => "Ambikapur",'state_id' => 4),
            array('name' => "Amguri",'state_id' => 4),
            array('name' => "Anand Nagar",'state_id' => 4),
            array('name' => "Badarpur",'state_id' => 4),
            array('name' => "Badarpur Railway Town",'state_id' => 4),
            array('name' => "Bahbari Gaon",'state_id' => 4),
            array('name' => "Bamun Sualkuchi",'state_id' => 4),
            array('name' => "Barbari",'state_id' => 4),
            array('name' => "Barpathar",'state_id' => 4),
            array('name' => "Barpeta",'state_id' => 4),
            array('name' => "Barpeta Road",'state_id' => 4),
            array('name' => "Basugaon",'state_id' => 4),
            array('name' => "Bihpuria",'state_id' => 4),
            array('name' => "Bijni",'state_id' => 4),
            array('name' => "Bilasipara",'state_id' => 4),
            array('name' => "Biswanath Chariali",'state_id' => 4),
            array('name' => "Bohori",'state_id' => 4),
            array('name' => "Bokajan",'state_id' => 4),
            array('name' => "Bokokhat",'state_id' => 4),
            array('name' => "Bongaigaon",'state_id' => 4),
            array('name' => "Bongaigaon Petro-chemical Town",'state_id' => 4),
            array('name' => "Borgolai",'state_id' => 4),
            array('name' => "Chabua",'state_id' => 4),
            array('name' => "Chandrapur Bagicha",'state_id' => 4),
            array('name' => "Chapar",'state_id' => 4),
            array('name' => "Chekonidhara",'state_id' => 4),
            array('name' => "Choto Haibor",'state_id' => 4),
            array('name' => "Dergaon",'state_id' => 4),
            array('name' => "Dharapur",'state_id' => 4),
            array('name' => "Dhekiajuli",'state_id' => 4),
            array('name' => "Dhemaji",'state_id' => 4),
            array('name' => "Dhing",'state_id' => 4),
            array('name' => "Dhubri",'state_id' => 4),
            array('name' => "Dhuburi",'state_id' => 4),
            array('name' => "Dibrugarh",'state_id' => 4),
            array('name' => "Digboi",'state_id' => 4),
            array('name' => "Digboi Oil Town",'state_id' => 4),
            array('name' => "Dimaruguri",'state_id' => 4),
            array('name' => "Diphu",'state_id' => 4),
            array('name' => "Dispur",'state_id' => 4),
            array('name' => "Doboka",'state_id' => 4),
            array('name' => "Dokmoka",'state_id' => 4),
            array('name' => "Donkamokan",'state_id' => 4),
            array('name' => "Duliagaon",'state_id' => 4),
            array('name' => "Duliajan",'state_id' => 4),
            array('name' => "Duliajan No.1",'state_id' => 4),
            array('name' => "Dum Duma",'state_id' => 4),
            array('name' => "Durga Nagar",'state_id' => 4),
            array('name' => "Gauripur",'state_id' => 4),
            array('name' => "Goalpara",'state_id' => 4),
            array('name' => "Gohpur",'state_id' => 4),
            array('name' => "Golaghat",'state_id' => 4),
            array('name' => "Golakganj",'state_id' => 4),
            array('name' => "Gossaigaon",'state_id' => 4),
            array('name' => "Guwahati",'state_id' => 4),
            array('name' => "Haflong",'state_id' => 4),
            array('name' => "Hailakandi",'state_id' => 4),
            array('name' => "Hamren",'state_id' => 4),
            array('name' => "Hauli",'state_id' => 4),
            array('name' => "Hauraghat",'state_id' => 4),
            array('name' => "Hojai",'state_id' => 4),
            array('name' => "Jagiroad",'state_id' => 4),
            array('name' => "Jagiroad Paper Mill",'state_id' => 4),
            array('name' => "Jogighopa",'state_id' => 4),
            array('name' => "Jonai Bazar",'state_id' => 4),
            array('name' => "Jorhat",'state_id' => 4),
            array('name' => "Kampur Town",'state_id' => 4),
            array('name' => "Kamrup",'state_id' => 4),
            array('name' => "Kanakpur",'state_id' => 4),
            array('name' => "Karimganj",'state_id' => 4),
            array('name' => "Kharijapikon",'state_id' => 4),
            array('name' => "Kharupetia",'state_id' => 4),
            array('name' => "Kochpara",'state_id' => 4),
            array('name' => "Kokrajhar",'state_id' => 4),
            array('name' => "Kumar Kaibarta Gaon",'state_id' => 4),
            array('name' => "Lakhimpur",'state_id' => 4),
            array('name' => "Lakhipur",'state_id' => 4),
            array('name' => "Lala",'state_id' => 4),
            array('name' => "Lanka",'state_id' => 4),
            array('name' => "Lido Tikok",'state_id' => 4),
            array('name' => "Lido Town",'state_id' => 4),
            array('name' => "Lumding",'state_id' => 4),
            array('name' => "Lumding Railway Colony",'state_id' => 4),
            array('name' => "Mahur",'state_id' => 4),
            array('name' => "Maibong",'state_id' => 4),
            array('name' => "Majgaon",'state_id' => 4),
            array('name' => "Makum",'state_id' => 4),
            array('name' => "Mangaldai",'state_id' => 4),
            array('name' => "Mankachar",'state_id' => 4),
            array('name' => "Margherita",'state_id' => 4),
            array('name' => "Mariani",'state_id' => 4),
            array('name' => "Marigaon",'state_id' => 4),
            array('name' => "Moran",'state_id' => 4),
            array('name' => "Moranhat",'state_id' => 4),
            array('name' => "Nagaon",'state_id' => 4),
            array('name' => "Naharkatia",'state_id' => 4),
            array('name' => "Nalbari",'state_id' => 4),
            array('name' => "Namrup",'state_id' => 4),
            array('name' => "Naubaisa Gaon",'state_id' => 4),
            array('name' => "Nazira",'state_id' => 4),
            array('name' => "New Bongaigaon Railway Colony",'state_id' => 4),
            array('name' => "Niz-Hajo",'state_id' => 4),
            array('name' => "North Guwahati",'state_id' => 4),
            array('name' => "Numaligarh",'state_id' => 4),
            array('name' => "Palasbari",'state_id' => 4),
            array('name' => "Panchgram",'state_id' => 4),
            array('name' => "Pathsala",'state_id' => 4),
            array('name' => "Raha",'state_id' => 4),
            array('name' => "Rangapara",'state_id' => 4),
            array('name' => "Rangia",'state_id' => 4),
            array('name' => "Salakati",'state_id' => 4),
            array('name' => "Sapatgram",'state_id' => 4),
            array('name' => "Sarthebari",'state_id' => 4),
            array('name' => "Sarupathar",'state_id' => 4),
            array('name' => "Sarupathar Bengali",'state_id' => 4),
            array('name' => "Senchoagaon",'state_id' => 4),
            array('name' => "Sibsagar",'state_id' => 4),
            array('name' => "Silapathar",'state_id' => 4),
            array('name' => "Silchar",'state_id' => 4),
            array('name' => "Silchar Part-X",'state_id' => 4),
            array('name' => "Sonari",'state_id' => 4),
            array('name' => "Sorbhog",'state_id' => 4),
            array('name' => "Sualkuchi",'state_id' => 4),
            array('name' => "Tangla",'state_id' => 4),
            array('name' => "Tezpur",'state_id' => 4),
            array('name' => "Tihu",'state_id' => 4),
            array('name' => "Tinsukia",'state_id' => 4),
            array('name' => "Titabor",'state_id' => 4),
            array('name' => "Udalguri",'state_id' => 4),
            array('name' => "Umrangso",'state_id' => 4),
            array('name' => "Uttar Krishnapur Part-I",'state_id' => 4),
            array('name' => "Amarpur",'state_id' => 5),
            array('name' => "Ara",'state_id' => 5),
            array('name' => "Araria",'state_id' => 5),
            array('name' => "Areraj",'state_id' => 5),
            array('name' => "Asarganj",'state_id' => 5),
            array('name' => "Aurangabad",'state_id' => 5),
            array('name' => "Bagaha",'state_id' => 5),
            array('name' => "Bahadurganj",'state_id' => 5),
            array('name' => "Bairgania",'state_id' => 5),
            array('name' => "Bakhtiyarpur",'state_id' => 5),
            array('name' => "Banka",'state_id' => 5),
            array('name' => "Banmankhi",'state_id' => 5),
            array('name' => "Bar Bigha",'state_id' => 5),
            array('name' => "Barauli",'state_id' => 5),
            array('name' => "Barauni Oil Township",'state_id' => 5),
            array('name' => "Barh",'state_id' => 5),
            array('name' => "Barhiya",'state_id' => 5),
            array('name' => "Bariapur",'state_id' => 5),
            array('name' => "Baruni",'state_id' => 5),
            array('name' => "Begusarai",'state_id' => 5),
            array('name' => "Behea",'state_id' => 5),
            array('name' => "Belsand",'state_id' => 5),
            array('name' => "Bettiah",'state_id' => 5),
            array('name' => "Bhabua",'state_id' => 5),
            array('name' => "Bhagalpur",'state_id' => 5),
            array('name' => "Bhimnagar",'state_id' => 5),
            array('name' => "Bhojpur",'state_id' => 5),
            array('name' => "Bihar",'state_id' => 5),
            array('name' => "Bihar Sharif",'state_id' => 5),
            array('name' => "Bihariganj",'state_id' => 5),
            array('name' => "Bikramganj",'state_id' => 5),
            array('name' => "Birpur",'state_id' => 5),
            array('name' => "Bodh Gaya",'state_id' => 5),
            array('name' => "Buxar",'state_id' => 5),
            array('name' => "Chakia",'state_id' => 5),
            array('name' => "Chanpatia",'state_id' => 5),
            array('name' => "Chhapra",'state_id' => 5),
            array('name' => "Chhatapur",'state_id' => 5),
            array('name' => "Colgong",'state_id' => 5),
            array('name' => "Dalsingh Sarai",'state_id' => 5),
            array('name' => "Darbhanga",'state_id' => 5),
            array('name' => "Daudnagar",'state_id' => 5),
            array('name' => "Dehri",'state_id' => 5),
            array('name' => "Dhaka",'state_id' => 5),
            array('name' => "Dighwara",'state_id' => 5),
            array('name' => "Dinapur",'state_id' => 5),
            array('name' => "Dinapur Cantonment",'state_id' => 5),
            array('name' => "Dumra",'state_id' => 5),
            array('name' => "Dumraon",'state_id' => 5),
            array('name' => "Fatwa",'state_id' => 5),
            array('name' => "Forbesganj",'state_id' => 5),
            array('name' => "Gaya",'state_id' => 5),
            array('name' => "Gazipur",'state_id' => 5),
            array('name' => "Ghoghardiha",'state_id' => 5),
            array('name' => "Gogri Jamalpur",'state_id' => 5),
            array('name' => "Gopalganj",'state_id' => 5),
            array('name' => "Habibpur",'state_id' => 5),
            array('name' => "Hajipur",'state_id' => 5),
            array('name' => "Hasanpur",'state_id' => 5),
            array('name' => "Hazaribagh",'state_id' => 5),
            array('name' => "Hilsa",'state_id' => 5),
            array('name' => "Hisua",'state_id' => 5),
            array('name' => "Islampur",'state_id' => 5),
            array('name' => "Jagdispur",'state_id' => 5),
            array('name' => "Jahanabad",'state_id' => 5),
            array('name' => "Jamalpur",'state_id' => 5),
            array('name' => "Jamhaur",'state_id' => 5),
            array('name' => "Jamui",'state_id' => 5),
            array('name' => "Janakpur Road",'state_id' => 5),
            array('name' => "Janpur",'state_id' => 5),
            array('name' => "Jaynagar",'state_id' => 5),
            array('name' => "Jha Jha",'state_id' => 5),
            array('name' => "Jhanjharpur",'state_id' => 5),
            array('name' => "Jogbani",'state_id' => 5),
            array('name' => "Kanti",'state_id' => 5),
            array('name' => "Kasba",'state_id' => 5),
            array('name' => "Kataiya",'state_id' => 5),
            array('name' => "Katihar",'state_id' => 5),
            array('name' => "Khagaria",'state_id' => 5),
            array('name' => "Khagaul",'state_id' => 5),
            array('name' => "Kharagpur",'state_id' => 5),
            array('name' => "Khusrupur",'state_id' => 5),
            array('name' => "Kishanganj",'state_id' => 5),
            array('name' => "Koath",'state_id' => 5),
            array('name' => "Koilwar",'state_id' => 5),
            array('name' => "Lakhisarai",'state_id' => 5),
            array('name' => "Lalganj",'state_id' => 5),
            array('name' => "Lauthaha",'state_id' => 5),
            array('name' => "Madhepura",'state_id' => 5),
            array('name' => "Madhubani",'state_id' => 5),
            array('name' => "Maharajganj",'state_id' => 5),
            array('name' => "Mahnar Bazar",'state_id' => 5),
            array('name' => "Mairwa",'state_id' => 5),
            array('name' => "Makhdumpur",'state_id' => 5),
            array('name' => "Maner",'state_id' => 5),
            array('name' => "Manihari",'state_id' => 5),
            array('name' => "Marhaura",'state_id' => 5),
            array('name' => "Masaurhi",'state_id' => 5),
            array('name' => "Mirganj",'state_id' => 5),
            array('name' => "Mohiuddinagar",'state_id' => 5),
            array('name' => "Mokama",'state_id' => 5),
            array('name' => "Motihari",'state_id' => 5),
            array('name' => "Motipur",'state_id' => 5),
            array('name' => "Munger",'state_id' => 5),
            array('name' => "Murliganj",'state_id' => 5),
            array('name' => "Muzaffarpur",'state_id' => 5),
            array('name' => "Nabinagar",'state_id' => 5),
            array('name' => "Narkatiaganj",'state_id' => 5),
            array('name' => "Nasriganj",'state_id' => 5),
            array('name' => "Natwar",'state_id' => 5),
            array('name' => "Naugachhia",'state_id' => 5),
            array('name' => "Nawada",'state_id' => 5),
            array('name' => "Nirmali",'state_id' => 5),
            array('name' => "Nokha",'state_id' => 5),
            array('name' => "Paharpur",'state_id' => 5),
            array('name' => "Patna",'state_id' => 5),
            array('name' => "Phulwari",'state_id' => 5),
            array('name' => "Piro",'state_id' => 5),
            array('name' => "Purnia",'state_id' => 5),
            array('name' => "Pusa",'state_id' => 5),
            array('name' => "Rafiganj",'state_id' => 5),
            array('name' => "Raghunathpur",'state_id' => 5),
            array('name' => "Rajgir",'state_id' => 5),
            array('name' => "Ramnagar",'state_id' => 5),
            array('name' => "Raxaul",'state_id' => 5),
            array('name' => "Revelganj",'state_id' => 5),
            array('name' => "Rusera",'state_id' => 5),
            array('name' => "Sagauli",'state_id' => 5),
            array('name' => "Saharsa",'state_id' => 5),
            array('name' => "Samastipur",'state_id' => 5),
            array('name' => "Sasaram",'state_id' => 5),
            array('name' => "Shahpur",'state_id' => 5),
            array('name' => "Shaikhpura",'state_id' => 5),
            array('name' => "Sherghati",'state_id' => 5),
            array('name' => "Shivhar",'state_id' => 5),
            array('name' => "Silao",'state_id' => 5),
            array('name' => "Sitamarhi",'state_id' => 5),
            array('name' => "Siwan",'state_id' => 5),
            array('name' => "Sonepur",'state_id' => 5),
            array('name' => "Sultanganj",'state_id' => 5),
            array('name' => "Supaul",'state_id' => 5),
            array('name' => "Teghra",'state_id' => 5),
            array('name' => "Tekari",'state_id' => 5),
            array('name' => "Thakurganj",'state_id' => 5),
            array('name' => "Vaishali",'state_id' => 5),
            array('name' => "Waris Aliganj",'state_id' => 5),
            array('name' => "Chandigarh",'state_id' => 6),
        );
        DB::table('cities')->insert($cities);
    }
}
