<div>
    <div class="row">

        <div class="col-2">
            <div class="row">
                <div class="col">
                    <h2>Categorias</h2>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <ul class="list-group">
                        @foreach($categories as $category)
                            <li class="list-group-item">
                                <a href="#">{{$category->title}}</a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>

        <div class="col-10">
            <div class="row">
                @foreach($products as $product)
                    <div class="col-3 mb-5">
                        <div class="card">
                            <img class="card-img-top" src="{{$product->picture}}" alt="Card image cap">
                            <div class="card-title text-center"> {{$product->identifier}} {{$product->title}}</div>
                            <div class="card-body">
                                <p class="card-text">
                                    {{$product->details}}
                                </p>
                                <a href="" class="btn btn-success">Agregar al Carrito</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

    </div>
</div>
