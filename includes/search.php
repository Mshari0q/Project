
<?php echo '

<script>
                function search() {
                    var input, filter, product, productInfo, productName, i, txtValue;
                    input = document.getElementById("searchBox");
                    filter = input.value.toUpperCase();
                    product = document.getElementsByClassName("product");
                    for (i = 0; i < product.length; i++) {
                        productInfo = product[i].getElementsByClassName("product-info")[0];
                        productName = productInfo.getElementsByClassName("product-name")[0];
                        txtValue = productName.textContent || productName.innerText;
                        if (txtValue.toUpperCase().indexOf(filter) > -1) {
                            product[i].style.display = "";
                        } else {
                            product[i].style.display = "none";
                        }
                    }
                }
                document.getElementById("searchBox").addEventListener("keyup", search);
                
</script>'; ?>