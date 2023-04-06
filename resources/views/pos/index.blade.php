@extends('dashboard.body.main')

@section('container')
<div class="container-fluid">

    <div class="row">
        <div class="col-lg-12">
            <div>
                <h4 class="mb-3">Point of Sale</h4>
            </div>
        </div>

        <div class="col-lg-6">
            <table class="table">
                <thead>
                    <tr class="ligth">
                        <th scope="col">Name</th>
                        <th scope="col">QTY</th>
                        <th scope="col">Price</th>
                        <th scope="col">SubTotal</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Laptop</td>
                        <td><input type="email" class="form-control"></td>
                        <td>2200</td>
                        <td>4400</td>
                        <td>
                            <button type="submit" class="btn btn-danger border-none" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete"><i class="fa-solid fa-trash mr-0"></i></button>
                        </td>
                    </tr>
                </tbody>
            </table>

            <div class="container row">
                <div class="form-group col-md-6">
                    <p class="h4 text-black">Quantity: 123</p>
                </div>
                <div class="form-group col-md-6">
                    <p class="h4 text-black">Subtotal: 123</p>
                </div>
                <div class="form-group col-md-6">
                    <p class="h4 text-black">Vat: 123</p>
                </div>
                <div class="form-group col-md-6">
                    <p class="h4 text-black">Total: 123</p>
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-md-12">
                    <div class="d-flex flex-wrap align-items-center justify-content-center">
                        <a href="{{ route('customers.create') }}" class="btn btn-primary add-list">Add Customers</a>
                    </div>
                </div>
                <div class="form-group col-md-12">
                    <label for="employee_id">Select Customer <span class="text-danger">*</span></label>
                    <select class="form-control mb-3" id="employee_id" name="employee_id" required="">
                        <option selected="" disabled="">-- Select Employee --</option>
                        @foreach ($customers as $customer)
                            <option value="{{ $customer->id }}">{{ $customer->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-12">
                    <div class="d-flex flex-wrap align-items-center justify-content-center">
                        <button type="submit" class="btn btn-success add-list">Create Invoice</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-6">
            <div class="card card-block card-stretch card-height">
                <div class="card-body">
                    <form action="#" method="get">
                        <div class="d-flex flex-wrap align-items-center justify-content-between">
                            <div class="form-group row">
                                <label for="row" class="align-self-center mx-2">Row:</label>
                                <div>
                                    <select class="form-control" name="row">
                                        <option value="10" @if(request('row') == '10')selected="selected"@endif>10</option>
                                        <option value="25" @if(request('row') == '25')selected="selected"@endif>25</option>
                                        <option value="50" @if(request('row') == '50')selected="selected"@endif>50</option>
                                        <option value="100" @if(request('row') == '100')selected="selected"@endif>100</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="control-label col-sm-3 align-self-center" for="search">Search:</label>
                                <div class="input-group col-sm-8">
                                    <input type="text" id="search" class="form-control" name="search" placeholder="Search product" value="{{ request('search') }}">
                                    <div class="input-group-append">
                                        <button type="submit" class="input-group-text bg-primary"><i class="fa-solid fa-magnifying-glass font-size-20"></i></button>
                                        <a href="{{ route('products.index') }}" class="input-group-text bg-danger"><i class="fa-solid fa-trash"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>


                    <div class="table-responsive rounded mb-3 border-none">
                        <table class="table mb-0">
                            <thead class="bg-white text-uppercase">
                                <tr class="ligth ligth-data">
                                    <th>No.</th>
                                    <th>Photo</th>
                                    <th>@sortablelink('product_name', 'name')</th>
                                    <th>@sortablelink('selling_price', 'price')</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody class="ligth-body">
                                @forelse ($products as $product)
                                <tr>
                                    <td>{{ (($products->currentPage() * 10) - 10) + $loop->iteration  }}</td>
                                    <td>
                                        <img class="avatar-60 rounded" src="{{ $product->product_image ? asset('storage/products/'.$product->product_image) : asset('assets/images/product/default.webp') }}">
                                    </td>
                                    <td>{{ $product->product_name }}</td>
                                    <td>{{ $product->selling_price }}</td>
                                    <td>
                                        <form action="#" method="POST" style="margin-bottom: 5px">
                                            @csrf
                                                <button type="submit" class="btn btn-primary border-none" data-toggle="tooltip" data-placement="top" title="" data-original-title="Add"><i class="far fa-plus mr-0"></i></button>
                                        </form>
                                    </td>
                                </tr>

                                @empty
                                <div class="alert text-white bg-danger" role="alert">
                                    <div class="iq-alert-text">Data not Found.</div>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <i class="ri-close-line"></i>
                                    </button>
                                </div>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    {{ $products->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection