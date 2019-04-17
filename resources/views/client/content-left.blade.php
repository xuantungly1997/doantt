<div class="main-left">
    <ul>
        <li>
            <div class="menusm">
                <h3 class="menusm-title">
                    Danh mục
                </h3>
                <ul class="menusm-ct">
                    <li id="pro-boy" class="li-pro">
                        <a href="#">Quần áo nam</a>
                        <ul id="menuc2a-sm" class="cate">
                            @foreach($cate as $item)
                                @if($item->parent_id==1)
                                    <li><a href="{{route('getcateproduct',$item->id.'&'.$item->slug)}}">{{$item->name}}</a></li>
                                @endif
                            @endforeach
                        </ul>
                    </li>
                    <li id="pro-girl" class="li-pro">
                        <a href="#">Quần áo nữ</a>
                        <ul id="menuc2b-sm" class="cate">
                            @foreach($cate as $item)
                                @if($item->parent_id==0)
                                    <li><a href="{{route('getcateproduct',$item->id.'&'.$item->slug)}}">{{$item->name}}</a></li>
                                @endif
                            @endforeach
                        </ul>
                    </li>
                </ul>
            </div>
        </li>
        <li>
            <div class="about">
                <h3 class="about-title">About us</h3>
                <p class="desc about-desc">Cơ sở sản quần áo Unishop được thành lập năm 2017. Chuyên sản xuất các sản phẩm quần áo ...được tin cậy của khách hàng, đặc biệt là với khách hàng công sở.</p>
                <span class="read-more">
		              <a href="{{route('about')}}">Xem thêm</a>
		            </span>
            </div>
        </li>
        <li>
            <div class="new">
                <h3 class="new-title">Tin tức</h3>
                @foreach($posts as $post)
                    <div class="new-infor" style="margin-bottom: 15px;">
                        <div class="new-infor__img">
                            <a href="{{route('getdetailpost',$post->id)}}"><img style="height: 150px;object-fit: cover;" src="../{{$post->thumb}}" alt=""></a>
                        </div>
                        <p class="new-infor__title"><a href="{{route('getdetailpost',$post->id)}}">{{$post->title}}</a></p>
                        <p class="desc new-infor__desc">
                            {{$post->description}}
                        </p>
                        <span class="read-more">
		                <a href="{{route('getdetailpost',$post->id)}}">Xem thêm</a>
		              </span>
                    </div>
                @endforeach
            </div>
        </li>
    </ul>
</div>