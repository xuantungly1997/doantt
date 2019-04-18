<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Order;
use App\Product;
use App\OrderDetail;
use Carbon\Carbon;

class StatisticalController extends Controller
{
    //
    public function getStatistical(){
        $orderdonot = Order::whereDay('created_at',date('d'))->where('status','=',0)->count();
        $orderdone = Order::whereDay('created_at',date('d'))->where('status','=',1)->count();
        $date = Carbon::now()->format('Y-m-d');
        $data = Order::where(['date_order' => $date])->get();
        $count= count($data);
        if($data&&$count>0){
            $dataArr = $this->caculatePercentOrder($data);
        }
        else {
            $dataArr= "0,0";
        }
        return view('admin.statistical.sanphamban', ['data' => $dataArr,'date'=>$date,'donot'=>$orderdonot,'done'=>$orderdone]);
    }

    public function getStatisticalintoday(Request $request){
        $date = (new Carbon($request->date))->format('Y-m-d');
        if($date) {
            $data = Order::where(['date_order' => $date])->get();
            $count= count($data);
        }
        if($data&&$count>0) {
            $dataArr = $this->caculatePercentOrder($data);
            return response()->json($dataArr);
        }
        else {
            $dataArr= "0,0";
            return response()->json($dataArr);
        }
    }

    public function caculatePercentOrder($data) {
        $countRow = count($data);
        $countOrderPayed = 0;
        $countOrderNotPayed = 0;
        foreach ($data as $item) {
            if($item->status === 1) {
                $countOrderPayed++;
            } else {
                $countOrderNotPayed++;
            }
        }
        $arrPercent = round((float)(($countOrderPayed/$countRow)*100), 2) . ',' . round((float)(($countOrderNotPayed/$countRow)*100), 2);
        return $arrPercent;
    }

    public function getRevenue(){
        $moneyDay = Order::whereDay('created_at',date('d'))->where('status','=',1)->sum('total');
        $moneyDay1=number_format("$moneyDay");
        $moneyMonth = Order::whereMonth('created_at',date('m'))->where('status','=',1)->sum('total');
        $moneyMonth1=number_format("$moneyMonth");
        $dataMoney = [
            [
                "name"=>"doanh thu ngày",
                "y"=>(double)$moneyDay
            ],
            [
                "name"=>"doanh thu tháng",
                "y"=>(double)$moneyMonth
            ],
        ];
        return view('admin.statistical.chart_doanhthu',['dataMoney'=>json_encode($dataMoney),'moneyDay'=>$moneyDay1,'moneyMonth'=>$moneyMonth1]);
    }


    public function getIndex()
    {
        return view('admin.statistical.indexSta');
    }

   public function filters(Request $request){
       $date = '' ;
       $sumtotal1 =0;
        if(isset($request->date_start) && isset($request->date_end)) {
            $datestart = $request->date_start;
            $dateend =  $request->date_end;
            $sumtotal = Order::where([
                ['status',1],
                ['date_order','>=',$datestart],
                ['date_order','<=',$dateend],
            ])->sum('total');
            $sumtotal1=number_format("$sumtotal");
            $dataMoney = [
                [
                    "name"=>"doanh thu ngày",
                    "y"=>(double)$sumtotal
                ],
            ];
        }
        else
        {
            $date = (Carbon::now())->format('Y-m-d');
            $sumtotal = Order::where([
                ['status',1],
                ['date_order','=',$date],
            ])->sum('total');
            $sumtotal1=number_format("$sumtotal");
            $dataMoney = [
                [
                    "name"=>"doanh thu ngày",
                    "y"=>(double)$sumtotal
                ],
            ];

        }
        return view('admin.statistical.locdetail',['sumtotal'=>json_encode($dataMoney), 'date' => $date,'total'=>$sumtotal1]);
   }
}
