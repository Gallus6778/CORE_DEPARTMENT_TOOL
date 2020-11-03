<?php

namespace App\Http\Controllers;

use ACFBentveld\XML\XML;
use Illuminate\Http\Request;
use App\Imports\bts_ip_planning;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Response;

class xmlController extends Controller
{
    public function xmlError(){

        return view('BSS-operations.nokia2G.xml-nokia2G-error');
    }
    public function xmlIndex(){
        $ligne = DB::table('bts_ip_planning')->paginate(10);
        $site = DB::table('sitename')->get();

        return view('BSS-operations.nokia2G.xml-nokia2G', compact('ligne', 'site'));
    }

    public function xmlStore(Request $req){

//        DB::delete('delete from bts_ip_planning');
        DB::delete('delete from SiteName');

        // Extensions de fichier admis
//        $this->validate($req,[
//            'file'=> 'required|mimes:xlsx,xls,csv'
//        ]);

        // receive the excel path
//        $file = $req->file;


        // BSC NAME AND BCSU IP unicastMasterIpAddress

        $bsc_name = $req->bsc_name;
        $bcsu_ip = NULL;
        $unicastMasterIpAddress = NULL;
        $bcsu = $req->bcsu_id;

        // Retrieve of BSC NAME AND BCSU IP
        if ($bsc_name == 'YABC01') {
            $unicastMasterIpAddress = '10.92.30.68';
            switch ($bcsu) {
                case 'BCSU0':
                    $error = 'BCSU 0';
                    return view('BSS-operations.nokia2G.xml-nokia2G-error', compact('error'));
                break;
                case 'BCSU1':
                    $bcsu_ip = '10.92.40.2';
                break;
                case 'BCSU2':
                    $bcsu_ip = '10.92.40.3';
                break;
                case 'BCSU3':
                    $bcsu_ip = '10.92.40.1';
                break;
            }
        }elseif($bsc_name == 'YABC02'){
            $unicastMasterIpAddress = '10.92.30.76';
            switch($bcsu){
                case 'BCSU0':
                    $bcsu_ip = '10.92.40.19';
                break;
                case 'BCSU1':
                    $bcsu_ip = '10.92.40.17';
                break;
                case 'BCSU2':
                    $bcsu_ip = '10.92.40.18';
                break;
                case 'BCSU3':
                    $error = 'BCSU 3';
                    return view('BSS-operations.nokia2G.xml-nokia2G-error', compact('error'));
                break;
            }
        }elseif($bsc_name == 'YABC03'){
            $unicastMasterIpAddress = '10.92.30.84';
            switch($bcsu){
                case 'BCSU0':
                    $error = 'BCSU 0';
                    return view('BSS-operations.nokia2G.xml-nokia2G-error', compact('error'));
                break;
                case 'BCSU1':
                    $bcsu_ip = '10.92.40.33';
                break;
                case 'BCSU2':
                    $bcsu_ip = '10.92.40.34';
                break;
                case 'BCSU3':
                    $bcsu_ip = '10.92.40.35';
                break;
            }
        }elseif($bsc_name == 'YABC04'){
            $unicastMasterIpAddress = '10.92.30.84';
            switch($bcsu){
                case 'BCSU0':
                    $bcsu_ip = '10.92.40.49';
                break;
                case 'BCSU1':
                    $bcsu_ip = '10.92.40.50';
                break;
                case 'BCSU2':
                    $error = 'BCSU 2';
                    return view('BSS-operations.nokia2G.xml-nokia2G-error', compact('error'));
                break;
                case 'BCSU3':
                    $bcsu_ip = '10.92.40.51';
                break;
            }
        }elseif($bsc_name == 'YABC05'){
            $unicastMasterIpAddress = '10.92.30.92';
            switch($bcsu){
                case 'BCSU0':
                    $bcsu_ip = '10.92.40.67';
                break;
                case 'BCSU1':
                    $error = 'BCSU 1';
                    return view('BSS-operations.nokia2G.xml-nokia2G-error', compact('error'));
                break;
                case 'BCSU2':
                    $bcsu_ip = '10.92.40.65';
                break;
                case 'BCSU3':
                    $bcsu_ip = '10.92.40.66';
                break;
            }
        }elseif($bsc_name == 'YABC06'){
            $unicastMasterIpAddress = '10.92.30.100';
            switch($bcsu){
                case 'BCSU0':
                    $error = 'BCSU 0';
                    return view('BSS-operations.nokia2G.xml-nokia2G-error', compact('error'));
                break;
                case 'BCSU1':
                    $bcsu_ip = '10.92.40.81';
                break;
                case 'BCSU2':
                    $bcsu_ip = '10.92.40.83';
                break;
                case 'BCSU3':
                    $bcsu_ip = '10.92.40.82';
                break;
            }
        }elseif($bsc_name == 'YABC07'){
            $unicastMasterIpAddress = '10.92.30.100';
            switch($bcsu){
                case 'BCSU0':
                    $error = 'BCSU 0';
                    return view('BSS-operations.nokia2G.xml-nokia2G-error', compact('error'));
                break;
                case 'BCSU1':
                    $bcsu_ip = '10.92.40.97';
                break;
                case 'BCSU2':
                    $bcsu_ip = '10.92.40.98';
                break;
                case 'BCSU3':
                    $bcsu_ip = '10.92.40.99';
                break;
            }
        }

        // SITE NAME, MODULE LOCATION AND BCF ID

        // Retrieved of siteName
        $site_name = $req->site_name;

        // Retrieved of module location
        $module_location = substr($site_name,-strlen($site_name),2);

        switch($module_location){
            case 'CE':
                $module_location = 'Center';
            break;
            case 'NO':
                $module_location = 'North';
            break;
            case 'EX':
                $module_location = 'Far-North';
            break;
            case 'ES':
                $module_location = 'East';
            break;
            case 'AD':
                $module_location = 'Adamawa';
            break;
        }


        // CREATION of XML FILE
        $fileName = $site_name . '_xml_input.xml';

        $fileName = fopen($fileName, 'a+');

        fclose($fileName);

        // BCF ID
        $bcf_id = NULL;

        $lenOfSite = strlen($site_name);

        if($lenOfSite == 6){
            $bcf_id = substr($site_name, -3,3);
        }elseif($lenOfSite == 7){
            if(substr($site_name, -1,1) == 'B'){
                $bcf_id = 1000 + intval(substr($site_name,-4,3));
            }elseif(substr($site_name, -1,1) == 'C'){
                $bcf_id = 2000 + intval(substr($site_name,-4,3));
            }
        }

        // Convert BCF ID to string
        $bcf_id = ''. $bcf_id . '';


        DB::table('SiteName')->insert([
            'site_name'=> $site_name,
            'bcf_id' => $bcf_id,
            'module_location'=> $module_location,
            'bsc_name' => $bsc_name,
            'bcsu_ip' => $bcsu_ip,
            'unicastMasterIpAddress' => $unicastMasterIpAddress
        ]);

        // Import this file
//        Excel::import(new bts_ip_planning,$file);

        return back()->with('success','Excel data imported successfully.');
    }

