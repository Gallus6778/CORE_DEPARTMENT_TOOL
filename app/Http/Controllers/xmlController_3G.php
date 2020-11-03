<?php

namespace App\Http\Controllers;

use App\Imports\updateDataNodeBPlanImport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;
use Maatwebsite\Excel\Facades\Excel;
use PhpParser\Node\Stmt\ElseIf_;
use function GuzzleHttp\Psr7\str;

class xmlController_3G extends Controller
{
    public function xmlIndex_FSME(){
        $ligne = DB::table('updatedatanodebplan')->paginate(4);
        return view('BSS-operations.nokia3G.xml-nokia3G-FSME',compact('ligne'));
    }

    public function xmlStore_FSME(Request $req){

        //        DB::table('updatedatanodebplan')->delete();
        DB::table('sitenamefsme')->delete();

        // Extensions de fichier admis
//        $this->validate($req,[
//            'file'=> 'required|mimes:xlsx,xls,csv'
//        ]);

        // receive the excel path
//        $file = $req->file;
//        Excel::import(new updateDataNodeBPlanImport(), $file);


        $rnc_name = $req->rnc_name;
        $npgep_id = $req->npgep_id;
        $ifge_id = $req->ifge_id;
        $site_name = $req->site_name;

//        $data = DB::table('updatedatanodebplan')->where('ma_tram','=',$site_name)->get();


        // CREATION of static route FILE

        $static_route_file = $site_name . '_static_route.txt';

        $file_Name = fopen($static_route_file, 'a+');
        fclose($file_Name);

        // CREATION OF XML FILE FSME
        $xmlFileName = $site_name . '_xml_input.xml';

        $xmlFile = fopen($xmlFileName, 'a+');
        fclose($xmlFile);


        $npgep_ip = null;
        $vlan = null;
        $npgep_gw = null;

        // $npgep_ip
        if ($rnc_name == 'YARC01'){
            if ($ifge_id == '0'){
                switch ($npgep_id){
                    case '6':
                        $vlan = 'VL1101';
                        $npgep_ip = '10.92.24.1';
                        $npgep_gw = '10.92.24.6';
                        break;
                    case '8':
                        $vlan = 'VL1103';
                        $npgep_ip = '10.92.24.17';
                        $npgep_gw = '10.92.24.22';
                        break;
                    case '10':
                        $vlan = 'VL1105';
                        $npgep_ip = '10.92.24.33';
                        $npgep_gw = '10.92.24.38';
                        break;
                }
            }elseif ($ifge_id == '1'){
                switch ($npgep_id){
                    case '6':
                        $vlan = 'VL1102';
                        $npgep_ip = '10.92.24.9';
                        $npgep_gw = '10.92.24.14';
                        break;
                    case '8':
                        $vlan = 'VL1104';
                        $npgep_ip = '10.92.24.25';
                        $npgep_gw = '10.92.24.30';
                        break;
                    case '10':
                        $vlan = 'VL1106';
                        $npgep_ip = '10.92.24.41';
                        $npgep_gw = '10.92.24.46';
                        break;
                }
            }
        }elseif ($rnc_name == 'YARC02'){
            if ($ifge_id == '0'){
                switch ($npgep_id){
                    case '6':
                        $vlan = 'VL1101';
                        $npgep_ip = '10.92.24.57';
                        $npgep_gw = '10.92.24.62';
                        break;
                    case '8':
                        $vlan = 'VL1103';
                        $npgep_ip = '10.92.24.73';
                        $npgep_gw = '10.92.24.78';
                        break;
                    case '10':
                        $vlan = 'VL1105';
                        $npgep_ip = '10.92.24.89';
                        $npgep_gw = '10.92.24.94';
                        break;
                }
            }elseif ($ifge_id == '1'){
                switch ($npgep_id){
                    case '6':
                        $vlan = 'VL1102';
                        $npgep_ip = '10.92.24.65';
                        $npgep_gw = '10.92.24.70';
                        break;
                    case '8':
                        $vlan = 'VL1104';
                        $npgep_ip = '10.92.24.81';
                        $npgep_gw = '10.92.24.86';
                        break;
                    case '10':
                        $vlan = 'VL1106';
                        $npgep_ip = '10.92.24.97';
                        $npgep_gw = '10.92.24.102';
                        break;
                }
            }
        }elseif ($rnc_name == 'YARC03'){
            if ($ifge_id == '0'){
                switch ($npgep_id){
                    case '6':
                        $vlan = 'VL1101';
                        $npgep_ip = '10.92.24.105';
                        $npgep_gw = '10.92.24.110';
                        break;
                    case '8':
                        $vlan = 'VL1103';
                        $npgep_ip = '10.92.24.121';
                        $npgep_gw = '10.92.24.126';
                        break;
                    case '10':
                        $vlan = 'VL1105';
                        $npgep_ip = '10.92.24.137';
                        $npgep_gw = '10.92.24.142';
                        break;
                }
            }elseif ($ifge_id == '1'){
                switch ($npgep_id){
                    case '6':
                        $vlan = 'VL1102';
                        $npgep_ip = '10.92.24.113';
                        $npgep_gw = '10.92.24.118';
                        break;
                    case '8':
                        $vlan = 'VL1104';
                        $npgep_ip = '10.92.24.129';
                        $npgep_gw = '10.92.24.134';
                        break;
                    case '10':
                        $vlan = 'VL1106';
                        $npgep_ip = '10.92.24.145';
                        $npgep_gw = '10.92.24.150';
                        break;
                }
            }
        }elseif ($rnc_name == 'YARC04'){
            if ($ifge_id == '0'){
                switch ($npgep_id){
                    case '6':
                        $vlan = '';
                        $npgep_ip = '';
                        $npgep_gw = '';
                        break;
                    case '8':
                        $vlan = '';
                        $npgep_ip = '';
                        $npgep_gw = '';
                        break;
                    case '10':
                        $vlan = '';
                        $npgep_ip = '';
                        $npgep_gw = '';
                        break;
                }
            }elseif ($ifge_id == '1'){
                switch ($npgep_id){
                    case '6':
                        $vlan = '';
                        $npgep_ip = '';
                        $npgep_gw = '';
                        break;
                    case '8':
                        $vlan = '';
                        $npgep_ip = '';
                        $npgep_gw = '';
                        break;
                    case '10':
                        $vlan = '';
                        $npgep_ip = '';
                        $npgep_gw = '';
                        break;
                }
            }
        }

//        dd($npgep_gw);

        DB::table('sitenamefsme')->insert([
            'rnc_name' => $rnc_name,
            'npgep_id' => $npgep_id,
            'ifge_id' => $ifge_id,
            'vlan' => $vlan,
            'npgep_ip' => $npgep_ip,
            'npgep_gw' => $npgep_gw,
            'site_name' => $site_name
        ]);

        return back()->with('success','Excel data imported successfully.');
    }

