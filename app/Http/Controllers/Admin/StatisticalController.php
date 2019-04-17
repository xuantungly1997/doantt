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

    public function filters($start,$end,$tp)
    {   $type=$tp;
        dd($type);
        if($start=='' || $end=='')
        {
            $start=date('Y/m/d');
            $end = date('Y/m/d');
        }else{
            $start=date('Y/m/d', strtotime($start));
            $end = date('Y/m/d', strtotime($end));
        }
        switch ($type) {
            case 1:
                $count = Product::whereBetween('created',[$start,$end])->count();
                $products = Product::whereBetween('created',[$start,$end])->paginate(8);
                return view('admin.statistical.locdetail',compact('products','count','type'));
                break;
            case 2:
                $idpd = OrderDetail::select('product_id')->join('order', 'order.id', '=', 'orderdetail.order_id')->where('order.status','=',1)->get();
                $id =array();
                foreach ($idpd as $value) {
                    array_push($id, $value->product_id);
                }

                $count = Product::whereIn('id',$id)->count();
                $products =Product::whereIn('id',$id)->paginate(8);
                return view('admin.statistical.locdetail',compact('products','type','count'));
                break;

            case 3:
                $orders = Order::where('status','=',0)->paginate(8);
                $count = Order::where('status','=',0)->count();
                return view('admin.statistical.od',compact('orders','type','count'));
                break;
            case 4:
                $orders = Order::where('status','=',1)->paginate(8);
                $count = Order::where('status','=',1)->count();
                return view('admin.statistical.od',compact('orders','type','count'));
                break;
            case 5:
                $orders = Order::where('status','=',2)->paginate(8);
                $count = Order::where('status','=',2)->count();
                return view('admin.statistical.od',compact('orders','type','count'));
                break;
            default:
                # code...
                break;
        }
    }
}
