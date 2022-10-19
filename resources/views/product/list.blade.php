
@extends('index')

@section('content')
            <div class="row">
                <div class="col-md-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>{{ $title }}</h2>
                            <ul class="nav navbar-right panel_toolbox">
                                <li><a href="{{ route('productcontroller.create') }}"><button class="btn btn-primary btn-xs">Product Add</button></a></li>
                            </ul>
                            <div class="clearfix"></div>
                        </div>

                        @if(session()->has('success'))
                            <div class="alert alert-success">
                                {{ session()->get('success') }}
                            </div>
                        @endif
                        <div class="x_content">
                            <div class="row">

                                @foreach($product as $item)

                                <div class="col-md-55">
                                    <div class="thumbnail">
                                        <div class="image view view-first">
                                            <img style="width: 100%; display: block;" src="{{ asset($item->image) }}" alt="image" />
                                            <div class="mask">
                                                <p>{{ $item->price }}</p>
                                                <div class="tools tools-bottom">
                                                    <a href="{{ route('productcontroller.edit', $item->id)  }}"><i class="fa fa-pencil"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="caption">
                                            <p>{{ $item->title }} - {{ $item->price }} TL</p>
                                        </div>
                                        <div  style="display:flex;" >

                                            <form  action="{{ route('cartadd') }}" method="POST" enctype="multipart/form-data">
                                                @csrf
                                                <input type="hidden" value="{{ $item->id }}" name="id">
                                                <input type="hidden" value="{{ $item->title }}" name="name">
                                                <input type="hidden" value="{{ $item->price }}" name="price">
                                                <input type="hidden" value="{{ $item->title }}"  name="image">
                                                <input type="hidden" value="{{ $item->category }}"  name="category">
                                                <input type="hidden" value="1" name="quantity">
                                                <button  class="btn-xs btn-success float-right">Add Cart</button>
                                            </form>


                                            <form action="{{ route('productcontroller.destroy', $item->id) }}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn-xs btn-danger float-right">X</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                                @endforeach

                            </div>
                        </div>
                    </div>
                </div>
            </div>


@endsection
