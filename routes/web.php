<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// CORE DEPARTMENT TOOL: HOME OPERATIONS
//Route::view('/', 'operationsHome');

//Route::view('/', 'home');

//Menu
Route::view('menu', 'menu');
Route::view('menu2', 'includes.menu2');


/////////////////////////***************************** OPERATIONS BSS**************************///////////////////////////////////////////////////////////////////////

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
                                                            // NOKIA VENDOR
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

// TRX BLOCK
Route::get('nokia2g-trx-block','trxBlockController@trxBlockIndex');
Route::post('nokia2g-trx-block','trxBlockController@trxBlockStore')->name('nokia2g-trx-block');

// EXPORT ALL TRX
Route::get('nokia2g-all-trx','trxBlockController@alltrxExport');

// EXPORT TRX BLOCK
Route::get('nokia2g-all-trx-block','trxBlockController@blockTrxExport');

// Documentation
Route::get('nokia2g-trx-block-documentation','DocumentationController@trxBlockDocumentationIndex');
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

// UPGRADE CAPACITY NOKIA
//Route::get('nokia2g-upgrade-capacity','upgradeCapacityNokiaController@upgradeCapacityNokiaIndex');
//Route::get('/','upgradeCapacityNokiaController@upgradeCapacityNokiaIndex');
//Route::post('nokia2g-upgrade-capacity','upgradeCapacityNokiaController@upgradeCapacityNokiaStore')->name('nokia2g-upgrade-capacity');

// UPGRADE CAPACITY NOKIA DOWNLOAD SCRIPT
Route::get('nokia2g-upgrade-capacity-download-script','upgradeCapacityNokiaController@downloadScript');

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

// UPGRADE CAPACITY NOKIA
Route::get('/','upgradeCapacityNokiaController@upgradeCapacityNokiaPerspIndex');

Route::post('/bss-tool/nokia2g-upgrade-capacity','upgradeCapacityNokiaController@upgradeCapacityNokiaPerspStore')->name('nokia2g-upgrade-capacity');


//documentation
Route::get('nokia2g-upgrade-capacity-documentation','DocumentationController@upgradeCapacityDocumentationIndex');
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// UPDATE DATA FOR UPGRADE CAPACITY
Route::get('nokia2g-upgrade-capacity-update', 'upgradeCapacityNokiaUpdateController@upgradeCapacityNokiaUpdateIndex');
Route::post('nokia2g-upgrade-capacity-update', 'upgradeCapacityNokiaUpdateController@upgradeCapacityNokiaUpdateStore')->name('nokia2g-upgrade-capacity-update');

// doc
Route::get('nokia2g-upgrade-capacity-update-documentation', 'DocumentationController@upgradeCapacityNokiaUpdateDocIndex');

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

//Generate Xml file nokia 2G
Route::get('nokia2g-xml', 'xmlController@xmlIndex');
Route::post('nokia2g-xml', 'xmlController@xmlStore')->name('nokia2g-xml');

//xml file downloaded
Route::get('nokia2g-xml-generated','xmlController@xmlDownloaded')->name('nokia2g-xml-generated');
Route::get('nokia2g-xml-error','xmlController@xmlError');

// Documentation
Route::get('nokia2g-xml-documentation','DocumentationController@xmlDocumentationIndex');
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

//Generate Xml file nokia 3G FSME
Route::get('nokia3g-xml-FSME','xmlController_3G@xmlIndex_FSME');
Route::POST('nokia3g-xml-FSME','xmlController_3G@xmlStore_FSME')->name('nokia3g-xml-FSME');

// download static route file generated
Route::get('nokia3g-xml-FSME_generated','xmlController_3G@xmlScriptFSMEGenerated'); //->name('nokia3g-xml-FSME_generated');

//xml FSME file downloaded
Route::get('nokia3g-xml-FSME_download','xmlController_3G@xmlScriptFSMEDownload'); //->name('nokia3g-xml-FSME_download');

//Documentation
Route::get('nokia3g-xml-FSME-documentation', 'DocumentationController@xmlDocumentationIndex_FSME');
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

//Generate Xml file nokia 3G FSMF
Route::get('nokia3g-xml-FSMF', 'xmlControllerFSMF_3G@xmlFMSFIndex');
Route::POST('nokia3g-xml-FSMF', 'xmlControllerFSMF_3G@xmlFMSFStore')->name('nokia3g-xml-FSMF');

// script for static route file generated
Route::get('nokia3g-xml-FSMF_generated', 'xmlControllerFSMF_3G@xmlFSMFGenerated');//->name('nokia3g-xml-FSME_generated');

