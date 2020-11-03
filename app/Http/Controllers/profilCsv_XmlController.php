<?php

namespace App\Http\Controllers;

use App\Exports\profilCsv_XmlExport;
use App\Exports\profilCsv_Xml_WbtsExport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\profilCsv_XmlImport;

class profilCsv_XmlController extends Controller
{

    // ***************** PROFIL IPNB *************************

    public function profilCsv_XmlIndex(){
        $ligne = DB::table('profilcsv_site_name')->paginate(5);

        return view('BSS-operations.nokia3G.profilcsv_xml',compact('ligne'));
    }

    public function profilCsv_XmlStore(Request $req){

        DB::table('profilCSV_site_name')->delete();
        DB::table('profilCSV')->delete();

        // add empty field
        DB::table('profilCSV')->insert([
            '$operation' => '',
            '$dn' => '',
            '$templateName' => '',
            'NodeBIPAddress' => '',
            'CControlPortID' => '',
            'DNBAPICSUIndex' => '',
            'SCTPPortNumberDNBAP' => '',
            'MinSCTPPortIub' => '',
            'name' => '',
            'NBAPDSCP' => ''
        ]);
        DB::table('profilCSV')->insert([
            '$operation' => '',
            '$dn' => '',
            '$templateName' => '',
            'NodeBIPAddress' => '',
            'CControlPortID' => '',
            'DNBAPICSUIndex' => '',
            'SCTPPortNumberDNBAP' => '',
            'MinSCTPPortIub' => '',
            'name' => '',
            'NBAPDSCP' => ''
        ]);

        $this->validate($req,[
            'file'=> 'required|mimes:xlsx,xls,csv'
        ]);

        $file = $req->file;

        // Excel import

        $profilCsv_XmlImport = new profilCsv_XmlImport();

        Excel::import($profilCsv_XmlImport, $file);

        $data = DB::table('profilCSV_site_name')->get();

        $rnc_name =null;
        $site_name = null;
        $ipnb = null;
        $ip_service = null;
        $SCTPPortNumberDNBAP = null;
        $MinSCTPPortIub = null;
        $static_route = null;

        // Suppression and creation of static route file

        unlink('Static-route.txt');

        $fileStaticRoute = fopen('Static-route.txt', 'a+');

        foreach ($data as $datas){

            $rnc_name = $datas->rnc_name;
            $site_name = $datas->site_name;

            $startChar = substr($site_name, -strlen($site_name)+1,2);
            $endChar = substr($site_name, -strlen($site_name)+3,3);

            $rnc_id = substr($rnc_name, -1,1) ;

//            dd($rnc_id);
            $site_title = '

//*****************' . $site_name .'******************//

';
            fputs($fileStaticRoute, $site_title);

//            dd($site_name);
            if ($startChar == 'CE'){
                $ipnb = 1000 + intval($endChar);
            }elseif ($startChar == 'ES'){
                $ipnb = 2000 + intval($endChar);
            }elseif ($startChar == 'AD'){
                $ipnb = 3000 + intval($endChar);
            }elseif($startChar == 'NO'){
                $ipnb = 1000 + intval($endChar);
            }elseif ($startChar == 'EX'){
                $ipnb = 2000 + intval($endChar);
            }else{
                $error = 'Sorry ! The module location of the ' . $site_name . ' site is different of CE, ES, AD, NO, EX. We cannot calculate his IPNB';
                return $error;
            }

            $nodeBPlan = DB::table('updatedatanodebplan')->where('ma_tram', '=', $site_name)->get();
            $static_route_data = DB::table('updatescriptconfig')->where('wbts_name', '=', $site_name)->get();


            foreach ($nodeBPlan as $data){
                $ip_service = $data->ip_service;
            }

            foreach ($static_route_data as $data){
                $static_route = $data->add_static_route;
                $datas = '// add static route (1)

';
                fputs($fileStaticRoute, $datas);
                fputs($fileStaticRoute, $static_route);

                $static_route = $data->add_ip_base_route;
                $datas = '

//add IP Base route (2)

';
                fputs($fileStaticRoute, $datas);
                fputs($fileStaticRoute, $static_route);

                $static_route = $data->map_to_vlan;
                $datas = '

//Map to VLAN (3)

';
                fputs($fileStaticRoute, $datas);
                fputs($fileStaticRoute, $static_route);
            }


            $SCTPPortNumberDNBAP = 50000 + $ipnb*2;
            $MinSCTPPortIub = $SCTPPortNumberDNBAP - 1;

//            dd($ip_service);

            DB::table('profilCSV')->insert([
                '$operation' => 'create',
                '$dn' => 'PLMN-PLMN/RNC-120' . $rnc_id . '/IPNB-' . $ipnb,
                '$templateName' => '',
                'NodeBIPAddress' => $ip_service,
                'CControlPortID' => '1',
                'DNBAPICSUIndex' => '19',
                'SCTPPortNumberDNBAP' => $SCTPPortNumberDNBAP,
                'MinSCTPPortIub' => $MinSCTPPortIub,
                'name' => $site_name,
                'NBAPDSCP' => '48'
            ]);
        }

        fclose($fileStaticRoute);

        return back()->with('success','Excel data imported successfully.');
    }

    public function staticRoute(){
        return Response::download('Static-route.txt');
    }

    public function profilIpnbDownload()
    {
        $load1 = Excel::download(new profilCsv_XmlExport, 'ROLLBACK_IPNB ' . date("F j, Y, g:i a") .'.xlsx' );
        return $load1;
    }

    public function profilDownloadXml()
    {
        return Response::download('ROLLBACK_IPNB_YARC03.xml');
    }

    // ***************** PROFIL WBTS *************************
    public function profilWbtsIndex(){

        $ligne = DB::table('profilcsv_site_name')->paginate(5);

        return view('BSS-operations.nokia3G.profilcsv_xml_wbts',compact('ligne'));
    }

    public function profilWbtsStore(Request $req){
        // suppression des tables
        DB::table('profilCSV_site_name')->delete();
        DB::table('profilwbts')->delete();

        // ajout des champs vides
        DB::table('profilWbts')->insert([
            '$operation' => '',
            '$dn' => '',
            '$siteId' => '',
            '$templateName' => '',
            'name' => '',
            'WBTSName' => '',
            'BTSAdditionalInfo' => '',
            'NBAPCommMode' => '',
            'IPBasedRouteIdIub' => '',
            'IPNBId' => '',
            'HSUPAXUsersEnabled' => '',
            'DSCPLow' => '',
            'DSCPMedHSPA' => '',
            'DSCPHigh' => '',
            'DSCPMedDCH' => '',
            'HSDPAULCToDSCP' => '',
            'HSUPADLCToDSCP' => ''
        ]);
        DB::table('profilWbts')->insert([
            '$operation' => '',
            '$dn' => '',
            '$siteId' => '',
            '$templateName' => '',
            'name' => '',
            'WBTSName' => '',
            'BTSAdditionalInfo' => '',
            'NBAPCommMode' => '',
            'IPBasedRouteIdIub' => '',
            'IPNBId' => '',
            'HSUPAXUsersEnabled' => '',
            'DSCPLow' => '',
            'DSCPMedHSPA' => '',
            'DSCPHigh' => '',
            'DSCPMedDCH' => '',
            'HSDPAULCToDSCP' => '',
            'HSUPADLCToDSCP' => ''
        ]);

        $this->validate($req,[
            'file'=> 'required|mimes:xlsx,xls,csv'
        ]);

        $file = $req->file;

        // Excel import

        $profilCsv_XmlImport = new profilCsv_XmlImport();

        Excel::import($profilCsv_XmlImport, $file);

        $data = DB::table('profilCSV_site_name')->get();

        $rnc_name =null;
        $site_name = null;
        $ipnb = null;
//        $ip_service = null;
//        $SCTPPortNumberDNBAP = null;
//        $MinSCTPPortIub = null;
        $static_route = null;

        // Suppression and creation of static route file

        unlink('Static-route.txt');

        $fileStaticRoute = fopen('Static-route.txt', 'a+');

        foreach ($data as $datas){

            $rnc_name = $datas->rnc_name;
            $site_name = $datas->site_name;

            $startChar = substr($site_name, -strlen($site_name)+1,2);
            $endChar = substr($site_name, -strlen($site_name)+3,3);

            $rnc_id = substr($rnc_name, -1,1) ;

//            dd($rnc_id);
            $site_title = '

//*****************' . $site_name .'******************//

';

            fputs($fileStaticRoute, $site_title);

//            dd($startChar);
            if ($startChar == 'CE'){
                $ipnb = 1000 + intval($endChar);
            }elseif ($startChar == 'ES'){
                $ipnb = 2000 + intval($endChar);
            }elseif ($startChar == 'AD'){
                $ipnb = 3000 + intval($endChar);
            }elseif($startChar == 'NO'){
                $ipnb = 1000 + intval($endChar);
            }elseif ($startChar == 'EX'){
                $ipnb = 2000 + intval($endChar);
            }else{
                $error = 'Sorry ! The module location of the ' . $site_name . ' site is different of CE, ES, AD, NO, EX. We cannot calculate his IPNB';
                return $error;
            }

//            $nodeBPlan = DB::table('updatedatanodebplan')->where('ma_tram', '=', $site_name)->get();
            $static_route_data = DB::table('updatescriptconfig')->where('wbts_name', '=', $site_name)->get();


//            foreach ($nodeBPlan as $data){
//                $ip_service = $data->ip_service;
//            }

            foreach ($static_route_data as $data){
                $static_route = $data->add_static_route;
                $datas = '// add static route (1)

';
                fputs($fileStaticRoute, $datas);
                fputs($fileStaticRoute, $static_route);

                $static_route = $data->add_ip_base_route;
                $datas = '

//add IP Base route (2)

';
                fputs($fileStaticRoute, $datas);
                fputs($fileStaticRoute, $static_route);

                $static_route = $data->map_to_vlan;
                $datas = '

//Map to VLAN (3)

';
                fputs($fileStaticRoute, $datas);
                fputs($fileStaticRoute, $static_route);
            }


//            $SCTPPortNumberDNBAP = 50000 + $ipnb*2;
//            $MinSCTPPortIub = $SCTPPortNumberDNBAP - 1;


            DB::table('profilWbts')->insert([
                '$operation' => 'create',
                '$dn' => 'PLMN-PLMN/RNC-120' . $rnc_id . '/IPNB-' . $ipnb,
                '$siteId' => '',
                '$templateName' => 'Viettel',
                'name' => $site_name,
                'WBTSName' => $site_name,
                'BTSAdditionalInfo' => '',
                'NBAPCommMode' => 'UltraSite BTS, FlexiBTS, FlexiLiteBTS, PicoBTS',
                'IPBasedRouteIdIub' => $ipnb,
                'IPNBId' => $ipnb,
                'HSUPAXUsersEnabled' => '60 users enabled',
                'DSCPLow' => '0',
                'DSCPMedHSPA' => '28',
                'DSCPHigh' => '46',
                'DSCPMedDCH' => '0',
                'HSDPAULCToDSCP' => '46',
                'HSUPADLCToDSCP' => '46'
            ]);
        }

        fclose($fileStaticRoute);

        return back()->with('success','Excel data imported successfully.');
    }

    public function profilWbtsDownload(){
        return Excel::download(new profilCsv_Xml_WbtsExport, 'ROLLBACK_IPNB ' . date("F j, Y, g:i a") .'.xlsx' );
    }

    // ****************** PROFIL WCELL ************************
    public function profilWcellIndex(){
        $ligne = DB::table('profilcsv_site_name')->paginate(5);

        return view('BSS-operations.nokia3G.profilcsv_xml_wcell',compact('ligne'));
    }
}
