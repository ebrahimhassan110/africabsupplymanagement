<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Prebooking;
use App\Models\Shipment;
class ReportAlertController extends Controller
{
    private $today ="";

    public function __construct(){
        $this->today = date("Y-m-d");
    }

    private function getBookingAlertCount(){
           
        $daysdifference = Prebooking::whereRaw("datediff(created_at, now())*-1 >= 7")->count();
        return $daysdifference;
    }

    private function getCustomDeclarationCount(){
        
        $customdeclarational = Shipment::where("status",2 )->whereRaw("datediff(created_at, now())*-1 >= 3")->count();   
        return $customdeclarational;
    }

    private function getOrgBillOfLadingRCVDCount(){
        
        $orgBillOfLading = Shipment::where("status",3 )->whereRaw("datediff(created_at, now())*-1 >= 1")->count();   
        return $orgBillOfLading;
    }


    private function getInfoToStoriesCount(){
        
        $orgBillOfLading = Shipment::where("status",4 )->whereRaw("datediff(created_at, now())*-1 >= 1")->count();   
        return $orgBillOfLading;
    }

    public function index(){
        $bookingalert           = $this->getBookingAlertCount();
        $customdeclarationalert = $this->getCustomDeclarationCount();
        $OrgBillOfLeadingRCVD   = $this->getOrgBillOfLadingRCVDCount(); 
        $infoToStories   = $this->getInfoToStoriesCount(); 

        return view("report.alert.index",compact("bookingalert","customdeclarationalert","OrgBillOfLeadingRCVD","infoToStories"));
    }


    public function customdeclaration_report(){
        $customdeclarational = Shipment::where("status",2 )->whereRaw("datediff(created_at, now())*-1 >= 3")->get();   
    
        return view("report.alert.customdeclaration",compact('customdeclarational'));
    }
}
