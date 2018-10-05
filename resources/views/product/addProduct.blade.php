<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="../../../../favicon.ico">

    <title>Blog Template for Bootstrap</title>


    <!-- Custom styles for this template -->
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:700,900" rel="stylesheet">
    <style>
        /* stylelint-disable selector-list-comma-newline-after */


        h1, h2, h3, h4, h5, h6 {
            font-family: "Playfair Display", Georgia, "Times New Roman", serif;
        }


    </style>

    <script src="https://unpkg.com/jquery/dist/jquery.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>

<body>

@include('common/toolbar')

<div class="container">
    <div class="row">
        <div class="col-md-8 order-md-1">
            <h4 class="mb-3">상품 등록</h4>
            <form class="needs-validation" novalidate>
                @csrf
                <div class="mb-3">
                    <label for="product-name">상품 이름</label>
                    <div class="input-group">
                        <input type="text" class="form-control" id="product-name" name="product-name" placeholder="상품 이름" required>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="product-price">상품 가격</label>
                    <div class="input-group">
                        <input type="number" class="form-control" id="product-price" name="product-price" placeholder="상품 가격" required>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="product-count">상품 개수</label>
                    <div class="input-group">
                        <input type="number" class="form-control" id="product-count" name="product-count" placeholder="상품 개수" required>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="product-img">상품 이미지</label>
                    <div class="input-group">
                        <input type="file" class="form-control" id="product-img" name="product-img" placeholder="상품 이미지" required>
                    </div>
                </div>



            </form>
        </div>

    </div>


    <p style="text-align: center">
        <a href="#" class="btn btn-primary my-2">상품등록</a>
        <a href="#" class="btn btn-secondary my-2">취소</a>
    </p>



</div>

@include('common/footer')

<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
<script src="../../assets/js/vendor/popper.min.js"></script>
<script src="../../dist/js/bootstrap.min.js"></script>
<script src="../../assets/js/vendor/holder.min.js"></script>
<script>
    Holder.addTheme('thumb', {
        bg: '#55595c',
        fg: '#eceeef',
        text: 'Thumbnail'
    });
</script>

<script>
    $('.btn-primary').on('click', function () {
        $('.needs-validation').attr('action','/product/addProduct').attr('method','POST').attr('enctype','multipart/form-data').submit();
    })
</script>
</body>
</html>
