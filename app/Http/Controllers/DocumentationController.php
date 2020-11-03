<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DocumentationController extends Controller
{

//    UPGRADE CAPACITY DOCUMENTATION
    public function upgradeCapacityDocumentationIndex(){
        return view('BSS-operations.nokia2G.documentation.upgradeCapacityDocumentation');
    }

//    TRX BLOCK DOCUMENTATION
    public function trxBlockDocumentationIndex(){
        return view('BSS-operations.nokia2G.documentation.trxBlockDocumentation');
    }

//    XML Nokia 2G DOCUMENTATION

    public function xmlDocumentationIndex(){
        return view('BSS-operations.nokia2G.documentation.xmlDocumentation');
    }

    public function xmlDocumentationIndex_FSME(){
        return view('BSS-operations.nokia3G.documentation.xml-nokia3G-FSME-documentation');
    }

    public function xmlDocumentationIndex_FSMF(){
        return view('BSS-operations.nokia3G.documentation.xml-nokia3G-FSMF-documentation');
    }

    public function updateDataBTSPlanDocIndex(){
        return view('BSS-operations.documentation.updateData_BTS_PLAN_DOC');
    }

    public function updateDataNodeBPlanDocIndex(){
        return view('BSS-operations.documentation.updateData_NodeB_PLAN_DOC');
    }
    public function updateScriptConfigDocIndex(){
        return view('BSS-operations.documentation.updateScriptConfigDocumentation');
    }
    public function upgradeCapacityNokiaUpdateDocIndex(){
        return view('BSS-operations.nokia2G.documentation.upgradeCapacityUpdateDoc');
    }

}
