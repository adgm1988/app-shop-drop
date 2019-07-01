@extends('layouts.app')

@section('body-class','product-page')

@section('title','App Shop | Imagenes de productos')

@section('content')
<div class="header header-filter" style="background-image: url('https://images.unsplash.com/photo-1423655156442-ccc11daa4e99?crop=entropy&dpr=2&fit=crop&fm=jpg&h=750&ixjsv=2.1.0&ixlib=rb-0.3.5&q=50&w=1450');">

</div>

<div class="main main-raised">
    <div class="container">


        <div class="section text-center">
            <h2 class="title">Imágenes de producto "{{ $product->name }}"</h2>
   
            <form method="post" action="" enctype="multipart/form-data"> <!--si no le pongo nada se hace el request a la misma pagina-->
                @csrf
                <input type="file" name="photo" required>
                <button type="submit"  class="btn btn-primary btn-round">Subir nueva imágen</button>
                <a href="{{ url('admin/products') }}" class="btn btn-default btn-round">Volver a listado de productos</a>
            </form>

            <hr>

            <div class="row">
                @foreach($images as $image)
                <div class="col-md-4">
                    <div class="card card-default" style="margin-bottom:10px;">
                        <div class="card-body">
                            <img src="{{ $image->url }}" alt="" width="250">

                            <!--ESTA PARTE ESTA INVENTADA TODAVIA-->
                            <form method="post" action="{{ url('admin/products/'. $image->id .'/images') }}">
                                @csrf
                                {{method_field('DELETE')}}
                                <button type="submit" class="btn btn-danger btn-round">Eliminar Imagen</button>
                                
                                @if($image->featured)
                                <button type="button" class="btn btn-primary btn-fab btn-fab-mini btn-round" rel="tooltip" title="Imagen destacada de este producto">
                                    <i class="material-icons">favorite</i></button>
                                    @else

                                    <a href="{{ url('admin/products/'.$product->id.'/images/select/'.$image->id) }}"class="btn btn-default btn-fab btn-fab-mini btn-round">
                                        <i class="material-icons">favorite</i>
                                    </a>    
                                    @endif
                                </form>
                                <!--TODAVIA NO LA HAGO SOLO LA EMPECE-->
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

</div>

@include('includes.footer')
@endsection