    public function xmlScriptFSMEGenerated(){
        $sitenamefsme = DB::table('sitenamefsme')->get();
        $name = null;
        $rnc_name = null;
        $npgepIpAddress = null;
        $npgep_gw = null;
        $vlan = null;
        $npgep_id = null;

        foreach ($sitenamefsme as $sitename_fsme){
            $name = $sitename_fsme->site_name;
            $rnc_name = $sitename_fsme->rnc_name;
            $npgepIpAddress = $sitename_fsme->npgep_ip;
            $npgep_gw = $sitename_fsme->npgep_gw;
            $vlan = $sitename_fsme->vlan;
            $npgep_id = $sitename_fsme->npgep_id;
        }

        $btsIpPlanningFSME = DB::table('updatedatanodebplan')->where('ma_tram','=',$name)->get();


        $siteTitle = null;
        $userLabel = '1+1+1';
        $locationName = null;
        $wbts = null;
        $btsId=null;
        $ftmIpAddr = null;
        $btsIpAddr = null;
        $rncIpAddr = null;
        $localIpAddr = null;
        $farEndSctpSubnetIpAddress = null;
        $masterIpAddr = null;
        $uPlaneIpAddress = null;
        $cPlaneIpAddress = null;
        $mPlaneIpAddress = null;
        $gateway = null;

        $ip_network_service = null;

        foreach ($btsIpPlanningFSME as $btsIpPlanning_FSME){
            $rnc_name = $btsIpPlanning_FSME->rnc_name;
            $ftmIpAddr = $btsIpPlanning_FSME->ip2_oam;
            $btsIpAddr = $btsIpPlanning_FSME->ip1_oam;
            $localIpAddr = $btsIpPlanning_FSME->ip_service;
            $uPlaneIpAddress = $btsIpPlanning_FSME->ip_service;
            $cPlaneIpAddress = $btsIpPlanning_FSME->ip_service;
            $mPlaneIpAddress = $btsIpPlanning_FSME->ip2_oam;
            $gateway = $btsIpPlanning_FSME->gateway_service;
            $ip_network_service = $btsIpPlanning_FSME->ip_network_service;
//            dd($btsIpPlanning_FSME->ip2_oam);
        }

//        switch ($rnc_name){
//            case 'YARCO1':
//                $rncIpAddr = '10.124.200.4';
//                $farEndSctpSubnetIpAddress = '10.92.12.0';
//                $masterIpAddr = '10.92.30.108';
//                break;
//            case 'YARCO2':
//                $rncIpAddr = '10.124.200.68';
//                $farEndSctpSubnetIpAddress = '10.92.12.64';
//                $masterIpAddr = '10.92.30.116';
//                break;
//            case 'YARCO3':
//                $rncIpAddr = '10.124.200.132';
//                $farEndSctpSubnetIpAddress = '10.92.12.128';
//                $masterIpAddr = '10.92.30.116';
//                break;
//            case 'YARCO4':
//                $rncIpAddr = '10.124.212.137';
//                $farEndSctpSubnetIpAddress = '10.92.3.34';
//                $masterIpAddr = null;
//                break;
//        }

        if ($rnc_name == 'YARC01'){
            $rncIpAddr = '10.124.200.4';
            $farEndSctpSubnetIpAddress = '10.92.12.0';
            $masterIpAddr = '10.92.30.108';
        }elseif ($rnc_name == 'YARC02') {
            $rncIpAddr = '10.124.200.68';
            $farEndSctpSubnetIpAddress = '10.92.12.64';
            $masterIpAddr = '10.92.30.116';
        }elseif ($rnc_name == 'YARC03'){
            $rncIpAddr = '10.124.200.132';
            $farEndSctpSubnetIpAddress = '10.92.12.128';
            $masterIpAddr = '10.92.30.116';
        }elseif ($rnc_name == 'YARC04'){
            $rncIpAddr = '10.124.212.137';
            $farEndSctpSubnetIpAddress = '10.92.3.34';
            $masterIpAddr = null;
        }
        $siteTitle = $name;

        $startLenght = substr($name, -strlen($name)+1,2);
        $lastChar = substr($name, -1,1);

        $lenghtSiteName = strlen($name);

        $locationName = null;
        $wbts = null;
        $btsId=null;

        if ($lenghtSiteName == 7){
            if($lastChar == 'B'){
                switch ($startLenght){
                    case 'EX':
                        $wbts = 5500 + intval(substr($name, -4,3));
                        $btsId = $wbts;
                        $locationName = 'Far-North';
                        break;
                    case 'NO':
                        $wbts = 4500 + intval(substr($name, -4,3));
                        $btsId = $wbts;
                        $locationName = 'North';
                        break;
                    case 'AD':
                        $wbts = 3500 + intval(substr($name, -4,3));
                        $btsId = $wbts;
                        $locationName = 'Adamawa';
                        break;
                    case 'CE':
                        $wbts = 1500 + intval(substr($name, -4,3));
                        $btsId = $wbts;
                        $locationName = 'Center';
                        break;
                    case 'ES':
                        $wbts = 2500 + intval(substr($name, -4,3));
                        $btsId = $wbts;
                        $locationName = 'East';
                        break;
                }
            }else{

            }
        }elseif ($lenghtSiteName == 6){
            switch ($startLenght){
                case 'EX':
                    $wbts = 5000 + intval(substr($name, -3,3));
                    $btsId = $wbts;
                    $locationName = 'Far-North';
                    break;
                case 'NO':
                    $wbts = 4000 + intval(substr($name, -3,3));
                    $btsId = $wbts;
                    $locationName = 'North';
                    break;
                case 'AD':
                    $wbts = 3000 + intval(substr($name, -3,3));
                    $btsId = $wbts;
                    $locationName = 'Adamawa';
                    break;
                case 'CE':
                    $wbts = 1000 + intval(substr($name, -3,3));
                    $btsId = $wbts;
                    $locationName = 'Center';
                    break;
                case 'ES':
                    $wbts = 2000 + intval(substr($name, -3,3));
                    $btsId = $wbts;
                    $locationName = 'East';
                    break;
            }
        }

//        dd($startLenght);

        $add_static_route = '// add static route (1)

ZQKC:NPGEP,' . $npgep_id . ':' . $ip_network_service . ',29:' . $npgep_gw . ':LOG::;
';

        $add_IP_Base_route ='
//add IP Base route (2)

ZQRU:ADD:' . $wbts . ',"' . $name . '":100000:85000:1000:500::;
';

        $Map_to_VLAN = '
//Map to VLAN (3)

ZQRC:NPGEP,' . $npgep_id . ':' . $vlan . ':IPV4=' . $npgepIpAddress . ':ID=' . $wbts . ':;';

        // xml file datas

        $xmlFileData = '<?xml version="1.0" encoding="UTF-8" standalone="no"?>
<raml xmlns="raml21.xsd" version="2.1">
<cmData id="3221225472" scope="all" type="plan">
<header>
<log action="created" appInfo="Flexi TRS Manager" appVersion="8.0.640" dateTime="2014-06-11T14:08:45" user="BTSSM"/>
</header>
<managedObject class="FTM" distName="WBTS-' . $wbts . '/FTM-1" operation="update" version="WN8.0">
<p name="systemTitle">' . $siteTitle . '</p>
<p name="softwareReleaseVersion">FTM_A80_196.01</p>
<p name="userLabel">' . $userLabel . '</p>
<p name="locationName">' . $locationName . '</p>
<p name="adaptationVersionMajor">WN8.0</p>
</managedObject>
<managedObject class="UNIT" distName="WBTS-' . $wbts . '/FTM-1/UNIT-1" version="WN8.0">
<p name="unitTypeActual">471720A</p>
<p name="unitTypeExpected">471720A</p>
</managedObject>
<managedObject class="PPTT" distName="WBTS-' . $wbts . '/FTM-1/PPTT-1-1" operation="update" version="WN8.0">
<p name="unitNumber">1</p>
<p name="interfaceNumber">1</p>
<p name="administrativeState">locked</p>
<p name="pdhLineType">PDH_LINE_TYPE_DOUBLE_FRAME_G704</p>
</managedObject>
<managedObject class="PPTT" distName="WBTS-' . $wbts . '/FTM-1/PPTT-1-2" operation="update" version="WN8.0">
<p name="unitNumber">1</p>
<p name="interfaceNumber">2</p>
<p name="administrativeState">locked</p>
<p name="pdhLineType">PDH_LINE_TYPE_DOUBLE_FRAME_G704</p>
</managedObject>
<managedObject class="PPTT" distName="WBTS-' . $wbts . '/FTM-1/PPTT-1-3" operation="update" version="WN8.0">
<p name="unitNumber">1</p>
<p name="interfaceNumber">3</p>
<p name="administrativeState">locked</p>
<p name="pdhLineType">PDH_LINE_TYPE_DOUBLE_FRAME_G704</p>
</managedObject>
<managedObject class="PPTT" distName="WBTS-' . $wbts . '/FTM-1/PPTT-1-4" operation="update" version="WN8.0">
<p name="unitNumber">1</p>
<p name="interfaceNumber">4</p>
<p name="administrativeState">locked</p>
<p name="pdhLineType">PDH_LINE_TYPE_DOUBLE_FRAME_G704</p>
</managedObject>
<managedObject class="ETHLK" distName="WBTS-' . $wbts . '/FTM-1/ETHLK-1-1" operation="update" version="WN8.0">
<p name="administrativeState">locked</p>
<p name="speedAndDuplex">AUTODETECT</p>
<p name="l2ShaperRate">RT_LINE_RATE</p>
<p name="l2IngressRate">RT_LINE_RATE</p>
<p name="acceptableFrameTypes">ADMIT_ALL</p>
<p name="portDefaultPriority">0</p>
<p name="portDefaultVlanId">1</p>
<p name="linkOAMEnabled">false</p>
<p name="linkOAMProfile"/>
<p name="synchEMode">SEM_AUTO</p>
<p name="flushFdbOnLos">false</p>
<p name="linkFlappingPreventionTimer">0</p>
<list name="l2VlanIdList"/>
</managedObject>
<managedObject class="ETHLK" distName="WBTS-' . $wbts . '/FTM-1/ETHLK-1-2" operation="update" version="WN8.0">
<p name="administrativeState">unlocked</p>
<p name="speedAndDuplex">100MBIT_FULL</p>
<p name="l2ShaperRate">RT_LINE_RATE</p>
<p name="l2IngressRate">RT_LINE_RATE</p>
<p name="acceptableFrameTypes">ADMIT_ALL</p>
<p name="portDefaultPriority">0</p>
<p name="portDefaultVlanId">1</p>
<p name="linkOAMEnabled">false</p>
<p name="linkOAMProfile"/>
<p name="synchEMode">SEM_AUTO</p>
<p name="flushFdbOnLos">false</p>
<p name="linkFlappingPreventionTimer">0</p>
<list name="l2VlanIdList"/>
</managedObject>
<managedObject class="ETHLK" distName="WBTS-' . $wbts . '/FTM-1/ETHLK-1-3" operation="update" version="WN8.0">
<p name="administrativeState">locked</p>
<p name="speedAndDuplex">AUTODETECT</p>
<p name="l2ShaperRate">RT_LINE_RATE</p>
<p name="l2IngressRate">RT_LINE_RATE</p>
<p name="acceptableFrameTypes">ADMIT_ALL</p>
<p name="portDefaultPriority">0</p>
<p name="portDefaultVlanId">1</p>
<p name="linkOAMEnabled">false</p>
<p name="linkOAMProfile"/>
<p name="synchEMode">SEM_AUTO</p>
<p name="flushFdbOnLos">false</p>
<p name="linkFlappingPreventionTimer">0</p>
<list name="l2VlanIdList"/>
</managedObject>
<managedObject class="L2SWI" distName="WBTS-' . $wbts . '/FTM-1/L2SWI-1" operation="update" version="WN8.0">
<p name="portDefaultPriority">0</p>
<p name="portDefaultVlanId">1</p>
<p name="priorityQueuePcp7">1</p>
<p name="priorityQueuePcp2">3</p>
<p name="priorityQueuePcp0">4</p>
<p name="priorityQueuePcp4">2</p>
<p name="priorityQueuePcp5">2</p>
<p name="priorityQueuePcp6">1</p>
<p name="priorityQueuePcp1">4</p>
<p name="priorityQueuePcp3">3</p>
<p name="qosClassification">DSCP</p>
<p name="vlanAwareSwitch">false</p>
<p name="priorityQueueNonIP">1</p>
<p name="defaultPCPUntagged">7</p>
<p name="enableLayer2Switching">false</p>
<p name="l2PriorityQueueWeight2">8</p>
<p name="l2PriorityQueueWeight3">1</p>
<p name="l2PriorityQueueWeight4">1</p>
<list name="dscpMap">
<item>
<p name="dscp">0</p>
<p name="priorityQueue">4</p>
</item>
<item>
<p name="dscp">1</p>
<p name="priorityQueue">4</p>
</item>
<item>
<p name="dscp">2</p>
<p name="priorityQueue">4</p>
</item>
<item>
<p name="dscp">3</p>
<p name="priorityQueue">4</p>
</item>
<item>
<p name="dscp">4</p>
<p name="priorityQueue">4</p>
</item>
<item>
<p name="dscp">5</p>
<p name="priorityQueue">4</p>
</item>
<item>
<p name="dscp">6</p>
<p name="priorityQueue">4</p>
</item>
<item>
<p name="dscp">7</p>
<p name="priorityQueue">4</p>
</item>
<item>
<p name="dscp">8</p>
<p name="priorityQueue">4</p>
</item>
<item>
<p name="dscp">9</p>
<p name="priorityQueue">4</p>
</item>
<item>
<p name="dscp">10</p>
<p name="priorityQueue">3</p>
</item>
<item>
<p name="dscp">11</p>
<p name="priorityQueue">4</p>
</item>
<item>
<p name="dscp">12</p>
<p name="priorityQueue">3</p>
</item>
<item>
<p name="dscp">13</p>
<p name="priorityQueue">4</p>
</item>
<item>
<p name="dscp">14</p>
<p name="priorityQueue">3</p>
</item>
<item>
<p name="dscp">15</p>
<p name="priorityQueue">4</p>
</item>
<item>
<p name="dscp">17</p>
<p name="priorityQueue">4</p>
</item>
<item>
<p name="dscp">16</p>
<p name="priorityQueue">4</p>
</item>
<item>
<p name="dscp">19</p>
<p name="priorityQueue">4</p>
</item>
<item>
<p name="dscp">18</p>
<p name="priorityQueue">3</p>
</item>
<item>
<p name="dscp">21</p>
<p name="priorityQueue">4</p>
</item>
<item>
<p name="dscp">20</p>
<p name="priorityQueue">3</p>
</item>
<item>
<p name="dscp">23</p>
<p name="priorityQueue">4</p>
</item>
<item>
<p name="dscp">22</p>
<p name="priorityQueue">3</p>
</item>
<item>
<p name="dscp">25</p>
<p name="priorityQueue">4</p>
</item>
<item>
<p name="dscp">24</p>
<p name="priorityQueue">4</p>
</item>
<item>
<p name="dscp">27</p>
<p name="priorityQueue">4</p>
</item>
<item>
<p name="dscp">26</p>
<p name="priorityQueue">2</p>
</item>
<item>
<p name="dscp">29</p>
<p name="priorityQueue">4</p>
</item>
<item>
<p name="dscp">28</p>
<p name="priorityQueue">2</p>
</item>
<item>
<p name="dscp">31</p>
<p name="priorityQueue">4</p>
</item>
<item>
<p name="dscp">30</p>
<p name="priorityQueue">2</p>
</item>
<item>
<p name="dscp">34</p>
<p name="priorityQueue">2</p>
</item>
<item>
<p name="dscp">35</p>
<p name="priorityQueue">4</p>
</item>
<item>
<p name="dscp">32</p>
<p name="priorityQueue">4</p>
</item>
<item>
<p name="dscp">33</p>
<p name="priorityQueue">4</p>
</item>
<item>
<p name="dscp">38</p>
<p name="priorityQueue">2</p>
</item>
<item>
<p name="dscp">39</p>
<p name="priorityQueue">4</p>
</item>
<item>
<p name="dscp">36</p>
<p name="priorityQueue">2</p>
</item>
<item>
<p name="dscp">37</p>
<p name="priorityQueue">4</p>
</item>
<item>
<p name="dscp">42</p>
<p name="priorityQueue">4</p>
</item>
<item>
<p name="dscp">43</p>
<p name="priorityQueue">4</p>
</item>
<item>
<p name="dscp">40</p>
<p name="priorityQueue">4</p>
</item>
<item>
<p name="dscp">41</p>
<p name="priorityQueue">4</p>
</item>
<item>
<p name="dscp">46</p>
<p name="priorityQueue">1</p>
</item>
<item>
<p name="dscp">47</p>
<p name="priorityQueue">4</p>
</item>
<item>
<p name="dscp">44</p>
<p name="priorityQueue">4</p>
</item>
<item>
<p name="dscp">45</p>
<p name="priorityQueue">4</p>
</item>
<item>
<p name="dscp">51</p>
<p name="priorityQueue">4</p>
</item>
<item>
<p name="dscp">50</p>
<p name="priorityQueue">4</p>
</item>
<item>
<p name="dscp">49</p>
<p name="priorityQueue">4</p>
</item>
<item>
<p name="dscp">48</p>
<p name="priorityQueue">1</p>
</item>
<item>
<p name="dscp">55</p>
<p name="priorityQueue">4</p>
</item>
<item>
<p name="dscp">54</p>
<p name="priorityQueue">4</p>
</item>
<item>
<p name="dscp">53</p>
<p name="priorityQueue">4</p>
</item>
<item>
<p name="dscp">52</p>
<p name="priorityQueue">4</p>
</item>
<item>
<p name="dscp">59</p>
<p name="priorityQueue">4</p>
</item>
<item>
<p name="dscp">58</p>
<p name="priorityQueue">4</p>
</item>
<item>
<p name="dscp">57</p>
<p name="priorityQueue">4</p>
</item>
<item>
<p name="dscp">56</p>
<p name="priorityQueue">4</p>
</item>
<item>
<p name="dscp">63</p>
<p name="priorityQueue">4</p>
</item>
<item>
<p name="dscp">62</p>
<p name="priorityQueue">4</p>
</item>
<item>
<p name="dscp">61</p>
<p name="priorityQueue">4</p>
</item>
<item>
<p name="dscp">60</p>
<p name="priorityQueue">4</p>
</item>
</list>
</managedObject>
<managedObject class="RSTP" distName="WBTS-' . $wbts . '/FTM-1/RSTP-1" operation="update" version="WN8.0">
<p name="forcedProtocolVersion">RSTP</p>
<p name="bridgeIdentifierPriority">8</p>
<p name="bridgeHelloTime">2000</p>
<p name="transmitHoldCount">6</p>
<p name="bridgeForwardDelay">15</p>
<p name="bridgeMaxAge">20</p>
<p name="actRstp">false</p>
</managedObject>
<managedObject class="STPORT" distName="WBTS-' . $wbts . '/FTM-1/RSTP-1/STPORT-1-1" operation="update" version="WN8.0">
<p name="portPriority">128</p>
<p name="portNumber">1</p>
<p name="portPathCost">20000</p>
<p name="disableStpParticipation">true</p>
</managedObject>
<managedObject class="STPORT" distName="WBTS-' . $wbts . '/FTM-1/RSTP-1/STPORT-1-2" operation="update" version="WN8.0">
<p name="portPriority">128</p>
<p name="portNumber">2</p>
<p name="portPathCost">20000</p>
<p name="disableStpParticipation">true</p>
</managedObject>
<managedObject class="STPORT" distName="WBTS-' . $wbts . '/FTM-1/RSTP-1/STPORT-1-3" operation="update" version="WN8.0">
<p name="portPriority">128</p>
<p name="portNumber">3</p>
<p name="portPathCost">20000</p>
<p name="disableStpParticipation">true</p>
</managedObject>
<managedObject class="SYNC" distName="WBTS-' . $wbts . '/FTM-1/SYNC-1" operation="update" version="WN8.0"/>
<managedObject class="STPG" distName="WBTS-' . $wbts . '/FTM-1/SYNC-1/STPG-1" operation="update" version="WN8.0">
<p name="synchERegenOn">false</p>
<p name="ssmType">SSM_ITU</p>
<p name="ssmSelExt2M">EEC1</p>
<p name="ssmSelPDH">EEC1</p>
<p name="ssmSelSyncE">EEC1</p>
</managedObject>
<managedObject class="A2NE" distName="WBTS-' . $wbts . '/FTM-1/A2NE-1" operation="update" version="WN8.0"/>
<managedObject class="IPNO" distName="WBTS-' . $wbts . '/FTM-1/IPNO-1" operation="update" version="WN8.0">
<p name="uPlaneIpAddress">' . $uPlaneIpAddress . '</p>
<p name="uPlane2IpAddress">0.0.0.0</p>
<p name="sPlaneIpAddress">0.0.0.0</p>
<p name="mPlaneIpAddress">' . $mPlaneIpAddress . '</p>
<p name="cPlaneIpAddress">' . $cPlaneIpAddress . '</p>
<p name="cesopsnIpAddress">0.0.0.0</p>
<p name="ftmIpAddr">' . $ftmIpAddr . '</p>
<p name="ftmNetmask">255.255.255.248</p>
<p name="btsIpAddr">' . $btsIpAddr . '</p>
<p name="btsId">' . $btsId . '</p>
<p name="rncIpAddr">' . $rncIpAddr . '</p>
<p name="transportMode">IubIP</p>
<p name="fpLocalUdpPort">65535</p>
<p name="fpRemoteUdpPort">65535</p>
<p name="fpMuxDelay">2</p>
<p name="fpMuxAmount">30</p>
<p name="mtu">1500</p>
<p name="linkOAMLoopbackSupport">false</p>
<p name="twampMessageRate">RATE_10</p>
<p name="omsTls">probing</p>
<p name="icmpResponseEnabled">true</p>
<p name="bfdHoldUpTime">0</p>
<p name="oamCir">1000</p>
<p name="oamTlvReply">false</p>
<p name="enableSoam">false</p>
<p name="disableFtp">FTP_SERVER_ENABLED</p>
<list name="twampFlag"/>
</managedObject>
<managedObject class="IPRM" distName="WBTS-' . $wbts . '/FTM-1/IPNO-1/IPRM-1" operation="update" version="WN8.0">
<list name="RmExceptions"/>
</managedObject>
<managedObject class="AMGR" distName="WBTS-' . $wbts . '/FTM-1/AMGR-1" operation="update" version="WN8.0">
<p name="primaryLdapServer">0.0.0.0</p>
<p name="primaryLdapPort">389</p>
<p name="ldapConnectionType">TLS</p>
</managedObject>
<managedObject class="IEIF" distName="WBTS-' . $wbts . '/FTM-1/IPNO-1/IEIF-1" operation="update" version="WN8.0">
<p name="qosEnabled">true</p>
<p name="sbs">4000</p>
<p name="sir">1000000</p>
<p name="sbsTotal">4000</p>
<p name="sirTotal">1000000</p>
<p name="trafficPathShapingEnable">TPS_WFQ</p>
<p name="upperLayerShaping">true</p>
<p name="shapedBandwidth">1000000</p>
<p name="cir">0</p>
<p name="vlanId">0</p>
<p name="vlanEnabled">false</p>
<p name="interfaceArea"/>
<p name="confCost">0</p>
<p name="helloInterval">1</p>
<p name="retransInterval">5</p>
<p name="routerDeadInterval">4</p>
<p name="transmitDelay">1</p>
<p name="ospfWithBfd">false</p>
<p name="mtuMismatchDetection">true</p>
<list name="ipAddr">
<item>
<p name="localIpAddr">' . $localIpAddr . '</p>
<p name="netmask">255.255.255.248</p>
</item>
</list>
</managedObject>
<managedObject class="IPRT" distName="WBTS-' . $wbts . '/FTM-1/IPNO-1/IPRT-2" operation="update" version="WN8.0">
<list name="staticRoutes">
<item>
<p name="destIpAddr">0.0.0.0</p>
<p name="netmask">0.0.0.0</p>
<p name="gateway">' . $gateway . '</p>
<p name="preference">1</p>
<p name="bfdId">0</p>
</item>
</list>
</managedObject>
<managedObject class="INTP" distName="WBTS-' . $wbts . '/FTM-1/IPNO-1/INTP-1" operation="update" version="WN8.0">
<list name="ntpServers">
<p>10.124.209.210</p>
</list>
</managedObject>
<managedObject class="IHCP" distName="WBTS-' . $wbts . '/FTM-1/IPNO-1/IHCP-1" operation="update" version="WN8.0"/>
<managedObject class="TOPB" distName="WBTS-' . $wbts . '/FTM-1/TOPB-1" operation="create" version="WN8.0"/>
<managedObject class="TOPF" distName="WBTS-' . $wbts . '/FTM-1/TOPB-1/TOPF-1" operation="create" version="WN8.0">
<p name="actTopFreqSynch">false</p>
<p name="logMeanSyncValue">-4</p>
<p name="announceRequestMode">ANNOUNCE_ALL</p>
<p name="ieeeTelecomProfile">IEEE1588</p>
<p name="topDomainNumber">0</p>
<list name="acceptedClockQuality">
<p>6</p>
<p>7</p>
<p>13</p>
<p>14</p>
</list>
<list name="topMasters">
<item>
<p name="masterIpAddr">' . $masterIpAddr . '</p>
<p name="priority_1">0</p>
<p name="priority_2">0</p>
</item>
</list>
</managedObject>
<managedObject class="CERTH" distName="WBTS-' . $wbts . '/FTM-1/CERTH-1" operation="update" version="WN8.0">
<p name="cmpServerIpAddress">0.0.0.0</p>
<p name="cmpServerPort">1024</p>
<p name="crServerIpAddress">0.0.0.0</p>
<p name="crServerPort">1024</p>
<p name="btsCertificateUpdateTime">30</p>
<p name="caCertificateUpdateTime">180</p>
<p name="caSubjectName"/>
<p name="crlUpdatePeriod">24</p>
</managedObject>
<managedObject class="QOS" distName="WBTS-' . $wbts . '/FTM-1/IPNO-1/QOS-1" operation="update" version="WN8.0">
<list name="perHopBehaviourWeightList">
<item>
<p name="assuredForwardingClass1">10</p>
<p name="assuredForwardingClass2">100</p>
<p name="assuredForwardingClass3">1000</p>
<p name="assuredForwardingClass4">10000</p>
<p name="bestEffort">1</p>
</item>
</list>
<list name="trafficTypesMap">
<item>
<p name="dscpList">34</p>
<p name="pHB">assuredForwardingClass4</p>
<p name="trafficType">BFD1</p>
<p name="vlanPrio">5</p>
</item>
<item>
<p name="dscpList">34</p>
<p name="pHB">assuredForwardingClass4</p>
<p name="trafficType">BFD10</p>
<p name="vlanPrio">5</p>
</item>
<item>
<p name="dscpList">34</p>
<p name="pHB">assuredForwardingClass4</p>
<p name="trafficType">BFD11</p>
<p name="vlanPrio">5</p>
</item>
<item>
<p name="dscpList">34</p>
<p name="pHB">assuredForwardingClass4</p>
<p name="trafficType">BFD12</p>
<p name="vlanPrio">5</p>
</item>
<item>
<p name="dscpList">34</p>
<p name="pHB">assuredForwardingClass4</p>
<p name="trafficType">BFD13</p>
<p name="vlanPrio">5</p>
</item>
<item>
<p name="dscpList">34</p>
<p name="pHB">assuredForwardingClass4</p>
<p name="trafficType">BFD14</p>
<p name="vlanPrio">5</p>
</item>
<item>
<p name="dscpList">34</p>
<p name="pHB">assuredForwardingClass4</p>
<p name="trafficType">BFD15</p>
<p name="vlanPrio">5</p>
</item>
<item>
<p name="dscpList">34</p>
<p name="pHB">assuredForwardingClass4</p>
<p name="trafficType">BFD16</p>
<p name="vlanPrio">5</p>
</item>
<item>
<p name="dscpList">34</p>
<p name="pHB">assuredForwardingClass4</p>
<p name="trafficType">BFD2</p>
<p name="vlanPrio">5</p>
</item>
<item>
<p name="dscpList">34</p>
<p name="pHB">assuredForwardingClass4</p>
<p name="trafficType">BFD3</p>
<p name="vlanPrio">5</p>
</item>
<item>
<p name="dscpList">34</p>
<p name="pHB">assuredForwardingClass4</p>
<p name="trafficType">BFD4</p>
<p name="vlanPrio">5</p>
</item>
<item>
<p name="dscpList">34</p>
<p name="pHB">assuredForwardingClass4</p>
<p name="trafficType">BFD5</p>
<p name="vlanPrio">5</p>
</item>
<item>
<p name="dscpList">34</p>
<p name="pHB">assuredForwardingClass4</p>
<p name="trafficType">BFD6</p>
<p name="vlanPrio">5</p>
</item>
<item>
<p name="dscpList">34</p>
<p name="pHB">assuredForwardingClass4</p>
<p name="trafficType">BFD7</p>
<p name="vlanPrio">5</p>
</item>
<item>
<p name="dscpList">34</p>
<p name="pHB">assuredForwardingClass4</p>
<p name="trafficType">BFD8</p>
<p name="vlanPrio">5</p>
</item>
<item>
<p name="dscpList">34</p>
<p name="pHB">assuredForwardingClass4</p>
<p name="trafficType">BFD9</p>
<p name="vlanPrio">5</p>
</item>
<item>
<p name="dscpList">46</p>
<p name="pHB">expeditedForwarding</p>
<p name="trafficType">CES1</p>
<p name="vlanPrio">6</p>
</item>
<item>
<p name="dscpList"/>
<p name="pHB">expeditedForwarding</p>
<p name="trafficType">CES2</p>
<p name="vlanPrio">6</p>
</item>
<item>
<p name="dscpList"/>
<p name="pHB">expeditedForwarding</p>
<p name="trafficType">CES3</p>
<p name="vlanPrio">6</p>
</item>
<item>
<p name="dscpList"/>
<p name="pHB">expeditedForwarding</p>
<p name="trafficType">CES4</p>
<p name="vlanPrio">6</p>
</item>
<item>
<p name="dscpList">10</p>
<p name="pHB">assuredForwardingClass1</p>
<p name="trafficType">DCN</p>
<p name="vlanPrio">1</p>
</item>
<item>
<p name="dscpList">34</p>
<p name="pHB">assuredForwardingClass4</p>
<p name="trafficType">ICMP</p>
<p name="vlanPrio">5</p>
</item>
<item>
<p name="dscpList">34</p>
<p name="pHB">assuredForwardingClass4</p>
<p name="trafficType">IKE</p>
<p name="vlanPrio">5</p>
</item>
<item>
<p name="dscpList">34</p>
<p name="pHB">assuredForwardingClass4</p>
<p name="trafficType">NBAP</p>
<p name="vlanPrio">5</p>
</item>
<item>
<p name="dscpList">48</p>
<p name="pHB">expeditedForwarding</p>
<p name="trafficType">OSPF</p>
<p name="vlanPrio">6</p>
</item>
<item>
<p name="dscpList">46</p>
<p name="pHB">expeditedForwarding</p>
<p name="trafficType">SG1</p>
<p name="vlanPrio">6</p>
</item>
<item>
<p name="dscpList">34</p>
<p name="pHB">assuredForwardingClass4</p>
<p name="trafficType">SG2</p>
<p name="vlanPrio">5</p>
</item>
<item>
<p name="dscpList">26</p>
<p name="pHB">assuredForwardingClass3</p>
<p name="trafficType">SG3</p>
<p name="vlanPrio">4</p>
</item>
<item>
<p name="dscpList">18</p>
<p name="pHB">assuredForwardingClass2</p>
<p name="trafficType">SG4</p>
<p name="vlanPrio">3</p>
</item>
<item>
<p name="dscpList">10</p>
<p name="pHB">assuredForwardingClass1</p>
<p name="trafficType">SG5</p>
<p name="vlanPrio">1</p>
</item>
<item>
<p name="dscpList">0</p>
<p name="pHB">bestEffort</p>
<p name="trafficType">SG6</p>
<p name="vlanPrio">0</p>
</item>
<item>
<p name="dscpList">46</p>
<p name="pHB">expeditedForwarding</p>
<p name="trafficType">TOP</p>
<p name="vlanPrio">6</p>
</item>
</list>
</managedObject>
<managedObject class="TMPAR" distName="WBTS-' . $wbts . '/FTM-1/IPNO-1/TMPAR-1" operation="update" version="WN8.0">
<p name="minUDPPort">49152</p>
<p name="cacCommittedBitRate">12000</p>
<p name="minSCTPPort">49152</p>
<p name="dcnCommittedBitRate">1000</p>
<p name="signallingCommittedBitRate">1000</p>
<p name="farEndSctpSubnetIpAddress">' . $farEndSctpSubnetIpAddress . '</p>
<p name="farEndSctpSubnetMask">255.255.255.192</p>
</managedObject>
<managedObject class="TWAMP" distName="WBTS-' . $wbts . '/FTM-1/IPNO-1/TWAMP-1" operation="update" version="WN8.0">
<p name="administrativeState">locked</p>
<p name="destPort">5000</p>
<p name="dscp">34</p>
<p name="messageSize">100</p>
<p name="plrAlarmThreshold">10000</p>
<p name="rttAlarmThreshold">1000000</p>
<p name="sourceIpAddress">0.0.0.0</p>
</managedObject>
<managedObject class="TWAMP" distName="WBTS-' . $wbts . '/FTM-1/IPNO-1/TWAMP-2" operation="update" version="WN8.0">
<p name="administrativeState">locked</p>
<p name="destPort">5000</p>
<p name="dscp">34</p>
<p name="messageSize">100</p>
<p name="plrAlarmThreshold">10000</p>
<p name="rttAlarmThreshold">1000000</p>
<p name="sourceIpAddress">0.0.0.0</p>
</managedObject>
<managedObject class="TWAMP" distName="WBTS-' . $wbts . '/FTM-1/IPNO-1/TWAMP-3" operation="update" version="WN8.0">
<p name="administrativeState">locked</p>
<p name="destPort">5000</p>
<p name="dscp">34</p>
<p name="messageSize">100</p>
<p name="plrAlarmThreshold">10000</p>
<p name="rttAlarmThreshold">1000000</p>
<p name="sourceIpAddress">0.0.0.0</p>
</managedObject>
<managedObject class="TWAMP" distName="WBTS-' . $wbts . '/FTM-1/IPNO-1/TWAMP-4" operation="update" version="WN8.0">
<p name="administrativeState">locked</p>
<p name="destPort">5000</p>
<p name="dscp">34</p>
<p name="messageSize">100</p>
<p name="plrAlarmThreshold">10000</p>
<p name="rttAlarmThreshold">1000000</p>
<p name="sourceIpAddress">0.0.0.0</p>
</managedObject>
<managedObject class="TWAMP" distName="WBTS-' . $wbts . '/FTM-1/IPNO-1/TWAMP-5" operation="update" version="WN8.0">
<p name="administrativeState">locked</p>
<p name="destPort">5000</p>
<p name="dscp">34</p>
<p name="messageSize">100</p>
<p name="plrAlarmThreshold">10000</p>
<p name="rttAlarmThreshold">1000000</p>
<p name="sourceIpAddress">0.0.0.0</p>
</managedObject>
<managedObject class="TWAMP" distName="WBTS-' . $wbts . '/FTM-1/IPNO-1/TWAMP-6" operation="update" version="WN8.0">
<p name="administrativeState">locked</p>
<p name="destPort">5000</p>
<p name="dscp">34</p>
<p name="messageSize">100</p>
<p name="plrAlarmThreshold">10000</p>
<p name="rttAlarmThreshold">1000000</p>
<p name="sourceIpAddress">0.0.0.0</p>
</managedObject>
<managedObject class="TWAMP" distName="WBTS-' . $wbts . '/FTM-1/IPNO-1/TWAMP-7" operation="update" version="WN8.0">
<p name="administrativeState">locked</p>
<p name="destPort">5000</p>
<p name="dscp">34</p>
<p name="messageSize">100</p>
<p name="plrAlarmThreshold">10000</p>
<p name="rttAlarmThreshold">1000000</p>
<p name="sourceIpAddress">0.0.0.0</p>
</managedObject>
<managedObject class="TWAMP" distName="WBTS-' . $wbts . '/FTM-1/IPNO-1/TWAMP-8" operation="update" version="WN8.0">
<p name="administrativeState">locked</p>
<p name="destPort">5000</p>
<p name="dscp">34</p>
<p name="messageSize">100</p>
<p name="plrAlarmThreshold">10000</p>
<p name="rttAlarmThreshold">1000000</p>
<p name="sourceIpAddress">0.0.0.0</p>
</managedObject>
<managedObject class="TWAMP" distName="WBTS-' . $wbts . '/FTM-1/IPNO-1/TWAMP-9" operation="update" version="WN8.0">
<p name="administrativeState">locked</p>
<p name="destPort">5000</p>
<p name="dscp">34</p>
<p name="messageSize">100</p>
<p name="plrAlarmThreshold">10000</p>
<p name="rttAlarmThreshold">1000000</p>
<p name="sourceIpAddress">0.0.0.0</p>
</managedObject>
<managedObject class="TWAMP" distName="WBTS-' . $wbts . '/FTM-1/IPNO-1/TWAMP-10" operation="update" version="WN8.0">
<p name="administrativeState">locked</p>
<p name="destPort">5000</p>
<p name="dscp">34</p>
<p name="messageSize">100</p>
<p name="plrAlarmThreshold">10000</p>
<p name="rttAlarmThreshold">1000000</p>
<p name="sourceIpAddress">0.0.0.0</p>
</managedObject>
<managedObject class="OSPFV2" distName="WBTS-' . $wbts . '/FTM-1/IPNO-1/OSPFV2-1" operation="create" version="WN8.0">
<p name="ospfEnabled">false</p>
<p name="ospfRouterId">0.0.0.0</p>
<p name="confPref">110</p>
<p name="refBandwidth">10000</p>
<p name="spfDelay">200</p>
<p name="spfHoldTime">5000</p>
<p name="spfMaxHoldTime">80000</p>
<list name="ospfAreas"/>
</managedObject>
<managedObject class="IPSECC" distName="WBTS-' . $wbts . '/FTM-1/IPSECC-1" operation="update" version="WN8.0">
<p name="ipSecEnabled">false</p>
<list name="securityPolicies"/>
</managedObject>
<managedObject class="CESIF" distName="WBTS-' . $wbts . '/FTM-1/CESIF-1" operation="update" version="WN8.0">
<p name="cesMinUDPPort">49152</p>
</managedObject>
</cmData>
</raml>
';

        // CREATION of XML FILE
        // CREATION OF XML FILE FSME
        $xmlFileName = $name . '_xml_input.xml';

        $FileName = $name . '_static_route.txt';

        unlink($xmlFileName);
        unlink($FileName);

        // Add data in static route file
        $file_Name = fopen($FileName, 'a+');

        fputs($file_Name,$add_static_route);
        fputs($file_Name,$add_IP_Base_route);
        fputs($file_Name,$Map_to_VLAN);


        // Add data into xml file
        $xmlFile = fopen($xmlFileName, 'a+');

        fputs($xmlFile,$xmlFileData);

        fclose($xmlFile);
        return Response::download($FileName);

        fclose($file_Name);
    }

    public function xmlScriptFSMEDownload(){
        $sitenamefsme = DB::table('sitenamefsme')->get();
        $name = null;

        foreach ($sitenamefsme as $sitename_fsme){
            $name = $sitename_fsme->site_name;
        }

        $xmlFileName = $name . '_xml_input.xml';

        return Response::download($xmlFileName);
    }

}


//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//public function xmlScriptFSMFDownload(){
//
//    $sitenamefsme = DB::table('sitenamefsme')->get();
//    $name = null;
//
//    foreach ($sitenamefsme as $sitename_fsme){
//        $name = $sitename_fsme->site_name;
//    }
//
//    $xmlFileName = $name . '_xml_input.xml';
//
//    return Response::download($xmlFileName);
//}

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//public function xmlIndex_FSMF(){
//$ligne = DB::table('updatedatanodebplan')->paginate(5);
//return view('BSS-operations.nokia3G.xml-nokia3G-FSMF',compact('ligne'));
//}
