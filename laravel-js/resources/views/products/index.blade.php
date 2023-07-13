@extends('layouts.app')

@section('content')

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Products</h1>
    </div>


    <div class="card">
        <form action="" method="get" class="card-header">
            <div class="form-row justify-content-between">
                <div class="col-md-2">
                    <input type="text" name="title" placeholder="Product Title" class="form-control">
                </div>
                <div class="col-md-2">
                    <select name="variant" id="" class="form-control">

                    </select>
                </div>

                <div class="col-md-3">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Price Range</span>
                        </div>
                        <input type="text" name="price_from" aria-label="First name" placeholder="From" class="form-control">
                        <input type="text" name="price_to" aria-label="Last name" placeholder="To" class="form-control">
                    </div>
                </div>
                <div class="col-md-2">
                    <input type="date" name="date" placeholder="Date" class="form-control">
                </div>
                <div class="col-md-1">
                    <button type="submit" class="btn btn-primary float-right"><i class="fa fa-search"></i></button>
                </div>
            </div>
        </form>

        <div class="card-body">
            <div class="table-response">
                <table class="table">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Variant</th>
                        <th width="150px">Action</th>
                    </tr>
                    </thead>

                    <tbody>
                    @foreach($product  as $p)
                    <tr>
                        <td>1</td>
                        <td> {{$p->title}} <br> Created at : {{date('d-M-Y',strtotime($p->created_at))}}</td>
                        <td> {{$p->sku}}</td>
                        <td>
                            <dl class="row mb-0" style="height: 80px; overflow: hidden" id="variant">

                                <dt class="col-sm-3 pb-0">
                                    {{-- SM/ Red/ V-Nick  --}}

                                    @if($p->Price!=NULL)
                                    @foreach($p->Price as $pp)
                                    {{-- {{$pp->product_variant_one}}/{{$pp->product_variant_two}}/{{$pp->product_variant_three}} --}}
                                    @foreach($p->ProductVariant as $pv)
                                    @if($pv->id == $pp->product_variant_one  )
                                    {{$pv->variant}}
                                    @endif
                                    @if($pv->id == $pp->product_variant_two  )
                                    /{{$pv->variant}}
                                    @endif
                                    @if($pv->id == $pp->product_variant_three  )
                                    /{{$pv->variant}}
                                    @endif
                                    @endforeach
                                    <br>
                                    @endforeach
                                    @endif

                                    
                                </dt>
                                <dd class="col-sm-9">
                                    @if($p->Price!=NULL)
                                    @foreach($p->Price as $pp)
                                    <dl class="row mb-0">
                                        <dt class="col-sm-4 pb-0">Price : 
                                        {{-- {{ number_format(200,2) }}  --}}
                                           
                                            {{$pp->price}}
                                           
                                        </dt>
                                        <dd class="col-sm-8 pb-0">InStock : {{$pp->stock}}
                                            {{-- {{ number_format(50,2) }} --}}
                                        </dd>
                                    </dl>
                                    @endforeach
                                    @endif
                                </dd>
                            </dl>
                            <button onclick="$('#variant').toggleClass('h-auto')" class="btn btn-sm btn-link">Show more</button>
                        </td>
                        <td>
                            <div class="btn-group btn-group-sm">
                                <a href="{{ route('product.edit', 1) }}" class="btn btn-success">Edit</a>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                    </tbody>

                </table>
            </div>

        </div>

        <div class="card-footer">
            <div class="row justify-content-between">
                <div class="col-md-6">
                    <p>Showing 1 to 10 out of 100</p>
                </div>
                <div class="col-md-2">

                </div>
            </div>
        </div>
    </div>

@endsection
