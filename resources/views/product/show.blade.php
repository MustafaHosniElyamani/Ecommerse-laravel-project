@extends('layouts.app')
@section('title', $viewData['title'])
@section('subtitle', $viewData['subtitle'])
@section('content')
    <div class="card mb-3">
        <div class="row g-0">
            <div class="col-md-4">

                <img id="product-image" src="{{ asset('/storage/' . $viewData['product']->getImage()) }}"
                    class="img-fluid rounded-start">

                <style>
                    .blue {
                        /* filter: hue-rotate(0deg)saturate(1000%); */
                    }

                    .red {

                        /* filter: hue-rotate(120deg)saturate(1000%); */
                    }

                    .green {
                        /* filter: hue-rotate(240deg)saturate(1000%); */
                    }
                </style>
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title">
                        {{ $viewData['product']->getName() }} (${{ $viewData['product']->getPrice() }})

                    </h5>
                    <p class="card-text">{{ $viewData['product']->getDescription() }}</p>
                    <p class="card-text">
                    <form method="POST" action="{{ route('cart.add', ['id' => $viewData['product']->getId()]) }}">
                        <div class="row">
                            @csrf
                            <div class="col-auto">
                                <div class="input-group col-auto">
                                    <div class="input-group-text">Quantity</div>
                                    <input type="number" min="1" max="10" class="form-control quantity-input"
                                        name="quantity" value="1">
                                </div>
                            </div>
                            <div class="col-auto">
                                <div class="input-group col-auto">
                                    <div class="input-group-text">Color</div>
                                    <select class="form-control" id="colorID" name="color">
                                        <option>choose...</option>
                                        @foreach ($viewData['product']->colors as $color)
                                            <option value="{{ $color->id }}">{{ $color->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-auto">
                                <div class="input-group col-auto">
                                    <div class="input-group-text">Size</div>
                                    <select class="form-control" id="size"name="size">
                                        @foreach ($viewData['product']->sizes as $size)
                                            <option value="{{ $size->id }}">{{ $size->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-auto">
                                <button class="btn bg-primary text-white" type="submit">Add to cart</button>
                            </div>
                        </div>
                    </form>
                    </p>
                </div>
            </div>
        </div>
    </div>
    <script>
        // Get a reference to the select element
        var colorSelector = document.getElementById("colorID");

        // Get a reference to the product image
        var productImage = document.getElementById("product-image");

        // Add an event listener to the select element
        colorSelector.addEventListener("change", function() {
            // Get the value of the selected option


            var selectedOption = this.options[colorSelector.selectedIndex];
            var selectedOptionName = selectedOption.text.toLowerCase();
            // Apply the appropriate CSS class to the product image

            var classList = productImage.classList;
            var classToRemove = "";
            for (var i = 0; i < classList.length; i++) {
                var className = classList[i];
                if (className === "red" || className === "green" || className === "blue") {
                    classToRemove = className;
                }
            }
            if (classToRemove !== "") {
                classList.remove(classToRemove);
            }

            // Apply the appropriate CSS class to the product image
            productImage.classList.add(selectedOptionName);
        });
    </script>
@endsection
