<!DOCTYPE html>
<html>
    <head>
        <title>Laravel</title>

        <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

        <!-- Optional theme -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">
    </head>
    <body>
        <div class="container">
            <form>
                <fieldset class="form-group">
                    <label for="product">Product Name</label>
                    <input type="text" class="form-control" id="product" placeholder="Enter Product Name">
                </fieldset>

                <fieldset class="form-group">
                    <label for="quantity">Quantity in stock</label>
                    <input type="text" class="form-control" id="quantity" placeholder="Enter Quantity in Stock">
                </fieldset>

                <fieldset class="form-group">
                    <label for="price">Price per item</label>
                    <input type="text" class="form-control" id="price" placeholder="Enter Price Per Item">
                </fieldset>
                <a  class="btn btn-primary" id="submit">Submit</a>
            </form>

            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="text-center"><strong>Order summary</strong></h3>
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-condensed" id="tbl">
                                    <thead>
                                    <tr>
                                        <td><strong>Item Name</strong></td>
                                        <td class="text-center"><strong>Item Price</strong></td>
                                        <td class="text-center"><strong>Item Quantity</strong></td>
                                        <td class="text-right"><strong>Total</strong></td>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                                <h3>Total: $<span id="total"></span></h3>
                            </div>
                        </div>
                    </div>
                </div>

        </div>


            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.2/jquery.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/vue/1.0.20/vue.min.js"></script>

            <script>
                var data = [];
                var  total = 0;
                $( "#submit" ).click(function() {
                    var product = $("#product").val();
                    var quantity = $("#quantity").val();
                    var price = $("#price").val();

                    var obj = {
                        product: product,
                        quantity: quantity,
                        price: price
                    };
                    data.push(obj);
                    localStorage.setItem('orderStorage', JSON.stringify(data));

                    var content = "<tr>";
                    content += '<td>' + product  + '<td>';
                    content += '<td class="text-center">' + quantity  + '<td>';
                    content += '<td class="text-center">' + price  + '<td>';
                    content += '<td class="text-right">' + price*quantity  + '<td>';

                    content += "</tr>";
                    $("#tbl > tbody").append(content);

                    total = 0;
                    for(i=0 ; i< data.length; i++){
                        var object= data[i];
                        total += object.price*object.quantity;
                    }
                    $("#total").html(total);
                });
            </script>
    </body>
</html>