    public function xmlDownloaded(){

        $site_data = DB::table('SiteName')->get();

        $site_name = NULL;
        $bcf_id = NULL;
        $module_location = NULL;
        $bsc_name = NULL;
        $bcsu_ip = NULL;

        $mPlaneRemoteIpAddress = NULL;
        $mPlaneGatewayIpAddress = NULL;
        $cuPlaneGatewayIpAddress = NULL;
        $mPlaneLocalIpAddress = NULL;
        $perTrxPower = '46.0';
        $unicastMasterIpAddress = NULL;

        foreach($site_data as $site){
            $site_name = $site->site_name;
            $bcf_id = $site->bcf_id;
            $module_location = $site->module_location;
            $bsc_name = $site->bsc_name;
            $bcsu_ip = $site->bcsu_ip;
            $unicastMasterIpAddress = $site->unicastMasterIpAddress;
        }

        $datas = DB::table('bts_ip_planning')->where('ma_tram','=',$site_name)->get();

        foreach($datas as $data){
            $mPlaneRemoteIpAddress = $bcsu_ip;
            $mPlaneGatewayIpAddress = $data->gateway_oam;
            $cuPlaneGatewayIpAddress = $data->ip_service;
            $mPlaneLocalIpAddress = $data->ip_oam ;
        }
        // dd($data->ip_oam );


        $contentOfXml = '<?xml version="1.0" encoding="ISO-8859-1"?>
<raml version="2.1" xmlns="raml21.xsd">
<!-- configuration data -->
    <cmData id="3221225473" scope="all" type="actual">
        <header>
            <log action="deleted" appInfo="BTS Manager"
                dateTime="2014-06-08T20:13:25" user="Default">Default Log</log>
        </header>
        <managedObject class="SCFVER"
            distName="BCF-1/MRBTS-1/BTSSCC-1/BTSSCG-1/SCFVER-1"
            operation="auto" version="EX5.1">
            <!--Mandatory Block-->
            <p name="scfMajorVersion">6</p>
            <p name="scfMinorVersion">51</p>
        </managedObject>
        <managedObject class="BTSNE"
            distName="BCF-1/MRBTS-1/BTSSCC-1/BTSSCG-1/BTSNE-1"
            operation="auto" version="EX5.1">
            <!--Mandatory Block-->
            <p name="bcfId">' . $bcf_id . '</p>
            <p name="bcfType">Flexi Multiradio</p>
            <!--Optional Block-->
            <p name="siteName">' . $site_name . '</p>
            <p name="installationDate">8-Jun-2014</p>
            <p name="installationPerson">Viettel Cameroun</p>
            <p name="climateControlProfiling">Optimized_Cooling</p>
            <p name="rxds">160000</p>
            <p name="bscName">' . $bsc_name . '</p>
            <p name="btsSyncOutputFormat">legacy FCLK/FN format</p>
            <p name="btsSyncSource">BSC defined</p>
            <p name="timingLimitHysteresisMultiplier">100</p>
            <p name="ambientAirTempOffset">A_Normal</p>
        </managedObject>
        <managedObject class="ANTL" distName="BCF-1/MRBTS-1/ANTL-1"
            operation="auto" version="EX5.1">
            <!-- Mandatory Block -->
            <p name="antId">ANT1</p>
            <p name="rModId">1</p>
            <!-- Radio  Master Control Block -->
            <p name="feederLoss">-30</p>
            <p name="feederVoltage">0</p>
            <p name="vswrMinorAlarm">15</p>
            <p name="vswrMajorAlarm">27</p>
            <!-- Optional Block -->
        </managedObject>
        <managedObject class="ANTL" distName="BCF-1/MRBTS-1/ANTL-2"
            operation="auto" version="EX5.1">
            <!-- Mandatory Block -->
            <p name="antId">ANT3</p>
            <p name="rModId">1</p>
            <!-- Radio  Master Control Block -->
            <p name="feederLoss">-30</p>
            <p name="feederVoltage">0</p>
            <p name="vswrMinorAlarm">15</p>
            <p name="vswrMajorAlarm">27</p>
            <!-- Optional Block -->
        </managedObject>
        <managedObject class="ANTL" distName="BCF-1/MRBTS-1/ANTL-3"
            operation="auto" version="EX5.1">
            <!-- Mandatory Block -->
            <p name="antId">ANT5</p>
            <p name="rModId">1</p>
            <!-- Radio  Master Control Block -->
            <p name="feederLoss">-30</p>
            <p name="feederVoltage">0</p>
            <p name="vswrMinorAlarm">15</p>
            <p name="vswrMajorAlarm">27</p>
            <!-- Optional Block -->
        </managedObject>
        <managedObject class="ANTL" distName="BCF-1/MRBTS-1/ANTL-4"
            operation="auto" version="EX5.1">
            <!-- Mandatory Block -->
            <p name="antId">ANT2</p>
            <p name="rModId">1</p>
            <!-- Radio  Master Control Block -->
            <p name="feederLoss">-30</p>
            <p name="feederVoltage">0</p>
            <!-- Optional Block -->
        </managedObject>
        <managedObject class="ANTL" distName="BCF-1/MRBTS-1/ANTL-5"
            operation="auto" version="EX5.1">
            <!-- Mandatory Block -->
            <p name="antId">ANT4</p>
            <p name="rModId">1</p>
            <!-- Radio  Master Control Block -->
            <p name="feederLoss">-30</p>
            <p name="feederVoltage">0</p>
            <!-- Optional Block -->
        </managedObject>
        <managedObject class="ANTL" distName="BCF-1/MRBTS-1/ANTL-6"
            operation="auto" version="EX5.1">
            <!-- Mandatory Block -->
            <p name="antId">ANT6</p>
            <p name="rModId">1</p>
            <!-- Radio  Master Control Block -->
            <p name="feederLoss">-30</p>
            <p name="feederVoltage">0</p>
            <!-- Optional Block -->
        </managedObject>
        <managedObject class="RMOD" distName="BCF-1/MRBTS-1/RMOD-1"
            operation="auto" version="EX5.1">
            <!-- Optional Block -->
            <p name="moduleLocation">' . $module_location . '</p>
            <p name="hwType">RM</p>
            <p name="suppressAmbientAlarmEnabled">false</p>
            <p name="mcpaPower">80</p>
            <!-- Mandatory Block -->
            <list name="connectionList">
                <item>
                    <p name="sModId">1</p>
                    <p name="linkId">1</p>
                    <p name="positionInChain">1</p>
                </item>
            </list>
        </managedObject>
        <managedObject class="LCELC"
            distName="BCF-1/MRBTS-1/BTSSCC-1/LCELC-1" operation="auto" version="EX5.1">
            <!-- Optional Block -->
            <p name="anchorNodeId">0</p>
            <p name="txPowerPooling">Disabled</p>
            <!-- Mandatory Block -->
            <p name="perTrxPower">' . $perTrxPower . '</p>
            <list name="resourceList">
                <p>1</p>
            </list>
        </managedObject>
        <managedObject class="LCELC"
            distName="BCF-1/MRBTS-1/BTSSCC-1/LCELC-2" operation="auto" version="EX5.1">
            <!-- Optional Block -->
            <p name="anchorNodeId">0</p>
            <p name="txPowerPooling">Disabled</p>
            <!-- Mandatory Block -->
            <p name="perTrxPower">' . $perTrxPower . '</p>
            <list name="resourceList">
                <p>2</p>
            </list>
        </managedObject>
        <managedObject class="LCELC"
            distName="BCF-1/MRBTS-1/BTSSCC-1/LCELC-3" operation="auto" version="EX5.1">
            <!-- Optional Block -->
            <p name="anchorNodeId">0</p>
            <p name="txPowerPooling">Disabled</p>
            <!-- Mandatory Block -->
            <p name="perTrxPower">' . $perTrxPower . '</p>
            <list name="resourceList">
                <p>3</p>
            </list>
            </managedObject>
        <managedObject class="SMOD" distName="BCF-1/MRBTS-1/SMOD-1"
                operation="auto" version="EX5.1">
                <!-- Mandatory Block -->
            <p name="syncMaster">true</p>
            <p name="technology">GERAN</p>
            <!-- Optional Block -->
            <p name="moduleLocation">' . $module_location . '</p>
            <p name="tempSyncMasterTriggerTime">255</p>
            <list name="linkList">
                <item>
                    <p name="linkId">1</p>
                    <p name="radioMaster">true</p>
                </item>
                <item>
                    <p name="linkId">2</p>
                    <p name="radioMaster">true</p>
                </item>
                <item>
                    <p name="linkId">3</p>
                    <p name="radioMaster">true</p>
                </item>
                <item>
                    <p name="linkId">4</p>
                    <p name="radioMaster">true</p>
                </item>
            </list>
        </managedObject>
        <managedObject class="SCTP"
            distName="BCF-1/MRBTS-1/BTSSCC-1/BTSSCG-1/SCTP-1"
            operation="auto" version="EX5.1">
            <!--Mandatory Block-->
            <p name="minRTO">150</p>
            <p name="maxRTO">400</p>
            <p name="initRTO">200</p>
            <p name="periodSACK">120</p>
            <p name="hbInterval">1000</p>
            <p name="maxRetransPath">4</p>
            <p name="maxRetransAssoc">5</p>
            <p name="minSctpPort">49152</p>
            <p name="ackTimerIUA">4</p>
            <p name="bundlingEnabled">true</p>
        </managedObject>
        <managedObject class="MRBTS" distName="BCF-1/MRBTS-1"
            operation="auto" version="EX5.1"/>
        <managedObject class="BTSSCG"
            distName="BCF-1/MRBTS-1/BTSSCC-1/BTSSCG-1" operation="auto" version="EX5.1"/>
        <managedObject class="BTSSCC" distName="BCF-1/MRBTS-1/BTSSCC-1"
            operation="auto" version="EX5.1"/>
        <managedObject class="TRENE"
            distName="BCF-1/MRBTS-1/BTSSCC-1/BTSSCG-1/TRENE-1"
            operation="auto" version="EX5.1">
            <p name="piuType">PWE B E1/T1</p>
            <p name="abisSignalTiming">0</p>
            <p name="trsMode">PAoPSN</p>
            <p name="ipRoutingViaLmpEnabled">false</p>
            <p name="icmpMode">Enabled</p>
            <p name="pktFilteringEnabled">true</p>
            <p name="icmpRedirectEnabled">true</p>
        </managedObject>
        <managedObject class="UNIT"
            distName="BCF-1/MRBTS-1/BTSSCC-1/BTSSCG-1/UNIT-1"
            operation="auto" version="EX5.1">
            <list name="platformInterfaceSettings">
                <item>
                    <p name="interfaceID">9</p>
                    <p name="interfaceType">1</p>
                    <p name="interfaceName">E1/T1 1</p>
                    <p name="interfaceInUse">No</p>
                    <p name="interfaceCRCUsage">0</p>
                </item>
                <item>
                    <p name="interfaceID">10</p>
                    <p name="interfaceType">1</p>
                    <p name="interfaceName">E1/T1 2</p>
                    <p name="interfaceInUse">No</p>
                    <p name="interfaceCRCUsage">1</p>
                </item>
                <item>
                    <p name="interfaceID">11</p>
                    <p name="interfaceType">1</p>
                    <p name="interfaceName">E1/T1 3</p>
                    <p name="interfaceInUse">No</p>
                    <p name="interfaceCRCUsage">1</p>
                </item>
                <item>
                    <p name="interfaceID">12</p>
                    <p name="interfaceType">1</p>
                    <p name="interfaceName">E1/T1 4</p>
                    <p name="interfaceInUse">No</p>
                    <p name="interfaceCRCUsage">1</p>
                </item>
            </list>
        </managedObject>
        <managedObject class="SYNC"
            distName="BCF-1/MRBTS-1/BTSSCC-1/BTSSCG-1/SYNC-1"
            operation="auto" version="EX5.1">
            <list name="syncSources">
                <item>
                    <p name="priorityID">1</p>
                    <p name="syncType">6</p>
                </item>
                <item>
                    <p name="priorityID">2</p>
                    <p name="syncType">3</p>
                </item>
            </list>
            <p name="twoMHzClockOutput">Disabled</p>
            <p name="ssmEnabled">false</p>
            <p name="ssmRTO">5</p>
            <p name="syncMsgRate">16</p>
            <p name="syncMsgInterval">2</p>
            <p name="annouceMsgRate">2</p>
            <p name="unicastTransmissionTime">300</p>
            <p name="topEnabled">true</p>
            <p name="topMonitoringEnabled">true</p>
            <p name="unicastMasterIpAddress">' . $unicastMasterIpAddress . '</p>
            <p name="delayRequestMsgRate">128</p>
        </managedObject>
        <managedObject class="ETHPRT"
            distName="BCF-1/MRBTS-1/BTSSCC-1/BTSSCG-1/ETHPRT-1"
            operation="auto" version="EX5.1">
            <p name="monitoringEnabled">No</p>
            <p name="ethernetMtuSize">1500</p>
            <list name="portInterfaceSettings">
                <item>
                    <p name="portID">2</p>
                    <p name="portInUse">Yes</p>
                    <p name="destinationIngressPort">0</p>
                    <p name="destinationEgressPort">0</p>
                    <p name="portIngressPolicingEnabled">false</p>
                    <p name="portEgressPolicingEnabled">false</p>
                    <p name="portRole">Backhaul</p>
                    <p name="ethernetAutoNegEnabled">true</p>
                    <p name="portLinkSpeed">100</p>
                    <p name="portClockSelectionMode">Automatic</p>
                </item>
                <item>
                    <p name="portID">3</p>
                    <p name="portInUse">No</p>
                    <p name="destinationIngressPort">0</p>
                    <p name="destinationEgressPort">0</p>
                    <p name="portIngressPolicingEnabled">false</p>
                    <p name="portEgressPolicingEnabled">false</p>
                    <p name="portRole">Access_Switched</p>
                    <p name="ethernetAutoNegEnabled">false</p>
                </item>
                <item>
                    <p name="portID">1</p>
                    <p name="portInUse">No</p>
                    <p name="destinationIngressPort">0</p>
                    <p name="destinationEgressPort">0</p>
                    <p name="portIngressPolicingEnabled">false</p>
                    <p name="portEgressPolicingEnabled">false</p>
                    <p name="portRole">Access_Switched</p>
                </item>
                <item>
                    <p name="portID">4</p>
                    <p name="portInUse">Yes</p>
                    <p name="destinationIngressPort">0</p>
                    <p name="destinationEgressPort">0</p>
                </item>
            </list>
        </managedObject>
        <managedObject class="ETHSLC"
            distName="BCF-1/MRBTS-1/BTSSCC-1/BTSSCG-1/ETHSLC-1"
            operation="auto" version="EX5.1">
            <p name="serviceLayerOamEnabled">false</p>
        </managedObject>
        <managedObject class="ETHLK"
            distName="BCF-1/MRBTS-1/BTSSCC-1/BTSSCG-1/ETHLK-1"
            operation="auto" version="EX5.1">
            <p name="portID">2</p>
            <p name="linkOAMEnabled">false</p>
        </managedObject>
        <managedObject class="ETHLK"
            distName="BCF-1/MRBTS-1/BTSSCC-1/BTSSCG-1/ETHLK-2"
            operation="auto" version="EX5.1">
            <p name="portID">3</p>
            <p name="linkOAMEnabled">false</p>
        </managedObject>
        <managedObject class="ETHLK"
            distName="BCF-1/MRBTS-1/BTSSCC-1/BTSSCG-1/ETHLK-3"
            operation="auto" version="EX5.1">
            <p name="portID">1</p>
            <p name="linkOAMEnabled">false</p>
        </managedObject>
        <managedObject class="ETHQOS"
            distName="BCF-1/MRBTS-1/BTSSCC-1/BTSSCG-1/ETHQOS-1"
            operation="auto" version="EX5.1">
            <p name="qosAwareEthSwitchingEnabled">false</p>
            <p name="trafficClassificationRule">dscp</p>
            <list name="vlanIdTrafficClassMapping">
                <item>
                    <p name="vlanId">100</p>
                    <p name="trafficClass">2</p>
                </item>
                <item>
                    <p name="vlanId">200</p>
                    <p name="trafficClass">3</p>
                </item>
            </list>
            <list name="pBitsTrafficClassMapping">
                <item>
                    <p name="pBitValue">0</p>
                    <p name="trafficClass">0</p>
                </item>
                <item>
                    <p name="pBitValue">1</p>
                    <p name="trafficClass">0</p>
                </item>
                <item>
                    <p name="pBitValue">2</p>
                    <p name="trafficClass">1</p>
                </item>
                <item>
                    <p name="pBitValue">3</p>
                    <p name="trafficClass">1</p>
                </item>
                <item>
                    <p name="pBitValue">4</p>
                    <p name="trafficClass">2</p>
                </item>
                <item>
                    <p name="pBitValue">5</p>
                    <p name="trafficClass">2</p>
                </item>
                <item>
                    <p name="pBitValue">6</p>
                    <p name="trafficClass">3</p>
                </item>
                <item>
                    <p name="pBitValue">7</p>
                    <p name="trafficClass">3</p>
                </item>
            </list>
            <list name="dscpTrafficClassMapping">
                <item>
                    <p name="dscpValue">0</p>
                    <p name="trafficClass">0</p>
                </item>
                <item>
                    <p name="dscpValue">1</p>
                    <p name="trafficClass">0</p>
                </item>
                <item>
                    <p name="dscpValue">2</p>
                    <p name="trafficClass">0</p>
                </item>
                <item>
                    <p name="dscpValue">3</p>
                    <p name="trafficClass">0</p>
                </item>
                <item>
                    <p name="dscpValue">4</p>
                    <p name="trafficClass">0</p>
                </item>
                <item>
                    <p name="dscpValue">5</p>
                    <p name="trafficClass">0</p>
                </item>
                <item>
                    <p name="dscpValue">6</p>
                    <p name="trafficClass">0</p>
                </item>
                <item>
                    <p name="dscpValue">7</p>
                    <p name="trafficClass">0</p>
                </item>
                <item>
                    <p name="dscpValue">8</p>
                    <p name="trafficClass">0</p>
                </item>
                <item>
                    <p name="dscpValue">9</p>
                    <p name="trafficClass">0</p>
                </item>
                <item>
                    <p name="dscpValue">10</p>
                    <p name="trafficClass">1</p>
                </item>
                <item>
                    <p name="dscpValue">11</p>
                    <p name="trafficClass">0</p>
                </item>
                <item>
                    <p name="dscpValue">12</p>
                    <p name="trafficClass">1</p>
                </item>
                <item>
                    <p name="dscpValue">13</p>
                    <p name="trafficClass">0</p>
                </item>
                <item>
                    <p name="dscpValue">14</p>
                    <p name="trafficClass">1</p>
                </item>
                <item>
                    <p name="dscpValue">15</p>
                    <p name="trafficClass">0</p>
                </item>
                <item>
                    <p name="dscpValue">16</p>
                    <p name="trafficClass">0</p>
                </item>
                <item>
                    <p name="dscpValue">17</p>
                    <p name="trafficClass">0</p>
                </item>
                <item>
                    <p name="dscpValue">18</p>
                    <p name="trafficClass">1</p>
                </item>
                <item>
                    <p name="dscpValue">19</p>
                    <p name="trafficClass">0</p>
                </item>
                <item>
                    <p name="dscpValue">20</p>
                    <p name="trafficClass">1</p>
                </item>
                <item>
                    <p name="dscpValue">21</p>
                    <p name="trafficClass">0</p>
                </item>
                <item>
                    <p name="dscpValue">22</p>
                    <p name="trafficClass">1</p>
                </item>
                <item>
                    <p name="dscpValue">23</p>
                    <p name="trafficClass">0</p>
                </item>
                <item>
                    <p name="dscpValue">24</p>
                    <p name="trafficClass">0</p>
                </item>
                <item>
                    <p name="dscpValue">25</p>
                    <p name="trafficClass">0</p>
                </item>
                <item>
                    <p name="dscpValue">26</p>
                    <p name="trafficClass">2</p>
                </item>
                <item>
                    <p name="dscpValue">27</p>
                    <p name="trafficClass">0</p>
                </item>
                <item>
                    <p name="dscpValue">28</p>
                    <p name="trafficClass">2</p>
                </item>
                <item>
                    <p name="dscpValue">29</p>
                    <p name="trafficClass">0</p>
                </item>
                <item>
                    <p name="dscpValue">30</p>
                    <p name="trafficClass">2</p>
                </item>
                <item>
                    <p name="dscpValue">31</p>
                    <p name="trafficClass">0</p>
                </item>
                <item>
                    <p name="dscpValue">32</p>
                    <p name="trafficClass">0</p>
                </item>
                <item>
                    <p name="dscpValue">33</p>
                    <p name="trafficClass">0</p>
                </item>
                <item>
                    <p name="dscpValue">34</p>
                    <p name="trafficClass">2</p>
                </item>
                <item>
                    <p name="dscpValue">35</p>
                    <p name="trafficClass">0</p>
                </item>
                <item>
                    <p name="dscpValue">36</p>
                    <p name="trafficClass">2</p>
                </item>
                <item>
                    <p name="dscpValue">37</p>
                    <p name="trafficClass">0</p>
                </item>
                <item>
                    <p name="dscpValue">38</p>
                    <p name="trafficClass">2</p>
                </item>
                <item>
                    <p name="dscpValue">39</p>
                    <p name="trafficClass">0</p>
                </item>
                <item>
                    <p name="dscpValue">40</p>
                    <p name="trafficClass">0</p>
                </item>
                <item>
                    <p name="dscpValue">41</p>
                    <p name="trafficClass">0</p>
                </item>
                <item>
                    <p name="dscpValue">42</p>
                    <p name="trafficClass">0</p>
                </item>
                <item>
                    <p name="dscpValue">43</p>
                    <p name="trafficClass">0</p>
                </item>
                <item>
                    <p name="dscpValue">44</p>
                    <p name="trafficClass">0</p>
                </item>
                <item>
                    <p name="dscpValue">45</p>
                    <p name="trafficClass">0</p>
                </item>
                <item>
                    <p name="dscpValue">46</p>
                    <p name="trafficClass">3</p>
                </item>
                <item>
                    <p name="dscpValue">47</p>
                    <p name="trafficClass">0</p>
                </item>
                <item>
                    <p name="dscpValue">48</p>
                    <p name="trafficClass">0</p>
                </item>
                <item>
                    <p name="dscpValue">49</p>
                    <p name="trafficClass">0</p>
                </item>
                <item>
                    <p name="dscpValue">50</p>
                    <p name="trafficClass">0</p>
                </item>
                <item>
                    <p name="dscpValue">51</p>
                    <p name="trafficClass">0</p>
                </item>
                <item>
                    <p name="dscpValue">52</p>
                    <p name="trafficClass">0</p>
                </item>
                <item>
                    <p name="dscpValue">53</p>
                    <p name="trafficClass">0</p>
                </item>
                <item>
                    <p name="dscpValue">54</p>
                    <p name="trafficClass">0</p>
                </item>
                <item>
                    <p name="dscpValue">55</p>
                    <p name="trafficClass">0</p>
                </item>
                <item>
                    <p name="dscpValue">56</p>
                    <p name="trafficClass">0</p>
                </item>
                <item>
                    <p name="dscpValue">57</p>
                    <p name="trafficClass">0</p>
                </item>
                <item>
                    <p name="dscpValue">58</p>
                    <p name="trafficClass">0</p>
                </item>
                <item>
                    <p name="dscpValue">59</p>
                    <p name="trafficClass">0</p>
                </item>
                <item>
                    <p name="dscpValue">60</p>
                    <p name="trafficClass">0</p>
                </item>
                <item>
                    <p name="dscpValue">61</p>
                    <p name="trafficClass">0</p>
                </item>
                <item>
                    <p name="dscpValue">62</p>
                    <p name="trafficClass">0</p>
                </item>
                <item>
                    <p name="dscpValue">63</p>
                    <p name="trafficClass">0</p>
                </item>
            </list>
        </managedObject>
        <managedObject class="ETHPRO"
            distName="BCF-1/MRBTS-1/BTSSCC-1/BTSSCG-1/ETHPRO-1"
            operation="auto" version="EX5.1">
            <p name="spanningTreeMode">NONE</p>
            <p name="losTriggerEnabled">true</p>
            <p name="forceProtocolVersion">RSTP</p>
            <p name="autoEdgeEnabled">false</p>
            <p name="bridgeHelloTime">1</p>
            <p name="bridgeForwardDelay">15</p>
            <p name="bridgeMaxAge">20</p>
            <p name="transmitHoldCount">10</p>
            <p name="bridgePriority">32768</p>
        </managedObject>
        <managedObject class="PABTRS"
            distName="BCF-1/MRBTS-1/BTSSCC-1/BTSSCG-1/PABTRS-1"
            operation="auto" version="EX5.1">
            <p name="mPlaneLocalIpAddress">' . $mPlaneLocalIpAddress . '</p>
            <p name="mPlaneSubnetMask">29</p>
            <p name="mPlaneRemoteIpAddress">' . $mPlaneRemoteIpAddress . '</p>
            <p name="mPlaneGatewayIpAddress">' . $mPlaneGatewayIpAddress . '</p>
            <p name="cuPlaneGatewayIpAddress">' . $cuPlaneGatewayIpAddress . '</p>
            <p name="mPlaneVlanId">100</p>
            <p name="cPlaneVlanId">200</p>
            <p name="ucsSupervisionPktTimerValue">2000</p>
            <p name="upsSupervisionPktTimerValue">2000</p>
        </managedObject>
    </cmData>
</raml>
';

        // CREATION of XML FILE
        // $xmlFile = new XmlFileLoader;

        $xmlName = $site_name . '_xml_input.xml';


        unlink($xmlName);

        $fileName = fopen($xmlName, 'a+');

        // if($xmlFile->open(public_path($fileName),XmlFileLoader::CREATE)==TRUE){

        // }
        // dd($fileName);
        fputs($fileName,$contentOfXml);

        return Response::download($xmlName);

        fclose($fileName);
    }
}
