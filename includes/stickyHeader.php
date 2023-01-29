<?php 
echo "<script>

const stickyHeader = () => {
   
    var header = document.getElementById('myHeader');
    var sticky = header.offsetTop;
    if (window.pageYOffset > sticky) {
        header.classList.add('sticky');
    } else {
        header.classList.remove('sticky');
    }
}
window.onscroll = function() {
    stickyHeader();
};

</script>"; ?>