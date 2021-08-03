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

     private function getDutyPayment(){
        
        $orgBillOfLading = Shipment::where("status",5 )->whereRaw("datediff(created_at, now())*-1 >= 1")->count();   
        return $orgBillOfLading;
    }

    private function getGoodsRCVD(){
        
        $orgBillOfLading = Shipment::where("status",6 )->whereRaw("datediff(created_at, now())*-1 >= 1")->count();   
        return $orgBillOfLading;
    }

    private function getClearingBillCount(){
        
        $orgBillOfLading = Shipment::where("status",7 )->whereRaw("datediff(created_at, now())*-1 >= 1")->count();   
        return $orgBillOfLading;
    }

    private function getCostingCount(){
        
        $orgBillOfLading = Shipment::where("status",8 )->whereRaw("datediff(created_at, now())*-1 >= 1")->count();   
        return $orgBillOfLading;
    }

    public function index(){

        $bookingalert           = $this->getBookingAlertCount();
        $customdeclarationalert = $this->getCustomDeclarationCount();
        $OrgBillOfLeadingRCVD   = $this->getOrgBillOfLadingRCVDCount();
        $infoToStories          = $this->getInfoToStoriesCount();
        $dutyPayment            = $this->getDutyPayment(); 
        $goodsRCVD              = $this->getGoodsRCVD(); 
        $clearingBillCount      = $this->getClearingBillCount(); 
        $costingCount           = $this->getCostingCount(); 
        return view("report.alert.index",compact("bookingalert","customdeclarationalert","OrgBillOfLeadingRCVD","infoToStories","dutyPayment","goodsRCVD","clearingBillCount","costingCount"));
    }


    public function customdeclaration_report(){
        $customdeclarational = Shipment::where("status",2 )->whereRaw("datediff(created_at, now())*-1 >= 3")->get();   
    
        return view("report.alert.customdeclaration",compact('customdeclarational'));
    }

    public function orgBillOfLadingRCVD_report(){
        $orgBillOfLading = Shipment::join('supplier','shipment.supplier_id','supplier.id')
                                    ->join('prebooking','shipment.booking_id','prebooking.id')
                                    ->where("shipment.status",3 )->whereRaw("datediff(shipment.created_at, now())*-1 >= 1")
                                    ->select("shipment.*","prebooking.pfi_no","prebooking.po_number","supplier.supplier_name")
                                    ->get();   
        return view("report.alert.originalbilloflading",compact('orgBillOfLading'));
    } 

    public function infoToStore(){
        $orgBillOfLading = Shipment::join('supplier','shipment.supplier_id','supplier.id')
                                    ->join('prebooking','shipment.booking_id','prebooking.id')
                                    ->where("shipment.status",4 )->whereRaw("datediff(shipment.created_at, now())*-1 >= 1")
                                    ->select("shipment.*","prebooking.pfi_no","prebooking.po_number","supplier.supplier_name")
                                    ->get();   
        return view("report.alert.infotostores",compact('orgBillOfLading'));
    }

    
}
