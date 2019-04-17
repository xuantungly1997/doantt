@extends('admin.master')
@section('title','danh sách sản phẩm')
@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Quản lí sản phẩm</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <p class="p-title">BẢNG DỮ LIỆU</p>
                        <a href="{{route('addproduct')}}"><button class="btn btn-info"><i class="fa fa-plus-circle fa-fw"></i>Thêm mới</button></a>
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Tên sản phẩm</th>
                                    <th>Hình ảnh</th>
                                    <th>Danh mục</th>
                                    <th>Số lượng</th>
                                    <th>size</th>
                                    <th>color</th>
                                    <th>Trạng thái</th>
                                    <th>Thao tác</th>

                                </tr>
                                </thead>
                                <style>
                                    .td-action{
                                        display: flex;
                                    }
                                    .btn-action{
                                        margin: 2px;
                                    }
                                </style>
                                <tbody>
                                    @foreach ($product as $item)
                                          <tr class="gradeU">
                                            <td>{{$item->id}}</td>
                                            <td>{{$item->name}}</td>
                                            <td><img src="../uploads/products/{{$item->thumb}}" alt="" style="width: 100px;
                                            height: 120px; object-fit: cover"></td>
                                            <td>{{$item->cates['name']}}</td>
                                            <td class="center">{{$item->amount}}</td>
                                            <td class="center">
                                                 @foreach ($item->sizes as $size)
                                                    {{$size->value}},
                                                  @endforeach
                                            </td>

                                              <td class="center">
                                                  @foreach ($item->colors as $color)
                                                      {{$color->value}},
                                                  @endforeach
                                              </td>
                                              <td>
                                                  @if($item->status==1)
                                                      <span style="color: green;font-weight: bold;">Bán</span>
                                                  @else
                                                      <span style="color: pink;font-weight: bold;">Tồn kho</span>
                                                  @endif
                                              </td>
                                              <td class="td-action">
                                                <button class="btn btn-primary btn-action" data-toggle="modal" data-target="#ModalDetail<?=$item->id?>" title="Xem chi tiết"><i class="fa fa-eye fa-fw"></i></button>
                                                  {{--//modal--}}
                                                  <div class="modal fade" id="ModalDetail<?=$item->id?>" role="dialog">
                                                      <div class="modal-dialog modal-lg">
                                                          <div class="modal-content">
                                                              <div class="modal-header">
                                                                  <h3>
                                                                      CHI TIẾT SẢN PHẨM
                                                                  </h3>
                                                              </div>
                                                              <div class="modal-body modal-custom">
                                                                  <ul class="nav nav-tabs">
                                                                      <li class="active"><a data-toggle="tab" href="#home<?=$item->id?>">Thông tin</a></li>
                                                                      <li><a data-toggle="tab" href="#menu1<?=$item->id?>">Thuộc tính</a></li>
                                                                      <li><a data-toggle="tab" href="#menu2<?=$item->id?>">Hình ảnh</a></li>
                                                                      <li><a data-toggle="tab" href="#menu3<?=$item->id?>">Bình luận</a></li>
                                                                  </ul>

                                                                  <div class="tab-content">
                                                                      <div id="home<?=$item->id?>" class="tab-pane fade in active">
                                                                          <table class="infor-product">
                                                                              <tr>
                                                                                  <td class="text-center" width="30%">Tên sản phẩm</td>
                                                                                  <td width="70%" class="infor-left"><strong>{{$item->name}}</strong></td>
                                                                              </tr>
                                                                              <tr>
                                                                                  <td class="text-center" width="30%">Ngày thêm:</td>
                                                                                  <td width="70%" class="infor-left"><strong>{{$item->created_at}}</strong></td>
                                                                              </tr>
                                                                              <tr>
                                                                                  <td class="text-center" width="30%">Danh mục sản phẩm:</td>
                                                                                  <td width="70%" class="infor-left"><strong>{{$item->cates['name']}}</strong></td>
                                                                              </tr>
                                                                              <tr>
                                                                                  <td class="text-center" width="30%">Trạng thái:</td>
                                                                                  <td width="70%" class="infor-left">
                                                                                      @if($item->status==0)
                                                                                        <strong style="color: palevioletred">Tồn kho</strong>
                                                                                      @else
                                                                                          <strong style="color: green">Bán</strong>
                                                                                      @endif
                                                                                  </td>
                                                                              </tr>
                                                                          </table>
                                                                      </div>
                                                                      <div id="menu1<?=$item->id?>" class="tab-pane fade">
                                                                          <table class="infor-product">
                                                                              <tr>
                                                                                  <td class="text-center" width="30%">Màu sắc</td>
                                                                                  <td width="70%" class="infor-left">
                                                                                      <ul class="ul-color">
                                                                                          @foreach($item->colors as $color)
                                                                                              <li>{{$color->value}},</li>
                                                                                          @endforeach
                                                                                      </ul>
                                                                                  </td>
                                                                              </tr>
                                                                              <tr>
                                                                                  <td class="text-center" width="30%">Kích thước:</td>
                                                                                  <td width="70%" class="infor-left">
                                                                                      <ul class="ul-size">
                                                                                          @foreach($item->sizes as $size)
                                                                                              <li>{{$size->value}}</li>
                                                                                          @endforeach
                                                                                      </ul>
                                                                                  </td>
                                                                              </tr>
                                                                              <tr>
                                                                                  <td class="text-center" width="30%">Số lượng nhập:</td>
                                                                                  <td width="70%" class="infor-left"><strong>{{$item->amount}}</strong></td>
                                                                              </tr>
                                                                              <tr>
                                                                                  <td class="text-center" width="30%">Số lượng bán:</td>
                                                                                  <td width="70%" class="infor-left"><strong>0</strong></td>
                                                                              </tr>
                                                                              <tr>
                                                                                  <td class="text-center" width="30%">Feauture:</td>
                                                                                  <td width="70%" class="infor-left">
                                                                                          @if($item->feauture==0)
                                                                                            <strong>Hàng cũ</strong>
                                                                                          @elseif($item->feauture==1)
                                                                                            <strong>Hàng mới</strong>
                                                                                          @else
                                                                                            <strong>Hàng hot</strong>
                                                                                          @endif
                                                                                  </td>
                                                                              </tr>
                                                                              <tr>
                                                                                  <td class="text-center" width="30%">Hãng sản xuất:</td>
                                                                                  <td width="70%" class="infor-left"><strong>{{$item->producter}}</strong></td>
                                                                              </tr>
                                                                              <tr>
                                                                                  <td class="text-center" width="30%">Giá nhập:</td>
                                                                                  <td width="70%" class="infor-left"><strong>{{$item->default_price}} VND</strong></td>
                                                                              </tr>
                                                                              <tr>
                                                                                  <td class="text-center" width="30%">Giá bán:</td>
                                                                                  <td width="70%" class="infor-left"><strong>{{$item->unit_price}} VND</strong></td>
                                                                              </tr>
                                                                              <tr>
                                                                                  <td class="text-center" width="30%">Giảm giá:</td>
                                                                                  <td width="70%" class="infor-left"><strong>{{$item->promotion_price}} %</strong></td>
                                                                              </tr>
                                                                              <tr>
                                                                                  <td class="text-center" width="30%">Mô tả:</td>
                                                                                  <td width="70%" class="infor-left">{!! $item->description !!}</td>
                                                                              </tr>
                                                                          </table>
                                                                      </div>
                                                                      <div id="menu2<?=$item->id?>" class="tab-pane fade">

                                                                          <ul class="ul-img">
                                                                              @foreach($item->arrimg as $arr)
                                                                                  <li>
                                                                                      <img src="../uploads/products/{{$arr}}" alt="" >
                                                                                  </li>
                                                                              @endforeach
                                                                          </ul>
                                                                      </div>
                                                                      <style>
                                                                          .ul-cmt{
                                                                              list-style-type: none;
                                                                              padding-left: 0;
                                                                          }
                                                                          .ul-cmt li{
                                                                              margin-bottom: 10px;
                                                                              font-size: 18px;
                                                                          }
                                                                          .ul-cmt li .cmt-content{
                                                                              border: 1px solid #e6e7e7;
                                                                              padding: 10px;
                                                                          }
                                                                          .ul-cmt li .cmt-content button{
                                                                              height: 25px;
                                                                              padding: 0 10px;
                                                                          }
                                                                          .p-nothing{
                                                                              font-size: 20px;
                                                                              margin: 20px auto;
                                                                              text-align: center;
                                                                          }
                                                                      </style>
                                                                      <div id="menu3<?=$item->id?>" class="tab-pane fade">
                                                                          @if(isset($item->comments)&&count($item->comments)>0)
                                                                            <ul class="ul-cmt">
                                                                                @foreach($item->comments as $cmt)
                                                                                    <li class="col-lg-6 col-sm-12">
                                                                                       <div class="cmt-content">
                                                                                           <p>Tên: {{$cmt->name}}</p>
                                                                                           <p>Nội dung: {{$cmt['content']}}</p>
                                                                                           <button class="btn btn-danger deletecomment" url="{{route('deletecomment', ['id' => $cmt['id']])}}">Xóa</button>
                                                                                       </div>
                                                                                    </li>
                                                                                @endforeach
                                                                            </ul>
                                                                          @else
                                                                            <p class="p-nothing">Không có bình luận nào!!!</p>
                                                                          @endif
                                                                      </div>
                                                                  </div>
                                                              </div>
                                                              <div class="modal-footer">
                                                                  <button style="width: auto;" type="button" class="btn btn-danger" data-dismiss="modal">close</button>
                                                              </div>
                                                          </div>
                                                      </div>
                                                  </div>
                                                  {{--/////////////////////--}}
                                                  <a href="{{route('editproduct',$item->id)}}"><div class="btn btn-info btn-action" title="Sửa sản phẩm"><i class="fa fa-edit fa-fw"></i></div></a>
                                                 <button data-toggle="modal" data-target="#myModal<?=$item->id?>" class="btn btn-warning btn-action" title="Xóa sản phẩm"><i class="fa fa-trash-o fa-fw"></i></button>
                                                  <!-- Modal -->
                                                  <div class="modal fade"  id="myModal<?=$item->id?>" role="dialog">
                                                      <div class="modal-dialog modal-md">
                                                          <div class="modal-content">
                                                              <div class="modal-body">
                                                                  <p>Bạn có chắc muốn xóa bản ghi không???</p>
                                                              </div>
                                                              <div class="modal-footer">
                                                                  <form action="{{route('deleteproduct',$item->id)}}" method="post">
                                                                      <input type="hidden" value="{{$item->id}}" name="id">
                                                                      <input type="submit" class="btn btn-danger" value="Xóa">
                                                                      {{csrf_field()}}
                                                                  </form>
                                                                  <button type="button" class="btn btn-info" data-dismiss="modal">No</button>
                                                              </div>
                                                          </div>
                                                      </div>
                                                  </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- /.table-responsive -->
                    </div>
                    <!-- /.panel-body -->
                </div>
                <!-- /.panel -->
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->

        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->
@endsection