// xml FSMF file downloaded
Route::get('nokia3g-xml-FSMF_download', 'xmlControllerFSMF_3G@xmlFSMFDownload');//->name('nokia3g-xml-FSMF_download');

//Documentation
Route::get('nokia3g-xml-FSMF-documentation', 'DocumentationController@xmlDocumentationIndex_FSMF');
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

//UPADATE DATA NPGEP
Route::get('nokia-update-data_npgep','updateDataController@updateData_npgepIndex');
Route::POST('nokia-update-data_npgep','updateDataController@updateData_npgepStore')->name('nokia-update-data_npgep');

//UPDATE DATA Node B Plan FROM BTS IP PLANNING
Route::get('nokia-update-data-nodeb', 'updateDataNodeBPlanController@updateDataNodeBPlanIndex');
Route::POST('nokia-update-data-nodeb', 'updateDataNodeBPlanController@updateDataNodeBPlanStore')->name('nokia-update-data-nodeb');

// doc
Route::get('nokia-update-data-nodeb-doc', 'DocumentationController@updateDataNodeBPlanDocIndex');


//UPDATE DATA BTS Plan FROM BTS IP PLANNING
Route::get('nokia-update-data-bts','updateDataBTSPlanController@updateDataBTSPlanIndex');
Route::POST('nokia-update-data-bts','updateDataBTSPlanController@updateDataBTSPlanStore')->name('nokia-update-data-bts');
// doc
Route::get('nokia-update-data-bts-doc','DocumentationController@updateDataBTSPlanDocIndex');

//Update script config
Route::get('nokia-update-data-scrpit-config', 'updateScriptConfig@updateScriptConfigIndex');
Route::POST('nokia-update-data-scrpit-config','updateScriptConfig@updateScriptConfigStore')->name('nokia-update-data-scrpit-config');

//doc
Route::get('nokia-update-data-scrpit-config-doc', 'DocumentationController@updateScriptConfigDocIndex');

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

// REHOMING IPNB Profil
Route::get('nokia3g-profil-ipnb','profilCsv_XmlController@profilCsv_XmlIndex');
Route::POST('nokia3g-profil-ipnb', 'profilCsv_XmlController@profilCsv_XmlStore')->name('nokia3g-profil-ipnb');

// Static route
Route::get('nokia3g-profil-csv-static-route', 'profilCsv_XmlController@staticRoute');

//Download profil IPNB
Route::get('nokia3g-profil-csv-profil-download','profilCsv_XmlController@profilIpnbDownload');

//Download xml file
Route::get('nokia3g-profil-ipnb-xml','profilCsv_XmlController@profilDownloadXml');

//////////////////////////////////WBTS//////////////////////////////////////

// REHOMING WBTS PROFIL
Route::get('nokia3g-profil-wbts', 'profilCsv_XmlController@profilWbtsIndex');
Route::POST('nokia3g-profil-wbts', 'profilCsv_XmlController@profilWbtsStore')->name('nokia3g-profil-wbts');

//Download profil WBTS
Route::get('nokia3g-profil-wbts-download','profilCsv_XmlController@profilWbtsDownload');

////////////////////////////////////////////////////////////////////////////

// REHOMING WCELL PROFIL
Route::get('nokia3g-profil-wcell','profilCsv_XmlController@profilWcellIndex');
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


route::view('accueil', 'layouts.accueil');

route::view('menuEssai', 'menu');


////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//                                                    HUAWEI VENDOR
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

//XML HUAWEI 3G
Route::get('huawei3g-xml', 'xmlHuaweiController@xmlHuaweiIndex');
Route::POST('huawei3g-xml', 'xmlHuaweiController@xmlHuaweiStore')->name('huawei3g-xml');

//Huawei update cdd3g
Route::get('huawei3g-cdd3g-update', 'xmlHuaweiUpdateController@cdd3gIndex');
Route::POST('huawei3g-cdd3g-update', 'xmlHuaweiUpdateController@cdd3gStore')->name('huawei3g-cdd3g-update');

//Huawei update 3G_HW_DATA
Route::get('huawei3g-3g_hw_data-update', 'xmlHuaweiUpdateController@hw_3g_dataIndex');
Route::POST('huawei3g-3g_hw_data-update', 'xmlHuaweiUpdateController@hw_3g_dataStore')->name('huawei3g-3g_hw_data-update');

//Download xml file
Route::get('huawei3g-xml-download', 'xmlHuaweiController@xmlHuaweiDownload');
