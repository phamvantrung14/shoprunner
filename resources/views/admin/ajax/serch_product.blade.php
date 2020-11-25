<div class="card-body list-product">
    @if(session('success'))
        <div class="header">
            <div class="alert alert-success">
                {{session('success')}}
            </div>
        </div>
    @endif
    @if(session('error'))
        <div class="header">
            <div class="alert alert-danger">
                {{session('error')}}
            </div>
        </div>
    @endif
    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col">STT</th>
            <th scope="col">Name </th>
            <th scope="col">Category</th>
            <th scope="col">Price</th>
            <th scope="col">Avatar</th>
            <th scope="col">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($products as $value)
            <tr>
                <th scope="row">{{$loop->index+1}}</th>
                <td>{{$value->pro_name}}</td>
                <td>{{$value->Categories->cate_name}}</td>
                <td>{{$value->getPrice()}}<br>
                    {{$value->getSalePrice()}}
                </td>
                <td><img src="{{$value->getAvatar()}}"width="80px" alt=""></td>

                <td>
                    <a href="{{url("admin/products/check/$value->slug")}}" class="badge badge-success badge-pill">Check</a>
                    <a href="{{url("admin/products/edit/$value->slug")}}" class="badge badge-primary badge-pill">Edit</a>
                    <a href="{{url("admin/products/delete/$value->slug")}}"  class="badge badge-danger badge-pill">Delete</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {!! $products->links() !!}
</div>
